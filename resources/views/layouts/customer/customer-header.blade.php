<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- <link rel="icon" type="image/png" href="{{ asset('logo/logo.ico') }}"> -->
    <link rel="icon" type="image/png" href="{{ asset('logo/favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: 'DM Sans', sans-serif;
            color: #292524;
            background: #faf9f7;
        }

        .fashion-font {
            font-family: 'Playfair Display', serif;
        }

        .announcement {
            background: #292524;
            color: #e9d7c1;
        }

        .hero-section {
            background-image:
                linear-gradient(
                    90deg,
                    rgba(25, 21, 18, .78),
                    rgba(25, 21, 18, .35),
                    rgba(25, 21, 18, .05)
                ),
                url('https://images.unsplash.com/photo-1483985988355-763728e1935b?w=2000');

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .section-label {
            color: #a58a6d;
            letter-spacing: 4px;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .product-card {
            transition: box-shadow .3s ease;
        }

        .product-card:hover {
            box-shadow: 0 15px 40px rgba(41, 37, 36, .09);
        }

        .product-image {
            transition: transform .6s ease;
        }

        .product-card:hover .product-image {
            transform: scale(1.04);
        }

        .category-card img,
        .brand-card img {
            transition: transform .5s ease;
        }

        .category-card:hover img,
        .brand-card:hover img {
            transform: scale(1.05);
        }

        .shop-button {
            transition: all .25s ease;
        }

        .shop-button:hover {
            background: #59483a;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .15);
        }

        .nav-link {
            transition: color .2s ease;
        }

        .nav-link:hover {
            color: #a58a6d;
        }

        .newsletter-section {
            background: #eae3d9;
        }

        .footer-link {
            transition: color .2s ease;
        }

        .footer-link:hover {
            color: #d2b99c;
        }

        @media (max-width: 768px) {
            .hero-section {
                background-position: 60% center;
            }
        }
    </style>
    <style>
    

.nav-link {
    color: #fff;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 2px;
    transition: .3s ease;
}

.nav-link:hover {
    color: #d2b99c;
}

.nav-login-btn {
    color: #fff;
    border: 1px solid rgba(255,255,255,.65);
    padding: 11px 23px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 2px;
    transition: .3s ease;
}

.nav-login-btn:hover {
    background: #fff;
    color: #493825;
}

.user-menu {
    position: relative;
}

.user-menu-trigger {
    display: flex;
    align-items: center;
    gap: 10px;
    background: transparent;
    border: 1px solid rgba(255,255,255,.3);
    padding: 7px 12px;
    cursor: pointer;
    transition: .3s ease;
}

.user-menu-trigger:hover {
    border-color: #d2b99c;
    background: rgba(255,255,255,.08);
}

.user-avatar {
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: #d2b99c;
    color: #493825;
    font-size: 15px;
    font-weight: 700;
}

.user-details {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 3px;
}

.user-name {
    color: #fff;
    font-size: 12px;
    font-weight: 600;
}

.user-email {
    color: rgba(255,255,255,.75);
    font-size: 10px;
}

.user-chevron {
    color: #fff;
    font-size: 10px;
    margin-left: 5px;
}

.user-dropdown {
    display: none;
    position: absolute;
    top: calc(100% + 15px);
    right: 0;
    width: 255px;
    padding: 12px;
    background: #fffdf9;
    border: 1px solid #e8dccb;
    box-shadow: 0 12px 35px rgba(0,0,0,.18);
    z-index: 100;
}

.user-dropdown.show {
    display: block;
    animation: dropdownFade .2s ease;
}

@keyframes dropdownFade {
    from { opacity: 0; transform: translateY(8px); }
    to { opacity: 1; transform: translateY(0); }
}

.dropdown-heading {
    display: flex;
    flex-direction: column;
    gap: 5px;
    padding: 12px 10px 15px;
    border-bottom: 1px solid #e8dccb;
    margin-bottom: 7px;
}

.dropdown-heading span {
    color: #493825;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 2px;
}

.dropdown-heading small {
    color: #927d66;
    font-size: 11px;
}

.dropdown-link {
    display: flex;
    align-items: center;
    gap: 12px;
    width: 100%;
    padding: 11px 10px;
    color: #493825;
    font-size: 12px;
    text-decoration: none;
    text-align: left;
    background: transparent;
    border: 0;
    cursor: pointer;
    transition: .25s ease;
}

.dropdown-link i {
    width: 17px;
    color: #927653;
    font-size: 14px;
}

.dropdown-link:hover {
    background: #f5efe6;
    color: #8b6843;
    padding-left: 14px;
}

.dropdown-count {
    margin-left: auto;
    min-width: 20px;
    height: 20px;
    padding: 0 5px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 20px;
    background: #493825;
    color: #fff;
    font-size: 10px;
}

.dropdown-divider {
    height: 1px;
    background: #e8dccb;
    margin: 7px 0;
}

.logout-link {
    color: #9c493e;
}

.logout-link i {
    color: #9c493e;
}

.quick-actions {
    display: flex;
    align-items: center;
    gap: 19px;
}

.nav-action-icon {
    position: relative;
    color: #fff;
    font-size: 19px;
    text-decoration: none;
    transition: .3s ease;
}

.nav-action-icon:hover {
    color: #d2b99c;
}

.nav-count {
    position: absolute;
    top: -9px;
    right: -10px;
    min-width: 17px;
    height: 17px;
    padding: 0 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50px;
    background: #d2b99c;
    color: #493825;
    font-size: 10px;
    font-weight: 700;
}


</style>
</head>


<body class="bg-gray-50 text-gray-900">
    @include('msg')

<!-- NAVBAR -->


<nav class="bg-[#292524] sticky left-0 top-0 z-30 w-full border-b border-white/20">
    <div class="mx-auto flex max-w-[1500px] items-center justify-between px-6 py-6 lg:px-20">

        {{-- LOGO --}}
        <a href="{{ url('/') }}" class="fashion-font text-3xl font-bold tracking-[3px] text-white">
            SSSN
            <span class="text-sm font-normal tracking-[4px]">FASHION</span>
        </a>

        {{-- NAVIGATION --}}
        <div class="hidden items-center gap-9 md:flex">
            <a href="{{ url('/') }}" class="nav-link">Home</a>
            <a href="{{ url('/shop') }}" class="nav-link">Shop</a>
            <a href="#categories" class="nav-link">Categories</a>
            <a href="#brands" class="nav-link">Brands</a>
            <a href="#contact" class="nav-link">Contact</a>
        </div>

        {{-- RIGHT SIDE --}}
        <div class="flex items-center gap-5">

            {{-- GUEST --}}
            @guest
                <a href="{{ url('/login') }}" class="nav-login-btn">Login</a>

                <a href="{{ url('/cart') }}" class="nav-action-icon relative" title="Cart">
                    <i class="fa-solid fa-bag-shopping"></i>
                </a>
            @endguest

            {{-- AUTHENTICATED USER --}}
            @auth

                {{-- CART OUTSIDE --}}
                <a href="{{ url('/cart') }}"
                   class="relative flex items-center gap-2 text-white transition hover:text-[#d2b99c]"
                   title="My Cart">

                    <i class="fa-solid fa-bag-shopping text-xl"></i>

                    <span class="nav-link hidden text-[10px] font-semibold uppercase tracking-[1.5px] lg:inline">
                        Cart
                    </span>

                    @if(isset($globalCartCount) && $globalCartCount > 0)
                        <span class="absolute -right-3 -top-3 flex h-5 min-w-5 items-center justify-center rounded-full bg-[#d2b99c] px-1 text-[10px] font-bold text-[#493825]">
                            {{ $globalCartCount }}
                        </span>
                    @endif
                </a>

                

                {{-- USER PROFILE DROPDOWN --}}
                <div class="user-menu relative">

                    <button type="button"
                        onclick="toggleUserMenu()"
                        class="group flex items-center gap-3 rounded-full border-0 bg-transparent px-2 py-1.5 outline-none transition-all duration-300 hover:bg-white/10">

                        {{-- AVATAR --}}
                        <span class="flex h-11 w-11 min-w-[44px] items-center justify-center rounded-full bg-gradient-to-br from-[#e6d2b5] to-[#b99a72] font-serif text-lg font-semibold text-[#493825] shadow-md transition-transform duration-300 group-hover:scale-105">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </span>

                        {{-- USER DETAILS --}}
                        <span class="flex flex-col items-start gap-0.5">
                            <span class="text-[8px] font-bold uppercase tracking-[2.5px] text-[#d2b99c]">
                                Welcome Back
                            </span>

                            <span class="text-[13px] font-semibold capitalize tracking-wide text-white">
                                {{ Auth::user()->name }}
                            </span>

                            <span class="text-[10px] font-normal tracking-wide text-white/70">
                                {{ Auth::user()->email }}
                            </span>
                        </span>

                        <i class="fa-solid fa-chevron-down ml-2 text-[10px] text-[#d2b99c] transition-transform duration-300 group-hover:rotate-180"></i>
                    </button>

                    {{-- DROPDOWN MENU --}}
                    <div class="user-dropdown" id="userDropdown">

                        <div class="dropdown-heading">
                            <span>MY ACCOUNT</span>
                            <small>Welcome to SSSN Fashion</small>
                        </div>

                        <a href="{{ url('/profile') }}" class="dropdown-link">
                            <i class="fa-regular fa-user"></i>
                            <span>My Profile</span>
                        </a>

                        <a href="{{ url('/my-orders') }}" class="dropdown-link relative">
    <i class="fa-solid fa-arrow-rotate-left"></i>
    <span>Orders</span>

    @if(isset($recentOrderCount) && $recentOrderCount > 0)
        <span class="-right-3 -top-2 flex h-5 min-w-5 items-center justify-center rounded-full bg-[#d2b99c] px-1 text-[10px] font-bold text-[#493825]">
            {{ $recentOrderCount }}
        </span>
    @endif
</a>

                        <a href="{{ url('/return-refund') }}" class="dropdown-link">
                            <i class="fa-solid fa-arrow-rotate-left"></i>
                            <span>Returns & Refunds</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <a href="{{ url('/wishlist') }}" class="dropdown-link">
                            <i class="fa-regular fa-heart"></i>
                            <span>My Wishlist</span>
                            @if(isset($wishlistCount) && $wishlistCount > 0)
                                <span class="dropdown-count">{{ $wishlistCount }}</span>
                            @endif
                        </a>

                        <a href="{{ url('/notifications') }}" class="dropdown-link">
                            <i class="fa-regular fa-bell"></i>
                            <span>Notifications</span>
                            @if(isset($notificationCount) && $notificationCount > 0)
                                <span class="dropdown-count">{{ $notificationCount }}</span>
                            @endif
                        </a>

                        <div class="dropdown-divider"></div>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="font-bold dropdown-link logout-link">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                <span>Logout</span>
                            </button>
                        </form>

                    </div>
                </div>

                {{-- QUICK ICONS: WISHLIST + NOTIFICATIONS --}}
                <div class="quick-actions">
                    <a href="{{ url('/wishlist') }}" class="nav-action-icon relative" title="Wishlist">
                        <i class="fa-regular fa-heart"></i>
                        @if(isset($wishlistCount) && $wishlistCount > 0)
                            <span class="nav-count">{{ $wishlistCount }}</span>
                        @endif
                    </a>

                    <a href="{{ url('/notifications') }}" class="nav-action-icon relative" title="Notifications">
                        <i class="fa-regular fa-bell"></i>
                        @if(isset($notificationCount) && $notificationCount > 0)
                            <span class="nav-count">{{ $notificationCount }}</span>
                        @endif
                    </a>
                </div>

            @endauth

        </div>
    </div>
</nav>

    





    @yield('content')


</body>
</html>