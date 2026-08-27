@extends('layouts.customer.customer-layout')

@section('title', 'SSSN | CHECKOUT')

@section('customerContent')


{{-- CHECKOUT STEPS --}}
<!-- <section class="bg-white border-b">

    <div class="max-w-4xl mx-auto px-4 py-7">

        <div class="flex items-center justify-center">

            {{-- Step 1 --}}
            <div class="flex items-center">

                <div class="w-9 h-9 rounded-full bg-black
                            text-white flex items-center justify-center
                            text-sm font-bold">
                    1
                </div>

                <span class="hidden sm:block ml-2
                             text-sm font-semibold">
                    Address
                </span>

            </div>


            <div class="w-14 sm:w-24 h-px bg-gray-300 mx-3"></div>


            {{-- Step 2 --}}
            <div class="flex items-center">

                <div class="w-9 h-9 rounded-full bg-gray-100
                            text-gray-500 flex items-center justify-center
                            text-sm font-bold">
                    2
                </div>

                <span class="hidden sm:block ml-2
                             text-sm text-gray-500">
                    Delivery
                </span>

            </div>


            <div class="w-14 sm:w-24 h-px bg-gray-300 mx-3"></div>


            {{-- Step 3 --}}
            <div class="flex items-center">

                <div class="w-9 h-9 rounded-full bg-gray-100
                            text-gray-500 flex items-center justify-center
                            text-sm font-bold">
                    3
                </div>

                <span class="hidden sm:block ml-2
                             text-sm text-gray-500">
                    Payment
                </span>

            </div>

        </div>

    </div>

</section> -->


