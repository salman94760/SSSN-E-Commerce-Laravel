<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    'customer_id',
    'coupon_id',
    'coupon_code',
    'discount_amount',
    'order_number',
    'subtotal',
    'shipping_charge',
    'total_amount',
    'payment_method',
    'payment_status',
    'order_status',
    'shipping_address',
];

    public function userInfo()
{
    return $this->belongsTo(
        user_info::class,
        'customer_id',
        'user_id'
    );
}



    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function coupon()
{
    return $this->belongsTo(Coupon::class);
}
}
