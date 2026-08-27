<div class="group">
	<div class="relative aspect-[4/5] rounded-2xl overflow-hidden bg-gray-100">
		<span class="absolute top-3 left-3 z-10 bg-black text-white px-2.5 py-1.5 rounded-lg text-[10px] font-bold">NEW</span>

		{{-- Wishlist --}}<x-products.wishlistButton :product="$product"/>
		{{-- Product Detail Link --}}<x-products.image :product="$product"/>
     	{{-- Add To Cart --}}<x-products.addToCart :product="$product"/>
    </div>
	
	{{-- Product Details --}}
	<div class="pt-4">
		<p class="text-xs text-gray-400">{{ $product->category->name ?? 'Fashion' }}</p>
		<a href="{{ route('product.detail', $product->slug) }}" class="block">
			<h3 class="font-semibold mt-1 hover:text-gray-500 transition">{{ $product->name }}</h3>
		</a>

		<div class="flex items-center justify-between mt-2">
			<div>
				<span class="font-bold">₹{{ $product->sale_price }}</span>

				@if($product->price > $product->sale_price)
				<span class="text-xs text-gray-400 line-through ml-1">₹{{ $product->price }}</span>@endif
			</div>
			
			@if($product->reviews->isNotEmpty())
    		<span class="text-xs text-yellow-500">
        		★ {{ $product->reviews->first()->rating }}
    		</span>
    		
    		@endif
		</div>
	</div>
</div>