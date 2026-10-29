<?php

namespace App\Http\Controllers;

use App\Jobs\OrderConfirmed;
use App\Models\Cart;
use App\Models\Order;
use App\Models\RazorpayWebhook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Razorpay\Api\Api;

class PaymentController extends Controller
{
    public function verify(Request $request){
        $request->validate([
            'order_id'            => 'required|integer',
            'razorpay_order_id'   => 'required|string',
            'razorpay_payment_id' => 'required|string',
            'razorpay_signature'  => 'required|string',
        ]);
        
        $order = Order::where('id', $request->order_id)->where('customer_id', auth()->id())->firstOrFail();
        
        /*
        |--------------------------------------------------------------------------
        | Check Razorpay Order ID
        |--------------------------------------------------------------------------
        */

        if ($order->gateway_order_id !== $request->razorpay_order_id) {

            Log::warning('Razorpay order ID mismatch', [
                'local_order_id'        => $order->id,
                'local_gateway_order_id' => $order->gateway_order_id,
                'razorpay_order_id'     => $request->razorpay_order_id,
            ]);

            return redirect()
                ->route('order.thankyou', $order->order_number)
                ->with('error', 'Payment verification failed.');
        }

        try {

            $api = new Api(
                config('services.razorpay.key'),
                config('services.razorpay.secret')
            );

            /*
            |--------------------------------------------------------------------------
            | Verify Razorpay Signature
            |--------------------------------------------------------------------------
            */

            $api->utility->verifyPaymentSignature([
                'razorpay_order_id'   => $request->razorpay_order_id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature'  => $request->razorpay_signature,
            ]);

            /*
            |--------------------------------------------------------------------------
            | Fetch Payment From Razorpay
            |--------------------------------------------------------------------------
            */

            $payment = $api->payment->fetch($request->razorpay_payment_id);

            /*
            |--------------------------------------------------------------------------
            | Verify Payment Belongs To Our Razorpay Order
            |--------------------------------------------------------------------------
            */

            if ($payment['order_id'] !== $order->gateway_order_id) {

                Log::warning('Razorpay payment/order mismatch', [
                    'order_id'   => $order->id,
                    'payment_id' => $request->razorpay_payment_id,
                ]);

                return redirect()
                    ->route('order.thankyou', $order->order_number)
                    ->with('error', 'Payment verification failed.');
            }

            /*
            |--------------------------------------------------------------------------
            | Check Payment Status
            |--------------------------------------------------------------------------
            */

            if ($payment['status'] !== 'captured') {

                $order->update([
                    'payment_status' => 'Pending',
                ]);

                return redirect()
                    ->route('order.thankyou', $order->order_number)
                    ->with('error', 'Payment is not captured yet.');
            }

            /*
            |--------------------------------------------------------------------------
            | SUCCESS
            |--------------------------------------------------------------------------
            */

            $shouldDispatch = false;

            DB::transaction(function () use ($order,$request,&$shouldDispatch) {
                $lockedOrder = Order::where('id', $order->id)->lockForUpdate()->first();
                
                /*
                | Already paid - webhook/verify may have processed it.
                */
                
                if ($lockedOrder->payment_status === 'Paid') {
                    return;
                }
                
                $lockedOrder->update([
                    'payment_status' => 'Paid',
                    'payment_method' => 'razorpay',
                    'transaction_id' => $request->razorpay_payment_id,
                    'order_status'   => 'Processing',
                ]);

                Cart::where('user_id',$lockedOrder->customer_id)->delete();
                $shouldDispatch = true;
            });

            /*
            |--------------------------------------------------------------------------
            | Send Order Confirmation
            |--------------------------------------------------------------------------
            */

            if ($shouldDispatch) {
                OrderConfirmed::dispatch(
                    $order,
                    $order->user->email
                );
            }

            return redirect()->route('order.thankyou', $order->order_number)->with('success','Payment successful. Your order has been placed.');

        } catch (\Exception $e) {
            Log::error('Razorpay payment verification failed', [
                'order_id'   => $order->id,
                'payment_id' => $request->razorpay_payment_id,
                'message'    => $e->getMessage(),
            ]);

            $order->update(['payment_status' => 'Failed']);
            
            return redirect()->route('order.thankyou', $order->order_number)->with('error', 'Payment verification failed.');
        }
    }
    
