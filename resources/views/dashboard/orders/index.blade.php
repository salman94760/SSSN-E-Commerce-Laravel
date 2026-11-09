
@extends('layouts.admin.page')

@section('title', 'Orders')

@section('adminPage')

@php
    $status = [
        'Pending',
        'Processing',
        'Shipped',
        'Delivered',
        'Cancelled'
    ];

    $column = [
        'Action',
        'Order',
        'Customer',
        'Items',
        'Total',
        'Payment',
        'Status'
    ];
@endphp

<div class="min-h-screen bg-[#f8f5ef] p-4 sm:p-6 lg:p-8">

    <div class="mx-auto max-w-7xl space-y-6">

        {{-- Page Header --}}
        <x-admin.sub-header :arr="[
            'ordertotal' => $orders->total(),
            'title' => 'Orders',
            'subtitle' => 'Manage all customer orders'
        ]" />

<div class="grid grid-cols-2 gap-4 xl:grid-cols-4 xl:gap-6">

    <x-admin.view-cards
        :arr="[
            'title' => 'Total Orders',
            'icon' => '📦',
            'count' => $ordersInfo->total ?? 0,
            'text' => 'Total orders received',
        ]"
    />

    <x-admin.view-cards
        :arr="[
            'title' => 'Pending Orders',
            'icon' => '⏳',
            'count' => $ordersInfo->pending ?? 0,
            'text' => 'Orders awaiting processing',
        ]"
    />

    <x-admin.view-cards
        :arr="[
            'title' => 'Processing Orders',
            'icon' => '⚙️',
            'count' => $ordersInfo->processing ?? 0,
            'text' => 'Orders currently processing',
        ]"
    />

    <x-admin.view-cards
        :arr="[
            'title' => 'Paid Orders',
            'icon' => '💳',
            'count' => $ordersInfo->paid ?? 0,
            'text' => 'Orders with completed payment',
        ]"
    />

</div>


        {{-- Filters --}}
        <x-admin.view-filter :arr="[
            'status' => $status,
            'categories' => [],
            'reset' => '/orders',
            'searchname' => 'orders'
        ]" />

        {{-- Orders Table --}}
        <x-admin.view-table :arr="[
            'columnArr' => $column
        ]">

            @forelse($orders as $order)

                <tr>

                    {{-- Action --}}
                    <td class="whitespace-nowrap text-center">

                        <a
                            href="{{ route('admin.orders.show', $order->id) }}"
                            class="inline-flex items-center rounded-xl bg-[#6b5540] px-4 py-2 text-xs font-semibold text-white transition duration-300 hover:bg-[#4e3c2b]"
                        >
                            View
                        </a>

                    </td>

                    {{-- Order --}}
                    <td class="whitespace-nowrap">

                        <div class="text-sm font-semibold text-[#5d4936]">
                            {{ $order->order_number }}
                        </div>

                        <div class="mt-1 text-xs text-[#a58a6d]">
                            {{ $order->created_at?->format('d M Y, h:i A') ?? '-' }}
                        </div>

                    </td>

                    {{-- Customer --}}
                    <td>

                        <div class="text-sm font-semibold text-[#5d4936]">
                            {{ $order->userInfo?->user?->name ?? 'Customer' }}
                        </div>

                        <div class="mt-1 text-xs text-[#a58a6d]">
                            {{ $order->userInfo?->phone ?? 'No phone' }}
                        </div>

                    </td>

                    {{-- Items --}}
                    <td>

                        <div class="text-sm font-semibold text-[#5d4936]">
                            {{ $order->items->sum('quantity') }}
                        </div>

                        <div class="mt-1 text-xs text-[#a58a6d]">
                            {{ $order->items->count() }} product(s)
                        </div>

                    </td>

                    {{-- Total --}}
                    <td class="whitespace-nowrap">

                        <div class="text-sm font-bold text-[#6b5540]">
                            ₹{{ number_format($order->total_amount, 2) }}
                        </div>

                    </td>

                    {{-- Payment --}}
                    <td>

                        <div class="text-sm font-medium text-[#5d4936]">
                            {{ $order->payment_method }}
                        </div>

                        @php
                            $paymentColors = [
                                'Paid' => 'bg-green-100 text-green-700',
                                'Failed' => 'bg-red-100 text-red-700',
                                'Pending' => 'bg-yellow-100 text-yellow-700'
                            ];

                            $paymentClass = $paymentColors[$order->payment_status]
                                ?? 'bg-gray-100 text-gray-700';
                        @endphp

                        <span class="mt-2 inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $paymentClass }}">
                            {{ $order->payment_status ?? 'Unknown' }}
                        </span>

                    </td>

                    {{-- Order Status --}}
                    <td>

                        @php
                            $statusColors = [
                                'Pending' => 'bg-yellow-100 text-yellow-800',
                                'Processing' => 'bg-blue-100 text-blue-800',
                                'Shipped' => 'bg-purple-100 text-purple-800',
                                'Delivered' => 'bg-green-100 text-green-800',
                                'Cancelled' => 'bg-red-100 text-red-800'
                            ];

                            $statusClass = $statusColors[$order->order_status]
                                ?? 'bg-gray-100 text-gray-700';
                        @endphp

                        <span class="inline-flex whitespace-nowrap rounded-full px-3 py-1 text-xs font-semibold {{ $statusClass }}">
                            {{ $order->order_status ?? 'Unknown' }}
                        </span>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="{{ count($column) }}" class="py-16 text-center">

                        <div class="flex flex-col items-center justify-center">

                            <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-[#eee3d3] text-3xl text-[#a58a6d]">
                                ♧
                            </div>

                            <h3 class="mt-4 text-sm font-semibold text-[#6b5540]">
                                No Orders Found
                            </h3>

                            <p class="mt-2 text-xs text-[#a58a6d]">
                                There are no customer orders yet.
                            </p>

                        </div>

                    </td>
                </tr>

            @endforelse

        </x-admin.view-table>

        {{-- Pagination --}}
        <x-admin.view-pagination :arr="[
            'arrpagination' => $orders
        ]" />

    </div>

</div>

@endsection
