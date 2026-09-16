@extends('layouts.customer.customer-layout')

@section('title', 'SSSN | CHECKOUT')

@section('customerContent')

<form
    action="{{ route('order.place') }}"
    method="POST"
    id="checkout-form"
    class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10"
>
    @csrf

    {{-- ERROR MESSAGE --}}
    @if($errors->any())
        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 rounded-2xl p-4">
            @foreach($errors->all() as $error)
                <p class="text-sm">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 rounded-2xl p-4">
            {{ session('success') }}
        </div>
    @endif


    <div class="grid lg:grid-cols-3 gap-8">

        {{-- ========================================================= --}}
        {{-- LEFT --}}
        {{-- ========================================================= --}}

        <div class="lg:col-span-2 space-y-6">


            {{-- ===================================================== --}}
            {{-- STEP 1 : ADDRESS --}}
            {{-- ===================================================== --}}

            <div class="bg-white border border-gray-200 rounded-3xl p-6 sm:p-8">

                <div class="flex items-center justify-between">

                    <div>

                        <span class="text-xs uppercase tracking-widest text-gray-400">
                            Step 1
                        </span>

                        <h2 class="text-xl font-bold mt-1">
                            Delivery Address
                        </h2>

                    </div>

                    <span class="w-9 h-9 rounded-xl bg-gray-100
                                 flex items-center justify-center">
                        📍
                    </span>

                </div>


                <div class="grid sm:grid-cols-2 gap-5 mt-7">


                    {{-- NAME --}}
                    <div class="sm:col-span-2">

                        <label class="block text-sm font-semibold mb-2">
                            Full Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', auth()->user()->name ?? '') }}"
                            placeholder="Enter full name"
                            required
                            class="w-full h-12 px-4 rounded-xl
                                   border border-gray-200
                                   bg-gray-50 focus:bg-white
                                   focus:border-black outline-none"
                        >

                    </div>


                    {{-- PHONE --}}
                    <div>

                        <label class="block text-sm font-semibold mb-2">
                            Phone Number
                        </label>

                        <input
                            type="text"
                            name="phone"
                            value="{{ old('phone', $userDetail->userInfo->phone ?? '') }}"
                            placeholder="+91 98765 43210"
                            required
                            class="w-full h-12 px-4 rounded-xl
                                   border border-gray-200
                                   bg-gray-50 focus:bg-white
                                   focus:border-black outline-none"
                        >

                    </div>


                    {{-- PIN --}}
                    <div>

                        <label class="block text-sm font-semibold mb-2">
                            PIN Code
                        </label>

                        <input
                            type="text"
                            name="zipcode"
                            value="{{ old('zipcode', $userDetail->userInfo->zipcode ?? '') }}"
                            placeholder="123456"
                            required
                            class="w-full h-12 px-4 rounded-xl
                                   border border-gray-200
                                   bg-gray-50 focus:bg-white
                                   focus:border-black outline-none"
                        >

                    </div>


                    {{-- ADDRESS --}}
                    <div class="sm:col-span-2">

                        <label class="block text-sm font-semibold mb-2">
                            Address
                        </label>

                        <textarea
                            name="shipping_address"
                            rows="3"
                            placeholder="House number, street, area..."
                            required
                            class="w-full px-4 py-3 rounded-xl
                                   border border-gray-200
                                   bg-gray-50 focus:bg-white
                                   focus:border-black outline-none resize-none"
                        >{{ old('shipping_address', $userDetail->userInfo->address ?? '') }}</textarea>

                    </div>


                    {{-- CITY --}}
                    <div>

                        <label class="block text-sm font-semibold mb-2">
                            City
                        </label>

                        <input
                            type="text"
                            name="city"
                            value="{{ old('city') }}"
                            placeholder="City"
                            required
                            class="w-full h-12 px-4 rounded-xl
                                   border border-gray-200
                                   bg-gray-50 focus:bg-white
                                   focus:border-black outline-none"
                        >

                    </div>


                    {{-- STATE --}}
                    <div>

                        <label class="block text-sm font-semibold mb-2">
                            State
                        </label>

                        <input
                            type="text"
                            name="state"
                            value="{{ old('state') }}"
                            placeholder="State"
                            required
                            class="w-full h-12 px-4 rounded-xl
                                   border border-gray-200
                                   bg-gray-50 focus:bg-white
                                   focus:border-black outline-none"
                        >

                    </div>

                </div>


                <label class="flex items-center gap-3 mt-6 cursor-pointer">

                    <input
                        type="checkbox"
                        name="save_address"
                        value="1"
                        class="w-4 h-4 rounded"
                    >

                    <span class="text-sm text-gray-600">
                        Save this address for future orders
                    </span>

                </label>

            </div>



            {{-- ===================================================== --}}
            {{-- STEP 2 : DELIVERY --}}
            {{-- ===================================================== --}}

            <div class="bg-white border border-gray-200 rounded-3xl p-6 sm:p-8">

                <span class="text-xs uppercase tracking-widest text-gray-400">
                    Step 2
                </span>

                <h2 class="text-xl font-bold mt-1">
                    Delivery Method
                </h2>


                <div class="space-y-3 mt-6">


                    {{-- STANDARD --}}
                    <label
                        class="delivery-option flex items-center justify-between
                               border-2 border-black rounded-2xl p-5 cursor-pointer"
                    >

                        <div class="flex items-center gap-4">

                            <input
                                type="radio"
                                name="delivery"
                                value="standard"
                                checked
                            >

                            <div>

                                <p class="font-semibold">
                                    Standard Delivery
                                </p>

                                <p class="text-xs text-gray-500 mt-1">
                                    Delivery within 3-7 business days
                                </p>

                            </div>

                        </div>

                        <span class="font-semibold text-green-600">
                            FREE
                        </span>

                    </label>


                    {{-- EXPRESS --}}
                    <label
                        class="delivery-option flex items-center justify-between
                               border border-gray-200 rounded-2xl p-5
                               cursor-pointer hover:border-gray-400"
                    >

                        <div class="flex items-center gap-4">

                            <input
                                type="radio"
                                name="delivery"
                                value="express"
                            >

                            <div>

                                <p class="font-semibold">
                                    Express Delivery
                                </p>

                                <p class="text-xs text-gray-500 mt-1">
                                    Delivery within 1-2 business days
                                </p>

                            </div>

                        </div>

                        <span class="font-semibold">
                            ₹149
                        </span>

                    </label>

                </div>

            </div>



            {{-- ===================================================== --}}
            {{-- STEP 3 : PAYMENT --}}
            {{-- ===================================================== --}}

            <div class="bg-white border border-gray-200 rounded-3xl p-6 sm:p-8">

                <span class="text-xs uppercase tracking-widest text-gray-400">
                    Step 3
                </span>

                <h2 class="text-xl font-bold mt-1">
                    Payment Method
                </h2>


                {{-- PAYMENT OPTIONS --}}
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-3 mt-6">


                    {{-- RAZORPAY --}}
                    <label
                        class="payment-option border-2 border-black rounded-2xl p-5
                               cursor-pointer transition"
                        data-payment="razorpay"
                    >

                        <input
                            type="radio"
                            name="payment_method"
                            value="razorpay"
                            class="payment-radio"
                            checked
                        >

                        <div class="text-2xl mt-3">
                            💳
                        </div>

                        <p class="font-semibold mt-3">
                            Razorpay
                        </p>

                        <p class="text-xs text-gray-500 mt-1">
                            Card, UPI, Net Banking
                        </p>

                    </label>


                    {{-- PAYU --}}
                    <label
                        class="payment-option border border-gray-200 rounded-2xl p-5
                               cursor-pointer hover:border-gray-400 transition"
                        data-payment="payu"
                    >

                        <input
                            type="radio"
                            name="payment_method"
                            value="payu"
                            class="payment-radio"
                        >

                        <div class="text-2xl mt-3">
                            💰
                        </div>

                        <p class="font-semibold mt-3">
                            PayU
                        </p>

                        <p class="text-xs text-gray-500 mt-1">
                            Card, UPI & Net Banking
                        </p>

                    </label>


                    {{-- STRIPE --}}
                    <label
                        class="payment-option border border-gray-200 rounded-2xl p-5
                               cursor-pointer hover:border-gray-400 transition"
                        data-payment="stripe"
                    >

                        <input
                            type="radio"
                            name="payment_method"
                            value="stripe"
                            class="payment-radio"
                        >

                        <div class="text-2xl mt-3">
                            🌎
                        </div>

                        <p class="font-semibold mt-3">
                            Stripe
                        </p>

                        <p class="text-xs text-gray-500 mt-1">
                            International Cards
                        </p>

                    </label>


                    {{-- PHONEPE --}}
                    <label
                        class="payment-option border border-gray-200 rounded-2xl p-5
                               cursor-pointer hover:border-gray-400 transition"
                        data-payment="phonepe"
                    >

                        <input
                            type="radio"
                            name="payment_method"
                            value="phonepe"
                            class="payment-radio"
                        >

                        <div class="text-2xl mt-3">
                            📱
                        </div>

                        <p class="font-semibold mt-3">
                            PhonePe
                        </p>

                        <p class="text-xs text-gray-500 mt-1">
                            UPI & Online Payment
                        </p>

                    </label>


                    {{-- PAYTM --}}
                    <label
                        class="payment-option border border-gray-200 rounded-2xl p-5
                               cursor-pointer hover:border-gray-400 transition"
                        data-payment="paytm"
                    >

                        <input
                            type="radio"
                            name="payment_method"
                            value="paytm"
                            class="payment-radio"
                        >

                        <div class="text-2xl mt-3">
                            📲
                        </div>

                        <p class="font-semibold mt-3">
                            Paytm
                        </p>

                        <p class="text-xs text-gray-500 mt-1">
                            UPI, Card & Net Banking
                        </p>

                    </label>


                    {{-- COD --}}
                    <label
                        class="payment-option border border-gray-200 rounded-2xl p-5
                               cursor-pointer hover:border-gray-400 transition"
                        data-payment="cod"
                    >

                        <input
                            type="radio"
                            name="payment_method"
                            value="cod"
                            class="payment-radio"
                        >

                        <div class="text-2xl mt-3">
                            💵
                        </div>

                        <p class="font-semibold mt-3">
                            Cash on Delivery
                        </p>

                        <p class="text-xs text-gray-500 mt-1">
                            Pay in cash when delivered
                        </p>

                    </label>

                </div>


                {{-- PAYMENT INFORMATION --}}
                <div class="mt-7">

                    <div
                        id="payment-info"
                        class="bg-gray-50 border border-gray-200 rounded-2xl p-5"
                    >

                        <div class="flex items-center gap-3">

                            <div
                                id="payment-icon"
                                class="w-11 h-11 rounded-xl bg-white border
                                       flex items-center justify-center text-xl"
                            >
                                💳
                            </div>

                            <div>

                                <h3
                                    id="payment-title"
                                    class="font-semibold"
                                >
                                    Razorpay
                                </h3>

                                <p
                                    id="payment-description"
                                    class="text-xs text-gray-500 mt-1"
                                >
                                    Secure payment using Card, UPI or Net Banking.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        {{-- ========================================================= --}}
        {{-- RIGHT : ORDER SUMMARY --}}
        {{-- ========================================================= --}}

        <div>

            <div
                class="bg-white border border-gray-200
                       rounded-3xl p-6 sticky top-6"
            >

                <h2 class="text-xl font-bold">
                    Order Summary
                </h2>


                {{-- PRODUCTS --}}
                @foreach($cartitems as $item)

                    @php

                        $size = $item->product->sizes
                            ->where('id', $item->size_id)
                            ->first();

                        $unitPrice =
                            $size?->pivot?->price
                            ?? $item->price
                            ?? $item->product->sale_price;

                    @endphp


                    <div class="flex gap-3 mt-5">

                        {{-- IMAGE --}}
                        @if(
                            $item->product &&
                            $item->product->images->first()
                        )

                            <img
                                src="{{ asset('storage/' . $item->product->images->first()->name) }}"
                                alt="{{ $item->product->name }}"
                                class="w-20 h-24 rounded-xl object-cover"
                            >

                        @else

                            <div
                                class="w-20 h-24 rounded-xl
                                       bg-gray-100 flex items-center
                                       justify-center"
                            >
                                <span class="text-gray-400 text-xs">
                                    No Image
                                </span>
                            </div>

                        @endif


                        <div class="flex-1">

                            <h3 class="font-semibold text-sm">
                                {{ $item->product->name }}
                            </h3>

                            <p class="text-xs text-gray-500 mt-1">
                                {{ $item->color->name }}
                                ·
                                {{ $item->size->name }}
                            </p>

                            <p class="text-xs text-gray-500 mt-1">
                                Quantity · {{ $item->quantity }}
                            </p>

                            <p class="font-semibold mt-3">
                                Price :
                                ₹{{ number_format($unitPrice, 2) }}
                            </p>

                        </div>

                    </div>

                @endforeach



                {{-- COUPON --}}
                <div class="mt-7">

                    @if(session('coupon'))

                        <div
                            class="flex items-center justify-between
                                   rounded-lg bg-green-50
                                   px-4 py-3"
                        >

                            <div>

                                <p class="text-sm font-semibold text-green-800">
                                    {{ session('coupon.code') }} Applied
                                </p>

                                <p class="text-xs text-green-600">
                                    Discount:
                                    ₹{{ number_format(session('coupon.discount'), 2) }}
                                </p>

                            </div>


                            <button
                                onclick="removeCoupon()"
                                type="button"
                                class="text-sm font-medium text-red-600"
                            >
                                Remove
                            </button>

                        </div>

                    @else

                        <label class="text-sm font-semibold">
                            Coupon Code
                        </label>

                        <div class="flex gap-2 mt-2">

                            <input
                                type="text"
                                id="coupon_code"
                                placeholder="Coupon code"
                                class="flex-1 min-w-0 h-11 px-3
                                       rounded-xl border border-gray-200
                                       outline-none"
                            >

                            <button
                                type="button"
                                onclick="ApplyCoupon()"
                                class="px-4 rounded-xl bg-gray-100
                                       text-sm font-semibold"
                            >
                                Apply
                            </button>

                        </div>

                    @endif

                </div>



                {{-- PRICING --}}
                <div class="border-t mt-7 pt-6 space-y-4">


                    {{-- SUBTOTAL --}}
                    <div class="flex justify-between text-sm">

                        <span class="text-gray-500">
                            Subtotal
                        </span>

                        <span>
                            ₹{{ number_format($subtotal, 2) }}
                        </span>

                    </div>


                    {{-- SHIPPING --}}
                    <div class="flex justify-between text-sm">

                        <span class="text-gray-500">
                            Shipping
                        </span>

                        <span class="text-green-600">
                            Free
                        </span>

                    </div>


                    {{-- DISCOUNT --}}
                    <div class="flex justify-between text-sm">

                        <span class="text-gray-500">
                            Discount
                        </span>

                        <span>
                            - ₹{{ number_format($discount, 2) }}
                        </span>

                    </div>

                </div>



                {{-- TOTAL --}}
                <div
                    class="border-t mt-5 pt-5
                           flex justify-between items-center"
                >

                    <span class="font-semibold">
                        Total
                    </span>

                    <span class="text-2xl font-bold">
                        ₹{{ number_format($total, 2) }}
                    </span>

                </div>



                {{-- PLACE ORDER --}}
                <button
                    type="submit"
                    id="place-order-btn"
                    class="w-full h-13 mt-6 rounded-xl
                           bg-black text-white
                           font-semibold hover:bg-gray-800
                           transition"
                >
                    Place Order · ₹{{ number_format($total, 2) }}
                </button>


                <div class="mt-5 text-center">

                    <p class="text-xs text-gray-400">
                        🔒 Your payment information is secure
                    </p>

                    <p class="text-xs text-gray-400 mt-2">
                        By placing your order, you agree
                        to our Terms & Conditions.
                    </p>

                </div>

            </div>

        </div>

    </div>

