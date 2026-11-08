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