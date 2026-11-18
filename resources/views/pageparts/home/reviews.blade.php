
{{-- Customer Reviews --}}
<section class="py-16 md:py-20 bg-[#f5efe6]">
    <div class="max-w-7xl mx-auto px-4">

        {{-- Heading --}}
        <div class="text-center mb-12">

            <span class="text-[#9b8060] text-xs font-semibold
                         tracking-[3px] uppercase">
                Customer Experiences
            </span>

            <h2 class="text-3xl md:text-4xl font-bold text-[#493825] mt-3">
                What Our Customers Say
            </h2>

            <p class="text-[#79654e] mt-3 text-sm md:text-base">
                Real feedback from our valued customers
            </p>

            <div class="w-16 h-[2px] bg-[#b99b76] mx-auto mt-5"></div>

        </div>

        {{-- Review Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">

            @forelse($reviews as $review)

                <div class="group bg-[#fffdf9] border border-[#e8dccb]
                            rounded-2xl p-7 shadow-sm
                            hover:shadow-xl hover:-translate-y-1
                            hover:border-[#c9ad8c]
                            transition-all duration-300">

                    {{-- Quote Icon --}}
                    <div class="flex justify-between items-center">

                        <div class="w-11 h-11 rounded-full bg-[#f5efe6]
                                    flex items-center justify-center">
                            <i class="fa-solid fa-quote-left text-[#9b8060]"></i>
                        </div>

                        {{-- Rating --}}
                        <div class="flex gap-1 text-[#c49a50] text-sm">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="{{ $i <= (int) $review->rating
                                    ? 'fa-solid fa-star'
                                    : 'fa-regular fa-star' }}"></i>
                            @endfor
                        </div>

                    </div>

                    {{-- Review Text --}}
                    <p class="text-[#66533e] text-sm leading-7 mt-6 min-h-[84px]">
                        "{{ $review->review }}"
                    </p>

                    {{-- Divider --}}
                    <div class="border-t border-[#eee4d8] mt-6 pt-5">

                        <div class="flex items-center gap-3">

                            <div class="w-11 h-11 rounded-full
                                        bg-[#493825] text-white
                                        flex items-center justify-center
                                        font-bold text-lg uppercase">
                                {{ substr($review->user->name ?? 'C', 0, 1) }}
                            </div>

                            <div>
                                <h3 class="font-bold text-[#493825] text-sm">
                                    {{ $review->user->name ?? 'Customer' }}
                                </h3>

                                <p class="text-xs text-[#9b8060] mt-1">
                                    Verified Customer
                                </p>
                            </div>

                            <div class="ml-auto text-[#b99b76]">
                                <i class="fa-solid fa-circle-check text-lg"></i>
                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-span-full text-center py-12">
                    <i class="fa-regular fa-comments text-4xl text-[#b99b76]"></i>

                    <h3 class="text-xl font-semibold text-[#493825] mt-4">
                        No Reviews Yet
                    </h3>

                    <p class="text-[#79654e] text-sm mt-2">
                        Be the first to share your shopping experience!
                    </p>
                </div>

            @endforelse

        </div>

    </div>
</section>
