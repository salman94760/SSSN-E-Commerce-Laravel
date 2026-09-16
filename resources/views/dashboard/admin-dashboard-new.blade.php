@include('layouts.admin.header')

<div class="min-h-screen">


    <!-- ========================================================= -->
    <!-- SIDEBAR -->
    <!-- ========================================================= -->

    @include('layouts.admin.sidebar')


    <!-- ========================================================= -->
    <!-- MAIN -->
    <!-- ========================================================= -->

    <main class="lg:pl-64">


        <!-- TOPBAR -->
        @include('layouts.admin.topbar')


        <!-- CONTENT -->
        <div class="p-4 sm:p-6 lg:p-8">

            <div class="mx-auto max-w-7xl">


                <!-- PAGE HEADER -->
                <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">

                    <div>

                        <p class="text-sm font-medium text-slate-500">
                            Overview
                        </p>

                        <h1 class="mt-1 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">
                            Store Dashboard
                        </h1>

                        <p class="mt-2 text-sm text-slate-500">
                            Here's what's happening with your store today.
                        </p>

                    </div>


                    <button
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-slate-800"
                    >

                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-width="2"
                                d="M12 4v16m8-8H4"
                            />
                        </svg>

                        Add Product

                    </button>

                </div>


                <!-- ================================================= -->
                <!-- STATS -->
                <!-- ================================================= -->

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">


                    <!-- Revenue -->
                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                        <div class="flex items-start justify-between">

                            <div>

                                <p class="text-sm font-medium text-slate-500">
                                    Total Revenue
                                </p>

                                <h3 class="mt-2 text-2xl font-bold text-slate-900">
                                    ₹1,24,580
                                </h3>

                            </div>

                            <div class="rounded-xl bg-slate-100 p-3 text-slate-700">

                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-width="2"
                                        d="M12 8c-1.5 0-3 .67-3 2s1.5 2 3 2 3 .67 3 2-1.5 2-3 2m0-10v2m0 8v2m9-4a9 9 0 11-18 0 9 9 0 0118 0z"
                                    />
                                </svg>

                            </div>

                        </div>

                        <div class="mt-4 flex items-center gap-2 text-xs">

                            <span class="font-semibold text-green-600">
                                +12.5%
                            </span>

                            <span class="text-slate-400">
                                from last month
                            </span>

                        </div>

                    </div>


                    <!-- Orders -->
                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                        <div class="flex items-start justify-between">

                            <div>

                                <p class="text-sm font-medium text-slate-500">
                                    Total Orders
                                </p>

                                <h3 class="mt-2 text-2xl font-bold text-slate-900">
                                    1,284
                                </h3>

                            </div>

                            <div class="rounded-xl bg-slate-100 p-3 text-slate-700">

                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-width="2"
                                        d="M3 3h2l2.4 12.2a2 2 0 002 1.6h7.8a2 2 0 002-1.6L21 7H6M10 21h.01M17 21h.01"
                                    />
                                </svg>

                            </div>

                        </div>

                        <div class="mt-4 flex items-center gap-2 text-xs">

                            <span class="font-semibold text-green-600">
                                +8.2%
                            </span>

                            <span class="text-slate-400">
                                from last month
                            </span>

                        </div>

                    </div>


                    <!-- Customers -->
                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                        <div class="flex items-start justify-between">

                            <div>

                                <p class="text-sm font-medium text-slate-500">
                                    Customers
                                </p>

                                <h3 class="mt-2 text-2xl font-bold text-slate-900">
                                    8,642
                                </h3>

                            </div>

                            <div class="rounded-xl bg-slate-100 p-3 text-slate-700">

                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-width="2"
                                        d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m4-8a4 4 0 110 8 4 4 0 000-8z"
                                    />
                                </svg>

                            </div>

                        </div>

                        <div class="mt-4 flex items-center gap-2 text-xs">

                            <span class="font-semibold text-green-600">
                                +5.7%
                            </span>

                            <span class="text-slate-400">
                                from last month
                            </span>

                        </div>

                    </div>


                    <!-- Products -->
                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                        <div class="flex items-start justify-between">

                            <div>

                                <p class="text-sm font-medium text-slate-500">
                                    Products
                                </p>

                                <h3 class="mt-2 text-2xl font-bold text-slate-900">
                                    356
                                </h3>

                            </div>

                            <div class="rounded-xl bg-slate-100 p-3 text-slate-700">

                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-width="2"
                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"
                                    />
                                </svg>

                            </div>

                        </div>

                        <div class="mt-4 flex items-center gap-2 text-xs">

                            <span class="font-semibold text-slate-600">
                                24 added
                            </span>

                            <span class="text-slate-400">
                                this month
                            </span>

                        </div>

                    </div>

                </div>


                <!-- ================================================= -->
                <!-- MAIN GRID -->
                <!-- ================================================= -->

                <div class="mt-6 grid grid-cols-1 gap-6 xl:grid-cols-3">


                    <!-- SALES OVERVIEW -->
                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm xl:col-span-2">

                        <div class="flex items-center justify-between">

                            <div>

                                <h2 class="font-bold text-slate-900">
                                    Sales Overview
                                </h2>

                                <p class="mt-1 text-sm text-slate-500">
                                    Revenue performance
                                </p>

                            </div>

                            <select
                                class="rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm font-medium text-slate-600 outline-none"
                            >
                                <option>Last 7 days</option>
                                <option>Last 30 days</option>
                                <option>Last 3 months</option>
                            </select>

                        </div>


                        <!-- Fake Chart -->
                        <div class="mt-8">

                            <div class="flex h-64 items-end gap-2 sm:gap-4">

                                <div class="flex h-full flex-1 flex-col justify-end">
                                    <div class="rounded-t-lg bg-slate-900" style="height: 42%"></div>
                                </div>

                                <div class="flex h-full flex-1 flex-col justify-end">
                                    <div class="rounded-t-lg bg-slate-800" style="height: 58%"></div>
                                </div>

                                <div class="flex h-full flex-1 flex-col justify-end">
                                    <div class="rounded-t-lg bg-slate-700" style="height: 48%"></div>
                                </div>

                                <div class="flex h-full flex-1 flex-col justify-end">
                                    <div class="rounded-t-lg bg-slate-900" style="height: 72%"></div>
                                </div>

                                <div class="flex h-full flex-1 flex-col justify-end">
                                    <div class="rounded-t-lg bg-slate-800" style="height: 65%"></div>
                                </div>

                                <div class="flex h-full flex-1 flex-col justify-end">
                                    <div class="rounded-t-lg bg-slate-700" style="height: 84%"></div>
                                </div>

                                <div class="flex h-full flex-1 flex-col justify-end">
                                    <div class="rounded-t-lg bg-slate-900" style="height: 95%"></div>
                                </div>

                            </div>


                            <div class="mt-3 grid grid-cols-7 text-center text-xs text-slate-400">

                                <span>Mon</span>
                                <span>Tue</span>
                                <span>Wed</span>
                                <span>Thu</span>
                                <span>Fri</span>
                                <span>Sat</span>
                                <span>Sun</span>

                            </div>

                        </div>

                    </div>


                    <!-- ORDER STATUS -->
                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                        <div>

                            <h2 class="font-bold text-slate-900">
                                Order Status
                            </h2>

                            <p class="mt-1 text-sm text-slate-500">
                                Current order distribution
                            </p>

                        </div>


                        <div class="mt-8 space-y-5">


                            <!-- Pending -->
                            <div>

                                <div class="mb-2 flex items-center justify-between">

                                    <span class="text-sm font-medium text-slate-600">
                                        Pending
                                    </span>

                                    <span class="text-sm font-bold text-slate-900">
                                        18%
                                    </span>

                                </div>

                                <div class="h-2 overflow-hidden rounded-full bg-slate-100">

                                    <div
                                        class="h-full rounded-full bg-yellow-400"
                                        style="width:18%"
                                    ></div>

                                </div>

                            </div>


                            <!-- Processing -->
                            <div>

                                <div class="mb-2 flex items-center justify-between">

                                    <span class="text-sm font-medium text-slate-600">
                                        Processing
                                    </span>

                                    <span class="text-sm font-bold text-slate-900">
                                        26%
                                    </span>

                                </div>

                                <div class="h-2 overflow-hidden rounded-full bg-slate-100">

                                    <div
                                        class="h-full rounded-full bg-blue-500"
                                        style="width:26%"
                                    ></div>

                                </div>

                            </div>


                            <!-- Shipped -->
                            <div>

                                <div class="mb-2 flex items-center justify-between">

                                    <span class="text-sm font-medium text-slate-600">
                                        Shipped
                                    </span>

                                    <span class="text-sm font-bold text-slate-900">
                                        22%
                                    </span>

                                </div>

                                <div class="h-2 overflow-hidden rounded-full bg-slate-100">

                                    <div
                                        class="h-full rounded-full bg-purple-500"
                                        style="width:22%"
                                    ></div>

                                </div>

                            </div>


                            <!-- Delivered -->
                            <div>

                                <div class="mb-2 flex items-center justify-between">

                                    <span class="text-sm font-medium text-slate-600">
                                        Delivered
                                    </span>

                                    <span class="text-sm font-bold text-slate-900">
                                        29%
                                    </span>

                                </div>

                                <div class="h-2 overflow-hidden rounded-full bg-slate-100">

                                    <div
                                        class="h-full rounded-full bg-green-500"
                                        style="width:29%"
                                    ></div>

                                </div>

                            </div>


                            <!-- Cancelled -->
                            <div>

                                <div class="mb-2 flex items-center justify-between">

                                    <span class="text-sm font-medium text-slate-600">
                                        Cancelled
                                    </span>

                                    <span class="text-sm font-bold text-slate-900">
                                        5%
                                    </span>

                                </div>

                                <div class="h-2 overflow-hidden rounded-full bg-slate-100">

                                    <div
                                        class="h-full rounded-full bg-red-500"
                                        style="width:5%"
                                    ></div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- ================================================= -->
                <!-- RECENT ORDERS -->
                <!-- ================================================= -->

                <div class="mt-6 rounded-2xl border border-slate-200 bg-white shadow-sm">

                    <div class="flex flex-col gap-3 border-b border-slate-200 px-5 py-5 sm:flex-row sm:items-center sm:justify-between">

                        <div>

                            <h2 class="font-bold text-slate-900">
                                Recent Orders
                            </h2>

                            <p class="mt-1 text-sm text-slate-500">
                                Latest orders from your customers
                            </p>

                        </div>

                        <a
                            href="#"
                            class="text-sm font-semibold text-slate-900 hover:underline"
                        >
                            View all orders →
                        </a>

                    </div>


                    <div class="overflow-x-auto">

                        <table class="w-full min-w-[850px]">

                            <thead class="bg-slate-50">

                                <tr class="border-b border-slate-200">

                                    <th class="px-5 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Order
                                    </th>

                                    <th class="px-5 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Customer
                                    </th>

                                    <th class="px-5 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Amount
                                    </th>

                                    <th class="px-5 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Payment
                                    </th>

                                    <th class="px-5 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Status
                                    </th>

                                    <th class="px-5 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Date
                                    </th>

                                    <th class="px-5 py-4 text-right text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Action
                                    </th>

                                </tr>

                            </thead>


                            <tbody class="divide-y divide-slate-100">


                                <!-- ORDER 1 -->
                                <tr class="transition hover:bg-slate-50">

                                    <td class="px-5 py-4">

                                        <p class="text-sm font-bold text-slate-900">
                                            ORD-NJVQRJEG
                                        </p>

                                        <p class="mt-1 text-xs text-slate-400">
                                            3 items
                                        </p>

                                    </td>


                                    <td class="px-5 py-4">

                                        <div class="flex items-center gap-3">

                                            <div class="flex h-9 w-9 items-center justify-center rounded-full bg-slate-100 text-xs font-bold text-slate-700">
                                                RK
                                            </div>

                                            <div>

                                                <p class="text-sm font-semibold text-slate-900">
                                                    Rahul Kumar
                                                </p>

                                                <p class="text-xs text-slate-500">
                                                    rahul@example.com
                                                </p>

                                            </div>

                                        </div>

                                    </td>


                                    <td class="px-5 py-4">

                                        <p class="text-sm font-bold text-slate-900">
                                            ₹998.00
                                        </p>

                                    </td>


                                    <td class="px-5 py-4">

                                        <div class="space-y-1">

                                            <p class="text-xs font-medium text-slate-600">
                                                COD
                                            </p>

                                            <span class="inline-flex rounded-full bg-yellow-100 px-2.5 py-1 text-[11px] font-bold text-yellow-700">
                                                Pending
                                            </span>

                                        </div>

                                    </td>


                                    <td class="px-5 py-4">

                                        <span class="inline-flex rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700">
                                            Processing
                                        </span>

                                    </td>


                                    <td class="px-5 py-4 text-sm text-slate-500">
                                        21 Aug 2026
                                    </td>


                                    <td class="px-5 py-4 text-right">

                                        <button
                                            class="rounded-lg border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-100"
                                        >
                                            View
                                        </button>

                                    </td>

                                </tr>


                                <!-- ORDER 2 -->
                                <tr class="transition hover:bg-slate-50">

                                    <td class="px-5 py-4">

                                        <p class="text-sm font-bold text-slate-900">
                                            ORD-ZDC5CNQ5
                                        </p>

                                        <p class="mt-1 text-xs text-slate-400">
                                            2 items
                                        </p>

                                    </td>


                                    <td class="px-5 py-4">

                                        <div class="flex items-center gap-3">

                                            <div class="flex h-9 w-9 items-center justify-center rounded-full bg-slate-100 text-xs font-bold text-slate-700">
                                                AS
                                            </div>

                                            <div>

                                                <p class="text-sm font-semibold text-slate-900">
                                                    Amit Sharma
                                                </p>

                                                <p class="text-xs text-slate-500">
                                                    amit@example.com
                                                </p>

                                            </div>

                                        </div>

                                    </td>


                                    <td class="px-5 py-4">

                                        <p class="text-sm font-bold text-slate-900">
                                            ₹2,349.00
                                        </p>

                                    </td>


                                    <td class="px-5 py-4">

                                        <div class="space-y-1">

                                            <p class="text-xs font-medium text-slate-600">
                                                COD
                                            </p>

                                            <span class="inline-flex rounded-full bg-yellow-100 px-2.5 py-1 text-[11px] font-bold text-yellow-700">
                                                Pending
                                            </span>

                                        </div>

                                    </td>


                                    <td class="px-5 py-4">

                                        <span class="inline-flex rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-700">
                                            Pending
                                        </span>

                                    </td>


                                    <td class="px-5 py-4 text-sm text-slate-500">
                                        23 Aug 2026
                                    </td>


                                    <td class="px-5 py-4 text-right">

                                        <button
                                            class="rounded-lg border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-100"
                                        >
                                            View
                                        </button>

                                    </td>

                                </tr>


                                <!-- ORDER 3 -->
                                <tr class="transition hover:bg-slate-50">

                                    <td class="px-5 py-4">

                                        <p class="text-sm font-bold text-slate-900">
                                            ORD-JI0FZMBS
                                        </p>

                                        <p class="mt-1 text-xs text-slate-400">
                                            4 items
                                        </p>

                                    </td>


                                    <td class="px-5 py-4">

                                        <div class="flex items-center gap-3">

                                            <div class="flex h-9 w-9 items-center justify-center rounded-full bg-slate-100 text-xs font-bold text-slate-700">
                                                PS
                                            </div>

                                            <div>

                                                <p class="text-sm font-semibold text-slate-900">
                                                    Priya Singh
                                                </p>

                                                <p class="text-xs text-slate-500">
                                                    priya@example.com
                                                </p>

                                            </div>

                                        </div>

                                    </td>


                                    <td class="px-5 py-4">

                                        <p class="text-sm font-bold text-slate-900">
                                            ₹3,495.00
                                        </p>

                                    </td>


                                    <td class="px-5 py-4">

                                        <div class="space-y-1">

                                            <p class="text-xs font-medium text-slate-600">
                                                COD
                                            </p>

                                            <span class="inline-flex rounded-full bg-yellow-100 px-2.5 py-1 text-[11px] font-bold text-yellow-700">
                                                Pending
                                            </span>

                                        </div>

                                    </td>


                                    <td class="px-5 py-4">

                                        <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
                                            Cancelled
                                        </span>

                                    </td>


                                    <td class="px-5 py-4 text-sm text-slate-500">
                                        04 Sep 2026
                                    </td>


                                    <td class="px-5 py-4 text-right">

                                        <button
                                            class="rounded-lg border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-100"
                                        >
                                            View
                                        </button>

                                    </td>

                                </tr>


                                <!-- ORDER 4 -->
                                <tr class="transition hover:bg-slate-50">

                                    <td class="px-5 py-4">

                                        <p class="text-sm font-bold text-slate-900">
                                            ORD-PG6PIE5Z
                                        </p>

                                        <p class="mt-1 text-xs text-slate-400">
                                            5 items
                                        </p>

                                    </td>


                                    <td class="px-5 py-4">

                                        <div class="flex items-center gap-3">

                                            <div class="flex h-9 w-9 items-center justify-center rounded-full bg-slate-100 text-xs font-bold text-slate-700">
                                                VK
                                            </div>

                                            <div>

                                                <p class="text-sm font-semibold text-slate-900">
                                                    Vikram Kumar
                                                </p>

                                                <p class="text-xs text-slate-500">
                                                    vikram@example.com
                                                </p>

                                            </div>

                                        </div>

                                    </td>


                                    <td class="px-5 py-4">

                                        <p class="text-sm font-bold text-slate-900">
                                            ₹6,080.00
                                        </p>

                                    </td>


                                    <td class="px-5 py-4">

                                        <div class="space-y-1">

                                            <p class="text-xs font-medium text-slate-600">
                                                COD
                                            </p>

                                            <span class="inline-flex rounded-full bg-green-100 px-2.5 py-1 text-[11px] font-bold text-green-700">
                                                Paid
                                            </span>

                                        </div>

                                    </td>


                                    <td class="px-5 py-4">

                                        <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                            Delivered
                                        </span>

                                    </td>


                                    <td class="px-5 py-4 text-sm text-slate-500">
                                        04 Sep 2026
                                    </td>


                                    <td class="px-5 py-4 text-right">

                                        <button
                                            class="rounded-lg border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-100"
                                        >
                                            View
                                        </button>

                                    </td>

                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>


                <!-- ================================================= -->
                <!-- BOTTOM GRID -->
                <!-- ================================================= -->

                <div class="mt-6 grid grid-cols-1 gap-6 lg:grid-cols-2">


                    <!-- LOW STOCK -->
                    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">

                        <div class="flex items-center justify-between border-b border-slate-200 px-5 py-5">

                            <div>

                                <h2 class="font-bold text-slate-900">
                                    Low Stock Products
                                </h2>

                                <p class="mt-1 text-sm text-slate-500">
                                    Products that need attention
                                </p>

                            </div>

                            <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-bold text-red-700">
                                5 Items
                            </span>

                        </div>


                        <div class="divide-y divide-slate-100">


                            <div class="flex items-center gap-4 p-5">

                                <div class="h-12 w-12 rounded-xl bg-slate-100"></div>

                                <div class="min-w-0 flex-1">

                                    <p class="truncate text-sm font-semibold text-slate-900">
                                        Premium Cotton Shirt
                                    </p>

                                    <p class="mt-1 text-xs text-slate-500">
                                        SKU: SHIRT-001
                                    </p>

                                </div>

                                <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-bold text-red-700">
                                    3 left
                                </span>

                            </div>


                            <div class="flex items-center gap-4 p-5">

                                <div class="h-12 w-12 rounded-xl bg-slate-100"></div>

                                <div class="min-w-0 flex-1">

                                    <p class="truncate text-sm font-semibold text-slate-900">
                                        Classic Sneakers
                                    </p>

                                    <p class="mt-1 text-xs text-slate-500">
                                        SKU: SHOE-024
                                    </p>

                                </div>

                                <span class="rounded-full bg-orange-100 px-3 py-1 text-xs font-bold text-orange-700">
                                    7 left
                                </span>

                            </div>


                            <div class="flex items-center gap-4 p-5">

                                <div class="h-12 w-12 rounded-xl bg-slate-100"></div>

                                <div class="min-w-0 flex-1">

                                    <p class="truncate text-sm font-semibold text-slate-900">
                                        Leather Wallet
                                    </p>

                                    <p class="mt-1 text-xs text-slate-500">
                                        SKU: WALLET-018
                                    </p>

                                </div>

                                <span class="rounded-full bg-yellow-100 px-3 py-1 text-xs font-bold text-yellow-700">
                                    9 left
                                </span>

                            </div>

                        </div>

                    </div>


                    <!-- RECENT ACTIVITY -->
                    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">

                        <div class="border-b border-slate-200 px-5 py-5">

                            <h2 class="font-bold text-slate-900">
                                Recent Activity
                            </h2>

                            <p class="mt-1 text-sm text-slate-500">
                                Latest updates from your store
                            </p>

                        </div>


                        <div class="divide-y divide-slate-100">


                            <div class="flex gap-4 p-5">

                                <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-full bg-green-100 text-green-700">

                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            stroke-width="2"
                                            d="M5 13l4 4L19 7"
                                        />
                                    </svg>

                                </div>

                                <div>

                                    <p class="text-sm font-medium text-slate-900">
                                        Order #ORD-PG6PIE5Z was delivered
                                    </p>

                                    <p class="mt-1 text-xs text-slate-500">
                                        15 minutes ago
                                    </p>

                                </div>

                            </div>


                            <div class="flex gap-4 p-5">

                                <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-full bg-blue-100 text-blue-700">

                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            stroke-width="2"
                                            d="M12 4v16m8-8H4"
                                        />
                                    </svg>

                                </div>

                                <div>

                                    <p class="text-sm font-medium text-slate-900">
                                        New product added
                                    </p>

                                    <p class="mt-1 text-xs text-slate-500">
                                        Classic Sneakers · 1 hour ago
                                    </p>

                                </div>

                            </div>


                            <div class="flex gap-4 p-5">

                                <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-full bg-red-100 text-red-700">

                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"
                                        />
                                    </svg>

                                </div>

                                <div>

                                    <p class="text-sm font-medium text-slate-900">
                                        Order #ORD-JI0FZMBS cancelled
                                    </p>

                                    <p class="mt-1 text-xs text-slate-500">
                                        2 hours ago
                                    </p>

                                </div>

                            </div>


                            <div class="flex gap-4 p-5">

                                <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-full bg-yellow-100 text-yellow-700">

                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            stroke-width="2"
                                            d="M12 9v3m0 4h.01M10.3 4.3L2.9 17a2 2 0 001.7 3h14.8a2 2 0 001.7-3L13.7 4.3a2 2 0 00-3.4 0z"
                                        />
                                    </svg>

                                </div>

                                <div>

                                    <p class="text-sm font-medium text-slate-900">
                                        Low stock alert
                                    </p>

                                    <p class="mt-1 text-xs text-slate-500">
                                        Premium Cotton Shirt · 3 left
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


@include('layouts.admin.footer')