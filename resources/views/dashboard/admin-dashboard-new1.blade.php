<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Inter Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-900">

<div class="min-h-screen">

    <!-- ========================================================= -->
    <!-- TOP NAVBAR -->
    <!-- ========================================================= -->

    <header class="fixed left-0 right-0 top-0 z-50 h-[72px] border-b border-slate-800 bg-[#020617]">

        <div class="flex h-full items-center justify-between px-5 lg:px-8">

            <!-- Logo -->
            <div class="flex items-center gap-3">

                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white text-lg font-extrabold text-slate-900">
                    A
                </div>

                <div>
                    <h1 class="text-lg font-bold tracking-tight text-white">
                        Admin Dashboard
                    </h1>

                    <p class="hidden text-xs text-slate-400 sm:block">
                        Ecommerce Management
                    </p>
                </div>

            </div>


            <!-- Right -->
            <div class="flex items-center gap-3">

                <div class="hidden text-right sm:block">
                    <p class="text-sm font-semibold text-white">
                        Admin
                    </p>

                    <p class="text-xs text-slate-400">
                        Administrator
                    </p>
                </div>


                <button
                    class="hidden rounded-xl border border-slate-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-slate-800 md:block"
                >
                    Profile
                </button>


                <button
                    class="rounded-xl bg-red-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-red-700"
                >
                    Sign Out
                </button>

            </div>

        </div>

    </header>


    <!-- ========================================================= -->
    <!-- SIDEBAR -->
    <!-- ========================================================= -->

    <aside
        class="fixed bottom-0 left-0 top-[72px] hidden w-[250px] overflow-y-auto border-r border-slate-200 bg-white lg:block"
    >

        <div class="p-5">

            <!-- Dashboard -->
            <a
                href="#"
                class="mb-2 flex items-center gap-3 rounded-xl bg-slate-100 px-4 py-3 text-sm font-bold text-slate-900"
            >

                <svg
                    class="h-5 w-5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M3 12l9-9 9 9M5 10v10h5v-6h4v6h5V10"
                    />
                </svg>

                Dashboard

            </a>


            <!-- Section -->
            <p class="mb-2 mt-6 px-4 text-[11px] font-bold uppercase tracking-wider text-slate-400">
                Management
            </p>


            <!-- Company -->
            <a
                href="#"
                class="sidebar-link"
            >
                Company
            </a>


            <!-- Users -->
            <a
                href="#"
                class="sidebar-link flex items-center justify-between"
            >
                <span>Users</span>

                <svg
                    class="h-4 w-4 text-slate-400"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 9l-7 7-7-7"
                    />
                </svg>
            </a>


            <!-- Categories -->
            <a
                href="#"
                class="sidebar-link flex items-center justify-between"
            >
                <span>Categories</span>

                <svg
                    class="h-4 w-4 text-slate-400"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 9l-7 7-7-7"
                    />
                </svg>
            </a>


            <!-- Brands -->
            <a
                href="#"
                class="sidebar-link flex items-center justify-between"
            >
                <span>Brands</span>

                <svg
                    class="h-4 w-4 text-slate-400"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 9l-7 7-7-7"
                    />
                </svg>
            </a>


            <!-- Colors -->
            <a
                href="#"
                class="sidebar-link flex items-center justify-between"
            >
                <span>Colors</span>

                <svg
                    class="h-4 w-4 text-slate-400"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 9l-7 7-7-7"
                    />
                </svg>
            </a>


            <!-- Sizes -->
            <a
                href="#"
                class="sidebar-link flex items-center justify-between"
            >
                <span>Sizes</span>

                <svg
                    class="h-4 w-4 text-slate-400"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 9l-7 7-7-7"
                    />
                </svg>
            </a>


            <!-- Tags -->
            <a
                href="#"
                class="sidebar-link flex items-center justify-between"
            >
                <span>Tags</span>

                <svg
                    class="h-4 w-4 text-slate-400"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 9l-7 7-7-7"
                    />
                </svg>
            </a>


            <!-- Products -->
            <a
                href="#"
                class="sidebar-link flex items-center justify-between"
            >
                <span>Products</span>

                <svg
                    class="h-4 w-4 text-slate-400"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 9l-7 7-7-7"
                    />
                </svg>
            </a>


            <!-- Orders -->
            <a
                href="#"
                class="sidebar-link"
            >
                Orders
            </a>


            <!-- Coupons -->
            <a
                href="#"
                class="sidebar-link"
            >
                Coupons
            </a>


            <!-- Payments -->
            <a
                href="#"
                class="sidebar-link"
            >
                Payments
            </a>


            <!-- Reviews -->
            <a
                href="#"
                class="sidebar-link"
            >
                Reviews
            </a>


            <!-- Reports -->
            <p class="mb-2 mt-6 px-4 text-[11px] font-bold uppercase tracking-wider text-slate-400">
                Analytics
            </p>

            <a
                href="#report"
                class="sidebar-link"
            >
                Reports
            </a>

        </div>

    </aside>


    <!-- ========================================================= -->
    <!-- MAIN CONTENT -->
    <!-- ========================================================= -->

    <main class="pt-[72px] lg:pl-[250px]">

        <div class="p-4 sm:p-6 lg:p-8">

            <div class="mx-auto max-w-7xl">


                <!-- ================================================= -->
                <!-- BREADCRUMB -->
                <!-- ================================================= -->

                <div class="mb-6">

                    <p class="text-sm font-medium text-slate-400">
                        Dashboard
                        <span class="mx-2">/</span>
                        Management
                        <span class="mx-2">/</span>
                        Products
                    </p>

                </div>


                <!-- ================================================= -->
                <!-- TABLE PAGE HEADER -->
                <!-- ================================================= -->

                <div class="mb-6 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">

                    <div>

                        <h1 class="text-2xl font-extrabold tracking-tight text-slate-900">
                            Products
                        </h1>

                        <p class="mt-1 text-sm text-slate-500">
                            Manage your products, inventory and product information.
                        </p>

                    </div>


                    <button
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-slate-900 px-5 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-slate-700"
                    >

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 4v16m8-8H4"
                            />
                        </svg>

                        Add Product

                    </button>

                </div>


                <!-- ================================================= -->
                <!-- STAT CARDS -->
                <!-- ================================================= -->

                <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">


                    <!-- Card -->
                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                        <div class="flex items-center justify-between">

                            <div>
                                <p class="text-sm font-medium text-slate-500">
                                    Total Products
                                </p>

                                <p class="mt-2 text-2xl font-extrabold text-slate-900">
                                    248
                                </p>
                            </div>

                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-slate-100">

                                <svg
                                    class="h-5 w-5 text-slate-700"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-width="1.8"
                                        d="M20 7l-8-4-8 4m16 0v10l-8 4-8-4V7m16 0l-8 4m0 0L4 7m8 4v10"
                                    />
                                </svg>

                            </div>

                        </div>

                    </div>


                    <!-- Card -->
                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-sm font-medium text-slate-500">
                                    Active Products
                                </p>

                                <p class="mt-2 text-2xl font-extrabold text-green-600">
                                    221
                                </p>

                            </div>

                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-green-50">

                                <span class="h-3 w-3 rounded-full bg-green-500"></span>

                            </div>

                        </div>

                    </div>


                    <!-- Card -->
                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-sm font-medium text-slate-500">
                                    Out of Stock
                                </p>

                                <p class="mt-2 text-2xl font-extrabold text-red-600">
                                    12
                                </p>

                            </div>

                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-red-50">

                                <span class="h-3 w-3 rounded-full bg-red-500"></span>

                            </div>

                        </div>

                    </div>


                    <!-- Card -->
                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-sm font-medium text-slate-500">
                                    Low Stock
                                </p>

                                <p class="mt-2 text-2xl font-extrabold text-yellow-600">
                                    15
                                </p>

                            </div>

                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-yellow-50">

                                <span class="h-3 w-3 rounded-full bg-yellow-500"></span>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- ================================================= -->
                <!-- TABLE -->
                <!-- ================================================= -->

                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                    <!-- Table Toolbar -->
                    <div class="border-b border-slate-200 p-5">

                        <div class="flex flex-col gap-4 xl:flex-row xl:items-center xl:justify-between">


                            <!-- Search -->
                            <div class="relative w-full xl:max-w-md">

                                <svg
                                    class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-width="1.8"
                                        d="m21 21-4.35-4.35m2.35-5.65a8 8 0 1 1-16 0 8 8 0 0 1 16 0Z"
                                    />
                                </svg>

                                <input
                                    type="text"
                                    placeholder="Search products..."
                                    class="w-full rounded-xl border border-slate-300 bg-white py-3 pl-10 pr-4 text-sm outline-none transition placeholder:text-slate-400 focus:border-slate-900 focus:ring-4 focus:ring-slate-900/5"
                                >

                            </div>


                            <!-- Filters -->
                            <div class="flex flex-wrap gap-3">

                                <select
                                    class="rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm font-medium text-slate-700 outline-none focus:border-slate-900"
                                >
                                    <option>All Categories</option>
                                    <option>Men</option>
                                    <option>Women</option>
                                    <option>Kids</option>
                                </select>


                                <select
                                    class="rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm font-medium text-slate-700 outline-none focus:border-slate-900"
                                >
                                    <option>All Status</option>
                                    <option>Active</option>
                                    <option>Inactive</option>
                                </select>


                                <button
                                    class="rounded-xl border border-slate-300 px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50"
                                >
                                    Export
                                </button>

                            </div>

                        </div>

                    </div>


                    <!-- Table -->
                    <div class="overflow-x-auto">

                        <table class="w-full min-w-[900px] text-left">

                            <thead class="bg-slate-50">

                                <tr class="border-b border-slate-200">

                                    <th class="px-5 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Product
                                    </th>

                                    <th class="px-5 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Category
                                    </th>

                                    <th class="px-5 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Price
                                    </th>

                                    <th class="px-5 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Stock
                                    </th>

                                    <th class="px-5 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Status
                                    </th>

                                    <th class="px-5 py-4 text-right text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Action
                                    </th>

                                </tr>

                            </thead>


                            <tbody class="divide-y divide-slate-100">


                                <!-- ROW 1 -->
                                <tr class="transition hover:bg-slate-50">

                                    <td class="px-5 py-4">

                                        <div class="flex items-center gap-3">

                                            <div class="h-12 w-12 overflow-hidden rounded-xl bg-slate-100">

                                                <img
                                                    src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=100"
                                                    class="h-full w-full object-cover"
                                                    alt=""
                                                >

                                            </div>

                                            <div>

                                                <p class="text-sm font-bold text-slate-900">
                                                    Classic Cotton T-Shirt
                                                </p>

                                                <p class="mt-1 text-xs text-slate-500">
                                                    SKU-10001
                                                </p>

                                            </div>

                                        </div>

                                    </td>


                                    <td class="px-5 py-4 text-sm text-slate-600">
                                        Men
                                    </td>


                                    <td class="px-5 py-4 text-sm font-bold text-slate-900">
                                        ₹999.00
                                    </td>


                                    <td class="px-5 py-4">

                                        <span class="text-sm font-semibold text-slate-700">
                                            48
                                        </span>

                                    </td>


                                    <td class="px-5 py-4">

                                        <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-bold text-green-700">
                                            Active
                                        </span>

                                    </td>


                                    <td class="px-5 py-4">

                                        <div class="flex justify-end gap-2">

                                            <!-- View -->
                                            <button
                                                title="View"
                                                class="flex h-9 w-9 items-center justify-center rounded-lg border border-slate-200 text-slate-500 hover:bg-slate-100 hover:text-slate-900"
                                            >
                                                👁
                                            </button>


                                            <!-- Edit -->
                                            <button
                                                title="Edit"
                                                class="flex h-9 w-9 items-center justify-center rounded-lg border border-blue-200 text-blue-600 hover:bg-blue-50"
                                            >
                                                ✎
                                            </button>


                                            <!-- Delete -->
                                            <button
                                                title="Delete"
                                                class="flex h-9 w-9 items-center justify-center rounded-lg border border-red-200 text-red-600 hover:bg-red-50"
                                            >
                                                🗑
                                            </button>

                                        </div>

                                    </td>

                                </tr>


                                <!-- ROW 2 -->
                                <tr class="transition hover:bg-slate-50">

                                    <td class="px-5 py-4">

                                        <div class="flex items-center gap-3">

                                            <div class="h-12 w-12 overflow-hidden rounded-xl bg-slate-100">

                                                <img
                                                    src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=100"
                                                    class="h-full w-full object-cover"
                                                    alt=""
                                                >

                                            </div>

                                            <div>

                                                <p class="text-sm font-bold text-slate-900">
                                                    Running Sneakers
                                                </p>

                                                <p class="mt-1 text-xs text-slate-500">
                                                    SKU-10002
                                                </p>

                                            </div>

                                        </div>

                                    </td>


                                    <td class="px-5 py-4 text-sm text-slate-600">
                                        Footwear
                                    </td>


                                    <td class="px-5 py-4 text-sm font-bold text-slate-900">
                                        ₹2,499.00
                                    </td>


                                    <td class="px-5 py-4">

                                        <span class="text-sm font-semibold text-yellow-600">
                                            8
                                        </span>

                                    </td>


                                    <td class="px-5 py-4">

                                        <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-bold text-green-700">
                                            Active
                                        </span>

                                    </td>


                                    <td class="px-5 py-4">

                                        <div class="flex justify-end gap-2">

                                            <button class="flex h-9 w-9 items-center justify-center rounded-lg border border-slate-200 text-slate-500 hover:bg-slate-100">
                                                👁
                                            </button>

                                            <button class="flex h-9 w-9 items-center justify-center rounded-lg border border-blue-200 text-blue-600 hover:bg-blue-50">
                                                ✎
                                            </button>

                                            <button class="flex h-9 w-9 items-center justify-center rounded-lg border border-red-200 text-red-600 hover:bg-red-50">
                                                🗑
                                            </button>

                                        </div>

                                    </td>

                                </tr>


                                <!-- ROW 3 -->
                                <tr class="transition hover:bg-slate-50">

                                    <td class="px-5 py-4">

                                        <div class="flex items-center gap-3">

                                            <div class="h-12 w-12 overflow-hidden rounded-xl bg-slate-100">

                                                <img
                                                    src="https://images.unsplash.com/photo-1551488831-00ddcb6c6bd3?w=100"
                                                    class="h-full w-full object-cover"
                                                    alt=""
                                                >

                                            </div>

                                            <div>

                                                <p class="text-sm font-bold text-slate-900">
                                                    Premium Hoodie
                                                </p>

                                                <p class="mt-1 text-xs text-slate-500">
                                                    SKU-10003
                                                </p>

                                            </div>

                                        </div>

                                    </td>


                                    <td class="px-5 py-4 text-sm text-slate-600">
                                        Men
                                    </td>


                                    <td class="px-5 py-4 text-sm font-bold text-slate-900">
                                        ₹1,799.00
                                    </td>


                                    <td class="px-5 py-4">

                                        <span class="text-sm font-semibold text-red-600">
                                            0
                                        </span>

                                    </td>


                                    <td class="px-5 py-4">

                                        <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-bold text-red-700">
                                            Out of Stock
                                        </span>

                                    </td>


                                    <td class="px-5 py-4">

                                        <div class="flex justify-end gap-2">

                                            <button class="flex h-9 w-9 items-center justify-center rounded-lg border border-slate-200 text-slate-500 hover:bg-slate-100">
                                                👁
                                            </button>

                                            <button class="flex h-9 w-9 items-center justify-center rounded-lg border border-blue-200 text-blue-600 hover:bg-blue-50">
                                                ✎
                                            </button>

                                            <button class="flex h-9 w-9 items-center justify-center rounded-lg border border-red-200 text-red-600 hover:bg-red-50">
                                                🗑
                                            </button>

                                        </div>

                                    </td>

                                </tr>


                                <!-- ROW 4 -->
                                <tr class="transition hover:bg-slate-50">

                                    <td class="px-5 py-4">

                                        <div class="flex items-center gap-3">

                                            <div class="h-12 w-12 overflow-hidden rounded-xl bg-slate-100">

                                                <img
                                                    src="https://images.unsplash.com/photo-1598033129183-c4f50c736f10?w=100"
                                                    class="h-full w-full object-cover"
                                                    alt=""
                                                >

                                            </div>

                                            <div>

                                                <p class="text-sm font-bold text-slate-900">
                                                    Casual Shirt
                                                </p>

                                                <p class="mt-1 text-xs text-slate-500">
                                                    SKU-10004
                                                </p>

                                            </div>

                                        </div>

                                    </td>


                                    <td class="px-5 py-4 text-sm text-slate-600">
                                        Men
                                    </td>


                                    <td class="px-5 py-4 text-sm font-bold text-slate-900">
                                        ₹1,299.00
                                    </td>


                                    <td class="px-5 py-4">

                                        <span class="text-sm font-semibold text-slate-700">
                                            25
                                        </span>

                                    </td>


                                    <td class="px-5 py-4">

                                        <span class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-bold text-gray-700">
                                            Inactive
                                        </span>

                                    </td>


                                    <td class="px-5 py-4">

                                        <div class="flex justify-end gap-2">

                                            <button class="flex h-9 w-9 items-center justify-center rounded-lg border border-slate-200 text-slate-500 hover:bg-slate-100">
                                                👁
                                            </button>

                                            <button class="flex h-9 w-9 items-center justify-center rounded-lg border border-blue-200 text-blue-600 hover:bg-blue-50">
                                                ✎
                                            </button>

                                            <button class="flex h-9 w-9 items-center justify-center rounded-lg border border-red-200 text-red-600 hover:bg-red-50">
                                                🗑
                                            </button>

                                        </div>

                                    </td>

                                </tr>


                            </tbody>

                        </table>

                    </div>


                    <!-- Pagination -->
                    <div class="flex flex-col gap-4 border-t border-slate-200 px-5 py-4 sm:flex-row sm:items-center sm:justify-between">

                        <p class="text-sm text-slate-500">
                            Showing <span class="font-semibold text-slate-900">1</span>
                            to
                            <span class="font-semibold text-slate-900">4</span>
                            of
                            <span class="font-semibold text-slate-900">248</span>
                            products
                        </p>


                        <div class="flex items-center gap-1">

                            <button class="rounded-lg border border-slate-200 px-3 py-2 text-sm text-slate-400">
                                Previous
                            </button>

                            <button class="rounded-lg bg-slate-900 px-3 py-2 text-sm font-semibold text-white">
                                1
                            </button>

                            <button class="rounded-lg border border-slate-200 px-3 py-2 text-sm hover:bg-slate-50">
                                2
                            </button>

                            <button class="rounded-lg border border-slate-200 px-3 py-2 text-sm hover:bg-slate-50">
                                3
                            </button>

                            <button class="rounded-lg border border-slate-200 px-3 py-2 text-sm hover:bg-slate-50">
                                Next
                            </button>

                        </div>

                    </div>

                </div>


                <!-- ================================================= -->
                <!-- REPORT VIEW -->
                <!-- ================================================= -->

                <div
                    id="report"
                    class="mt-10"
                >

                    <!-- Report Header -->

                    <div class="mb-6 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">

                        <div>

                            <h2 class="text-2xl font-extrabold tracking-tight text-slate-900">
                                Reports & Analytics
                            </h2>

                            <p class="mt-1 text-sm text-slate-500">
                                Monitor your sales, orders and business performance.
                            </p>

                        </div>


                        <div class="flex flex-wrap gap-3">

                            <select
                                class="rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm font-semibold text-slate-700 outline-none"
                            >
                                <option>Last 30 Days</option>
                                <option>Last 7 Days</option>
                                <option>Last 90 Days</option>
                                <option>This Year</option>
                            </select>


                            <button
                                class="rounded-xl bg-slate-900 px-5 py-3 text-sm font-bold text-white hover:bg-slate-700"
                            >
                                Download Report
                            </button>

                        </div>

                    </div>


                    <!-- Report Cards -->

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">


                        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                            <p class="text-sm font-medium text-slate-500">
                                Total Revenue
                            </p>

                            <div class="mt-3 flex items-end justify-between">

                                <p class="text-2xl font-extrabold text-slate-900">
                                    ₹2,48,950
                                </p>

                                <span class="text-xs font-bold text-green-600">
                                    +12.5%
                                </span>

                            </div>

                            <p class="mt-2 text-xs text-slate-400">
                                Compared with previous period
                            </p>

                        </div>


                        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                            <p class="text-sm font-medium text-slate-500">
                                Total Orders
                            </p>

                            <div class="mt-3 flex items-end justify-between">

                                <p class="text-2xl font-extrabold text-slate-900">
                                    1,248
                                </p>

                                <span class="text-xs font-bold text-green-600">
                                    +8.2%
                                </span>

                            </div>

                            <p class="mt-2 text-xs text-slate-400">
                                Compared with previous period
                            </p>

                        </div>


                        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                            <p class="text-sm font-medium text-slate-500">
                                Average Order
                            </p>

                            <div class="mt-3 flex items-end justify-between">

                                <p class="text-2xl font-extrabold text-slate-900">
                                    ₹1,996
                                </p>

                                <span class="text-xs font-bold text-green-600">
                                    +5.4%
                                </span>

                            </div>

                            <p class="mt-2 text-xs text-slate-400">
                                Average order value
                            </p>

                        </div>


                        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                            <p class="text-sm font-medium text-slate-500">
                                Customers
                            </p>

                            <div class="mt-3 flex items-end justify-between">

                                <p class="text-2xl font-extrabold text-slate-900">
                                    684
                                </p>

                                <span class="text-xs font-bold text-green-600">
                                    +10.1%
                                </span>

                            </div>

                            <p class="mt-2 text-xs text-slate-400">
                                Active customers
                            </p>

                        </div>

                    </div>


                    <!-- Report Grid -->

                    <div class="mt-6 grid grid-cols-1 gap-6 xl:grid-cols-3">


                        <!-- Sales Overview -->

                        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm xl:col-span-2">

                            <div class="flex items-center justify-between">

                                <div>

                                    <h3 class="text-base font-bold text-slate-900">
                                        Sales Overview
                                    </h3>

                                    <p class="mt-1 text-xs text-slate-500">
                                        Revenue performance over the selected period
                                    </p>

                                </div>

                            </div>


                            <!-- Fake Chart -->

                            <div class="mt-8 flex h-64 items-end gap-3 border-b border-l border-slate-200 px-3 pb-0">

                                <div class="group flex h-full flex-1 flex-col justify-end">

                                    <div
                                        class="w-full rounded-t-lg bg-slate-800"
                                        style="height: 35%;"
                                    ></div>

                                    <p class="mt-3 text-center text-[10px] text-slate-400">
                                        01
                                    </p>

                                </div>


                                <div class="group flex h-full flex-1 flex-col justify-end">

                                    <div
                                        class="w-full rounded-t-lg bg-slate-700"
                                        style="height: 52%;"
                                    ></div>

                                    <p class="mt-3 text-center text-[10px] text-slate-400">
                                        05
                                    </p>

                                </div>


                                <div class="group flex h-full flex-1 flex-col justify-end">

                                    <div
                                        class="w-full rounded-t-lg bg-slate-800"
                                        style="height: 45%;"
                                    ></div>

                                    <p class="mt-3 text-center text-[10px] text-slate-400">
                                        10
                                    </p>

                                </div>


                                <div class="group flex h-full flex-1 flex-col justify-end">

                                    <div
                                        class="w-full rounded-t-lg bg-slate-700"
                                        style="height: 70%;"
                                    ></div>

                                    <p class="mt-3 text-center text-[10px] text-slate-400">
                                        15
                                    </p>

                                </div>


                                <div class="group flex h-full flex-1 flex-col justify-end">

                                    <div
                                        class="w-full rounded-t-lg bg-slate-800"
                                        style="height: 58%;"
                                    ></div>

                                    <p class="mt-3 text-center text-[10px] text-slate-400">
                                        20
                                    </p>

                                </div>


                                <div class="group flex h-full flex-1 flex-col justify-end">

                                    <div
                                        class="w-full rounded-t-lg bg-slate-700"
                                        style="height: 82%;"
                                    ></div>

                                    <p class="mt-3 text-center text-[10px] text-slate-400">
                                        25
                                    </p>

                                </div>


                                <div class="group flex h-full flex-1 flex-col justify-end">

                                    <div
                                        class="w-full rounded-t-lg bg-slate-900"
                                        style="height: 94%;"
                                    ></div>

                                    <p class="mt-3 text-center text-[10px] text-slate-400">
                                        30
                                    </p>

                                </div>

                            </div>

                        </div>


                        <!-- Order Status -->

                        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                            <h3 class="text-base font-bold text-slate-900">
                                Order Status
                            </h3>

                            <p class="mt-1 text-xs text-slate-500">
                                Current order distribution
                            </p>


                            <div class="mt-7 space-y-5">


                                <!-- Pending -->
                                <div>

                                    <div class="mb-2 flex justify-between">

                                        <span class="text-sm font-medium text-slate-600">
                                            Pending
                                        </span>

                                        <span class="text-sm font-bold text-slate-900">
                                            18%
                                        </span>

                                    </div>

                                    <div class="h-2 rounded-full bg-slate-100">

                                        <div
                                            class="h-2 rounded-full bg-yellow-400"
                                            style="width:18%"
                                        ></div>

                                    </div>

                                </div>


                                <!-- Processing -->
                                <div>

                                    <div class="mb-2 flex justify-between">

                                        <span class="text-sm font-medium text-slate-600">
                                            Processing
                                        </span>

                                        <span class="text-sm font-bold text-slate-900">
                                            24%
                                        </span>

                                    </div>

                                    <div class="h-2 rounded-full bg-slate-100">

                                        <div
                                            class="h-2 rounded-full bg-blue-500"
                                            style="width:24%"
                                        ></div>

                                    </div>

                                </div>


                                <!-- Shipped -->
                                <div>

                                    <div class="mb-2 flex justify-between">

                                        <span class="text-sm font-medium text-slate-600">
                                            Shipped
                                        </span>

                                        <span class="text-sm font-bold text-slate-900">
                                            31%
                                        </span>

                                    </div>

                                    <div class="h-2 rounded-full bg-slate-100">

                                        <div
                                            class="h-2 rounded-full bg-purple-500"
                                            style="width:31%"
                                        ></div>

                                    </div>

                                </div>


                                <!-- Delivered -->
                                <div>

                                    <div class="mb-2 flex justify-between">

                                        <span class="text-sm font-medium text-slate-600">
                                            Delivered
                                        </span>

                                        <span class="text-sm font-bold text-slate-900">
                                            21%
                                        </span>

                                    </div>

                                    <div class="h-2 rounded-full bg-slate-100">

                                        <div
                                            class="h-2 rounded-full bg-green-500"
                                            style="width:21%"
                                        ></div>

                                    </div>

                                </div>


                                <!-- Cancelled -->
                                <div>

                                    <div class="mb-2 flex justify-between">

                                        <span class="text-sm font-medium text-slate-600">
                                            Cancelled
                                        </span>

                                        <span class="text-sm font-bold text-slate-900">
                                            6%
                                        </span>

                                    </div>

                                    <div class="h-2 rounded-full bg-slate-100">

                                        <div
                                            class="h-2 rounded-full bg-red-500"
                                            style="width:6%"
                                        ></div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- ================================================= -->
                    <!-- BOTTOM REPORT TABLES -->
                    <!-- ================================================= -->

                    <div class="mt-6 grid grid-cols-1 gap-6 xl:grid-cols-2">


                        <!-- Top Products -->

                        <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">

                            <div class="border-b border-slate-200 px-5 py-4">

                                <div class="flex items-center justify-between">

                                    <div>

                                        <h3 class="text-base font-bold text-slate-900">
                                            Top Products
                                        </h3>

                                        <p class="mt-1 text-xs text-slate-500">
                                            Best selling products
                                        </p>

                                    </div>

                                    <button class="text-sm font-bold text-slate-900 hover:underline">
                                        View All
                                    </button>

                                </div>

                            </div>


                            <div class="divide-y divide-slate-100">


                                <div class="flex items-center justify-between p-5">

                                    <div class="flex items-center gap-3">

                                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-slate-100 font-bold">
                                            01
                                        </div>

                                        <div>

                                            <p class="text-sm font-bold text-slate-900">
                                                Classic Cotton T-Shirt
                                            </p>

                                            <p class="mt-1 text-xs text-slate-500">
                                                248 sold
                                            </p>

                                        </div>

                                    </div>

                                    <p class="text-sm font-bold text-slate-900">
                                        ₹98,500
                                    </p>

                                </div>


                                <div class="flex items-center justify-between p-5">

                                    <div class="flex items-center gap-3">

                                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-slate-100 font-bold">
                                            02
                                        </div>

                                        <div>

                                            <p class="text-sm font-bold text-slate-900">
                                                Running Sneakers
                                            </p>

                                            <p class="mt-1 text-xs text-slate-500">
                                                182 sold
                                            </p>

                                        </div>

                                    </div>

                                    <p class="text-sm font-bold text-slate-900">
                                        ₹72,800
                                    </p>

                                </div>


                                <div class="flex items-center justify-between p-5">

                                    <div class="flex items-center gap-3">

                                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-slate-100 font-bold">
                                            03
                                        </div>

                                        <div>

                                            <p class="text-sm font-bold text-slate-900">
                                                Premium Hoodie
                                            </p>

                                            <p class="mt-1 text-xs text-slate-500">
                                                124 sold
                                            </p>

                                        </div>

                                    </div>

                                    <p class="text-sm font-bold text-slate-900">
                                        ₹56,200
                                    </p>

                                </div>


                            </div>

                        </div>


                        <!-- Payment Summary -->

                        <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">

                            <div class="border-b border-slate-200 px-5 py-4">

                                <h3 class="text-base font-bold text-slate-900">
                                    Payment Summary
                                </h3>

                                <p class="mt-1 text-xs text-slate-500">
                                    Payment method performance
                                </p>

                            </div>


                            <div class="p-5">

                                <div class="space-y-6">


                                    <div>

                                        <div class="mb-2 flex items-center justify-between">

                                            <span class="text-sm font-semibold text-slate-700">
                                                Cash on Delivery
                                            </span>

                                            <span class="text-sm font-bold text-slate-900">
                                                ₹1,25,400
                                            </span>

                                        </div>

                                        <div class="h-2 rounded-full bg-slate-100">

                                            <div
                                                class="h-2 rounded-full bg-slate-800"
                                                style="width:52%"
                                            ></div>

                                        </div>

                                        <p class="mt-1 text-xs text-slate-400">
                                            52% of total revenue
                                        </p>

                                    </div>


                                    <div>

                                        <div class="mb-2 flex items-center justify-between">

                                            <span class="text-sm font-semibold text-slate-700">
                                                Online Payment
                                            </span>

                                            <span class="text-sm font-bold text-slate-900">
                                                ₹98,650
                                            </span>

                                        </div>

                                        <div class="h-2 rounded-full bg-slate-100">

                                            <div
                                                class="h-2 rounded-full bg-blue-600"
                                                style="width:41%"
                                            ></div>

                                        </div>

                                        <p class="mt-1 text-xs text-slate-400">
                                            41% of total revenue
                                        </p>

                                    </div>


                                    <div>

                                        <div class="mb-2 flex items-center justify-between">

                                            <span class="text-sm font-semibold text-slate-700">
                                                UPI
                                            </span>

                                            <span class="text-sm font-bold text-slate-900">
                                                ₹24,900
                                            </span>

                                        </div>

                                        <div class="h-2 rounded-full bg-slate-100">

                                            <div
                                                class="h-2 rounded-full bg-purple-600"
                                                style="width:10%"
                                            ></div>

                                        </div>

                                        <p class="mt-1 text-xs text-slate-400">
                                            10% of total revenue
                                        </p>

                                    </div>


                                </div>

                            </div>

                        </div>

                    </div>


                </div>

            </div>

        </div>

    </main>

</div>


<!-- ============================================================= -->
<!-- TAILWIND CUSTOM CLASSES -->
<!-- ============================================================= -->

<style>

    .sidebar-link {
        display: flex;
        align-items: center;
        width: 100%;
        padding: 12px 16px;
        margin-bottom: 2px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        color: #334155;
        transition: all 0.2s ease;
    }

    .sidebar-link:hover {
        background: #f1f5f9;
        color: #0f172a;
    }

</style>

</body>
</html>