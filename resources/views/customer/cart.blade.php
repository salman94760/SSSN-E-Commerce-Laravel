
@extends('layouts.customer.customer-layout')

@section('title', 'SSSN | CART')

@section('customerContent')

@php
    $itemCount = $cartitems->sum('quantity');
@endphp

{{-- CART HEADER --}}
<section class="relative overflow-hidden border-b border-[#e8dccb] bg-[#fffdf9]">

    <div class="absolute -right-20 -top-24 h-64 w-64 rounded-full bg-[#e8dccb]/30 blur-3xl"></div>

    <div class="relative mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14">

        <div class="flex flex-col justify-between gap-6 md:flex-row md:items-end">

            <div>
                <div class="mb-3 flex items-center gap-2">
                    <span class="h-1.5 w-1.5 rounded-full bg-[#79654e]"></span>
                    <span class="text-xs font-semibold uppercase tracking-[0.25em] text-[#9b8871]">
                        Shopping Bag
                    </span>
                </div>

                <div class="flex flex-wrap items-center gap-3">
                    <h1 class="text-4xl font-bold tracking-tight text-[#493825] sm:text-5xl">
                        Your Cart
                    </h1>

                    <span class="rounded-full border border-[#e8dccb] bg-[#f5efe6] px-4 py-1.5 text-sm font-semibold text-[#79654e]">
                        {{ $itemCount }} {{ $itemCount == 1 ? 'Item' : 'Items' }}
                    </span>
                </div>

                <p class="mt-3 max-w-xl text-sm leading-6 text-[#8c7b67] sm:text-base">
                    Review your selected products, sizes and colors before proceeding to checkout.
                </p>
            </div>

            <a href="{{ url('/shop') }}"
               class="inline-flex items-center justify-center gap-2 rounded-xl border border-[#d8c7b0] bg-[#fffdf9] px-5 py-3 text-sm font-semibold text-[#493825] shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:border-[#493825] hover:bg-[#493825] hover:text-white">

                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 12H5m7 7-7-7 7-7"/>
                </svg>

                Continue Shopping
            </a>

        </div>
    </div>
</section>


