
@extends('layouts.customer.customer-layout')

@section('title', 'SSSN | CHECKOUT')

@section('customerContent')

<form
    action="{{ route('order.place') }}"
    method="POST"
    id="checkout-form"
    class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8"
>
    @csrf

    {{-- ERROR MESSAGES --}}
    @if($errors->any())
        <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4 text-red-700">
            @foreach($errors->all() as $error)
                <p class="text-sm">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    @if(session('success'))
        <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 p-4 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    {{-- HEADER --}}
    <div class="mb-9">
        <p class="mb-2 text-[10px] font-semibold uppercase tracking-[3px] text-[#a18461]">
            SSSN Fashion / Secure Checkout
        </p>

        <h1 class="font-serif text-3xl font-medium text-[#493825] sm:text-4xl">
            Complete Your Order
        </h1>

        <p class="mt-2 text-sm text-[#8b7964]">
            Almost there! Please review your details before placing your order.
        </p>
    </div>

    <div class="grid items-start gap-8 lg:grid-cols-3">

        {{-- LEFT SECTION --}}
        <div class="space-y-6 lg:col-span-2">

            {{-- DELIVERY ADDRESS --}}
            <section class="rounded-3xl border border-[#e8dccb] bg-[#fffdf9] p-5 shadow-sm sm:p-8">

                <div class="mb-7 flex items-center gap-4">
                    <span class="flex h-11 w-11 items-center justify-center rounded-full bg-[#493825] font-serif text-sm text-white">
                        01
                    </span>

                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-[2px] text-[#a18461]">
                            Step One
                        </p>
                        <h2 class="mt-1 font-serif text-2xl text-[#493825]">
                            Delivery Address
                        </h2>
                    </div>

                    <span class="ml-auto text-xl text-[#a18461]">
                        <i class="fa-solid fa-location-dot"></i>
                    </span>
                </div>

                <div class="grid gap-5 sm:grid-cols-2">

                    {{-- NAME --}}
                    <div class="sm:col-span-2">
                        <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-[#594630]">
                            Full Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', auth()->user()->name ?? '') }}"
                            placeholder="Enter full name"
                            required
                            class="h-12 w-full rounded-xl border border-[#e8dccb] bg-white px-4 text-sm text-[#493825] outline-none transition placeholder:text-[#b4a794] focus:border-[#9b7b55] focus:ring-2 focus:ring-[#d2b99c]/25"
                        >
                    </div>

                    {{-- PHONE --}}
                    <div>
                        <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-[#594630]">
                            Phone Number
                        </label>

                        <input
                            type="text"
                            name="phone"
                            value="{{ old('phone', $userDetail->userInfo->phone ?? '') }}"
                            placeholder="+91 98765 43210"
                            required
                            class="h-12 w-full rounded-xl border border-[#e8dccb] bg-white px-4 text-sm text-[#493825] outline-none transition placeholder:text-[#b4a794] focus:border-[#9b7b55] focus:ring-2 focus:ring-[#d2b99c]/25"
                        >
                    </div>

                    {{-- PIN CODE --}}
                    <div>
                        <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-[#594630]">
                            PIN Code
                        </label>

                        <input
                            type="text"
                            name="zipcode"
                            value="{{ old('zipcode', $userDetail->userInfo->zipcode ?? '') }}"
                            placeholder="123456"
                            required
                            class="h-12 w-full rounded-xl border border-[#e8dccb] bg-white px-4 text-sm text-[#493825] outline-none transition placeholder:text-[#b4a794] focus:border-[#9b7b55] focus:ring-2 focus:ring-[#d2b99c]/25"
                        >
                    </div>

                    {{-- ADDRESS --}}
                    <div class="sm:col-span-2">
                        <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-[#594630]">
                            Full Address
                        </label>

                        <textarea
                            name="shipping_address"
                            rows="3"
                            placeholder="House number, street, area..."
                            required
                            class="w-full resize-none rounded-xl border border-[#e8dccb] bg-white px-4 py-3 text-sm text-[#493825] outline-none transition placeholder:text-[#b4a794] focus:border-[#9b7b55] focus:ring-2 focus:ring-[#d2b99c]/25"
                        >{{ old('shipping_address', $userDetail->userInfo->address ?? '') }}</textarea>
                    </div>

                    {{-- CITY --}}
                    <div>
                        <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-[#594630]">
                            City
                        </label>

                        <input
                            type="text"
                            name="city"
                            value="{{ old('city') }}"
                            placeholder="Enter city"
                            required
                            class="h-12 w-full rounded-xl border border-[#e8dccb] bg-white px-4 text-sm text-[#493825] outline-none transition placeholder:text-[#b4a794] focus:border-[#9b7b55] focus:ring-2 focus:ring-[#d2b99c]/25"
                        >
                    </div>

                    {{-- STATE --}}
                    <div>
                        <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-[#594630]">
                            State
                        </label>

                        <input
                            type="text"
                            name="state"
                            value="{{ old('state') }}"
                            placeholder="Enter state"
                            required
                            class="h-12 w-full rounded-xl border border-[#e8dccb] bg-white px-4 text-sm text-[#493825] outline-none transition placeholder:text-[#b4a794] focus:border-[#9b7b55] focus:ring-2 focus:ring-[#d2b99c]/25"
                        >
                    </div>

                </div>

                <label class="mt-6 flex cursor-pointer items-center gap-3">
                    <input
                        type="checkbox"
                        name="save_address"
                        value="1"
                        class="h-4 w-4 accent-[#493825]"
                    >

                    <span class="text-sm text-[#79654e]">
                        Save this address for future orders
                    </span>
                </label>

            </section>

            {{-- DELIVERY METHOD --}}
            <section class="rounded-3xl border border-[#e8dccb] bg-[#fffdf9] p-5 shadow-sm sm:p-8">

                <div class="mb-7 flex items-center gap-4">
                    <span class="flex h-11 w-11 items-center justify-center rounded-full bg-[#493825] font-serif text-sm text-white">
                        02
                    </span>

                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-[2px] text-[#a18461]">
                            Step Two
                        </p>
                        <h2 class="mt-1 font-serif text-2xl text-[#493825]">
                            Delivery Method
                        </h2>
                    </div>
                </div>

                <div class="space-y-3">

                    <label class="delivery-option flex cursor-pointer items-center justify-between gap-4 rounded-2xl border-2 border-[#493825] bg-[#f8f3eb] p-5 transition">

                        <div class="flex items-center gap-4">
                            <input
                                type="radio"
                                name="delivery"
                                value="standard"
                                checked
                                class="h-4 w-4 accent-[#493825]"
                            >

                            <div>
                                <p class="text-sm font-semibold text-[#493825]">
                                    Standard Delivery
                                </p>

                                <p class="mt-1 text-xs text-[#8b7964]">
                                    Delivery within 3–7 business days
                                </p>
                            </div>
                        </div>

                        <span class="text-xs font-bold uppercase text-green-700">
                            Free
                        </span>
                    </label>

                    <label class="delivery-option flex cursor-pointer items-center justify-between gap-4 rounded-2xl border border-[#e8dccb] bg-white p-5 transition hover:border-[#b99a72]">

                        <div class="flex items-center gap-4">
                            <input
                                type="radio"
                                name="delivery"
                                value="express"
                                class="h-4 w-4 accent-[#493825]"
                            >

                            <div>
                                <p class="text-sm font-semibold text-[#493825]">
                                    Express Delivery
                                </p>

                                <p class="mt-1 text-xs text-[#8b7964]">
                                    Delivery within 1–2 business days
                                </p>
                            </div>
                        </div>

                        <span class="text-sm font-semibold text-[#493825]">
                            ₹149
                        </span>
                    </label>

                </div>
            </section>

            {{-- PAYMENT METHOD --}}
            <section class="rounded-3xl border border-[#e8dccb] bg-[#fffdf9] p-5 shadow-sm sm:p-8">

                <div class="mb-7 flex items-center gap-4">
                    <span class="flex h-11 w-11 items-center justify-center rounded-full bg-[#493825] font-serif text-sm text-white">
                        03
                    </span>

                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-[2px] text-[#a18461]">
                            Step Three
                        </p>

                        <h2 class="mt-1 font-serif text-2xl text-[#493825]">
                            Payment Method
                        </h2>
                    </div>
                </div>

                <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-3">

                    {{-- RAZORPAY --}}
                    <label class="payment-option cursor-pointer rounded-2xl border-2 border-[#493825] bg-[#f8f3eb] p-5 transition hover:border-[#9b7b55]" data-payment="razorpay">
                        <input type="radio" name="payment_method" value="razorpay" class="payment-radio h-4 w-4 accent-[#493825]" checked>

                        <div class="mt-4 text-2xl text-[#8b6d49]">
                            <i class="fa-regular fa-credit-card"></i>
                        </div>

                        <p class="mt-3 text-sm font-semibold text-[#493825]">Razorpay</p>
                        <p class="mt-1 text-xs text-[#8b7964]">Card, UPI, Net Banking</p>
                    </label>

                    {{-- PAYU --}}
                    <label class="payment-option cursor-pointer rounded-2xl border border-[#e8dccb] bg-white p-5 transition hover:border-[#9b7b55]" data-payment="payu">
                        <input type="radio" name="payment_method" value="payu" class="payment-radio h-4 w-4 accent-[#493825]">

                        <div class="mt-4 text-2xl text-[#8b6d49]">
                            <i class="fa-solid fa-wallet"></i>
                        </div>

                        <p class="mt-3 text-sm font-semibold text-[#493825]">PayU</p>
                        <p class="mt-1 text-xs text-[#8b7964]">Card, UPI & Net Banking</p>
                    </label>

                    {{-- STRIPE --}}
                    <label class="payment-option cursor-pointer rounded-2xl border border-[#e8dccb] bg-white p-5 transition hover:border-[#9b7b55]" data-payment="stripe">
                        <input type="radio" name="payment_method" value="stripe" class="payment-radio h-4 w-4 accent-[#493825]">

                        <div class="mt-4 text-2xl text-[#8b6d49]">
                            <i class="fa-solid fa-globe"></i>
                        </div>

                        <p class="mt-3 text-sm font-semibold text-[#493825]">Stripe</p>
                        <p class="mt-1 text-xs text-[#8b7964]">International Cards</p>
                    </label>

                    {{-- PHONEPE --}}
                    <label class="payment-option cursor-pointer rounded-2xl border border-[#e8dccb] bg-white p-5 transition hover:border-[#9b7b55]" data-payment="phonepe">
                        <input type="radio" name="payment_method" value="phonepe" class="payment-radio h-4 w-4 accent-[#493825]">

                        <div class="mt-4 text-2xl text-[#8b6d49]">
                            <i class="fa-solid fa-mobile-screen-button"></i>
                        </div>

                        <p class="mt-3 text-sm font-semibold text-[#493825]">PhonePe</p>
                        <p class="mt-1 text-xs text-[#8b7964]">UPI & Online Payment</p>
                    </label>

                    {{-- PAYTM --}}
                    <label class="payment-option cursor-pointer rounded-2xl border border-[#e8dccb] bg-white p-5 transition hover:border-[#9b7b55]" data-payment="paytm">
                        <input type="radio" name="payment_method" value="paytm" class="payment-radio h-4 w-4 accent-[#493825]">

                        <div class="mt-4 text-2xl text-[#8b6d49]">
                            <i class="fa-solid fa-money-bill-transfer"></i>
                        </div>

                        <p class="mt-3 text-sm font-semibold text-[#493825]">Paytm</p>
                        <p class="mt-1 text-xs text-[#8b7964]">UPI, Card & Net Banking</p>
                    </label>

                    {{-- COD --}}
                    <label class="payment-option cursor-pointer rounded-2xl border border-[#e8dccb] bg-white p-5 transition hover:border-[#9b7b55]" data-payment="cod">
                        <input type="radio" name="payment_method" value="COD" class="payment-radio h-4 w-4 accent-[#493825]">

                        <div class="mt-4 text-2xl text-[#8b6d49]">
                            <i class="fa-solid fa-money-bill-wave"></i>
                        </div>

                        <p class="mt-3 text-sm font-semibold text-[#493825]">Cash on Delivery</p>
                        <p class="mt-1 text-xs text-[#8b7964]">Pay when delivered</p>
                    </label>

                </div>

                {{-- PAYMENT INFO --}}
                <div class="mt-6 rounded-2xl border border-[#e8dccb] bg-[#f8f3eb] p-5">
                    <div class="flex items-center gap-4">

                        <div id="payment-icon" class="flex h-11 w-11 items-center justify-center rounded-xl bg-white text-lg text-[#8b6d49]">
                            <i class="fa-regular fa-credit-card"></i>
                        </div>

                        <div>
                            <h3 id="payment-title" class="text-sm font-semibold text-[#493825]">
                                Razorpay
                            </h3>

                            <p id="payment-description" class="mt-1 text-xs text-[#8b7964]">
                                Secure payment using Card, UPI or Net Banking.
                            </p>
                        </div>

                    </div>
                </div>

            </section>
        </div>

        {{-- RIGHT SIDE: ORDER SUMMARY --}}
        <aside class="lg:sticky lg:top-6">

            <div class="overflow-hidden rounded-3xl border border-[#e8dccb] bg-[#fffdf9] shadow-[0_12px_40px_rgba(73,56,37,0.07)]">

                <div class="bg-[#493825] px-6 py-6 text-white">
                    <p class="text-[10px] font-bold uppercase tracking-[2.5px] text-[#d2b99c]">
                        Your Selection
                    </p>

                    <h2 class="mt-2 font-serif text-2xl">
                        Order Summary
                    </h2>

                    <p class="mt-1 text-xs text-white/65">
                        Review your items before checkout
                    </p>
                </div>

                <div class="p-5 sm:p-6">

                    {{-- PRODUCTS --}}
                    <div class="max-h-[390px] space-y-5 overflow-y-auto pr-1">

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

                            <div class="flex gap-4">

                                {{-- PRODUCT IMAGE --}}
                                @if($item->product && $item->product->images->first())

                                    <img
                                        src="{{ asset('storage/' . $item->product->images->first()->name) }}"
                                        alt="{{ $item->product->name }}"
                                        class="h-24 w-20 rounded-xl border border-[#eee4d8] object-cover"
                                    >

                                @else

                                    <div class="flex h-24 w-20 items-center justify-center rounded-xl bg-[#f5efe6] text-xs text-[#a18b70]">
                                        No Image
                                    </div>

                                @endif

                                <div class="min-w-0 flex-1">

                                    <h3 class="text-sm font-semibold text-[#493825]">
                                        {{ $item->product->name }}
                                    </h3>

                                    <p class="mt-1 text-xs text-[#8b7964]">
                                        {{ $item->color->name }}
                                        <span class="px-1 text-[#c6b49e]">·</span>
                                        {{ $item->size->name }}
                                    </p>

                                    <p class="mt-1 text-xs text-[#8b7964]">
                                        Quantity: {{ $item->quantity }}
                                    </p>

                                    <p class="mt-3 text-sm font-semibold text-[#493825]">
                                        ₹{{ number_format($unitPrice, 2) }}
                                    </p>

                                </div>
                            </div>

                        @endforeach

                    </div>

                    {{-- COUPON --}}
                    <div class="mt-7 border-t border-[#e8dccb] pt-6">

                        @if(session('coupon'))

                            <div class="flex items-center justify-between gap-3 rounded-xl border border-green-200 bg-green-50 px-4 py-3">

                                <div>
                                    <p class="text-sm font-semibold text-green-800">
                                        {{ session('coupon.code') }} Applied
                                    </p>

                                    <p class="mt-1 text-xs text-green-700">
                                        Discount: ₹{{ number_format(session('coupon.discount'), 2) }}
                                    </p>
                                </div>

                                <button
                                    onclick="removeCoupon()"
                                    type="button"
                                    class="text-xs font-semibold text-red-600"
                                >
                                    Remove
                                </button>

                            </div>

                        @else

                            <label for="coupon_code" class="block text-xs font-bold uppercase tracking-wider text-[#594630]">
                                Have a Coupon?
                            </label>

                            <div class="mt-3 flex gap-2">

                                <input
                                    type="text"
                                    id="coupon_code"
                                    placeholder="Enter coupon code"
                                    class="h-11 min-w-0 flex-1 rounded-xl border border-[#e8dccb] bg-white px-3 text-sm uppercase text-[#493825] outline-none placeholder:normal-case placeholder:text-[#b4a794] focus:border-[#9b7b55]"
                                >

                                <button
                                    type="button"
                                    onclick="ApplyCoupon()"
                                    class="rounded-xl bg-[#f0e6d8] px-4 text-xs font-bold uppercase tracking-wider text-[#493825] transition hover:bg-[#e5d4bd]"
                                >
                                    Apply
                                </button>

                            </div>

                        @endif
                    </div>

                    {{-- PRICE BREAKDOWN --}}
                    <div class="mt-6 space-y-4 border-t border-[#e8dccb] pt-6">

                        <div class="flex justify-between text-sm">
                            <span class="text-[#8b7964]">Subtotal</span>
                            <span class="font-medium text-[#493825]">
                                ₹{{ number_format($subtotal, 2) }}
                            </span>
                        </div>

                        <div class="flex justify-between text-sm">
                            <span class="text-[#8b7964]">Shipping</span>
                            <span class="font-medium text-green-700">Free</span>
                        </div>

                        <div class="flex justify-between text-sm">
                            <span class="text-[#8b7964]">Discount</span>
                            <span class="font-medium text-[#493825]">
                                − ₹{{ number_format($discount, 2) }}
                            </span>
                        </div>

                    </div>

                    {{-- TOTAL --}}
                    <div class="mt-6 flex items-center justify-between border-t border-[#e8dccb] pt-5">

                        <div>
                            <p class="text-xs font-bold uppercase tracking-wider text-[#8b7964]">
                                Total Amount
                            </p>

                            <p class="mt-1 text-[10px] text-[#a99883]">
                                Inclusive of applicable charges
                            </p>
                        </div>

                        <span class="font-serif text-2xl font-semibold text-[#493825]">
                            ₹{{ number_format($total, 2) }}
                        </span>

                    </div>

                    {{-- PLACE ORDER --}}
                    <button
                        type="submit"
                        id="place-order-btn"
                        class="mt-7 flex h-14 w-full items-center justify-center gap-3 rounded-xl bg-[#493825] px-5 text-xs font-bold uppercase tracking-[2px] text-white shadow-lg shadow-[#493825]/15 transition duration-300 hover:bg-[#5c4630] focus:outline-none focus:ring-2 focus:ring-[#d2b99c] focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-60"
                    >
                        <span>Place Order</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>

                    <div class="mt-6 space-y-3 text-center">

                        <p class="flex items-center justify-center gap-2 text-[11px] text-[#8b7964]">
                            <i class="fa-solid fa-lock text-[#a18461]"></i>
                            Secure checkout & protected payment
                        </p>

                        <p class="text-[10px] leading-relaxed text-[#a99883]">
                            By placing your order, you agree to our Terms & Conditions.
                        </p>

                    </div>

                </div>
            </div>
        </aside>

    </div>
</form>


{{-- JAVASCRIPT --}}
<script>

/* PAYMENT OPTIONS */

const paymentRadios = document.querySelectorAll('.payment-radio');
const paymentOptions = document.querySelectorAll('.payment-option');

const paymentIcon = document.getElementById('payment-icon');
const paymentTitle = document.getElementById('payment-title');
const paymentDescription = document.getElementById('payment-description');

const paymentDetails = {

    razorpay: {
        icon: '<i class="fa-regular fa-credit-card"></i>',
        title: 'Razorpay',
        description: 'Secure payment using Card, UPI or Net Banking.'
    },

    payu: {
        icon: '<i class="fa-solid fa-wallet"></i>',
        title: 'PayU',
        description: 'Secure payment using Card, UPI or Net Banking.'
    },

    stripe: {
        icon: '<i class="fa-solid fa-globe"></i>',
        title: 'Stripe',
        description: 'Secure international card payment.'
    },

    phonepe: {
        icon: '<i class="fa-solid fa-mobile-screen-button"></i>',
        title: 'PhonePe',
        description: 'Secure payment using PhonePe.'
    },

    paytm: {
        icon: '<i class="fa-solid fa-money-bill-transfer"></i>',
        title: 'Paytm',
        description: 'Secure payment using Paytm.'
    },

    cod: {
        icon: '<i class="fa-solid fa-money-bill-wave"></i>',
        title: 'Cash on Delivery',
        description: 'Pay in cash when your order is delivered.'
    }

};


/* UPDATE PAYMENT */

function updatePayment() {

    const selected = document.querySelector(
        'input[name="payment_method"]:checked'
    )?.value;

    if (!selected) return;

    paymentOptions.forEach(option => {
        option.classList.remove(
            'border-2',
            'border-[#493825]',
            'bg-[#f8f3eb]'
        );

        option.classList.add(
            'border',
            'border-[#e8dccb]',
            'bg-white'
        );
    });

    const activeOption = document.querySelector(
        `[data-payment="${selected}"]`
    );

    if (activeOption) {
        activeOption.classList.remove(
            'border',
            'border-[#e8dccb]',
            'bg-white'
        );

        activeOption.classList.add(
            'border-2',
            'border-[#493825]',
            'bg-[#f8f3eb]'
        );
    }

    const detail = paymentDetails[selected];

    if (detail) {
        paymentIcon.innerHTML = detail.icon;
        paymentTitle.textContent = detail.title;
        paymentDescription.textContent = detail.description;
    }
}

paymentRadios.forEach(radio => {
    radio.addEventListener('change', updatePayment);
});

updatePayment();


/* DELIVERY OPTION DESIGN */

const deliveryOptions = document.querySelectorAll('.delivery-option');

function updateDelivery() {

    deliveryOptions.forEach(option => {

        const radio = option.querySelector('input[type="radio"]');

        if (radio.checked) {
            option.classList.remove('border', 'border-[#e8dccb]', 'bg-white');
            option.classList.add('border-2', 'border-[#493825]', 'bg-[#f8f3eb]');
        } else {
            option.classList.remove('border-2', 'border-[#493825]', 'bg-[#f8f3eb]');
            option.classList.add('border', 'border-[#e8dccb]', 'bg-white');
        }

    });
}

deliveryOptions.forEach(option => {
    option.querySelector('input').addEventListener('change', updateDelivery);
});

updateDelivery();


/* REMOVE COUPON */

function removeCoupon() {

    fetch("{{ route('coupon.remove') }}", {
        method: "POST",

        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            "Accept": "application/json"
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Unable to remove coupon.');
        }

        window.location.reload();
    })
    .catch(error => {
        alert(error.message);
    });
}


/* APPLY COUPON */

function ApplyCoupon() {

    const couponInput = document.getElementById('coupon_code');
    const couponCode = couponInput.value.trim();

    if (!couponCode) {
        couponInput.focus();
        return;
    }

    fetch("{{ route('coupon.apply') }}", {
        method: "POST",

        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            "Accept": "application/json"
        },

        body: JSON.stringify({
            coupon_code: couponCode
        })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Unable to apply coupon. Please check the code.');
        }

        window.location.reload();
    })
    .catch(error => {
        alert(error.message);
    });
}


/* PREVENT DOUBLE SUBMISSION */

document.getElementById('checkout-form').addEventListener('submit', function () {

    const button = document.getElementById('place-order-btn');

    if (button.disabled) return;

    button.disabled = true;

    button.innerHTML = `
        <i class="fa-solid fa-spinner fa-spin"></i>
        <span>Processing...</span>
    `;

});

</script>

@endsection
