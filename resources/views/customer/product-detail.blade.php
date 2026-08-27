@extends('layouts.customer.customer-layout')

@section('customerContent')

<div class="bg-gray-50 min-h-screen">

    {{-- Breadcrumb --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8">

        <div class="flex items-center gap-2 text-sm text-gray-500">

            <a href="#"
               class="hover:text-black">
                Home
            </a>

            <span>/</span>

            <a href="{{ route('customer.shop') }}"
               class="hover:text-black">
                Shop
            </a>

            <span>/</span>

            <span class="text-gray-900">
                {{ $product->name }}
            </span>

        </div>

    </div>


    {{-- PRODUCT --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <div class="grid lg:grid-cols-2 gap-12">

            {{-- LEFT : IMAGE --}}
            <div>

                <div class="relative bg-white
                            rounded-3xl overflow-hidden
                            border border-gray-100">

                    {{-- Badge --}}
                    <span class="absolute top-5 left-5 z-10
                                 bg-black text-white
                                 px-3 py-1.5 rounded-lg
                                 text-xs font-semibold">
                        NEW
                    </span>

                    {{-- Wishlist --}}
                    <button
                        type="button"
                        class="absolute top-5 right-5 z-10
                               w-11 h-11 rounded-full
                               bg-white shadow
                               flex items-center justify-center
                               text-xl
                               hover:bg-black
                               hover:text-white
                               transition">
                        ♡
                    </button>

                    <img
                        src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->name }}"
                        class="w-full aspect-[4/5]
                               object-cover">

                </div>


                {{-- Thumbnail --}}
                <div class="flex gap-3 mt-4">

                    <div class="w-20 h-20 rounded-xl
                                overflow-hidden
                                border-2 border-black">

                        <img
                            src="{{ asset('storage/' . $product->image) }}"
                            class="w-full h-full object-cover">

                    </div>

                </div>

            </div>


            {{-- RIGHT : DETAILS --}}
            <div class="lg:pt-5">

                {{-- Category --}}
                <p class="text-sm text-gray-500">
                    {{ $product->category->name ?? 'Men Collection' }}
                </p>


                {{-- Name --}}
                <h1 class="text-3xl sm:text-4xl
                           font-bold text-gray-900 mt-2">
                    {{ $product->name }}
                </h1>


                {{-- Rating --}}
                <div class="flex items-center gap-3 mt-4">

                    <div class="text-yellow-500 text-lg">
                        ★★★★★
                    </div>

                    <span class="text-sm text-gray-500">
                        4.8 (24 Reviews)
                    </span>

                </div>


                {{-- Price --}}
                <div class="flex items-center gap-3 mt-6">

                    <span class="text-3xl font-bold">
                        ₹{{ $product->discount_price ?? $product->price }}
                    </span>

                    @if($product->discount_price)

                        <span class="text-lg text-gray-400
                                     line-through">
                            ₹{{ $product->price }}
                        </span>

                        <span class="bg-green-100
                                     text-green-700
                                     px-2.5 py-1
                                     rounded-lg
                                     text-xs font-semibold">

                            {{ round((($product->price - $product->discount_price) / $product->price) * 100) }}% OFF

                        </span>

                    @endif

                </div>


                {{-- Description --}}
                <div class="mt-6">

                    <h3 class="font-semibold text-lg">
                        Product Description
                    </h3>

                    <p class="text-gray-500 leading-7 mt-2">
                        {{ $product->description }}
                    </p>

                </div>


                <div class="border-t border-gray-200 mt-7 pt-7">

                    {{-- COLOR --}}
                    <div>

                        <div class="flex justify-between">

                            <label class="font-semibold">
                                Color
                            </label>

                            <span class="text-sm text-gray-500">
                                Black
                            </span>

                        </div>

                        <div class="flex gap-3 mt-4">

                            <button
                                type="button"
                                class="w-9 h-9 rounded-full
                                       bg-black
                                       ring-2 ring-offset-2
                                       ring-black">
                            </button>

                            <button
                                type="button"
                                class="w-9 h-9 rounded-full
                                       bg-gray-500
                                       border">
                            </button>

                            <button
                                type="button"
                                class="w-9 h-9 rounded-full
                                       bg-blue-900
                                       border">
                            </button>

                        </div>

                    </div>


                    {{-- SIZE --}}
                    <div class="mt-7">

                        <div class="flex justify-between">

                            <label class="font-semibold">
                                Size
                            </label>

                            <a href="#"
                               class="text-sm underline">
                                Size Guide
                            </a>

                        </div>

                        <div class="flex flex-wrap gap-3 mt-4">

                            @foreach(['S','M','L','XL','XXL'] as $size)

                                <button
                                    type="button"
                                    class="min-w-12 px-4 py-2.5
                                           rounded-xl
                                           border border-gray-300
                                           text-sm font-semibold
                                           hover:border-black
                                           hover:bg-black
                                           hover:text-white
                                           transition">

                                    {{ $size }}

                                </button>

                            @endforeach

                        </div>

                    </div>


                    {{-- QUANTITY --}}
                    <div class="mt-7">

                        <label class="font-semibold">
                            Quantity
                        </label>

                        <div class="flex items-center
                                    w-fit mt-3
                                    border border-gray-300
                                    rounded-xl overflow-hidden">

                            <button
                                type="button"
                                onclick="decreaseQty()"
                                class="w-11 h-11
                                       hover:bg-gray-100
                                       text-lg">
                                −
                            </button>

                            <input
                                id="quantity"
                                type="number"
                                value="1"
                                min="1"
                                class="w-12 h-11
                                       text-center
                                       border-x
                                       border-gray-300
                                       outline-none">

                            <button
                                type="button"
                                onclick="increaseQty()"
                                class="w-11 h-11
                                       hover:bg-gray-100
                                       text-lg">
                                +
                            </button>

                        </div>

                    </div>


                    {{-- BUTTONS --}}
                    <div class="grid sm:grid-cols-2 gap-3 mt-8">

                        <form
                            action="{{ route('cart.add', $product->id) }}"
                            method="POST">

                            @csrf

                            <input
                                type="hidden"
                                name="quantity"
                                id="cart-quantity"
                                value="1">

                            <button
                                type="submit"
                                class="w-full h-14
                                       bg-black text-white
                                       rounded-2xl
                                       font-semibold
                                       hover:bg-gray-800
                                       transition">

                                Add to Cart

                            </button>

                        </form>


                        <button
                            type="button"
                            class="w-full h-14
                                   border-2 border-black
                                   rounded-2xl
                                   font-semibold
                                   hover:bg-black
                                   hover:text-white
                                   transition">

                            Buy Now

                        </button>

                    </div>


                    {{-- FEATURES --}}
                    <div class="grid grid-cols-3
                                gap-3 mt-8">

                        <div class="text-center">

                            <div class="text-xl">
                                🚚
                            </div>

                            <p class="text-xs font-semibold mt-2">
                                Fast Delivery
                            </p>

                        </div>

                        <div class="text-center">

                            <div class="text-xl">
                                ↩️
                            </div>

                            <p class="text-xs font-semibold mt-2">
                                Easy Returns
                            </p>

                        </div>

                        <div class="text-center">

                            <div class="text-xl">
                                🔒
                            </div>

                            <p class="text-xs font-semibold mt-2">
                                Secure Payment
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- REVIEWS --}}
    <section class="bg-white border-t">

        <div class="max-w-7xl mx-auto
                    px-4 sm:px-6 lg:px-8
                    py-14">

            <h2 class="text-2xl font-bold">
                Customer Reviews
            </h2>

            <div class="flex items-center gap-4 mt-5">

                <span class="text-4xl font-bold">
                    4.8
                </span>

                <div>

                    <div class="text-yellow-500">
                        ★★★★★
                    </div>

                    <p class="text-sm text-gray-500 mt-1">
                        Based on 24 reviews
                    </p>

                </div>

            </div>

        </div>

    </section>

</div>


<script>

function increaseQty() {

    let input = document.getElementById('quantity');

    input.value = parseInt(input.value) + 1;

    document.getElementById('cart-quantity').value =
        input.value;
}


function decreaseQty() {

    let input = document.getElementById('quantity');

    let value = parseInt(input.value);

    if (value > 1) {

        input.value = value - 1;

        document.getElementById('cart-quantity').value =
            input.value;
    }
}

</script>

@endsection