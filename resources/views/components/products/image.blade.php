
<a href="{{ route('product.detail', $product->slug) }}"
   class="block w-full h-full overflow-hidden bg-[#f5efe6]">

    @if(isset($product->images[0]->name) && $product->images[0]->name != "")

        <img
            src="{{ asset('storage/' . $product->images[0]->name) }}"
            alt="{{ $product->name }}"
            loading="lazy"
            class="w-full h-full object-cover
                   transition-transform duration-700 ease-in-out
                   group-hover:scale-105"
        >

    @elseif(!empty($product->image))

        <img
            src="{{ asset('storage/' . $product->image) }}"
            alt="{{ $product->name }}"
            loading="lazy"
            class="w-full h-full object-cover
                   transition-transform duration-700 ease-in-out
                   group-hover:scale-105"
        >

    @else

        <div class="w-full h-full flex flex-col items-center
                    justify-center text-[#9b8060]">
            <i class="fa-regular fa-image text-4xl"></i>
            <span class="text-xs mt-2">No Image</span>
        </div>

    @endif

</a>
