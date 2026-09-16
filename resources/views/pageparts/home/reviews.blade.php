    {{-- Reviews --}}
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">

            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold">
                    What Our Customers Say
                </h2>

                <p class="text-gray-500 mt-2">
                    Real feedback from our customers
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-6">

                @foreach($reviews as $review)

                    <div class="border rounded-xl p-6">

                        <div class="text-yellow-500">
                            @if(!empty($review->rating))
                            @for($i=1; $i<=$review->rating; $i++)
                                ★
                            @endfor
                            @endif
                        </div>

                        <p class="text-gray-600 mt-4">
                            "{{ $review->review }}"
                        </p>

                        <div class="font-semibold mt-5">
                            {{ $review->user->name }}
                        </div>

                    </div>

                @endforeach

            </div>

           

        </div>
    </section>