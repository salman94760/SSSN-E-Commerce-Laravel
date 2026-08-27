<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;
use App\Http\Requests\CatBrandFormRequest;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
    $query = Brand::query();

    // Search
    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // Status
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    // Sorting
    $sort = $request->get('sort', 'latest');

    if ($sort === 'oldest') {
        $query->oldest();
    } elseif ($sort === 'name_asc') {
        $query->orderBy('name', 'asc');
    } elseif ($sort === 'name_desc') {
        $query->orderBy('name', 'desc');
    } else {
        $query->latest();
    }

    $brands = $query
        ->paginate(5)
        ->withQueryString();

    return view('dashboard.brand.index', compact('brands'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CatBrandFormRequest $request)
    {
        $path = '';
        $brand = new Brand();
        if($request->hasFile('image')){
            $path = $request->file('image')->store('brands','public');
        }
        $brand->name = $request->name;
        $brand->slug = strtolower(str_replace('','_',$request->slug));
        $brand->image = $path;
        $brand->status = $request->status?$request->status:0;
        if($brand->save()){
            return redirect()->route('brand.index')->with('success','Brand added successfully');
        }else{
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::findorFail($id);
        return view('dashboard.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CatBrandFormRequest $request, string $id)
    {
        $path = "";
        $brand = Brand::findOrFail($id);
        if($request->hasFile('image')){
            if($brand->image){
                Storage::disk('public')->delete($brand->image);
            }
            $path = $request->file('image')->store('brands','public');
        }
        $brand->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $path,
            'status' => $request->status?$request->status:0
        ]);
        return redirect()->route('brand.index')->with('success','Brand updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Brand::findOrFail($id)->delete();
        return redirect()->route('brand.index')->with('success','Brand deleted successfully');
    }
}
