@extends('layouts.customer.customer-layout')

@section('title', 'SSSN | CART')

@section('customerContent')


<section class="bg-white border-b">

    <div class="max-w-7xl mx-auto px-4 py-12">

        <span class="text-xs uppercase tracking-widest text-gray-400">
            Shopping Bag
        </span>

        <h1 class="text-4xl font-bold mt-3">
            Your Cart
        </h1>

        <p class="text-gray-500 mt-2">
            Review your items before checkout.
        </p>

    </div>

</section>


<section class="max-w-7xl mx-auto px-4 py-10">

    <div class="grid lg:grid-cols-3 gap-8">


        {{-- ITEMS --}}
        <div class="lg:col-span-2 space-y-4">

            


            @foreach($cartitems as $item)

                <div class="bg-white border border-gray-200
                            rounded-2xl p-4 sm:p-5">

                    <div class="flex gap-4">

                        <div class="w-28 h-32 sm:w-36 sm:h-40
                                    rounded-xl overflow-hidden
                                    bg-gray-100 shrink-0">

                            <img src="{{ $item['image'] }}"
                                 class="w-full h-full object-cover">

                        </div>


                        <div class="flex-1 min-w-0">

                            <div class="flex justify-between gap-3">

                                <div>

                                    <p class="text-xs text-gray-400">
                                        Premium Collection
                                    </p>

                                    <h3 class="font-bold mt-1">
                                        {{ $item->product->name }}
                                    </h3>

                                    <div class="flex gap-4 mt-2
                                                text-xs text-gray-500">
                                        <span>
                                            Size: {{ $item['size'] }}
                                        </span>

                                        <span>
                                            Color: {{ $item['color'] }}
                                        </span>
                                    </div>

                                </div>

                                <button class="text-gray-400 hover:text-red-500">
                                    🗑
                                </button>

                            </div>


                            <div class="flex flex-col sm:flex-row
                                        sm:items-center
                                        justify-between gap-4 mt-7">

                                <div class="flex items-center
                                            border border-gray-200
                                            rounded-xl overflow-hidden">

                                    <button class="w-9 h-9 hover:bg-gray-100">
                                        −
                                    </button>

                                    <span class="w-9 text-center text-sm">
                                        1
                                    </span>

                                    <button class="w-9 h-9 hover:bg-gray-100">
                                        +
                                    </button>

                                </div>


                                <p class="font-bold text-lg">
                                    ₹{{ number_format($item->product->sale_price * 1) }}
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            @endforeach


            <a href="{{ url('/shop') }}"
               class="inline-flex items-center gap-2
                      text-sm font-semibold mt-3">
                ← Continue Shopping
            </a>

        </div>


        {{-- SUMMARY --}}
        <div>

            <div class="bg-white border border-gray-200
                        rounded-3xl p-6 sticky top-28">

                <h2 class="text-xl font-bold">
                    Order Summary
                </h2>


                <div class="mt-7 space-y-4 text-sm">

                    <div class="flex justify-between">
                        <span class="text-gray-500">
                            Subtotal
                        </span>
                        <span class="font-semibold">
                            ₹{{$total}}
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500">
                            Shipping
                        </span>
                        <span class="font-semibold text-green-600">
                            Free
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500">
                            Discount
                        </span>
                        <span class="font-semibold">
                            - ₹0
                        </span>
                    </div>

                </div>


                <div class="border-t mt-6 pt-5">

                    <div class="flex justify-between">

                        <span class="font-semibold">
                            Total
                        </span>

                        <span class="text-2xl font-bold">
                            ₹{{$discountedPrice}}
                        </span>

                    </div>

                </div>


                {{-- Coupon --}}
                <div class="rounded-xl border border-gray-200 bg-white p-5">

    


    @if(session('coupon'))

        <div class="mt-3 flex items-center justify-between rounded-lg bg-green-50 px-4 py-3">

            <div>
                <p class="text-sm font-semibold text-green-800">
                    {{ session('coupon.code') }} Applied
                </p>

                <p class="text-xs text-green-600">
                    Discount: ₹{{ number_format(session('coupon.discount'), 2) }}
                </p>
            </div>

            <form action="{{ route('coupon.remove') }}" method="POST">
                @csrf

                <button class="text-sm font-medium text-red-600">
                    Remove
                </button>
            </form>

        </div>
        @else
        <h3 class="mb-3 font-semibold text-gray-900">
        Have a Coupon?
    </h3>

    <form
        action="{{ route('coupon.apply') }}"
        method="POST"
        class="flex gap-2"
    >
        @csrf

        <input
            type="text"
            name="coupon_code"
            placeholder="Enter coupon code"
            value="{{ session('coupon.code') ?? '' }}"
            class="flex-1 rounded-lg border border-gray-300 px-4 py-2.5 uppercase"
        >

        <button
            type="submit"
            class="rounded-lg bg-gray-900 px-5 py-2.5 text-sm font-semibold text-white"
        >
            Apply
        </button>

    </form>
    @endif

</div>


                <a href="{{ url('/checkout') }}"
                   class="flex items-center justify-center
                          w-full h-13 mt-6
                          rounded-xl bg-black
                          text-white font-semibold
                          hover:bg-gray-800">

                    Proceed to Checkout →

                </a>


                <div class="flex justify-center gap-4
                            text-xs text-gray-400 mt-5">
                    🔒 Secure Checkout
                    <span>•</span>
                    ✓ Easy Returns
                </div>

            </div>

        </div>

    </div>

</section>


@endsection