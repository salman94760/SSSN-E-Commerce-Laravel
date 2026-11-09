
@extends('layouts.admin.page')

@section('title', 'Payments')

@section('adminPage')

@php
    $status = ['Pending', 'Processing', 'Shipped', 'Delivered', 'Cancelled'];

    $cardClass = 'overflow-hidden rounded-[26px] border border-white/80 bg-white/65 shadow-[0_15px_45px_rgba(100,75,45,0.06)] backdrop-blur-2xl';

    $labelClass = 'mb-2 block text-xs font-bold uppercase tracking-wide text-[#796a59]';

    $selectClass = 'w-full rounded-xl border border-[#e8dccb] bg-white/80 px-3 py-2.5 text-sm font-semibold text-[#5d4936] outline-none transition duration-200 focus:border-[#a58a6d] focus:ring-2 focus:ring-[#e7d5bb]/50';
@endphp

<div class="min-h-screen bg-[#f8f5ef] p-4 sm:p-6 lg:p-8">

    <div class="mx-auto max-w-7xl space-y-6">

        {{-- Page Header --}}
        <x-admin.sub-header :arr="[
            'title' => 'Payments',
            'subtitle' => 'Manage all customer payments.'
        ]" />

<div class="grid grid-cols-2 gap-4 xl:grid-cols-4 xl:gap-6">

    {{-- Successful Payments --}}
    <x-admin.view-cards
        :arr="[
            'title' => 'Successful Payments',
            'icon' => '✓',
            'count' => $successfulPayments,
            'text' => 'Total successful payments',
        ]"
    />

    {{-- Pending Payments --}}
    <x-admin.view-cards
        :arr="[
            'title' => 'Pending Payments',
            'icon' => '◷',
            'count' => $pendingPayments,
            'text' => 'Payments awaiting confirmation',
        ]"
    />

    {{-- Processing Payments --}}
    <x-admin.view-cards
        :arr="[
            'title' => 'Processing Payments',
            'icon' => '↻',
            'count' => $processingPayments,
            'text' => 'Payments currently processing',
        ]"
    />

    {{-- Failed Payments --}}
    <x-admin.view-cards
        :arr="[
            'title' => 'Failed Payments',
            'icon' => '✕',
            'count' => $failedPayments,
            'text' => 'Total failed payments',
        ]"
    />

