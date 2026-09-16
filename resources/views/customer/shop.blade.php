@extends('layouts.customer.customer-layout')

@section('title', 'SSSN | SHOP')

@section('customerContent')

{{-- =========================================================
SHOP HERO
========================================================= --}}



{{-- =========================================================
SHOP MAIN
========================================================= --}}

<main class="w-full mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <div class="flex flex-col lg:flex-row gap-8">

        {{-- =================================================
            SIDEBAR
        ================================================= --}}
        <aside class="lg:w-64 xl:w-72 flex-shrink-0">

            {{-- MOBILE FILTER BUTTON --}}
            <button
                type="button"
                onclick="document.getElementById('filterBox').classList.toggle('hidden')"
                class="lg:hidden w-full mb-4 flex items-center justify-between
                       bg-white border border-slate-200 rounded-2xl px-4 py-3
                       font-semibold text-slate-800
                       shadow-sm hover:shadow-md hover:border-slate-300
                       transition-all duration-200">
                <span>Filters</span>
                <span class="text-slate-500">☰</span>
            </button>


            {{-- FILTER BOX --}}
            <div
                id="filterBox"
                class="hidden lg:block bg-white border border-slate-200
                       rounded-2xl p-5 sticky top-24
                       shadow-[0_8px_30px_rgba(15,23,42,0.06)]">

                {{-- =========================================
                    CATEGORIES
                ========================================== --}}
                <div>

                    <div class="flex items-center justify-between">

                        <h3 class="font-bold text-slate-900">
                            Categories
                        </h3>

                        <span class="text-xs text-slate-400">
                            {{ $productCount }}
                        </span>

                    </div>


                    <div class="mt-4 space-y-1">

                        {{-- ALL PRODUCTS --}}
                        <a
                            href="{{ url('/shop') }}"
                            class="flex items-center justify-between px-3 py-2.5
                                   rounded-xl text-sm transition-all duration-200
                                   {{ !request('category')
                                       ? 'bg-slate-900 text-white shadow-md shadow-slate-900/15'
                                       : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}"
                        >

                            <span>
                                All Products
                            </span>

                            <span class="text-xs opacity-70">
                                {{ $productCount }}
                            </span>

                        </a>


                        {{-- CATEGORIES --}}
                        @foreach($categories as $category)

                            @if($category->products_count > 0)

                                <a
                                    href="{{ url('/shop') }}?category={{ $category->slug }}"
                                    class="flex items-center justify-between px-3 py-2.5
                                           rounded-xl text-sm transition-all duration-200
                                           {{ request('category') === $category->slug
                                               ? 'bg-slate-900 text-white shadow-md shadow-slate-900/15'
                                               : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}"
                                >

                                    <span>
                                        {{ $category->name }}
                                    </span>

                                    <span class="text-xs opacity-70">
                                        {{ $category->products_count }}
                                    </span>

                                </a>

                            @endif

                        @endforeach

                    </div>

                </div>


                <div class="border-t border-slate-100 my-6"></div>


                {{-- =========================================
                    MULTIPLE SIZE FILTER
                ========================================== --}}
                <div>

                    <div class="flex items-center justify-between">

                        <h3 class="font-bold text-slate-900">
                            Size
                        </h3>

                        @if(request('size'))

                            <a
                                href="{{ url('/shop') }}"
                                class="text-xs text-slate-400 hover:text-slate-900 transition"
                            >
                                Clear
                            </a>

                        @endif

                    </div>


                    <form
                        action="{{ url('/shop') }}"
                        method="GET"
                        class="mt-4"
                    >

                        {{-- SEARCH PRESERVE --}}
                        @if(request('search'))

                            <input
                                type="hidden"
                                name="search"
                                value="{{ request('search') }}"
                            >

                        @endif


                        {{-- CATEGORY PRESERVE --}}
                        @if(request('category'))

                            <input
                                type="hidden"
                                name="category"
                                value="{{ request('category') }}"
                            >

                        @endif


                        {{-- SORT PRESERVE --}}
                        @if(request('sort'))

                            <input
                                type="hidden"
                                name="sort"
                                value="{{ request('sort') }}"
                            >

                        @endif


                        @php

                            $selectedSizes = request('size', []);

                            if (!is_array($selectedSizes)) {
                                $selectedSizes = [$selectedSizes];
                            }

                        @endphp


                        <div class="grid grid-cols-3 gap-2">

                            @foreach($sizes as $size)

                                @php

                                    $isSelected = in_array(
                                        $size->name,
                                        $selectedSizes
                                    );

                                @endphp


                                <label class="cursor-pointer">

                                    <input
                                        type="checkbox"
                                        name="size[]"
                                        value="{{ $size->name }}"
                                        class="hidden peer"
                                        {{ $isSelected ? 'checked' : '' }}
                                    >

                                    <span
                                        class="h-10 px-2 rounded-xl border
                                               border-slate-200
                                               bg-white
                                               flex items-center justify-center
                                               text-xs font-semibold
                                               text-slate-600
                                               transition-all duration-200
                                               hover:border-slate-400
                                               hover:bg-slate-50
                                               peer-checked:bg-slate-900
                                               peer-checked:text-white
                                               peer-checked:border-slate-900
                                               peer-checked:shadow-sm"
                                    >
                                        {{ $size->name }}
                                    </span>

                                </label>

                            @endforeach

                        </div>


                        {{-- APPLY SIZE --}}
                        <button
                            type="submit"
                            class="w-full mt-4 py-2.5
                                   bg-slate-900 text-white
                                   rounded-xl text-sm font-semibold
                                   shadow-sm
                                   hover:bg-slate-800
                                   hover:shadow-lg hover:shadow-slate-900/15
                                   active:scale-[0.98]
                                   transition-all duration-200"
                        >
                            Apply Size
                        </button>

                    </form>

                </div>


                <div class="border-t border-slate-100 my-6"></div>


                {{-- =========================================
                    RATING
                ========================================== --}}
                <div>

                    <h3 class="font-bold text-slate-900">
                        Rating
                    </h3>


                    <div class="space-y-3 mt-4">

                        @foreach([5, 4, 3] as $rating)

                            <label class="flex items-center gap-2 cursor-pointer group">

                                <input
                                    type="checkbox"
                                    name="rating"
                                    value="{{ $rating }}"
                                    class="rounded border-slate-300
                                           text-slate-900
                                           focus:ring-slate-900"
                                >

                                <span class="text-amber-400 text-sm
                                             group-hover:text-amber-500 transition">

                                    {{ str_repeat('★', $rating) }}

                                    <span class="text-slate-400">
                                        & up
                                    </span>

                                </span>

                            </label>

                        @endforeach

                    </div>

                </div>


                {{-- CLEAR FILTERS --}}
                <a
                    href="{{ url('/shop') }}"
                    class="block w-full mt-6 py-2.5
                           border border-slate-200
                           rounded-xl text-sm font-semibold
                           text-center text-slate-600
                           hover:bg-slate-50
                           hover:text-slate-900
                           hover:border-slate-300
                           transition-all duration-200"
                >
                    Clear Filters
                </a>

            </div>

        </aside>



        {{-- =================================================
            PRODUCTS AREA
        ================================================= --}}
        <div class="flex-1 min-w-0">


            {{-- =============================================
                TOP BAR
            ============================================== --}}
            <div class="flex flex-col lg:flex-row lg:items-center
                        justify-between gap-4 mb-6">


                {{-- LEFT --}}
                <div>

                    <h2 class="font-bold text-xl text-slate-900">
                        All Products
                    </h2>

                    <p class="text-sm text-slate-500 mt-1">
                        Showing {{ $products->total() }} products
                    </p>

                </div>


                {{-- RIGHT --}}
                <div class="flex flex-col sm:flex-row
                            items-stretch sm:items-center gap-3">


                    {{-- =====================================
                        SEARCH
                    ====================================== --}}
                    <form
                        action="{{ url('/shop') }}"
                        method="GET"
                        class="relative"
                    >

                        {{-- CATEGORY --}}
                        @if(request('category'))

                            <input
                                type="hidden"
                                name="category"
                                value="{{ request('category') }}"
                            >

                        @endif


                        {{-- SORT --}}
                        @if(request('sort'))

                            <input
                                type="hidden"
                                name="sort"
                                value="{{ request('sort') }}"
                            >

                        @endif


                        {{-- MULTIPLE SIZE --}}
                        @foreach((array) request('size', []) as $selectedSize)

                            <input
                                type="hidden"
                                name="size[]"
                                value="{{ $selectedSize }}"
                            >

                        @endforeach


                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Search products..."
                            class="w-full sm:w-64 lg:w-72 h-11
                                   pl-10 pr-20
                                   rounded-xl
                                   border border-slate-200
                                   bg-white
                                   text-slate-800
                                   placeholder:text-slate-400
                                   shadow-sm
                                   focus:border-slate-400
                                   focus:ring-4 focus:ring-slate-100
                                   outline-none
                                   transition-all duration-200"
                        >


                        <span
                            class="absolute left-3.5 top-1/2
                                   -translate-y-1/2
                                   text-slate-400"
                        >
                            🔍
                        </span>


                        <button
                            type="submit"
                            class="absolute right-1.5 top-1.5
                                   h-8 px-3
                                   bg-slate-900 text-white
                                   rounded-lg
                                   text-xs font-semibold
                                   hover:bg-slate-800
                                   hover:shadow-md
                                   transition-all duration-200"
                        >
                            Search
                        </button>

                    </form>



                    {{-- =====================================
                        SORT
                    ====================================== --}}
                    <div class="flex items-center gap-2">

                        <span class="hidden xl:block text-sm text-slate-500">
                            Sort by
                        </span>


                        <select
                            id="filters"
                            onchange="reloadFilter()"
                            class="h-11 px-4
                                   rounded-xl
                                   border border-slate-200
                                   bg-white
                                   text-slate-700
                                   text-sm font-medium
                                   shadow-sm
                                   outline-none
                                   focus:border-slate-400
                                   focus:ring-4 focus:ring-slate-100
                                   transition-all duration-200"
                        >

                            <option
                                value=""
                                {{ !request('sort') ? 'selected' : '' }}
                            >
                                Featured
                            </option>


                            <option
                                value="newest"
                                {{ request('sort') === 'newest' ? 'selected' : '' }}
                            >
                                Newest
                            </option>


                            <option
                                value="low"
                                {{ request('sort') === 'low' ? 'selected' : '' }}
                            >
                                Price: Low to High
                            </option>


                            <option
                                value="high"
                                {{ request('sort') === 'high' ? 'selected' : '' }}
                            >
                                Price: High to Low
                            </option>

                            <option
                                value="asc"
                                {{ request('sort') === 'asc' ? 'selected' : '' }}
                            >
                                Product : A-Z
                            </option>

                            <option
                                value="desc"
                                {{ request('sort') === 'desc' ? 'selected' : '' }}
                            >
                                Product : Z-A
                            </option>

                        </select>

                    </div>

                </div>

            </div>



            {{-- =============================================
                ACTIVE FILTERS
            ============================================== --}}
            @if(request('search') || request('category') || request('size'))

                <div class="flex flex-wrap items-center gap-2 mb-6">

                    <span class="text-xs text-slate-400 mr-1">
                        Filters:
                    </span>


                    {{-- SEARCH --}}
                    @if(request('search'))

                        <span
                            class="inline-flex items-center px-3 py-1.5
                                   rounded-full
                                   bg-slate-100
                                   text-slate-700
                                   text-xs font-medium"
                        >
                            Search: {{ request('search') }}
                        </span>

                    @endif


                    {{-- CATEGORY --}}
                    @if(request('category'))

                        <span
                            class="inline-flex items-center px-3 py-1.5
                                   rounded-full
                                   bg-slate-100
                                   text-slate-700
                                   text-xs font-medium"
                        >
                            Category: {{ request('category') }}
                        </span>

                    @endif


                    {{-- SIZES --}}
                    @php

                        $activeSizes = request('size', []);

                        if (!is_array($activeSizes)) {
                            $activeSizes = [$activeSizes];
                        }

                    @endphp


                    @foreach($activeSizes as $activeSize)

                        <span
                            class="inline-flex items-center px-3 py-1.5
                                   rounded-full
                                   bg-slate-900
                                   text-white
                                   text-xs font-medium
                                   shadow-sm"
                        >
                            Size: {{ $activeSize }}
                        </span>

                    @endforeach


                    {{-- CLEAR ALL --}}
                    <a
                        href="{{ url('/shop') }}"
                        class="text-xs font-semibold
                               text-slate-600
                               underline ml-1
                               hover:text-slate-900
                               hover:no-underline
                               transition"
                    >
                        Clear all
                    </a>

                </div>

            @endif



            {{-- =============================================
                PRODUCT GRID
            ============================================== --}}
            <div
                class="grid
                       grid-cols-2
                       sm:grid-cols-3
                       lg:grid-cols-4
                       xl:grid-cols-5
                       2xl:grid-cols-6
                       gap-4
                       sm:gap-5"
            >

                @forelse($products as $product)

                    <x-products.productCard :product="$product" />

                @empty

                    {{-- EMPTY STATE --}}
                    <div class="col-span-full py-20 text-center">

                        <div class="text-5xl mb-5">
                            🔍
                        </div>


                        <h3 class="font-bold text-lg text-slate-900">
                            No products found
                        </h3>


                        <p class="text-sm text-slate-500 mt-2">
                            Try changing your search or filters.
                        </p>


                        <a
                            href="{{ url('/shop') }}"
                            class="inline-flex mt-5
                                   px-5 py-2.5
                                   bg-slate-900 text-white
                                   rounded-xl
                                   text-sm font-semibold
                                   shadow-sm
                                   hover:bg-slate-800
                                   hover:shadow-lg
                                   transition-all duration-200"
                        >
                            View All Products
                        </a>

                    </div>

                @endforelse

            </div>



            {{-- =============================================
                PAGINATION
            ============================================== --}}
            @if($products->hasPages())

                <div class="flex items-center justify-center
                            gap-1.5 mt-10">


                    {{-- PREVIOUS --}}
                    @if($products->onFirstPage())

                        <span
                            class="w-9 h-9
                                   rounded-xl
                                   border border-slate-200
                                   flex items-center justify-center
                                   text-slate-300 text-sm"
                        >
                            ←
                        </span>

                    @else

                        <a
                            href="{{ $products->previousPageUrl() }}"
                            class="w-9 h-9
                                   rounded-xl
                                   border border-slate-200
                                   flex items-center justify-center
                                   text-slate-600 text-sm
                                   hover:bg-slate-900
                                   hover:text-white
                                   hover:border-slate-900
                                   hover:shadow-md
                                   transition-all duration-200"
                        >
                            ←
                        </a>

                    @endif



                    {{-- PAGE NUMBERS --}}
                    @foreach(
                        $products->getUrlRange(
                            max(1, $products->currentPage() - 2),
                            min($products->lastPage(), $products->currentPage() + 2)
                        ) as $page => $url
                    )

                        @if($page == $products->currentPage())

                            <span
                                class="w-9 h-9
                                       rounded-xl
                                       bg-slate-900 text-white
                                       flex items-center justify-center
                                       text-sm font-semibold
                                       shadow-md shadow-slate-900/15"
                            >
                                {{ $page }}
                            </span>

                        @else

                            <a
                                href="{{ $url }}"
                                class="w-9 h-9
                                       rounded-xl
                                       border border-slate-200
                                       flex items-center justify-center
                                       text-slate-600
                                       text-sm font-medium
                                       hover:bg-slate-900
                                       hover:text-white
                                       hover:border-slate-900
                                       hover:shadow-md
                                       transition-all duration-200"
                            >
                                {{ $page }}
                            </a>

                        @endif

                    @endforeach



                    {{-- NEXT --}}
                    @if($products->hasMorePages())

                        <a
                            href="{{ $products->nextPageUrl() }}"
                            class="w-9 h-9
                                   rounded-xl
                                   border border-slate-200
                                   flex items-center justify-center
                                   text-slate-600 text-sm
                                   hover:bg-slate-900
                                   hover:text-white
                                   hover:border-slate-900
                                   hover:shadow-md
                                   transition-all duration-200"
                        >
                            →
                        </a>

                    @else

                        <span
                            class="w-9 h-9
                                   rounded-xl
                                   border border-slate-200
                                   flex items-center justify-center
                                   text-slate-300 text-sm"
                        >
                            →
                        </span>

                    @endif

                </div>

            @endif

        </div>

    </div>

</main>



{{-- =========================================================
NEWSLETTER
========================================================= --}}

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">

    <div
        class="rounded-3xl
               bg-gradient-to-br from-slate-950 via-slate-900 to-slate-800
               text-white
               p-8 sm:p-10
               flex flex-col lg:flex-row
               items-center justify-between
               gap-8
               shadow-[0_20px_60px_rgba(15,23,42,0.18)]"
    >

        <div>

            <p class="text-xs uppercase tracking-widest text-slate-400">
                Stay Updated
            </p>


            <h2 class="text-2xl sm:text-3xl font-bold mt-2">
                Get 10% off your first order
            </h2>


            <p class="text-sm text-slate-400 mt-2">
                Subscribe to receive new arrivals, offers and exclusive deals.
            </p>

        </div>



        <form
            method="POST"
            action="{{ route('customer.subscription') }}"
            class="flex w-full lg:w-auto
                   shadow-xl shadow-black/20
                   rounded-xl overflow-hidden"
        >

            @csrf

            <input
                type="email"
                name="email"
                required
                placeholder="Your email address"
                class="w-full lg:w-72 h-12
                       px-4
                       bg-white text-slate-900
                       placeholder:text-slate-400
                       outline-none"
            >


            <button
                type="submit"
                class="h-12 px-5
                       bg-white text-slate-900
                       font-semibold text-sm
                       hover:bg-slate-100
                       transition-all duration-200"
            >
                Subscribe
            </button>

        </form>

    </div>

</section>



{{-- =========================================================
SORT SCRIPT
========================================================= --}}

<script>

    function reloadFilter() {

        const sort = document.getElementById('filters').value;

        const url = new URL(window.location.href);

        if (sort) {

            url.searchParams.set('sort', sort);

        } else {

            url.searchParams.delete('sort');

        }

        // Reset pagination after sorting
        url.searchParams.delete('page');

        window.location.href = url.toString();

    }

</script>

@endsection