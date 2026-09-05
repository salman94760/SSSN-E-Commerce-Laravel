<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="icon" type="image/png" href="{{ asset('logo/logo.ico') }}">

    {{-- Tailwind CSS --}}
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    {{-- Alpine JS --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>


<body class="bg-gray-50 text-gray-900">

    {{-- ================= HEADER ================= --}}
    <header class="bg-white border-b sticky top-0 z-50">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="min-h-[120px] flex items-center justify-between gap-6">

                {{-- ================= LOGO ================= --}}
                <a href="{{ url('/') }}" class="flex items-center">

                    <div class="w-[110px] h-[90px] flex flex-col items-center justify-center">

                        <img
                            src="{{ asset('logo/' . $globalComapnyDetail->logo) }}"
                            alt="Logo"
                            class="max-w-full max-h-[70px] object-contain"
                        >

                        <p class="text-[10px] uppercase tracking-widest text-gray-400">
                            Clothing Store
                        </p>

                    </div>

                </a>


                {{-- ================= NAVIGATION ================= --}}
                <nav class="hidden lg:flex items-center gap-8">

                    {{-- Home --}}
                    <a
                        href="{{ url('/') }}"
                        class="text-sm text-gray-500 hover:text-black transition
                        {{ request()->is('/') ? 'font-bold underline text-black' : '' }}"
                    >
                        Home
                    </a>


                    {{-- Shop --}}
                    <a
                        href="{{ url('/shop') }}"
                        class="text-sm text-gray-500 hover:text-black transition
                        {{ request()->is('shop*') ? 'font-bold underline text-black' : '' }}"
                    >
                        Shop
                    </a>


                    {{-- About --}}
                    <a
                        href="{{ url('/about') }}"
                        class="text-sm text-gray-500 hover:text-black transition
                        {{ request()->is('about*') ? 'font-bold underline text-black' : '' }}"
                    >
                        About
                    </a>


                    {{-- Reviews --}}
                    <a
                        href="{{ url('/reviews') }}"
                        class="text-sm text-gray-500 hover:text-black transition
                        {{ request()->is('reviews*') ? 'font-bold underline text-black' : '' }}"
                    >
                        Reviews
                    </a>


                    {{-- FAQ --}}
                    <a
                        href="{{ url('/faq') }}"
                        class="text-sm text-gray-500 hover:text-black transition
                        {{ request()->is('faq*') ? 'font-bold underline text-black' : '' }}"
                    >
                        FAQ
                    </a>


                    {{-- Contact --}}
                    <a
                        href="{{ url('/contact') }}"
                        class="text-sm text-gray-500 hover:text-black transition
                        {{ request()->is('contact*') ? 'font-bold underline text-black' : '' }}"
                    >
                        Contact
                    </a>

                </nav>


                {{-- ================= RIGHT SIDE ================= --}}
                <div class="flex items-center gap-3">

                    @if(auth()->check())

                        {{-- ================= WELCOME ================= --}}
                        <div class="hidden md:block text-right">

                            <p class="text-xs text-gray-500">
                                Welcome
                                <b class="text-sm text-black">
                                    {{ auth()->user()->name }}
                                </b>
                            </p>

                        </div>


                        {{-- ================= WISHLIST ================= --}}
                        <a
                            href="{{ url('/wishlist') }}"
                            class="relative w-10 h-10 rounded-xl bg-gray-100 flex items-center justify-center hover:bg-gray-200 transition"
                            title="Wishlist"
                        >

                            <span class="text-xl">
                                ♡
                            </span>


                            @if(!empty($globalWishlist) && count($globalWishlist) > 0)

                                <span
                                    class="absolute -top-1 -right-1 min-w-5 h-5 px-1
                                    rounded-full bg-black text-white
                                    text-[10px] flex items-center justify-center"
                                >
                                    {{ count($globalWishlist) }}
                                </span>

                            @endif

                        </a>


                        {{-- ================= CART ================= --}}
                        <a
                            href="{{ url('/cart') }}"
                            class="relative w-10 h-10 rounded-xl bg-gray-100 flex items-center justify-center hover:bg-gray-200 transition"
                            title="Cart"
                        >

                            <span class="text-lg">
                                🛒
                            </span>


                            @if($globalCart?->id)

                                @php
                                    $cartCount = $globalCart?->items?->count('id') ?? 0;
                                @endphp

                                @if($cartCount > 0)

                                    <span
                                        class="absolute -top-1 -right-1 min-w-5 h-5 px-1
                                        rounded-full bg-black text-white
                                        text-[10px] flex items-center justify-center"
                                    >
                                        {{ $cartCount }}
                                    </span>

                                @endif

                            @endif

                        </a>


                        {{-- ================= USER DROPDOWN ================= --}}
                        <div
                            class="relative"
                            x-data="{ open: false }"
                        >

                            {{-- Dropdown Button --}}
                            <button
                                type="button"
                                @click="open = !open"
                                @click.outside="open = false"
                                class="flex items-center justify-center
                                w-10 h-10 rounded-xl bg-gray-100
                                hover:bg-gray-200 transition"
                            >

                                {{-- User Initial --}}
                                <span
                                    class="w-8 h-8 rounded-lg bg-black text-white
                                    flex items-center justify-center
                                    text-sm font-semibold"
                                >
                                    {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                                </span>

                            </button>


                            {{-- ================= DROPDOWN ================= --}}
                            <div
                                x-show="open"
                                x-transition
                                style="display: none;"
                                class="absolute right-0 mt-2 w-60
                                bg-white rounded-xl shadow-xl
                                border border-gray-100 py-2 z-50"
                            >

                                {{-- ================= USER INFO ================= --}}
                                <div class="px-4 py-3 border-b border-gray-100">

                                    <p class="text-xs text-gray-500">
                                        Welcome
                                    </p>

                                    <p class="text-sm font-semibold text-gray-900 truncate">
                                        {{ auth()->user()->name }}
                                    </p>

                                    <p class="text-xs text-gray-500 truncate mt-0.5">
                                        {{ auth()->user()->email }}
                                    </p>

                                </div>


                                {{-- ================= DASHBOARD ================= --}}
                                <a
                                    href="{{ url('/dashboard') }}"
                                    class="flex items-center gap-3 px-4 py-2.5
                                    text-sm text-gray-700
                                    hover:bg-gray-50 transition"
                                >

                                    <span>
                                        📊
                                    </span>

                                    <span>
                                        Dashboard
                                    </span>

                                </a>


                                {{-- ================= PROFILE ================= --}}
                                <a
                                    href="{{ url('/profile') }}"
                                    class="flex items-center gap-3 px-4 py-2.5
                                    text-sm text-gray-700
                                    hover:bg-gray-50 transition"
                                >

                                    <span>
                                        👤
                                    </span>

                                    <span>
                                        My Profile
                                    </span>

                                </a>


                                {{-- ================= MY ORDERS ================= --}}
                                <a
                                    href="{{ url('/my-orders') }}"
                                    class="flex items-center gap-3 px-4 py-2.5
                                    text-sm text-gray-700
                                    hover:bg-gray-50 transition"
                                >

                                    <span>
                                        📦
                                    </span>

                                    <span>
                                        My Orders
                                    </span>

                                </a>


                                {{-- ================= DIVIDER ================= --}}
                                <div class="border-t border-gray-100 my-2"></div>


                                {{-- ================= LOGOUT ================= --}}
                                <form
                                    action="{{ route('logout') }}"
                                    method="POST"
                                >

                                    @csrf

                                    <button
                                        type="submit"
                                        class="w-full flex items-center gap-3
                                        px-4 py-2.5 text-sm text-red-600
                                        hover:bg-red-50 text-left transition"
                                    >

                                        <span>
                                            🚪
                                        </span>

                                        <span>
                                            Sign Out
                                        </span>

                                    </button>

                                </form>

                            </div>

                        </div>


                    @else

                        {{-- ================= REGISTER ================= --}}
                        <a
                            href="{{ route('userRegister') }}"
                            class="rounded-lg border border-slate-600
                            px-4 py-2 text-sm font-medium
                            text-white bg-black
                            transition hover:bg-slate-800"
                        >
                            Register
                        </a>


                        {{-- ================= LOGIN ================= --}}
                        <a
                            href="{{ route('userLogin') }}"
                            class="rounded-lg border border-slate-600
                            px-4 py-2 text-sm font-medium
                            text-white bg-black
                            transition hover:bg-slate-800"
                        >
                            Login
                        </a>

                    @endif

                </div>

            </div>

        </div>

    </header>


    {{-- ================= PAGE CONTENT ================= --}}

    @yield('content')


</body>
</html>