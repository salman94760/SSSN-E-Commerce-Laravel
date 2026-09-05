
<a href="{{ route('product.detail', $product->slug) }}" class="block w-full h-full">
	@if(isset($product->images[0]->name) && $product->images[0]->name != "")
	<img src="{{ asset('storage/' . $product->images[0]->name) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500 s2">
	@else
	<img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500 s1">
	@endif
	
</a>