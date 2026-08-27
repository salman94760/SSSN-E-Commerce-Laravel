<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Ramsey\Collection\Collection;
use Exception; // Import global exception class
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::with('orders')->paginate(10);
        return view('dashboard.coupons.index',compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    try{
        $request->validate([
        'code' => 'required|string|max:50|unique:coupons,code',
        'type' => 'required|in:percentage,fixed',
        'value' => 'required|numeric|min:0',
        'min_order_amount' => 'nullable|numeric|min:0',
        'max_discount' => 'nullable|numeric|min:0',
        'usage_limit' => 'nullable|integer|min:1',
        'expires_at' => 'nullable|date',
    ]);

    if (
        $request->type === 'percentage' &&
        $request->value > 100
    ) {
        return back()
            ->withErrors([
                'value' => 'Percentage cannot be more than 100.'
            ])
            ->withInput();
    }

    Coupon::create([
        'code' => strtoupper($request->code),
        'type' => $request->type,
        'value' => $request->value,
        'min_order_amount' => $request->min_order_amount ?? 0,
        'max_discount' => $request->max_discount,
        'usage_limit' => $request->usage_limit,
        'expires_at' => $request->expires_at,
        'is_active' => true,
    ]);

    return redirect()
        ->route('coupons.index')
        ->with('success', 'Coupon created successfully.');
    }catch (Exception $e) {
        dd($e);
    }
    
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('dashboard.coupons.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $coupons = Coupon::with('orders')->findOrFail($id);
        return view('dashboard.coupons.edit',compact('coupons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'code' => 'required|string|max:50',
            'type' => 'required|in:percentage,fixed',
            'value' => 'required|numeric|min:0',
            'min_order_amount' => 'nullable|numeric|min:0',
            'max_discount' => 'nullable|numeric|min:0',
            'usage_limit' => 'nullable|integer|min:1',
            'expires_at' => 'nullable|date',
        ]);
        if (
        $request->type === 'percentage' &&
        $request->value > 100
        ) {
            return back()
                ->withErrors([
                    'value' => 'Percentage cannot be more than 100.'
                ])->withInput();
        }

        $coupon = Coupon::findOrFail($id);
        if($coupon){
            $coupon->update([
                'code' => strtoupper($request->code),
                'type' => $request->type,
                'value' => $request->value,
                'min_order_amount' => $request->min_order_amount ?? 0,
                'max_discount' => $request->max_discount,
                'usage_limit' => $request->usage_limit,
                'expires_at' => $request->expires_at,
                'is_active' => true,
            ]);   
        }
       return redirect()
        ->route('coupons.index')
        ->with('success', 'Coupon updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function apply(Request $request)
{
    $request->validate([
        'coupon_code' => 'required|string',
    ]);

    $coupon = Coupon::where(
        'code',
        strtoupper($request->coupon_code)
    )->first();

    if (!$coupon) {
        return back()->withErrors([
            'coupon_code' => 'Invalid coupon code.'
        ]);
    }


    if (!$coupon->is_active) {
        return back()->withErrors([
            'coupon_code' => 'This coupon is inactive.'
        ]);
    }


    if (
        $coupon->starts_at &&
        now()->lt($coupon->starts_at)
    ) {
        return back()->withErrors([
            'coupon_code' => 'This coupon is not active yet.'
        ]);
    }


    if (
        $coupon->expires_at &&
        now()->gt($coupon->expires_at)
    ) {
        return back()->withErrors([
            'coupon_code' => 'This coupon has expired.'
        ]);
    }


    if (
        $coupon->usage_limit &&
        $coupon->used_count >= $coupon->usage_limit
    ) {
        return back()->withErrors([
            'coupon_code' => 'Coupon usage limit reached.'
        ]);
    }

    
    // Cart subtotal
    
    $cartId = Cart::where('user_id', Auth::id())->first();
    $subtotal = CartItem::where('cart_id', $cartId->id)
        ->with('product')
        ->get()
        ->sum(function ($item) {
            return $item->product->sale_price * $item->quantity;
        });
      
  

    if ($subtotal < $coupon->min_order_amount) {
        return back()->withErrors([
            'coupon_code' =>
                'Minimum order amount is ₹' .
                number_format($coupon->min_order_amount, 2)
        ]);
    }


    // Calculate discount
    if ($coupon->type === 'percentage') {

        $discount = ($subtotal * $coupon->value) / 100;

    } else {

        $discount = $coupon->value;

    }


    // Maximum discount
    if (
        $coupon->max_discount &&
        $discount > $coupon->max_discount
    ) {
        $discount = $coupon->max_discount;
    }


    // Discount cannot exceed subtotal
    $discount = min($discount, $subtotal);

  
    session([
        'coupon' => [
            'id' => $coupon->id,
            'code' => $coupon->code,
            'discount' => $discount,
        ]
    ]);



    return back()->with(
        'success',
        'Coupon applied successfully.'
    );
}

public function remove()
{
    session()->forget('coupon');

    return back()->with(
        'success',
        'Coupon removed.'
    );
}
}
