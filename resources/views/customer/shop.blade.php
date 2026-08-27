@extends('layouts.customer.customer-layout')
@section('title', 'SSSN | SHOP')
@section('customerContent')

<section class="bg-white border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
        <div class="text-center max-w-2xl mx-auto">
            <span class="inline-flex items-center px-4 py-2 rounded-full bg-gray-100 text-gray-600 text-xs font-semibold uppercase tracking-wider">Our Collection</span>

            <h1 class="text-4xl sm:text-5xl font-bold tracking-tight mt-5">
                Find Something
                <span class="text-gray-400">You'll Love</span>
            </h1>
            <p class="text-gray-500 mt-5 leading-7">Explore our latest collection of premium fashion and everyday essentials.
            </p>
        </div>

        {{-- Search --}}
        <div class="max-w-2xl mx-auto mt-8">
            <form action="{{ url('/shop') }}" method="GET" class="relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products..." class="w-full h-14 pl-12 pr-28 rounded-2xl border border-gray-200 bg-gray-50 focus:bg-white focus:border-black focus:ring-0 outline-none">

                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">🔍</span>
                <button class="absolute right-2 top-2 h-10 px-5 bg-black text-white rounded-xl text-sm font-semibold">Search</button>
            </form>
        </div>
    </div>
</section>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="flex flex-col lg:flex-row gap-8">
        <aside class="lg:w-64 flex-shrink-0">
            <button onclick="document.getElementById('filterBox').classList.toggle('hidden')" class="lg:hidden w-full mb-4 flex items-center justify-between bg-white border rounded-xl px-4 py-3 font-semibold">
                <span>Filters</span>
                <span>☰</span>
            </button>

            <div id="filterBox" class="hidden lg:block bg-white border border-gray-200 rounded-2xl p-5">
                <div>
                    <h3 class="font-bold">Categories</h3>
                    <div class="mt-4 space-y-2">
                        <a href="{{ url('/shop') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl {{ !request('category') ? 'bg-black text-white' : 'hover:bg-gray-100 text-gray-600' }}">
                            <span class="text-sm">All Products</span>
                            <span class="text-xs">{{$productCount}}</span>
                        </a>

                        @foreach($categories as $category)
                            @if($category->products_count > 0)
                            <a href="?category={{$category->slug}}" class="flex items-center justify-between px-3 py-2.5 rounded-xl hover:bg-gray-100 text-gray-600 {{ (request('category') === $category->slug) ? 'bg-black text-white' : 'hover:bg-gray-100 text-gray-600' }}">
                                <span class="text-sm">{{$category->name}}</span>
                                <span class="text-xs">{{$category->products_count}}</span>
                            </a>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- <div class="border-t my-6"></div> -->

                {{-- Price --}}
