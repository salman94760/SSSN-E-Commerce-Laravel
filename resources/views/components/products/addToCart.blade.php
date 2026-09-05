@if(!empty($product->sizes) && count($product->sizes) > 0)
<form action="{{ route('cart.add', $product->id) }}" method="POST">
	@csrf
	<input type="hidden" name="quantity" value="1">
	<div class="flex gap-2 mt-5">
		<button type="submit" class="flex-1 h-11 rounded-xl bg-black text-white text-sm font-semibold hover:bg-gray-800">Add to cart</button>
	</div>
</form>
@else

<form action="{{ route('product.notify', $product->id) }}" method="POST">
	@csrf
	<div class="flex gap-2 mt-5">
		<button type="submit" class="flex-1 h-11 rounded-xl bg-black text-white text-sm font-semibold hover:bg-gray-800">Notify me</button>
	</div>
</form>
@endif