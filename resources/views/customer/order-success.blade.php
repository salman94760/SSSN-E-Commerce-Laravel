@extends('layouts.customer.customer-layout')

@section('title', 'SSSN | ORDER-SUCCESS')

@section('customerContent')

<section class="bg-[#fffdf9] border-b border-[#e8dccb]">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 py-14 sm:py-16 text-center">

        {{-- Success Icon --}}
        <div class="relative w-24 h-24 mx-auto">
            <div class="absolute inset-0 rounded-full bg-[#f5efe6] animate-pulse"></div>
            <div class="absolute inset-2 rounded-full bg-[#493825] text-white flex items-center justify-center text-4xl font-bold">
                ✓
            </div>
        </div>

        <span class="inline-flex mt-7 px-4 py-2 rounded-full bg-[#f5efe6] text-[#79654e] text-xs font-semibold uppercase tracking-widest">
            Order Confirmed
        </span>

        <h1 class="text-3xl sm:text-5xl font-serif text-[#493825] mt-5">
            Thank You,
            {{ auth()->user()->name ?? 'Customer' }}! 🎉
        </h1>

        <p class="text-[#79654e] max-w-xl mx-auto leading-7 mt-5">
            Your order has been placed successfully.
            We've received your order and will start
            preparing it for shipment.
        </p>

        {{-- Order ID --}}
        <div class="inline-flex items-center gap-3 mt-7 px-5 py-3 rounded-xl bg-[#f5efe6] border border-[#e8dccb]">
            <span class="text-xs text-[#9a846a]">Order ID</span>

            <span class="font-bold text-[#493825]" id="orderNumber">
                #{{ $order->order_number }}
            </span>

            <button
                type="button"
                onclick="copyOrderId()"
                class="text-xs font-semibold text-[#79654e] hover:text-[#493825] hover:underline">
                Copy
            </button>
        </div>
    </div>
</section>

