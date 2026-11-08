
@extends('layouts.admin.page')
@section('adminPage')

@php
    // Demo fallback data - replace with controller data
    $totalProducts = $totalProducts ?? 248;
    $totalCategories = $totalCategories ?? 18;
    $totalOrders = $totalOrders ?? 1256;
    $totalRevenue = $totalRevenue ?? 485600;

    $recentOrders = $recentOrders ?? collect();
    $topProducts = $topProducts ?? collect();

    $head = ['Order ID','Customer','Date','Amount','Status'];
@endphp

<div class="min-h-screen bg-[#f4f0ea] text-[#39332d]">

    <div class="mx-auto max-w-[1600px] px-4 py-6 sm:px-6 lg:px-10 lg:py-10">

        {{-- HEADER --}}
        <div class="mb-10 flex flex-wrap items-center justify-between gap-5">

            <div>
                <p class="text-[10px] font-bold uppercase tracking-[4px] text-[#aa8d6b]">
                    SSSN FASHION / MANAGEMENT
                </p>

                <h1 class="mt-3 text-3xl font-semibold tracking-tight sm:text-4xl">
                    Dashboard
                </h1>

                <p class="mt-2 text-sm text-[#958c81]">
                    Welcome back! Here's what's happening with your store.
                </p>
            </div>

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


        {{-- STATISTICS --}}
        <div class="grid grid-cols-2 gap-4 xl:grid-cols-4 xl:gap-6">

            {{-- PRODUCTS --}}
            <div class="group relative overflow-hidden rounded-[26px] border border-white/80 bg-white/65 p-5 shadow-[0_15px_45px_rgba(100,75,45,0.06)] backdrop-blur-2xl transition duration-500 hover:-translate-y-2 hover:shadow-[0_25px_55px_rgba(100,75,45,0.13)] sm:p-7">

                <div class="absolute -right-8 -top-8 h-32 w-32 rounded-full bg-[#e7d5bb]/40 blur-2xl transition group-hover:scale-150"></div>

                <div class="relative flex items-center justify-between">
                    <p class="text-[10px] font-bold uppercase tracking-[2px] text-[#938778]">
                        Products
                    </p>

                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#eee3d3] text-xl">
                        ♧
                    </div>
                </div>

                <h2 class="relative mt-6 text-3xl font-semibold tracking-tight">
                    {{ number_format($totalProducts) }}
                </h2>

                <p class="relative mt-2 text-xs text-[#a58a6d]">
                    Total products in store
                </p>

            </div>


            {{-- CATEGORIES --}}
            <div class="group relative overflow-hidden rounded-[26px] border border-white/80 bg-white/65 p-5 shadow-[0_15px_45px_rgba(100,75,45,0.06)] backdrop-blur-2xl transition duration-500 hover:-translate-y-2 hover:shadow-[0_25px_55px_rgba(100,75,45,0.13)] sm:p-7">

                <div class="absolute -right-8 -top-8 h-32 w-32 rounded-full bg-[#d9e0d4]/50 blur-2xl transition group-hover:scale-150"></div>

                <div class="relative flex items-center justify-between">
                    <p class="text-[10px] font-bold uppercase tracking-[2px] text-[#938778]">
                        Categories
                    </p>

                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#e4e9df] text-xl">
                        ◈
                    </div>
                </div>

                <h2 class="relative mt-6 text-3xl font-semibold tracking-tight">
                    {{ number_format($totalCategories) }}
                </h2>

                <p class="relative mt-2 text-xs text-[#a58a6d]">
                    Active product categories
                </p>

            </div>


            {{-- ORDERS --}}
            <div class="group relative overflow-hidden rounded-[26px] border border-white/80 bg-white/65 p-5 shadow-[0_15px_45px_rgba(100,75,45,0.06)] backdrop-blur-2xl transition duration-500 hover:-translate-y-2 hover:shadow-[0_25px_55px_rgba(100,75,45,0.13)] sm:p-7">

                <div class="absolute -right-8 -top-8 h-32 w-32 rounded-full bg-[#ead9d9]/50 blur-2xl transition group-hover:scale-150"></div>

                <div class="relative flex items-center justify-between">
                    <p class="text-[10px] font-bold uppercase tracking-[2px] text-[#938778]">
                        Orders
                    </p>

                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#f0e3e1] text-xl">
                        ♧
                    </div>
                </div>

                <h2 class="relative mt-6 text-3xl font-semibold tracking-tight">
                    {{ number_format($totalOrders) }}
                </h2>

                <p class="relative mt-2 text-xs text-[#a58a6d]">
                    Total customer orders
                </p>

            </div>


            {{-- REVENUE --}}
            <div class="group relative overflow-hidden rounded-[26px] border border-white/80 bg-white/65 p-5 shadow-[0_15px_45px_rgba(100,75,45,0.06)] backdrop-blur-2xl transition duration-500 hover:-translate-y-2 hover:shadow-[0_25px_55px_rgba(100,75,45,0.13)] sm:p-7">

                <div class="absolute -right-8 -top-8 h-32 w-32 rounded-full bg-[#e8d9b9]/50 blur-2xl transition group-hover:scale-150"></div>

                <div class="relative flex items-center justify-between">
                    <p class="text-[10px] font-bold uppercase tracking-[2px] text-[#938778]">
                        Revenue
                    </p>

                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#f0e6d1] text-xl">
                        ₹
                    </div>
                </div>

                <h2 class="relative mt-6 text-3xl font-semibold tracking-tight">
                    ₹{{ number_format($totalRevenue) }}
                </h2>

                <p class="relative mt-2 text-xs text-[#a58a6d]">
                    Total store revenue
                </p>

            </div>

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


                    <a href="{{ url('/admin/categories') }}"
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


                    <a href="{{ url('/admin/orders') }}"
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


                    <a href="{{ url('/admin/customers') }}"
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
