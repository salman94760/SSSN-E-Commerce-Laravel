<section
    x-data="{
        active: 0,
        slides: [
            {
                image: 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?q=80&w=2000',
                badge: 'New Collection',
                title: 'Style That Fits',
                highlight: 'Your Lifestyle',
                description: 'Premium quality clothing designed for comfort, style and everyday life.'
            },
            {
                image: 'https://images.unsplash.com/photo-1529139574466-a303027c1d8b?q=80&w=2000',
                badge: 'Trending Now',
                title: 'Elevate Your',
                highlight: 'Everyday Style',
                description: 'Discover modern essentials designed to make every outfit stand out.'
            },
            {
                image: 'https://images.unsplash.com/photo-1483985988355-763728e1935b?q=80&w=2000',
                badge: 'Fresh Arrivals',
                title: 'Made For Your',
                highlight: 'Perfect Look',
                description: 'Explore our latest collection and find your next favorite outfit.'
            }
        ],
        init() {
            setInterval(() => {
                this.active = (this.active + 1) % this.slides.length
            }, 5000)
        }
    }"
    class="relative h-[600px] md:h-[680px] overflow-hidden"
>
    <template x-for="(slide, index) in slides" :key="index">
        <div
            x-show="active === index"
            x-transition:enter="transition ease-out duration-700"
            x-transition:enter-start="opacity-0 scale-105"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-500"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="absolute inset-0"
        >

        <img :src="slide.image" class="absolute inset-0 w-full h-full object-cover" alt="Fashion Collection">
        <div class="absolute inset-0 bg-black/60"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/50 to-black/20"></div>

        <div class="relative z-10 max-w-7xl mx-auto h-full px-4 sm:px-6 lg:px-8 flex items-center">
            <div class="max-w-2xl text-white">
                <span class="inline-flex bg-white/10 backdrop-blur-md border border-white/20 px-4 py-2 rounded-full text-sm font-medium" x-text="slide.badge"
                    >
                </span>
                <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold leading-tight mt-6">
                    <span x-text="slide.title"></span>
                    <br>
                    <span class="text-gray-300" x-text="slide.highlight"
                        >
                    </span>
                </h1>

                <p class="mt-6 text-gray-200 text-base sm:text-lg leading-7 max-w-xl" x-text="slide.description"
                    ></p>

                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="{{ url('/shop') }}" class="bg-white text-black px-7 py-3.5 rounded-xl font-semibold hover:bg-gray-200 transition">Shop Now →</a>
                </div>
            </div>
        </div>
    </div>
</template>

<button @click="active = active === 0 ? slides.length - 1 : active - 1" class="absolute left-5 top-1/2 -translate-y-1/2 z-20 w-12 h-12 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-white flex items-center justify-center hover:bg-white hover:text-black transition">←</button>

<button @click="active = (active + 1) % slides.length" class="absolute right-5 top-1/2 -translate-y-1/2 z-20 w-12 h-12 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-white flex items-center justify-center hover:bg-white hover:text-black transition">→</button>

<div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 flex items-center gap-2">
    <template x-for="(slide, index) in slides" :key="index">
        <button @click="active = index" class="h-2 rounded-full transition-all duration-300" :class="active === index? 'w-10 bg-white': 'w-2 bg-white/40'"
            ></button>
    </template>
</div>
</section>