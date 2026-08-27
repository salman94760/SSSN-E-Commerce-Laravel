<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\user_info;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
class UserController extends Controller
{
     use AuthorizesRequests;
    protected $users;
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->users = new User();
    }
    public function index(Request $request)
    {
        $this->authorize('viewAny',User::class);
        $query = User::with('userInfo');
        
        if ($request->filled('search')) {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        }

        if ($request->filled('type')) {
            $query->where('role', $request->type);
        }
        $users = $query->paginate(5)->withQueryString();
        $categories = Category::all();
        $brands = Brand::all();
        return view('dashboard.users.index', compact('users','categories','brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create',User::class);
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserFormRequest $request)
    {
        $this->authorize('create',User::class);
        $randomAlphabets = Str::password(8, letters: true, numbers: false, symbols: false);
        $path = "";

        if ($request->hasFile('image')) {
            $path = $request->file("image")->store('users', 'public');
        }
        
        $user = $this->users->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $randomAlphabets,
            'role' => $request->role?$request->role:"customer",
        ]);
        
        if ($user) {
            $user->userInfo()->create([
                'address' => $request->address,
                'phone' => $request->phone,
                'zipcode' => $request->zipcode,
                'landmark' => $request->landmark,
                'image' => $path,
                'password_hint' => $randomAlphabets
            ]);
        }

        return redirect()->route('users.index')->with('success', 'User registered successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Gate::authorize('isAdmin');
        $user = $this->users::findOrFail($id);
        return view('dashboard.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        Gate::authorize('isAdmin');
        $user = $this->users::findOrFail($id);
        return view('dashboard.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserFormRequest $request, string $id)
    {
        Gate::authorize('isAdmin');
        $user = $this->users::findOrFail($id);
        if($user){
            $path = "";
            if($request->hasFile('image')){
                $oldImage = $user->userInfo->image;
                if($oldImage){
                    Storage::disk('public')->delete($oldImage); 
                }
                $path = $request->file('image')->store('users','public'); 
            }
            
            $user->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'role'=>$request->role?$request->role:'customer',   
            ]);
            
            $user->userInfo()->updateOrCreate(['user_id' => $user->id],
                [
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'zipcode' => $request->zipcode,
                    'landmark' => $request->landmark,
                    'image' => $path,
                ]
            );
            return redirect()->route('users.index')->with('success','user updated successfully');
        }else{
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('isAdmin');
        $this->users::findOrFail($id)->delete();
        return redirect()->route('users.index')->with('success','User deleted successfully');
    }
}
