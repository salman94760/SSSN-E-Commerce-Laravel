@extends('layouts.customer.customer-layout')

@section('title', 'SSSN | CART')

@section('customerContent')

@php
    $itemCount = $cartitems->sum('quantity');
@endphp


{{-- =========================================================
    CART HEADER
========================================================= --}}
<section class="bg-white border-b border-gray-200">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-12">

        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">

            {{-- Heading --}}
            <div>

                <div class="flex items-center gap-2 mb-3">

                    <span class="w-1.5 h-1.5 rounded-full bg-black"></span>

                    <span class="text-xs uppercase tracking-[0.2em] font-semibold text-gray-400">
                        Shopping Bag
                    </span>

                </div>


                <div class="flex flex-wrap items-center gap-3">

                    <h1 class="text-4xl sm:text-5xl font-bold tracking-tight text-gray-900">
                        Your Cart
                    </h1>

                    <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-sm font-semibold text-gray-600">
                        {{ $itemCount }}
                        {{ $itemCount == 1 ? 'Item' : 'Items' }}
                    </span>

                </div>


                <p class="mt-3 max-w-xl text-sm sm:text-base text-gray-500 leading-6">
                    Review your selected products, sizes and colors before proceeding
                    to checkout.
                </p>

            </div>


            {{-- Continue Shopping --}}
            <a href="{{ url('/shop') }}"
               class="inline-flex items-center justify-center gap-2
                      rounded-xl border border-gray-300
                      bg-white px-5 py-3
                      text-sm font-semibold text-gray-800
                      transition duration-200
                      hover:bg-black hover:text-white hover:border-black">

                <svg class="w-4 h-4"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="1.8"
                          d="M19 12H5m7 7-7-7 7-7"/>

                </svg>

                Continue Shopping

            </a>

        </div>


    </div>

</section>



