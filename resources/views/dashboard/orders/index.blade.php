@extends('layouts.admin.admin')

@section('content')

<div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">

    <div class="mx-auto max-w-7xl">

        {{-- Header --}}
        <div class="mb-6 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">

            <div>
                <h1 class="text-2xl font-bold text-gray-900">
                    Orders
                </h1>

                <p class="mt-1 text-sm text-gray-500">
                    Manage all customer orders.
                </p>
            </div>

            <div class="rounded-lg bg-white px-4 py-2 text-sm font-medium text-gray-600 shadow-sm ring-1 ring-gray-200">
                Total Orders:
                <span class="font-bold text-gray-900">
                    {{ $orders->total() }}
                </span>
            </div>

        </div>


        {{-- Orders Table --}}
        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

            <div class="overflow-x-auto">

                <table class="min-w-full divide-y divide-gray-200">

                    <thead class="bg-gray-50">

                        <tr>

                            <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Order
                            </th>

                            <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Customer
                            </th>

                            <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Items
                            </th>

                            <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Total
                            </th>

                            <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Payment
                            </th>

                            <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Status
                            </th>

                            <th class="px-5 py-4 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-gray-100 bg-white">

                        @forelse($orders as $order)

                            <tr class="transition hover:bg-gray-50">

                                {{-- Order --}}
                                <td class="whitespace-nowrap px-5 py-4">

                                    <div class="text-sm font-semibold text-gray-900">
                                        {{ $order->order_number }}
                                    </div>

                                    <div class="mt-1 text-xs text-gray-500">
                                        {{ $order->created_at->format('d M Y, h:i A') }}
                                    </div>

                                </td>


                                {{-- Customer --}}
                                <td class="px-5 py-4">

                                    <div class="text-sm font-medium text-gray-900">

                                        @if($order->userInfo)

                                            {{ $order->userInfo->name ?? 'Customer' }}

                                        @else

                                            Customer

                                        @endif

                                    </div>

                                    @if($order->userInfo)

                                        <div class="mt-1 text-xs text-gray-500">
                                            {{ $order->userInfo->phone ?? 'No phone' }}
                                        </div>

                                    @endif

                                </td>


                                {{-- Items --}}
                                <td class="px-5 py-4">

                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $order->items->sum('quantity') }}
                                    </div>

                                    <div class="text-xs text-gray-500">
                                        {{ $order->items->count() }} product(s)
                                    </div>

                                </td>


                                {{-- Total --}}
                                <td class="whitespace-nowrap px-5 py-4">

                                    <div class="text-sm font-bold text-gray-900">
                                        ₹{{ number_format($order->total_amount, 2) }}
                                    </div>

                                </td>


                                {{-- Payment --}}
                                <td class="px-5 py-4">

                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $order->payment_method }}
                                    </div>


                                    @if($order->payment_status === 'Paid')

                                        <span class="mt-1 inline-flex rounded-full bg-green-100 px-2.5 py-1 text-xs font-semibold text-green-700">
                                            Paid
                                        </span>

                                    @elseif($order->payment_status === 'Failed')

                                        <span class="mt-1 inline-flex rounded-full bg-red-100 px-2.5 py-1 text-xs font-semibold text-red-700">
                                            Failed
                                        </span>

                                    @else

                                        <span class="mt-1 inline-flex rounded-full bg-yellow-100 px-2.5 py-1 text-xs font-semibold text-yellow-700">
                                            {{ $order->payment_status }}
                                        </span>

                                    @endif

                                </td>


                                {{-- Order Status --}}
                                <td class="px-5 py-4">

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

                                </td>


                                {{-- Action --}}
                                <td class="whitespace-nowrap px-5 py-4 text-right">

                                    <a
                                        href="{{ route('admin.orders.show', $order->id) }}"
                                        class="inline-flex items-center rounded-lg bg-gray-900 px-3 py-2 text-xs font-semibold text-white transition hover:bg-gray-700"
                                    >
                                        View
                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="7"
                                    class="px-5 py-16 text-center"
                                >

                                    <div class="text-gray-400">

                                        <svg
                                            class="mx-auto h-12 w-12"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0H4"
                                            />
                                        </svg>

                                    </div>

                                    <h3 class="mt-4 text-sm font-semibold text-gray-900">
                                        No Orders Found
                                    </h3>

                                    <p class="mt-1 text-sm text-gray-500">
                                        There are no customer orders yet.
                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- Pagination --}}
            @if($orders->hasPages())

                <div class="border-t border-gray-200 px-5 py-4">
                    {{ $orders->links() }}
                </div>

            @endif

        </div>

    </div>

</div>

@endsection