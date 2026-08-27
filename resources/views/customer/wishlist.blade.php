@extends('layouts.customer.customer-layout')

@section('title', 'SSSN | WISHLIST')

@section('customerContent')


{{-- HERO --}}
<section class="bg-white border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="flex flex-col sm:flex-row sm:items-end
                    justify-between gap-5">

            <div>
                <span class="text-xs uppercase tracking-widest text-gray-400">
                    Your Collection
                </span>

                <h1 class="text-4xl font-bold mt-3">
                    My Wishlist
                </h1>

                <p class="text-gray-500 mt-2">
                    Products you've saved for later.
                </p>
            </div>

            <span class="text-sm text-gray-500">
                4 saved items
            </span>

        </div>
    </div>
</section>


{{-- WISHLIST --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">

        @php
            $wishlistProducts = [
                [
                    'id' => 1,
                    'name' => 'Classic Black Hoodie',
                    'price' => 1299,
                    'old_price' => 1699,
                    'image' => 'https://images.unsplash.com/photo-1556821840-3a63f95609a7?w=700',
                    'rating' => 4.8,
                ],
                [
                    'id' => 2,
                    'name' => 'Premium Cotton T-Shirt',
                    'price' => 799,
                    'old_price' => 999,
                    'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=700',
                    'rating' => 4.6,
                ],
                [
                    'id' => 3,
                    'name' => 'Relaxed Fit Lower',
                    'price' => 999,
                    'old_price' => 1299,
                    'image' => 'https://images.unsplash.com/photo-1552902865-b72c031ac5ea?w=700',
                    'rating' => 4.7,
                ],
                [
                    'id' => 4,
                    'name' => 'Everyday Sneakers',
                    'price' => 1799,
                    'old_price' => 2299,
                    'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=700',
                    'rating' => 4.9,
                ],
            ];
        @endphp


        @foreach($products as $product)

            <div class="bg-white border border-gray-200
                        rounded-2xl overflow-hidden
                        group hover:shadow-xl transition">

                <div class="relative aspect-square overflow-hidden bg-gray-100">

                    <img src="{{asset('storage/'.$product->image)}}"
                         class="w-full h-full object-cover
                                group-hover:scale-105 transition duration-500">

                    <button
            type="button" id="product_{{$product->id}}" onclick="wishListProduct({{ $product->id }})"
            class="absolute top-3 right-3 z-10
                   w-9 h-9 rounded-full
                   bg-white/90
                   flex items-center justify-center
                   shadow-sm
                   hover:bg-black hover:text-white
                   transition">

               @if($product->wishlist->isNotEmpty())
        <span id="heart_{{ $product->id }}">♥</span>
    @else
        <span id="heart_{{ $product->id }}">♡</span>
    @endif

        </button>

                </div>

                <div class="p-5">

                    <div class="flex items-center gap-1 text-xs">
                        <span>★</span>
                        <span class="font-semibold">
                            {{ $product['rating'] }}
                        </span>
                    </div>

                    <h3 class="font-semibold mt-2">
                        {{ $product->name }}
                    </h3>

                    <div class="flex items-center gap-2 mt-3">

                        <span class="font-bold text-lg">
                            ₹{{ number_format($product->sale_price) }}
                        </span>

                        <span class="text-sm text-gray-400 line-through">
                            ₹{{ number_format($product->price) }}
                        </span>

                    </div>

                    <div class="flex gap-2 mt-5">

                        <button
                            class="flex-1 h-11 rounded-xl
                                   bg-black text-white text-sm
                                   font-semibold hover:bg-gray-800">
                            Add to Cart
                        </button>


                    </div>

                </div>

            </div>

        @endforeach

    </div>

</section>

@endsection