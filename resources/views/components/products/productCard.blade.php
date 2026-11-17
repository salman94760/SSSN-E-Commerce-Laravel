
<div class="group relative overflow-hidden rounded-2xl border border-[#e8dccb] bg-[#fffdf9] shadow-[0_8px_24px_rgba(91,68,42,0.06)] transition-all duration-300 hover:-translate-y-1 hover:border-[#cbb596] hover:shadow-[0_18px_40px_rgba(91,68,42,0.13)]">

    {{-- PRODUCT IMAGE --}}
    <div class="relative aspect-square overflow-hidden bg-[#f5efe6]">
        <div class="h-full w-full transition-transform duration-500 group-hover:scale-105">
            <x-products.image :product="$product"/>
        </div>

        {{-- WISHLIST --}}
        <div class="absolute right-3 top-3 z-20">
            <x-products.wishlistButton :product="$product"/>
        </div>

        {{-- SALE BADGE --}}
        @if($product->price > $product->sale_price && $product->price > 0)
            @php
                $discount = round((($product->price - $product->sale_price) / $product->price) * 100);
            @endphp
            <span class="absolute left-3 top-3 z-10 rounded-full bg-[#5c4630] px-3 py-1 text-[10px] font-bold uppercase tracking-wider text-white shadow-md">
                {{ $discount }}% OFF
            </span>
        @endif
    </div>

    {{-- PRODUCT INFO --}}
    <div class="p-3 sm:p-4">

        {{-- CATEGORY & SIZES --}}
        <div class="flex min-h-[48px] items-start justify-between gap-2">

            <p class="min-w-0 truncate pt-1 text-[11px] font-semibold uppercase tracking-[1.3px] text-[#a58a6d]">
                {{ $product->category->name ?? 'Fashion' }}
            </p>

            {{-- AVAILABLE SIZES --}}
            <div class="flex max-w-[65%] flex-wrap justify-end gap-1">
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
                            <span class="inline-flex items-center justify-center rounded-md border border-[#e8dccb] bg-[#f8f3eb] px-2 py-1 text-[10px] font-semibold text-[#79654e]">
                                {{ $sizeName }}
                            </span>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>

        {{-- PRODUCT NAME --}}
        <h3 class="mt-2 min-h-[44px] text-sm font-bold leading-5 text-[#493825] transition-colors group-hover:text-[#9a744c] sm:text-base"
            title="{{ $product->name }}">
            {{ $product->name }}
        </h3>

        {{-- PRICE & RATING --}}
        <div class="mt-3 flex items-center justify-between gap-2">

            {{-- PRICE --}}
            <div class="min-w-0">
                <span class="text-base font-extrabold text-[#493825] sm:text-lg">
                    ₹{{ number_format($product->sale_price) }}
                </span>

                @if($product->price > $product->sale_price)
                    <span class="ml-1 text-xs font-medium text-[#b5a38d] line-through">
                        ₹{{ number_format($product->price) }}
                    </span>
                @endif
            </div>

            {{-- RATING --}}
            <div class="flex shrink-0 items-center gap-1 rounded-lg bg-[#f8f1e5] px-2 py-1">
                <span class="text-sm text-[#c18b35]">★</span>
                <span class="text-xs font-bold text-[#79654e]">
                    @if(isset($product->reviews[0]))
                        {{ $product->reviews[0]->rating ?? 0 }}
                    @else
                        {{ $product->reviews?->first()?->rating ?? 0 }}
                    @endif
                </span>
            </div>
        </div>

        {{-- DIVIDER --}}
        <div class="my-3 border-t border-[#eee4d7]"></div>

        {{-- ADD TO CART --}}
        <div class="product-card-cart">
            <x-products.addToCart :product="$product"/>
        </div>

    </div>
</div>
