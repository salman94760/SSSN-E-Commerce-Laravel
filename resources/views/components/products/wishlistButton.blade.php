<div class="absolute top-2 right-2 z-10 flex items-center gap-2">

    {{-- WISHLIST BUTTON --}}
    <button
        type="button"
        id="product_{{ $product->id }}"
        onclick="wishListProduct({{ $product->id }})"
        class="flex h-9 w-9 items-center justify-center rounded-full bg-white/90 text-lg text-[#5c4630] shadow-sm transition hover:bg-black hover:text-white"
    >
        <span id="heart_{{ $product->id }}">
            @if(!empty($product->wishlist) && count($product->wishlist) > 0)
                ♥
            @else
                ♡
            @endif
        </span>
    </button>



</div>