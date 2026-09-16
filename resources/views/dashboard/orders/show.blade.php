@extends('layouts.admin.page')

@section('adminPage')

<div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">

    <div class="mx-auto max-w-7xl">

        {{-- Header --}}
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <div class="mb-2">
                    <a
                        href="{{ route('admin.orders') }}"
                        class="inline-flex items-center gap-1 text-sm font-medium text-gray-500 hover:text-gray-900"
                    >
                        ← Back to Orders
                    </a>
                </div>

                <h1 class="text-2xl font-bold text-gray-900">
                    Order {{ $order->order_number }}
                </h1>

                <p class="mt-1 text-sm text-gray-500">
                    Placed on {{ $order->created_at->format('d M Y, h:i A') }}
                </p>
            </div>


            {{-- Order Status --}}
            <div>

                @if($order->order_status === 'Pending')

                    <span class="inline-flex rounded-full bg-yellow-100 px-4 py-2 text-sm font-semibold text-yellow-800">
                        Pending
                    </span>

                @elseif($order->order_status === 'Processing')

                    <span class="inline-flex rounded-full bg-blue-100 px-4 py-2 text-sm font-semibold text-blue-800">
                        Processing
                    </span>

                @elseif($order->order_status === 'Shipped')

                    <span class="inline-flex rounded-full bg-purple-100 px-4 py-2 text-sm font-semibold text-purple-800">
                        Shipped
                    </span>

                @elseif($order->order_status === 'Delivered')

                    <span class="inline-flex rounded-full bg-green-100 px-4 py-2 text-sm font-semibold text-green-800">
                        Delivered
                    </span>

                @elseif($order->order_status === 'Cancelled')

                    <span class="inline-flex rounded-full bg-red-100 px-4 py-2 text-sm font-semibold text-red-800">
                        Cancelled
                    </span>

                @else

                    <span class="inline-flex rounded-full bg-gray-100 px-4 py-2 text-sm font-semibold text-gray-700">
                        {{ $order->order_status }}
                    </span>

                @endif

            </div>

        </div>


        {{-- Main Grid --}}
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">


            {{-- LEFT --}}
            <div class="space-y-6 lg:col-span-2">


                {{-- Order Items --}}
                <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

                    <div class="border-b border-gray-200 px-5 py-4">

                        <div class="flex items-center justify-between">

                            <div>
                                <h2 class="text-base font-bold text-gray-900">
                                    Order Items
                                </h2>

                                <p class="mt-1 text-sm text-gray-500">
                                    {{ $order->items->count() }} product(s)
                                </p>
                            </div>

                        </div>

                    </div>


                    <div class="divide-y divide-gray-100">

                        @forelse($order->items as $item)

                            <div class="p-5">

                                <div class="flex flex-col gap-4 sm:flex-row sm:items-center">


                                    {{-- Product Image --}}
                                    <div class="h-20 w-20 flex-shrink-0 overflow-hidden rounded-lg border border-gray-200 bg-gray-50">

                                        @if($item->product && $item->product->image)

                                            <img
                                                src="{{ asset('storage/' . $item->product->image) }}"
                                                alt="{{ $item->product->name }}"
                                                class="h-full w-full object-cover"
                                            >

                                        @else

                                            <div class="flex h-full w-full items-center justify-center text-gray-400">

                                                <svg
                                                    class="h-8 w-8"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M4 16l4.586-4.586a2 2 0 016.828 0L20 16m-2-2l1.586-1.586a2 2 0 011.414-.586H20M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                                    />
                                                </svg>

                                            </div>

                                        @endif

                                    </div>


                                    {{-- Product Info --}}
                                    <div class="min-w-0 flex-1">

                                        <h3 class="truncate text-sm font-semibold text-gray-900">
                                            {{ $item->product->name ?? 'Product Removed' }}
                                        </h3>

                                        @if($item->product)

                                            <p class="mt-1 text-xs text-gray-500">
                                                Product ID: {{ $item->product->id }}
                                            </p>

                                        @endif

                                        <div class="mt-2 text-sm text-gray-500">
                                            ₹{{ number_format($item->price ?? $item->product->price ?? 0, 2) }}
                                            ×
                                            {{ $item->quantity }}
                                        </div>

                                    </div>


                                    {{-- Subtotal --}}
                                    <div class="text-left sm:text-right">

                                        <p class="text-sm text-gray-500">
                                            Subtotal
                                        </p>

                                        <p class="mt-1 text-base font-bold text-gray-900">
                                            ₹{{ number_format(($item->price ?? 0) * $item->quantity, 2) }}
                                        </p>

                                    </div>

                                </div>

                            </div>

                        @empty

                            <div class="px-5 py-12 text-center">

                                <p class="text-sm text-gray-500">
                                    No items found in this order.
                                </p>

                            </div>

                        @endforelse

                    </div>

                </div>


                {{-- Customer Information --}}
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">

                    <div class="border-b border-gray-200 px-5 py-4">

                        <h2 class="text-base font-bold text-gray-900">
                            Customer Information
                        </h2>

                    </div>


                    <div class="grid grid-cols-1 gap-5 p-5 sm:grid-cols-2">

                        <div>

                            <p class="text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Name
                            </p>

                            <p class="mt-1 text-sm font-medium text-gray-900">
                                {{ $order->userInfo->name ?? 'Customer' }}
                            </p>

                        </div>


                        <div>

                            <p class="text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Phone
                            </p>

                            <p class="mt-1 text-sm font-medium text-gray-900">
                                {{ $order->userInfo->phone ?? 'No phone' }}
                            </p>

                        </div>


                        <div>

                            <p class="text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Email
                            </p>

                            <p class="mt-1 text-sm font-medium text-gray-900">
                                {{ $order->userInfo->email ?? 'No email' }}
                            </p>

                        </div>


                        <div>

                            <p class="text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Customer ID
                            </p>

                            <p class="mt-1 text-sm font-medium text-gray-900">
                                {{ $order->userInfo->id ?? '-' }}
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Shipping Address --}}
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">

                    <div class="border-b border-gray-200 px-5 py-4">

                        <h2 class="text-base font-bold text-gray-900">
                            Shipping Address
                        </h2>

                    </div>


                    <div class="p-5">

                        <div class="flex gap-4">

                            <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-lg bg-gray-100 text-gray-600">

                                <svg
                                    class="h-5 w-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                    />
                                </svg>

                            </div>


                            <div class="text-sm leading-6 text-gray-700">

                                <p class="font-semibold text-gray-900">
                                    {{ $order->shipping_name ?? $order->userInfo->name ?? 'Customer' }}
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

                                    <p class="mt-1 font-medium text-gray-900">
                                        Phone: {{ $order->shipping_phone }}
                                    </p>

                                @endif

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- RIGHT --}}
            <div class="space-y-6">


                {{-- Order Summary --}}
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">

                    <div class="border-b border-gray-200 px-5 py-4">

                        <h2 class="text-base font-bold text-gray-900">
                            Order Summary
                        </h2>

                    </div>


                    <div class="space-y-4 p-5">

                        <div class="flex items-center justify-between">

                            <span class="text-sm text-gray-500">
                                Items
                            </span>

                            <span class="text-sm font-medium text-gray-900">
                                {{ $order->items->sum('quantity') }}
                            </span>

                        </div>


                        <div class="flex items-center justify-between">

                            <span class="text-sm text-gray-500">
                                Subtotal
                            </span>

                            <span class="text-sm font-medium text-gray-900">
                                ₹{{ number_format($order->subtotal ?? $order->total_amount, 2) }}
                            </span>

                        </div>


                        @if(isset($order->shipping_amount))

                            <div class="flex items-center justify-between">

                                <span class="text-sm text-gray-500">
                                    Shipping
                                </span>

                                <span class="text-sm font-medium text-gray-900">
                                    ₹{{ number_format($order->shipping_amount, 2) }}
                                </span>

                            </div>

                        @endif


                        @if(isset($order->discount_amount))

                            <div class="flex items-center justify-between">

                                <span class="text-sm text-gray-500">
                                    Discount
                                </span>

                                <span class="text-sm font-medium text-green-600">
                                    -₹{{ number_format($order->discount_amount, 2) }}
                                </span>

                            </div>

                        @endif


                        <div class="border-t border-gray-200 pt-4">

                            <div class="flex items-center justify-between">

                                <span class="text-base font-bold text-gray-900">
                                    Total
                                </span>

                                <span class="text-xl font-bold text-gray-900">
                                    ₹{{ number_format($order->total_amount, 2) }}
                                </span>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- Payment Information --}}
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">

                    <div class="border-b border-gray-200 px-5 py-4">

                        <h2 class="text-base font-bold text-gray-900">
                            Payment Information
                        </h2>

                    </div>


                    <div class="space-y-4 p-5">

                        <div>

                            <p class="text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Payment Method
                            </p>

                            <p class="mt-1 text-sm font-medium text-gray-900">
                                {{ $order->payment_method ?? 'N/A' }}
                            </p>

                        </div>


                        <div>

                            <p class="text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Payment Status
                            </p>

                            <div class="mt-2">

                                @if($order->payment_status === 'Paid')

                                    <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                        Paid
                                    </span>

                                @elseif($order->payment_status === 'Failed')

                                    <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
                                        Failed
                                    </span>

                                @else

                                    <span class="inline-flex rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-700">
                                        {{ $order->payment_status ?? 'Pending' }}
                                    </span>

                                @endif

                            </div>

                        </div>


                        @if($order->transaction_id)

                            <div>

                                <p class="text-xs font-semibold uppercase tracking-wider text-gray-500">
                                    Transaction ID
                                </p>

                                <p class="mt-1 break-all text-sm font-medium text-gray-900">
                                    {{ $order->transaction_id }}
                                </p>

                            </div>

                        @endif

                    </div>

                </div>


                {{-- Order Meta --}}
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">

                    <div class="border-b border-gray-200 px-5 py-4">

                        <h2 class="text-base font-bold text-gray-900">
                            Order Details
                        </h2>

                    </div>


                    <div class="space-y-4 p-5">

                        <div class="flex items-center justify-between gap-4">

                            <span class="text-sm text-gray-500">
                                Order Number
                            </span>

                            <span class="text-sm font-semibold text-gray-900">
                                {{ $order->order_number }}
                            </span>

                        </div>


                        <div class="flex items-center justify-between gap-4">

                            <span class="text-sm text-gray-500">
                                Order Date
                            </span>

                            <span class="text-right text-sm font-medium text-gray-900">
                                {{ $order->created_at->format('d M Y') }}
                            </span>

                        </div>


                        <div class="flex items-center justify-between gap-4">

                            <span class="text-sm text-gray-500">
                                Total Products
                            </span>

                            <span class="text-sm font-medium text-gray-900">
                                {{ $order->items->count() }}
                            </span>

                        </div>


                        <div class="flex items-center justify-between gap-4">

                            <span class="text-sm text-gray-500">
                                Total Quantity
                            </span>

                            <span class="text-sm font-medium text-gray-900">
                                {{ $order->items->sum('quantity') }}
                            </span>

                        </div>

                    </div>

                </div>