{{-- MAIN --}}
<form action="{{route('order.place')}}" method="POST" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <div class="grid lg:grid-cols-3 gap-8">
        @if($errors->any())
        @foreach($errors->all() as $error)
            <div>{{$error}}</div>
        @endforeach
        @endif

        {{-- LEFT --}}
        <div class="lg:col-span-2 space-y-6">


            {{-- ADDRESS --}}
            <div class="bg-white border border-gray-200
                        rounded-3xl p-6 sm:p-8">

                <div class="flex items-center justify-between">

                    <div>

                        <span class="text-xs uppercase
                                     tracking-widest text-gray-400">
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

                    <div class="sm:col-span-2">

                        <label class="block text-sm font-semibold mb-2">
                            Full Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ auth()->user()->name ?? '' }}"
                            placeholder="Enter full name"
                            class="w-full h-12 px-4 rounded-xl
                                   border border-gray-200
                                   bg-gray-50 focus:bg-white
                                   focus:border-black outline-none">

                    </div>


                    <div>

                        <label class="block text-sm font-semibold mb-2">
                            Phone Number
                        </label>

                        <input
                            type="text"
                            name="phone"
                            value={{$userDetail->userInfo->phone}}
                            placeholder="+91 98765 43210"
                            class="w-full h-12 px-4 rounded-xl
                                   border border-gray-200
                                   bg-gray-50 focus:bg-white
                                   focus:border-black outline-none">

                    </div>


                    <div>

                        <label class="block text-sm font-semibold mb-2">
                            PIN Code
                        </label>

                        <input
                            type="text"
                            name="zipcode"
                            placeholder="123456"
                            value={{$userDetail->userInfo->zipcode}}
                            class="w-full h-12 px-4 rounded-xl
                                   border border-gray-200
                                   bg-gray-50 focus:bg-white
                                   focus:border-black outline-none">

                    </div>


                    <div class="sm:col-span-2">

                        <label class="block text-sm font-semibold mb-2">
                            Address
                        </label>

                        <textarea
                            name="shipping_address"
                            rows="3"
                            placeholder="House number, street, area..."
                            class="w-full px-4 py-3 rounded-xl
                                   border border-gray-200
                                   bg-gray-50 focus:bg-white
                                   focus:border-black outline-none resize-none"> value={{$userDetail->userInfo->address}}</textarea>

                    </div>


                    <div>

                        <label class="block text-sm font-semibold mb-2">
                            City
                        </label>

                        <input
                            type="text"
                            placeholder="City"
                            class="w-full h-12 px-4 rounded-xl
                                   border border-gray-200
                                   bg-gray-50 focus:bg-white
                                   focus:border-black outline-none">

                    </div>


                    <div>

                        <label class="block text-sm font-semibold mb-2">
                            State
                        </label>

                        <input
                            type="text"
                            placeholder="State"
                            class="w-full h-12 px-4 rounded-xl
                                   border border-gray-200
                                   bg-gray-50 focus:bg-white
                                   focus:border-black outline-none">

                    </div>

                </div>


                <label class="flex items-center gap-3 mt-6 cursor-pointer">

                    <input type="checkbox"
                           class="w-4 h-4 rounded">

                    <span class="text-sm text-gray-600">
                        Save this address for future orders
                    </span>

                </label>

            </div>



            {{-- DELIVERY --}}
            <div class="bg-white border border-gray-200
                        rounded-3xl p-6 sm:p-8">

                <span class="text-xs uppercase
                             tracking-widest text-gray-400">
                    Step 2
                </span>

                <h2 class="text-xl font-bold mt-1">
                    Delivery Method
                </h2>


                <div class="space-y-3 mt-6">


                    <label class="flex items-center
                                  justify-between
                                  border-2 border-black
                                  rounded-2xl p-5 cursor-pointer">

                        <div class="flex items-center gap-4">

                            <input type="radio"
                                   name="delivery"
                                   checked>

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


                    <label class="flex items-center
                                  justify-between
                                  border border-gray-200
                                  rounded-2xl p-5 cursor-pointer
                                  hover:border-gray-400">

                        <div class="flex items-center gap-4">

                            <input type="radio"
                                   name="delivery">

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



            {{-- PAYMENT --}}
{{-- PAYMENT --}}
<div class="bg-white border border-gray-200 rounded-3xl p-6 sm:p-8">

    <span class="text-xs uppercase tracking-widest text-gray-400">
        Step 3
    </span>

    <h2 class="text-xl font-bold mt-1">
        Payment Method
    </h2>

    {{-- PAYMENT OPTIONS --}}
    <div class="grid sm:grid-cols-3 gap-3 mt-6">

        {{-- CARD --}}
        <label
            class="payment-option border-2 border-black rounded-2xl p-5
                   cursor-pointer transition"
            data-payment="card">

            <input
                type="radio"
                name="payment_method"
                value="card"
                class="payment-radio"
                checked>

            <div class="text-2xl mt-3">
                💳
            </div>

            <p class="font-semibold mt-3">
                Card
            </p>

            <p class="text-xs text-gray-500 mt-1">
                Credit / Debit Card
            </p>

        </label>


        {{-- UPI --}}
        <label
            class="payment-option border border-gray-200 rounded-2xl p-5
                   cursor-pointer hover:border-gray-400 transition"
            data-payment="upi">

            <input
                type="radio"
                name="payment_method"
                value="upi"
                class="payment-radio">

            <div class="text-2xl mt-3">
                📱
            </div>

            <p class="font-semibold mt-3">
                UPI
            </p>

            <p class="text-xs text-gray-500 mt-1">
                Google Pay / PhonePe / Paytm
            </p>

        </label>


        {{-- COD --}}
        <label
            class="payment-option border border-gray-200 rounded-2xl p-5
                   cursor-pointer hover:border-gray-400 transition"
            data-payment="cod">

            <input
                type="radio"
                name="payment_method"
                value="COD"
                class="payment-radio">

            <div class="text-2xl mt-3">
                💵
            </div>

            <p class="font-semibold mt-3">
                COD
            </p>

            <p class="text-xs text-gray-500 mt-1">
                Cash on Delivery
            </p>

        </label>

    </div>


    {{-- ================= CARD ================= --}}
    <div id="card-payment" class="mt-7">

        <div class="grid sm:grid-cols-2 gap-5">

            <div class="sm:col-span-2">

                <label class="block text-sm font-semibold mb-2">
                    Card Number
                </label>

                <input
                    type="text"
                    name="card_number"
                    placeholder="1234 5678 9012 3456"
                    class="w-full h-12 px-4 rounded-xl
                           border border-gray-200
                           bg-gray-50 focus:bg-white
                           focus:border-black outline-none">

            </div>

            <div>

                <label class="block text-sm font-semibold mb-2">
                    Expiry Date
                </label>

                <input
                    type="text"
                    name="expiry"
                    placeholder="MM / YY"
                    class="w-full h-12 px-4 rounded-xl
                           border border-gray-200
                           bg-gray-50 focus:bg-white
                           focus:border-black outline-none">

            </div>

            <div>

                <label class="block text-sm font-semibold mb-2">
                    CVV
                </label>

                <input
                    type="password"
                    name="cvv"
                    placeholder="•••"
                    class="w-full h-12 px-4 rounded-xl
                           border border-gray-200
                           bg-gray-50 focus:bg-white
                           focus:border-black outline-none">

            </div>

        </div>

    </div>


    {{-- ================= UPI ================= --}}
    <div id="upi-payment" class="hidden mt-7">

        <div class="bg-gray-50 border border-gray-200
                    rounded-2xl p-5">

            <div class="flex items-center gap-3 mb-5">

                <div class="w-11 h-11 rounded-xl bg-white
                            border flex items-center justify-center text-xl">
                    📱
                </div>

                <div>
                    <h3 class="font-semibold">
                        Pay using UPI
                    </h3>

                    <p class="text-xs text-gray-500">
                        Enter your UPI ID to continue
                    </p>
                </div>

            </div>

            <label class="block text-sm font-semibold mb-2">
                UPI ID
            </label>

            <input
                type="text"
                name="upi_id"
                placeholder="example@upi"
                class="w-full h-12 px-4 rounded-xl
                       border border-gray-200
                       bg-white focus:border-black
                       outline-none">

            <p class="text-xs text-gray-400 mt-2">
                Example: yourname@okaxis, yourname@ybl
            </p>

        </div>

    </div>


    {{-- ================= COD ================= --}}
    <div id="cod-payment" class="hidden mt-7">

        <div class="flex items-center gap-4
                    bg-gray-50 border border-gray-200
                    rounded-2xl p-5">

            <div class="w-12 h-12 rounded-xl bg-white
                        border flex items-center justify-center text-2xl">
                💵
            </div>

            <div>
                <h3 class="font-semibold">
                    Cash on Delivery
                </h3>

                <p class="text-sm text-gray-500 mt-1">
                    Pay in cash when your order is delivered.
                </p>
            </div>

        </div>

    </div>

