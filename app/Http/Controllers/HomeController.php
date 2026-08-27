<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::with(['category','brand','reviews.user'])->get();
        return view('welcome',compact('products','categories','brands'));
    }

    public function contact(){
        return view('contact');
    }

    public function faq(){
        return view('faq');
    }

    public function about(){
        return view('about');
    }

    public function category(){
        $categories = Category::paginate(20);
        return view('customer.category',compact('categories'));
    }
}
