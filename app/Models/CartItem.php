<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = ['cart_id', 'product_id', 'quantity', 'price', 'color_id', 'size_id'];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }

    public function color(){
        return $this->belongsTo(Color::class,'color_id');
    }

    public function getSizeNameAttribute()
    {
        return $this->size?->name;
    }

    public function getColorNameAttribute()
    {
        return $this->color?->name;
    }
}
