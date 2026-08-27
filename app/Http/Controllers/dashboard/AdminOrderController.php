<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

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

public function updateStatus(Request $request, $id)
{
    $request->validate([
        'order_status' => 'required|in:Pending,Processing,Shipped,Delivered,Cancelled',
    ]);

    $order = Order::findOrFail($id);

    $order->update([
        'order_status' => $request->order_status,
    ]);

    return back()->with('success', 'Order status updated successfully.');
}
}