{{-- CART CONTENT --}}
<section class="min-h-screen bg-[#faf7f2]">

    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 lg:py-10">

        <div class="grid gap-8 lg:grid-cols-3">

            {{-- CART ITEMS --}}
            <div class="lg:col-span-2">

                @if($cartitems->count())

                    <div class="space-y-5">

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
                            <div class="group rounded-3xl border border-[#e8dccb] bg-[#fffdf9] p-4 shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:shadow-lg hover:shadow-[#493825]/5 sm:p-5">

                                <div class="flex gap-4 sm:gap-5">

                                    {{-- IMAGE --}}
                                    <div class="h-32 w-28 shrink-0 overflow-hidden rounded-2xl border border-[#eee4d7] bg-[#f5efe6] sm:h-40 sm:w-36">

                                        @if($item->product->images->first())

                                            <img
                                                src="{{ asset('storage/'.$item->product->images->first()->name) }}"
                                                alt="{{ $item->product->name }}"
                                                class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">

                                        @else

                                            <div class="flex h-full w-full items-center justify-center text-xs text-[#a18e76]">
                                                No Image
                                            </div>

                                        @endif

                                    </div>


                                    {{-- PRODUCT INFO --}}
                                    <div class="min-w-0 flex-1">

                                        <div class="flex justify-between gap-3">

                                            <div class="min-w-0">

                                                

                                                <h3 class="mt-1 truncate text-base font-bold text-[#493825] sm:text-lg">
                                                    {{ $item->product->name }}
                                                </h3>

                                                {{-- VARIANTS --}}
                                                <div class="mt-3 flex flex-wrap items-center gap-2">

                                                    <span class="rounded-lg border border-[#e8dccb] bg-[#f8f3eb] px-2.5 py-1 text-xs text-[#79654e]">
                                                        Size:
                                                        <strong class="text-[#493825]">
                                                            {{ $item->size->name ?? 'N/A' }}
                                                        </strong>
                                                    </span>

                                                    <span class="rounded-lg border border-[#e8dccb] bg-[#f8f3eb] px-2.5 py-1 text-xs text-[#79654e]">
                                                        Color:
                                                        <strong class="text-[#493825]">
                                                            {{ $item->color->name ?? 'N/A' }}
                                                        </strong>
                                                    </span>

                                                </div>

                                                <p class="mt-2 text-sm font-semibold text-[#493825]">
                                                    ₹{{ number_format($unitPrice, 2) }}
                                                </p>

                                            </div>


                                            {{-- REMOVE BUTTON --}}
                                            <form
                                                method="POST"
                                                action="{{ url('remove-item/'.$item->id) }}"
                                                class="shrink-0">

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    title="Remove item"
                                                    class="flex h-9 w-9 items-center justify-center rounded-xl border border-[#eee4d7] bg-[#faf7f2] text-[#9b8871] transition-all hover:border-red-200 hover:bg-red-50 hover:text-red-500">

                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M6 7h12m-9 0V5h6v2m-7 0 1 13h6l1-13M10 11v5m4-5v5"/>
                                                    </svg>

                                                </button>

                                            </form>

                                        </div>


                                        {{-- QUANTITY AND TOTAL --}}
                                        <div class="mt-5 flex flex-col justify-between gap-4 sm:flex-row sm:items-end">

                                            {{-- QUANTITY --}}
                                            <div>

                                                <p class="mb-2 text-xs font-medium text-[#9b8871]">
                                                    Quantity
                                                </p>

                                                <div class="inline-flex items-center overflow-hidden rounded-xl border border-[#e8dccb] bg-[#faf7f2]">

                                                    <form action="{{ route('cart.decrease', $item->id) }}" method="POST">
                                                        @csrf

                                                        <button
                                                            type="submit"
                                                            class="flex h-10 w-10 items-center justify-center text-lg font-medium text-[#493825] transition hover:bg-[#e8dccb] disabled:cursor-not-allowed disabled:opacity-40"
                                                            @if($item->quantity <= 1) disabled @endif>
                                                            −
                                                        </button>
                                                    </form>

                                                    <span class="flex h-10 w-10 items-center justify-center border-x border-[#e8dccb] text-sm font-bold text-[#493825]">
                                                        {{ $item->quantity }}
                                                    </span>

                                                    <form action="{{ route('cart.increase', $item->id) }}" method="POST">
                                                        @csrf

                                                        <button
                                                            type="submit"
                                                            class="flex h-10 w-10 items-center justify-center text-lg font-medium text-[#493825] transition hover:bg-[#e8dccb]">
                                                            +
                                                        </button>
                                                    </form>

                                                </div>
                                            </div>


                                            {{-- ITEM TOTAL --}}
                                            <div class="sm:text-right">

                                                <p class="mb-1 text-xs text-[#9b8871]">
                                                    Item Total
                                                </p>

                                                <p class="text-lg font-bold text-[#493825] sm:text-xl">
                                                    ₹{{ number_format($itemTotal, 2) }}
                                                </p>

                                            </div>

                                        </div>


                                        {{-- DELIVERY --}}
                                        <div class="mt-5 flex flex-wrap gap-4 border-t border-[#eee4d7] pt-4">

                                            <span class="inline-flex items-center gap-1.5 text-xs font-medium text-green-700">
                                                <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                                In Stock
                                            </span>

                                            <span class="text-xs text-[#9b8871]">
                                                Estimated delivery: 3–5 business days
                                            </span>

                                        </div>

                                    </div>

                                </div>
                            </div>

                        @endforeach

                    </div>


                    <div class="mt-6">
                        <a href="{{ url('/shop') }}"
                           class="inline-flex items-center gap-2 text-sm font-semibold text-[#79654e] transition hover:text-[#493825]">
                            <span>←</span>
                            Continue Shopping
                        </a>
                    </div>

                @else

                    {{-- EMPTY CART --}}
                    <div class="rounded-3xl border border-[#e8dccb] bg-[#fffdf9] px-6 py-16 text-center shadow-sm">

                        <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full border border-[#e8dccb] bg-[#f5efe6]">

                            <svg class="h-8 w-8 text-[#79654e]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M3 3h2l2.4 12.2a2 2 0 0 0 2 1.6h7.8a2 2 0 0 0 2-1.6L21 7H6"/>
                                <circle cx="10" cy="20" r="1"/>
                                <circle cx="18" cy="20" r="1"/>
                            </svg>

                        </div>

                        <h2 class="mt-6 text-2xl font-bold text-[#493825]">
                            Your Cart is Empty
                        </h2>

                        <p class="mt-2 text-sm text-[#9b8871]">
                            Looks like you haven't added anything to your cart yet.
                        </p>

                        <a href="{{ url('/shop') }}"
                           class="mt-7 inline-flex items-center justify-center gap-2 rounded-xl bg-[#493825] px-7 py-3.5 text-sm font-semibold text-white shadow-md shadow-[#493825]/15 transition-all duration-300 hover:-translate-y-0.5 hover:bg-[#5c4630] hover:shadow-lg">

                            Start Shopping

                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 12h14m-6-6 6 6-6 6"/>
                            </svg>

                        </a>

                    </div>

                @endif

            </div>


            {{-- ORDER SUMMARY --}}
            @if($cartitems->count())

                <div>

                    <div class="sticky top-28 rounded-3xl border border-[#e8dccb] bg-[#fffdf9] p-6 shadow-sm lg:p-7">

                        <div class="flex items-center justify-between">

                            <h2 class="text-xl font-bold text-[#493825]">
                                Order Summary
                            </h2>

                            <span class="rounded-full bg-[#f5efe6] px-3 py-1 text-xs font-semibold text-[#79654e]">
                                {{ $itemCount }} Items
                            </span>

                        </div>

                        <p class="mt-1 text-xs text-[#a18e76]">
                            Your order details
                        </p>


                        {{-- SUMMARY --}}
                        <div class="mt-7 space-y-4 text-sm">

                            <div class="flex items-center justify-between">
                                <span class="text-[#8c7b67]">Subtotal</span>

                                <span class="font-semibold text-[#493825]">
                                    ₹{{ number_format($total, 2) }}
                                </span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="text-[#8c7b67]">Shipping</span>

                                <span class="font-semibold text-green-700">
                                    Free
                                </span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="text-[#8c7b67]">Discount</span>

                                @if(session('coupon'))

                                    <span class="font-semibold text-green-700">
                                        - ₹{{ number_format(session('coupon.discount'), 2) }}
                                    </span>

                                @else

                                    <span class="font-semibold text-[#493825]">
                                        - ₹0.00
                                    </span>

                                @endif
                            </div>

                        </div>


                        {{-- TOTAL --}}
                        <div class="mt-6 border-t border-[#e8dccb] pt-5">

                            <div class="flex items-end justify-between gap-4">

                                <div>
                                    <p class="font-bold text-[#493825]">
                                        Total Amount
                                    </p>

                                    <p class="mt-1 text-xs text-[#a18e76]">
                                        Inclusive of applicable taxes
                                    </p>
                                </div>

                                <span class="text-2xl font-bold text-[#493825]">
                                    ₹{{ number_format($discountedPrice, 2) }}
                                </span>

                            </div>

                        </div>


                        {{-- COUPON --}}
                        <div class="mt-6 rounded-2xl border border-[#e8dccb] bg-[#faf7f2] p-5">

                            @if(session('coupon'))

                                <div class="flex items-start justify-between gap-3">

                                    <div>

                                        <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-[#a18e76]">
                                            Coupon Applied
                                        </p>

                                        <p class="mt-2 text-sm font-bold text-green-700">
                                            {{ session('coupon.code') }}
                                        </p>

                                        <p class="mt-1 text-xs text-green-700">
                                            You saved ₹{{ number_format(session('coupon.discount'), 2) }}
                                        </p>

                                    </div>

                                    <form action="{{ route('coupon.remove') }}" method="POST">
                                        @csrf

                                        <button
                                            type="submit"
                                            class="text-xs font-semibold text-red-500 transition hover:text-red-700">
                                            Remove
                                        </button>
                                    </form>

                                </div>

                            @else

                                <h3 class="font-semibold text-[#493825]">
                                    Have a Coupon?
                                </h3>

                                <p class="mb-4 mt-1 text-xs text-[#9b8871]">
                                    Enter your promo code to get a discount.
                                </p>

                                <form action="{{ route('coupon.apply') }}" method="POST" class="flex gap-2">
                                    @csrf

                                    <input
                                        type="text"
                                        name="coupon_code"
                                        placeholder="ENTER CODE"
                                        value="{{ old('coupon_code') }}"
                                        class="min-w-0 flex-1 rounded-xl border border-[#e8dccb] bg-[#fffdf9] px-3 py-2.5 text-xs font-semibold uppercase tracking-wider text-[#493825] outline-none placeholder:text-[#b5a58f] focus:border-[#79654e] focus:ring-2 focus:ring-[#e8dccb]">

                                    <button
                                        type="submit"
                                        class="rounded-xl bg-[#493825] px-4 py-2.5 text-xs font-semibold text-white transition-all hover:bg-[#5c4630]">
                                        Apply
                                    </button>

                                </form>

                                @if($errors->has('coupon_code'))

                                    <div class="mt-3 rounded-xl border border-red-100 bg-red-50 px-3 py-2.5">
                                        <p class="text-xs text-red-600">
                                            {{ $errors->first('coupon_code') }}
                                        </p>
                                    </div>

                                @endif

                            @endif

                        </div>


                        {{-- CHECKOUT BUTTON --}}
                        <a href="{{ url('/checkout') }}"
                           class="mt-6 flex h-14 w-full items-center justify-center gap-2 rounded-xl bg-[#493825] px-5 text-sm font-bold text-white shadow-lg shadow-[#493825]/15 transition-all duration-300 hover:-translate-y-0.5 hover:bg-[#5c4630] hover:shadow-xl active:scale-[0.98]">

                            Proceed to Checkout

                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 12h14m-6-6 6 6-6 6"/>
                            </svg>

                        </a>


                        {{-- SECURE MESSAGE --}}
                        <div class="mt-5 flex items-center justify-center gap-2 text-xs text-[#a18e76]">

                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M12 15v2m-6 4h12a2 2 0 0 0 2-2V11a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2Zm3-12V7a3 3 0 0 1 6 0v2"/>
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