</div>

        </div>



        {{-- RIGHT SUMMARY --}}
        <div>

            <div class="bg-white border border-gray-200
                        rounded-3xl p-6 sticky top-6">

                <h2 class="text-xl font-bold">
                    Order Summary
                </h2>


                {{-- Product --}}
                

                @foreach($cartitems as $item)


                <div class="flex gap-3 mt-5">

                    @if($item->product && $item->product->image)
    <img src="{{ asset('storage/' . $item->product->image) }}"
         alt="{{ $item->product->name }}"
         class="w-20 h-24 rounded-xl object-cover">
@else
    <div class="w-20 h-24 rounded-xl object-cover">
        <span class="text-gray-400">No Image</span>
    </div>
@endif

                    <div class="flex-1">

                        <h3 class="font-semibold text-sm">
                            {{$item->product->name}}
                        </h3>

                        <p class="text-xs text-gray-500 mt-1">
                            Grey · M
                        </p>

                        <p class="font-semibold mt-3">
                            ₹{{$item->product->sale_price}}
                        </p>

                        <p class="text-xs text-gray-500 mt-1">
                            Quantity . {{$item->quantity}}
                        </p>

                    </div>

                </div>
                @endforeach


                {{-- Coupon --}}
                <div class="mt-7">
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

            <div>
                @csrf

                <button onclick="removeCoupon()" type="button" class="text-sm font-medium text-red-600">
                    Remove
                </button>
            </div>

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
                            class="flex-1 min-w-0 h-11
                                   px-3 rounded-xl
                                   border border-gray-200
                                   outline-none">

                        <button type="button" onclick="ApplyCoupon()" 
                            class="px-4 rounded-xl
                                   bg-gray-100
                                   text-sm font-semibold">
                            Apply
                        </button>

                    </div>
                    @endif
                    

                </div>


                {{-- Pricing --}}
                <div class="border-t mt-7 pt-6 space-y-4">

                    <div class="flex justify-between text-sm">

                        <span class="text-gray-500">
                            Subtotal
                        </span>

                        <span>
                           ₹{{$subtotal}}
                        </span>

                    </div>

                    <div class="flex justify-between text-sm">

                        <span class="text-gray-500">
                            Shipping
                        </span>

                        <span class="text-green-600">
                            Free
                        </span>

                    </div>

                    <div class="flex justify-between text-sm">

                        <span class="text-gray-500">
                            Discount
                        </span>

                        <span>
                            - ₹{{$discount}}
                        </span>

                    </div>

                </div>


                <div class="border-t mt-5 pt-5
                            flex justify-between items-center">

                    <span class="font-semibold">
                        Total
                    </span>

                    <span class="text-2xl font-bold">
                        ₹{{$total}}
                    </span>

                </div>


                <button
                    class="w-full h-13 mt-6 rounded-xl
                           bg-black text-white
                           font-semibold
                           hover:bg-gray-800">

                    Place Order · ₹{{$total}}

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

<script>
 
function removeCoupon() {

    fetch("{{ route('coupon.remove') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            "Accept": "application/json",
        }
    })
    .then(() => {
        window.location.reload();
    });
}

function ApplyCoupon() {

    let couponCode = document.getElementById('coupon_code').value;
    fetch("{{ route('coupon.apply') }}", {
        method: "POST",

        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            "Accept": "application/json",
        },

        body: JSON.stringify({
            coupon_code: couponCode
        })
    })
    .then(() => {
        window.location.reload();
    });
}

    const paymentRadios = document.querySelectorAll('.payment-radio');

    const cardPayment = document.getElementById('card-payment');
    const upiPayment = document.getElementById('upi-payment');
    const codPayment = document.getElementById('cod-payment');

    const paymentOptions = document.querySelectorAll('.payment-option');

    function updatePayment() {

        const selected = document.querySelector(
            'input[name="payment"]:checked'
        ).value;

        // Hide all
        cardPayment.classList.add('hidden');
        upiPayment.classList.add('hidden');
        codPayment.classList.add('hidden');

        // Reset borders
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

        // Show selected
        if (selected === 'card') {
            cardPayment.classList.remove('hidden');
        }

        if (selected === 'upi') {
            upiPayment.classList.remove('hidden');
        }

        if (selected === 'cod') {
            codPayment.classList.remove('hidden');
        }

        // Active card
        const activeOption = document.querySelector(
            `[data-payment="${selected}"]`
        );

        activeOption.classList.remove(
            'border',
            'border-gray-200'
        );

        activeOption.classList.add(
            'border-2',
            'border-black'
        );
    }


    paymentRadios.forEach(radio => {
        radio.addEventListener('change', updatePayment);
    });


    // Initial state
    updatePayment();
</script>
@endsection