{{-- Order Status & Actions --}}
<div class="rounded-xl border border-gray-200 bg-white shadow-sm">

    {{-- Card Header --}}
    <div class="border-b border-gray-200 px-5 py-4">

        <h2 class="text-base font-bold text-gray-900">
            Update Order
        </h2>

        <p class="mt-1 text-sm text-gray-500">
            Change the current order status.
        </p>
        {{-- Payment Status Update --}}
<div class="rounded-xl border border-gray-200 bg-white shadow-sm">

    {{-- Card Header --}}
    <div class="border-b border-gray-200 px-5 py-4">

        <h2 class="text-base font-bold text-gray-900">
            Update Payment
        </h2>

        <p class="mt-1 text-sm text-gray-500">
            Change the current payment status.
        </p>

    </div>


    {{-- Form --}}
    <div class="p-5">

        <form
            action="{{ route('admin.orders.payment-status', $order->id) }}"
            method="POST"
        >

            @csrf
            @method('PUT')


            {{-- Payment Status --}}
            <div>

                <label
                    for="payment_status"
                    class="mb-2 block text-sm font-semibold text-gray-700"
                >
                    Payment Status
                </label>

                <select
                    id="payment_status"
                    name="payment_status"
                    class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2.5 text-sm text-gray-900 outline-none transition focus:border-gray-900 focus:ring-2 focus:ring-gray-900/10"
                >

                    <option
                        value="Pending"
                        {{ $order->payment_status === 'Pending' ? 'selected' : '' }}
                    >
                        Pending
                    </option>

                    <option
                        value="Paid"
                        {{ $order->payment_status === 'Paid' ? 'selected' : '' }}
                    >
                        Paid
                    </option>

                    <option
                        value="Failed"
                        {{ $order->payment_status === 'Failed' ? 'selected' : '' }}
                    >
                        Failed
                    </option>

                    <option
                        value="Refunded"
                        {{ $order->payment_status === 'Refunded' ? 'selected' : '' }}
                    >
                        Refunded
                    </option>

                </select>

                @error('payment_status')

                    <p class="mt-1 text-xs font-medium text-red-600">
                        {{ $message }}
                    </p>

                @enderror

            </div>


            {{-- Transaction ID --}}
            <div class="mt-4">

                <label
                    for="transaction_id"
                    class="mb-2 block text-sm font-semibold text-gray-700"
                >
                    Transaction ID
                </label>

                <input
                    type="text"
                    id="transaction_id"
                    name="transaction_id"
                    value="{{ old('transaction_id', $order->transaction_id) }}"
                    placeholder="Enter transaction ID"
                    class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2.5 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-gray-900 focus:ring-2 focus:ring-gray-900/10"
                >

                @error('transaction_id')

                    <p class="mt-1 text-xs font-medium text-red-600">
                        {{ $message }}
                    </p>

                @enderror

            </div>


            {{-- Update Button --}}
            <button
                type="submit"
                class="mt-4 inline-flex w-full items-center justify-center rounded-lg bg-gray-900 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2"
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
                        d="M5 13l4 4L19 7"
                    />
                </svg>

                Update Payment

            </button>

        </form>

    </div>

