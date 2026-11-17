@extends('layouts.customer.customer-layout')

@section('title', 'SSSN | SHOP')

@section('customerContent')
{{-- NAVBAR: STATIC --}}
<nav class="announcement sticky left-0 top-0 z-30 w-full border-b border-white/20">

    <div class="mx-auto flex max-w-[1500px] items-center justify-between px-6 py-6 lg:px-20">

        {{-- LOGO --}}
        <a href="{{ url('/') }}"
           class="fashion-font text-3xl font-bold tracking-[3px] text-white">
            SSSN
            <span class="text-sm font-normal tracking-[4px]">FASHION</span>
        </a>

        {{-- NAVIGATION LINKS --}}
        <div class="hidden items-center gap-9 md:flex">

            <a href="{{ url('/') }}"
               class="text-xs font-semibold uppercase tracking-[2px] text-white transition hover:text-[#d2b99c]">
                Home
            </a>

            <a href="{{ url('/shop') }}"
               class="text-xs font-semibold uppercase tracking-[2px] text-white transition hover:text-[#d2b99c]">
                Shop
            </a>

            <a href="#categories"
               class="text-xs font-semibold uppercase tracking-[2px] text-white transition hover:text-[#d2b99c]">
                Categories
            </a>

            <a href="#brands"
               class="text-xs font-semibold uppercase tracking-[2px] text-white transition hover:text-[#d2b99c]">
                Brands
            </a>

            <a href="#contact"
               class="text-xs font-semibold uppercase tracking-[2px] text-white transition hover:text-[#d2b99c]">
                Contact
            </a>

        </div>

        {{-- LOGIN & CART --}}
        <div class="flex items-center gap-5">

            <a href="{{ route('userLogin') }}"
               class="text-xs font-semibold uppercase tracking-[2px] text-white transition hover:text-[#d2b99c]">
                Login
            </a>

            <a href="{{ url('/cart') }}"
               class="border border-white/60 px-5 py-3 text-xs font-bold uppercase tracking-[2px] text-white transition hover:bg-white hover:text-[#493825]">
                Cart
            </a>

        </div>

    </div>

</nav>

