
@extends('layouts.admin.page')

@section('title', 'Report Details')

@section('adminPage')

@php
    $cardClass = 'overflow-hidden rounded-[26px] border border-white/80 bg-white/65 shadow-[0_15px_45px_rgba(100,75,45,0.06)] backdrop-blur-2xl';

    $labelClass = 'text-xs font-bold uppercase tracking-wide text-[#a58a6d]';
@endphp

<div class="min-h-screen bg-[#f8f5ef] p-4 sm:p-6 lg:p-8">

    <div class="mx-auto max-w-7xl space-y-6">

        <x-admin.sub-header :arr="[
            'title' => 'Report Details',
            'subtitle' => 'Detailed sales and payment information.'
        ]" />

        <div class="{{ $cardClass }}">

            {{-- Header --}}
            <div class="flex flex-col gap-4 border-b border-[#e8dccb] bg-[#eee3d3]/30 px-6 py-5 sm:flex-row sm:items-center sm:justify-between">

                <div>

                    <p class="{{ $labelClass }}">
                        Order Report
                    </p>

                    <h2 class="mt-2 text-xl font-bold text-[#5d4936]">
                        {{ $order->order_number }}
                    </h2>

                </div>

                <a
                    href="{{ route('reports.index') }}"
                    class="inline-flex items-center justify-center rounded-xl border border-[#e8dccb] bg-white px-5 py-3 text-sm font-semibold text-[#6b5540] hover:bg-[#eee3d3]"
                >
                    Back to Reports
                </a>

            </div>

            {{-- Details --}}
            <div class="grid grid-cols-1 gap-6 p-6 sm:grid-cols-2 lg:grid-cols-3">

                {{-- Order Date --}}
                <div class="rounded-2xl bg-[#f8f5ef] p-5">

                    <p class="{{ $labelClass }}">
                        Order Date
                    </p>

                    <p class="mt-2 text-base font-bold text-[#5d4936]">
                        {{ $order->created_at->format('d M Y') }}
                    </p>

                    <p class="mt-1 text-xs text-[#a58a6d]">
                        {{ $order->created_at->format('h:i A') }}
                    </p>

                </div>

                {{-- Total Amount --}}
                <div class="rounded-2xl bg-[#f8f5ef] p-5">

                    <p class="{{ $labelClass }}">
                        Total Amount
                    </p>

                    <p class="mt-2 text-xl font-bold text-[#5d4936]">
                        ₹{{ number_format($order->total_amount, 2) }}
                    </p>

                </div>

                {{-- Discount --}}
                <div class="rounded-2xl bg-[#f8f5ef] p-5">

                    <p class="{{ $labelClass }}">
                        Discount Amount
                    </p>

                    <p class="mt-2 text-xl font-bold text-[#5d4936]">
                        ₹{{ number_format($order->discount_amount, 2) }}
                    </p>

                </div>

                {{-- Final Amount --}}
                <div class="rounded-2xl bg-[#f8f5ef] p-5">

                    <p class="{{ $labelClass }}">
                        Final Amount
                    </p>

                    <p class="mt-2 text-xl font-bold text-[#5d4936]">
                        ₹{{ number_format($order->total_amount - $order->discount_amount, 2) }}
                    </p>

                </div>

                {{-- Payment Method --}}
                <div class="rounded-2xl bg-[#f8f5ef] p-5">

                    <p class="{{ $labelClass }}">
                        Payment Method
                    </p>

                    <p class="mt-2 text-base font-semibold capitalize text-[#5d4936]">
                        {{ $order->payment_method ?: 'N/A' }}
                    </p>

                </div>

                {{-- Payment Status --}}
                <div class="rounded-2xl bg-[#f8f5ef] p-5">

                    <p class="{{ $labelClass }}">
                        Payment Status
                    </p>

                    <p class="mt-2 text-base font-bold text-[#5d4936]">
                        {{ $order->payment_status }}
                    </p>

                </div>

                {{-- Order Status --}}
                <div class="rounded-2xl bg-[#f8f5ef] p-5 sm:col-span-2 lg:col-span-3">

                    <p class="{{ $labelClass }}">
                        Order Status
                    </p>

                    <span class="mt-3 inline-flex rounded-full border border-[#e8dccb] bg-[#eee3d3] px-4 py-2 text-sm font-semibold text-[#6b5540]">
                        {{ $order->order_status }}
                    </span>

                </div>

            </div>

        </div>

        {{-- Financial Summary --}}
        <div class="{{ $cardClass }}">

            <div class="border-b border-[#e8dccb] bg-[#eee3d3]/30 px-6 py-5">

                <h3 class="text-lg font-bold text-[#5d4936]">
                    Financial Summary
                </h3>

            </div>

            <div class="space-y-4 p-6">

                <div class="flex justify-between text-sm text-[#796a59]">
                    <span>Order Total</span>
                    <span>₹{{ number_format($order->total_amount, 2) }}</span>
                </div>

                <div class="flex justify-between text-sm text-[#796a59]">
                    <span>Discount</span>
                    <span>- ₹{{ number_format($order->discount_amount, 2) }}</span>
                </div>

                <div class="border-t border-[#e8dccb] pt-4">

                    <div class="flex justify-between">

                        <span class="font-bold text-[#5d4936]">
                            Final Amount
                        </span>

                        <span class="text-xl font-bold text-[#5d4936]">
                            ₹{{ number_format($order->total_amount - $order->discount_amount, 2) }}
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
