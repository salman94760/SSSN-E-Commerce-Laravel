<div class="absolute bottom-3 left-3 right-3 translate-y-16 group-hover:translate-y-0 transition duration-300">
	<form action="{{ route('cart.add', $product->id) }}" method="POST">
		@csrf
		<input type="hidden" name="quantity" value="1">
		<button type="submit" class="w-full bg-black text-white rounded-xl py-3 text-sm font-semibold hover:bg-gray-800 transition">Add to Cart</button>
	</form>
</div>