<!--                 <div>
                    <h3 class="font-bold">Price Range</h3>

                    <div class="flex gap-2 mt-4">

                        <input
                            type="number"
                            placeholder="Min"
                            class="w-1/2 px-3 py-2.5
                                   border rounded-xl
                                   text-sm">

                        <input
                            type="number"
                            placeholder="Max"
                            class="w-1/2 px-3 py-2.5
                                   border rounded-xl
                                   text-sm">

                    </div>

                    <button
                        class="w-full mt-3
                               bg-black text-white
                               rounded-xl py-2.5
                               text-sm font-semibold">

                        Apply

                    </button>

                </div> -->


                <div class="border-t my-6"></div>


                {{-- Sizes --}}
                <div>

                    <h3 class="font-bold">
                        Size
                    </h3>

                    <div class="grid grid-cols-4 gap-2 mt-4">
                        @foreach(['S','M','L','XL','XXL','3XL'] as $size)
                        <a href="?size={{ $size }}" class="text-sm text-base text-center hover:border-black h-10 rounded-lg border border-gray-200 inline-flex items-center justify-center 
                            {{ request('size') === $size ? 'bg-black text-white': 'hover:bg-gray-100 text-gray-600' }}"
                        >
                            {{ $size }}
                        </a>
                        @endforeach
                    </div>
                </div>


                <div class="border-t my-6"></div>


                {{-- Rating --}}
                <div>

                    <h3 class="font-bold">
                        Rating
                    </h3>

                    <div class="space-y-3 mt-4">

                        @foreach([5,4,3] as $rating)

                            <label class="flex items-center
                                          gap-2 cursor-pointer">

                                <input type="checkbox"
                                       class="rounded border-gray-300">

                                <span class="text-yellow-500 text-sm">
                                    {{ str_repeat('★', $rating) }}
                                    <span class="text-gray-400">
                                        & up
                                    </span>
                                </span>

                            </label>

                        @endforeach

                    </div>

                </div>


                <button
                    class="w-full mt-6 py-2.5
                           border border-gray-300
                           rounded-xl text-sm
                           font-semibold
                           hover:bg-gray-50">

                       <a href="/shop"> Clear Filters</a>

                </button>

            </div>

        </aside>

        <div class="flex-1">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                <div>
                    <h2 class="font-bold text-xl">All Products</h2>
                    <p class="text-sm text-gray-500 mt-1">Showing {{$products->lastItem()}} products</p>
                </div>

                <div class="flex items-center gap-3">
                    <span class="hidden sm:block text-sm text-gray-500">Sort by</span>
                    <select class="h-11 px-4 rounded-xl border border-gray-200 bg-white text-sm font-medium outline-none">
                        <option>Featured</option>
                        <option>Newest</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Top Rated</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6">
                @foreach($products as $product)
                    <x-products.productCard :product="$product" />
                @endforeach
            </div>

            {{-- Pagination --}}
            @if ($products->hasPages())
            <div class="flex items-center justify-center gap-1.5 mt-10">

            {{-- Previous --}}
            @if ($products->onFirstPage())
            <span class="w-9 h-9 rounded-lg border flex items-center justify-center text-gray-300 text-sm">←</span>
            @else
            <a href="{{ $products->previousPageUrl() }}" class="w-9 h-9 rounded-lg border flex items-center justify-center text-sm hover:bg-black hover:text-white transition">←</a>
            @endif

            {{-- Pages --}}
            @foreach ($products->getUrlRange(
                max(1, $products->currentPage() - 2),
                min($products->lastPage(), $products->currentPage() + 2)
            ) as $page => $url)
                
                @if ($page == $products->currentPage())
                <span class="w-9 h-9 rounded-lg bg-black text-white flex items-center justify-center text-sm font-semibold">{{ $page }}</span>
                @else
                <a href="{{ $url }}" class="w-9 h-9 rounded-lg border flex items-center justify-center text-sm font-medium hover:bg-black hover:text-white transition">
                    {{ $page }}
                </a>
                @endif
            @endforeach


            {{-- Next --}}
            @if ($products->hasMorePages())
            <a href="{{ $products->nextPageUrl() }}" class="w-9 h-9 rounded-lg border flex items-center justify-center text-sm hover:bg-black hover:text-white transition">→
            </a>
            @else
            <span class="w-9 h-9 rounded-lg border flex items-center justify-center text-gray-300 text-sm">→</span>
            @endif
        </div>
        @endif
        </div>
    </div>
</main>


{{-- NEWSLETTER --}}

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
    <div class="rounded-3xl bg-gray-900 text-white p-8 sm:p-10 flex flex-col lg:flex-row items-center justify-between gap-8">
        <div>
            <p class="text-xs uppercase tracking-widest text-gray-400">
                Stay Updated
            </p>

            <h2 class="text-2xl sm:text-3xl font-bold mt-2">
                Get 10% off your first order
            </h2>

            <p class="text-sm text-gray-400 mt-2">
                Subscribe to receive new arrivals, offers and exclusive deals.
            </p>
        </div>

        <form class="flex w-full lg:w-auto">
            <input type="email" placeholder="Your email address" class="w-full lg:w-72 h-12 px-4 rounded-l-xl bg-white text-black outline-none">
            <button class="h-12 px-5 bg-white text-black rounded-r-xl font-semibold text-sm">
                Subscribe
            </button>
        </form>
    </div>
</section>
@endsection