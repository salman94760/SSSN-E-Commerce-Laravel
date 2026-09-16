<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Mail\ProductReviewRating;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminOrderController extends Controller
{
    public function orders()
    {
        $orders = Order::with([
            'userInfo',
            'items.product'
        ])
            ->latest()
            ->paginate(15);

        return view('dashboard.orders.index', compact('orders'));
    }
    public function show($id)
    {
        $order = Order::with([
            'userInfo',
            'items.product'
        ])->findOrFail($id);

        return view('dashboard.orders.show', compact('order'));
    }

    public function updateStatus(Request $request,String $id)
    {
       
        $request->validate([
            'order_status' => 'required|in:Pending,Processing,Shipped,Delivered,Cancelled',
            
        ]);

        $order = Order::findOrFail($id);

        $order->update([
            'order_status' => $request->order_status,
            'cancel_by' => auth()->user()->role
        ]);

        if($request->order_status === "Delivered"){
            Mail::to($order->user->email)->send(new ProductReviewRating($order));
        }

        return back()->with('success', 'Order status updated successfully.');
    }


    public function updatePaymentStatus(Request $request, Order $order)
    {
        dd($request->all());
        $request->validate([
            'payment_status' => [
                'required',
                'in:Pending,Paid,Failed,Refunded'
            ],

            'transaction_id' => [
                'nullable',
                'string',
                'max:255'
            ],
        ]);

        $order->update([
            'payment_status' => $request->payment_status,
            'transaction_id' => $request->transaction_id,
        ]);
        
        return back()->with(
            'success',
            'Payment status updated successfully.'
        );
    }
}
