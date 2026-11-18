@extends('layouts.customer.customer-layout')

@section('customerContent')

<div class="min-h-screen bg-[#faf7f2] py-8">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <main>

            {{-- Page Header --}}
            <div class="mb-7 flex flex-col justify-between gap-3 sm:flex-row sm:items-center">

                <div>
                    <p class="text-xs uppercase tracking-[3px] text-[#9a846a] mb-2">
                        SSSN Fashion
                    </p>

                    <h1 class="text-3xl font-serif text-[#493825]">
                        My Orders
                    </h1>

                    <p class="mt-2 text-sm text-[#79654e]">
                        View and manage your recent orders.
                    </p>
                </div>

                <div class="rounded-full border border-[#e8dccb] bg-white px-5 py-2.5 text-sm font-medium text-[#79654e]">
                    <i class="fas fa-shopping-bag mr-2"></i>
                    {{ $orders->total() }} Orders
                </div>

            </div>

            @if($orders->count())

                {{-- Orders --}}
                <div class="space-y-6">

                    @foreach($orders as $order)

                        <div class="overflow-hidden rounded-2xl border border-[#e8dccb] bg-white shadow-sm">

                            {{-- ORDER HEADER --}}
                            <div class="border-b border-[#eee4d8] bg-[#f5efe6] px-5 py-5">

                                <div class="grid grid-cols-2 gap-5 sm:grid-cols-4">

                                    {{-- Order Number --}}
                                    <div>
                                        <p class="text-xs font-medium uppercase tracking-wider text-[#9a846a]">
                                            Order Number
                                        </p>

                                        <p class="mt-2 text-sm font-semibold text-[#493825]">
                                            #{{ $order->order_number }}
                                        </p>
                                    </div>

                                    {{-- Date --}}
                                    <div>
                                        <p class="text-xs font-medium uppercase tracking-wider text-[#9a846a]">
                                            Date
                                        </p>

                                        <p class="mt-2 text-sm text-[#493825]">
                                            {{ $order->created_at->format('d M Y') }}
                                        </p>
                                    </div>

                                    {{-- Payment --}}
                                    <div>
                                        <p class="text-xs font-medium uppercase tracking-wider text-[#9a846a]">
                                            Payment
                                        </p>

                                        <p class="mt-2 text-sm font-medium text-[#493825]">
                                            {{ $order->payment_method }}
                                        </p>
                                    </div>

                                    {{-- Total --}}
                                    <div>
                                        <p class="text-xs font-medium uppercase tracking-wider text-[#9a846a]">
                                            Total
                                        </p>

                                        <p class="mt-2 text-sm font-bold text-[#493825]">
                                            ₹{{ number_format($order->total_amount - $order->discount_amount, 2) }}
                                        </p>
                                    </div>

                                </div>

                            </div>

                            {{-- ORDER ITEMS --}}
                            <div class="divide-y divide-[#eee4d8]">

                                @foreach($orderitems as $item)

                                    @if($order->id === $item->order_id)

                                        <div class="px-5 py-5">

                                            <div class="flex gap-4">

                                                {{-- Product Image --}}
                                                <div class="h-24 w-20 shrink-0 overflow-hidden rounded-xl border border-[#eee4d8] bg-[#f5efe6]">

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

                                                {{-- Product Info --}}
                                                <div class="min-w-0 flex-1">

                                                    @if($item->product)

                                                        <h3 class="text-sm font-semibold text-[#493825]">
                                                            {{ $item->product->name }}
                                                        </h3>

                                                    @else

                                                        <h3 class="text-sm font-semibold text-[#9a846a]">
                                                            Product unavailable
                                                        </h3>

                                                    @endif

                                                    {{-- Quantity --}}
                                                    <p class="mt-2 text-sm text-[#79654e]">
                                                        Quantity:
                                                        <span class="font-medium text-[#493825]">
                                                            {{ $item->quantity }}
                                                        </span>
                                                    </p>

                                                    {{-- Price --}}
                                                    @if($item->product)

                                                        <p class="mt-2 text-sm text-[#79654e]">
                                                            Price:
                                                            <span class="font-medium text-[#493825]">
                                                                ₹{{ number_format($item->price, 2) }}
                                                            </span>
                                                        </p>

                                                    @endif

                                                </div>

                                                {{-- Item Total --}}
                                                <div class="text-right shrink-0">

                                                    <p class="text-xs text-[#9a846a]">
                                                        Item Total
                                                    </p>

                                                    @if($item->product)

                                                        <p class="mt-2 text-sm font-bold text-[#493825]">
                                                            ₹{{ number_format($item->price * $item->quantity, 2) }}
                                                        </p>

                                                    @else

                                                        <p class="mt-2 text-sm font-bold text-[#9a846a]">
                                                            N/A
                                                        </p>

                                                    @endif

                                                </div>

                                            </div>

                                        </div>

                                    @endif

                                @endforeach

                            </div>

                            {{-- ORDER FOOTER --}}
                            <div class="border-t border-[#eee4d8] bg-white px-5 py-5">

                                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                                    {{-- ORDER STATUS --}}
                                    <div class="flex flex-wrap items-center gap-2">

                                        <span class="text-sm text-[#79654e]">
                                            Order Status:
                                        </span>

                                        {{-- Pending --}}
                                        @if($order->order_status === 'Pending')

                                            <span class="inline-flex items-center rounded-full bg-[#fff4dc] px-3 py-1.5 text-xs font-semibold text-[#94702e]">
                                                <span class="mr-2 h-1.5 w-1.5 rounded-full bg-[#bd9556]"></span>
                                                Pending
                                            </span>

                                        {{-- Processing --}}
                                        @elseif($order->order_status === 'Processing')

                                            <span class="inline-flex items-center rounded-full bg-[#f0e8dc] px-3 py-1.5 text-xs font-semibold text-[#79654e]">
                                                <span class="mr-2 h-1.5 w-1.5 rounded-full bg-[#9a846a]"></span>
                                                Processing
                                            </span>

                                        {{-- Shipped --}}
                                        @elseif($order->order_status === 'Shipped')

                                            <span class="inline-flex items-center rounded-full bg-[#eee8f2] px-3 py-1.5 text-xs font-semibold text-[#705b7c]">
                                                <span class="mr-2 h-1.5 w-1.5 rounded-full bg-[#9276a3]"></span>
                                                Shipped
                                            </span>

                                        {{-- Delivered --}}
                                        @elseif($order->order_status === 'Delivered')

                                            <span class="inline-flex items-center rounded-full bg-[#eaf1e7] px-3 py-1.5 text-xs font-semibold text-[#54704a]">
                                                <span class="mr-2">✓</span>
                                                Delivered
                                            </span>

                                        {{-- Cancelled --}}
                                        @elseif($order->order_status === 'Cancelled')

                                            {{-- Cancelled By Admin --}}
                                            @if($order->cancelled_by === 'admin')

                                                <span class="inline-flex items-center rounded-full bg-[#fbeceb] px-3 py-1.5 text-xs font-semibold text-[#a34c45]">
                                                    <span class="mr-2">✕</span>
                                                    Cancelled by Admin
                                                </span>

                                            {{-- Cancelled By User --}}
                                            @elseif($order->cancelled_by === 'user')

                                                <span class="inline-flex items-center rounded-full bg-[#fff0e6] px-3 py-1.5 text-xs font-semibold text-[#a76538]">
                                                    <span class="mr-2">✕</span>
                                                    Cancelled by You
                                                </span>

                                            {{-- Cancelled But Source Not Available --}}
                                            @else

                                                <span class="inline-flex items-center rounded-full bg-[#fbeceb] px-3 py-1.5 text-xs font-semibold text-[#a34c45]">
                                                    <span class="mr-2">✕</span>
                                                    Cancelled
                                                </span>

                                            @endif

                                        {{-- Any Other Status --}}
                                        @else

                                            <span class="inline-flex items-center rounded-full bg-[#f5efe6] px-3 py-1.5 text-xs font-semibold text-[#79654e]">
                                                {{ $order->order_status }}
                                            </span>

                                        @endif

                                    </div>

                                    {{-- VIEW ORDER BUTTON --}}
                                    <a
                                        href="{{ route('customer.order.details', $order->order_number) }}"
                                        class="inline-flex items-center justify-center rounded-xl bg-[#493825] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#5c4630]"
                                    >
                                        View Order

                                        <i class="fas fa-arrow-right ml-2 text-xs"></i>
                                    </a>

                                </div>

                                {{-- CANCELLED ORDER INFORMATION --}}
                                @if($order->order_status === 'Cancelled')

                                    <div class="mt-5 rounded-xl border border-[#ead5d1] bg-[#fcf5f3] px-4 py-4">

                                        {{-- Admin Cancel --}}
                                        @if($order->cancelled_by === 'admin')

                                            <div class="flex items-start gap-3">

                                                <div class="mt-0.5 flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#f5e4e1] text-[#a34c45]">
                                                    ✕
                                                </div>

                                                <div>
                                                    <p class="text-sm font-semibold text-[#8f443e]">
                                                        Order cancelled by admin
                                                    </p>

                                                    <p class="mt-1 text-sm text-[#a7655d]">
                                                        Your order was cancelled by the store administrator.
                                                    </p>
                                                </div>

                                            </div>

                                        {{-- User Cancel --}}
                                        @elseif($order->cancelled_by === 'user')

                                            <div class="flex items-start gap-3">

                                                <div class="mt-0.5 flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#fff0e6] text-[#a76538]">
                                                    ✕
                                                </div>

                                                <div>
                                                    <p class="text-sm font-semibold text-[#965d35]">
                                                        You cancelled this order
                                                    </p>

                                                    <p class="mt-1 text-sm text-[#a76538]">
                                                        This order was cancelled by you.
                                                    </p>
                                                </div>

                                            </div>

                                        {{-- Unknown --}}
                                        @else

                                            <div class="flex items-start gap-3">

                                                <div class="mt-0.5 flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#f5e4e1] text-[#a34c45]">
                                                    ✕
                                                </div>

                                                <div>
                                                    <p class="text-sm font-semibold text-[#8f443e]">
                                                        Order cancelled
                                                    </p>

                                                    <p class="mt-1 text-sm text-[#a7655d]">
                                                        This order has been cancelled.
                                                    </p>
                                                </div>

                                            </div>

                                        @endif

                                        {{-- Cancel Reason --}}
                                        @if(!empty($order->cancel_reason))

                                            <div class="mt-4 border-t border-[#ead5d1] pt-3">

                                                <p class="text-xs font-semibold uppercase tracking-wide text-[#9a846a]">
                                                    Cancellation Reason
                                                </p>

                                                <p class="mt-1 text-sm text-[#79654e]">
                                                    {{ $order->cancel_reason }}
                                                </p>

                                            </div>

                                        @endif

                                        {{-- Cancelled Date --}}
                                        @if(!empty($order->cancelled_at))

                                            <div class="mt-2">
                                                <p class="text-xs text-[#9a846a]">
                                                    Cancelled on:

                                                    <span class="font-medium text-[#493825]">
                                                        {{ \Carbon\Carbon::parse($order->cancelled_at)->format('d M Y, h:i A') }}
                                                    </span>
                                                </p>
                                            </div>

                                        @endif

                                    </div>

                                @endif

                                {{-- DELIVERED INFORMATION --}}
                                @if($order->order_status === 'Delivered')

                                    <div class="mt-5 rounded-xl border border-[#dce5d6] bg-[#f3f7f0] px-4 py-4">

                                        <div class="flex items-center gap-3">

                                            <div class="flex h-8 w-8 items-center justify-center rounded-full bg-[#e3eddd] text-[#54704a]">
                                                ✓
                                            </div>

                                            <div>
                                                <p class="text-sm font-semibold text-[#54704a]">
                                                    Order Delivered
                                                </p>

                                                <p class="mt-1 text-sm text-[#6c8263]">
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

                {{-- PAGINATION --}}
                <div class="mt-7">
                    {{ $orders->links() }}
                </div>

            @else

                {{-- EMPTY ORDERS --}}
                <div class="rounded-2xl border border-[#e8dccb] bg-white px-6 py-16 text-center shadow-sm">

                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-[#f5efe6] text-[#79654e]">
                        <i class="fas fa-shopping-bag text-3xl"></i>
                    </div>

                    <h2 class="mt-6 text-xl font-semibold text-[#493825]">
                        No Orders Found
                    </h2>

                    <p class="mt-2 text-sm text-[#79654e]">
                        You haven't placed any orders yet.
                    </p>

                    <a
                        href="{{ route('customer.shop') }}"
                        class="mt-7 inline-flex items-center rounded-xl bg-[#493825] px-6 py-3 text-sm font-semibold text-white transition hover:bg-[#5c4630]"
                    >
                        <i class="fas fa-shopping-bag mr-2"></i>
                        Continue Shopping
                    </a>

                </div>

            @endif

        </main>

    </div>

</div>

@endsection