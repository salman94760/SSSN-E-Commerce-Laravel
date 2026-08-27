    {{-- Why Choose Us --}}
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4">

            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold">
                    Why Choose Us?
                </h2>
            </div>

            <div class="grid md:grid-cols-4 gap-6">

                @foreach([
                    ['🚚', 'Fast Delivery', 'Quick and reliable delivery'],
                    ['↩️', 'Easy Returns', 'Simple return process'],
                    ['🔒', 'Secure Payment', '100% secure checkout'],
                    ['✓', 'Quality Products', 'Premium quality products']
                ] as $item)

                    <div class="bg-white p-6 rounded-xl border text-center">
                        <div class="text-3xl">{{ $item[0] }}</div>
                        <h3 class="font-semibold mt-4">
                            {{ $item[1] }}
                        </h3>
                        <p class="text-gray-500 text-sm mt-2">
                            {{ $item[2] }}
                        </p>
                    </div>

                @endforeach

            </div>
        </div>
    </section>