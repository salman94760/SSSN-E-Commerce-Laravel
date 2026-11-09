
@extends('layouts.admin.page')

@section('title', 'Order Details')

@section('adminPage')

@php
    $orderStatuses = [
        'Pending',
        'Processing',
        'Shipped',
        'Delivered',
        'Cancelled'
    ];

    $paymentStatuses = [
        'Pending',
        'Paid',
        'Failed',
        'Refunded'
    ];

    $statusColors = [
        'Pending' => 'bg-yellow-100 text-yellow-800',
        'Processing' => 'bg-blue-100 text-blue-800',
        'Shipped' => 'bg-purple-100 text-purple-800',
        'Delivered' => 'bg-green-100 text-green-800',
        'Cancelled' => 'bg-red-100 text-red-800'
    ];

    $paymentColors = [
        'Paid' => 'bg-green-100 text-green-700',
        'Failed' => 'bg-red-100 text-red-700',
        'Pending' => 'bg-yellow-100 text-yellow-700',
        'Refunded' => 'bg-purple-100 text-purple-700'
    ];

    $cardClass = 'overflow-hidden rounded-[26px] border border-white/80 bg-white/65 shadow-[0_15px_45px_rgba(100,75,45,0.06)] backdrop-blur-2xl';

    $labelClass = 'text-[10px] font-bold uppercase tracking-[1.5px] text-[#938778]';

    $inputClass = 'w-full rounded-xl border border-[#e8dccb] bg-white/70 px-4 py-3 text-sm text-[#5d4936] outline-none transition focus:border-[#a58a6d] focus:ring-2 focus:ring-[#e7d5bb]/50';

    $buttonClass = 'inline-flex w-full items-center justify-center rounded-xl bg-[#6b5540] px-5 py-3 text-sm font-semibold text-white transition duration-300 hover:-translate-y-0.5 hover:bg-[#4e3c2b]';
@endphp

