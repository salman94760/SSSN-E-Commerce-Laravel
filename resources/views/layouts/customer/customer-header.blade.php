<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('logo/logo.ico') }}">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-50 text-gray-900">
    <header class="bg-white border-b sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="h-20 flex items-center justify-between h-[120px]">
                <a href="{{ url('/') }}" class=" items-center gap-3">
                    <div class="w-[110px] h-[90px] rounded-xl items-center justify-center font-bold"><img src="{{asset('logo/'.$globalComapnyDetail->logo)}}" /><p class="text-[10px] uppercase tracking-widest text-gray-400">Clothing Store</p></div>
                    
                   <!--  <div>
                        <h1 class="font-bold text-xl">SSSN</h1>
                        <p class="text-[10px] uppercase tracking-widest text-gray-400">Clothing Store</p>
                    </div> -->
                </a>

                {{-- Navigation --}}
                <nav class="hidden lg:flex items-center gap-8">
                    <a href="{{ url('/') }}"
   class="text-sm text-gray-500 hover:text-black {{ request()->is('/') ? 'font-bold underline text-black' : '' }}">
    Home
</a>

<a href="{{ url('/shop') }}"
   class="text-sm text-gray-500 hover:text-black {{ request()->is('shop*') ? 'font-bold underline text-black' : '' }}">
    Shop
</a>

<a href="{{ url('/about') }}"
   class="text-sm text-gray-500 hover:text-black {{ request()->is('about*') ? 'font-bold underline text-black' : '' }}">
    About
</a>

<a href="{{ url('/reviews') }}"
   class="text-sm text-gray-500 hover:text-black {{ request()->is('reviews*') ? 'font-bold underline text-black' : '' }}">
    Reviews
</a>

<a href="{{ url('/faq') }}"
   class="text-sm text-gray-500 hover:text-black {{ request()->is('faq*') ? 'font-bold underline text-black' : '' }}">
    FAQ
</a>

<a href="{{ url('/contact') }}"
   class="text-sm text-gray-500 hover:text-black {{ request()->is('contact*') ? 'font-bold underline text-black' : '' }}">
    Contact
</a>

                </nav>

<div class="flex items-center gap-3">

    @if(auth()->check())

        {{-- Welcome Customer --}}
        <div class="hidden md:block text-right">
            <p class="text-xs text-gray-500">Welcome <b class="text-sm text-black">{{ auth()->user()->name }}</b></p>
        </div>

        {{-- Dashboard --}}
        <a href="{{ url('/dashboard') }}"
           class="hidden sm:block rounded-lg bg-black px-4 py-2 text-sm font-semibold text-white hover:bg-gray-800 transition">
            Dashboard
        </a>
      <!--   <a href="{{ url('/cart') }}" class="relative w-10 h-10 rounded-xl bg-gray-100 flex items-center justify-center">🛒
                        @if($globalCart?->id)
                        <span class="absolute -top-1 -right-1 w-4 h-4 rounded-full bg-black text-white text-[9px] flex items-center justify-center">{{ $globalCart?->items?->sum('quantity') ?? 0 }}</span>
                        @endif
                    </a> -->

        {{-- Customer Dropdown --}}
        <div class="relative" x-data="{ open: false }">

            {{-- Dropdown Button --}}
            <button
                @click="open = !open"
                @click.outside="open = false"
                class="flex items-center gap-2 w-10 h-10 rounded-xl bg-gray-100 justify-center hover:bg-gray-200 transition"
                type="button"
            >

                {{-- User Initial --}}
                <span class="w-8 h-8 rounded-lg bg-black text-white flex items-center justify-center text-sm font-semibold">
                    {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                </span>

            </button>

            {{-- Dropdown --}}
            <div
                x-show="open"
                x-transition
                style="display: none;"
                class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-xl border border-gray-100 py-2 z-50"
            >

                {{-- Customer Name --}}
                <div class="px-4 py-3 border-b border-gray-100">
                    <p class="text-xs text-gray-500">Welcome <b class="text-sm font-semibold text-gray-900 truncate">{{ auth()->user()->name }}</b></p>
                    <p class="text-xs text-gray-500 truncate">
                        {{ auth()->user()->email }}
                    </p>
                </div>

                {{-- Profile --}}
                <a href="{{ url('/profile') }}"
                   class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50">
                    👤
                    <span>My Profile</span>
                </a>

                {{-- Wishlist --}}
                <a href="{{ url('/wishlist') }}"
                   class="flex items-center justify-between px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50">

                    <span class="flex items-center gap-3">
                        ♡
                        <span>Wishlist</span>
                    </span>

                    <span class="w-5 h-5 rounded-full bg-black text-white text-[10px] flex items-center justify-center">
                        {{$globalWishlist?count($globalWishlist):''}}
                    </span>

                </a>

                {{-- Cart --}}
                <a href="{{ url('/cart') }}"
                   class="flex items-center justify-between px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50">

                    <span class="flex items-center gap-3">
                        🛒
                        <span>Cart</span>
                    </span>

                    @if($globalCart?->id)
                        <span class="w-5 h-5 rounded-full bg-black text-white text-[10px] flex items-center justify-center">
                            {{ $globalCart?->items?->sum('quantity') ?? 0 }}
                        </span>
                    @endif

                </a>

                {{-- My Orders --}}
                <a href="{{ url('/my-orders') }}"
                   class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50">
                    📦
                    <span>My Orders</span>
                </a>

                {{-- Divider --}}
                <div class="border-t border-gray-100 my-2"></div>

                {{-- Logout --}}
                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button
                        type="submit"
                        class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 text-left"
                    >
                        🚪
                        <span>Sign Out</span>
                    </button>
                </form>

            </div>
        </div>

    @else

        <a href="{{ route('userRegister') }}"
           class="rounded-lg border border-slate-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-slate-800 bg-black">
            Register
        </a>

        <a href="{{ route('userLogin') }}"
           class="rounded-lg border border-slate-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-slate-800 bg-black">
            Login
        </a>

    @endif

</div>
            </div>
        </div>
    </header>