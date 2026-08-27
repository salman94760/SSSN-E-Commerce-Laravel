<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Company;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define("isAdmin", function(User $user){
            return $user->role === "admin";
        });

        View::composer('*', function ($view) {

            $userId = Auth::id();
            $sessionId = session()->getId();
            
            $cart = Cart::with('items.product')
                ->where(function ($query) use ($userId, $sessionId) {
                    if ($userId) {
                        $query->where('user_id', $userId);
                    } else {
                        $query->where('session_id', $sessionId);
                    }

                })
                ->first();
                
            $wishlist = Wishlist::where('user_id', $userId)
                ->with('product')
                ->get();

            $company = Company::first();
            $view->with([
                'globalCart' => $cart,
                'globalWishlist' => $wishlist,
                'globalComapnyDetail' => $company
            ]);
        });
    }
}
