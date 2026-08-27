<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Auth\Events\Registered;
class SocialAuthController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {

            $socialUser = Socialite::driver($provider)->user();

            $user = User::where('email', $socialUser->getEmail())->first();

            if (!$user) {
            
                $password = str()->random(32);
                $user = User::create([
                    'name' => $socialUser->getName()
                        ?? $socialUser->getNickname()
                        ?? 'User',

                    'email' => $socialUser->getEmail(),

                    'password' => bcrypt($password),
                ]);
                
                event(new Registered($user));
                $user->userInfo()->create([
                    'address' => 'XXXXXX', 
                    'phone' => 0000000000,
                    'zipcode' => 000000, 
                    'landmark' => 'XXXXXXX', 
                    'password_hint' => $password
                ]);
            }
            
            Auth::login($user, true);
            return redirect()->intended('/');

        } catch (\Exception $e) {

            return redirect('/login')
                ->with('error', 'Social login failed. Please try again.');
        }
    }
}