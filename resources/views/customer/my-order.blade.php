@extends('layouts.customer.customer-layout')

@section('customerContent')

<div class="min-h-screen bg-gray-50 py-8">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <main>

            {{-- Page Header --}}
            <div class="mb-6 flex flex-col justify-between gap-3 sm:flex-row sm:items-center">

                <div>
                    <h1 class="text-2xl font-bold tracking-tight text-gray-900">
                        My Orders
                    </h1>

                    <p class="mt-1 text-sm text-gray-500">
                        View and manage your recent orders.
                    </p>
                </div>

                <div class="rounded-full bg-gray-100 px-4 py-2 text-sm font-medium text-gray-600">
                    {{ $orders->total() }} Orders
                </div>

            </div>


            @if($orders->count())

                {{-- Orders --}}
                <div class="space-y-5">

                    @foreach($orders as $order)

                        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

                            {{-- ========================================= --}}
                            {{-- ORDER HEADER --}}
                            {{-- ========================================= --}}
                            <div class="border-b border-gray-200 bg-gray-50 px-5 py-4">

                                <div class="grid grid-cols-2 gap-4 sm:grid-cols-4">

                                    {{-- Order Number --}}
                                    <div>

                                        <p class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                            Order Number
                                        </p>

                                        <p class="mt-1 text-sm font-semibold text-gray-900">
                                            {{ $order->order_number }}
                                        </p>

                                    </div>


                                    {{-- Date --}}
                                    <div>

                                        <p class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                            Date
                                        </p>

                                        <p class="mt-1 text-sm text-gray-900">
                                            {{ $order->created_at->format('d M Y') }}
                                        </p>

                                    </div>


                                    {{-- Payment --}}
                                    <div>

                                        <p class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                            Payment
                                        </p>

                                        <p class="mt-1 text-sm font-medium text-gray-900">
                                            {{ $order->payment_method }}
                                        </p>

                                    </div>


                                    {{-- Total --}}
                                    <div>

                                        <p class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                            Total
                                        </p>

                                        <p class="mt-1 text-sm font-bold text-gray-900">
                                            ₹{{ number_format($order->total_amount - $order->discount_amount, 2) }}
                                        </p>

                                    </div>

                                </div>

                            </div>


                            {{-- ========================================= --}}
                            {{-- ORDER ITEMS --}}
                            {{-- ========================================= --}}
                            <div class="divide-y divide-gray-100">

                                @foreach($orderitems as $item)

                                    @if($order->id === $item->order_id)

                                        <div class="px-5 py-5">

                                            <div class="flex gap-4">

                                                {{-- Product Image --}}
                                                <div class="h-20 w-20 shrink-0 overflow-hidden rounded-lg border border-gray-200 bg-gray-100">

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


                                                {{-- Product Info --}}
                                                <div class="min-w-0 flex-1">

                                                    @if($item->product)

                                                        <h3 class="truncate text-sm font-semibold text-gray-900">
                                                            {{ $item->product->name }}
                                                        </h3>

                                                    @else

                                                        <h3 class="text-sm font-semibold text-gray-500">
                                                            Product unavailable
                                                        </h3>

                                                    @endif


                                                    {{-- Quantity --}}
                                                    <p class="mt-1 text-sm text-gray-500">

                                                        Quantity:

                                                        <span class="font-medium text-gray-700">
                                                            {{ $item->quantity }}
                                                        </span>

                                                    </p>


                                                    {{-- Price --}}
                                                    @if($item->product)

                                                        <p class="mt-2 text-sm text-gray-500">

                                                            Price:

                                                            <span class="font-medium text-gray-700">
                                                                ₹{{ number_format($item->price, 2) }}
                                                            </span>

                                                        </p>

                                                    @endif

                                                </div>


                                                {{-- Item Total --}}
                                                <div class="text-right">

                                                    <p class="text-xs text-gray-500">
                                                        Item Total
                                                    </p>

                                                    @if($item->product)

                                                        <p class="mt-1 text-sm font-bold text-gray-900">
                                                            ₹{{ number_format($item->product->sale_price * $item->quantity, 2) }}
                                                        </p>

                                                    @else

                                                        <p class="mt-1 text-sm font-bold text-gray-400">
                                                            N/A
                                                        </p>

                                                    @endif

                                                </div>

                                            </div>

                                        </div>

                                    @endif

                                @endforeach

                            </div>


                            {{-- ========================================= --}}
                            {{-- ORDER FOOTER --}}
                            {{-- ========================================= --}}
                            <div class="border-t border-gray-200 bg-white px-5 py-4">

                                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">


                                    {{-- ================================= --}}
                                    {{-- ORDER STATUS --}}
                                    {{-- ================================= --}}
                                    <div class="flex flex-wrap items-center gap-2">

                                        <span class="text-sm text-gray-500">
                                            Order Status:
                                        </span>


                                        {{-- Pending --}}
                                        @if($order->order_status === 'Pending')

                                            <span class="inline-flex items-center rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-800">

                                                <span class="mr-1.5 h-1.5 w-1.5 rounded-full bg-yellow-500"></span>

                                                Pending

                                            </span>


                                        {{-- Processing --}}
                                        @elseif($order->order_status === 'Processing')

                                            <span class="inline-flex items-center rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-800">

                                                <span class="mr-1.5 h-1.5 w-1.5 rounded-full bg-blue-500"></span>

                                                Processing

                                            </span>


                                        {{-- Shipped --}}
                                        @elseif($order->order_status === 'Shipped')

                                            <span class="inline-flex items-center rounded-full bg-purple-100 px-3 py-1 text-xs font-semibold text-purple-800">

                                                <span class="mr-1.5 h-1.5 w-1.5 rounded-full bg-purple-500"></span>

                                                Shipped

                                            </span>


                                        {{-- Delivered --}}
                                        @elseif($order->order_status === 'Delivered')

                                            <span class="inline-flex items-center rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-800">

                                                <span class="mr-1.5">✓</span>

                                                Delivered

                                            </span>


                                        {{-- Cancelled --}}
                                        @elseif($order->order_status === 'Cancelled')


                                            {{-- Cancelled By Admin --}}
                                            @if($order->cancelled_by === 'admin')

                                                <span class="inline-flex items-center rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-800">

                                                    <span class="mr-1.5">✕</span>

                                                    Cancelled by Admin

                                                </span>


                                            {{-- Cancelled By User --}}
                                            @elseif($order->cancelled_by === 'user')

                                                <span class="inline-flex items-center rounded-full bg-orange-100 px-3 py-1 text-xs font-semibold text-orange-800">

                                                    <span class="mr-1.5">✕</span>

                                                    Cancelled by You

                                                </span>


                                            {{-- Cancelled But Source Not Available --}}
                                            @else

                                                <span class="inline-flex items-center rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-800">

                                                    <span class="mr-1.5">✕</span>

                                                    Cancelled

                                                </span>

                                            @endif


                                        {{-- Any Other Status --}}
                                        @else

                                            <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-700">

                                                {{ $order->order_status }}

                                            </span>

                                        @endif

                                    </div>


                                    {{-- ================================= --}}
                                    {{-- VIEW ORDER BUTTON --}}
                                    {{-- ================================= --}}
                                    <a
                                        href="{{ route('customer.order.details', $order->order_number) }}"
                                        class="inline-flex items-center justify-center rounded-lg bg-gray-900 px-4 py-2 text-sm font-medium text-white transition hover:bg-gray-700"
                                    >

                                        View Order

                                        <svg
                                            class="ml-2 h-4 w-4"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M9 5l7 7-7 7"
                                            />

                                        </svg>

                                    </a>

                                </div>


                                {{-- ========================================= --}}
                                {{-- CANCELLED ORDER INFORMATION --}}
                                {{-- ========================================= --}}
                                @if($order->order_status === 'Cancelled')

                                    <div class="mt-4 rounded-lg border border-red-100 bg-red-50 px-4 py-3">


                                        {{-- Admin Cancel --}}
                                        @if($order->cancelled_by === 'admin')

                                            <div class="flex items-start gap-3">

                                                <div class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-red-100 text-red-600">

                                                    ✕

                                                </div>

                                                <div>

                                                    <p class="text-sm font-semibold text-red-800">
                                                        Order cancelled by admin
                                                    </p>

                                                    <p class="mt-1 text-sm text-red-700">
                                                        Your order was cancelled by the store administrator.
                                                    </p>

                                                </div>

                                            </div>


                                        {{-- User Cancel --}}
                                        @elseif($order->cancelled_by === 'user')

                                            <div class="flex items-start gap-3">

                                                <div class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-orange-100 text-orange-600">

                                                    ✕

                                                </div>

                                                <div>

                                                    <p class="text-sm font-semibold text-orange-800">
                                                        You cancelled this order
                                                    </p>

                                                    <p class="mt-1 text-sm text-orange-700">
                                                        This order was cancelled by you.
                                                    </p>

                                                </div>

                                            </div>


                                        {{-- Unknown --}}
                                        @else

                                            <div class="flex items-start gap-3">

                                                <div class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-red-100 text-red-600">

                                                    ✕

                                                </div>

                                                <div>

                                                    <p class="text-sm font-semibold text-red-800">
                                                        Order cancelled
                                                    </p>

                                                    <p class="mt-1 text-sm text-red-700">
                                                        This order has been cancelled.
                                                    </p>

                                                </div>

                                            </div>

                                        @endif


                                        {{-- Cancel Reason --}}
                                        @if(!empty($order->cancel_reason))

                                            <div class="mt-3 border-t border-red-100 pt-3">

                                                <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                    Cancellation Reason
                                                </p>

                                                <p class="mt-1 text-sm text-gray-700">
                                                    {{ $order->cancel_reason }}
                                                </p>

                                            </div>

                                        @endif


                                        {{-- Cancelled Date --}}
                                        @if(!empty($order->cancelled_at))

                                            <div class="mt-2">

                                                <p class="text-xs text-gray-500">

                                                    Cancelled on:

                                                    <span class="font-medium text-gray-700">
                                                        {{ \Carbon\Carbon::parse($order->cancelled_at)->format('d M Y, h:i A') }}
                                                    </span>

                                                </p>

                                            </div>

                                        @endif

                                    </div>

                                @endif


                                {{-- ========================================= --}}
                                {{-- DELIVERED INFORMATION --}}
                                {{-- ========================================= --}}
                                @if($order->order_status === 'Delivered')

                                    <div class="mt-4 rounded-lg border border-green-100 bg-green-50 px-4 py-3">

                                        <div class="flex items-center gap-3">

                                            <div class="flex h-7 w-7 items-center justify-center rounded-full bg-green-100 text-green-600">

                                                ✓

                                            </div>

                                            <div>

                                                <p class="text-sm font-semibold text-green-800">
                                                    Order Delivered
                                                </p>

                                                <p class="mt-0.5 text-sm text-green-700">
                                                    Your order has been successfully delivered.
                                                </p>

                                            </div>

                                        </div>

                                    </div>

                                @endif

                            </div>

                        </div>

                    @endforeach

                </div>


                {{-- ========================================= --}}
                {{-- PAGINATION --}}
                {{-- ========================================= --}}
                <div class="mt-6">

                    {{ $orders->links() }}

                </div>


            @else

                {{-- ========================================= --}}
                {{-- EMPTY ORDERS --}}
                {{-- ========================================= --}}
                <div class="rounded-xl border border-gray-200 bg-white px-6 py-16 text-center shadow-sm">

                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-gray-100">

                        <svg
                            class="h-8 w-8 text-gray-400"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"
                            />

                        </svg>

                    </div>


                    <h2 class="mt-5 text-lg font-semibold text-gray-900">
                        No Orders Found
                    </h2>


                    <p class="mt-2 text-sm text-gray-500">
                        You haven't placed any orders yet.
                    </p>


                    <a
                        href="{{ route('customer.shop') }}"
                        class="mt-6 inline-flex rounded-lg bg-gray-900 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-gray-700"
                    >
                        Continue Shopping
                    </a>

                </div>

            @endif

        </main>

    </div>

</div>

@endsection