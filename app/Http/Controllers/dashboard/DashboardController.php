<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Color;
use App\Models\Order;
use App\Models\Size;
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
        $allUsers = User::where('role', 'customer')->count();
        $products = Product::count();
        $categories = Category::count();
        $brands = Brand::count();
        $colors = Color::count();
        $sizes = Size::count();
        $allSellers = User::where('role', 'seller')->count();
        $ordersCount = Order::count();
        $couponsCount = 0;
        $reviewsCount = 0;
        $toalPayments = 0;
        $totalSales = Order::sum('total_amount');
        $payments = Order::selectRaw('payment_method, SUM(total_amount) as total')
            ->whereIn('payment_method', ['cod', 'online', 'upi'])
            ->groupBy('payment_method')
            ->pluck('total', 'payment_method');

        if ($user->role === 'admin' || $user->role === 'seller') {
            return view('dashboard/dashboard', compact('allUsers', 'allSellers', 'products', 'categories', 'brands', 'colors', 'sizes', 'ordersCount', 'couponsCount', 'reviewsCount', 'toalPayments', 'totalSales', 'payments'));
        }
        return view('/dashboard/customer-dashboard');
    }
}
