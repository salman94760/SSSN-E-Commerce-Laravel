@extends('layouts.customer.customer-layout')

@section('title', 'SSSN | DASHBOARD')

@section('customerContent')

<main>


    {{-- Hero --}}
    <section class="bg-white border-b">

        <div class="max-w-7xl mx-auto
                    px-4 sm:px-6 lg:px-8 py-8">

            <div class="relative overflow-hidden
                        rounded-3xl bg-gray-900
                        text-white p-7 sm:p-10">


                {{-- Background decoration --}}
                <div class="absolute -right-20 -top-24
                            w-80 h-80 rounded-full
                            bg-white/5">
                </div>

                <div class="absolute right-32 -bottom-40
                            w-96 h-96 rounded-full
                            bg-white/5">
                </div>


                <div class="relative flex flex-col
                            lg:flex-row lg:items-center
                            lg:justify-between gap-8">


                    {{-- User Info --}}
                    <div class="flex items-center gap-5">

                        <div class="w-16 h-16 sm:w-20 sm:h-20
                                    rounded-2xl
                                    bg-white/10
                                    border border-white/20
                                    flex items-center
                                    justify-center
                                    text-2xl font-bold">

                            {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}

                        </div>


                        <div>

                            <p class="text-sm text-gray-400">
                                Welcome back 👋
                            </p>

                            <h1 class="text-2xl sm:text-3xl
                                       font-bold mt-1">

                                {{ auth()->user()->name ?? 'Customer' }}

                            </h1>

                            <p class="text-sm text-gray-400 mt-2">
                                Manage your orders, profile and wishlist
                                from here.
                            </p>

                        </div>

                    </div>


                    {{-- Buttons --}}
                    <div class="flex flex-wrap gap-3">

                        <a href="{{ url('/shop') }}"
                           class="px-5 py-3 bg-white
                                  text-black rounded-xl
                                  text-sm font-semibold
                                  hover:bg-gray-100 transition">

                            Continue Shopping

                        </a>

                        <a href="{{ url('/profile') }}"
                           class="px-5 py-3
                                  bg-white/10
                                  border border-white/20
                                  rounded-xl text-sm
                                  font-semibold
                                  hover:bg-white/20 transition">

                            Edit Profile

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- Dashboard --}}
    <section>

        <div class="max-w-7xl mx-auto
                    px-4 sm:px-6 lg:px-8 py-8">


            {{-- ================================================= --}}
            {{-- STATS --}}
            {{-- ================================================= --}}

            <div class="grid grid-cols-2
                        lg:grid-cols-4 gap-4 mb-8">


                {{-- Orders --}}
                <div class="bg-white border
                            border-gray-200
                            rounded-2xl p-5
                            hover:shadow-md transition">

                    <div class="flex items-center
                                justify-between">

                        <div class="w-11 h-11 rounded-xl
                                    bg-blue-50
                                    flex items-center
                                    justify-center text-xl">
                            🛍️
                        </div>

                        <span class="text-xs
                                     text-green-600
                                     bg-green-50
                                     px-2 py-1
                                     rounded-full">
                            +12%
                        </span>

                    </div>

                    <p class="text-sm text-gray-500 mt-5">
                        Total Ordersss
                    </p>

                    <p class="text-2xl font-bold mt-1">
                        24
                    </p>

                </div>


                {{-- Delivered --}}
                <div class="bg-white border
                            border-gray-200
                            rounded-2xl p-5
                            hover:shadow-md transition">

                    <div class="flex items-center
                                justify-between">

                        <div class="w-11 h-11 rounded-xl
                                    bg-green-50
                                    flex items-center
                                    justify-center text-xl">
                            ✓
                        </div>

                        <span class="text-xs text-gray-400">
                            All time
                        </span>

                    </div>

                    <p class="text-sm text-gray-500 mt-5">
                        Delivered
                    </p>

                    <p class="text-2xl font-bold mt-1">
                        20
                    </p>

                </div>


                {{-- Wishlist --}}
                <div class="bg-white border
                            border-gray-200
                            rounded-2xl p-5
                            hover:shadow-md transition">

                    <div class="flex items-center
                                justify-between">

                        <div class="w-11 h-11 rounded-xl
                                    bg-pink-50
                                    flex items-center
                                    justify-center text-xl">
                            ♡
                        </div>

                        <span class="text-xs text-gray-400">
                            Saved
                        </span>

                    </div>

                    <p class="text-sm text-gray-500 mt-5">
                        Wishlist
                    </p>

                    <p class="text-2xl font-bold mt-1">
                        8
                    </p>

                </div>


                {{-- Reviews --}}
                <div class="bg-white border
                            border-gray-200
                            rounded-2xl p-5
                            hover:shadow-md transition">

                    <div class="flex items-center
                                justify-between">

                        <div class="w-11 h-11 rounded-xl
                                    bg-yellow-50
                                    flex items-center
                                    justify-center text-xl">
                            ★
                        </div>

                        <span class="text-xs text-gray-400">
                            Published
                        </span>

                    </div>

                    <p class="text-sm text-gray-500 mt-5">
                        Reviews
                    </p>

                    <p class="text-2xl font-bold mt-1">
                        12
                    </p>

                </div>

            </div>



            {{-- ================================================= --}}
            {{-- CONTENT GRID --}}
            {{-- ================================================= --}}

            <div class="grid lg:grid-cols-3 gap-8">


                {{-- LEFT --}}
                <div class="lg:col-span-2 space-y-6">


                    {{-- Recent Orders --}}
                    <div class="bg-white border
                                border-gray-200
                                rounded-2xl overflow-hidden">

                        <div class="px-6 py-5
                                    border-b
                                    flex items-center
                                    justify-between">

                            <div>

                                <h2 class="text-lg font-bold">
                                    Recent Orders
                                </h2>

                                <p class="text-sm text-gray-500 mt-1">
                                    Track your latest purchases.
                                </p>

                            </div>

                            <a href="{{ url('/orders') }}"
                               class="text-sm font-semibold
                                      hover:underline">
                                View All
                            </a>

                        </div>


                        <div class="divide-y">


                            {{-- Order --}}
                            <div class="p-6">

                                <div class="flex flex-col
                                            sm:flex-row
                                            sm:items-center
                                            justify-between
                                            gap-5">


                                    <div class="flex items-center
                                                gap-4">

                                        <div class="w-16 h-16
                                                    rounded-xl
                                                    bg-gray-100
                                                    flex items-center
                                                    justify-center
                                                    text-2xl">
                                            👖
                                        </div>

                                        <div>

                                            <p class="text-xs
                                                      text-gray-400">
                                                Order #ORD-10245
                                            </p>

                                            <h3 class="font-semibold mt-1">
                                                Premium Cotton Lower
                                            </h3>

                                            <p class="text-xs
                                                      text-gray-500 mt-1">
                                                2 Items · ₹1,298
                                            </p>

                                        </div>

                                    </div>


                                    <div class="flex items-center
                                                justify-between
                                                sm:justify-end gap-5">

                                        <div>

                                            <span class="inline-flex
                                                         px-3 py-1.5
                                                         rounded-full
                                                         bg-green-50
                                                         text-green-700
                                                         text-xs
                                                         font-semibold">

                                                ● Delivered

                                            </span>

                                            <p class="text-xs
                                                      text-gray-400 mt-2">
                                                18 Aug 2026
                                            </p>

                                        </div>

                                        <a href="#"
                                           class="w-9 h-9
                                                  rounded-lg border
                                                  flex items-center
                                                  justify-center
                                                  hover:bg-gray-100">
                                            →
                                        </a>

                                    </div>

                                </div>

                            </div>


                            {{-- Order --}}
                            <div class="p-6">

                                <div class="flex flex-col
                                            sm:flex-row
                                            sm:items-center
                                            justify-between
                                            gap-5">


                                    <div class="flex items-center
                                                gap-4">

                                        <div class="w-16 h-16
                                                    rounded-xl
                                                    bg-gray-100
                                                    flex items-center
                                                    justify-center
                                                    text-2xl">
                                            👕
                                        </div>

                                        <div>

                                            <p class="text-xs
                                                      text-gray-400">
                                                Order #ORD-10231
                                            </p>

                                            <h3 class="font-semibold mt-1">
                                                Premium Cotton T-Shirt
                                            </h3>

                                            <p class="text-xs
                                                      text-gray-500 mt-1">
                                                1 Item · ₹699
                                            </p>

                                        </div>

                                    </div>


                                    <div class="flex items-center
                                                justify-between
                                                sm:justify-end gap-5">

                                        <div>

                                            <span class="inline-flex
                                                         px-3 py-1.5
                                                         rounded-full
                                                         bg-yellow-50
                                                         text-yellow-700
                                                         text-xs
                                                         font-semibold">

                                                ● In Transit

                                            </span>

                                            <p class="text-xs
                                                      text-gray-400 mt-2">
                                                Expected 23 Aug
                                            </p>

                                        </div>

                                        <a href="#"
                                           class="w-9 h-9
                                                  rounded-lg border
                                                  flex items-center
                                                  justify-center
                                                  hover:bg-gray-100">
                                            →
                                        </a>

                                    </div>

                                </div>

                            </div>


                            {{-- Order --}}
                            <div class="p-6">

                                <div class="flex flex-col
                                            sm:flex-row
                                            sm:items-center
                                            justify-between
                                            gap-5">


                                    <div class="flex items-center
                                                gap-4">

                                        <div class="w-16 h-16
                                                    rounded-xl
                                                    bg-gray-100
                                                    flex items-center
                                                    justify-center
                                                    text-2xl">
                                            🧥
                                        </div>

                                        <div>

                                            <p class="text-xs
                                                      text-gray-400">
                                                Order #ORD-10198
                                            </p>

                                            <h3 class="font-semibold mt-1">
                                                Casual Summer Collection
                                            </h3>

                                            <p class="text-xs
                                                      text-gray-500 mt-1">
                                                3 Items · ₹2,149
                                            </p>

                                        </div>

                                    </div>


                                    <div class="flex items-center
                                                justify-between
                                                sm:justify-end gap-5">

                                        <div>

                                            <span class="inline-flex
                                                         px-3 py-1.5
                                                         rounded-full
                                                         bg-blue-50
                                                         text-blue-700
                                                         text-xs
                                                         font-semibold">

                                                ● Processing

                                            </span>

                                            <p class="text-xs
                                                      text-gray-400 mt-2">
                                                20 Aug 2026
                                            </p>

                                        </div>

                                        <a href="#"
                                           class="w-9 h-9
                                                  rounded-lg border
                                                  flex items-center
                                                  justify-center
                                                  hover:bg-gray-100">
                                            →
                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>



                    {{-- Quick Actions --}}
                    <div>

                        <div class="mb-4">

                            <h2 class="text-lg font-bold">
                                Quick Actions
                            </h2>

                            <p class="text-sm text-gray-500 mt-1">
                                Manage everything from one place.
                            </p>

                        </div>


                        <div class="grid sm:grid-cols-2 gap-4">


                            <a href="{{ url('/orders') }}"
                               class="group bg-white
                                      border border-gray-200
                                      rounded-2xl p-5
                                      hover:border-black
                                      hover:shadow-md transition">

                                <div class="flex items-center gap-4">

                                    <div class="w-12 h-12
                                                rounded-xl bg-blue-50
                                                flex items-center
                                                justify-center
                                                text-xl">
                                        📦
                                    </div>

                                    <div class="flex-1">

                                        <h3 class="font-semibold">
                                            My Orders
                                        </h3>

                                        <p class="text-xs
                                                  text-gray-500 mt-1">
                                            Track and manage orders
                                        </p>

                                    </div>

                                    <span class="group-hover:translate-x-1
                                                 transition">
                                        →
                                    </span>

                                </div>

                            </a>


                            <a href="{{ url('/wishlist') }}"
                               class="group bg-white
                                      border border-gray-200
                                      rounded-2xl p-5
                                      hover:border-black
                                      hover:shadow-md transition">

                                <div class="flex items-center gap-4">

                                    <div class="w-12 h-12
                                                rounded-xl bg-pink-50
                                                flex items-center
                                                justify-center
                                                text-xl">
                                        ♡
                                    </div>

                                    <div class="flex-1">

                                        <h3 class="font-semibold">
                                            Wishlist
                                        </h3>

                                        <p class="text-xs
                                                  text-gray-500 mt-1">
                                            Your saved products
                                        </p>

                                    </div>

                                    <span class="group-hover:translate-x-1
                                                 transition">
                                        →
                                    </span>

                                </div>

                            </a>


                            <a href="{{ url('/profile') }}"
                               class="group bg-white
                                      border border-gray-200
                                      rounded-2xl p-5
                                      hover:border-black
                                      hover:shadow-md transition">

                                <div class="flex items-center gap-4">

                                    <div class="w-12 h-12
                                                rounded-xl bg-purple-50
                                                flex items-center
                                                justify-center
                                                text-xl">
                                        👤
                                    </div>

                                    <div class="flex-1">

                                        <h3 class="font-semibold">
                                            My Profile
                                        </h3>

                                        <p class="text-xs
                                                  text-gray-500 mt-1">
                                            Manage your account
                                        </p>

                                    </div>

                                    <span class="group-hover:translate-x-1
                                                 transition">
                                        →
                                    </span>

                                </div>

                            </a>


                            <a href="{{ url('/reviews') }}"
                               class="group bg-white
                                      border border-gray-200
                                      rounded-2xl p-5
                                      hover:border-black
                                      hover:shadow-md transition">

                                <div class="flex items-center gap-4">

                                    <div class="w-12 h-12
                                                rounded-xl bg-yellow-50
                                                flex items-center
                                                justify-center
                                                text-xl">
                                        ★
                                    </div>

                                    <div class="flex-1">

                                        <h3 class="font-semibold">
                                            My Reviews
                                        </h3>

                                        <p class="text-xs
                                                  text-gray-500 mt-1">
                                            Manage your reviews
                                        </p>

                                    </div>

                                    <span class="group-hover:translate-x-1
                                                 transition">
                                        →
                                    </span>

                                </div>

                            </a>

                        </div>

                    </div>

                </div>



                {{-- RIGHT --}}
                <div class="space-y-6">


                    {{-- Profile --}}
                    <div class="bg-white border
                                border-gray-200
                                rounded-2xl p-6">

                        <div class="flex items-center
                                    justify-between">

                            <div>

                                <h2 class="font-bold">
                                    Profile Completion
                                </h2>

                                <p class="text-xs
                                          text-gray-500 mt-1">
                                    Complete your profile
                                </p>

                            </div>

                            <span class="text-lg font-bold">
                                80%
                            </span>

                        </div>


                        <div class="h-2 bg-gray-100
                                    rounded-full overflow-hidden mt-5">

                            <div class="h-full bg-black
                                        rounded-full"
                                 style="width: 80%">
                            </div>

                        </div>


                        <p class="text-xs text-gray-500 mt-3">
                            Add your profile photo and address
                            to complete your profile.
                        </p>


                        <a href="{{ url('/profile/edit') }}"
                           class="block text-center mt-4
                                  border border-gray-300
                                  rounded-xl py-2.5
                                  text-sm font-semibold
                                  hover:bg-gray-50">

                            Complete Profile

                        </a>

                    </div>



                    {{-- Delivery --}}
                    <div class="bg-gray-900 text-white
                                rounded-2xl p-6">

                        <div class="flex items-center
                                    justify-between">

                            <div>

                                <p class="text-xs text-gray-400">
                                    CURRENT ORDER
                                </p>

                                <h2 class="font-bold
                                           text-lg mt-1">
                                    On its way 🚚
                                </h2>

                            </div>

                            <div class="w-11 h-11
                                        rounded-xl bg-white/10
                                        flex items-center
                                        justify-center">
                                📦
                            </div>

                        </div>


                        <div class="mt-7">

                            <div class="flex justify-between
                                        text-xs text-gray-400">

                                <span>Ordered</span>
                                <span>Shipped</span>
                                <span>Delivered</span>

                            </div>


                            <div class="relative mt-4">

                                <div class="h-1
                                            bg-white/20
                                            rounded-full">
                                </div>

                                <div class="absolute top-0 left-0
                                            h-1 bg-white
                                            rounded-full"
                                     style="width:65%">
                                </div>

                                <div class="absolute -top-1
                                            left-0 w-3 h-3
                                            bg-white rounded-full">
                                </div>

                                <div class="absolute -top-1
                                            left-[65%] w-3 h-3
                                            bg-white rounded-full">
                                </div>

                                <div class="absolute -top-1
                                            right-0 w-3 h-3
                                            bg-white/30 rounded-full">
                                </div>

                            </div>

                        </div>


                        <p class="text-sm text-gray-400 mt-6">
                            Expected delivery
                        </p>

                        <p class="font-semibold mt-1">
                            23 August 2026
                        </p>


                        <a href="{{ url('/orders') }}"
                           class="mt-5 w-full
                                  flex items-center
                                  justify-center py-3
                                  rounded-xl bg-white
                                  text-black text-sm
                                  font-semibold
                                  hover:bg-gray-100">

                            Track Order

                        </a>

                    </div>



                    {{-- Coupon --}}
                    <div class="relative overflow-hidden
                                bg-white border
                                border-gray-200
                                rounded-2xl p-6">

                        <div class="absolute -right-8
                                    -top-8 w-28 h-28
                                    rounded-full bg-yellow-50">
                        </div>

                        <div class="relative">

                            <span class="inline-flex
                                         bg-yellow-100
                                         text-yellow-700
                                         text-xs font-bold
                                         px-3 py-1.5
                                         rounded-full">

                                SPECIAL OFFER

                            </span>


                            <h2 class="text-xl font-bold mt-4">
                                Get 10% OFF
                            </h2>

                            <p class="text-sm text-gray-500
                                      leading-6 mt-2">
                                Use this coupon on your next purchase.
                            </p>


                            <div class="mt-5 flex items-center
                                        justify-between
                                        border border-dashed
                                        border-gray-300
                                        rounded-xl p-3">

                                <span class="font-bold
                                             tracking-wider">
                                    SAVE10
                                </span>

                                <button
                                    onclick="navigator.clipboard.writeText('SAVE10')"
                                    class="text-xs font-semibold
                                           bg-black text-white
                                           px-3 py-2 rounded-lg
                                           hover:bg-gray-800">

                                    Copy

                                </button>

                            </div>

                        </div>

                    </div>



                    {{-- Support --}}
                    <div class="bg-green-50
                                border border-green-100
                                rounded-2xl p-5">

                        <div class="flex items-center gap-3">

                            <div class="w-10 h-10
                                        rounded-full
                                        bg-green-100
                                        flex items-center
                                        justify-center">
                                💬
                            </div>

                            <div>

                                <h3 class="font-semibold
                                           text-green-900">
                                    Need Help?
                                </h3>

                                <p class="text-xs
                                          text-green-700 mt-1">
                                    We're here to help.
                                </p>

                            </div>

                        </div>


                        <a href="{{ url('/contact') }}"
                           class="block text-center mt-4
                                  bg-white
                                  border border-green-200
                                  text-green-800
                                  rounded-xl py-2.5
                                  text-sm font-semibold
                                  hover:bg-green-100">

                            Contact Support

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>

</main>



@endsection