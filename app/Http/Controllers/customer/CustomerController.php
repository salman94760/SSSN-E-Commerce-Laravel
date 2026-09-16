<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Mail\SubscriptionMail;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductNotify;
use App\Models\ProductReview;
use App\Models\Size;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Ramsey\Uuid\Type\Integer;

class CustomerController extends Controller
{
    public function checkout()
    {
        $user = Auth::user();
        $userId = $user->id;
        $userDetail = User::with('userInfo')->find($userId);
        $sessionId = session()->getId();
        $couponId = session('coupon.id');
        $coupon = null;

        $discount = 0;
        $cart = Cart::where(function ($query) use ($userId, $sessionId) {
            if ($userId) {
                $query->where('user_id', $userId);
            } else {
                $query->where('session_id', $sessionId);
            }
        })->first();
        $cartId = $cart?->id;
        if ($cartId) {
            $cartitems = CartItem::with('product')->where('cart_id', $cartId)->get();
            $subtotal = $cartitems->sum(function ($item) {
                return $item->price * $item->quantity;
            });
        } else {
            $subtotal = 0;
            $cartitems = collect();
        }

        if ($couponId) {
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


        $total = $subtotal - $discount;return view('customer.checkout', compact('total', 'subtotal', 'discount', 'cartitems', 'userDetail'));
    }

    public function cart()
    {
        $userId = Auth::id();
        $sessionId = session()->getId();
        $discount = 0;
        $cart = Cart::where(function ($query) use ($userId, $sessionId) {
            if ($userId) {
                $query->where('user_id', $userId);
            } else {
                $query->where('session_id', $sessionId);
            }
        })->first();
        $cartId = $cart?->id;
        if ($cartId) {
            $cartitems = CartItem::with('product')->where('cart_id', $cartId)->get();
            $total = $cartitems->sum(function ($item) {
                return $item->price * $item->quantity;
            });
        } else {
            $total = 0;
            $cartitems = collect();
        }
        $discountedPrice = $total - $discount;
        return view('customer.cart', compact('cartitems', 'total', 'discountedPrice'));
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

    // Product + Size + Color ke basis par cart item check karo
    $cartItem = CartItem::where('cart_id', $cart->id)
        ->where('product_id', $product->id)
        ->where('size_id', $request->size_id)
        ->where('color_id', $request->color_id)
        ->first();

    if ($cartItem) {

        // Same product + same size + same color hai
        $cartItem->increment('quantity', $request->quantity);

    } else {
        $size = $product->sizes->where('id', $request->size_id)->first();
        $unitPrice = $size?->pivot?->price
                                    ?? $item->price
                                    ?? $product->sale_price;
        // Different size/color hai -> new cart item
        CartItem::create([
            'cart_id'    => $cart->id,
            'product_id' => $product->id,
            'quantity'   => $request->quantity,
            'price'      => $unitPrice,
            'color_id'   => $request->color_id,
            'size_id'    => $request->size_id,
        ]);
    }

    return redirect()
        ->route('customer.cart')
        ->with('success', 'Added to cart successfully');
}
    public function increase($item)
    {
        $cartItem = CartItem::findOrFail($item);

        $cartItem->quantity += 1;
        $cartItem->save();

        return back();
    }


    public function decrease($item)
    {
        $cartItem = CartItem::findOrFail($item);

        if ($cartItem->quantity > 1) {
            $cartItem->quantity -= 1;
            $cartItem->save();
        }

        return back();
    }

    public function removeCartitems(string $id)
    {
        $cart = CartItem::where('cart_id', $id)->first();

        if ($cart) {
            CartItem::where('cart_id', $id)->delete();
            Cart::where('id', $id)->delete();
        }

        return redirect('/shop')->with('success', 'Cart item removed successfully.');
    }



    public function shop(Request $request)
    {
        $category   = $request->category ?? '';
        $search     = $request->search ?? '';
        $sort       = $request->sort ?? '';
        $size       = $request->size ?? [];
       if(!empty($size)){
        $size = Size::whereIn('name', $size)->pluck('id');
       }
        
         
        $products = Product::with(['reviews','sizes', 'category', 'wishlist' => function ($query) {
            $query->where('user_id', Auth::id());
        }])
            ->when($category, function ($query) use ($category) {
                $query->whereHas('category', function ($query) use ($category) {
                    $query->where('slug', $category);
                });
            })
            ->when($search, function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', '%' . $search . '%');
                });
            })
            ->when($sort, function ($query) use ($sort) {
                if ($sort === 'low') {
                    $query->orderBy('sale_price', 'ASC');
                } else if ($sort === 'high') {
                    $query->orderBy('sale_price', 'DESC');
                } else {
                    $query->latest();
                }
            })
            ->when($size, function ($query) use ($size) {
                $query->whereHas('sizes', function ($query) use ($size) {
                    $query->whereIn('size_id', $size);
                });
            })
            ->paginate(10);
        $productCount = Product::count();
        $categories = Category::withCount('products')->get();
        $sizes = Size::all();
        return view('customer.shop', compact('products', 'productCount', 'categories', 'sizes'));
    }

    public function productDetail($slug)
    {
        $product = Product::with('category')
            ->where('slug', $slug)
            ->firstOrFail();
        return view('customer.product-detail', compact('product'));
    }

    public function wishlist()
    {
        $products = Product::whereHas('wishlist', function ($query) {
            $query->where('user_id', Auth::id());
        })
            ->with('category')
            ->get();

        return view('customer.wishlist', compact('products'));
    }

    public function orderPlaced()
    {
        return view('customer.order-success');
    }

    public function profile()
    {
        return view('customer.profile');
    }

    public function profileEdit()
    {
        return view('customer.profile-edit');
    }

    public function profileUpdate(Request $request, string $id)
    {
        $request->validate([
            'name'      => 'required|string|max:45',
            'email'     => 'required',
            'phone'     => 'required|digits:10',
            'zipcode'   => 'required|digits:6'
        ]);

        $user = User::find($id);
        if ($user) {
            $user->name = $request->name;
            $user->email = $request->email;
            if ($user->update()) {
                $user->userInfo->update([
                    'phone'     => $request->phone,
                    'zipcode'   => $request->zipcode,
                    'address'   => $request->address,
                    'landmark'  => $request->landmark
                ]);
                return redirect()->route('profile')->with('success', 'Detail updated successfully');
            }
        } else {
            return back()->withErrors('error', 'Something went wrong');
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

    public function subscribe(Request $request)
    {
        if (Auth::id()) {
            $email = auth()->user()->email;
            $name = auth()->user()->name;
        } else {
            $name = $email = $request->email;
        }

        Mail::to($email)->send(new SubscriptionMail($name));
        return back()->with('success', 'Subscribed successfully!');
        // Route::get('/test-subscription-mail', function () {
        //     $products = Product::limit(4)->get();

        //     return view('mail.subscription-mail', [
        //         'name' => 'Salman',
        //         'products' => $products,
        //     ]);
        // });
    }

    public function productReview($orderId){
        $order = Order::find($orderId);
        return view('customer.product-review',compact('order'));
    }

    public function productReviewStore(Request $request){
        $review = ProductReview::create([
            'product_id'    => $request->product_id,
            'user_id'       => Auth::id(),
            'order_id'      => $request->order_id,
            'rating'        => $request->rating,
            'review'        => $request->review,
            'status'        => 1
        ]);

        if($review){
      
    return redirect()->route('product.review.thankyou');
}
        
    }

    public function notify(String $productId){
        $notify = ProductNotify::create([
            'product_id'    => $productId,
            'user_id'       => Auth::id()
        ]);

        if(!empty($notify)){
            return redirect('/shop')->with('success','Product reminder set successfully');
        }
    }
}
