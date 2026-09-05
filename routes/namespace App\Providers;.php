namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Cart;
use App\Models\Wishlist;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        View::composer('*', function ($view) {

            $userId = auth()->id();
            $sessionId = session()->getId();

            // Cart
            $cart = Cart::with('items.product')
                ->where(function ($query) use ($userId, $sessionId) {

                    if ($userId) {
                        $query->where('user_id', $userId);
                    } else {
                        $query->where('session_id', $sessionId);
                    }

                })
                ->first();

            // Wishlist
            $wishlist = Wishlist::where('user_id', $userId)
                ->with('product')
                ->get();

            $view->with([
                'globalCart' => $cart,
                'globalWishlist' => $wishlist,
            ]);
        });
    }
}