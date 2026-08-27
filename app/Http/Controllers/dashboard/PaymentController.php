<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(){
        $orders = Order::all();
        return view('dashboard.payment.index',compact('orders'));
    }
}