<main class="relative mx-auto w-full max-w-[1600px] px-4 py-8 sm:px-6 lg:px-8 lg:py-10">
    <div class="pointer-events-none absolute left-0 top-10 -z-10 h-64 w-64 rounded-full bg-[#eadcc9]/30 blur-3xl"></div>
    <div class="pointer-events-none absolute right-0 top-1/3 -z-10 h-72 w-72 rounded-full bg-[#d9c5aa]/20 blur-3xl"></div>

    <div class="flex flex-col gap-7 lg:flex-row lg:gap-8">

        {{-- SIDEBAR --}}
        <aside class="w-full flex-shrink-0 lg:w-64 xl:w-72">
            <button type="button"
                onclick="document.getElementById('filterBox').classList.toggle('hidden')"
                class="mb-4 flex w-full items-center justify-between rounded-2xl border border-[#e8dccb] bg-white/80 px-4 py-3 font-semibold text-[#594632] shadow-sm backdrop-blur-xl transition hover:bg-[#fbf7f1] lg:hidden">
                <span>☷ &nbsp; Filters</span><span class="text-[#9b8469]">☰</span>
            </button>

            <div id="filterBox"
                class="sticky top-24 hidden rounded-3xl border border-[#e8dccb] bg-[#fffdf9]/90 p-5 shadow-[0_14px_40px_rgba(91,68,42,0.08)] backdrop-blur-xl lg:block">

                {{-- CATEGORIES --}}
                <div>
                    <div class="flex items-center justify-between">
                        <h3 class="font-bold tracking-tight text-[#493825]">Categories</h3>
                        <span class="rounded-full bg-[#f4ede3] px-2.5 py-1 text-xs font-semibold text-[#9a8062]">{{ $productCount }}</span>
                    </div>
                    <div class="mt-4 space-y-1.5">
                        <a href="{{ url('/shop') }}"
                            class="flex items-center justify-between rounded-xl px-3 py-2.5 text-sm transition {{ !request('category') ? 'bg-[#5c4630] text-white shadow-md shadow-[#5c4630]/15' : 'text-[#79654e] hover:bg-[#f5eee5] hover:text-[#493825]' }}">
                            <span>All Products</span><span class="text-xs opacity-70">{{ $productCount }}</span>
                        </a>
                        @foreach($categories as $category)
                            @if($category->products_count > 0)
                                <a href="{{ url('/shop') }}?category={{ $category->slug }}"
                                    class="flex items-center justify-between rounded-xl px-3 py-2.5 text-sm transition {{ request('category') === $category->slug ? 'bg-[#5c4630] text-white shadow-md shadow-[#5c4630]/15' : 'text-[#79654e] hover:bg-[#f5eee5] hover:text-[#493825]' }}">
                                    <span>{{ $category->name }}</span><span class="text-xs opacity-70">{{ $category->products_count }}</span>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="my-6 border-t border-[#eee4d7]"></div>

                {{-- SIZE FILTER --}}
                <div>
                    <div class="flex items-center justify-between">
                        <h3 class="font-bold text-[#493825]">Size</h3>
                        @if(request('size'))
                            <a href="{{ url('/shop') }}" class="text-xs text-[#a58a6d] hover:text-[#5c4630]">Clear</a>
                        @endif
                    </div>
                    <form action="{{ url('/shop') }}" method="GET" class="mt-4">
                        @if(request('search')) <input type="hidden" name="search" value="{{ request('search') }}"> @endif
                        @if(request('category')) <input type="hidden" name="category" value="{{ request('category') }}"> @endif
                        @if(request('sort')) <input type="hidden" name="sort" value="{{ request('sort') }}"> @endif

                        @php
                            $selectedSizes = request('size', []);
                            if (!is_array($selectedSizes)) $selectedSizes = [$selectedSizes];
                        @endphp

                        <div class="grid grid-cols-3 gap-2">
                            @foreach($sizes as $size)
                                @php $isSelected = in_array($size->name, $selectedSizes); @endphp
                                <label class="cursor-pointer">
                                    <input type="checkbox" name="size[]" value="{{ $size->name }}" class="peer hidden" {{ $isSelected ? 'checked' : '' }}>
                                    <span class="flex h-10 items-center justify-center rounded-xl border border-[#e8dccb] bg-white/80 px-2 text-xs font-semibold text-[#79654e] transition hover:border-[#cbb596] hover:bg-[#f9f4ec] peer-checked:border-[#5c4630] peer-checked:bg-[#5c4630] peer-checked:text-white">
                                        {{ $size->name }}
                                    </span>
                                </label>
                            @endforeach
                        </div>
                        <button type="submit" class="mt-4 w-full rounded-xl bg-[#5c4630] py-2.5 text-sm font-semibold text-white shadow-md shadow-[#5c4630]/15 transition hover:bg-[#493825] active:scale-[0.98]">
                            Apply Size
                        </button>
                    </form>
                </div>

                <div class="my-6 border-t border-[#eee4d7]"></div>

                {{-- RATING --}}
                <div>
                    <h3 class="font-bold text-[#493825]">Rating</h3>
                    <div class="mt-4 space-y-3">
                        @foreach([5, 4, 3] as $rating)
                            <label class="group flex cursor-pointer items-center gap-2">
                                <input type="checkbox" name="rating" value="{{ $rating }}" class="rounded border-[#d9cbb8] text-[#5c4630] focus:ring-[#cbb596]">
                                <span class="text-sm text-[#c18b35] group-hover:text-[#a87525]">
                                    {{ str_repeat('★', $rating) }} <span class="text-[#a58a6d]">& up</span>
                                </span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <a href="{{ url('/shop') }}"
                    class="mt-6 block w-full rounded-xl border border-[#e8dccb] bg-white/70 py-2.5 text-center text-sm font-semibold text-[#79654e] transition hover:border-[#cbb596] hover:bg-[#f7f0e7] hover:text-[#493825]">
                    Clear Filters
                </a>
            </div>
        </aside>

        {{-- PRODUCTS --}}
        <div class="min-w-0 flex-1">

            {{-- TOP BAR --}}
            <div class="mb-6 flex flex-col justify-between gap-4 rounded-3xl border border-[#e8dccb] bg-[#fffdf9]/80 p-5 shadow-[0_10px_30px_rgba(91,68,42,0.05)] backdrop-blur-xl sm:p-6 lg:flex-row lg:items-center">
                <div>
                    <p class="text-[11px] font-bold uppercase tracking-[0.22em] text-[#a58a6d]">Curated Collection</p>
                    <h2 class="mt-1 text-xl font-bold tracking-tight text-[#493825] sm:text-2xl">All Products</h2>
                    <p class="mt-1 text-sm text-[#9a846b]">Showing {{ $products->total() }} products</p>
                </div>

                <div class="flex flex-col items-stretch gap-3 sm:flex-row sm:items-center">
                    {{-- SEARCH --}}
                    <form action="{{ url('/shop') }}" method="GET" class="relative">
                        @if(request('category')) <input type="hidden" name="category" value="{{ request('category') }}"> @endif
                        @if(request('sort')) <input type="hidden" name="sort" value="{{ request('sort') }}"> @endif
                        @foreach((array) request('size', []) as $selectedSize)
                            <input type="hidden" name="size[]" value="{{ $selectedSize }}">
                        @endforeach
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products..."
                            class="h-11 w-full rounded-xl border border-[#e8dccb] bg-white/85 py-2 pl-10 pr-20 text-sm text-[#594632] shadow-sm outline-none transition placeholder:text-[#b5a38d] focus:border-[#b99d79] focus:ring-4 focus:ring-[#eadfce]/60 sm:w-64 lg:w-72">
                        <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-[#a58a6d]">🔍</span>
                        <button type="submit" class="absolute right-1.5 top-1.5 h-8 rounded-lg bg-[#5c4630] px-3 text-xs font-semibold text-white transition hover:bg-[#493825]">Search</button>
                    </form>

                    {{-- SORT --}}
                    <div class="flex items-center gap-2">
                        <span class="hidden text-sm text-[#9a846b] xl:block">Sort by</span>
                        <select id="filters" onchange="reloadFilter()"
                            class="h-11 w-full rounded-xl border border-[#e8dccb] bg-white/85 px-4 text-sm font-medium text-[#79654e] shadow-sm outline-none transition focus:border-[#b99d79] focus:ring-4 focus:ring-[#eadfce]/60 sm:w-auto">
                            <option value="" {{ !request('sort') ? 'selected' : '' }}>Featured</option>
                            <option value="newest" {{ request('sort') === 'newest' ? 'selected' : '' }}>Newest</option>
                            <option value="low" {{ request('sort') === 'low' ? 'selected' : '' }}>Price: Low to High</option>
                            <option value="high" {{ request('sort') === 'high' ? 'selected' : '' }}>Price: High to Low</option>
                            <option value="asc" {{ request('sort') === 'asc' ? 'selected' : '' }}>Product: A-Z</option>
                            <option value="desc" {{ request('sort') === 'desc' ? 'selected' : '' }}>Product: Z-A</option>
                        </select>
                    </div>
                </div>
            </div>

            {{-- ACTIVE FILTERS --}}
            @if(request('search') || request('category') || request('size'))
                <div class="mb-6 flex flex-wrap items-center gap-2">
                    <span class="mr-1 text-xs font-semibold uppercase tracking-wider text-[#a58a6d]">Filters:</span>
                    @if(request('search'))
                        <span class="inline-flex items-center rounded-full border border-[#e8dccb] bg-[#f7f0e7] px-3 py-1.5 text-xs font-medium text-[#79654e]">Search: {{ request('search') }}</span>
                    @endif
                    @if(request('category'))
                        <span class="inline-flex items-center rounded-full border border-[#e8dccb] bg-[#f7f0e7] px-3 py-1.5 text-xs font-medium text-[#79654e]">Category: {{ request('category') }}</span>
                    @endif
                    @php
                        $activeSizes = request('size', []);
                        if (!is_array($activeSizes)) $activeSizes = [$activeSizes];
                    @endphp
                    @foreach($activeSizes as $activeSize)
                        <span class="inline-flex items-center rounded-full border border-[#d8c6ad] bg-[#5c4630] px-3 py-1.5 text-xs font-medium text-white">Size: {{ $activeSize }}</span>
                    @endforeach
                    <a href="{{ url('/shop') }}" class="ml-1 text-xs font-semibold text-[#79654e] underline transition hover:text-[#493825] hover:no-underline">Clear all</a>
                </div>
            @endif

            {{-- PRODUCT GRID --}}
            <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 sm:gap-5 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6">
                @forelse($products as $product)
                    <x-products.productCard :product="$product" />
                @empty
                    <div class="col-span-full rounded-3xl border border-[#e8dccb] bg-[#fffdf9]/85 py-20 text-center shadow-[0_10px_30px_rgba(91,68,42,0.05)]">
                        <div class="mb-5 text-5xl">🔍</div>
                        <h3 class="text-lg font-bold text-[#493825]">No products found</h3>
                        <p class="mt-2 text-sm text-[#9a846b]">Try changing your search or filters.</p>
                        <a href="{{ url('/shop') }}" class="mt-5 inline-flex rounded-xl bg-[#5c4630] px-5 py-2.5 text-sm font-semibold text-white shadow-md transition hover:bg-[#493825]">
                            View All Products
                        </a>
                    </div>
                @endforelse
            </div>

            {{-- PAGINATION --}}
            @if($products->hasPages())
                <div class="mt-10 flex items-center justify-center gap-1.5">
                    @if($products->onFirstPage())
                        <span class="flex h-9 w-9 items-center justify-center rounded-xl border border-[#e8dccb] text-sm text-[#c8b9a5]">←</span>
                    @else
                        <a href="{{ $products->previousPageUrl() }}" class="flex h-9 w-9 items-center justify-center rounded-xl border border-[#e8dccb] bg-white/80 text-sm text-[#79654e] transition hover:border-[#5c4630] hover:bg-[#5c4630] hover:text-white">←</a>
                    @endif

                    @foreach($products->getUrlRange(max(1, $products->currentPage() - 2), min($products->lastPage(), $products->currentPage() + 2)) as $page => $url)
                        @if($page == $products->currentPage())
                            <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-[#5c4630] text-sm font-semibold text-white shadow-md shadow-[#5c4630]/15">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="flex h-9 w-9 items-center justify-center rounded-xl border border-[#e8dccb] bg-white/80 text-sm font-medium text-[#79654e] transition hover:border-[#5c4630] hover:bg-[#5c4630] hover:text-white">{{ $page }}</a>
                        @endif
                    @endforeach

                    @if($products->hasMorePages())
                        <a href="{{ $products->nextPageUrl() }}" class="flex h-9 w-9 items-center justify-center rounded-xl border border-[#e8dccb] bg-white/80 text-sm text-[#79654e] transition hover:border-[#5c4630] hover:bg-[#5c4630] hover:text-white">→</a>
                    @else
                        <span class="flex h-9 w-9 items-center justify-center rounded-xl border border-[#e8dccb] text-sm text-[#c8b9a5]">→</span>
                    @endif
                </div>
            @endif
        </div>
    </div>
</main>

{{-- NEWSLETTER --}}
<section class="mx-auto max-w-7xl px-4 pb-12 sm:px-6 lg:px-8">
    <div class="relative overflow-hidden rounded-[2rem] border border-[#6b533a]/20 bg-gradient-to-br from-[#6b533a] via-[#59432f] to-[#3f3023] p-8 text-white shadow-[0_20px_60px_rgba(91,68,42,0.20)] sm:p-10">
        <div class="pointer-events-none absolute -right-10 -top-20 h-64 w-64 rounded-full border border-white/10"></div>
        <div class="pointer-events-none absolute -right-2 -top-12 h-48 w-48 rounded-full border border-white/10"></div>
        <div class="relative flex flex-col items-center justify-between gap-8 lg:flex-row">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.22em] text-[#ddc8aa]">Stay Updated</p>
                <h2 class="mt-2 text-2xl font-bold sm:text-3xl">Get 10% off your first order</h2>
                <p class="mt-2 text-sm text-[#e0d2bf]">Subscribe to receive new arrivals, offers and exclusive deals.</p>
            </div>
            <form method="POST" action="{{ route('customer.subscription') }}"
                class="flex w-full overflow-hidden rounded-xl border border-white/20 bg-white shadow-xl shadow-black/20 lg:w-auto">
                @csrf
                <input type="email" name="email" required placeholder="Your email address"
                    class="h-12 w-full bg-white px-4 text-sm text-[#493825] outline-none placeholder:text-[#b5a38d] lg:w-72">
                <button type="submit" class="h-12 shrink-0 bg-[#eadcc9] px-5 text-sm font-bold text-[#493825] transition hover:bg-white">Subscribe</button>
            </form>
        </div>
    </div>
</section>

{{-- SORT SCRIPT --}}
<script>
    function reloadFilter() {
        const sort = document.getElementById('filters').value;
        const url = new URL(window.location.href);

        if (sort) {
            url.searchParams.set('sort', sort);
        } else {
            url.searchParams.delete('sort');
        }

        url.searchParams.delete('page');
        window.location.href = url.toString();
    }
</script>

@endsection
