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