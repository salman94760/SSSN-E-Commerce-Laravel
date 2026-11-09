
@extends('layouts.admin.page')

@section('title', 'Reports')

@section('adminPage')

@php
    $card = 'rounded-[26px] border border-white/80 bg-white/65 shadow-[0_15px_45px_rgba(100,75,45,0.06)] backdrop-blur-2xl';
    $input = 'w-full rounded-xl border border-[#e8dccb] bg-white/80 px-4 py-3 text-sm text-[#5d4936] outline-none focus:border-[#a58a6d]';
@endphp

<div class="min-h-screen bg-[#f8f5ef] p-4 sm:p-6 lg:p-8">
    <div class="mx-auto max-w-7xl space-y-6">

        <x-admin.sub-header :arr="[
            'title' => 'Reports & Analytics',
            'subtitle' => 'Products, orders and payment reports'
        ]" />

        <div class="grid grid-cols-2 gap-4 xl:grid-cols-4">
            <x-admin.view-cards :arr="[
                'title'=>'Total Products',
                'icon'=>'📦',
                'count'=>$totalProducts,
                'text'=>'Available products'
            ]" />

            <x-admin.view-cards :arr="[
                'title'=>'Total Orders',
                'icon'=>'🛒',
                'count'=>$totalOrders,
                'text'=>'All orders'
            ]" />

            <x-admin.view-cards :arr="[
                'title'=>'Paid Payments',
                'icon'=>'✓',
                'count'=>$paidPayments,
                'text'=>'Successful payments'
            ]" />

            
<x-admin.view-cards :arr="[
    'title' => 'Total Revenue',
    'icon' => '₹',
    'count' => (float) $totalRevenue,
    'prefix' => '₹',
    'decimals' => 2,
    'text' => 'Revenue from paid orders'
]" />

        </div>

        <div class="{{ $card }} overflow-hidden">

            <div class="border-b border-[#e8dccb] p-6">
                <h2 class="text-lg font-bold text-[#5d4936]">
                    Generate Reports
                </h2>
                <p class="mt-1 text-sm text-[#a58a6d]">
                    Select report type, date range and export format.
                </p>
            </div>

            <form action="{{ route('reports.index') }}" method="GET"
                  class="grid grid-cols-1 gap-4 p-6 md:grid-cols-4">

                <div>
                    <label class="mb-2 block text-xs font-bold text-[#796a59]">
                        Report Type
                    </label>
                    <select name="type" class="{{ $input }}">
                        @foreach(['products','orders','payments'] as $option)
                            <option value="{{ $option }}"
                                @selected($type === $option)>
                                {{ ucfirst($option) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="mb-2 block text-xs font-bold text-[#796a59]">
                        From Date
                    </label>
                    <input type="date" name="from_date"
                           value="{{ request('from_date') }}"
                           class="{{ $input }}">
                </div>

                <div>
                    <label class="mb-2 block text-xs font-bold text-[#796a59]">
                        To Date
                    </label>
                    <input type="date" name="to_date"
                           value="{{ request('to_date') }}"
                           class="{{ $input }}">
                </div>

                <div class="flex items-end">
                    <button type="submit"
                        class="w-full rounded-xl bg-[#6b5540] px-5 py-3 text-sm font-semibold text-white hover:bg-[#4e3c2b]">
                        Generate Report
                    </button>
                </div>

            </form>

            <div class="flex flex-wrap gap-3 border-t border-[#e8dccb] px-6 py-4">

                @foreach(['pdf'=>'PDF','excel'=>'Excel','csv'=>'CSV'] as $format=>$label)
                    <a href="{{ route('reports.export', array_merge(request()->only('from_date','to_date'), ['type'=>$type, 'format'=>$format])) }}"
                       class="rounded-xl border border-[#e8dccb] bg-[#eee3d3]/60 px-5 py-3 text-sm font-semibold text-[#6b5540] transition hover:bg-[#e5d4bd]">
                        ↓ Download {{ $label }}
                    </a>
                @endforeach

            </div>

            <div class="overflow-x-auto">
                <table class="w-full min-w-[650px] text-left text-sm">
                    <thead class="bg-[#eee3d3]/50 text-xs uppercase text-[#796a59]">
                        <tr>
                            @if($type === 'products')
                                <th class="px-6 py-4">Product</th>
                                <th class="px-6 py-4">Price</th>
                                <th class="px-6 py-4">Created</th>
                            @else
                                <th class="px-6 py-4">Order Number</th>
                                <th class="px-6 py-4">
                                    {{ $type === 'payments' ? 'Payment Method' : 'Order Status' }}
                                </th>
                                <th class="px-6 py-4">Payment Status</th>
                                <th class="px-6 py-4">Amount</th>
                                <th class="px-6 py-4">Date</th>
                            @endif
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-[#e8dccb]/60">
                        @forelse($reports as $item)
                            <tr class="hover:bg-[#eee3d3]/25">
                                @if($type === 'products')
                                    <td class="px-6 py-4 font-semibold text-[#5d4936]">
                                        {{ $item->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        ₹{{ number_format($item->price, 2) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->created_at?->format('d M Y') }}
                                    </td>
                                @else
                                    <td class="px-6 py-4 font-semibold text-[#5d4936]">
                                        {{ $item->order_number }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $type === 'payments' ? $item->payment_method : $item->order_status }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->payment_status }}
                                    </td>
                                    <td class="px-6 py-4">
                                        ₹{{ number_format($item->total_amount - ($item->discount_amount ?? 0), 2) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->created_at?->format('d M Y') }}
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-[#796a59]">
                                    No report data found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="border-t border-[#e8dccb] p-5">
                {{ $reports->links() }}
            </div>

        </div>
    </div>
</div>

@endsection
