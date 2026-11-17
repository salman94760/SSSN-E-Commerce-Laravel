
@if(!empty($product->sizes) && count($product->sizes) > 0)

    <form action="{{ route('cart.add', $product->id) }}" method="POST">
        @csrf
        <input type="hidden" name="quantity" value="1">

        <div class="mt-5">
            <button
                type="submit"
                class="group flex h-12 w-full items-center justify-center gap-2
                       rounded-xl border border-[#493825]
                       bg-[#493825] px-5
                       text-sm font-semibold text-white
                       shadow-md shadow-[#493825]/15
                       transition-all duration-300
                       hover:-translate-y-0.5
                       hover:bg-[#5c4630]
                       hover:shadow-lg hover:shadow-[#493825]/25
                       active:scale-[0.98]"
            >
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-5 w-5 transition-transform duration-300 group-hover:scale-110"
                     fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 3h2l2.4 12.2a2 2 0 002 1.6h8.8a2 2 0 002-1.6L22 8H6"/>
                    <circle cx="10" cy="21" r="1"/>
                    <circle cx="18" cy="21" r="1"/>
                </svg>

                Add to Cart
            </button>
        </div>
    </form>

@else

    <form action="{{ route('product.notify', $product->id) }}" method="POST">
        @csrf

        <div class="mt-5">
            <button
                type="submit"
                class="group flex h-12 w-full items-center justify-center gap-2
                       rounded-xl border border-[#c9b69e]
                       bg-[#f5efe6] px-5
                       text-sm font-semibold text-[#493825]
                       shadow-sm
                       transition-all duration-300
                       hover:-translate-y-0.5
                       hover:border-[#493825]
                       hover:bg-[#e8dccb]
                       hover:shadow-md
                       active:scale-[0.98]"
            >
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-5 w-5 transition-transform duration-300 group-hover:scale-110"
                     fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 00-4-5.7V5a2 2 0 00-4 0v.3A6 6 0 006 11v3.2a2 2 0 01-.6 1.4L4 17h5m6 0a3 3 0 01-6 0"/>
                </svg>

                Notify Me
            </button>
        </div>
    </form>

@endif
