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