{{-- =========================================================
    CART CONTENT
========================================================= --}}
<section class="bg-gray-50 min-h-screen">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 lg:py-10">

        <div class="grid lg:grid-cols-3 gap-8">


            {{-- =================================================
                CART ITEMS
            ================================================= --}}
            <div class="lg:col-span-2">


                @if($cartitems->count())


                    <div class="space-y-4">


                        @foreach($cartitems as $item)

                            @php

                                $size = $item->product->sizes
                                    ->where('id', $item->size_id)
                                    ->first();

                                $unitPrice = $size?->pivot?->price
                                    ?? $item->price
                                    ?? $item->product->sale_price;

                                $itemTotal = $unitPrice * $item->quantity;

                            @endphp


                            {{-- PRODUCT CARD --}}
                            <div class="bg-white border border-gray-200 rounded-2xl p-4 sm:p-5
                                        transition duration-200 hover:shadow-sm">


                                <div class="flex gap-4 sm:gap-5">


                                    {{-- IMAGE --}}
                                    <div class="w-28 h-32 sm:w-36 sm:h-40
                                                rounded-xl overflow-hidden
                                                bg-gray-100 shrink-0">

                                        @if($item->product->images->first())

                                            <img
                                                src="{{ asset('storage/'.$item->product->images->first()->name) }}"
                                                alt="{{ $item->product->name }}"
                                                class="w-full h-full object-cover">

                                        @else

                                            <div class="w-full h-full flex items-center justify-center text-xs text-gray-400">
                                                No Image
                                            </div>

                                        @endif

                                    </div>


                                    {{-- PRODUCT INFO --}}
                                    <div class="flex-1 min-w-0">


                                        {{-- Top --}}
                                        <div class="flex justify-between gap-4">


                                            <div class="min-w-0">

                                                <p class="text-xs uppercase tracking-wider text-gray-400">
                                                    Premium Collection
                                                </p>


                                                <h3 class="font-bold text-base sm:text-lg text-gray-900 mt-1 truncate">
                                                    {{ $item->product->name }}
                                                </h3>


                                                {{-- Variant --}}
                                                <div class="flex flex-wrap items-center gap-x-4 gap-y-2 mt-3 text-xs sm:text-sm text-gray-500">

                                                    <span>
                                                        <span class="text-gray-400">Size:</span>
                                                        <span class="font-medium text-gray-700">
                                                            {{ $item->size->name ?? 'N/A' }}
                                                        </span>
                                                    </span>


                                                    <span>
                                                        <span class="text-gray-400">Color:</span>
                                                        <span class="font-medium text-gray-700">
                                                            {{ $item->color->name ?? 'N/A' }}
                                                        </span>
                                                    </span>


                                                    <span>
                                                        <span class="text-gray-400">Price:</span>
                                                        <span class="font-semibold text-gray-900">
                                                            ₹{{ number_format($unitPrice, 2) }}
                                                        </span>
                                                    </span>

                                                </div>

                                            </div>


                                            {{-- REMOVE --}}
                                         <!--     <form method="POST" action="{{ url('remove-item/' . $item->cart_id) }}">
                                 <button class="text-gray-400 hover:text-red-500">
                                    🗑
                                </button>     
                                </form> -->

                                            <form
                                                method="POST"
                                                action="{{ url('remove-item/'.$item->id) }}"
                                                class="shrink-0">

                                                @csrf

                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    title="Remove item"
                                                    class="w-9 h-9 rounded-lg
                                                           flex items-center justify-center
                                                           text-gray-400
                                                           hover:text-red-500
                                                           hover:bg-red-50
                                                           transition">

                                                    <svg class="w-5 h-5"
                                                         fill="none"
                                                         stroke="currentColor"
                                                         viewBox="0 0 24 24">

                                                        <path stroke-linecap="round"
                                                              stroke-linejoin="round"
                                                              stroke-width="1.7"
                                                              d="M6 7h12m-9 0V5h6v2m-7 0 1 13h6l1-13M10 11v5m4-5v5"/>

                                                    </svg>

                                                </button>

                                            </form>

                                        </div>



                                        {{-- Bottom --}}
                                        <div class="flex flex-col sm:flex-row
                                                    sm:items-end
                                                    justify-between
                                                    gap-4 mt-6">


                                            {{-- Quantity --}}
                                            <div>

                                                <p class="text-xs text-gray-400 mb-2">
                                                    Quantity
                                                </p>


                                                <div class="inline-flex items-center
                                                            border border-gray-200
                                                            rounded-xl overflow-hidden">


                                                    {{-- Minus --}}
                                                    <form
                                                        action="{{ route('cart.decrease', $item->id) }}"
                                                        method="POST">

                                                        @csrf

                                                        <button
                                                            type="submit"
                                                            class="w-10 h-10
                                                                   flex items-center justify-center
                                                                   text-gray-700
                                                                   hover:bg-gray-100
                                                                   transition
                                                                   disabled:opacity-40"
                                                            @if($item->quantity <= 1) disabled @endif>

                                                            −

                                                        </button>

                                                    </form>


                                                    {{-- Quantity --}}
                                                    <span class="w-10 text-center text-sm font-semibold">
                                                        {{ $item->quantity }}
                                                    </span>


                                                    {{-- Plus --}}
                                                    <form
                                                        action="{{ route('cart.increase', $item->id) }}"
                                                        method="POST">

                                                        @csrf

                                                        <button
                                                            type="submit"
                                                            class="w-10 h-10
                                                                   flex items-center justify-center
                                                                   text-gray-700
                                                                   hover:bg-gray-100
                                                                   transition">

                                                            +

                                                        </button>

                                                    </form>

                                                </div>

                                            </div>


                                            {{-- Total --}}
                                            <div class="sm:text-right">

                                                <p class="text-xs text-gray-400 mb-1">
                                                    Item Total
                                                </p>

                                                <p class="font-bold text-lg sm:text-xl text-gray-900">
                                                    ₹{{ number_format($itemTotal, 2) }}
                                                </p>

                                            </div>

                                        </div>



                                        {{-- Stock / Delivery --}}
                                        <div class="flex flex-wrap gap-4 mt-5 pt-4 border-t border-gray-100">

                                            <span class="inline-flex items-center gap-1.5 text-xs text-green-600">

                                                <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>

                                                In Stock

                                            </span>


                                            <span class="text-xs text-gray-400">
                                                Estimated delivery: 3–5 business days
                                            </span>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>


                    {{-- Continue Shopping --}}
                    <div class="mt-6">

                        <a href="{{ url('/shop') }}"
                           class="inline-flex items-center gap-2
                                  text-sm font-semibold text-gray-700
                                  hover:text-black transition">

                            <span>←</span>
                            Continue Shopping

                        </a>

                    </div>


                @else


                    {{-- EMPTY CART --}}
                    <div class="bg-white border border-gray-200
                                rounded-3xl px-6 py-16 text-center">

                        <div class="w-16 h-16 mx-auto rounded-full
                                    bg-gray-100 flex items-center justify-center">

                            <svg class="w-7 h-7 text-gray-500"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="1.7"
                                      d="M3 3h2l2.4 12.2a2 2 0 0 0 2 1.6h7.8a2 2 0 0 0 2-1.6L21 7H6"/>

                                <circle cx="10" cy="20" r="1"/>
                                <circle cx="18" cy="20" r="1"/>

                            </svg>

                        </div>


                        <h2 class="text-xl font-bold text-gray-900 mt-5">
                            Your cart is empty
                        </h2>

                        <p class="text-sm text-gray-500 mt-2">
                            Looks like you haven't added anything to your cart yet.
                        </p>


                        <a href="{{ url('/shop') }}"
                           class="inline-flex items-center justify-center
                                  mt-6 px-6 py-3 rounded-xl
                                  bg-black text-white
                                  text-sm font-semibold
                                  hover:bg-gray-800 transition">

                            Start Shopping

                        </a>

                    </div>

                @endif

            </div>



            {{-- =================================================
                ORDER SUMMARY
            ================================================= --}}
            @if($cartitems->count())

                <div>

                    <div class="bg-white border border-gray-200
                                rounded-3xl p-6 lg:p-7
                                sticky top-28">


                        <h2 class="text-xl font-bold text-gray-900">
                            Order Summary
                        </h2>


                        <p class="text-xs text-gray-400 mt-1">
                            {{ $itemCount }} {{ $itemCount == 1 ? 'item' : 'items' }} in your bag
                        </p>



                        {{-- SUMMARY --}}
                        <div class="mt-7 space-y-4 text-sm">


                            {{-- Subtotal --}}
                            <div class="flex justify-between items-center">

                                <span class="text-gray-500">
                                    Subtotal
                                </span>

                                <span class="font-semibold text-gray-900">
                                    ₹{{ number_format($total, 2) }}
                                </span>

                            </div>


                            {{-- Shipping --}}
                            <div class="flex justify-between items-center">

                                <span class="text-gray-500">
                                    Shipping
                                </span>

                                <span class="font-semibold text-green-600">
                                    Free
                                </span>

                            </div>


                            {{-- Discount --}}
                            <div class="flex justify-between items-center">

                                <span class="text-gray-500">
                                    Discount
                                </span>

                                @if(session('coupon'))

                                    <span class="font-semibold text-green-600">
                                        - ₹{{ number_format(session('coupon.discount'), 2) }}
                                    </span>

                                @else

                                    <span class="font-semibold text-gray-900">
                                        - ₹0.00
                                    </span>

                                @endif

                            </div>

                        </div>



                        {{-- TOTAL --}}
                        <div class="border-t border-gray-200 mt-6 pt-5">

                            <div class="flex items-end justify-between gap-4">

                                <div>

                                    <p class="font-semibold text-gray-900">
                                        Total
                                    </p>

                                    <p class="text-xs text-gray-400 mt-1">
                                        Inclusive of applicable taxes
                                    </p>

                                </div>


                                <span class="text-2xl font-bold text-gray-900">
                                    ₹{{ number_format($discountedPrice, 2) }}
                                </span>

                            </div>

                        </div>



                        {{-- =================================================
                            COUPON
                        ================================================= --}}
                        <div class="mt-6 rounded-2xl
                                    border border-gray-200
                                    bg-gray-50 p-5">


                            @if(session('coupon'))

                                {{-- Applied Coupon --}}
                                <div class="flex items-start justify-between gap-3">

                                    <div>

                                        <p class="text-xs uppercase tracking-wider text-gray-400">
                                            Coupon Applied
                                        </p>

                                        <p class="text-sm font-bold text-green-700 mt-1">
                                            {{ session('coupon.code') }}
                                        </p>

                                        <p class="text-xs text-green-600 mt-1">
                                            You saved ₹{{ number_format(session('coupon.discount'), 2) }}
                                        </p>

                                    </div>


                                    <form
                                        action="{{ route('coupon.remove') }}"
                                        method="POST">

                                        @csrf

                                        <button
                                            type="submit"
                                            class="text-xs font-semibold text-red-600
                                                   hover:text-red-700">

                                            Remove

                                        </button>

                                    </form>

                                </div>


                            @else

                                <h3 class="font-semibold text-gray-900">
                                    Have a Coupon?
                                </h3>

                                <p class="text-xs text-gray-500 mt-1 mb-4">
                                    Enter your promo code to get a discount.
                                </p>


                                <form
                                    action="{{ route('coupon.apply') }}"
                                    method="POST"
                                    class="flex gap-2">

                                    @csrf

                                    <input
                                        type="text"
                                        name="coupon_code"
                                        placeholder="ENTER CODE"
                                        value="{{ old('coupon_code') }}"
                                        class="min-w-0 flex-1 rounded-xl
                                               border border-gray-300
                                               bg-white px-3 sm:px-4 py-2.5
                                               text-sm uppercase
                                               outline-none
                                               focus:border-black
                                               focus:ring-1 focus:ring-black">


                                    <button
                                        type="submit"
                                        class="rounded-xl bg-gray-900
                                               px-4 sm:px-5 py-2.5
                                               text-sm font-semibold text-white
                                               hover:bg-black transition">

                                        Apply

                                    </button>

                                </form>


                                @if($errors->has('coupon_code'))

                                    <div class="mt-3 flex items-start gap-2
                                                rounded-lg bg-red-50 px-3 py-2.5">

                                        <svg class="w-4 h-4 text-red-500 mt-0.5 shrink-0"
                                             fill="none"
                                             stroke="currentColor"
                                             viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  stroke-width="2"
                                                  d="M12 8v4m0 4h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0"/>

                                        </svg>

                                        <p class="text-xs text-red-600">
                                            {{ $errors->first('coupon_code') }}
                                        </p>

                                    </div>

                                @endif

                            @endif

                        </div>



                        {{-- CHECKOUT BUTTON --}}
                        <a href="{{ url('/checkout') }}"
                           class="flex items-center justify-center gap-2
                                  w-full h-14 mt-6
                                  rounded-xl
                                  bg-black text-white
                                  font-semibold
                                  hover:bg-gray-800
                                  transition duration-200">

                            Proceed to Checkout

                            <svg class="w-4 h-4"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="1.8"
                                      d="M5 12h14m-6-6 6 6-6 6"/>

                            </svg>

                        </a>



                        {{-- Secure Message --}}
                        <div class="flex items-center justify-center
                                    gap-2 mt-4 text-xs text-gray-400">

                            <svg class="w-4 h-4"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="1.7"
                                      d="M12 15v2m-6 4h12a2 2 0 0 0 2-2V11a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2Zm3-8V7a3 3 0 0 1 6 0v2"/>

                            </svg>

                            Secure and encrypted checkout

                        </div>

                    </div>

                </div>

            @endif

        </div>

    </div>

</section>


@endsection