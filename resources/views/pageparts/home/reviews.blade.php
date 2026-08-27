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

                @foreach([
                    ['Rahul', '★★★★★', 'Very comfortable and good quality.'],
                    ['Aman', '★★★★★', 'Product exactly as shown.'],
                    ['Aman', '★★★★★', 'Product exactly as shown.'],
                    ['Aman', '★★★★★', 'Product exactly as shown.'],
                    ['Rohit', '★★★★☆', 'Good product and fast delivery.']
                ] as $review)

                    <div class="border rounded-xl p-6">

                        <div class="text-yellow-500">
                            {{ $review[1] }}
                        </div>

                        <p class="text-gray-600 mt-4">
                            "{{ $review[2] }}"
                        </p>

                        <div class="font-semibold mt-5">
                            {{ $review[0] }}
                        </div>

                    </div>

                @endforeach

            </div>

           

        </div>
    </section>