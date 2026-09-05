<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'total',
        'color_id',
        'size_id'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function size(){
        return $this->belongsTo(Size::class,'size_id','id');
    }

    public function color(){
        return $this->belongsTo(Color::class,'color_id','id');
    }
}