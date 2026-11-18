
@php
    $sizes = $product->sizes ?? collect();
    $colors = $product->colors ?? collect();

    $sizeCount = $sizes->count();
    $colorCount = $colors->count();

    $defaultPrice = ($product->sale_price > 0)
        ? $product->sale_price
        : $product->price;

    $singleSize = $sizeCount === 1 ? $sizes->first() : null;
    $singleColor = $colorCount === 1 ? $colors->first() : null;

    $initialPrice = $singleSize?->pivot?->price ?? $defaultPrice;
@endphp

<div class="group relative overflow-hidden rounded-2xl border border-[#e8dccb] bg-[#fffdf9] shadow-[0_8px_24px_rgba(91,68,42,0.06)] transition-all duration-300 hover:-translate-y-1 hover:border-[#cbb596] hover:shadow-[0_18px_40px_rgba(91,68,42,0.13)]">

    {{-- PRODUCT IMAGE --}}
    <div class="relative aspect-square overflow-hidden bg-[#f5efe6]">
        <div class="h-full w-full transition-transform duration-500 group-hover:scale-105">
            <x-products.image :product="$product"/>
        </div>

        {{-- WISHLIST --}}
        <div>
            <x-products.wishlistButton :product="$product"/>
        </div>

        {{-- PREMIUM SALE BADGE --}}
@if($product->price > $defaultPrice && $product->price > 0)
    @php
        $discount = round(
            (($product->price - $defaultPrice) / $product->price) * 100
        );
    @endphp

    <span class="absolute left-3 top-3 z-10 inline-flex items-center gap-1 rounded-md bg-[#5c4630] px-2.5 py-1.5 text-[10px] font-extrabold tracking-wide text-white shadow-md">
        <span>{{ $discount }}%</span>
        <span class="font-semibold text-[#ead9c3]">OFF</span>
    </span>
@endif
    </div>

    {{-- PRODUCT INFO --}}
    <div class="p-3">

        {{-- CATEGORY & SIZES --}}
        <div class="flex items-center justify-between gap-2">

            <p class="min-w-0 truncate text-[10px] font-semibold uppercase tracking-wider text-[#a58a6d]">
                {{ $product->category->name ?? 'Fashion' }}
            </p>

            <div class="flex max-w-[65%] flex-wrap justify-end gap-1">
                @foreach($sizes as $size)
                    @php
                        $sizeName = $size->name ?? $size->size ?? '';
                    @endphp

                    @if($sizeName)
                        <span class="rounded-md border border-[#e8dccb] bg-[#f8f3eb] px-1.5 py-0.5 text-[9px] font-semibold text-[#79654e]">
                            {{ $sizeName }}
                        </span>
                    @endif
                @endforeach
            </div>
        </div>

{{-- PRODUCT NAME + RATING --}}
<div class="mt-1.5 flex items-start justify-between gap-2">

    {{-- PRODUCT NAME --}}
    <h3
        class="min-w-0 flex-1 line-clamp-2 text-sm font-bold leading-5 text-[#493825] transition-colors group-hover:text-[#9a744c]"
        title="{{ $product->name }}"
    >
        {{ $product->name }}
    </h3>

    {{-- RATING --}}
    <div class="mt-0.5 flex shrink-0 items-center gap-1 rounded-md bg-[#f8f3eb] px-1.5 py-1">
        <span class="text-xs text-[#c18b35]">★</span>

        <span class="text-[10px] font-bold text-[#79654e]">
            {{ $product->reviews?->first()?->rating ?? 0 }}
        </span>
    </div>

