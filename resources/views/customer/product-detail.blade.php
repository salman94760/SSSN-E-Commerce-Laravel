
@extends('layouts.customer.customer-layout')

@section('customerContent')

<div class="min-h-screen bg-[#fffdf9]">

    {{-- ================= BREADCRUMB ================= --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8">
        <div class="flex flex-wrap items-center gap-2 text-sm text-[#9b8060]">
            <a href="#" class="hover:text-[#493825] transition">Home</a>
            <span>/</span>
            <a href="{{ route('customer.shop') }}" class="hover:text-[#493825] transition">Shop</a>
            <span>/</span>
            <span class="text-[#493825] font-medium">{{ $product->name }}</span>
        </div>
    </div>

    {{-- ================= PRODUCT SECTION ================= --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <div class="grid lg:grid-cols-2 gap-10 lg:gap-16">

            {{-- LEFT : PRODUCT IMAGES --}}
            <div>

                <div class="relative bg-[#f5efe6] rounded-3xl overflow-hidden
                            border border-[#e8dccb] shadow-sm group">

                    {{-- Product Tag --}}
                    @if($product->tag)
                        <span class="absolute top-5 left-5 z-10
                                     bg-[#493825] text-white
                                     px-4 py-2 rounded-lg
                                     text-xs font-semibold tracking-wide">
                            {{ $product->tag }}
                        </span>
                    @endif

                    {{-- Wishlist --}}
                    <button type="button"
                            class="absolute top-5 right-5 z-10
                                   w-11 h-11 rounded-full
                                   bg-[#fffdf9] shadow-md
                                   flex items-center justify-center
                                   text-xl text-[#493825]
                                   hover:bg-[#493825] hover:text-white
                                   transition duration-300">
                        ♡
                    </button>

                    {{-- Main Image --}}
                    @if(isset($product->images[0]) && $product->images[0]->name != "")
                        <img
                            src="{{ asset('storage/' . $product->images->first()->name) }}"
                            alt="{{ $product->name }}"
                            class="w-full aspect-[4/5] object-cover
                                   transition-transform duration-700
                                   group-hover:scale-105">
                    @else
                        <img
                            src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->name }}"
                            class="w-full aspect-[4/5] object-cover
                                   transition-transform duration-700
                                   group-hover:scale-105">
                    @endif

                </div>

                {{-- Thumbnail Images --}}
                <div class="flex flex-wrap gap-3 mt-5">

                    @if(!empty($product->images) && is_iterable($product->images))

                        @foreach($product->images as $image)

                            @if(is_object($image) && !empty($image->name))

                                <div class="w-20 h-20 rounded-xl overflow-hidden
                                            border-2 border-[#d2b99c] bg-[#f5efe6]
                                            hover:border-[#493825] transition">
                                    <img
                                        src="{{ asset('storage/' . $image->name) }}"
                                        alt="{{ $product->name ?? 'Product image' }}"
                                        class="w-full h-full object-cover">
                                </div>

                            @elseif(is_array($image) && !empty($image['name']))

                                <div class="w-20 h-20 rounded-xl overflow-hidden
                                            border-2 border-[#d2b99c] bg-[#f5efe6]
                                            hover:border-[#493825] transition">
                                    <img
                                        src="{{ asset('storage/' . $image['name']) }}"
                                        alt="{{ $product->name ?? 'Product image' }}"
                                        class="w-full h-full object-cover">
                                </div>

                            @endif

                        @endforeach

                    @endif

                </div>

            </div>


            {{-- RIGHT : PRODUCT DETAILS --}}
            <div class="lg:pt-4">

                {{-- Category --}}
                <p class="text-sm text-[#9b8060] uppercase tracking-[2px] font-semibold">
                    {{ $product->category->name ?? 'Collection' }}
                </p>

                {{-- Product Name --}}
                <h1 class="text-3xl sm:text-4xl font-bold
                           text-[#493825] mt-3 leading-tight">
                    {{ $product->name }}
                </h1>

                {{-- Product Tags --}}
                @if($product->tags && $product->tags->count())
                    <div class="mt-4 flex flex-wrap gap-2">

                        @foreach($product->tags as $tag)

                            @if(!empty($tag->name))
                                <span class="inline-block px-3 py-1.5
                                             bg-[#f5efe6] rounded-lg
                                             text-xs font-semibold
                                             text-[#79654e] border border-[#e8dccb]">
                                    {{ $tag->name }}
                                </span>
                            @endif

                        @endforeach

                    </div>
                @endif

                {{-- Rating --}}
                <div class="flex items-center gap-3 mt-5">

                    @php
                        $reviewCount = $product->reviews->count();
                        $averageRating = $reviewCount > 0
                            ? round($product->reviews->avg('rating'), 1)
                            : 0;
                    @endphp

                    <div class="text-[#bd9556] text-lg tracking-wide">

                        @if($reviewCount > 0)

                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= round($averageRating))
                                    ★
                                @else
                                    ☆
                                @endif
                            @endfor

                        @else
                            ☆☆☆☆☆
                        @endif

                    </div>

                    <span class="text-sm text-[#8b755c]">
                        @if($reviewCount > 0)
                            {{ $averageRating }} ({{ $reviewCount }} Reviews)
                        @else
                            No Reviews
                        @endif
                    </span>

                </div>

                {{-- PRICE --}}
                @php
                    $firstSizePrice = $product->sizes->first()?->pivot?->price;
                    $displayPrice = $firstSizePrice ?? $product->discount_price ?? $product->price;
                @endphp

                <div class="flex flex-wrap items-center gap-3 mt-7">

                    <span id="product-price"
                          class="text-3xl font-bold text-[#493825]">
                        ₹{{ number_format($displayPrice, 2) }}
                    </span>

                    @if($product->discount_price && !$firstSizePrice)

                        <span class="text-lg text-[#a8957e] line-through">
                            ₹{{ number_format($product->price, 2) }}
                        </span>

                        <span class="bg-[#e9efe3] text-[#536b45]
                                     px-3 py-1.5 rounded-lg
                                     text-xs font-bold">
                            {{ round((($product->price - $product->discount_price) / $product->price) * 100) }}% OFF
                        </span>

                    @endif

                </div>

                {{-- Description --}}
                <div class="mt-7">

                    <h3 class="font-bold text-lg text-[#493825]">
                        Product Description
                    </h3>

                    <p class="text-[#79654e] leading-7 mt-3 text-sm">
                        {{ $product->description }}
                    </p>

                </div>


                <div class="border-t border-[#e8dccb] mt-8 pt-8">

                    {{-- ================= COLOR ================= --}}
                    <div>

                        <div class="flex justify-between items-center">

                            <label class="font-bold text-[#493825]">
                                Select Color
                            </label>

                            <span id="selected-color"
                                  class="text-sm text-[#8b755c]">
                                {{ $product->colors->first()->name ?? 'Select Color' }}
                            </span>

                        </div>

                        <div class="flex flex-wrap gap-3 mt-4">

                            @forelse($product->colors as $color)

                                <button
                                    type="button"
                                    onclick="selectColor('{{ $color->name }}', '{{ $color->id }}', this)"
                                    title="{{ $color->name }}"
                                    class="color-btn w-10 h-10 rounded-full
                                           border-2 border-[#d2b99c]
                                           hover:ring-2 hover:ring-offset-2
                                           hover:ring-[#493825] transition"
                                    style="background-color: {{ $color->hex_code ?? '#000000' }}">

                                </button>

                            @empty

                                <span class="text-sm text-[#9b8060]">
                                    No colors available
                                </span>

                            @endforelse

                        </div>

                    </div>


                    {{-- ================= SIZE ================= --}}
                    <div class="mt-8">

                        <div class="flex justify-between items-center">

                            <label class="font-bold text-[#493825]">
                                Select Size
                            </label>

                        </div>

                        <div class="flex flex-wrap gap-3 mt-4">

                            @forelse($product->sizes as $size)

                                <button
                                    type="button"
                                    onclick="selectSize(
                                        {{ $size->id }},
                                        '{{ $size->name }}',
                                        {{ $size->pivot->price }},
                                        this
                                    )"
                                    class="size-btn min-w-12 px-5 py-3
                                           rounded-xl border border-[#e8dccb]
                                           text-sm font-semibold text-[#493825]
                                           bg-[#fffdf9]
                                           hover:border-[#493825]
                                           hover:bg-[#493825]
                                           hover:text-white transition">

                                    {{ $size->name }}

                                </button>

                            @empty

                                <span class="text-sm text-[#9b8060]">
                                    No sizes available
                                </span>

                            @endforelse

                        </div>

                        {{-- Selected Size --}}
                        <div class="mt-4">

                            <span class="text-sm text-[#8b755c]">
                                Selected Size:
                            </span>

                            <span id="selected-size"
                                  class="text-sm font-bold text-[#493825]">
                                {{ $product->sizes->first()->name ?? 'None' }}
                            </span>

                        </div>

                    </div>


                    {{-- ================= SELECTED PRODUCT DATA ================= --}}
                    <input
                        type="hidden"
                        name="selected_color"
                        id="selected-color-input"
                        value="{{ $product->colors->first()->id ?? '' }}">

                    <input
                        type="hidden"
                        name="selected_size"
                        id="selected-size-input"
                        value="{{ $product->sizes->first()->id ?? '' }}">

                    <input
                        type="hidden"
                        name="selected_price"
                        id="selected-price-input"
                        value="{{ $displayPrice }}">


                    {{-- ================= QUANTITY ================= --}}
                    <div class="mt-8">

                        <label class="font-bold text-[#493825]">
                            Quantity
                        </label>

                        <div class="flex items-center w-fit mt-3
                                    border border-[#e8dccb]
                                    rounded-xl overflow-hidden bg-[#fffdf9]">

                            <button
                                type="button"
                                onclick="decreaseQty()"
                                class="w-12 h-12 hover:bg-[#f5efe6]
                                       text-xl text-[#493825] transition">
                                −
                            </button>

                            <input
                                id="quantity"
                                type="number"
                                value="1"
                                min="1"
                                class="w-14 h-12 text-center
                                       border-x border-[#e8dccb]
                                       outline-none text-[#493825]
                                       bg-transparent">

                            <button
                                type="button"
                                onclick="increaseQty()"
                                class="w-12 h-12 hover:bg-[#f5efe6]
                                       text-xl text-[#493825] transition">
                                +
                            </button>

                        </div>

                    </div>


                    {{-- ================= BUTTONS ================= --}}
                    <div class="grid sm:grid-cols-2 gap-3 mt-9">

                        @if($product->sizes && count($product->sizes) > 0)

                            <form
                                action="{{ route('cart.add', $product->id) }}"
                                method="POST">

                                @csrf

                                <input
                                    type="hidden"
                                    name="quantity"
                                    id="cart-quantity"
                                    value="1">

                                <input
                                    type="hidden"
                                    name="color_id"
                                    id="cart-color"
                                    value="{{ $product->colors->first()->id ?? '' }}">

                                <input
                                    type="hidden"
                                    name="size_id"
                                    id="cart-size"
                                    value="{{ $product->sizes->first()->id ?? '' }}">

                                <input
                                    type="hidden"
                                    name="price"
                                    id="cart-price"
                                    value="{{ $displayPrice }}">

                                <button
                                    type="submit"
                                    class="w-full h-14 bg-[#493825] text-white
                                           rounded-xl font-bold
                                           hover:bg-[#5c4630]
                                           hover:shadow-lg transition duration-300">

                                    <i class="fa-solid fa-bag-shopping mr-2"></i>
                                    Add to Cart

                                </button>

                            </form>

                            <button
                                type="button"
                                class="w-full h-14 border-2 border-[#493825]
                                       text-[#493825] rounded-xl font-bold
                                       hover:bg-[#493825] hover:text-white
                                       transition duration-300">

                                Buy Now
                                <i class="fa-solid fa-arrow-right ml-2"></i>

                            </button>

                        @else

                            <form
                                action="{{ route('product.notify', $product->id) }}"
                                method="POST">

                                @csrf

                                <button
                                    type="submit"
                                    class="w-full h-14 bg-[#493825] text-white
                                           rounded-xl font-bold
                                           hover:bg-[#5c4630]
                                           hover:shadow-lg transition duration-300">

                                    <i class="fa-regular fa-bell mr-2"></i>
                                    Notify Me

                                </button>

                            </form>

                        @endif

                    </div>


                    {{-- ================= FEATURES ================= --}}
                    <div class="grid grid-cols-3 gap-3 mt-9
                                border-t border-[#e8dccb] pt-7">

                        <div class="text-center">

                            <div class="w-11 h-11 mx-auto rounded-full
                                        bg-[#f5efe6] flex items-center justify-center">
                                <i class="fa-solid fa-truck-fast text-[#8b704f]"></i>
                            </div>

                            <p class="text-xs font-semibold text-[#493825] mt-3">
                                Fast Delivery
                            </p>

                        </div>

                        <div class="text-center">

                            <div class="w-11 h-11 mx-auto rounded-full
                                        bg-[#f5efe6] flex items-center justify-center">
                                <i class="fa-solid fa-rotate-left text-[#8b704f]"></i>
                            </div>

                            <p class="text-xs font-semibold text-[#493825] mt-3">
                                Easy Returns
                            </p>

                        </div>

                        <div class="text-center">

                            <div class="w-11 h-11 mx-auto rounded-full
                                        bg-[#f5efe6] flex items-center justify-center">
                                <i class="fa-solid fa-shield-halved text-[#8b704f]"></i>
                            </div>

                            <p class="text-xs font-semibold text-[#493825] mt-3">
                                Secure Payment
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- ================= REVIEWS ================= --}}
    <section class="bg-[#f5efe6] border-t border-[#e8dccb]">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

            <div class="text-center mb-10">

                <span class="text-xs uppercase tracking-[3px]
                             font-semibold text-[#9b8060]">
                    Customer Experiences
                </span>

                <h2 class="text-3xl font-bold text-[#493825] mt-3">
                    Customer Reviews
                </h2>

                <div class="w-14 h-[2px] bg-[#b99b76] mx-auto mt-4"></div>

            </div>

            @php
                $reviewCount = $product->reviews->count();

                $averageRating = $reviewCount > 0
                    ? round($product->reviews->avg('rating'), 1)
                    : 0;
            @endphp

            {{-- Average Rating --}}
            <div class="bg-[#fffdf9] border border-[#e8dccb]
                        rounded-2xl p-6 sm:p-8
                        flex flex-col sm:flex-row items-center
                        justify-center gap-5 max-w-xl mx-auto">

                <span class="text-5xl font-bold text-[#493825]">
                    {{ $averageRating > 0 ? $averageRating : '0.0' }}
                </span>

                <div class="text-center sm:text-left">

                    <div class="text-[#bd9556] text-xl tracking-wide">

                        @if($reviewCount > 0)

                            @for($i = 1; $i <= 5; $i++)

                                @if($i <= round($averageRating))
                                    ★
                                @else
                                    ☆
                                @endif

                            @endfor

                        @else
                            ☆☆☆☆☆
                        @endif

                    </div>

                    <p class="text-sm text-[#8b755c] mt-1">
                        Based on {{ $reviewCount }} reviews
                    </p>

                </div>

            </div>


            {{-- Review List --}}
            @if($product->reviews->isNotEmpty())

                <div class="grid md:grid-cols-2 gap-5 mt-10">

                    @foreach($product->reviews as $review)

                        <div class="bg-[#fffdf9] border border-[#e8dccb]
                                    rounded-2xl p-6
                                    hover:shadow-lg transition duration-300">

                            <div class="flex justify-between items-start gap-4">

                                <div>

                                    <p class="font-bold text-[#493825]">
                                        {{ $review->user->name ?? 'Customer' }}
                                    </p>

                                    <div class="text-[#bd9556] text-sm mt-2">

                                        @for($i = 1; $i <= 5; $i++)

                                            @if($i <= $review->rating)
                                                ★
                                            @else
                                                ☆
                                            @endif

                                        @endfor

                                    </div>

                                </div>

                                <span class="text-xs text-[#9b8060] whitespace-nowrap">
                                    {{ $review->created_at?->format('d M Y') }}
                                </span>

                            </div>

                            @if($review->comment)

                                <p class="text-[#79654e] text-sm leading-7 mt-4">
                                    {{ $review->comment }}
                                </p>

                            @endif

                        </div>

                    @endforeach

                </div>

            @else

                <div class="text-center py-12">

                    <div class="w-16 h-16 mx-auto rounded-full
                                bg-[#fffdf9] flex items-center justify-center">
                        <i class="fa-regular fa-comments text-2xl text-[#9b8060]"></i>
                    </div>

                    <h3 class="text-lg font-bold text-[#493825] mt-4">
                        No Reviews Yet
                    </h3>

                    <p class="text-sm text-[#8b755c] mt-2">
                        Be the first to review this product.
                    </p>

                </div>

            @endif

        </div>

    </section>

</div>


{{-- ================= JAVASCRIPT ================= --}}
<script>

    // ================= COLOR =================

    function selectColor(colorName, colorId, button) {

        document.getElementById('selected-color').innerText = colorName;

        document.getElementById('selected-color-input').value = colorId ?? '';

        document.getElementById('cart-color').value = colorId ?? '';

        document.querySelectorAll('.color-btn').forEach(btn => {

            btn.classList.remove(
                'ring-2',
                'ring-offset-2',
                'ring-[#493825]'
            );

        });

        button.classList.add(
            'ring-2',
            'ring-offset-2',
            'ring-[#493825]'
        );

    }


    // ================= SIZE =================

    function selectSize(sizeId, sizeName, price, button) {

        // Selected size name
        document.getElementById('selected-size').innerText = sizeName;

        // Hidden size
        document.getElementById('selected-size-input').value = sizeId;

        document.getElementById('cart-size').value = sizeId;

        // Price
        document.getElementById('product-price').innerText =
            '₹' + Number(price).toLocaleString('en-IN', {
                minimumFractionDigits: 2
            });

        // Hidden price
        document.getElementById('selected-price-input').value = price;

        document.getElementById('cart-price').value = price;

        // Remove selected class from all sizes
        document.querySelectorAll('.size-btn').forEach(btn => {

            btn.classList.remove(
                'bg-[#493825]',
                'text-white',
                'border-[#493825]'
            );

        });

        // Add selected class
        button.classList.add(
            'bg-[#493825]',
            'text-white',
            'border-[#493825]'
        );

    }


    // ================= QUANTITY =================

    function increaseQty() {

        let input = document.getElementById('quantity');

        let value = parseInt(input.value) || 1;

        input.value = value + 1;

        document.getElementById('cart-quantity').value = input.value;

    }


    function decreaseQty() {

        let input = document.getElementById('quantity');

        let value = parseInt(input.value) || 1;

        if (value > 1) {

            input.value = value - 1;

            document.getElementById('cart-quantity').value = input.value;

        }

    }

</script>

@endsection
