@extends('layouts.customer.customer-layout')

@section('customerContent')

<div class="min-h-screen bg-[#faf7f2] py-8">

<div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">

    {{-- Back --}}
    <div class="mb-6">
        <a
            href="{{ route('customer.my-orders') }}"
            class="inline-flex items-center text-sm font-medium text-[#79654e] hover:text-[#493825] transition"
        >
            <i class="fas fa-arrow-left mr-2"></i>
            Back to My Orders
        </a>
    </div>

    {{-- PAGE HEADER --}}
    <div class="mb-7 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">

        <div>
            <p class="text-xs uppercase tracking-[3px] text-[#9a846a] mb-2">
                SSSN Fashion
            </p>

            <h1 class="text-3xl font-serif text-[#493825]">
                Order Details
            </h1>

            <p class="mt-2 text-sm text-[#79654e]">
                Order #{{ $order->order_number }}
            </p>
        </div>

        {{-- STATUS --}}
        <div>

            @if($order->order_status === 'Pending')

                <span class="inline-flex items-center rounded-full bg-[#fff4dc] px-4 py-2 text-sm font-semibold text-[#94702e]">
                    <span class="mr-2 h-2 w-2 rounded-full bg-[#bd9556]"></span>
                    Pending
                </span>

            @elseif($order->order_status === 'Processing')

                <span class="inline-flex items-center rounded-full bg-[#f0e8dc] px-4 py-2 text-sm font-semibold text-[#79654e]">
                    <span class="mr-2 h-2 w-2 rounded-full bg-[#9a846a]"></span>
                    Processing
                </span>

            @elseif($order->order_status === 'Shipped')

                <span class="inline-flex items-center rounded-full bg-[#eee8f2] px-4 py-2 text-sm font-semibold text-[#705b7c]">
                    <span class="mr-2 h-2 w-2 rounded-full bg-[#9276a3]"></span>
                    Shipped
                </span>

            @elseif($order->order_status === 'Delivered')

                <span class="inline-flex items-center rounded-full bg-[#eaf1e7] px-4 py-2 text-sm font-semibold text-[#54704a]">
                    <span class="mr-2">✓</span>
                    Delivered
                </span>

            @elseif($order->order_status === 'Cancelled')

                @if($order->cancelled_by === 'admin')

                    <span class="inline-flex items-center rounded-full bg-[#fbeceb] px-4 py-2 text-sm font-semibold text-[#a34c45]">
                        <span class="mr-2">✕</span>
                        Cancelled by Admin
                    </span>

                @elseif($order->cancelled_by === 'user')

                    <span class="inline-flex items-center rounded-full bg-[#fff0e6] px-4 py-2 text-sm font-semibold text-[#a76538]">
                        <span class="mr-2">✕</span>
                        Cancelled by You
                    </span>

                @else

                    <span class="inline-flex items-center rounded-full bg-[#fbeceb] px-4 py-2 text-sm font-semibold text-[#a34c45]">
                        <span class="mr-2">✕</span>
                        Cancelled
                    </span>

                @endif

            @else

                <span class="inline-flex rounded-full bg-[#f5efe6] px-4 py-2 text-sm font-semibold text-[#79654e]">
                    {{ $order->order_status }}
                </span>

            @endif

        </div>

    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

        {{-- LEFT SIDE --}}
        <div class="space-y-6 lg:col-span-2">

            {{-- ORDERED PRODUCTS --}}
            <div class="overflow-hidden rounded-2xl border border-[#e8dccb] bg-white shadow-sm">

                <div class="border-b border-[#eee4d8] px-5 py-5">
                    <h2 class="text-lg font-semibold text-[#493825]">
                        Ordered Items
                    </h2>

                    <p class="mt-1 text-sm text-[#9a846a]">
                        {{ $totalitems }} item(s) in this order
                    </p>
                </div>

                <div class="divide-y divide-[#eee4d8]">

                    @foreach($orderitems as $item)

                        <div class="p-5">

                            <div class="flex gap-4">

                                {{-- Product Image --}}
                                <div class="h-24 w-24 shrink-0 overflow-hidden rounded-xl border border-[#eee4d8] bg-[#f5efe6]">

                                    @if($item->product && $item->product->images && $item->product->images->count())

                                        <img
                                            src="{{ asset('storage/' . $item->product->images->first()->name) }}"
                                            alt="{{ $item->product->name }}"
                                            class="h-full w-full object-cover"
                                        >

                                    @else

                                        <div class="flex h-full w-full items-center justify-center text-xs text-[#9a846a]">
                                            <i class="fas fa-image text-xl"></i>
                                        </div>

                                    @endif

                                </div>

                                {{-- Product Information --}}
                                <div class="min-w-0 flex-1">

                                    @if($item->product)

                                        <h3 class="text-base font-semibold text-[#493825]">
                                            {{ $item->product->name }}
                                        </h3>

                                    @else

                                        <h3 class="text-base font-semibold text-[#9a846a]">
                                            Product unavailable
                                        </h3>

                                    @endif

                                    <div class="mt-2 space-y-1 text-sm text-[#79654e]">

                                        <p>
                                            Quantity:
                                            <span class="font-medium text-[#493825]">
                                                {{ $item->quantity }}
                                            </span>
                                        </p>

                                        @if($item->product)

                                            <p>
                                                Price:
                                                <span class="font-medium text-[#493825]">
                                                    ₹{{ number_format($item->price, 2) }}
                                                </span>
                                            </p>

                                        @endif

                                        {{-- Size --}}
                                        @if($item->size)

                                            <p>
                                                Size:
                                                <span class="font-medium text-[#493825]">
                                                    {{ $item->size->name }}
                                                </span>
                                            </p>

                                        @endif

                                    </div>

                                </div>

                                {{-- Item Total --}}
                                <div class="text-right shrink-0">

                                    <p class="text-xs text-[#9a846a]">
                                        Total
                                    </p>

                                    @if($item->product)

                                        <p class="mt-1 text-base font-bold text-[#493825]">
                                            ₹{{ number_format($item->price * $item->quantity, 2) }}
                                        </p>

                                    @else

                                        <p class="mt-1 text-base font-bold text-[#9a846a]">
                                            N/A
                                        </p>

                                    @endif

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

            {{-- TRACK ORDER --}}
            <div class="overflow-hidden rounded-2xl border border-[#e8dccb] bg-white shadow-sm">

                <div class="border-b border-[#eee4d8] px-5 py-5">

                    <h2 class="text-lg font-semibold text-[#493825]">
                        <i class="fas fa-route mr-2 text-[#9a846a]"></i>
                        Track Order
                    </h2>

                    <p class="mt-1 text-sm text-[#9a846a]">
                        Order #{{ $order->order_number }}
                    </p>

                </div>

                {{-- NORMAL TRACKING --}}
                @if($order->order_status !== 'Cancelled')

                    @php

                        $statuses = [

                            'Pending' => [
                                'title' => 'Order Placed',
                                'description' => 'Your order has been successfully placed.',
                            ],

                            'Processing' => [
                                'title' => 'Processing',
                                'description' => 'Your order is being prepared.',
                            ],

                            'Shipped' => [
                                'title' => 'Shipped',
                                'description' => 'Your order has been shipped.',
                            ],

                            'Delivered' => [
                                'title' => 'Delivered',
                                'description' => 'Your order has been delivered successfully.',
                            ],

                        ];

                        $statusOrder = [
                            'Pending',
                            'Processing',
                            'Shipped',
                            'Delivered'
                        ];

                        $currentStatus = $order->order_status;

                        $currentIndex = array_search(
                            $currentStatus,
                            $statusOrder
                        );

                        if ($currentIndex === false) {
                            $currentIndex = 0;
                        }

                    @endphp

                    <div class="px-5 py-7">

                        <div class="relative">

                            {{-- Vertical Line --}}
                            <div class="absolute left-[15px] top-4 h-[calc(100%-32px)] w-0.5 bg-[#e8dccb]"></div>

                            @foreach($statusOrder as $index => $status)

                                @php
                                    $isCompleted = $index <= $currentIndex;
                                    $isCurrent = $index === $currentIndex;
                                @endphp

                                <div class="relative flex gap-4 pb-9 last:pb-0">

                                    {{-- Circle --}}
                                    <div
                                        class="relative z-10 flex h-8 w-8 shrink-0 items-center justify-center rounded-full
                                        {{ $isCompleted ? 'bg-[#493825]' : 'bg-[#f5efe6]' }}"
                                    >

                                        @if($isCompleted)

                                            <i class="fas fa-check text-xs text-white"></i>

                                        @else

                                            <span class="h-2.5 w-2.5 rounded-full bg-[#c8b9a5]"></span>

                                        @endif

                                    </div>

                                    {{-- Status Content --}}
                                    <div class="flex-1">

                                        <div class="flex flex-col justify-between gap-2 sm:flex-row">

                                            <div>

                                                <h3
                                                    class="text-sm font-semibold
                                                    {{ $isCurrent
                                                        ? 'text-[#493825]'
                                                        : ($isCompleted
                                                            ? 'text-[#493825]'
                                                            : 'text-[#b2a28f]') }}"
                                                >
                                                    {{ $statuses[$status]['title'] }}
                                                </h3>

                                                <p
                                                    class="mt-1 text-sm
                                                    {{ $isCompleted ? 'text-[#79654e]' : 'text-[#b2a28f]' }}"
                                                >
                                                    {{ $statuses[$status]['description'] }}
                                                </p>

                                            </div>

                                            @if($isCurrent)

                                                <span class="inline-flex h-fit w-fit rounded-full bg-[#f5efe6] px-3 py-1 text-xs font-semibold text-[#79654e]">
                                                    Current
                                                </span>

                                            @endif

                                        </div>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>

                {{-- CANCELLED TRACKING --}}
                @else

                    <div class="px-5 py-6">

                        <div class="rounded-xl border border-[#ead5d1] bg-[#fcf5f3] p-5">

                            @if($order->cancelled_by === 'admin')

                                <div class="flex items-start gap-4">

                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#f5e4e1] text-[#a34c45]">
                                        ✕
                                    </div>

                                    <div class="flex-1">
                                        <h3 class="text-base font-semibold text-[#8f443e]">
                                            Order Cancelled by Admin
                                        </h3>

                                        <p class="mt-1 text-sm text-[#a7655d]">
                                            This order was cancelled by the store administrator.
                                        </p>
                                    </div>

                                </div>

                            @elseif($order->cancelled_by === 'user')

                                <div class="flex items-start gap-4">

                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#fff0e6] text-[#a76538]">
                                        ✕
                                    </div>

                                    <div class="flex-1">
                                        <h3 class="text-base font-semibold text-[#965d35]">
                                            You Cancelled This Order
                                        </h3>

                                        <p class="mt-1 text-sm text-[#a76538]">
                                            This order was cancelled by you.
                                        </p>
                                    </div>

                                </div>

                            @else

                                <div class="flex items-start gap-4">

                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#f5e4e1] text-[#a34c45]">
                                        ✕
                                    </div>

                                    <div class="flex-1">
                                        <h3 class="text-base font-semibold text-[#8f443e]">
                                            Order Cancelled
                                        </h3>

                                        <p class="mt-1 text-sm text-[#a7655d]">
                                            This order has been cancelled.
                                        </p>
                                    </div>

                                </div>

                            @endif

                            {{-- Cancellation Reason --}}
                            @if(!empty($order->cancel_reason))

                                <div class="mt-5 border-t border-[#ead5d1] pt-4">

                                    <p class="text-xs font-semibold uppercase tracking-wide text-[#9a846a]">
                                        Cancellation Reason
                                    </p>

                                    <p class="mt-1 text-sm text-[#79654e]">
                                        {{ $order->cancel_reason }}
                                    </p>

                                </div>

                            @endif

                            {{-- Cancellation Date --}}
                            @if(!empty($order->cancelled_at))

                                <div class="mt-3">

                                    <p class="text-xs text-[#9a846a]">
                                        Cancelled on:

                                        <span class="font-medium text-[#493825]">
                                            {{ \Carbon\Carbon::parse($order->cancelled_at)->format('d M Y, h:i A') }}
                                        </span>
                                    </p>

                                </div>

                            @endif

                        </div>

                    </div>

                @endif

            </div>

            {{-- SHIPPING ADDRESS --}}
            <div class="rounded-2xl border border-[#e8dccb] bg-white shadow-sm">

                <div class="border-b border-[#eee4d8] px-5 py-5">

                    <h2 class="text-lg font-semibold text-[#493825]">
                        <i class="fas fa-map-marker-alt mr-2 text-[#9a846a]"></i>
                        Shipping Address
                    </h2>

                </div>

                <div class="px-5 py-5">

                    <p class="text-sm text-[#79654e] leading-6 mt-2">
                        {{ auth()->user()->userInfo->address ?? '' }}, {{ auth()->user()->userInfo->city ?? '' }}, {{ auth()->user()->userInfo->state ?? '' }}, {{ auth()->user()->userInfo->zipcode ?? '' }}
                    </p>
                    <p class="text-sm text-[#79654e] leading-6 mt-2">
                       <span class="font-semibold text-[#493825]"> Landmark:</span> {{ auth()->user()->userInfo->landmark ?? '' }}
                        
                    </p>

                </div>

            </div>

            {{-- CUSTOMER INFORMATION --}}
            @if($order->userInfo)

                <div class="rounded-2xl border border-[#e8dccb] bg-white shadow-sm">

                    <div class="border-b border-[#eee4d8] px-5 py-5">

                        <h2 class="text-lg font-semibold text-[#493825]">
                            <i class="fas fa-user mr-2 text-[#9a846a]"></i>
                            Customer Information
                        </h2>

                    </div>

                    <div class="grid grid-cols-1 gap-5 px-5 py-5 sm:grid-cols-2">

                        <div>
                            <p class="text-xs font-medium uppercase tracking-wide text-[#9a846a]">
                                Phone
                            </p>

                            <p class="mt-2 text-sm font-medium text-[#493825]">
                                {{ $order->userInfo->phone ?? 'N/A' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-medium uppercase tracking-wide text-[#9a846a]">
                                ZIP Code
                            </p>

                            <p class="mt-2 text-sm font-medium text-[#493825]">
                                {{ $order->userInfo->zipcode ?? 'N/A' }}
                            </p>
                        </div>

                    </div>

                </div>

            @endif

        </div>

        {{-- RIGHT SIDE --}}
        <div class="space-y-6">

            {{-- CANCEL ORDER --}}
            @if(in_array($order->order_status, ['Pending', 'Processing']))

                <div class="rounded-2xl border border-[#e8dccb] bg-white shadow-sm">

                    <div class="border-b border-[#eee4d8] px-5 py-5">

                        <h2 class="text-lg font-semibold text-[#493825]">
                            Cancel Order
                        </h2>

                        <p class="mt-1 text-sm text-[#9a846a]">
                            You can cancel this order before it is shipped.
                        </p>

                    </div>

                    <div class="px-5 py-5">

                        <form
                            action="{{ route('customer.order.cancel', $order->order_number) }}"
                            method="POST"
                            onsubmit="return confirm('Are you sure you want to cancel this order?');"
                        >

                            @csrf
                            @method('PATCH')

                            <input type="hidden" name="userRole" value="{{ auth()->user()->role }}"/>

                            <label
                                for="cancel_reason"
                                class="block text-sm font-medium text-[#493825]"
                            >
                                Cancellation Reason
                            </label>

                            <textarea
                                name="cancel_reason"
                                id="cancel_reason"
                                rows="3"
                                required
                                placeholder="Please tell us why you want to cancel this order..."
                                class="mt-2 block w-full rounded-xl border border-[#e8dccb] bg-[#fffdf9] px-3 py-3 text-sm text-[#493825] shadow-sm outline-none transition placeholder:text-[#b2a28f] focus:border-[#a98b6b] focus:ring-1 focus:ring-[#a98b6b]"
                            ></textarea>

                            @error('cancel_reason')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                            <button
                                type="submit"
                                class="mt-4 inline-flex w-full items-center justify-center rounded-xl bg-[#493825] px-4 py-3 text-sm font-semibold text-white transition hover:bg-[#5c4630]"
                            >
                                <i class="fas fa-times mr-2"></i>
                                Cancel Order
                            </button>

                            <p class="mt-3 text-center text-xs text-[#9a846a]">
                                Cancellation is not available after the order has been shipped.
                            </p>

                        </form>

                    </div>

                </div>

            @elseif($order->order_status === 'Shipped' || $order->payment_status === 'paid')

                {{-- Shipped - Cannot Cancel --}}
                <div class="rounded-2xl border border-[#e2d7e9] bg-[#f7f3f9] shadow-sm">

                    <div class="px-5 py-5">

                        <div class="flex items-start gap-3">

                            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#eee8f2] text-[#705b7c]">
                                <i class="fas fa-truck"></i>
                            </div>

                            <div>
                                <h2 class="text-sm font-semibold text-[#705b7c]">
                                    Order Cannot Be Cancelled
                                </h2>

                                <p class="mt-1 text-sm text-[#806e8b]">
                                    Your order has already been shipped and can no longer be cancelled.
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

            @endif

            {{-- ORDER SUMMARY --}}
            <div class="rounded-2xl border border-[#e8dccb] bg-white shadow-sm">

                <div class="border-b border-[#eee4d8] px-5 py-5">

                    <h2 class="text-lg font-semibold text-[#493825]">
                        Order Summary
                    </h2>

                </div>

                <div class="space-y-4 px-5 py-5">

                    <div class="flex justify-between text-sm">
                        <span class="text-[#79654e]">Subtotal</span>

                        <span class="font-medium text-[#493825]">
                            ₹{{ number_format($order->subtotal, 2) }}
                        </span>
                    </div>

                    <div class="flex justify-between text-sm">
                        <span class="text-[#79654e]">Shipping</span>

                        <span class="font-medium text-[#493825]">
                            ₹{{ number_format($order->shipping_charge, 2) }}
                        </span>
                    </div>

                    <div class="flex justify-between text-sm">
                        <span class="text-[#79654e]">Discount</span>

                        <span class="font-medium text-[#493825]">
                            -₹{{ number_format($order->discount_amount, 2) }}
                        </span>
                    </div>

                    <div class="flex justify-between text-sm gap-3">
                        <span class="text-[#79654e]">Coupon Applied</span>

                        <span class="font-medium text-[#493825]">

                            @if($order->coupon_code)

                                <b>{{ strtoupper($order->coupon_code) }}</b>

                            @else

                                <span class="text-[#b2a28f]">None</span>

                            @endif

                        </span>
                    </div>

                    <div class="border-t border-[#e8dccb] pt-4">

                        <div class="flex justify-between gap-3">

                            <span class="text-base font-semibold text-[#493825]">
                                Total
                            </span>

                            <span class="text-xl font-bold text-[#493825]">
                                ₹{{ number_format($order->total_amount - $order->discount_amount, 2) }}
                            </span>

                        </div>

                    </div>

                </div>

            </div>

            {{-- PAYMENT INFORMATION --}}
            <div class="rounded-2xl border border-[#e8dccb] bg-white shadow-sm">

                <div class="border-b border-[#eee4d8] px-5 py-5">

                    <h2 class="text-lg font-semibold text-[#493825]">
                        <i class="fas fa-credit-card mr-2 text-[#9a846a]"></i>
                        Payment Information
                    </h2>

                </div>

                <div class="space-y-4 px-5 py-5">

                    <div>
                        <p class="text-xs font-medium uppercase tracking-wide text-[#9a846a]">
                            Payment Method
                        </p>

                        <p class="mt-2 text-sm font-semibold text-[#493825]">
                            {{ $order->payment_method }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs font-medium uppercase tracking-wide text-[#9a846a]">
                            Payment Status
                        </p>

                        @if($order->payment_status === 'Paid')

                            <span class="mt-2 inline-flex rounded-full bg-[#eaf1e7] px-3 py-1.5 text-xs font-semibold text-[#54704a]">
                                Paid
                            </span>

                        @elseif($order->payment_status === 'Failed')

                            <span class="mt-2 inline-flex rounded-full bg-[#fbeceb] px-3 py-1.5 text-xs font-semibold text-[#a34c45]">
                                Failed
                            </span>

                        @elseif($order->payment_status === 'Refunded')

                            <span class="mt-2 inline-flex rounded-full bg-[#eee8f2] px-3 py-1.5 text-xs font-semibold text-[#705b7c]">
                                Refunded
                            </span>

                        @else

                            <span class="mt-2 inline-flex rounded-full bg-[#fff4dc] px-3 py-1.5 text-xs font-semibold text-[#94702e]">
                                {{ $order->payment_status }}
                            </span>

                        @endif

                    </div>

                    @if($order->transaction_id)

                        <div>
                            <p class="text-xs font-medium uppercase tracking-wide text-[#9a846a]">
                                Transaction ID
                            </p>

                            <p class="mt-2 break-all text-sm text-[#493825]">
                                {{ $order->transaction_id }}
                            </p>
                        </div>

                    @endif

                </div>

            </div>

            {{-- ORDER INFORMATION --}}
            <div class="rounded-2xl border border-[#e8dccb] bg-white shadow-sm">

                <div class="border-b border-[#eee4d8] px-5 py-5">

                    <h2 class="text-lg font-semibold text-[#493825]">
                        Order Information
                    </h2>

                </div>

                <div class="space-y-4 px-5 py-5">

                    <div class="flex justify-between gap-4">
                        <span class="text-sm text-[#79654e]">Order Number</span>

                        <span class="text-right text-sm font-medium text-[#493825]">
                            {{ $order->order_number }}
                        </span>
                    </div>

                    <div class="flex justify-between gap-4">
                        <span class="text-sm text-[#79654e]">Order Date</span>

                        <span class="text-right text-sm font-medium text-[#493825]">
                            {{ $order->created_at->format('d M Y, h:i A') }}
                        </span>
                    </div>

                    <div class="flex justify-between gap-4">
                        <span class="text-sm text-[#79654e]">Items</span>

                        <span class="text-sm font-medium text-[#493825]">
                            {{ $totalitems }}
                        </span>
                    </div>

                    <div class="flex justify-between gap-4">
                        <span class="text-sm text-[#79654e]">Status</span>

                        <span
                            class="text-right text-sm font-semibold
                            @if($order->order_status === 'Delivered')
                                text-[#54704a]
                            @elseif($order->order_status === 'Cancelled')
                                text-[#a34c45]
                            @else
                                text-[#493825]
                            @endif"
                        >
                            {{ $order->order_status }}
                        </span>
                    </div>

                </div>

            </div>

            {{-- CANCELLATION INFORMATION --}}
            @if($order->order_status === 'Cancelled')

                <div class="rounded-2xl border border-[#ead5d1] bg-[#fcf5f3] shadow-sm">

                    <div class="border-b border-[#ead5d1] px-5 py-5">

                        <h2 class="text-lg font-semibold text-[#8f443e]">
                            Cancellation Information
                        </h2>

                    </div>

                    <div class="space-y-4 px-5 py-5">

                        {{-- Cancelled By --}}
                        <div>

                            <p class="text-xs font-medium uppercase tracking-wide text-[#9a846a]">
                                Cancelled By
                            </p>

                            <p
                                class="mt-2 text-sm font-semibold
                                @if($order->cancelled_by === 'admin')
                                    text-[#a34c45]
                                @elseif($order->cancelled_by === 'user')
                                    text-[#a76538]
                                @else
                                    text-[#79654e]
                                @endif"
                            >

                                @if($order->cancel_by === 'admin')

                                    Admin

                                @elseif($order->cancel_by === 'customer')

                                    You

                                @else

                                    N/A

                                @endif

                            </p>

                        </div>

                        {{-- Reason --}}
                        @if(!empty($order->cancel_reason))

                            <div>

                                <p class="text-xs font-medium uppercase tracking-wide text-[#9a846a]">
                                    Reason
                                </p>

                                <p class="mt-2 text-sm text-[#79654e]">
                                    {{ $order->cancel_reason }}
                                </p>

                            </div>

                        @endif

                        {{-- Date --}}
                        @if(!empty($order->cancelled_at))

                            <div>

                                <p class="text-xs font-medium uppercase tracking-wide text-[#9a846a]">
                                    Cancelled At
                                </p>

                                <p class="mt-2 text-sm text-[#79654e]">
                                    {{ \Carbon\Carbon::parse($order->cancelled_at)->format('d M Y, h:i A') }}
                                </p>

                            </div>

                        @endif

                    </div>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection