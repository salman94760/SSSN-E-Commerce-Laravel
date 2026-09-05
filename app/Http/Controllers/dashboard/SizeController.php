<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sizes = Size::paginate(8);
        return view('dashboard.sizes.index',compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.sizes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:45',
            'slug' => 'required|string|max:45'
        ]);

        $size = Size::create([
            'name' => $request->name,
            'slug' => $request->slug
        ]);

        if($size){
            return redirect()->route('sizes.index')->with('success','Size Added Successfully');
        }else{
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Size $size)
    {
        $size = Size::findOrFail($size->id);
        return view('dashboard.sizes.edit',compact('size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Size $size)
    {
        $request->validate([
            'name' => 'required|string|max:45',
            'slug' => 'required|string|max:45'
        ]);

        $size = Size::findOrFail($size->id);
        $size->update([
            'name'=>$request->name,
            'slug'=>$request->slug
        ]);
        return redirect()->route('sizes.index')->with('success','Size updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        Size::findOrFail($size->id)->delete();
        return redirect()->route('sizes.index')->with('success','Size deleted successfully');
    }
}
