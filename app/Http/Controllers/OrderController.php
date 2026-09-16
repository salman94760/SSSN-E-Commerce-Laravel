<?php

namespace App\Http\Controllers;

use App\Jobs\OrderConfirmed;
use App\Mail\OrderCancel;
use App\Mail\OrderPlaced;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
       
        $customer = Auth::user();

        $request->validate([
            'name'             => 'required|string|max:255',
            'phone'            => 'required|string|max:20',
            'zipcode'          => 'required|string|max:10',
            'shipping_address' => 'required|string',
            'payment_method'   => 'required|in:COD,razorpay',
        ]);

        $cart_id = Cart::where('user_id', $customer->id)->value('id');

        $cartItems = CartItem::where('cart_id', $cart_id)
            ->with('product')
            ->get();

        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Your cart is empty.');
        }

        DB::beginTransaction();

        try {

            $subtotal = 0;

            foreach ($cartItems as $item) {
                $subtotal += $item->price * $item->quantity;
            }

            $shipping = 0;

            $coupon = session('coupon');

            $discount = $coupon['discount'] ?? 0;

            $total = max(0, $subtotal + $shipping - $discount);

            /*
        |--------------------------------------------------------------------------
        | Create Local Order
        |--------------------------------------------------------------------------
        */

            $order = Order::create([
                'coupon_id'         => $coupon['id'] ?? null,
                'coupon_code'       => $coupon['code'] ?? null,
                'discount_amount'   => $discount,

                'customer_id'       => $customer->id,

                'order_number'      => 'ORD-' . strtoupper(Str::random(8)),

                'subtotal'         => $subtotal,
                'shipping_charge'  => $shipping,
                'total_amount'     => $total,

                'payment_method'   => $request->payment_method,

                'payment_status'   => $request->payment_method === 'COD'
                    ? 'Pending'
                    : 'Pending',

                'order_status'     => 'Pending',

                'shipping_address' => $request->shipping_address,

                'cancel_by'        => '',
            ]);

            /*
        |--------------------------------------------------------------------------
        | Create Order Items
        |--------------------------------------------------------------------------
        */

            foreach ($cartItems as $item) {

                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $item->product_id,
                    'quantity'   => $item->quantity,
                    'price'      => $item->price,
                    'color_id'   => $item->color_id,
                    'size_id'    => $item->size_id,
                    'total'      => $item->price * $item->quantity,
                ]);
            }

            /*
        |--------------------------------------------------------------------------
        | COD
        |--------------------------------------------------------------------------
        */

            if ($request->payment_method === 'COD') {

                Cart::where('user_id', $customer->id)->delete();

                DB::commit();

                if ($order->id) {
                    OrderConfirmed::dispatch(
                        $order,
                        $order->user->email
                    );
                }

                return redirect()
                    ->route('order.thankyou', $order->order_number)
                    ->with('success', 'Order placed successfully.');
            }

            /*
        |--------------------------------------------------------------------------
        | Razorpay
        |--------------------------------------------------------------------------
        */

            if ($request->payment_method === 'razorpay') {

                $api = new \Razorpay\Api\Api(
                    config('services.razorpay.key'),
                    config('services.razorpay.secret')
                );

                $razorpayOrder = $api->order->create([
                    'receipt' => $order->order_number,

                    // Razorpay expects amount in paise
                    'amount' => (int) round($total * 100),

                    'currency' => 'INR',
                ]);

                $order->update([
                    'gateway_order_id' => $razorpayOrder['id'],
                ]);

                DB::commit();

                /*
            |--------------------------------------------------------------------------
            | Cart clear AFTER payment
            |--------------------------------------------------------------------------
            |
            | COD mein cart abhi clear ho gaya.
            | Razorpay mein payment successful hone ke baad clear karenge.
            |
            */

                return view('payments.razorpay-checkout', [
                    'order' => $order,
                    'razorpayOrder' => $razorpayOrder,
                    'key' => config('services.razorpay.key'),
                    'customer' => $customer,
                ]);
            }
        } catch (\Exception $e) {

            DB::rollBack();
            dd($e->getMessage());
            Log::error('Order placement failed', [
                'user_id' => $customer->id,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return back()
                ->withInput()
                ->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function thankYou($orderNumber)
    {
        $order = Order::where('order_number', $orderNumber)
            ->where('customer_id', Auth::id())
            ->firstOrFail();

        $orderItem = OrderItem::with('product')->where('order_id', $order->id)->get();

        $paymentMethod = $order->payment_method;
        $couponId = $order->coupon_id;
        $coupon = Coupon::find($couponId);

        if ($paymentMethod === "COD") {
            if ($coupon) {
                $coupon->increment('used_count');
            }
            session()->forget('coupon');
        }
        return view('customer.order-success', compact('order', 'orderItem'));
    }

    public function myOrders()
    {
        $orderId = Order::where('customer_id', Auth::id())->pluck('id');
        $orderitems = OrderItem::with('product')->whereIn('order_id', $orderId)->get();

        $orders = Order::where('customer_id', Auth::id())->orderBy('id', 'desc')->paginate(10);
        return view('customer.my-order', compact('orders', 'orderitems'));
    }

    public function orderDetails($orderNumber)
    {
        $orderId = Order::where('order_number', $orderNumber)->value('id');
        $orderitems = OrderItem::with('product')->where('order_id', $orderId)->get();
        $order = Order::where('order_number', $orderNumber)->first();

        $totalitems = $orderitems->sum('quantity');

        return view('customer.my-order-detail', compact('order', 'orderitems', 'totalitems'));
    }

    public function cancel(Request $request, $orderId)
    {

        $order = Order::where('order_number', $orderId)->firstOrFail();
        $order->update([
            'order_status' => 'Cancelled',
            'cancel_by' => $request->userRole
        ]);

        Mail::to($order->user->email)->send(new OrderCancel($order));
        return redirect()->route('customer.my-orders');
    }

    //     public function cancel(Request $request, $orderNumber)
    // {
    //     $request->validate([
    //         'cancel_reason' => 'required|string|max:500',
    //     ]);

    //     $order = Order::where('order_number', $orderNumber)
    //         ->where('user_id', auth()->id())
    //         ->firstOrFail();

    //     // Shipping ke baad cancellation allowed nahi
    //     if (!in_array($order->order_status, ['Pending', 'Processing'])) {
    //         return back()->with('error', 'This order can no longer be cancelled.');
    //     }

    //     $order->update([
    //         'order_status' => 'Cancelled',
    //         'cancelled_by' => 'user',
    //         'cancel_reason' => $request->cancel_reason,
    //         'cancelled_at' => now(),
    //     ]);

    //     return redirect()
    //         ->route('customer.my-orders')
    //         ->with('success', 'Your order has been cancelled successfully.');
    // }
}
