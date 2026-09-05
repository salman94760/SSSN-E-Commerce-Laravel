<section class="py-16 bg-gray-50">
    <div
        x-data="{
            scrollLeft() {
                this.$refs.categorySlider.scrollBy({
                    left: -320,
                    behavior: 'smooth'
                })
            },

            scrollRight() {
                this.$refs.categorySlider.scrollBy({
                    left: 320,
                    behavior: 'smooth'
                })
            }
        }"
        class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"
    >

    <div class="flex items-end justify-between mb-8">
        <div>
            <span class="text-xs uppercase tracking-widest text-gray-400">Collections</span>
            <h2 class="text-3xl font-bold mt-2">Shop by Category</h2>
            <p class="text-gray-500 mt-2">Find your favorite style</p>
        </div>

        <div class="hidden sm:flex items-center gap-3">
            <a href="/category" class="text-sm font-semibold mr-3 hover:underline">View All →</a>

            <button type="button" @click="scrollLeft()" class="w-11 h-11 rounded-full bg-white border border-gray-200 flex items-center justify-center text-lg hover:bg-black hover:text-white hover:border-black transition">←</button>

            <button type="button" @click="scrollRight()" class="w-11 h-11 rounded-full bg-white border border-gray-200 flex items-center justify-center text-lg hover:bg-black hover:text-white hover:border-black transition">→</button>
        </div>
    </div>

    <div x-ref="categorySlider" class="flex gap-5 overflow-x-auto scroll-smooth snap-x snap-mandatory pb-4 scrollbar-hide">

    @foreach($categories as $category)
        <a target="_blank" href="{{url('shop/'.$category->slug)}}" class="group flex-none w-[260px] sm:w-[280px] lg:w-[290px] snap-start">

            <div class="bg-white rounded-2xl overflow-hidden border border-gray-200 hover:shadow-xl transition duration-300">
                <div class="relative h-52 overflow-hidden bg-gray-100">
                    <img src="{{ asset('storage/'.$category->image) }}" alt="{{ $category->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">

                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition"></div>

                    <div class="absolute bottom-4 right-4 w-10 h-10 rounded-full bg-white flex items-center justify-center opacity-0 translate-y-2 group-hover:opacity-100 group-hover:translate-y-0 transition">→</div>
                </div>

                <div class="p-5">
                    <h3 class="font-bold text-lg">{{ $category->name }}</h3>
                    <div class="flex items-center justify-between mt-2">
                        <p class="text-sm text-gray-400">Explore Collection</p>
                        <span class="text-gray-400 group-hover:text-black transition">→</span>
                    </div>
                </div>
            </div>
        </a>
    @endforeach
    </div>

    <div class="flex sm:hidden items-center justify-between mt-4">
        <a href="/categories" class="text-sm font-semibold hover:underline">View All →</a>

        <div class="flex gap-2">
            <button type="button" @click="scrollLeft()" class="w-10 h-10 rounded-full bg-white border border-gray-200 flex items-center justify-center hover:bg-black hover:text-white transition">←</button>

            <button type="button" @click="scrollRight()" class="w-10 h-10 rounded-full bg-white border border-gray-200 flex items-center justify-center hover:bg-black hover:text-white transition">→
            </button>
        </div>
    </div>
</div>
</section>