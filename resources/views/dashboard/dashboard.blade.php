@extends('layouts.admin.page')
@section('adminPage')

@php
    $totalRevenue = $totalRevenue ?? 485600;
    $recentOrders = $recentOrders ?? collect();
    $topProducts = $topProducts ?? collect();
    $head = ['Order ID','Customer','Date','Amount','Status'];
@endphp

<div class="min-h-screen bg-[#f4f0ea] text-[#39332d]">
    <div class="mx-auto max-w-[1600px] px-4 py-6 sm:px-6 lg:px-10 lg:py-10">
        <div class="mb-10 flex flex-wrap items-center justify-between gap-5">
            <x-admin.sub-header :arr="[
            'eyebrow' => 'SSSN FASHION / MANAGEMENT',
            'title' => 'Dashboard',
            'subtitle' => 'Welcome back! Here\'s what\'s happening with your store.',]"
            />

            <div class="flex items-center gap-3">
                <div class="hidden rounded-2xl border border-white/80 bg-white/60 px-5 py-3 shadow-sm backdrop-blur-xl sm:block">
                    <p class="text-[9px] font-bold uppercase tracking-[2px] text-[#aa8d6b]">
                        Today
                    </p>
                    <p class="mt-1 text-sm font-semibold">
                        {{ now()->format('d M Y') }}
                    </p>
                </div>

                <button class="flex h-12 w-12 items-center justify-center rounded-2xl border border-white bg-white/70 shadow-lg shadow-[#8f7655]/10 transition hover:-translate-y-1">
                    <span class="text-lg">♙</span>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 xl:grid-cols-4 xl:gap-6">
            <x-admin.view-cards 
            :arr="[
                'title' => 'Products',
                'icon' => '♧',
                'count' => $totalProducts,
                'text' => 'Total products in store',
            ]" />

            <x-admin.view-cards 
            :arr="[
                'title' => 'Categories',
                'icon' => '▦',
                'count' => $totalCategories,
                'text' => 'Total categories',
            ]" />

            <x-admin.view-cards 
            :arr="[
                'title' => 'Orders',
                'icon' => '🛒',
                'count' => $totalOrders,
                'text' => 'Total orders received',
            ]" />
      
            <x-admin.view-cards 
            :arr="[
                'title' => 'Revenue',
                'icon' => '₹',
                'currency' => '₹',
                'count' => $totalRevenue,
                'text' => 'Total store revenue',
            ]" />

        </div>


        {{-- CHART + QUICK ACTIONS --}}
        <div class="mt-8 grid grid-cols-1 gap-6 xl:grid-cols-3">

            {{-- SALES CHART --}}
            <div class="rounded-[28px] border border-white/80 bg-white/65 p-6 shadow-[0_15px_45px_rgba(100,75,45,0.06)] backdrop-blur-2xl xl:col-span-2 sm:p-8">

                <div class="flex flex-wrap items-center justify-between gap-4">

                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-[3px] text-[#aa8d6d]">
                            Performance
                        </p>

                        <h2 class="mt-2 text-xl font-semibold">
                            Sales Overview
                        </h2>
                    </div>

                    <span class="rounded-xl border border-[#e8dfd2] bg-[#f8f5ef] px-4 py-2 text-[10px] font-bold uppercase tracking-wider text-[#927a5c]">
                        Last 7 Months
                    </span>

                </div>

                <div class="mt-8 h-[280px]">
                    <canvas id="salesChart"></canvas>
                </div>

            </div>


            {{-- QUICK ACTIONS --}}
            <div class="rounded-[28px] border border-white/80 bg-white/65 p-6 shadow-[0_15px_45px_rgba(100,75,45,0.06)] backdrop-blur-2xl sm:p-8">

                <p class="text-[10px] font-bold uppercase tracking-[3px] text-[#aa8d6d]">
                    Manage Store
                </p>

                <h2 class="mt-2 text-xl font-semibold">
                    Quick Actions
                </h2>

                <div class="mt-7 space-y-3">

                    <a href="{{ url('/admin/products/create') }}"
                       class="group flex items-center justify-between rounded-2xl border border-[#eae1d5] bg-white/70 p-4 transition duration-300 hover:-translate-y-1 hover:border-[#c8ad89] hover:bg-[#f7f1e8]">

                        <div class="flex items-center gap-3">
                            <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#eee3d3] text-lg">＋</span>

                            <div>
                                <p class="text-sm font-semibold">Add Product</p>
                                <p class="mt-1 text-[10px] text-[#a49a8d]">Create new product</p>
                            </div>
                        </div>

                        <span class="text-[#a58a6d]">→</span>
                    </a>


                    <a href="{{ url('/categories') }}"
                       class="group flex items-center justify-between rounded-2xl border border-[#eae1d5] bg-white/70 p-4 transition duration-300 hover:-translate-y-1 hover:border-[#c8ad89] hover:bg-[#f7f1e8]">

                        <div class="flex items-center gap-3">
                            <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#e7eade] text-lg">◈</span>

                            <div>
                                <p class="text-sm font-semibold">Categories</p>
                                <p class="mt-1 text-[10px] text-[#a49a8d]">Manage categories</p>
                            </div>
                        </div>

                        <span class="text-[#a58a6d]">→</span>
                    </a>


                    <a href="{{ url('/orders') }}"
                       class="group flex items-center justify-between rounded-2xl border border-[#eae1d5] bg-white/70 p-4 transition duration-300 hover:-translate-y-1 hover:border-[#c8ad89] hover:bg-[#f7f1e8]">

                        <div class="flex items-center gap-3">
                            <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#f0e3e1] text-lg">▤</span>

                            <div>
                                <p class="text-sm font-semibold">View Orders</p>
                                <p class="mt-1 text-[10px] text-[#a49a8d]">Manage customer orders</p>
                            </div>
                        </div>

                        <span class="text-[#a58a6d]">→</span>
                    </a>


                    <a href="{{ url('/customers') }}"
                       class="group flex items-center justify-between rounded-2xl border border-[#eae1d5] bg-white/70 p-4 transition duration-300 hover:-translate-y-1 hover:border-[#c8ad89] hover:bg-[#f7f1e8]">

                        <div class="flex items-center gap-3">
                            <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#e5e8ec] text-lg">♙</span>

                            <div>
                                <p class="text-sm font-semibold">Customers</p>
                                <p class="mt-1 text-[10px] text-[#a49a8d]">View your customers</p>
                            </div>
                        </div>

                        <span class="text-[#a58a6d]">→</span>
                    </a>

                </div>

            </div>

        </div>

        {{-- RECENT ORDERS --}}
        <x-admin.admin-table
            eyebrow="Store Activity"
            title="Recent Orders"
            url="/admin/orders"
            :head="$head"
            :body="$recentOrders"
        />
       


        {{-- TOP PRODUCTS --}}
        <div class="mt-8 rounded-[28px] border border-white/80 bg-white/65 p-6 shadow-[0_15px_45px_rgba(100,75,45,0.06)] backdrop-blur-2xl sm:p-8">

            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[10px] font-bold uppercase tracking-[3px] text-[#aa8d6d]">
                        Product Performance
                    </p>

                    <h2 class="mt-2 text-xl font-semibold">
                        Best Selling Products
                    </h2>
                </div>

                <a href="{{ url('/admin/products') }}"
                   class="text-[10px] font-bold uppercase tracking-[2px] text-[#a58a6d]">
                    View All →
                </a>
            </div>


            <div class="mt-7 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">

                @forelse($topProducts as $product)

                    <div class="flex items-center gap-4 rounded-2xl border border-[#eee8df] bg-white/60 p-4 transition duration-300 hover:-translate-y-1 hover:shadow-lg">

                        <div class="h-16 w-14 flex-shrink-0 overflow-hidden rounded-xl bg-[#eee8df]">

                            <img
                                src="{{ $product->images->first()?->image ? asset('storage/'.$product->images->first()->image) : 'https://images.unsplash.com/photo-1490481651871-ab68de25d43d?w=200' }}"
                                alt="{{ $product->name ?? 'Product' }}"
                                class="h-full w-full object-cover"
                                loading="lazy"
                            >

                        </div>

                        <div class="min-w-0">
                            <h3 class="truncate text-sm font-semibold">
                                {{ $product->name ?? $product->title ?? 'Product' }}
                            </h3>

                            <p class="mt-2 text-xs font-bold text-[#a58a6d]">
                                ₹{{ number_format((float) ($product->price ?? 0), 2) }}
                            </p>
                        </div>

                    </div>

                @empty

                    <p class="col-span-full py-8 text-center text-sm text-[#958c81]">
                        Top products will appear here.
                    </p>

                @endforelse

            </div>

        </div>


        {{-- FOOTER --}}
        <div class="mt-10 flex flex-col items-center justify-between gap-3 border-t border-[#e6ddd1] pt-6 text-center sm:flex-row">

            <p class="text-[10px] uppercase tracking-[2px] text-[#a49a8d]">
                © {{ date('Y') }} SSSN Fashion. All rights reserved.
            </p>

            <p class="text-[10px] font-semibold uppercase tracking-[2px] text-[#a58a6d]">
                Designed for Fashion Excellence
            </p>

        </div>

    </div>

</div>


{{-- CHART JS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



@endsection
