<a href="{{ route('product.detail', $product->slug) }}" class="block w-full h-full">
	<img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
</a>