<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;
use App\Http\Requests\CatBrandFormRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    protected $category;
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->category = new Category();
    }
    public function index(Request $request)
    {
        $query = $this->category::query();
        if($request->filled('search')){
            $query->where('name','LIKE','%'.$request->search.'%');
        }
        if($request->filled('status')){
            $query->where('status','=',$request->status);    
        }

        $sort = $request->sort;
        if($sort == 'oldest'){
            $query->oldest();
        }else if($sort == 'asc'){
            $query->orderBy('name', 'asc');
        }else if($sort == 'desc'){
            $query->orderBy('name', 'desc');
        }else{
            $query->latest();
        }
        
        $categories = $query->paginate(5)->withQueryString();
        return view('dashboard.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CatBrandFormRequest $request)
    {
        $path = '';
        if($request->hasFile('image')){
            $path = $request->file('image')->store('category','public');
        }
        $category = $this->category->create([
            'name'=> $request->name,
            'slug'=> $request->slug,
            'image'=> $path,
            'status'=> $request->status?$request->status:0,
        ]);

        if($category){
            return redirect()->route('categories.index')->with('success','Category added successfully');
        }else{
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('dashboard.categories.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('dashboard.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CatBrandFormRequest $request, string $id)
    {
        $category = $this->category::findOrFail($id);
        if($category){
            $path = "";
            if($request->hasFile('image')){
                if($category->image){
                    Storage::disk('public')->delete($category->image);
                }
                $path = $request->file('image')->store('category','public');
            }
            $category->update([
                'name'=> $request->name,
                'slug'=> $request->slug,
                'image'=> $path,
                'status'=> $request->status?$request->status:0,
            ]);
            return redirect()->route('categories.index')->with('success','Category updated successfully');
        }else{
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->category::findOrFail($id)->delete();
        return redirect()->route('categories.index')->with('success','Category deleted successfully');
    }
}
