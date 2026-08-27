@extends('layouts.customer.customer-layout')

@section('customerContent')

<div class="min-h-screen bg-gray-50 py-8">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-1">




            {{-- Main Content --}}
            <main class="lg:col-span-3">

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

                                {{-- Order Header --}}
                                <div class="border-b border-gray-200 bg-gray-50 px-5 py-4">

                                    <div class="grid grid-cols-2 gap-4 sm:grid-cols-4">

                                        <div>
                                            <p class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                                Order Number
                                            </p>

                                            <p class="mt-1 text-sm font-semibold text-gray-900">
                                                {{ $order->order_number }}
                                            </p>
                                        </div>

                                        <div>
                                            <p class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                                Date
                                            </p>

                                            <p class="mt-1 text-sm text-gray-900">
                                                {{ $order->created_at->format('d M Y') }}
                                            </p>
                                        </div>

                                        <div>
                                            <p class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                                Payment
                                            </p>

                                            <p class="mt-1 text-sm font-medium text-gray-900">
                                                {{ $order->payment_method }}
                                            </p>
                                        </div>

                                        <div>
                                            <p class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                                Total
                                            </p>

                                            <p class="mt-1 text-sm font-bold text-gray-900">
                                                ₹{{ number_format($order->total_amount-$order->discount_amount, 2) }}
                                            </p>
                                        </div>

                                    </div>

                                </div>


                                {{-- Order Items --}}
                                <div class="divide-y divide-gray-100">

                                    @foreach($orderitems as $item)
                                        @if($order->id === $item->order_id)
                                        <div class="px-5 py-5">

                                            <div class="flex gap-4">

                                                {{-- Product Image --}}
                                                <div class="h-20 w-20 shrink-0 overflow-hidden rounded-lg border border-gray-200 bg-gray-100">

                                                    @if($item->product && $item->product->image)

                                                        <img
                                                            src="{{ asset('storage/' . $item->product->image) }}"
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

                                                    <p class="mt-1 text-sm text-gray-500">
                                                        Quantity:
                                                        <span class="font-medium text-gray-700">
                                                            {{ $item->quantity }}
                                                        </span>
                                                    </p>

                                                    <p class="mt-2 text-sm text-gray-500">
                                                        Price:
                                                        <span class="font-medium text-gray-700">
                                                            ₹{{ number_format($item->product->sale_price, 2) }}
                                                        </span>
                                                    </p>

                                                </div>


                                                {{-- Item Total --}}
                                                <div class="text-right">

                                                    <p class="text-xs text-gray-500">
                                                        Item Total
                                                    </p>

                                                    <p class="mt-1 text-sm font-bold text-gray-900">
                                                        ₹{{ number_format($item->product->sale_price*$item->quantity, 2) }}
                                                    </p>

                                                </div>

                                            </div>

                                        </div>
                                        @endif

                                    @endforeach

                                </div>


                                {{-- Order Footer --}}
                                <div class="border-t border-gray-200 bg-white px-5 py-4">

                                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                                        {{-- Status --}}
                                        <div class="flex items-center gap-2">

                                            <span class="text-sm text-gray-500">
                                                Order Status:
                                            </span>


                                            @if($order->order_status === 'Pending')

                                                <span class="inline-flex rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-800">
                                                    Pending
                                                </span>

                                            @elseif($order->order_status === 'Processing')

                                                <span class="inline-flex rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-800">
                                                    Processing
                                                </span>

                                            @elseif($order->order_status === 'Shipped')

                                                <span class="inline-flex rounded-full bg-purple-100 px-3 py-1 text-xs font-semibold text-purple-800">
                                                    Shipped
                                                </span>

                                            @elseif($order->order_status === 'Delivered')

                                                <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-800">
                                                    Delivered
                                                </span>

                                            @elseif($order->order_status === 'Cancelled')

                                                <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-800">
                                                    Cancelled
                                                </span>

                                            @else

                                                <span class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-700">
                                                    {{ $order->order_status }}
                                                </span>

                                            @endif

                                        </div>


                                        {{-- View Order --}}
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

                                </div>

                            </div>

                        @endforeach

                    </div>


                    {{-- Pagination --}}
                    <div class="mt-6">
                        {{ $orders->links() }}
                    </div>


                @else

                    {{-- Empty Orders --}}
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
</div>

@endsection