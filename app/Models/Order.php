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
        'gateway_order_id',
        'transaction_id',
        'payment_status',
        'order_status',
        'shipping_address',
        'cancel_by'
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

    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }



    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }
}
