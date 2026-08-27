<section id="featured" class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Header --}}
        <div class="flex items-end justify-between mb-8">
            <div>
                <span class="text-xs uppercase tracking-widest text-gray-400">Our Collection</span>

                <h2 class="text-3xl font-bold mt-2">Featured Products</h2>

                <p class="text-gray-500 mt-2">Our most popular products</p>
            </div>

            {{-- Desktop Shop Link --}}
            <a href="{{ url('/shop') }}" class="hidden sm:inline-flex items-center gap-2 text-sm font-semibold hover:underline">View All<span>→</span>
            </a>
        </div>

        {{-- Products --}}
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($products->take(12) as $product)
            <x-products.productCard :product="$product" />
            @endforeach
        </div>

        <div class="mt-12 text-center">
            <p class="text-sm text-gray-500 mb-4">Looking for something else?</p>
            <a href="{{ url('/shop') }}" class="inline-flex items-center gap-2 bg-black text-white px-7 py-3.5 rounded-xl font-semibold text-sm hover:bg-gray-800 transition">
                Explore All Products
                <span class="text-lg">→</span>
            </a>
        </div>
    </div>
</section>