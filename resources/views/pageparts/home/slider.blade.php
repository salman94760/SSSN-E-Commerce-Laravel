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
<section
    x-data="{
        active: 0,
        images: [
            'https://images.unsplash.com/photo-1441986300917-64674bd600d8?q=80&w=2000',
            'https://images.unsplash.com/photo-1529139574466-a303027c1d8b?q=80&w=2000',
            'https://images.unsplash.com/photo-1483985988355-763728e1935b?q=80&w=2000'
        ],
        init() {
            setInterval(() => {
                this.active = (this.active + 1) % this.images.length;
            }, 5000);
        }
    }"
    class="relative min-h-[580px] overflow-hidden sm:min-h-[650px] lg:min-h-[720px]"
>

    <!-- BACKGROUND IMAGES: ONLY THIS PART CHANGES -->
    <template x-for="(image, index) in images" :key="index">
        <div
            x-show="active === index"
            x-transition:enter="transition-opacity duration-1000 ease-in-out"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            class="absolute inset-0"
        >
            <img
                :src="image"
                alt="Fashion Collection"
                class="h-full w-full object-cover"
            >
        </div>
    </template>

    <!-- FIXED OVERLAY -->
    <div class="absolute inset-0 bg-black/60"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/50 to-black/20"></div>



<!-- NAVBAR -->


<nav class="absolute left-0 top-0 z-30 w-full border-b border-white/20">
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

                    @if(isset($cartCount) && $cartCount > 0)
                        <span class="absolute -right-3 -top-3 flex h-5 min-w-5 items-center justify-center rounded-full bg-[#d2b99c] px-1 text-[10px] font-bold text-[#493825]">
                            {{ $cartCount }}
                        </span>
                    @endif
                </a>

                {{-- MY ORDERS OUTSIDE --}}
                <a href="{{ url('/orders') }}"
                   class="relative flex items-center gap-2 text-white transition hover:text-[#d2b99c]"
                   title="My Orders">

                    <i class="fa-solid fa-box-open text-xl"></i>

                    <span class="nav-link hidden text-[10px] font-semibold uppercase tracking-[1.5px] lg:inline">
                        Orders
                    </span>

                    @if(isset($recentOrderCount) && $recentOrderCount > 0)
                        <span class="absolute -right-3 -top-3 flex h-5 min-w-5 items-center justify-center rounded-full bg-[#d2b99c] px-1 text-[10px] font-bold text-[#493825]">
                            {{ $recentOrderCount }}
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

                        <a href="{{ url('/returns') }}" class="dropdown-link">
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
                            <button type="submit" class="dropdown-link logout-link">
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





    <!-- HERO CONTENT: STATIC, NEVER CHANGES -->
    <div class="relative z-10 mx-auto flex min-h-[580px] max-w-[1500px] items-center px-6 py-24 sm:min-h-[650px] lg:min-h-[720px] lg:px-20">

        <div class="max-w-2xl text-white">

            <p class="mb-6 text-xs font-bold uppercase tracking-[5px] text-[#d2b99c]">
                The New Season Collection
            </p>

            <h2 class="fashion-font text-5xl leading-tight sm:text-6xl lg:text-7xl">
                Dress Like
                <span class="italic text-[#d2b99c]">You Mean It.</span>
            </h2>

            <p class="mt-7 max-w-lg text-sm leading-8 text-white/80 sm:text-base">
                Discover timeless fashion, explore modern essentials
                and express your personality with styles made for you.
            </p>

            <div class="mt-10 flex flex-wrap items-center gap-4">

                <a href="{{ url('/shop') }}"
                   class="shop-button inline-flex items-center gap-4 bg-[#d2b99c] px-8 py-4 text-xs font-bold uppercase tracking-[2px] text-[#292524]">
                    Shop Collection
                    <span>→</span>
                </a>

                <a href="#categories"
                   class="inline-flex items-center gap-2 border border-white/60 px-8 py-4 text-xs font-bold uppercase tracking-[2px] text-white transition hover:bg-white hover:text-[#292524]">
                    Explore More
                </a>

            </div>

            <div class="mt-14 flex items-center gap-8 border-t border-white/25 pt-7">

                <div>
                    <p class="fashion-font text-3xl">Style</p>
                    <p class="mt-1 text-[9px] uppercase tracking-[2px] text-white/60">Your Way</p>
                </div>

                <div class="h-10 w-px bg-white/30"></div>

                <div>
                    <p class="fashion-font text-3xl">Quality</p>
                    <p class="mt-1 text-[9px] uppercase tracking-[2px] text-white/60">Always</p>
                </div>

                <div class="h-10 w-px bg-white/30"></div>

                <div>
                    <p class="fashion-font text-3xl">Elegance</p>
                    <p class="mt-1 text-[9px] uppercase tracking-[2px] text-white/60">Everyday</p>
                </div>

            </div>

        </div>

    </div>


    <!-- SLIDER ARROWS -->
    <button
        @click="active = (active - 1 + images.length) % images.length"
        class="absolute left-5 top-1/2 z-20 flex h-12 w-12 -translate-y-1/2 items-center justify-center rounded-full border border-white/30 bg-white/10 text-xl text-white backdrop-blur-md hover:bg-white hover:text-black">
        ←
    </button>

    <button
        @click="active = (active + 1) % images.length"
        class="absolute right-5 top-1/2 z-20 flex h-12 w-12 -translate-y-1/2 items-center justify-center rounded-full border border-white/30 bg-white/10 text-xl text-white backdrop-blur-md hover:bg-white hover:text-black">
        →
    </button>


    <!-- SLIDER DOTS -->
    <div class="absolute bottom-8 left-1/2 z-20 flex -translate-x-1/2 items-center gap-2">

        <template x-for="(image, index) in images" :key="index">
            <button
                @click="active = index"
                class="h-2 rounded-full transition-all duration-300"
                :class="active === index ? 'w-10 bg-[#d2b99c]' : 'w-2 bg-white/50'">
            </button>
        </template>

    </div>
<script>
    
function toggleUserMenu() {
    document.getElementById('userDropdown').classList.toggle('show');
}

document.addEventListener('click', function(event) {
    const menu = document.querySelector('.user-menu');
    const dropdown = document.getElementById('userDropdown');

    if (menu && dropdown && !menu.contains(event.target)) {
        dropdown.classList.remove('show');
    }
});

</script>
</section>