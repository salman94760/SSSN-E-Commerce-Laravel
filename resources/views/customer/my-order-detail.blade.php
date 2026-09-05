@extends('layouts.customer.customer-layout')

@section('customerContent')

<div class="min-h-screen bg-gray-50 py-8">

```
<div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">

    {{-- Back --}}
    <div class="mb-6">

        <a
            href="{{ route('customer.my-orders') }}"
            class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-gray-900"
        >
            <svg
                class="mr-2 h-4 w-4"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M15 19l-7-7 7-7"
                />
            </svg>

            Back to My Orders
        </a>

    </div>


    {{-- ========================================== --}}
    {{-- PAGE HEADER --}}
    {{-- ========================================== --}}
    <div class="mb-6 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">

        <div>

            <h1 class="text-2xl font-bold text-gray-900">
                Order Details
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                Order #{{ $order->order_number }}
            </p>

        </div>


        {{-- ========================================== --}}
        {{-- STATUS --}}
        {{-- ========================================== --}}
        <div>

            @if($order->order_status === 'Pending')

                <span class="inline-flex items-center rounded-full bg-yellow-100 px-4 py-2 text-sm font-semibold text-yellow-800">

                    <span class="mr-2 h-2 w-2 rounded-full bg-yellow-500"></span>

                    Pending

                </span>

            @elseif($order->order_status === 'Processing')

                <span class="inline-flex items-center rounded-full bg-blue-100 px-4 py-2 text-sm font-semibold text-blue-800">

                    <span class="mr-2 h-2 w-2 rounded-full bg-blue-500"></span>

                    Processing

                </span>

            @elseif($order->order_status === 'Shipped')

                <span class="inline-flex items-center rounded-full bg-purple-100 px-4 py-2 text-sm font-semibold text-purple-800">

                    <span class="mr-2 h-2 w-2 rounded-full bg-purple-500"></span>

                    Shipped

                </span>

            @elseif($order->order_status === 'Delivered')

                <span class="inline-flex items-center rounded-full bg-green-100 px-4 py-2 text-sm font-semibold text-green-800">

                    <span class="mr-2">✓</span>

                    Delivered

                </span>

            @elseif($order->order_status === 'Cancelled')

                @if($order->cancelled_by === 'admin')

                    <span class="inline-flex items-center rounded-full bg-red-100 px-4 py-2 text-sm font-semibold text-red-800">

                        <span class="mr-2">✕</span>

                        Cancelled by Admin

                    </span>

                @elseif($order->cancelled_by === 'user')

                    <span class="inline-flex items-center rounded-full bg-orange-100 px-4 py-2 text-sm font-semibold text-orange-800">

                        <span class="mr-2">✕</span>

                        Cancelled by You

                    </span>

                @else

                    <span class="inline-flex items-center rounded-full bg-red-100 px-4 py-2 text-sm font-semibold text-red-800">

                        <span class="mr-2">✕</span>

                        Cancelled

                    </span>

                @endif

            @else

                <span class="inline-flex rounded-full bg-gray-100 px-4 py-2 text-sm font-semibold text-gray-700">

                    {{ $order->order_status }}

                </span>

            @endif

        </div>

    </div>


    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">


        {{-- ========================================== --}}
        {{-- LEFT SIDE --}}
        {{-- ========================================== --}}
        <div class="space-y-6 lg:col-span-2">


            {{-- ========================================== --}}
            {{-- ORDERED PRODUCTS --}}
            {{-- ========================================== --}}
            <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

                <div class="border-b border-gray-200 px-5 py-4">

                    <h2 class="text-lg font-semibold text-gray-900">
                        Ordered Items
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        {{ $totalitems }} item(s) in this order
                    </p>

                </div>


                <div class="divide-y divide-gray-100">

                    @foreach($orderitems as $item)

                        <div class="p-5">

                            <div class="flex gap-4">


                                {{-- Product Image --}}
                                <div class="h-24 w-24 shrink-0 overflow-hidden rounded-lg border border-gray-200 bg-gray-100">

                                    @if($item->product && $item->product->images && $item->product->images->count())

                                        <img
                                            src="{{ asset('storage/' . $item->product->images->first()->name) }}"
                                            alt="{{ $item->product->name }}"
                                            class="h-full w-full object-cover"
                                        >

                                    @else

                                        <div class="flex h-full w-full items-center justify-center text-xs text-gray-400">
                                            No Image
                                        </div>

                                    @endif

                                </div>


                                {{-- Product Information --}}
                                <div class="min-w-0 flex-1">

                                    @if($item->product)

                                        <h3 class="text-base font-semibold text-gray-900">
                                            {{ $item->product->name }}
                                        </h3>

                                    @else

                                        <h3 class="text-base font-semibold text-gray-500">
                                            Product unavailable
                                        </h3>

                                    @endif


                                    <div class="mt-2 space-y-1 text-sm text-gray-500">

                                        <p>
                                            Quantity:

                                            <span class="font-medium text-gray-700">
                                                {{ $item->quantity }}
                                            </span>
                                        </p>


                                        @if($item->product)

                                            <p>
                                                Price:

                                                <span class="font-medium text-gray-700">
                                                    ₹{{ number_format($item->price, 2) }}
                                                </span>
                                            </p>

                                        @endif

                                        {{-- Size --}}
                                        @if($item->size)

                                            <p>
                                                Size:

                                                <span class="font-medium text-gray-700">
                                                    {{ $item->size->name }}
                                                </span>
                                            </p>

                                        @endif

                                    </div>

                                </div>


                                {{-- Item Total --}}
                                <div class="text-right">

                                    <p class="text-xs text-gray-500">
                                        Total
                                    </p>

                                    @if($item->product)

                                        <p class="mt-1 text-base font-bold text-gray-900">
                                            ₹{{ number_format($item->product->sale_price * $item->quantity, 2) }}
                                        </p>

                                    @else

                                        <p class="mt-1 text-base font-bold text-gray-400">
                                            N/A
                                        </p>

                                    @endif

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>


            {{-- ========================================== --}}
            {{-- TRACK ORDER --}}
            {{-- ========================================== --}}
            <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

                <div class="border-b border-gray-200 px-5 py-4">

                    <h2 class="text-lg font-semibold text-gray-900">
                        Track Order
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        Order #{{ $order->order_number }}
                    </p>

                </div>


                {{-- ====================================== --}}
                {{-- NORMAL TRACKING --}}
                {{-- ====================================== --}}
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


                    <div class="px-5 py-6">

                        <div class="relative">

                            {{-- Vertical Line --}}
                            <div class="absolute left-[15px] top-4 h-[calc(100%-32px)] w-0.5 bg-gray-200"></div>


                            @foreach($statusOrder as $index => $status)

                                @php

                                    $isCompleted = $index <= $currentIndex;

                                    $isCurrent = $index === $currentIndex;

                                @endphp


                                <div class="relative flex gap-4 pb-8 last:pb-0">


                                    {{-- Circle --}}
                                    <div
                                        class="relative z-10 flex h-8 w-8 shrink-0 items-center justify-center rounded-full
                                        {{ $isCompleted ? 'bg-green-600' : 'bg-gray-200' }}"
                                    >

                                        @if($isCompleted)

                                            <svg
                                                class="h-4 w-4 text-white"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >

                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M5 13l4 4L19 7"
                                                />

                                            </svg>

                                        @else

                                            <span class="h-2.5 w-2.5 rounded-full bg-gray-400"></span>

                                        @endif

                                    </div>


                                    {{-- Status Content --}}
                                    <div class="flex-1">

                                        <div class="flex flex-col justify-between gap-1 sm:flex-row">

                                            <div>

                                                <h3
                                                    class="text-sm font-semibold
                                                    {{ $isCurrent
                                                        ? 'text-green-600'
                                                        : ($isCompleted
                                                            ? 'text-gray-900'
                                                            : 'text-gray-400') }}"
                                                >
                                                    {{ $statuses[$status]['title'] }}
                                                </h3>


                                                <p
                                                    class="mt-1 text-sm
                                                    {{ $isCompleted
                                                        ? 'text-gray-500'
                                                        : 'text-gray-400' }}"
                                                >
                                                    {{ $statuses[$status]['description'] }}
                                                </p>

                                            </div>


                                            @if($isCurrent)

                                                <span class="inline-flex h-fit w-fit rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                                    Current
                                                </span>

                                            @endif

                                        </div>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>


                {{-- ====================================== --}}
                {{-- CANCELLED TRACKING --}}
                {{-- ====================================== --}}
                @else

                    <div class="px-5 py-6">

                        <div class="rounded-xl border border-red-100 bg-red-50 p-5">

                            @if($order->cancelled_by === 'admin')

                                <div class="flex items-start gap-4">

                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-red-100 text-red-600">
                                        ✕
                                    </div>

                                    <div class="flex-1">

                                        <h3 class="text-base font-semibold text-red-800">
                                            Order Cancelled by Admin
                                        </h3>

                                        <p class="mt-1 text-sm text-red-700">
                                            This order was cancelled by the store administrator.
                                        </p>

                                    </div>

                                </div>

                            @elseif($order->cancelled_by === 'user')

                                <div class="flex items-start gap-4">

                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-orange-100 text-orange-600">
                                        ✕
                                    </div>

                                    <div class="flex-1">

                                        <h3 class="text-base font-semibold text-orange-800">
                                            You Cancelled This Order
                                        </h3>

                                        <p class="mt-1 text-sm text-orange-700">
                                            This order was cancelled by you.
                                        </p>

                                    </div>

                                </div>

                            @else

                                <div class="flex items-start gap-4">

                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-red-100 text-red-600">
                                        ✕
                                    </div>

                                    <div class="flex-1">

                                        <h3 class="text-base font-semibold text-red-800">
                                            Order Cancelled
                                        </h3>

                                        <p class="mt-1 text-sm text-red-700">
                                            This order has been cancelled.
                                        </p>

                                    </div>

                                </div>

                            @endif


                            {{-- Cancellation Reason --}}
                            @if(!empty($order->cancel_reason))

                                <div class="mt-5 border-t border-red-200 pt-4">

                                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">
                                        Cancellation Reason
                                    </p>

                                    <p class="mt-1 text-sm text-gray-700">
                                        {{ $order->cancel_reason }}
                                    </p>

                                </div>

                            @endif


                            {{-- Cancellation Date --}}
                            @if(!empty($order->cancelled_at))

                                <div class="mt-3">

                                    <p class="text-xs text-gray-500">

                                        Cancelled on:

                                        <span class="font-medium text-gray-700">
                                            {{ \Carbon\Carbon::parse($order->cancelled_at)->format('d M Y, h:i A') }}
                                        </span>

                                    </p>

                                </div>

                            @endif

                        </div>

                    </div>

                @endif

            </div>


            {{-- ========================================== --}}
            {{-- SHIPPING ADDRESS --}}
            {{-- ========================================== --}}
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm">

                <div class="border-b border-gray-200 px-5 py-4">

                    <h2 class="text-lg font-semibold text-gray-900">
                        Shipping Address
                    </h2>

                </div>

                <div class="px-5 py-5">

                    <p class="text-sm leading-6 text-gray-600">
                        {{ $order->shipping_address }}
                    </p>

                </div>

            </div>


            {{-- ========================================== --}}
            {{-- CUSTOMER INFORMATION --}}
            {{-- ========================================== --}}
            @if($order->userInfo)

                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">

                    <div class="border-b border-gray-200 px-5 py-4">

                        <h2 class="text-lg font-semibold text-gray-900">
                            Customer Information
                        </h2>

                    </div>


                    <div class="grid grid-cols-1 gap-5 px-5 py-5 sm:grid-cols-2">

                        <div>

                            <p class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                Phone
                            </p>

                            <p class="mt-1 text-sm font-medium text-gray-900">
                                {{ $order->userInfo->phone ?? 'N/A' }}
                            </p>

                        </div>


                        <div>

                            <p class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                ZIP Code
                            </p>

                            <p class="mt-1 text-sm font-medium text-gray-900">
                                {{ $order->userInfo->zipcode ?? 'N/A' }}
                            </p>

                        </div>

                    </div>

                </div>

            @endif

        </div>


        {{-- ========================================== --}}
        {{-- RIGHT SIDE --}}
        {{-- ========================================== --}}
        <div class="space-y-6">


            {{-- ========================================== --}}
            {{-- CANCEL ORDER --}}
            {{-- ========================================== --}}
            @if(in_array($order->order_status, ['Pending', 'Processing']))

                <div class="rounded-xl border border-orange-200 bg-white shadow-sm">

                    <div class="border-b border-orange-100 px-5 py-4">

                        <h2 class="text-lg font-semibold text-gray-900">
                            Cancel Order
                        </h2>

                        <p class="mt-1 text-sm text-gray-500">
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


                            <label
                                for="cancel_reason"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Cancellation Reason
                            </label>


                            <textarea
                                name="cancel_reason"
                                id="cancel_reason"
                                rows="3"
                                required
                                placeholder="Please tell us why you want to cancel this order..."
                                class="mt-2 block w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 shadow-sm outline-none transition focus:border-orange-500 focus:ring-1 focus:ring-orange-500"
                            ></textarea>


                            @error('cancel_reason')

                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>

                            @enderror


                            <button
                                type="submit"
                                class="mt-4 inline-flex w-full items-center justify-center rounded-lg bg-red-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-red-700"
                            >

                                <span class="mr-2">
                                    ✕
                                </span>

                                Cancel Order

                            </button>


                            <p class="mt-3 text-center text-xs text-gray-500">
                                Cancellation is not available after the order has been shipped.
                            </p>

                        </form>

                    </div>

                </div>

            @elseif($order->order_status === 'Shipped' || $order->payment_status === 'paid')

                {{-- Shipped - Cannot Cancel --}}
                <div class="rounded-xl border border-purple-200 bg-purple-50 shadow-sm">

                    <div class="px-5 py-5">

                        <div class="flex items-start gap-3">

                            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-purple-100 text-purple-600">
                                🚚
                            </div>

                            <div>

                                <h2 class="text-sm font-semibold text-purple-800">
                                    Order Cannot Be Cancelled
                                </h2>

                                <p class="mt-1 text-sm text-purple-700">
                                    Your order has already been shipped and can no longer be cancelled.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            @endif


            {{-- ========================================== --}}
            {{-- ORDER SUMMARY --}}
            {{-- ========================================== --}}
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm">

                <div class="border-b border-gray-200 px-5 py-4">

                    <h2 class="text-lg font-semibold text-gray-900">
                        Order Summary
                    </h2>

                </div>


                <div class="space-y-4 px-5 py-5">

                    <div class="flex justify-between text-sm">

                        <span class="text-gray-500">
                            Subtotal
                        </span>

                        <span class="font-medium text-gray-900">
                            ₹{{ number_format($order->subtotal, 2) }}
                        </span>

                    </div>


                    <div class="flex justify-between text-sm">

                        <span class="text-gray-500">
                            Shipping
                        </span>

                        <span class="font-medium text-gray-900">
                            ₹{{ number_format($order->shipping_charge, 2) }}
                        </span>

                    </div>


                    <div class="flex justify-between text-sm">

                        <span class="text-gray-500">
                            Discount
                        </span>

                        <span class="font-medium text-gray-900">
                            -₹{{ number_format($order->discount_amount, 2) }}
                        </span>

                    </div>


                    <div class="flex justify-between text-sm">

                        <span class="text-gray-500">
                            Coupon Applied
                        </span>

                        <span class="font-medium text-gray-900">

                            @if($order->coupon_code)

                                <b>
                                    {{ strtoupper($order->coupon_code) }}
                                </b>

                            @else

                                <span class="text-gray-400">
                                    None
                                </span>

                            @endif

                        </span>

                    </div>


                    <div class="border-t border-gray-200 pt-4">

                        <div class="flex justify-between">

                            <span class="text-base font-semibold text-gray-900">
                                Total
                            </span>

                            <span class="text-lg font-bold text-gray-900">
                                ₹{{ number_format($order->total_amount - $order->discount_amount, 2) }}
                            </span>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ========================================== --}}
            {{-- PAYMENT INFORMATION --}}
            {{-- ========================================== --}}
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm">

                <div class="border-b border-gray-200 px-5 py-4">

                    <h2 class="text-lg font-semibold text-gray-900">
                        Payment Information
                    </h2>

                </div>


                <div class="space-y-4 px-5 py-5">

                    <div>

                        <p class="text-xs font-medium uppercase tracking-wide text-gray-500">
                            Payment Method
                        </p>

                        <p class="mt-1 text-sm font-semibold text-gray-900">
                            {{ $order->payment_method }}
                        </p>

                    </div>


                    <div>

                        <p class="text-xs font-medium uppercase tracking-wide text-gray-500">
                            Payment Status
                        </p>


                        @if($order->payment_status === 'Paid')

                            <span class="mt-1 inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-800">
                                Paid
                            </span>

                        @elseif($order->payment_status === 'Failed')

                            <span class="mt-1 inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-800">
                                Failed
                            </span>

                        @elseif($order->payment_status === 'Refunded')

                            <span class="mt-1 inline-flex rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-800">
                                Refunded
                            </span>

                        @else

                            <span class="mt-1 inline-flex rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-800">
                                {{ $order->payment_status }}
                            </span>

                        @endif

                    </div>


                    @if($order->transaction_id)

                        <div>

                            <p class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                Transaction ID
                            </p>

                            <p class="mt-1 break-all text-sm text-gray-700">
                                {{ $order->transaction_id }}
                            </p>

                        </div>

                    @endif

                </div>

            </div>


            {{-- ========================================== --}}
            {{-- ORDER INFORMATION --}}
            {{-- ========================================== --}}
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm">

                <div class="border-b border-gray-200 px-5 py-4">

                    <h2 class="text-lg font-semibold text-gray-900">
                        Order Information
                    </h2>

                </div>


                <div class="space-y-4 px-5 py-5">

                    <div class="flex justify-between gap-4">

                        <span class="text-sm text-gray-500">
                            Order Number
                        </span>

                        <span class="text-right text-sm font-medium text-gray-900">
                            {{ $order->order_number }}
                        </span>

                    </div>


                    <div class="flex justify-between gap-4">

                        <span class="text-sm text-gray-500">
                            Order Date
                        </span>

                        <span class="text-right text-sm font-medium text-gray-900">
                            {{ $order->created_at->format('d M Y, h:i A') }}
                        </span>

                    </div>


                    <div class="flex justify-between gap-4">

                        <span class="text-sm text-gray-500">
                            Items
                        </span>

                        <span class="text-sm font-medium text-gray-900">
                            {{ $totalitems }}
                        </span>

                    </div>


                    <div class="flex justify-between gap-4">

                        <span class="text-sm text-gray-500">
                            Status
                        </span>

                        <span
                            class="text-right text-sm font-semibold
                            @if($order->order_status === 'Delivered')
                                text-green-600
                            @elseif($order->order_status === 'Cancelled')
                                text-red-600
                            @else
                                text-gray-900
                            @endif"
                        >
                            {{ $order->order_status }}
                        </span>

                    </div>

                </div>

            </div>


            {{-- ========================================== --}}
            {{-- CANCELLATION INFORMATION --}}
            {{-- ========================================== --}}
            @if($order->order_status === 'Cancelled')

                <div class="rounded-xl border border-red-200 bg-red-50 shadow-sm">

                    <div class="border-b border-red-200 px-5 py-4">

                        <h2 class="text-lg font-semibold text-red-800">
                            Cancellation Information
                        </h2>

                    </div>


                    <div class="space-y-4 px-5 py-5">


                        {{-- Cancelled By --}}
                        <div>

                            <p class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                Cancelled By
                            </p>

                            <p
                                class="mt-1 text-sm font-semibold
                                @if($order->cancelled_by === 'admin')
                                    text-red-700
                                @elseif($order->cancelled_by === 'user')
                                    text-orange-700
                                @else
                                    text-gray-700
                                @endif"
                            >

                                @if($order->cancelled_by === 'admin')

                                    Admin

                                @elseif($order->cancelled_by === 'user')

                                    You

                                @else

                                    N/A

                                @endif

                            </p>

                        </div>


                        {{-- Reason --}}
                        @if(!empty($order->cancel_reason))

                            <div>

                                <p class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                    Reason
                                </p>

                                <p class="mt-1 text-sm text-gray-700">
                                    {{ $order->cancel_reason }}
                                </p>

                            </div>

                        @endif


                        {{-- Date --}}
                        @if(!empty($order->cancelled_at))

                            <div>

                                <p class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                    Cancelled At
                                </p>

                                <p class="mt-1 text-sm text-gray-700">
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
```

</div>

@endsection
