<div class="bg-white border border-gray-200 rounded-2xl overflow-hidden group hover:shadow-xl transition">
    <div class="relative aspect-square overflow-hidden bg-gray-100">

        {{-- Product Image --}}<x-products.image :product="$product"/>
        {{-- Wishlist --}}<x-products.wishlistButton :product="$product"/>
    </div>

    {{-- PRODUCT INFO --}}
    <div class="p-2">

        {{-- Category --}}
        <div class="h-[52px] flex items-center justify-between w-full">
            <div class="w-17"> 
                <p class="text-xs text-gray-400">
                    {{ $product->category->name ?? 'Fashion' }}
                </p>

                
            </div>
            
            <div class="text-xs text-gray-400">                 
                {{-- Available Sizes --}}
                @if(!empty($product->sizes))
                    @foreach($product->sizes as $size)
                        @php
                            $sizeName = '';

                            if (is_object($size)) {
                                $sizeName = $size->name ?? $size->size ?? '';
                            } elseif (is_array($size)) {
                                $sizeName = $size['name'] ?? $size['size'] ?? '';
                            } else {
                                $sizeName = $size;
                            }
                        @endphp
                        @if(!empty($sizeName))
                        <span class="inline-flex items-center justify-center px-2 py-1 border border-gray-200 rounded-md text-xs text-gray-700">
                            {{ $sizeName }}
                        </span>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>

        {{-- NAME --}}
        <h3 class="font-semibold mt-2 h-[48px]" style="text-overflow: ellipsis;" >{{ $product->name }}</h3>

{{-- PRICE --}}
<div class="flex items-center justify-between mt-3 w-full">

    {{-- PRICE LEFT --}}
    <div>
        <span class="font-bold text-lg">
            ₹{{ number_format($product->sale_price) }}
        </span>

        @if($product->price > $product->sale_price)
            <span class="text-sm text-gray-400 line-through ml-1">
                ₹{{ number_format($product->price) }}
            </span>
        @endif
    </div>

    {{-- RATING RIGHT --}}
    <div class="flex items-center gap-1 text-sm">
        <span class="text-yellow-500">★</span>
        <span class="font-semibold">
            @if(isset($product->reviews[0]))
                {{ $product->reviews[0]->rating ?? 0 }}
            @else
                @if(!empty($product->reviews))
                    {{ $product->reviews?->first()?->rating ?? 0 }}
                @endif
            @endif
        </span>
    </div>

</div>


        {{-- CART --}}
        {{-- Add To Cart --}}
        <x-products.addToCart :product="$product"/>
    </div>
</div>