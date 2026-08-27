<button type="button" id="product_{{$product->id}}" onclick="wishListProduct({{ $product->id }})" class="absolute top-3 right-3 z-10 w-9 h-9 rounded-full bg-white/90 flex items-center justify-center shadow-sm hover:bg-black hover:text-white transition">
	@if($product->wishlist->isNotEmpty())
       	<span id="heart_{{ $product->id }}">♥</span>
    @else
        <span id="heart_{{ $product->id }}">♡</span>
    @endif
</button>