<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function review(){
        if(auth()->user()->role === 'customer'){
            return view('customer.review');
        }else{
            return view('dashboard.review');
        }
    }
    
}