</div>

        

        {{-- SELECTED PRICE --}}
                    <div class="flex items-center justify-between px-1">
                       

                        <span id="card-price-{{ $product->id }}"
                              class="text-sm font-extrabold text-[#493825]">
                            ₹{{ number_format($initialPrice) }}
                        </span>
                        @if($product->price > $defaultPrice)
                <span class="text-[11px] text-[#b5a38d] line-through">
                    ₹{{ number_format($product->price) }}
                </span>
            @endif
                    </div>



           

        {{-- DIVIDER --}}
        <div class="my-2 border-t border-[#eee4d7]"></div>

        {{-- COMPACT ADD TO CART --}}
        <div class="product-card-cart">

            @if($sizeCount > 0)

                <form action="{{ route('cart.add', $product->id) }}"
                      method="POST"
                      class="space-y-2">

                    @csrf

                    <input type="hidden" name="quantity" value="1">

                    {{-- SIZE & COLOR --}}
                    <div class="grid grid-cols-2 gap-2">

                        {{-- SIZE --}}
                        @if($sizeCount > 1)

                            <select name="size_id"
                                    required
                                    onchange="updateCardPrice{{ $product->id }}(this)"
                                    class="min-w-0 w-full rounded-lg border border-[#e8dccb] bg-[#fffdf9] px-2 py-2 text-[11px] font-semibold text-[#493825] outline-none focus:border-[#9a744c]">

                                <option value="">Size</option>

                                @foreach($sizes as $size)
                                    @php
                                        $sizePrice = $size->pivot->price ?? $defaultPrice;
                                    @endphp

                                    <option value="{{ $size->id }}"
                                            data-price="{{ $sizePrice }}">
                                        {{ $size->name ?? $size->size }}
                                    </option>
                                @endforeach

                            </select>

                        @else

                            <input type="hidden"
                                   name="size_id"
                                   value="{{ $singleSize->id }}">

                            <div class="rounded-lg border border-[#e8dccb] bg-[#f8f3eb] px-2 py-2 text-[11px] font-semibold text-[#493825]">
                                Size: {{ $singleSize->name ?? $singleSize->size }}
                            </div>

                        @endif

                        {{-- COLOR --}}
                        @if($colorCount > 1)

                            <select name="color_id"
                                    required
                                    class="min-w-0 w-full rounded-lg border border-[#e8dccb] bg-[#fffdf9] px-2 py-2 text-[11px] font-semibold text-[#493825] outline-none focus:border-[#9a744c]">

                                <option value="">Color</option>

                                @foreach($colors as $color)
                                    <option value="{{ $color->id }}">
                                        {{ $color->name }}
                                    </option>
                                @endforeach

                            </select>

                        @elseif($colorCount === 1)

                            <input type="hidden"
                                   name="color_id"
                                   value="{{ $singleColor->id }}">

                            <div class="rounded-lg border border-[#e8dccb] bg-[#f8f3eb] px-2 py-2 text-[11px] font-semibold text-[#493825]">
                                Color: {{ $singleColor->name }}
                            </div>

                        @else

                            <input type="hidden" name="color_id" value="">

                        @endif

                    </div>

                    

                    {{-- ADD TO CART BUTTON --}}
                    <button type="submit"
                            class="flex w-full items-center justify-center gap-1.5 rounded-lg bg-[#5c4630] px-3 py-2.5 text-xs font-bold text-white transition duration-300 hover:bg-[#493825] active:scale-[0.98]">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-4 w-4"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="2">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M3 3h2l2.4 12.4a2 2 0 002 1.6h8.8a2 2 0 002-1.6L22 8H6"/>
                            <circle cx="10" cy="21" r="1"/>
                            <circle cx="19" cy="21" r="1"/>
                        </svg>

                        Add To Cart
                    </button>

                </form>

                {{-- DYNAMIC PRICE SCRIPT --}}
                @if($sizeCount > 1)
                    <script>
                        function updateCardPrice{{ $product->id }}(select) {
                            const option = select.options[select.selectedIndex];
                            const price = option.dataset.price;

                            const priceElement = document.getElementById(
                                'card-price-{{ $product->id }}'
                            );

                            priceElement.textContent = price
                                ? '₹' + Number(price).toLocaleString('en-IN')
                                : '₹{{ number_format($defaultPrice) }}';
                        }
                    </script>
                @endif

            @else

                {{-- NOTIFY ME --}}
                <form action="{{ route('product.notify', $product->id) }}"
                      method="POST">
                    @csrf

                    <button type="submit"
                            class="w-full rounded-lg border border-[#cbb596] bg-[#f8f3eb] px-3 py-2.5 text-xs font-bold text-[#5c4630] transition hover:bg-[#5c4630] hover:text-white">
                        Notify Me
                    </button>
                </form>

            @endif

        </div>
    </div>
</div>
