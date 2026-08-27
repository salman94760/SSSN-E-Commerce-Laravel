<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function checkout(){
        $user = Auth::user();
        $userId = $user->id;
        $userDetail = User::with('userInfo')->find($userId);
        $sessionId = session()->getId();
        $couponId = session('coupon.id');
        $coupon = null;

        $discount = 0;
        $cart = Cart::where(function($query) use ($userId,$sessionId){
            if($userId){
                $query->where('user_id',$userId);
            }else{
                $query->where('session_id',$sessionId);
            }
        })->first();
        $cartId = $cart?->id;
        if($cartId){
            $cartitems = CartItem::with('product')->where('cart_id',$cartId)->get();
            $subtotal = $cartitems->sum(function ($item) {
                return $item->product->sale_price * $item->quantity;
            });
        }else{
            $subtotal = 0;
            $cartitems = collect();
        }

        if($couponId){
            $coupon = Coupon::find($couponId);
             
        }
        if ($coupon && $coupon->is_active) {
          

        if (
            (!$coupon->expires_at ||
             now()->lte($coupon->expires_at))
            &&
            (!$coupon->usage_limit ||
             $coupon->used_count < $coupon->usage_limit)
        ) {

            if ($coupon->type === 'percentage') {

                $discount = ($subtotal * $coupon->value) / 100;

            } else {

                $discount = $coupon->value;

            }

            if (
                $coupon->max_discount &&
                $discount > $coupon->max_discount
            ) {
                $discount = $coupon->max_discount;
            }

            $discount = min($discount, $subtotal);
        }
    
        }


        $total = $subtotal-$discount;

  
    


  



        return view('customer.checkout',compact('total','subtotal','discount','cartitems','userDetail'));
    }

    public function cart(){
        $userId = Auth::id();
        $sessionId = session()->getId();
        $discount = 0;
        $cart = Cart::where(function($query) use ($userId,$sessionId){
            if($userId){
                $query->where('user_id',$userId);
            }else{
                $query->where('session_id',$sessionId);
            }
        })->first();
        $cartId = $cart?->id;
        if($cartId){
            $cartitems = CartItem::with('product')->where('cart_id',$cartId)->get();
            $total = $cartitems->sum(function ($item) {
                return $item->product->sale_price * $item->quantity;
            });
        }else{
            $total = 0;
            $cartitems = collect();
        }
        $discountedPrice = $total-$discount;
        return view('customer.cart',compact('cartitems','total','discountedPrice'));
    }

    public function addToCart(Request $request, string $id)
{
  
    $product = Product::findOrFail($id);
    
    $sessionId = $request->session()->getId();
    $userId = Auth::id();

    // Existing cart find karo
    
    $cart = Cart::where(function ($query) use ($userId, $sessionId) {

        if ($userId) {
            $query->where('user_id', $userId);
        } else {
            $query->where('session_id', $sessionId);
        }

    })->first();
   
    // Cart nahi hai to create karo
    if (!$cart) {

        $cart = Cart::create([
            'user_id'    => $userId,
            'session_id' => $sessionId,
        ]);
    }

    // Check karo product already cart mein hai ya nahi
    $cartItem = CartItem::where('cart_id', $cart->id)
        ->where('product_id', $product->id)
        ->first();

    if ($cartItem) {

        // Already hai to quantity increase
        $cartItem->increment('quantity');

    } else {

        // New product
        CartItem::create([
            'cart_id'    => $cart->id,
            'product_id' => $product->id,
            'quantity'   => 1,
            'price'      => $product->sale_price,
        ]);
    }
 
    return redirect()
        ->route('customer.cart')
        ->with('success', 'Added to cart successfully');
}

    public function review(){
        $reviews = collect([
    (object) [
        'id' => 1,
        'rating' => 5,
        'comment' => 'Product ki quality bahut achhi hai. Fabric soft aur comfortable hai. Delivery bhi time par mili.',
        'created_at' => now()->subDays(2),
        'user' => (object) [
            'id' => 1,
            'name' => 'Rahul Kumar',
        ],
    ],

    (object) [
        'id' => 2,
        'rating' => 4,
        'comment' => 'Lower ka fitting achha hai aur material bhi premium feel deta hai. Overall good product.',
        'created_at' => now()->subDays(5),
        'user' => (object) [
            'id' => 2,
            'name' => 'Amit Sharma',
        ],
    ],

    (object) [
        'id' => 3,
        'rating' => 5,
        'comment' => 'Exactly same product mila jaisa website par dikhaya gaya tha. Comfortable for daily use.',
        'created_at' => now()->subDays(8),
        'user' => (object) [
            'id' => 3,
            'name' => 'Rohit Singh',
        ],
    ],
]);
        return view('customer.review',compact('reviews'));
    }

    public function shop(Request $request){
        $category = $request->category??'';
        $products = Product::with(['category','wishlist' => function($query){
        $query->where('user_id',Auth::id());
       }])
       ->when($category, function($query) use ($category){
            $query->whereHas('category', function($query) use($category){
                 $query->where('slug', $category);
            });
       })->paginate(8);
       $productCount = Product::count();
       $categories = Category::withCount('products')->get();
       return view('customer.shop',compact('products','productCount','categories'));
    }

    public function productDetail($slug)
    {
        $product = Product::with('category')
            ->where('slug', $slug)
            ->firstOrFail();
            return view('customer.product-detail', compact('product'));
}

    public function wishlist(){
       $products = Product::whereHas('wishlist', function ($query) {
    $query->where('user_id', Auth::id());
})
->with('category')
->get();
     
        return view('customer.wishlist',compact('products'));
    }

    public function orderPlaced(){
        return view('customer.order-success');
    }

    public function profile(){
        return view('customer.profile');
    }

    public function profileEdit(){
        return view('customer.profile-edit');
    }
    
    public function profileUpdate(Request $request, string $id){
        $request->validate([
            'name'      => 'required|string|max:45',
            'email'     => 'required',
            'phone'     => 'required|digits:10',
            'zipcode'   => 'required|digits:6'
        ]);

        $user = User::find($id);
        if($user){
            $user->name = $request->name;
            $user->email = $request->email;
            if($user->update()){
                $user->userInfo->update([
                    'phone'     => $request->phone,
                    'zipcode'   => $request->zipcode,
                    'address'   => $request->address,
                    'landmark'  => $request->landmark
                ]);
                return redirect()->route('profile')->with('success','Detail updated successfully');
            }
        }else{
            return back()->withErrors('error','Something went wrong');
        }
    }
    
    public function toggle(Request $request)
    {
  
        
        $wishlist = Wishlist::where('user_id', Auth::id())->where('product_id', $request->product_id)->first();
        
        if (!empty($wishlist)) {
            $wishlist->delete();
            return response()->json([
                'success' => true,
                'status' => 'removed',
                'message' => 'Product removed from wishlist.',
            ]);
        }

        $wishlist = Wishlist::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
        ]);
        
        return response()->json([
            'success' => true,
            'status' => 'added',
            'message' => 'Product added to wishlist.',
        ]);
    }
}
