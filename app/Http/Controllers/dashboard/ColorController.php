<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $query = Color::query();
        if($request->filled('search')){
            $query->where('slug', 'like', '%' . strtolower($request->search) . '%');
        }
        $colors = $query->paginate(8)->withQueryString();
        return view('dashboard.colors.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.colors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:30',
            'slug' => 'required|string|max:30',
            'hex_code' => 'required'
        ]);

        $color = Color::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'hex_code' => $request->hex_code,
        ]);

        if ($color) {
            return redirect()->route('colors.index')->with('success', 'Color added successfully');
        } else {
            return back()->withErrors('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color)
    {
        $color = Color::findOrFail($color->id);
        return view('dashboard.colors.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Color $color)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:30',
            'slug' => 'required|string|max:30',
            'hex_code' => 'required'
        ]);

        $color = Color::findOrFail($color->id);
 
        $color->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'hex_code' => $request->hex_code,
        ]);

        return redirect()->route('colors.index')->with('success','Color updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        Color::findOrFail($color->id)->delete();
        return redirect()->route('colors.index')->with('success','Color deleted successfully');
    }
}