    public function webhook(Request $request){
        Log::info('================ RAZORPAY WEBHOOK HIT ================');

    Log::info('Razorpay webhook headers', [
        'signature' => $request->header('X-Razorpay-Signature'),
        'event_id' => $request->header('x-razorpay-event-id'),
    ]);

    Log::info('Razorpay webhook body', [
        'body' => $request->getContent(),
    ]);
        $webhookSecret = config('services.razorpay.webhook_secret');
        $signature = $request->header('X-Razorpay-Signature');
        
        if (!$signature || !$webhookSecret) {
            Log::warning('Razorpay webhook credentials/signature missing');
            return response()->json(['message' => 'Invalid webhook request'], 400);
        }
        
        $expectedSignature = hash_hmac('sha256',$request->getContent(),$webhookSecret);
        $payload = $request->all();

        if (!hash_equals($expectedSignature, $signature)) {
            Log::warning('Invalid Razorpay webhook signature');
            return response()->json(['message' => 'Invalid signature'], 400);
        }else{
            RazorpayWebhook::create([
                'event' => $payload['event'] ?? 'unknown',
                'razorpay_event_id' => $request->header('x-razorpay-event-id'),
                'payload' => $payload
            ]);
        }

     
        $event = $payload['event'] ?? null;
        
        if ($event === 'order.paid') {
            $gatewayOrderId = data_get($payload,'payload.order.entity.id');
            $paymentId = data_get($payload,'payload.payment.entity.id');
            
            if (!$gatewayOrderId) {
                return response()->json(['success' => true]);
            }
            
            $shouldDispatch = false;
            
            DB::transaction(function () use ($gatewayOrderId,$paymentId,&$shouldDispatch) 
            {
                $order = Order::where('gateway_order_id',$gatewayOrderId)->lockForUpdate()->first();
                if (!$order) {
                    Log::warning('Razorpay webhook order not found',['gateway_order_id' => $gatewayOrderId]
                    );
                    return;
                }
                
                if ($order->payment_status === 'Paid') {
                    return;
                }
                
                $order->update([
                    'payment_status' => 'Paid',
                    'payment_method' => 'razorpay',
                    'transaction_id' => $paymentId,
                    'order_status'   => 'Processing',
                ]);

                Cart::where('user_id',$order->customer_id)->delete();
                $shouldDispatch = true;
            });

            /*
            |--------------------------------------------------------------------------
            | Order Confirmation
            |--------------------------------------------------------------------------
            */

            if ($shouldDispatch) {
                $order = Order::where('gateway_order_id',$gatewayOrderId)->first();
                if ($order) {
                    OrderConfirmed::dispatch($order,$order->user->email);
                }
            }
        }

        return response()->json([
            'success' => true
        ]);
    }

    public function failed(Request $request)
{
    $request->validate([
        'order_id'           => 'required|integer',
        'razorpay_order_id'  => 'nullable|string',
        'razorpay_payment_id'=> 'nullable|string',
        'error_code'         => 'nullable|string',
        'error_description'  => 'nullable|string',
        'error_reason'       => 'nullable|string',
    ]);

    $order = Order::where('id', $request->order_id)
        ->where('customer_id', auth()->id())
        ->firstOrFail();

    /*
    |--------------------------------------------------------------------------
    | Security Check
    |--------------------------------------------------------------------------
    */

    if (
        $request->razorpay_order_id &&
        $order->gateway_order_id !== $request->razorpay_order_id
    ) {
        Log::warning('Razorpay failed payment order mismatch', [
            'local_order_id'       => $order->id,
            'gateway_order_id'     => $order->gateway_order_id,
            'razorpay_order_id'    => $request->razorpay_order_id,
        ]);

        return response()->json([
            'success' => false,
            'message' => 'Invalid Razorpay order.'
        ], 422);
    }

    /*
    |--------------------------------------------------------------------------
    | Save Failure
    |--------------------------------------------------------------------------
    */

    $order->update([
        'payment_status' => 'Failed',
    ]);

    /*
    |--------------------------------------------------------------------------
    | Log Failure
    |--------------------------------------------------------------------------
    */

    Log::warning('Razorpay payment failed', [
        'order_id'            => $order->id,
        'razorpay_order_id'   => $request->razorpay_order_id,
        'razorpay_payment_id' => $request->razorpay_payment_id,
        'error_code'          => $request->error_code,
        'error_description'   => $request->error_description,
        'error_reason'        => $request->error_reason,
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Payment failure recorded.'
    ]);
}
}