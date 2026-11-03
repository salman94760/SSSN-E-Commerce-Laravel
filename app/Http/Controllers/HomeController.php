<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index(){
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
        return view('welcome', compact('products','categories','brands','reviews'));
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

    public function dashboard(){
        return view('dashboard.demodashboard');
    }
}
