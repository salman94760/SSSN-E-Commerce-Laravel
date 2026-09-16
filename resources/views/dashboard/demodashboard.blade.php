```blade
@extends('layouts.admin.admin')

@section('content')

<div class="min-h-screen bg-slate-50">

    <div class="flex">

        {{-- =========================================================
            SIDEBAR
        ========================================================== --}}
        <aside
            id="sidebar"
            class="fixed inset-y-0 left-0 z-50 flex w-64 -translate-x-full flex-col bg-slate-950 text-white transition-transform duration-300 lg:static lg:translate-x-0"
        >

            {{-- Logo --}}
            <div class="flex h-20 items-center justify-between border-b border-slate-800 px-6">

                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"
                            />
                        </svg>
                    </div>

                    <div>
                        <p class="text-lg font-bold">Store Admin</p>
                        <p class="text-xs text-slate-400">Management Panel</p>
                    </div>

                </a>

            </div>


            {{-- Navigation --}}
            <nav class="flex-1 overflow-y-auto px-4 py-6">

                <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-wider text-slate-500">
                    Main Menu
                </p>


                {{-- Dashboard --}}
                <a
                    href="{{ route('admin.dashboard') }}"
                    class="mb-1 flex items-center gap-3 rounded-xl bg-blue-600 px-4 py-3 text-sm font-semibold text-white shadow-lg shadow-blue-600/20"
                >
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-4 0h4"
                        />
                    </svg>

                    Dashboard
                </a>


                {{-- Company --}}
                <a
                    href="#"
                    class="mb-1 flex items-center justify-between rounded-xl px-4 py-3 text-sm font-medium text-slate-300 transition hover:bg-slate-900 hover:text-white"
                >
                    <span class="flex items-center gap-3">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 21h18M5 21V5a2 2 0 012-2h10a2 2 0 012 2v16M9 7h1m-1 4h1m4-4h1m-1 4h1M9 21v-4h6v4"
                            />
                        </svg>
                        Company
                    </span>

                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>


                {{-- Users --}}
                <a
                    href="#"
                    class="mb-1 flex items-center justify-between rounded-xl px-4 py-3 text-sm font-medium text-slate-300 transition hover:bg-slate-900 hover:text-white"
                >
                    <span class="flex items-center gap-3">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m4-8a4 4 0 110 8 4 4 0 010-8zm5 4a3 3 0 100-6"
                            />
                        </svg>
                        Users
                    </span>

                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>


                {{-- Categories --}}
                <a
                    href="#"
                    class="mb-1 flex items-center justify-between rounded-xl px-4 py-3 text-sm font-medium text-slate-300 transition hover:bg-slate-900 hover:text-white"
                >
                    <span class="flex items-center gap-3">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"
                            />
                        </svg>
                        Categories
                    </span>

                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>


                {{-- Brands --}}
                <a
                    href="#"
                    class="mb-1 flex items-center justify-between rounded-xl px-4 py-3 text-sm font-medium text-slate-300 transition hover:bg-slate-900 hover:text-white"
                >
                    <span class="flex items-center gap-3">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0v10l-8 4-8-4V7m16 0l-8 4m0 0L4 7m8 4v10"
                            />
                        </svg>
                        Brands
                    </span>

                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>


                {{-- Products --}}
                <a
                    href="#"
                    class="mb-1 flex items-center justify-between rounded-xl px-4 py-3 text-sm font-medium text-slate-300 transition hover:bg-slate-900 hover:text-white"
                >
                    <span class="flex items-center gap-3">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0v10l-8 4-8-4V7m16 0l-8 4m0 0L4 7m8 4v10"
                            />
                        </svg>
                        Products
                    </span>

                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>


                {{-- Orders --}}
                <a
                    href="{{ route('admin.orders') }}"
                    class="mb-1 flex items-center justify-between rounded-xl px-4 py-3 text-sm font-medium text-slate-300 transition hover:bg-slate-900 hover:text-white"
                >
                    <span class="flex items-center gap-3">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a3 3 0 006 0M9 5h6"
                            />
                        </svg>
                        Orders
                    </span>

                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>


                {{-- Coupons --}}
                <a
                    href="#"
                    class="mb-1 flex items-center justify-between rounded-xl px-4 py-3 text-sm font-medium text-slate-300 transition hover:bg-slate-900 hover:text-white"
                >
                    <span class="flex items-center gap-3">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 14l6-6m2-4l3 3-3 3m-4 6l-3 3H5v-5l3-3m9-9l-2-2-7 7 2 2 7-7z"
                            />
                        </svg>
                        Coupons
                    </span>

                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>


                {{-- Payments --}}
                <a
                    href="#"
                    class="mb-1 flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-300 transition hover:bg-slate-900 hover:text-white"
                >
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 10h18M7 15h2m2 0h2m-7 4h10a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"
                        />
                    </svg>

                    Payments
                </a>


                {{-- Reviews --}}
                <a
                    href="#"
                    class="mb-1 flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-300 transition hover:bg-slate-900 hover:text-white"
                >
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.912c.969 0 1.371 1.24.588 1.81l-3.974 2.887a1 1 0 00-.364 1.118l1.519 4.674c.3.921-.755 1.688-1.539 1.118l-3.974-2.887a1 1 0 00-1.176 0l-3.974 2.887c-.784.57-1.838-.197-1.539-1.118l1.519-4.674a1 1 0 00-.364-1.118L3.976 10.1c-.783-.57-.38-1.81.588-1.81h4.912a1 1 0 00.95-.69l1.519-4.674z"
                        />
                    </svg>

                    Reviews
                </a>


                {{-- Reports --}}
                <a
                    href="#"
                    class="mb-1 flex items-center justify-between rounded-xl px-4 py-3 text-sm font-medium text-slate-300 transition hover:bg-slate-900 hover:text-white"
                >
                    <span class="flex items-center gap-3">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h10a2 2 0 012 2v10a2 2 0 01-2 2z"
                            />
                        </svg>

                        Reports
                    </span>

                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>

            </nav>


            {{-- Sidebar Bottom --}}
            <div class="border-t border-slate-800 p-4">

                <div class="rounded-xl border border-slate-800 bg-slate-900 p-4">

                    <p class="text-sm font-semibold text-white">
                        Need Help?
                    </p>

                    <p class="mt-1 text-xs text-slate-400">
                        We're here to help you.
                    </p>

                    <button
                        class="mt-4 flex w-full items-center justify-center gap-2 rounded-lg border border-slate-700 px-3 py-2 text-xs font-semibold text-slate-300 transition hover:bg-slate-800"
                    >
                        Contact Support
                    </button>

                </div>

                <p class="mt-5 text-center text-xs text-slate-500">
                    © {{ date('Y') }} Store Admin
                </p>

            </div>

        </aside>


        {{-- =========================================================
            MAIN AREA
        ========================================================== --}}
        <div class="min-w-0 flex-1">


            {{-- =====================================================
                TOP HEADER
            ====================================================== --}}
            <header class="sticky top-0 z-40 border-b border-slate-200 bg-white/95 backdrop-blur">

                <div class="flex h-20 items-center justify-between px-4 sm:px-6 lg:px-8">

                    <div class="flex items-center gap-4">

                        {{-- Mobile Menu --}}
                        <button
                            onclick="toggleSidebar()"
                            class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 lg:hidden"
                        >
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"
                                />
                            </svg>
                        </button>


                        <div>
                            <h1 class="text-xl font-bold text-slate-900">
                                Dashboard
                            </h1>

                            <p class="hidden text-sm text-slate-500 sm:block">
                                Welcome back, Admin
                            </p>
                        </div>

                    </div>


                    <div class="flex items-center gap-3">

                        {{-- Search --}}
                        <div class="relative hidden md:block">

                            <svg
                                class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z"
                                />
                            </svg>

                            <input
                                type="text"
                                placeholder="Search anything..."
                                class="w-64 rounded-xl border border-slate-200 bg-slate-50 py-2.5 pl-10 pr-4 text-sm outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10"
                            >

                        </div>


                        {{-- Notification --}}
                        <button
                            class="relative rounded-xl p-2.5 text-slate-500 transition hover:bg-slate-100 hover:text-slate-900"
                        >

                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                                />
                            </svg>

                            <span class="absolute right-1 top-1 flex h-4 min-w-4 items-center justify-center rounded-full bg-red-500 px-1 text-[9px] font-bold text-white">
                                5
                            </span>

                        </button>


                        {{-- Profile --}}
                        <div class="hidden items-center gap-3 border-l border-slate-200 pl-3 sm:flex">

                            <div class="flex h-9 w-9 items-center justify-center rounded-full bg-blue-100 font-bold text-blue-700">
                                A
                            </div>

                            <div class="leading-tight">

                                <p class="text-sm font-semibold text-slate-900">
                                    Admin
                                </p>

                                <p class="text-xs text-slate-500">
                                    Super Admin
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </header>


            {{-- =====================================================
                CONTENT
            ====================================================== --}}
            <main class="p-4 sm:p-6 lg:p-8">

                <div class="mx-auto max-w-[1600px]">


                    {{-- Flash Messages --}}
                    @if(session('success'))

                        <div class="mb-6 flex items-center gap-3 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-medium text-green-700">

                            <svg class="h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 13l4 4L19 7"
                                />
                            </svg>

                            {{ session('success') }}

                        </div>

                    @endif


                    {{-- =================================================
                        KPI CARDS
                    ================================================== --}}
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-5">


                        {{-- Orders --}}
                        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                            <div class="flex items-start justify-between">

                                <div>

                                    <p class="text-sm font-medium text-slate-500">
                                        Total Orders
                                    </p>

                                    <h2 class="mt-2 text-2xl font-bold text-slate-900">
                                        {{ number_format($totalOrders ?? 1248) }}
                                    </h2>

                                </div>

                                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-50 text-blue-600">

                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            stroke="currentColor"
                                            stroke-width="2"
                                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"
                                        />
                                    </svg>

                                </div>

                            </div>

                            <p class="mt-4 text-xs font-medium text-green-600">
                                ↑ 18.6%
                                <span class="text-slate-400">from last month</span>
                            </p>

                        </div>


                        {{-- Revenue --}}
                        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                            <div class="flex items-start justify-between">

                                <div>

                                    <p class="text-sm font-medium text-slate-500">
                                        Total Revenue
                                    </p>

                                    <h2 class="mt-2 text-2xl font-bold text-slate-900">
                                        ₹{{ number_format($totalRevenue ?? 1248680, 0) }}
                                    </h2>

                                </div>

                                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-green-50 text-green-600">

                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            stroke="currentColor"
                                            stroke-width="2"
                                            d="M12 2v20m6-16.5c0-1.5-2-2.5-6-2.5S6 4 6 5.5 8 8 12 8s6 1 6 2.5S16 13 12 13s-6 1-6 2.5S8 18 12 18s6-1 6-2.5"
                                        />
                                    </svg>

                                </div>

                            </div>

                            <p class="mt-4 text-xs font-medium text-green-600">
                                ↑ 25.4%
                                <span class="text-slate-400">from last month</span>
                            </p>

                        </div>


                        {{-- Customers --}}
                        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                            <div class="flex items-start justify-between">

                                <div>

                                    <p class="text-sm font-medium text-slate-500">
                                        Total Customers
                                    </p>

                                    <h2 class="mt-2 text-2xl font-bold text-slate-900">
                                        {{ number_format($totalCustomers ?? 856) }}
                                    </h2>

                                </div>

                                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-orange-50 text-orange-500">

                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            stroke-width="2"
                                            stroke="currentColor"
                                            d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m4-8a4 4 0 110 8 4 4 0 010-8z"
                                        />
                                    </svg>

                                </div>

                            </div>

                            <p class="mt-4 text-xs font-medium text-green-600">
                                ↑ 12.5%
                                <span class="text-slate-400">from last month</span>
                            </p>

                        </div>


                        {{-- Products --}}
                        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                            <div class="flex items-start justify-between">

                                <div>

                                    <p class="text-sm font-medium text-slate-500">
                                        Total Products
                                    </p>

                                    <h2 class="mt-2 text-2xl font-bold text-slate-900">
                                        {{ number_format($totalProducts ?? 1486) }}
                                    </h2>

                                </div>

                                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-purple-50 text-purple-600">

                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            stroke-width="2"
                                            stroke="currentColor"
                                            d="M20 7l-8-4-8 4m16 0v10l-8 4-8-4V7m16 0l-8 4m0 0L4 7m8 4v10"
                                        />
                                    </svg>

                                </div>

                            </div>

                            <p class="mt-4 text-xs font-medium text-green-600">
                                ↑ 8.2%
                                <span class="text-slate-400">from last month</span>
                            </p>

                        </div>


                        {{-- Reviews --}}
                        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                            <div class="flex items-start justify-between">

                                <div>

                                    <p class="text-sm font-medium text-slate-500">
                                        Total Reviews
                                    </p>

                                    <h2 class="mt-2 text-2xl font-bold text-slate-900">
                                        {{ number_format($totalReviews ?? 2682) }}
                                    </h2>

                                </div>

                                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-red-50 text-red-500">

                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            stroke-width="2"
                                            stroke="currentColor"
                                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.912c.969 0 1.371 1.24.588 1.81l-3.974 2.887a1 1 0 00-.364 1.118l1.519 4.674c.3.921-.755 1.688-1.539 1.118l-3.974-2.887a1 1 0 00-1.176 0l-3.974 2.887c-.784.57-1.838-.197-1.539-1.118l1.519-4.674a1 1 0 00-.364-1.118L3.976 10.1c-.783-.57-.38-1.81.588-1.81h4.912a1 1 0 00.95-.69l1.519-4.674z"
                                        />
                                    </svg>

                                </div>

                            </div>

                            <p class="mt-4 text-xs font-medium text-green-600">
                                ↑ 15.3%
                                <span class="text-slate-400">from last month</span>
                            </p>

                        </div>

                    </div>


                    {{-- =================================================
                        CHARTS + RECENT ORDERS
                    ================================================== --}}
                    <div class="mt-6 grid grid-cols-1 gap-6 xl:grid-cols-12">


                        {{-- Sales Chart --}}
                        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm xl:col-span-5">

                            <div class="flex items-center justify-between">

                                <div>

                                    <h2 class="text-base font-bold text-slate-900">
                                        Sales Overview
                                    </h2>

                                    <div class="mt-3 flex items-center gap-3">

                                        <span class="text-2xl font-bold text-slate-900">
                                            ₹{{ number_format($totalRevenue ?? 1248680, 0) }}
                                        </span>

                                        <span class="rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                                            +25.4%
                                        </span>

                                    </div>

                                </div>

                                <select
                                    class="rounded-lg border border-slate-200 bg-white px-3 py-2 text-xs font-medium text-slate-600 outline-none focus:border-blue-500"
                                >
                                    <option>This Month</option>
                                    <option>Last Month</option>
                                    <option>This Year</option>
                                </select>

                            </div>

                            <div class="mt-6 h-64">
                                <canvas id="salesChart"></canvas>
                            </div>

                        </div>


                        {{-- Order Status --}}
                        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm xl:col-span-3">

                            <div class="flex items-center justify-between">

                                <h2 class="text-base font-bold text-slate-900">
                                    Order Status
                                </h2>

                                <select class="rounded-lg border border-slate-200 px-2 py-1.5 text-xs text-slate-600">
                                    <option>This Month</option>
                                    <option>Last Month</option>
                                </select>

                            </div>

                            <div class="relative mx-auto mt-8 h-48 w-48">

                                <canvas id="orderStatusChart"></canvas>

                                <div class="absolute inset-0 flex flex-col items-center justify-center">

                                    <span class="text-2xl font-bold text-slate-900">
                                        {{ number_format($totalOrders ?? 1248) }}
                                    </span>

                                    <span class="text-xs text-slate-500">
                                        Total Orders
                                    </span>

                                </div>

                            </div>


                            <div class="mt-5 space-y-3">

                                @php
                                    $statusData = [
                                        ['name' => 'Pending', 'count' => $pendingOrders ?? 320, 'color' => 'bg-yellow-400'],
                                        ['name' => 'Processing', 'count' => $processingOrders ?? 420, 'color' => 'bg-blue-500'],
                                        ['name' => 'Shipped', 'count' => $shippedOrders ?? 248, 'color' => 'bg-purple-500'],
                                        ['name' => 'Delivered', 'count' => $deliveredOrders ?? 198, 'color' => 'bg-green-500'],
                                        ['name' => 'Cancelled', 'count' => $cancelledOrders ?? 62, 'color' => 'bg-red-500'],
                                    ];
                                @endphp

                                @foreach($statusData as $status)

                                    <div class="flex items-center justify-between text-xs">

                                        <div class="flex items-center gap-2">

                                            <span class="h-2.5 w-2.5 rounded-full {{ $status['color'] }}"></span>

                                            <span class="text-slate-600">
                                                {{ $status['name'] }}
                                            </span>

                                        </div>

                                        <span class="font-semibold text-slate-900">
                                            {{ $status['count'] }}
                                        </span>

                                    </div>

                                @endforeach

                            </div>

                        </div>


                        {{-- Recent Orders --}}
                        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm xl:col-span-4">

                            <div class="flex items-center justify-between">

                                <h2 class="text-base font-bold text-slate-900">
                                    Recent Orders
                                </h2>

                                <a
                                    href="{{ route('admin.orders') }}"
                                    class="text-xs font-semibold text-blue-600 hover:text-blue-700"
                                >
                                    View All
                                </a>

                            </div>


                            <div class="mt-5 divide-y divide-slate-100">

                                @forelse(($recentOrders ?? []) as $order)

                                    <div class="flex items-center gap-3 py-3 first:pt-0 last:pb-0">

                                        <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-slate-100 text-slate-500">

                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    stroke-width="2"
                                                    stroke="currentColor"
                                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"
                                                />
                                            </svg>

                                        </div>


                                        <div class="min-w-0 flex-1">

                                            <p class="truncate text-xs font-bold text-slate-900">
                                                {{ $order->order_number }}
                                            </p>

                                            <p class="mt-0.5 text-[11px] text-slate-400">
                                                {{ $order->created_at->format('d M Y') }}
                                            </p>

                                        </div>


                                        <div class="text-right">

                                            <p class="text-xs font-bold text-slate-900">
                                                ₹{{ number_format($order->total_amount, 2) }}
                                            </p>

                                            @php
                                                $badge = match($order->order_status) {
                                                    'Pending' => 'bg-yellow-50 text-yellow-700',
                                                    'Processing' => 'bg-blue-50 text-blue-700',
                                                    'Shipped' => 'bg-purple-50 text-purple-700',
                                                    'Delivered' => 'bg-green-50 text-green-700',
                                                    'Cancelled' => 'bg-red-50 text-red-700',
                                                    default => 'bg-slate-100 text-slate-600',
                                                };
                                            @endphp

                                            <span class="mt-1 inline-flex rounded-full px-2 py-1 text-[10px] font-semibold {{ $badge }}">
                                                {{ $order->order_status }}
                                            </span>

                                        </div>

                                    </div>

                                @empty

                                    @foreach([
                                        ['number' => 'ORD-NJVQRJEG', 'amount' => '998.00', 'status' => 'Processing'],
                                        ['number' => 'ORD-ZDC5CNQ5', 'amount' => '2,349.00', 'status' => 'Pending'],
                                        ['number' => 'ORD-JIOFZMBS', 'amount' => '3,495.00', 'status' => 'Cancelled'],
                                        ['number' => 'ORD-PG6PIE5Z', 'amount' => '6,080.00', 'status' => 'Delivered'],
                                    ] as $recent)

                                        <div class="flex items-center gap-3 border-b border-slate-100 py-3 last:border-0">

                                            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-slate-100 text-slate-500">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        stroke-width="2"
                                                        stroke="currentColor"
                                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"
                                                    />
                                                </svg>
                                            </div>

                                            <div class="min-w-0 flex-1">

                                                <p class="text-xs font-bold text-slate-900">
                                                    {{ $recent['number'] }}
                                                </p>

                                                <p class="text-[11px] text-slate-400">
                                                    Recent order
                                                </p>

                                            </div>

                                            <div class="text-right">

                                                <p class="text-xs font-bold text-slate-900">
                                                    ₹{{ $recent['amount'] }}
                                                </p>

                                                @php
                                                    $recentBadge = match($recent['status']) {
                                                        'Pending' => 'bg-yellow-50 text-yellow-700',
                                                        'Processing' => 'bg-blue-50 text-blue-700',
                                                        'Shipped' => 'bg-purple-50 text-purple-700',
                                                        'Delivered' => 'bg-green-50 text-green-700',
                                                        'Cancelled' => 'bg-red-50 text-red-700',
                                                        default => 'bg-slate-100 text-slate-600',
                                                    };
                                                @endphp

                                                <span class="mt-1 inline-flex rounded-full px-2 py-1 text-[10px] font-semibold {{ $recentBadge }}">
                                                    {{ $recent['status'] }}
                                                </span>

                                            </div>

                                        </div>

                                    @endforeach

                                @endforelse

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                        PRODUCTS + REVENUE
                    ================================================== --}}
                    <div class="mt-6 grid grid-cols-1 gap-6 xl:grid-cols-12">


                        {{-- Best Selling Products --}}
                        <div class="rounded-2xl border border-slate-200 bg-white shadow-sm xl:col-span-8">

                            <div class="flex items-center justify-between border-b border-slate-100 px-5 py-4">

                                <div>

                                    <h2 class="text-base font-bold text-slate-900">
                                        Best Selling Products
                                    </h2>

                                    <p class="mt-1 text-xs text-slate-500">
                                        Your top performing products
                                    </p>

                                </div>

                                <a
                                    href="#"
                                    class="text-xs font-semibold text-blue-600 hover:text-blue-700"
                                >
                                    View All
                                </a>

                            </div>


                            <div class="overflow-x-auto">

                                <table class="w-full min-w-[650px]">

                                    <thead>

                                        <tr class="border-b border-slate-100 bg-slate-50/70">

                                            <th class="px-5 py-3 text-left text-[11px] font-semibold uppercase tracking-wider text-slate-500">
                                                Product
                                            </th>

                                            <th class="px-5 py-3 text-left text-[11px] font-semibold uppercase tracking-wider text-slate-500">
                                                Sold
                                            </th>

                                            <th class="px-5 py-3 text-left text-[11px] font-semibold uppercase tracking-wider text-slate-500">
                                                Revenue
                                            </th>

                                            <th class="px-5 py-3 text-left text-[11px] font-semibold uppercase tracking-wider text-slate-500">
                                                Stock
                                            </th>

                                            <th class="px-5 py-3 text-left text-[11px] font-semibold uppercase tracking-wider text-slate-500">
                                                Status
                                            </th>

                                        </tr>

                                    </thead>


                                    <tbody class="divide-y divide-slate-100">

                                        @forelse(($bestSellingProducts ?? []) as $product)

                                            <tr class="transition hover:bg-slate-50">

                                                <td class="px-5 py-4">

                                                    <div class="flex items-center gap-3">

                                                        <div class="h-11 w-11 overflow-hidden rounded-lg border border-slate-200 bg-slate-50">

                                                            @if($product->image)

                                                                <img
                                                                    src="{{ asset('storage/' . $product->image) }}"
                                                                    alt="{{ $product->name }}"
                                                                    class="h-full w-full object-cover"
                                                                >

                                                            @else

                                                                <div class="flex h-full items-center justify-center text-slate-400">
                                                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                        <path
                                                                            stroke-width="2"
                                                                            d="M4 16l4.586-4.586a2 2 0 016.828 0L20 16m-2-2l1.586-1.586a2 2 0 011.414-.586H20M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                                                        />
                                                                    </svg>
                                                                </div>

                                                            @endif

                                                        </div>


                                                        <div>

                                                            <p class="text-sm font-semibold text-slate-900">
                                                                {{ $product->name }}
                                                            </p>

                                                            <p class="mt-0.5 text-xs text-slate-500">
                                                                {{ $product->category->name ?? 'Product' }}
                                                            </p>

                                                        </div>

                                                    </div>

                                                </td>


                                                <td class="px-5 py-4 text-sm font-medium text-slate-700">
                                                    {{ $product->sold_quantity ?? 0 }}
                                                </td>


                                                <td class="px-5 py-4 text-sm font-semibold text-slate-900">
                                                    ₹{{ number_format($product->revenue ?? 0, 0) }}
                                                </td>


                                                <td class="px-5 py-4">

                                                    <span class="text-sm font-semibold {{ ($product->stock ?? 0) <= 20 ? 'text-orange-500' : 'text-green-600' }}">
                                                        {{ $product->stock ?? 0 }}
                                                    </span>

                                                </td>


                                                <td class="px-5 py-4">

                                                    @if(($product->stock ?? 0) <= 20)

                                                        <span class="inline-flex rounded-full bg-orange-50 px-2.5 py-1 text-[10px] font-semibold text-orange-600">
                                                            Low Stock
                                                        </span>

                                                    @else

                                                        <span class="inline-flex rounded-full bg-green-50 px-2.5 py-1 text-[10px] font-semibold text-green-600">
                                                            In Stock
                                                        </span>

                                                    @endif

                                                </td>

                                            </tr>

                                        @empty

                                            @foreach([
                                                ['name' => 'Nike Air Max 270', 'category' => 'Sneakers', 'sold' => 342, 'revenue' => 171000, 'stock' => 28],
                                                ['name' => 'Fossil Gen 6 Smartwatch', 'category' => 'Smartwatch', 'sold' => 289, 'revenue' => 202300, 'stock' => 15],
                                                ['name' => 'boAt Rockerz 450', 'category' => 'Headphones', 'sold' => 256, 'revenue' => 76800, 'stock' => 45],
                                                ['name' => 'Wildcraft Backpack', 'category' => 'Bags', 'sold' => 198, 'revenue' => 49500, 'stock' => 32],
                                                ['name' => 'Ray-Ban Sunglasses', 'category' => 'Sunglasses', 'sold' => 165, 'revenue' => 82500, 'stock' => 22],
                                            ] as $product)

                                                <tr class="transition hover:bg-slate-50">

                                                    <td class="px-5 py-4">

                                                        <div class="flex items-center gap-3">

                                                            <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-slate-100 text-slate-400">

                                                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path
                                                                        stroke-width="2"
                                                                        d="M20 7l-8-4-8 4m16 0v10l-8 4-8-4V7m16 0l-8 4m0 0L4 7m8 4v10"
                                                                    />
                                                                </svg>

                                                            </div>

                                                            <div>

                                                                <p class="text-sm font-semibold text-slate-900">
                                                                    {{ $product['name'] }}
                                                                </p>

                                                                <p class="text-xs text-slate-500">
                                                                    {{ $product['category'] }}
                                                                </p>

                                                            </div>

                                                        </div>

                                                    </td>

                                                    <td class="px-5 py-4 text-sm font-medium text-slate-700">
                                                        {{ $product['sold'] }}
                                                    </td>

                                                    <td class="px-5 py-4 text-sm font-semibold text-slate-900">
                                                        ₹{{ number_format($product['revenue']) }}
                                                    </td>

                                                    <td class="px-5 py-4">

                                                        <span class="text-sm font-semibold {{ $product['stock'] <= 20 ? 'text-orange-500' : 'text-green-600' }}">
                                                            {{ $product['stock'] }}
                                                        </span>

                                                    </td>

                                                    <td class="px-5 py-4">

                                                        @if($product['stock'] <= 20)

                                                            <span class="inline-flex rounded-full bg-orange-50 px-2.5 py-1 text-[10px] font-semibold text-orange-600">
                                                                Low Stock
                                                            </span>

                                                        @else

                                                            <span class="inline-flex rounded-full bg-green-50 px-2.5 py-1 text-[10px] font-semibold text-green-600">
                                                                In Stock
                                                            </span>

                                                        @endif

                                                    </td>

                                                </tr>

                                            @endforeach

                                        @endforelse

                                    </tbody>

                                </table>

                            </div>

                        </div>


                        {{-- Revenue + Customers --}}
                        <div class="space-y-6 xl:col-span-4">


                            {{-- Revenue Overview --}}
                            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                                <div class="flex items-center justify-between">

                                    <h2 class="text-base font-bold text-slate-900">
                                        Revenue Overview
                                    </h2>

                                    <select class="rounded-lg border border-slate-200 px-2 py-1.5 text-xs text-slate-600">
                                        <option>This Month</option>
                                        <option>Last Month</option>
                                    </select>

                                </div>


                                <p class="mt-6 text-xs text-slate-500">
                                    This Month
                                </p>

                                <div class="mt-1 flex items-center gap-3">

                                    <h3 class="text-2xl font-bold text-slate-900">
                                        ₹{{ number_format($totalRevenue ?? 1248680, 0) }}
                                    </h3>

                                    <span class="text-xs font-semibold text-green-600">
                                        +25.4%
                                    </span>

                                </div>


                                <div class="mt-6 grid grid-cols-2 gap-4 border-t border-slate-100 pt-5">

                                    <div>

                                        <p class="text-xs text-slate-500">
                                            Last Month
                                        </p>

                                        <p class="mt-1 text-sm font-bold text-slate-900">
                                            ₹9,61,200
                                        </p>

                                    </div>

                                    <div>

                                        <p class="text-xs text-slate-500">
                                            Last Year
                                        </p>

                                        <p class="mt-1 text-sm font-bold text-slate-900">
                                            ₹8,45,230
                                        </p>

                                    </div>

                                </div>

                            </div>


                            {{-- Top Customers --}}
                            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                                <div class="flex items-center justify-between">

                                    <h2 class="text-base font-bold text-slate-900">
                                        Top Customers
                                    </h2>

                                    <a
                                        href="#"
                                        class="text-xs font-semibold text-blue-600"
                                    >
                                        View All
                                    </a>

                                </div>


                                <div class="mt-5 divide-y divide-slate-100">

                                    @forelse(($topCustomers ?? []) as $index => $customer)

                                        <div class="flex items-center gap-3 py-3 first:pt-0 last:pb-0">

                                            <div class="flex h-8 w-8 items-center justify-center rounded-full bg-slate-100 text-xs font-bold text-slate-600">
                                                {{ $index + 1 }}
                                            </div>

                                            <div class="min-w-0 flex-1">

                                                <p class="truncate text-sm font-semibold text-slate-900">
                                                    {{ $customer->name }}
                                                </p>

                                            </div>

                                            <p class="text-sm font-bold text-slate-900">
                                                ₹{{ number_format($customer->total_spent ?? 0, 0) }}
                                            </p>

                                        </div>

                                    @empty

                                        @foreach([
                                            ['name' => 'Rohit Sharma', 'spent' => 45680],
                                            ['name' => 'Priya Patel', 'spent' => 32450],
                                            ['name' => 'Amit Kumar', 'spent' => 25780],
                                        ] as $index => $customer)

                                            <div class="flex items-center gap-3 py-3 first:pt-0 last:pb-0">

                                                <div class="flex h-8 w-8 items-center justify-center rounded-full bg-slate-100 text-xs font-bold text-slate-600">
                                                    {{ $index + 1 }}
                                                </div>

                                                <div class="min-w-0 flex-1">

                                                    <p class="truncate text-sm font-semibold text-slate-900">
                                                        {{ $customer['name'] }}
                                                    </p>

                                                </div>

                                                <p class="text-sm font-bold text-slate-900">
                                                    ₹{{ number_format($customer['spent']) }}
                                                </p>

                                            </div>

                                        @endforeach

                                    @endforelse

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </main>

        </div>

    </div>

</div>


{{-- =============================================================
    CHART.JS
============================================================= --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

    /* ============================================================
       MOBILE SIDEBAR
    ============================================================ */

    function toggleSidebar()
    {
        const sidebar = document.getElementById('sidebar');

        sidebar.classList.toggle('-translate-x-full');
    }


    /* ============================================================
       SALES CHART
    ============================================================ */

    const salesCanvas = document.getElementById('salesChart');

    if (salesCanvas) {

        new Chart(salesCanvas, {

            type: 'line',

            data: {

                labels: [
                    '1 May',
                    '6 May',
                    '11 May',
                    '16 May',
                    '21 May',
                    '26 May',
                    '31 May'
                ],

                datasets: [{

                    label: 'Revenue',

                    data: [
                        52000,
                        110000,
                        145000,
                        120000,
                        184347,
                        105000,
                        175000
                    ],

                    borderWidth: 2,

                    tension: 0.4,

                    fill: true,

                    pointRadius: 0,

                    pointHoverRadius: 5

                }]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                plugins: {

                    legend: {
                        display: false
                    }

                },

                scales: {

                    x: {

                        grid: {
                            display: false
                        },

                        ticks: {
                            color: '#94a3b8',
                            font: {
                                size: 10
                            }
                        }

                    },

                    y: {

                        beginAtZero: true,

                        grid: {
                            color: '#f1f5f9'
                        },

                        ticks: {

                            color: '#94a3b8',

                            font: {
                                size: 10
                            },

                            callback: function(value) {

                                if (value >= 100000) {
                                    return '₹' + (value / 100000).toFixed(1) + 'L';
                                }

                                return '₹' + (value / 1000) + 'K';
                            }

                        }

                    }

                }

            }

        });

    }


    /* ============================================================
       ORDER STATUS DONUT
    ============================================================ */

    const orderStatusCanvas = document.getElementById('orderStatusChart');

    if (orderStatusCanvas) {

        new Chart(orderStatusCanvas, {

            type: 'doughnut',

            data: {

                labels: [
                    'Pending',
                    'Processing',
                    'Shipped',
                    'Delivered',
                    'Cancelled'
                ],

                datasets: [{

                    data: [
                        {{ $pendingOrders ?? 320 }},
                        {{ $processingOrders ?? 420 }},
                        {{ $shippedOrders ?? 248 }},
                        {{ $deliveredOrders ?? 198 }},
                        {{ $cancelledOrders ?? 62 }}
                    ],

                    borderWidth: 0

                }]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                cutout: '72%',

                plugins: {

                    legend: {
                        display: false
                    }

                }

            }

        });

    }

</script>

@endsection
```