{{-- MAIN CONTENT --}}
<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="grid lg:grid-cols-3 gap-7">

        {{-- LEFT --}}
        <div class="lg:col-span-2 space-y-6">

            {{-- ORDER STATUS --}}
            <div class="bg-white border border-[#e8dccb] rounded-3xl p-6 sm:p-8 shadow-sm">

                <div class="flex items-center justify-between gap-3">
                    <div>
                        <span class="text-xs uppercase tracking-widest text-[#9a846a]">
                            Order Status
                        </span>

                        <h2 class="text-xl font-semibold text-[#493825] mt-1">
                            What's happening next?
                        </h2>
                    </div>

                    <span class="px-3 py-1.5 rounded-full bg-[#f5efe6] text-[#79654e] text-xs font-semibold">
                        Confirmed
                    </span>
                </div>

                {{-- Timeline --}}
                <div class="mt-8">

                    {{-- Step 1 --}}
                    <div class="flex gap-4">
                        <div class="flex flex-col items-center">
                            <div class="w-10 h-10 rounded-full bg-[#493825] text-white flex items-center justify-center font-bold">
                                ✓
                            </div>
                            <div class="w-px h-14 bg-[#493825]"></div>
                        </div>

                        <div class="pb-8">
                            <h3 class="font-semibold text-[#493825]">
                                Order Placed
                            </h3>
                            <p class="text-sm text-[#79654e] mt-1">
                                Your order has been successfully placed.
                            </p>
                            <p class="text-xs text-[#9a846a] mt-2">
                                Just now
                            </p>
                        </div>
                    </div>

                    {{-- Step 2 --}}
                    <div class="flex gap-4">
                        <div class="flex flex-col items-center">
                            <div class="w-10 h-10 rounded-full bg-[#f5efe6] text-[#9a846a] flex items-center justify-center">
                                2
                            </div>
                            <div class="w-px h-14 bg-[#e8dccb]"></div>
                        </div>

                        <div class="pb-8">
                            <h3 class="font-semibold text-[#79654e]">Packed</h3>
                            <p class="text-sm text-[#9a846a] mt-1">
                                Your items will be packed carefully.
                            </p>
                        </div>
                    </div>

                    {{-- Step 3 --}}
                    <div class="flex gap-4">
                        <div class="flex flex-col items-center">
                            <div class="w-10 h-10 rounded-full bg-[#f5efe6] text-[#9a846a] flex items-center justify-center">
                                3
                            </div>
                            <div class="w-px h-14 bg-[#e8dccb]"></div>
                        </div>

                        <div class="pb-8">
                            <h3 class="font-semibold text-[#79654e]">Shipped</h3>
                            <p class="text-sm text-[#9a846a] mt-1">
                                You'll receive tracking details once your order ships.
                            </p>
                        </div>
                    </div>

                    {{-- Step 4 --}}
                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-full bg-[#f5efe6] text-[#9a846a] flex items-center justify-center">
                            4
                        </div>

                        <div>
                            <h3 class="font-semibold text-[#79654e]">Delivered</h3>
                            <p class="text-sm text-[#9a846a] mt-1">
                                Your package arrives at your doorstep.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            {{-- ORDER ITEMS --}}
            <div class="bg-white border border-[#e8dccb] rounded-3xl p-6 sm:p-8 shadow-sm">

                <div class="flex items-center justify-between gap-3">
                    <div>
                        <span class="text-xs uppercase tracking-widest text-[#9a846a]">
                            Your Purchase
                        </span>
                        <h2 class="text-xl font-semibold text-[#493825] mt-1">
                            Order Items
                        </h2>
                    </div>

                    <span class="text-sm text-[#79654e]">
                        {{ $orderItem->sum('quantity') }} Items
                    </span>
                </div>

                <div class="divide-y divide-[#eee4d8] mt-6">
                    @foreach($orderItem as $item)
                    <div class="flex flex-col sm:flex-row gap-4 py-5">

                        <div class="w-20 h-24 rounded-xl overflow-hidden bg-[#f5efe6] border border-[#eee4d8] shrink-0">
                            @if($item->product->images->first())
                                <img
                                    src="{{ asset('storage/'.$item->product->images->first()->name) }}"
                                    alt="{{ $item->product->name }}"
                                    class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-xs text-[#9a846a]">
                                    N/A
                                </div>
                            @endif
                        </div>

                        <div class="flex-1">
                            <h3 class="font-semibold text-[#493825]">
                                {{ $item->product->name }}
                            </h3>

                            <p class="text-xs text-[#79654e] mt-2">
                                {{ $item->color->name }} · Size {{ $item->size->name }}
                            </p>

                            <p class="text-xs text-[#9a846a] mt-2">
                                Qty: {{ $item->quantity }}
                            </p>

                            <p class="text-xs text-[#9a846a] mt-2">
                                Price: ₹{{ number_format($item->price, 2) }}
                            </p>
                        </div>

                        <div class="font-semibold text-[#493825] sm:text-right">
                            Total: ₹{{ number_format($item->price * $item->quantity, 2) }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- DELIVERY ADDRESS --}}
            <div class="bg-white border border-[#e8dccb] rounded-3xl p-6 sm:p-8 shadow-sm">

                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-[#f5efe6] flex items-center justify-center text-[#79654e]">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>

                    <div>
                        <h2 class="font-semibold text-[#493825]">
                            Delivery Address
                        </h2>
                        <p class="text-xs text-[#9a846a]">
                            Your package will be delivered here
                        </p>
                    </div>
                </div>

                <div class="mt-5 bg-[#faf7f2] border border-[#eee4d8] rounded-2xl p-5">
                    <p class="font-semibold text-[#493825]">
                        {{ auth()->user()->name ?? 'Customer' }}
                    </p>

                    <p class="text-sm text-[#79654e] leading-6 mt-2">
                        {{ auth()->user()->userInfo->address ?? '' }}, {{ auth()->user()->userInfo->city ?? '' }}, {{ auth()->user()->userInfo->state ?? '' }}, {{ auth()->user()->userInfo->zipcode ?? '' }}
                    </p>
                    <p class="text-sm text-[#79654e] leading-6 mt-2">
                       <span class="font-semibold text-[#493825]"> Landmark:</span> {{ auth()->user()->userInfo->landmark ?? '' }}
                        
                    </p>

                    <p class="text-sm text-[#79654e] mt-2">
                        +91 {{ $order->userInfo->phone }}
                    </p>
                </div>
            </div>
        </div>

        {{-- RIGHT SUMMARY --}}
        <div>
            <div class="bg-white border border-[#e8dccb] rounded-3xl p-6 sticky top-6 shadow-sm">

                <div class="text-center">
                    <div class="w-12 h-12 rounded-full bg-[#f5efe6] text-[#493825] mx-auto flex items-center justify-center text-xl">
                        <i class="fas fa-check"></i>
                    </div>

                    <h2 class="font-semibold text-xl text-[#493825] mt-4">
                        Payment Successful
                    </h2>

                    <p class="text-xs text-[#9a846a] mt-2">
                        Transaction completed successfully.
                    </p>
                </div>

                {{-- PAYMENT --}}
                <div class="bg-[#faf7f2] border border-[#eee4d8] rounded-2xl p-4 mt-6">
                    <div class="flex justify-between text-sm gap-3">
                        <span class="text-[#79654e]">Payment Method</span>
                        <span class="font-semibold text-[#493825]">
                            {{ $order->payment_method }}
                        </span>
                    </div>

                    <div class="flex justify-between text-sm mt-3 gap-3">
                        <span class="text-[#79654e]">Transaction ID</span>
                        <span class="font-semibold text-[#493825]">
                            TXN7845129
                        </span>
                    </div>
                </div>

                {{-- PRICE --}}
                <div class="border-t border-[#e8dccb] mt-6 pt-6 space-y-4">

                    <div class="flex justify-between text-sm">
                        <span class="text-[#79654e]">Subtotal</span>
                        <span class="text-[#493825]">
                            ₹{{ number_format($order->total_amount, 2) }}
                        </span>
                    </div>

                    <div class="flex justify-between text-sm">
                        <span class="text-[#79654e]">Shipping</span>
                        <span class="text-[#79654e]">Free</span>
                    </div>

                    <div class="flex justify-between text-sm">
                        <span class="text-[#79654e]">Discount</span>
                        <span class="text-[#493825]">
                            - ₹{{ number_format($order->discount_amount, 2) }}
                        </span>
                    </div>
                </div>

                <div class="border-t border-[#e8dccb] mt-5 pt-5 flex items-center justify-between gap-3">
                    <span class="font-semibold text-[#493825]">Total Paid</span>

                    <span class="text-2xl font-bold text-[#493825]">
                        ₹{{ number_format($order->total_amount - $order->discount_amount, 2) }}
                    </span>
                </div>

                {{-- ACTIONS --}}
                <div class="space-y-3 mt-7">

                    <a href="{{ url('/my-orders') }}"
                       class="w-full h-12 rounded-xl bg-[#493825] text-white flex items-center justify-center text-sm font-semibold hover:bg-[#5c4630] transition">
                        <i class="fas fa-box mr-2"></i>
                        View My Orders
                    </a>

                    <a href="{{ url('/shop') }}"
                       class="w-full h-12 rounded-xl border border-[#d2b99c] text-[#493825] flex items-center justify-center text-sm font-semibold hover:bg-[#f5efe6] transition">
                        Continue Shopping
                    </a>
                </div>

                {{-- HELP --}}
                <div class="border-t border-[#e8dccb] mt-6 pt-5 text-center">
                    <p class="text-xs text-[#9a846a]">
                        Need help with your order?
                    </p>

                    <a href="{{ url('/contact') }}"
                       class="inline-block text-sm font-semibold text-[#493825] mt-2 hover:underline">
                        Contact Support →
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>

<script>
    function copyOrderId() {
        const orderId = document.getElementById('orderNumber').innerText;

        navigator.clipboard.writeText(orderId)
            .then(() => alert('Order ID copied!'))
            .catch(() => alert('Unable to copy Order ID.'));
    }
</script>

@endsection