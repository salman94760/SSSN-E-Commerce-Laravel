<?php

namespace App\Http\Controllers\auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\user_info;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->user = new User();
    }

    public function register(Request $request){
        if($request->isMethod('POST')){
            $userInfo = new user_info();
            try{
                $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|string|min:6|max:16|confirmed',
                    'password_confirmation' => 'required|string',
                ]);
            
                $password = $request->password;
                $user = $this->user->create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => $request->password
                ]);

                if($user){
                    event(new Registered($user));
                    $user->userInfo()->create([
                        'address' => 'XXXXXX', 
                        'phone' => 0000000000,
                        'zipcode' => 000000, 
                        'landmark' => 'XXXXXXX', 
                        'password_hint' => $password
                    ]);
                    return redirect()->route('userRegister')->with('success', 'User registered successfully');
                }
            }catch(\Exception $e){
                Log::error('User registration error: ' . $e->getMessage());
                // return back()->with('error', 'Something went wrong');
                dd($e->getMessage());
            }
        }
        return view("auth.register");
    }

    public function login(Request $request){
        if($request->isMethod("POST")){
            $remember = $request->boolean('remember');
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],$remember)){
                if(auth()->user()->role === 'customer'){
                    return redirect('/');
                }
                return redirect('dashboard');
            }
       
        }
        return view('auth.login');
    }

    public function logout(){
        $userrole = auth()->user()->role;
        Auth::logout();
        if($userrole === 'customer'){
            return redirect('/');
        }
        return redirect()->route('userLogin');
    }
}
