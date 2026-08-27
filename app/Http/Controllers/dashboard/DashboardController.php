<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = Auth::user();
        $allUsers = User::count();
        $products = Product::count();
        $categories = Category::count();
        $brands = Brand::count();
        $allSellers = User::where('role','seller')->count();
        $ordersCount = 0;
        $couponsCount = 0;
        $reviewsCount = 0;
        $toalPayments = 0;
        if ($user->role === 'admin' || $user->role === 'seller') {
            return view('dashboard/admin-dashboard',compact('allUsers','allSellers','products','categories','brands','ordersCount','couponsCount','reviewsCount','toalPayments'));
        }
        return view('/dashboard/customer-dashboard');
    }
}