</div>


        {{-- Main Card --}}
        <div class="{{ $cardClass }}">

            {{-- Filter Section --}}
            <div class="border-b border-[#e8dccb]/70 bg-[#eee3d3]/25">

                <x-admin.view-filter :arr="[
                    'status' => $status,
                    'reset' => '/payments',
                    'searchname' => 'payments'
                ]" />

            </div>

            {{-- Payments List --}}
            <div class="space-y-4 p-4 sm:p-6">

                @forelse($orders as $order)

                    {{-- Payment Card --}}
                    <div class="overflow-hidden rounded-2xl border border-[#e8dccb]/80 bg-white/75 shadow-[0_8px_25px_rgba(100,75,45,0.04)] transition duration-300 hover:border-[#d9c7af] hover:shadow-[0_12px_35px_rgba(100,75,45,0.08)]">

                        {{-- Card Header --}}
                        <div class="flex flex-col gap-4 border-b border-[#e8dccb]/60 bg-[#eee3d3]/20 px-5 py-5 sm:flex-row sm:items-center sm:justify-between">

                            {{-- Order Number --}}
                            <div class="flex items-center gap-3">

                                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl border border-[#e8dccb] bg-[#eee3d3]/70 text-xl">
                                    💳
                                </div>

                                <div>

                                    <p class="text-xs font-medium uppercase tracking-wide text-[#a58a6d]">
                                        Order Number
                                    </p>

                                    <h3 class="mt-1 text-base font-bold text-[#5d4936]">
                                        {{ $order->order_number }}
                                    </h3>

                                </div>

                            </div>

                            {{-- Payment Amount --}}
                            <div class="sm:text-right">

                                <p class="text-xs font-medium uppercase tracking-wide text-[#a58a6d]">
                                    Payment Amount
                                </p>

                                <p class="mt-1 text-2xl font-bold tracking-tight text-[#5d4936]">
                                    ₹{{ number_format($order->total_amount - $order->discount_amount, 2) }}
                                </p>

                            </div>

                        </div>

                        {{-- Payment Details --}}
                        <div class="grid grid-cols-1 gap-6 px-5 py-6 sm:grid-cols-2 lg:grid-cols-4">

                            {{-- Payment Method --}}
                            <div>

                                <p class="{{ $labelClass }}">
                                    Payment Method
                                </p>

                                <div class="flex items-center gap-2">

                                    <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-[#eee3d3]/60 text-lg">
                                        💰
                                    </span>

                                    <span class="text-sm font-semibold capitalize text-[#5d4936]">
                                        {{ $order->payment_method ?: 'N/A' }}
                                    </span>

                                </div>

                            </div>

                            {{-- Payment Status --}}
                            <div>

                                <p class="{{ $labelClass }}">
                                    Payment Status
                                </p>

                                @if($order->payment_status === 'Paid')

                                    <span class="inline-flex items-center gap-2 rounded-full border border-green-200 bg-green-50 px-3 py-1.5 text-xs font-semibold text-green-700">

                                        <span class="h-2 w-2 rounded-full bg-green-500"></span>

                                        Paid

                                    </span>

                                @elseif($order->payment_status === 'Pending')

                                    <span class="inline-flex items-center gap-2 rounded-full border border-yellow-200 bg-yellow-50 px-3 py-1.5 text-xs font-semibold text-yellow-700">

                                        <span class="h-2 w-2 rounded-full bg-yellow-500"></span>

                                        Pending

                                    </span>

                                @else

                                    <span class="inline-flex items-center gap-2 rounded-full border border-red-200 bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-700">

                                        <span class="h-2 w-2 rounded-full bg-red-500"></span>

                                        {{ $order->payment_status ?: 'Unknown' }}

                                    </span>

                                @endif

                            </div>

                            {{-- Order Status --}}
                            <div>

                                <label
                                    for="order_status_{{ $order->id }}"
                                    class="{{ $labelClass }}"
                                >
                                    Order Status
                                </label>

                                <form
                                    action="{{ route('admin.orders.status', $order->id) }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('PUT')

                                    <select
                                        name="order_status"
                                        id="order_status_{{ $order->id }}"
                                        onchange="this.form.submit()"
                                        class="{{ $selectClass }}"
                                    >

                                        @foreach($status as $item)

                                            <option
                                                value="{{ $item }}"
                                                @selected($order->order_status === $item)
                                            >
                                                {{ $item }}
                                            </option>

                                        @endforeach

                                    </select>

                                </form>

                            </div>

                            {{-- Order Date --}}
                            <div>

                                <p class="{{ $labelClass }}">
                                    Order Date
                                </p>

                                <div class="flex items-center gap-2">

                                    <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-[#eee3d3]/60 text-lg">
                                        📅
                                    </span>

                                    <div>

                                        <p class="text-sm font-semibold text-[#5d4936]">
                                            {{ $order->created_at->format('d M Y') }}
                                        </p>

                                        <p class="mt-0.5 text-xs text-[#a58a6d]">
                                            {{ $order->created_at->format('h:i A') }}
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                @empty

                    {{-- Empty State --}}
                    <div class="flex flex-col items-center justify-center rounded-2xl border border-[#e8dccb]/80 bg-white/70 px-6 py-16 text-center">

                        <div class="flex h-16 w-16 items-center justify-center rounded-2xl border border-[#e8dccb] bg-[#eee3d3]/60 text-3xl">
                            💳
                        </div>

                        <h3 class="mt-4 text-base font-bold text-[#5d4936]">
                            No Payments Found
                        </h3>

                        <p class="mt-2 max-w-sm text-sm text-[#938778]">
                            No customer payments are available at the moment.
                        </p>

                    </div>

                @endforelse

            </div>

            {{-- Pagination --}}
            @if(method_exists($orders, 'links'))

                <div class="border-t border-[#e8dccb]/70 bg-[#eee3d3]/20">

                    <x-admin.view-pagination :arr="[
                        'arrpagination' => $orders
                    ]" />

                </div>

            @endif

        </div>

    </div>

</div>

@endsection
