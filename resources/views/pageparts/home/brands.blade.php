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