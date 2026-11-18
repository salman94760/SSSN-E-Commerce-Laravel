<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{



    public function index()
    {
        $userId = Auth::id();
        $sessionId = Session::getId();

        $cart = Cart::when($userId, function ($query) use ($userId) {
            $query->where('user_id', $userId);
        }, function ($query) use ($sessionId) {
            $query->where('session_id', $sessionId);
        })
            ->first();

        $cartCount = 0;

        if ($cart) {
            $cartCount = CartItem::where('cart_id', $cart->id)
                ->count();
        }

        $categories = Category::all();
        $brands = Brand::all();

        $products = Product::with([
            'sizes',
            'images',
            'reviews',
            'category',
            'brand',
            'reviews.user'
        ])->latest()->limit(12)->get();

        $reviews = ProductReview::all();

        return view('welcome', compact(
            'products',
            'categories',
            'brands',
            'reviews',
            'cartCount'
        ));
    }

    public function contact()
    {
        return view('contact');
    }

    public function faq()
    {
        return view('faq');
    }

    public function about()
    {
        return view('about');
    }

    public function category()
    {
        $categories = Category::paginate(20);
        return view('customer.category', compact('categories'));
    }

    public function dashboard()
    {
        return view('dashboard.demodashboard');
    }
}
