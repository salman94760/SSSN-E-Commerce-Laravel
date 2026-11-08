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