<div class="min-h-screen bg-[#f8f5ef] p-4 sm:p-6 lg:p-8">

    <div class="mx-auto max-w-7xl space-y-6">

        {{-- Page Header --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <a href="{{ route('admin.orders') }}"
                   class="inline-flex items-center gap-2 text-xs font-semibold text-[#938778] transition hover:text-[#6b5540]">
                    &larr; Back to Orders
                </a>

                <h1 class="mt-3 text-2xl font-bold tracking-tight text-[#5d4936] sm:text-3xl">
                    Order {{ $order->order_number }}
                </h1>

                <p class="mt-2 text-sm text-[#a58a6d]">
                    Placed on
                    {{ $order->created_at?->format('d M Y, h:i A') ?? '-' }}
                </p>
            </div>

            <span class="inline-flex self-start rounded-full px-4 py-2 text-xs font-bold {{ $statusColors[$order->order_status] ?? 'bg-gray-100 text-gray-700' }}">
                {{ $order->order_status ?? 'Unknown' }}
            </span>

        </div>

        {{-- Main Content --}}
        <div class="grid grid-cols-1 items-start gap-6 lg:grid-cols-3">

            {{-- LEFT COLUMN --}}
            <div class="space-y-6 lg:col-span-2">

                {{-- Order Items --}}
                <div class="{{ $cardClass }}">

                    <div class="border-b border-[#e8dccb]/60 bg-[#eee3d3]/30 px-6 py-5">
                        <h2 class="text-base font-bold text-[#5d4936]">
                            Order Items
                        </h2>
                        <p class="mt-1 text-xs text-[#a58a6d]">
                            {{ $order->items->count() }} product(s)
                        </p>
                    </div>

                    <div class="divide-y divide-[#e8dccb]/50">

                        @forelse($order->items as $item)

                            <div class="p-6 transition hover:bg-[#f5ecdf]/40">

                                <div class="flex flex-col gap-4 sm:flex-row sm:items-center">

                                    {{-- Product Image --}}
                                    <div class="h-20 w-20 shrink-0 overflow-hidden rounded-2xl border border-[#e8dccb] bg-[#eee3d3]">

                                        @if($item->product?->image)
                                            <img
                                                src="{{ asset('storage/' . $item->product->image) }}"
                                                alt="{{ $item->product->name }}"
                                                class="h-full w-full object-cover"
                                            >
                                        @else
                                            <div class="flex h-full w-full items-center justify-center text-3xl text-[#a58a6d]">
                                                ♧
                                            </div>
                                        @endif

                                    </div>

                                    {{-- Product Info --}}
                                    <div class="min-w-0 flex-1">

                                        <h3 class="text-sm font-bold text-[#5d4936]">
                                            {{ $item->product?->name ?? 'Product Removed' }}
                                        </h3>

                                        @if($item->product)
                                            <p class="mt-1 text-xs text-[#a58a6d]">
                                                Product ID: #{{ $item->product->id }}
                                            </p>
                                        @endif

                                        <p class="mt-3 text-sm text-[#796a59]">
                                            ₹{{ number_format($item->price ?? $item->product?->price ?? 0, 2) }}
                                            × {{ $item->quantity }}
                                        </p>

                                    </div>

                                    {{-- Item Subtotal --}}
                                    <div class="sm:text-right">

                                        <p class="{{ $labelClass }}">
                                            Subtotal
                                        </p>

                                        <p class="mt-2 text-lg font-bold text-[#6b5540]">
                                            ₹{{ number_format(($item->price ?? 0) * $item->quantity, 2) }}
                                        </p>

                                    </div>

                                </div>

                            </div>

                        @empty

                            <div class="p-12 text-center text-sm text-[#a58a6d]">
                                No items found in this order.
                            </div>

                        @endforelse

                    </div>

                </div>

                {{-- Customer Information --}}
                <div class="{{ $cardClass }}">

                    <div class="border-b border-[#e8dccb]/60 bg-[#eee3d3]/30 px-6 py-5">
                        <h2 class="text-base font-bold text-[#5d4936]">
                            Customer Information
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 gap-6 p-6 sm:grid-cols-2">

                        <div>
                            <p class="{{ $labelClass }}">Name</p>
                            <p class="mt-2 text-sm font-semibold text-[#5d4936]">
                                {{ $order->userInfo?->name ?? 'Customer' }}
                            </p>
                        </div>

                        <div>
                            <p class="{{ $labelClass }}">Phone</p>
                            <p class="mt-2 text-sm font-semibold text-[#5d4936]">
                                {{ $order->userInfo?->phone ?? 'No phone' }}
                            </p>
                        </div>

                        <div>
                            <p class="{{ $labelClass }}">Email</p>
                            <p class="mt-2 break-all text-sm font-semibold text-[#5d4936]">
                                {{ $order->userInfo?->email ?? 'No email' }}
                            </p>
                        </div>

                        <div>
                            <p class="{{ $labelClass }}">Customer ID</p>
                            <p class="mt-2 text-sm font-semibold text-[#5d4936]">
                                {{ $order->userInfo?->id ?? '-' }}
                            </p>
                        </div>

                    </div>

                </div>

                {{-- Shipping Address --}}
                <div class="{{ $cardClass }}">

                    <div class="border-b border-[#e8dccb]/60 bg-[#eee3d3]/30 px-6 py-5">
                        <h2 class="text-base font-bold text-[#5d4936]">
                            Shipping Address
                        </h2>
                    </div>

                    <div class="flex gap-4 p-6">

                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-[#eee3d3] text-xl text-[#6b5540]">
                            &#8962;
                        </div>

                        <div class="min-w-0 space-y-2 text-sm leading-6 text-[#796a59]">

                            <p class="font-bold text-[#5d4936]">
                                {{ $order->shipping_name ?? $order->userInfo?->name ?? 'Customer' }}
                            </p>

                            <p>
                                {{ $order->shipping_address ?? 'Address not available' }}
                            </p>

                            @if($order->shipping_city)
                                <p>
                                    {{ $order->shipping_city }},
                                    {{ $order->shipping_state ?? '' }}
                                    {{ $order->shipping_pincode ?? '' }}
                                </p>
                            @endif

                            @if($order->shipping_phone)
                                <p class="font-semibold text-[#6b5540]">
                                    Phone: {{ $order->shipping_phone }}
                                </p>
                            @endif

                        </div>

                    </div>

                </div>

            </div>

            {{-- RIGHT COLUMN --}}
            <div class="space-y-6">

                {{-- Order Summary --}}
                <div class="{{ $cardClass }}">

                    <div class="border-b border-[#e8dccb]/60 bg-[#eee3d3]/30 px-6 py-5">
                        <h2 class="text-base font-bold text-[#5d4936]">
                            Order Summary
                        </h2>
                    </div>

                    <div class="space-y-4 p-6">

                        <div class="flex items-center justify-between gap-3">
                            <span class="text-sm text-[#938778]">Items</span>
                            <span class="font-semibold text-[#5d4936]">
                                {{ $order->items->sum('quantity') }}
                            </span>
                        </div>

                        <div class="flex items-center justify-between gap-3">
                            <span class="text-sm text-[#938778]">Subtotal</span>
                            <span class="font-semibold text-[#5d4936]">
                                ₹{{ number_format($order->subtotal ?? $order->total_amount, 2) }}
                            </span>
                        </div>

                        @if(isset($order->shipping_amount))
                            <div class="flex items-center justify-between gap-3">
                                <span class="text-sm text-[#938778]">Shipping</span>
                                <span class="font-semibold text-[#5d4936]">
                                    ₹{{ number_format($order->shipping_amount, 2) }}
                                </span>
                            </div>
                        @endif

                        @if(isset($order->discount_amount))
                            <div class="flex items-center justify-between gap-3">
                                <span class="text-sm text-[#938778]">Discount</span>
                                <span class="font-semibold text-green-700">
                                    -₹{{ number_format($order->discount_amount, 2) }}
                                </span>
                            </div>
                        @endif

                        <div class="border-t border-[#e8dccb] pt-5">

                            <div class="flex items-center justify-between gap-3">
                                <span class="text-base font-bold text-[#5d4936]">
                                    Total
                                </span>

                                <span class="text-xl font-bold text-[#6b5540]">
                                    ₹{{ number_format($order->total_amount, 2) }}
                                </span>
                            </div>

                        </div>

                    </div>

                </div>

                {{-- Payment Information --}}
                <div class="{{ $cardClass }}">

                    <div class="border-b border-[#e8dccb]/60 bg-[#eee3d3]/30 px-6 py-5">
                        <h2 class="text-base font-bold text-[#5d4936]">
                            Payment Information
                        </h2>
                    </div>

                    <div class="space-y-5 p-6">

                        <div>
                            <p class="{{ $labelClass }}">Payment Method</p>
                            <p class="mt-2 text-sm font-semibold text-[#5d4936]">
                                {{ $order->payment_method ?? 'N/A' }}
                            </p>
                        </div>

                        <div>
                            <p class="{{ $labelClass }}">Payment Status</p>

                            <span class="mt-2 inline-flex rounded-full px-3 py-1.5 text-xs font-semibold {{ $paymentColors[$order->payment_status] ?? 'bg-gray-100 text-gray-700' }}">
                                {{ $order->payment_status ?? 'Pending' }}
                            </span>
                        </div>

                        @if($order->transaction_id)
                            <div>
                                <p class="{{ $labelClass }}">Transaction ID</p>
                                <p class="mt-2 break-all text-sm font-semibold text-[#5d4936]">
                                    {{ $order->transaction_id }}
                                </p>
                            </div>
                        @endif

                    </div>

                </div>

            </div>

        </div>

        {{-- ================================================= --}}
        {{-- THREE CARDS IN ONE ROW --}}
        {{-- Order Details | Update Order | Update Payment --}}
        {{-- ================================================= --}}

        <div class="grid grid-cols-1 items-stretch gap-6 md:grid-cols-2 xl:grid-cols-3">

            {{-- 1. Order Details --}}
            <div class="{{ $cardClass }} flex h-full flex-col">

                <div class="border-b border-[#e8dccb]/60 bg-[#eee3d3]/30 px-6 py-5">
                    <h2 class="text-base font-bold text-[#5d4936]">
                        Order Details
                    </h2>

                    <p class="mt-1 text-xs text-[#a58a6d]">
                        General order information.
                    </p>
                </div>

                <div class="flex-1 space-y-5 p-6">

                    <div>
                        <p class="{{ $labelClass }}">
                            Order Number
                        </p>
                        <p class="mt-2 break-all text-sm font-semibold text-[#5d4936]">
                            {{ $order->order_number }}
                        </p>
                    </div>

                    <div>
                        <p class="{{ $labelClass }}">
                            Order Date
                        </p>
                        <p class="mt-2 text-sm font-semibold text-[#5d4936]">
                            {{ $order->created_at?->format('d M Y') ?? '-' }}
                        </p>
                    </div>

                    <div class="grid grid-cols-2 gap-4 border-t border-[#e8dccb]/60 pt-5">

                        <div>
                            <p class="{{ $labelClass }}">
                                Total Products
                            </p>
                            <p class="mt-2 text-lg font-bold text-[#6b5540]">
                                {{ $order->items->count() }}
                            </p>
                        </div>

                        <div>
                            <p class="{{ $labelClass }}">
                                Total Quantity
                            </p>
                            <p class="mt-2 text-lg font-bold text-[#6b5540]">
                                {{ $order->items->sum('quantity') }}
                            </p>
                        </div>

                    </div>

                </div>

            </div>

            {{-- 2. Update Order --}}
            <div class="{{ $cardClass }} flex h-full flex-col">

                <div class="border-b border-[#e8dccb]/60 bg-[#eee3d3]/30 px-6 py-5">
                    <h2 class="text-base font-bold text-[#5d4936]">
                        Update Order
                    </h2>

                    <p class="mt-1 text-xs text-[#a58a6d]">
                        Change the current order status.
                    </p>
                </div>

                <form
                    action="{{ route('admin.orders.status', $order->id) }}"
                    method="POST"
                    class="flex flex-1 flex-col p-6"
                >
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="order_status" class="{{ $labelClass }}">
                            Order Status
                        </label>

                        <select
                            id="order_status"
                            name="order_status"
                            class="mt-2 {{ $inputClass }}"
                        >
                            @foreach($orderStatuses as $status)
                                <option
                                    value="{{ $status }}"
                                    @selected(old('order_status', $order->order_status) === $status)
                                >
                                    {{ $status }}
                                </option>
                            @endforeach
                        </select>

                        @error('order_status')
                            <p class="mt-2 text-xs text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="mt-auto pt-6">
                        <button type="submit" class="{{ $buttonClass }}">
                            Update Status
                        </button>
                    </div>

                </form>

            </div>

            {{-- 3. Update Payment --}}
            <div class="{{ $cardClass }} flex h-full flex-col">

                <div class="border-b border-[#e8dccb]/60 bg-[#eee3d3]/30 px-6 py-5">
                    <h2 class="text-base font-bold text-[#5d4936]">
                        Update Payment
                    </h2>

                    <p class="mt-1 text-xs text-[#a58a6d]">
                        Change payment status and transaction.
                    </p>
                </div>

                <form
                    action="{{ route('admin.orders.payment-status', $order->id) }}"
                    method="POST"
                    class="flex flex-1 flex-col p-6"
                >
                    @csrf
                    @method('PUT')

                    <div class="space-y-5">

                        <div>
                            <label for="payment_status" class="{{ $labelClass }}">
                                Payment Status
                            </label>

                            <select
                                id="payment_status"
                                name="payment_status"
                                class="mt-2 {{ $inputClass }}"
                            >
                                @foreach($paymentStatuses as $status)
                                    <option
                                        value="{{ $status }}"
                                        @selected(old('payment_status', $order->payment_status) === $status)
                                    >
                                        {{ $status }}
                                    </option>
                                @endforeach
                            </select>

                            @error('payment_status')
                                <p class="mt-2 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div>
                            <label for="transaction_id" class="{{ $labelClass }}">
                                Transaction ID
                            </label>

                            <input
                                type="text"
                                id="transaction_id"
                                name="transaction_id"
                                value="{{ old('transaction_id', $order->transaction_id) }}"
                                placeholder="Enter transaction ID"
                                class="mt-2 {{ $inputClass }}"
                            >

                            @error('transaction_id')
                                <p class="mt-2 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                    </div>

                    <div class="mt-auto pt-6">
                        <button type="submit" class="{{ $buttonClass }}">
                            Update Payment
                        </button>
                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection
