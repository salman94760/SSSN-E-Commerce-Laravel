@extends('layouts.customer.customer-layout')

@section('title', 'SSSN | ORDER-SUCCESS')

@section('customerContent')




<section class="bg-white border-b">

    <div class="max-w-3xl mx-auto
                px-4 sm:px-6
                py-14 sm:py-16
                text-center">


        {{-- Success Icon --}}
        <div class="relative w-24 h-24 mx-auto">

            <div class="absolute inset-0
                        rounded-full
                        bg-green-100 animate-pulse">
            </div>

            <div class="absolute inset-2
                        rounded-full
                        bg-green-500
                        text-white
                        flex items-center
                        justify-center
                        text-4xl
                        font-bold">

                ✓

            </div>

        </div>


        <span class="inline-flex mt-7
                     px-4 py-2
                     rounded-full
                     bg-green-50
                     text-green-700
                     text-xs font-semibold
                     uppercase tracking-widest">

            Order Confirmed

        </span>


        <h1 class="text-4xl sm:text-5xl
                   font-bold mt-5">

            Thank You,
            {{ auth()->user()->name ?? 'Customer' }}! 🎉

        </h1>


        <p class="text-gray-500
                  max-w-xl mx-auto
                  leading-7 mt-5">

            Your order has been placed successfully.
            We've received your order and will start
            preparing it for shipment.

        </p>


        {{-- Order ID --}}
        <div class="inline-flex items-center
                    gap-3 mt-7
                    px-5 py-3
                    rounded-xl
                    bg-gray-100">

            <span class="text-xs text-gray-500">
                Order ID
            </span>

            <span class="font-bold">
                #{{ $order->order_number }}
            </span>

            <button
                onclick="copyOrderId()"
                class="text-xs font-semibold
                       hover:underline">

                Copy

            </button>

        </div>

    </div>

</section>



{{-- ========================================================= --}}
{{-- MAIN CONTENT --}}
{{-- ========================================================= --}}

<section class="max-w-6xl mx-auto
                px-4 sm:px-6 lg:px-8
                py-10">

    <div class="grid lg:grid-cols-3 gap-7">


        {{-- ================================================= --}}
        {{-- LEFT --}}
        {{-- ================================================= --}}

        <div class="lg:col-span-2 space-y-6">


            {{-- ORDER STATUS --}}
            <div class="bg-white
                        border border-gray-200
                        rounded-3xl
                        p-6 sm:p-8">

                <div class="flex items-center
                            justify-between">

                    <div>

                        <span class="text-xs uppercase
                                     tracking-widest
                                     text-gray-400">

                            Order Status

                        </span>

                        <h2 class="text-xl font-bold mt-1">
                            What's happening next?
                        </h2>

                    </div>

                    <span class="px-3 py-1.5
                                 rounded-full
                                 bg-green-50
                                 text-green-700
                                 text-xs font-semibold">

                        Confirmed

                    </span>

                </div>


                {{-- Timeline --}}
                <div class="mt-8">

                    {{-- Step 1 --}}
                    <div class="flex gap-4">

                        <div class="flex flex-col items-center">

                            <div class="w-10 h-10
                                        rounded-full
                                        bg-black text-white
                                        flex items-center
                                        justify-center
                                        font-bold">

                                ✓

                            </div>

                            <div class="w-px h-14
                                        bg-black">
                            </div>

                        </div>

                        <div class="pb-8">

                            <h3 class="font-semibold">
                                Order Pending
                            </h3>

                            <p class="text-sm
                                      text-gray-500 mt-1">

                                Your order has been successfully
                                placed.

                            </p>

                            <p class="text-xs text-gray-400 mt-2">
                                Just now
                            </p>

                        </div>

                    </div>


                    {{-- Step 2 --}}
                    <div class="flex gap-4">

                        <div class="flex flex-col items-center">

                            <div class="w-10 h-10
                                        rounded-full
                                        bg-gray-100
                                        text-gray-400
                                        flex items-center
                                        justify-center">

                                2

                            </div>

                            <div class="w-px h-14
                                        bg-gray-200">
                            </div>

                        </div>

                        <div class="pb-8">

                            <h3 class="font-semibold text-gray-500">
                                Packed
                            </h3>

                            <p class="text-sm
                                      text-gray-400 mt-1">

                                Your items will be packed
                                carefully.

                            </p>

                        </div>

                    </div>


                    {{-- Step 3 --}}
                    <div class="flex gap-4">

                        <div class="flex flex-col items-center">

                            <div class="w-10 h-10
                                        rounded-full
                                        bg-gray-100
                                        text-gray-400
                                        flex items-center
                                        justify-center">

                                3

                            </div>

                            <div class="w-px h-14
                                        bg-gray-200">
                            </div>

                        </div>

                        <div class="pb-8">

                            <h3 class="font-semibold text-gray-500">
                                Shipped
                            </h3>

                            <p class="text-sm
                                      text-gray-400 mt-1">

                                You'll receive tracking details
                                once your order ships.

                            </p>

                        </div>

                    </div>


                    {{-- Step 4 --}}
                    <div class="flex gap-4">

                        <div>

                            <div class="w-10 h-10
                                        rounded-full
                                        bg-gray-100
                                        text-gray-400
                                        flex items-center
                                        justify-center">

                                4

                            </div>

                        </div>

                        <div>

                            <h3 class="font-semibold text-gray-500">
                                Delivered
                            </h3>

                            <p class="text-sm
                                      text-gray-400 mt-1">

                                Your package arrives at your
                                doorstep.

                            </p>

                        </div>

                    </div>

                </div>

            </div>



            {{-- ORDER ITEMS --}}
            <div class="bg-white
                        border border-gray-200
                        rounded-3xl
                        p-6 sm:p-8">

                <div class="flex items-center
                            justify-between">

                    <div>

                        <span class="text-xs uppercase
                                     tracking-widest
                                     text-gray-400">

                            Your Purchase

                        </span>

                        <h2 class="text-xl font-bold mt-1">
                            Order Items
                        </h2>

                    </div>

                    <span class="text-sm text-gray-500">
                        {{$orderItem->sum('quantity')}} Items
                    </span>

                </div>

                <div class="divide-y mt-6">
                    @foreach($orderItem as $item)
                    <div class="flex gap-4 py-5">
                        <div class="w-20 h-24 rounded-xl overflow-hidden bg-gray-100 shrink-0">
                            @if($item->product->images->first())
                            <img src="{{asset('storage/'.$item->product->images->first()->name)}}" class="w-full h-full object-cover">
                            @else
                            N/A
                            @endif
                            
                        </div>

                        <div class="flex-1">
                            <h3 class="font-semibold">{{$item->product->name}}</h3>

                            <p class="text-xs
                                      text-gray-500 mt-1">

                                {{$item->color->name}} · Size {{$item->size->name}}

                            </p>

                            <p class="text-xs
                                      text-gray-400 mt-2">

                                Qty: {{$item->quantity}}

                            </p>
                             <p class="text-xs
                                      text-gray-400 mt-2">

                                Price: {{$item->price}}

                            </p>

                        </div>


                        <div class="font-semibold">
                            Total : ₹{{number_format($item->price*$item->quantity,2)}}
                        </div>

                    </div>

                    @endforeach



                 

                </div>

            </div>



            {{-- DELIVERY ADDRESS --}}
            <div class="bg-white
                        border border-gray-200
                        rounded-3xl
                        p-6 sm:p-8">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10
                                rounded-xl
                                bg-gray-100
                                flex items-center
                                justify-center">

                        📍

                    </div>

                    <div>

                        <h2 class="font-bold">
                            Delivery Address
                        </h2>

                        <p class="text-xs text-gray-400">
                            Your package will be delivered here
                        </p>

                    </div>

                </div>


                <div class="mt-5
                            bg-gray-50
                            rounded-2xl
                            p-5">

                    <p class="font-semibold">
                        {{ auth()->user()->name ?? 'John Doe' }}
                    </p>

                    <p class="text-sm text-gray-500
                              leading-6 mt-2">

                        {{$order->shipping_address}}

                    </p>

                    <p class="text-sm text-gray-500 mt-2">
                        +91 {{$order->userInfo->phone}}
                    </p>

                </div>

            </div>

        </div>



        {{-- ================================================= --}}
        {{-- RIGHT SUMMARY --}}
        {{-- ================================================= --}}

        <div>

            <div class="bg-white
                        border border-gray-200
                        rounded-3xl
                        p-6 sticky top-6">


                <div class="text-center">

                    <div class="w-12 h-12
                                rounded-full
                                bg-green-100
                                text-green-600
                                mx-auto
                                flex items-center
                                justify-center
                                text-xl">

                        ✓

                    </div>

                    <h2 class="font-bold text-xl mt-4">
                        Payment Successful
                    </h2>

                    <p class="text-xs text-gray-500 mt-2">
                        Transaction completed successfully.
                    </p>

                </div>


                {{-- PAYMENT --}}
                <div class="bg-gray-50
                            rounded-2xl
                            p-4 mt-6">

                    <div class="flex justify-between text-sm">

                        <span class="text-gray-500">
                            Payment Method
                        </span>

                        <span class="font-semibold">
                            {{$order->payment_method}}
                        </span>

                    </div>

                    <div class="flex justify-between
                                text-sm mt-3">

                        <span class="text-gray-500">
                            Transaction ID
                        </span>

                        <span class="font-semibold">
                            TXN7845129
                        </span>

                    </div>

                </div>


                {{-- PRICE --}}
                <div class="border-t mt-6 pt-6 space-y-4">

                    <div class="flex justify-between text-sm">

                        <span class="text-gray-500">
                            Subtotal
                        </span>

                        <span>
                            ₹{{ number_format($order->total_amount, 2) }}
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
                            - ₹{{$order->discount_amount}}
                        </span>

                    </div>

                </div>


                <div class="border-t mt-5 pt-5
                            flex items-center
                            justify-between">

                    <span class="font-semibold">
                        Total Paid
                    </span>

                    <span class="text-2xl font-bold">
                        ₹{{ number_format($order->total_amount-$order->discount_amount, 2) }}
                    </span>

                </div>


                {{-- ACTIONS --}}
                <div class="space-y-3 mt-7">

                    <a href="{{ url('/my-orders') }}"
                       class="w-full h-12
                              rounded-xl
                              bg-black text-white
                              flex items-center
                              justify-center
                              text-sm font-semibold
                              hover:bg-gray-800">

                        View My Orders

                    </a>


                    <a href="{{ url('/shop') }}"
                       class="w-full h-12
                              rounded-xl
                              border border-gray-200
                              flex items-center
                              justify-center
                              text-sm font-semibold
                              hover:bg-gray-50">

                        Continue Shopping

                    </a>

                </div>


                {{-- HELP --}}
                <div class="border-t mt-6 pt-5 text-center">

                    <p class="text-xs text-gray-400">
                        Need help with your order?
                    </p>

                    <a href="{{ url('/contact') }}"
                       class="inline-block
                              text-sm font-semibold
                              mt-2 hover:underline">

                        Contact Support →

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


<script>

    function copyOrderId() {

        navigator.clipboard.writeText('ORD-20260821-1048');

        alert('Order ID copied!');

    }

</script>
@endsection





