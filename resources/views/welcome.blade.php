<!-- @extends('layouts.customer.customer-layout')

@section('title', 'SSSN | HOME')
@section('customerContent')

@include('pageparts.home.slider')
@include('pageparts.home.category')
@include('pageparts.home.feature')
@include('pageparts.home.whychooseus')
@include('pageparts.home.couponbanner')
@include('pageparts.home.reviews')
@include('pageparts.home.feedback')
@include('pageparts.home.brands')

@endsection -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'SSSN Fashion | Discover Your Style')</title>

    <link rel="icon" href="{{ asset('logo/logo.ico') }}">

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

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
</head>

<body>

    @include('msg')

    <!-- ANNOUNCEMENT BAR -->
    <div class="announcement px-4 py-3 text-center text-[10px] font-semibold uppercase tracking-[2px] sm:text-xs">
        ✦ Discover Your Style | New Collection Available Now ✦
    </div>




    <!-- HERO SECTION -->

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


    <!-- NAVBAR: STATIC -->
    <nav class="absolute left-0 top-0 z-30 w-full border-b border-white/20">

        <div class="mx-auto flex max-w-[1500px] items-center justify-between px-6 py-6 lg:px-20">

            <a href="{{ url('/') }}"
               class="fashion-font text-3xl font-bold tracking-[3px] text-white">
                SSSN
                <span class="text-sm font-normal tracking-[4px]">FASHION</span>
            </a>

            <div class="hidden items-center gap-9 md:flex">
                <a href="{{ url('/') }}" class="text-xs font-semibold uppercase tracking-[2px] text-white hover:text-[#d2b99c]">Home</a>
                <a href="{{ url('/shop') }}" class="text-xs font-semibold uppercase tracking-[2px] text-white hover:text-[#d2b99c]">Shop</a>
                <a href="#categories" class="text-xs font-semibold uppercase tracking-[2px] text-white hover:text-[#d2b99c]">Categories</a>
                <a href="#brands" class="text-xs font-semibold uppercase tracking-[2px] text-white hover:text-[#d2b99c]">Brands</a>
                <a href="#contact" class="text-xs font-semibold uppercase tracking-[2px] text-white hover:text-[#d2b99c]">Contact</a>
            </div>

            <div class="flex items-center gap-5">
                <a href="{{ route('userLogin') }}" class="text-xs font-semibold uppercase tracking-[2px] text-white hover:text-[#d2b99c]">
                    Login
                </a>

                <a href="{{ url('/cart') }}"
                   class="border border-white/60 px-5 py-3 text-xs font-bold uppercase tracking-[2px] text-white hover:bg-white hover:text-black">
                    Cart
                </a>
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

