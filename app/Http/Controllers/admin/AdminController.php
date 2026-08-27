<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\user_info;
use Illuminate\Support\Facades\Auth;

use Illuminate\Contracts\Validation\ValidationRule;

use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::id();
       
        $user = User::with('userInfo')->find($id);
;        return view('dashboard.admin.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $user = User::with('userInfo')->find($id);
        return view('dashboard.admin.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=> 'required|string|max:45',
            'phone'=> 'required|digits:10',
            'zipcode'=> 'required| digits:6'
        ]);

        $path = "";
        $user = User::findOrFail($id);
        $user->update([
            'name'=> $request->name
        ]);

        if($user){
            if($request->hasFile('image')){
                $path = $request->file('image')->store('users','public');
            }
            $userInfo = $user->userInfo()->updateOrCreate(
                ['user_id' => $user->id],
                [
                    'address'  => $request->address ?? '',
                    'phone'    => $request->phone ?? '',
                    'zipcode'  => $request->zipcode ?? '',
                    'landmark' => $request->landmark ?? '',
                    'image'    => $path
                ]
            );
            return redirect()->route('adminprofile.index')->with('success','Status updated successfully');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
