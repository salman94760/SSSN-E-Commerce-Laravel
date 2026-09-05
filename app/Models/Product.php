<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Brand;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ["category_id", "brand_id", "name", "slug", "description", "price", "sale_price", "stock", "image", "status", "user_id"];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class, 'product_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class,'product_color');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'product_tag');
    }

    public function images()
{
    return $this->hasMany(ProductImage::class);
}

public function sizes()
{
    return $this->belongsToMany(Size::class,'product_size', 'product_id', 'size_id')
        ->withPivot('price')
        ->withTimestamps();
}
}