</section>


    <!-- CATEGORIES -->
    <section id="categories" class="mx-auto max-w-[1500px] px-5 py-20 lg:px-12 lg:py-28">

        <div class="mb-12 flex flex-col justify-between gap-5 sm:flex-row sm:items-end">

            <div>
                <p class="section-label">Explore Our World</p>

                <h2 class="fashion-font mt-4 text-4xl sm:text-5xl">
                    Shop By Category
                </h2>

                <p class="mt-4 text-sm text-[#89837d]">
                    Find your favourite styles from our collections.
                </p>
            </div>

            <a href="#collection"
               class="text-xs font-bold uppercase tracking-[2px] text-[#a58a6d]">
                View All Products →
            </a>

        </div>


        <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4 lg:gap-6">

            @forelse($categories as $category)

                @php
                    $categoryImage = $category->image ?? null;
                @endphp

                <a href="{{ url('/category/' . ($category->slug ?? $category->id)) }}"
                   class="category-card group relative block overflow-hidden bg-[#eee9e2]">

                    <div class="aspect-[4/5] overflow-hidden">

                        <img
                            src="{{ $categoryImage ? asset('storage/' . $categoryImage) : 'https://images.unsplash.com/photo-1483985988355-763728e1935b?w=600' }}"
                            alt="{{ $category->name ?? 'Fashion Category' }}"
                            loading="lazy"
                            class="h-full w-full object-cover"
                        >

                    </div>

                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>

                    <div class="absolute bottom-0 left-0 w-full p-4 text-white sm:p-6">

                        <h3 class="fashion-font text-xl sm:text-2xl">
                            {{ $category->name ?? 'Collection' }}
                        </h3>

                        <p class="mt-2 text-[9px] font-semibold uppercase tracking-[2px] text-white/80">
                            Explore Collection →
                        </p>

                    </div>

                </a>

            @empty

                <div class="col-span-full py-10 text-center text-sm text-[#89837d]">
                    Categories will be available soon.
                </div>

            @endforelse

        </div>

    </section>


    <!-- FEATURED PRODUCTS -->
    <section id="featured-products" class="bg-[#f0ece6] py-20 lg:py-24">

        <div class="mx-auto max-w-[1500px] px-5 lg:px-12">

            <div class="mb-12 text-center">

                <p class="section-label">Handpicked For You</p>

                <h2 class="fashion-font mt-4 text-4xl sm:text-5xl">
                    Featured Products
                </h2>

                <p class="mt-4 text-sm text-[#89837d]">
                    Discover pieces that make every outfit special.
                </p>

            </div>


            <div class="grid grid-cols-2 gap-4 sm:grid-cols-2 lg:grid-cols-4 lg:gap-6">

                @forelse($products->take(8) as $product)

                    @php
                        $productImage = $product->images->first()?->image ?? null;
                        $productName = $product->name ?? $product->title ?? 'Fashion Product';
                        $productPrice = $product->price ?? 0;
                        $productSlug = $product->slug ?? $product->id;
                    @endphp

                    <div class="product-card overflow-hidden bg-white">

                        <a href="{{ url('/product/' . $productSlug) }}"
                           class="relative block overflow-hidden bg-[#eee9e2]">

                            <div class="aspect-[3/4] overflow-hidden">

                                <img
                                    src="{{ $productImage ? asset('storage/' . $productImage) : 'https://images.unsplash.com/photo-1490481651871-ab68de25d43d?w=700' }}"
                                    alt="{{ $productName }}"
                                    loading="lazy"
                                    class="product-image h-full w-full object-cover"
                                >

                            </div>

                            <span class="absolute left-3 top-3 bg-white px-3 py-2 text-[9px] font-bold uppercase tracking-[1px] text-[#292524]">
                                Featured
                            </span>

                        </a>

                        <div class="p-4 sm:p-5">

                            <p class="mb-2 text-[9px] uppercase tracking-[2px] text-[#a58a6d]">
                                {{ $product->brand->name ?? 'SSSN Collection' }}
                            </p>

                            <a href="{{ url('/product/' . $productSlug) }}">

                                <h3 class="line-clamp-1 text-sm font-semibold text-[#292524]">
                                    {{ $productName }}
                                </h3>

                            </a>

                            <div class="mt-4 flex items-center justify-between gap-2">

                                <p class="text-sm font-bold text-[#292524]">
                                    ₹{{ number_format((float) $productPrice, 2) }}
                                </p>

                                <a href="{{ url('/product/' . $productSlug) }}"
                                   class="text-[10px] font-bold uppercase tracking-[1px] text-[#a58a6d]">
                                    View →
                                </a>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-span-full py-10 text-center text-sm text-[#89837d]">
                        Featured products will be available soon.
                    </div>

                @endforelse

            </div>


            <div class="mt-12 text-center">

                <a href="#collection"
                   class="inline-flex items-center gap-4 border border-[#292524] px-9 py-4 text-xs font-bold uppercase tracking-[2px] transition hover:bg-[#292524] hover:text-white">
                    Explore All Products →
                </a>

            </div>

        </div>

    </section>


    <!-- PROMOTIONAL BANNER -->
    <section class="relative overflow-hidden bg-[#292524]">

        <div class="mx-auto grid max-w-[1500px] lg:grid-cols-2">

            <div class="flex flex-col justify-center px-7 py-20 text-white sm:px-12 lg:px-20 lg:py-28">

                <p class="section-label text-[#d2b99c]">
                    A Little More You
                </p>

                <h2 class="fashion-font mt-6 text-5xl leading-tight sm:text-6xl">
                    Fashion That
                    <span class="italic text-[#d2b99c]">Feels Like You.</span>
                </h2>

                <p class="mt-6 max-w-md text-sm leading-8 text-white/60">
                    Find the perfect pieces to create your own signature style.
                    Make every day a fashion statement.
                </p>

                <div class="mt-9">

                    <a href="#collection"
                       class="inline-flex items-center gap-4 bg-[#d2b99c] px-8 py-4 text-xs font-bold uppercase tracking-[2px] text-[#292524] transition hover:bg-white">
                        Explore Collection →
                    </a>

                </div>

            </div>


            <div class="min-h-[350px] overflow-hidden lg:min-h-[550px]">

                <img
                    src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?w=1200"
                    alt="Fashion collection"
                    loading="lazy"
                    class="h-full w-full object-cover"
                >

            </div>

        </div>

    </section>


    <!-- HIGH SELLING / POPULAR BRANDS -->
    <section id="brands" class="mx-auto max-w-[1500px] px-5 py-20 lg:px-12 lg:py-28">

        <div class="mb-12 text-center">

            <p class="section-label">The Names You Love</p>

            <h2 class="fashion-font mt-4 text-4xl sm:text-5xl">
                Popular Brands
            </h2>

            <p class="mt-4 text-sm text-[#89837d]">
                Explore collections from our featured fashion brands.
            </p>

        </div>


        <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-4 lg:gap-6">

            @forelse($brands as $brand)

                @php
                    $brandLogo = $brand->logo ?? null;
                    $brandName = $brand->name ?? $brand->bname ?? 'Fashion Brand';
                @endphp

                <a href="{{ url('/brand/' . ($brand->slug ?? $brand->id)) }}"
                   class="brand-card flex min-h-[180px] flex-col items-center justify-center overflow-hidden border border-[#eee9e2] bg-white p-6 text-center">

                    @if($brandLogo)

                        <div class="flex h-20 w-full items-center justify-center overflow-hidden">

                            <img
                                src="{{ asset('storage/' . $brandLogo) }}"
                                alt="{{ $brandName }}"
                                loading="lazy"
                                class="max-h-full max-w-full object-contain"
                            >

                        </div>

                    @else

                        <h3 class="fashion-font text-2xl text-[#292524]">
                            {{ $brandName }}
                        </h3>

                    @endif

                    <p class="mt-5 text-[9px] font-bold uppercase tracking-[2px] text-[#a58a6d]">
                        Explore Brand →
                    </p>

                </a>

            @empty

                <div class="col-span-full py-10 text-center text-sm text-[#89837d]">
                    Brands will be available soon.
                </div>

            @endforelse

        </div>

    </section>


    <!-- COMPLETE PRODUCT COLLECTION -->
    <section id="collection" class="bg-white py-20 lg:py-24">

        <div class="mx-auto max-w-[1500px] px-5 lg:px-12">

            <div class="mb-12 flex flex-col justify-between gap-5 sm:flex-row sm:items-end">

                <div>

                    <p class="section-label">Made For Your Wardrobe</p>

                    <h2 class="fashion-font mt-4 text-4xl sm:text-5xl">
                        Our Collection
                    </h2>

                    <p class="mt-4 text-sm text-[#89837d]">
                        Find your next favourite look.
                    </p>

                </div>

                <p class="text-xs font-semibold uppercase tracking-[2px] text-[#a58a6d]">
                    {{ $products->count() }} Products
                </p>

            </div>


            <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-4 lg:gap-6">

                @forelse($products as $product)

                    @php
                        $productImage = $product->images->first()?->image ?? null;
                        $productName = $product->name ?? $product->title ?? 'Fashion Product';
                        $productPrice = $product->price ?? 0;
                        $productSlug = $product->slug ?? $product->id;
                    @endphp

                    <div class="product-card overflow-hidden border border-[#eee9e2] bg-white">

                        <a href="{{ url('/product/' . $productSlug) }}"
                           class="block overflow-hidden bg-[#f0ece6]">

                            <div class="aspect-[3/4] overflow-hidden">

                                <img
                                    src="{{ $productImage ? asset('storage/' . $productImage) : 'https://images.unsplash.com/photo-1490481651871-ab68de25d43d?w=700' }}"
                                    alt="{{ $productName }}"
                                    loading="lazy"
                                    class="product-image h-full w-full object-cover"
                                >

                            </div>

                        </a>

                        <div class="p-4">

                            <p class="mb-2 text-[9px] uppercase tracking-[2px] text-[#a58a6d]">
                                {{ $product->category->name ?? 'Fashion' }}
                            </p>

                            <h3 class="line-clamp-1 text-sm font-semibold">
                                {{ $productName }}
                            </h3>

                            <div class="mt-4 flex items-center justify-between gap-2">

                                <p class="text-sm font-bold">
                                    ₹{{ number_format((float) $productPrice, 2) }}
                                </p>

                                <a href="{{ url('/product/' . $productSlug) }}"
                                   class="text-[10px] font-bold uppercase tracking-[1px] text-[#a58a6d]">
                                    View Details →
                                </a>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-span-full py-10 text-center text-sm text-[#89837d]">
                        Products will be available soon.
                    </div>

                @endforelse

            </div>

        </div>

    </section>


    <!-- NEWSLETTER -->
    <section class="newsletter-section px-5 py-20 lg:py-24">

        <div class="mx-auto max-w-3xl text-center">

            <p class="section-label">
                Stay In Style
            </p>

            <h2 class="fashion-font mt-5 text-4xl leading-tight sm:text-5xl">
                Get Inspired. Stay Updated.
            </h2>

            <p class="mx-auto mt-5 max-w-lg text-sm leading-7 text-[#89837d]">
                Discover new collections, latest arrivals and fashion inspiration.
                Be part of the SSSN Fashion community.
            </p>

            <form action="#" method="POST" class="mx-auto mt-9 flex max-w-xl flex-col gap-3 sm:flex-row">

                <input
                    type="email"
                    name="email"
                    placeholder="Enter your email address"
                    required
                    class="min-w-0 flex-1 border border-[#d9d0c5] bg-white px-5 py-4 text-sm outline-none focus:border-[#a58a6d]"
                >

                <button
                    type="submit"
                    class="bg-[#292524] px-8 py-4 text-xs font-bold uppercase tracking-[2px] text-white transition hover:bg-[#59483a]"
                >
                    Subscribe
                </button>

            </form>

        </div>

    </section>


    <!-- FOOTER -->
    <footer class="bg-[#292524] text-white">

        <div class="mx-auto grid max-w-[1500px] gap-12 px-6 py-16 sm:grid-cols-2 lg:grid-cols-4 lg:px-12 lg:py-20">

            <!-- Brand -->
            <div>

                <h2 class="text-3xl font-extrabold tracking-[5px]">
                    SSSN
                </h2>

                <p class="mt-2 text-[9px] uppercase tracking-[4px] text-[#d2b99c]">
                    Fashion & Lifestyle
                </p>

                <p class="mt-6 max-w-xs text-sm leading-7 text-white/50">
                    Discover your style. Express your personality.
                    Make every moment fashionable.
                </p>

            </div>


            <!-- Quick Links -->
            <div>

                <h3 class="mb-6 text-xs font-bold uppercase tracking-[3px] text-[#d2b99c]">
                    Quick Links
                </h3>

                <div class="flex flex-col gap-4 text-sm text-white/60">

                    <a href="{{ url('/') }}" class="footer-link">Home</a>

                    <a href="#categories" class="footer-link">Categories</a>

                    <a href="#featured-products" class="footer-link">Featured Products</a>

                    <a href="#brands" class="footer-link">Brands</a>

                    <a href="#collection" class="footer-link">Shop Collection</a>

                </div>

            </div>


            <!-- Account -->
            <div>

                <h3 class="mb-6 text-xs font-bold uppercase tracking-[3px] text-[#d2b99c]">
                    My Account
                </h3>

                <div class="flex flex-col gap-4 text-sm text-white/60">

                    <a href="{{ url('/login') }}" class="footer-link">Login</a>

                    <a href="{{ url('/register') }}" class="footer-link">Create Account</a>

                    <a href="#" class="footer-link">My Orders</a>

                    <a href="#" class="footer-link">Wishlist</a>

                </div>

            </div>


            <!-- Contact -->
            <div>

                <h3 class="mb-6 text-xs font-bold uppercase tracking-[3px] text-[#d2b99c]">
                    Get In Touch
                </h3>

                <div class="flex flex-col gap-4 text-sm text-white/60">

                    <p>Fashion & Lifestyle</p>

                    <a href="mailto:info@sssnworld.com" class="footer-link">
                        info@sssnworld.com
                    </a>

                    <p>Thank you for shopping with SSSN.</p>

                </div>

            </div>

        </div>


        <!-- Copyright -->
        <div class="border-t border-white/10">

            <div class="mx-auto flex max-w-[1500px] flex-col justify-between gap-3 px-6 py-6 text-center text-[10px] uppercase tracking-[2px] text-white/40 sm:flex-row sm:text-left lg:px-12">

                <p>
                    © {{ date('Y') }} SSSN Fashion. All Rights Reserved.
                </p>

                <p>
                    Designed For Your Style.
                </p>

            </div>

        </div>

    </footer>

</body>
</html>
