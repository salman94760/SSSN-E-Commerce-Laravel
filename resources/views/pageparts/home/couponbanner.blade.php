
{{-- Coupon Banner --}}
<section class="py-16 md:py-20 bg-[#fffdf9]">
    <div class="max-w-7xl mx-auto px-4">

        <div class="relative overflow-hidden rounded-3xl
                    bg-gradient-to-r from-[#493825] via-[#604a32] to-[#806747]
                    px-8 py-12 md:px-14 md:py-16
                    shadow-xl">

            {{-- Decorative Elements --}}
            <div class="absolute -right-16 -top-20 w-72 h-72
                        border border-white/10 rounded-full"></div>

            <div class="absolute -right-8 -top-12 w-52 h-52
                        border border-white/10 rounded-full"></div>

            <div class="absolute right-20 bottom-[-100px] w-64 h-64
                        bg-white/5 rounded-full blur-2xl"></div>

            <div class="relative z-10 md:flex items-center justify-between gap-8">

                {{-- Left Content --}}
                <div class="max-w-2xl">

                    <span class="inline-block text-[#e5cba9] text-xs
                                 font-semibold tracking-[3px] uppercase">
                        Limited Time Offer
                    </span>

                    <h2 class="text-3xl md:text-5xl font-bold
                               text-white mt-4 leading-tight">
                        Get 10% OFF
                        <span class="block text-[#e5cba9]">
                            Your First Order
                        </span>
                    </h2>

                    <p class="text-[#e8dccb] mt-5 text-sm md:text-base">
                        Discover your perfect style and enjoy an exclusive
                        discount on your first purchase.
                    </p>

                    {{-- Coupon Code --}}
                    <div class="flex flex-wrap items-center gap-3 mt-7">

                        <span class="text-[#e8dccb] text-sm">
                            Use Coupon Code:
                        </span>

                        <button type="button"
                                onclick="navigator.clipboard.writeText('WELCOME10').then(() => {
                                    this.innerText = 'COPIED!';
                                    setTimeout(() => this.innerText = 'WELCOME10', 1500);
                                })"
                                class="px-5 py-2.5 bg-white/10 border border-dashed
                                       border-[#e5cba9] rounded-lg text-white
                                       font-bold tracking-[2px] hover:bg-white/20
                                       transition-all duration-300">
                            WELCOME10
                        </button>

                    </div>
                </div>

                {{-- Right Button --}}
                <div class="mt-9 md:mt-0 shrink-0">

                    <a href="{{ url('/shop') }}"
                       class="inline-flex items-center gap-3
                              bg-[#fffdf9] text-[#493825]
                              px-8 py-4 rounded-xl font-bold
                              hover:bg-[#e8dccb] hover:scale-105
                              transition-all duration-300 shadow-lg">

                        Shop Now

                        <i class="fa-solid fa-arrow-right"></i>
                    </a>

                </div>

            </div>
        </div>

    </div>
</section>
