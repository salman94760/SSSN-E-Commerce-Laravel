<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $query = Product::query();
        $userid = Auth::id();
        if($request->filled('search')){
            $query->where('name','LIKE','%'.$request->search.'%');
        }
        if($request->filled('category_id')){
            $query->where('category_id','=',$request->category_id);
        }

        if($request->filled('brand_id')){
            $query->where('brand_id','=',$request->brand_id);
        }

        if($request->filled('status')){
            $query->where('status','=',$request->status);
        }
        $products = $query->paginate(5)->withQueryString();
        return view('dashboard.products.index',compact('categories','brands','products','userid'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('dashboard.products.create',compact('categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $path = '';
        $product = new Product();
        if($request->hasFile('image')){
            $path = $request->file('image')->store('products','public');
        }
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->stock = $request->stock;
        $product->image = $path;
        $product->status = $request->status;
        $product->user_id = Auth::id();
        if($product->save()){
            return redirect()->route('products.index')->with("success","product Added successfully");
        }else{
            return back();
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('dashboard.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $tags = Tag::all();
        $product = Product::with(['brand','category'])->find($id);
        return view('dashboard.products.edit',compact('categories','brands','product','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        $path = "";
        $product = Product::findOrFail($id);
        if($request->hasFile('image')){
            if($product->image){
                Storage::disk('public')->delete($product->image);
            }
            $path = $request->file('image')->store('products','public');
        }
        $product->update([
            'name'          => $request->name,
            'slug'          => $request->slug,
            'category_id'   => $request->category_id,
            'brand_id'      => $request->brand_id,
            'price'         => $request->price,
            'sale_price'    => $request->sale_price,
            'stock'         => $request->stock,
            'status'        => $request->status,  
            'image'         => $path,
            'description'   => $request->description,
            'user_id'       => Auth::id()
        ]);

        return redirect()->route('products.index')->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('products.index')->with('success','Product deleted successfully');
    }
}
