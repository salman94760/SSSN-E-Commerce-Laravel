<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    
public function index()
{
    $orders = Order::all();

    $successfulPayments = Order::where('payment_status', 'Paid')->count();

    $pendingPayments = Order::where('payment_status', 'Pending')->count();

    $processingPayments = Order::where('payment_status', 'Processing')->count();

    $failedPayments = Order::where('payment_status', 'Failed')->count();

    return view('dashboard.payment.index', compact(
        'orders',
        'successfulPayments',
        'pendingPayments',
        'processingPayments',
        'failedPayments'
    ));
}

}