</form>



{{-- =============================================================== --}}
{{-- JAVASCRIPT --}}
{{-- =============================================================== --}}

<script>


/*
|--------------------------------------------------------------------------
| PAYMENT OPTIONS
|--------------------------------------------------------------------------
*/

const paymentRadios =
    document.querySelectorAll('.payment-radio');

const paymentOptions =
    document.querySelectorAll('.payment-option');

const paymentIcon =
    document.getElementById('payment-icon');

const paymentTitle =
    document.getElementById('payment-title');

const paymentDescription =
    document.getElementById('payment-description');


const paymentDetails = {

    razorpay: {
        icon: '💳',
        title: 'Razorpay',
        description:
            'Secure payment using Card, UPI or Net Banking.'
    },

    payu: {
        icon: '💰',
        title: 'PayU',
        description:
            'Secure payment using Card, UPI or Net Banking.'
    },

    stripe: {
        icon: '🌎',
        title: 'Stripe',
        description:
            'Secure international card payment.'
    },

    phonepe: {
        icon: '📱',
        title: 'PhonePe',
        description:
            'Secure payment using PhonePe.'
    },

    paytm: {
        icon: '📲',
        title: 'Paytm',
        description:
            'Secure payment using Paytm.'
    },

    cod: {
        icon: '💵',
        title: 'Cash on Delivery',
        description:
            'Pay in cash when your order is delivered.'
    }

};


