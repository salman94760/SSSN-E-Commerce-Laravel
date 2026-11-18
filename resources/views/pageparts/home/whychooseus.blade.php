
{{-- Why Choose Us --}}
<section class="py-16 md:py-20 bg-[#f5efe6]">
    <div class="max-w-7xl mx-auto px-4">

        {{-- Heading --}}
        <div class="text-center mb-12">
            <span class="text-[#9b8060] uppercase tracking-[3px] text-xs font-semibold">
                The SSSN Experience
            </span>

            <h2 class="text-3xl md:text-4xl font-bold text-[#493825] mt-3">
                Why Choose Us?
            </h2>

            <div class="w-16 h-[2px] bg-[#b99b76] mx-auto mt-5"></div>

            <p class="text-[#79654e] text-sm mt-4 max-w-xl mx-auto">
                Experience quality, comfort and trust with every purchase.
            </p>
        </div>

        {{-- Features --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            @foreach([
                [
                    'icon' => 'fa-truck-fast',
                    'title' => 'Fast Delivery',
                    'description' => 'Quick and reliable delivery right to your doorstep.'
                ],
                [
                    'icon' => 'fa-arrow-rotate-left',
                    'title' => 'Easy Returns',
                    'description' => 'Hassle-free returns for a smooth shopping experience.'
                ],
                [
                    'icon' => 'fa-shield-halved',
                    'title' => 'Secure Payment',
                    'description' => 'Shop confidently with safe and secure checkout.'
                ],
                [
                    'icon' => 'fa-gem',
                    'title' => 'Premium Quality',
                    'description' => 'Carefully selected products made for your style.'
                ]
            ] as $item)

                <div class="group bg-[#fffdf9] border border-[#e8dccb] rounded-2xl p-8 text-center
                            transition-all duration-300 hover:-translate-y-2
                            hover:shadow-xl hover:border-[#b99b76]">

                    {{-- Icon --}}
                    <div class="w-16 h-16 mx-auto rounded-full bg-[#f5efe6]
                                flex items-center justify-center
                                transition-all duration-300 group-hover:bg-[#493825]">

                        <i class="fa-solid {{ $item['icon'] }}
                                  text-2xl text-[#8b704f]
                                  group-hover:text-white transition-all duration-300"></i>
                    </div>

                    {{-- Content --}}
                    <h3 class="text-lg font-bold text-[#493825] mt-6">
                        {{ $item['title'] }}
                    </h3>

                    <p class="text-sm text-[#79654e] leading-6 mt-3">
                        {{ $item['description'] }}
                    </p>

                    <div class="w-8 h-[2px] bg-[#d2b99c] mx-auto mt-5
                                transition-all duration-300 group-hover:w-14">
                    </div>

                </div>

            @endforeach

        </div>
    </div>
</section>