</div>

    </div>


    {{-- Form --}}
    <div class="p-5">

        <form
            action="{{ route('admin.orders.status', $order->id) }}"
            method="POST"
        >

            @csrf
            @method('PUT')


            {{-- Order Status --}}
            <div>

                <label
                    for="order_status"
                    class="mb-2 block text-sm font-semibold text-gray-700"
                >
                    Order Status
                </label>

                <select
                    id="order_status"
                    name="order_status"
                    class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2.5 text-sm text-gray-900 outline-none transition focus:border-gray-900 focus:ring-2 focus:ring-gray-900/10"
                >

                    <option
                        value="Pending"
                        {{ $order->order_status === 'Pending' ? 'selected' : '' }}
                    >
                        Pending
                    </option>

                    <option
                        value="Processing"
                        {{ $order->order_status === 'Processing' ? 'selected' : '' }}
                    >
                        Processing
                    </option>

                    <option
                        value="Shipped"
                        {{ $order->order_status === 'Shipped' ? 'selected' : '' }}
                    >
                        Shipped
                    </option>

                    <option
                        value="Delivered"
                        {{ $order->order_status === 'Delivered' ? 'selected' : '' }}
                    >
                        Delivered
                    </option>

                    <option
                        value="Cancelled"
                        {{ $order->order_status === 'Cancelled' ? 'selected' : '' }}
                    >
                        Cancelled
                    </option>

                </select>

                @error('order_status')

                    <p class="mt-1 text-xs font-medium text-red-600">
                        {{ $message }}
                    </p>

                @enderror

            </div>


            {{-- Update Button --}}
            <button
                type="submit"
                class="mt-4 inline-flex w-full items-center justify-center rounded-lg bg-gray-900 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2"
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
                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
                    />
                </svg>

                Update Status

            </button>

        </form>

    </div>

</div>

            </div>

        </div>

    </div>


</div>

@endsection