/*
|--------------------------------------------------------------------------
| UPDATE PAYMENT UI
|--------------------------------------------------------------------------
*/

function updatePayment() {

    const selected =
        document.querySelector(
            'input[name="payment_method"]:checked'
        )?.value;


    if (!selected) {
        return;
    }


    /*
    |--------------------------------------------------------------------------
    | RESET
    |--------------------------------------------------------------------------
    */

    paymentOptions.forEach(option => {

        option.classList.remove(
            'border-2',
            'border-black'
        );

        option.classList.add(
            'border',
            'border-gray-200'
        );

    });


    /*
    |--------------------------------------------------------------------------
    | ACTIVE
    |--------------------------------------------------------------------------
    */

    const activeOption =
        document.querySelector(
            `[data-payment="${selected}"]`
        );


    if (activeOption) {

        activeOption.classList.remove(
            'border',
            'border-gray-200'
        );

        activeOption.classList.add(
            'border-2',
            'border-black'
        );

    }


    /*
    |--------------------------------------------------------------------------
    | INFORMATION
    |--------------------------------------------------------------------------
    */

    const detail =
        paymentDetails[selected];


    if (detail) {

        paymentIcon.textContent =
            detail.icon;

        paymentTitle.textContent =
            detail.title;

        paymentDescription.textContent =
            detail.description;

    }

}


/*
|--------------------------------------------------------------------------
| RADIO EVENTS
|--------------------------------------------------------------------------
*/

paymentRadios.forEach(radio => {

    radio.addEventListener(
        'change',
        updatePayment
    );

});


/*
|--------------------------------------------------------------------------
| INITIAL
|--------------------------------------------------------------------------
*/

updatePayment();



/*
|--------------------------------------------------------------------------
| REMOVE COUPON
|--------------------------------------------------------------------------
*/

function removeCoupon() {

    fetch(
        "{{ route('coupon.remove') }}",
        {
            method: "POST",

            headers: {
                "X-CSRF-TOKEN":
                    "{{ csrf_token() }}",

                "Accept":
                    "application/json"
            }
        }
    )
    .then(() => {
        window.location.reload();
    });

}



/*
|--------------------------------------------------------------------------
| APPLY COUPON
|--------------------------------------------------------------------------
*/

function ApplyCoupon() {

    const couponCode =
        document.getElementById(
            'coupon_code'
        ).value;


    if (!couponCode) {
        return;
    }


    fetch(
        "{{ route('coupon.apply') }}",
        {
            method: "POST",

            headers: {

                "Content-Type":
                    "application/json",

                "X-CSRF-TOKEN":
                    "{{ csrf_token() }}",

                "Accept":
                    "application/json"
            },

            body: JSON.stringify({

                coupon_code:
                    couponCode

            })
        }
    )
    .then(() => {
        window.location.reload();
    });

}



/*
|--------------------------------------------------------------------------
| PREVENT DOUBLE CLICK
|--------------------------------------------------------------------------
*/

document
    .getElementById('checkout-form')
    .addEventListener('submit', function () {

        const button =
            document.getElementById(
                'place-order-btn'
            );

        button.disabled = true;

        button.innerHTML =
            'Processing...';

    });


</script>
