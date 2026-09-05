@extends('layouts.customer.customer-layout')
@section('customerContent')

<div class="bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8">
        <div class="flex items-center gap-2 text-sm text-gray-500">
            <a href="#" class="hover:text-black">Home</a>
            <span>/</span>

            <a href="{{ route('customer.shop') }}" class="hover:text-black">Shop</a>
            <span>/</span>

            <span class="text-gray-900">{{ $product->name }}</span>
        </div>
    </div>


    {{-- PRODUCT --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <div class="grid lg:grid-cols-2 gap-12">

            {{-- LEFT : IMAGE --}}
            <div>

                <div class="relative bg-white rounded-3xl overflow-hidden border border-gray-100">

                    {{-- Tag --}}
                    @if($product->tag)
                        <span class="absolute top-5 left-5 z-10
                                     bg-black text-white
                                     px-3 py-1.5 rounded-lg
                                     text-xs font-semibold">
                            {{ $product->tag }}
                        </span>
                    @endif


                    {{-- Wishlist --}}
                    <button
                        type="button"
                        class="absolute top-5 right-5 z-10
                               w-11 h-11 rounded-full
                               bg-white shadow
                               flex items-center justify-center
                               text-xl
                               hover:bg-black
                               hover:text-white
                               transition">
                        ♡
                    </button>

                    @if(isset($product->images[0]) && $product->images[0]->name != "")
                    <img
                        src="{{ asset('storage/' . $product->images->first()->name) }}"
                        alt="{{ $product->name }}"
                        class="w-full aspect-[4/5] object-cover">
                    @else
                    <img
                        src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->name }}"
                        class="w-full aspect-[4/5] object-cover">
                    @endif
                    

                </div>


                {{-- Thumbnail --}}
     <div class="flex gap-3 mt-4">
    @if(!empty($product->images) && is_iterable($product->images))

        @foreach($product->images as $image)
            @if(is_object($image) && !empty($image->name))
                <div class="w-20 h-20 rounded-xl overflow-hidden border-2 border-black">
                    <img
                        src="{{ asset('storage/' . $image->name) }}"
                        alt="{{ $product->name ?? 'Product image' }}"
                        class="w-full h-full object-cover"
                    >
                </div>
            @elseif(is_array($image) && !empty($image['name']))
                <div class="w-20 h-20 rounded-xl overflow-hidden border-2 border-black">
                    <img
                        src="{{ asset('storage/' . $image['name']) }}"
                        alt="{{ $product->name ?? 'Product image' }}"
                        class="w-full h-full object-cover"
                    >
                </div>
            @endif
        @endforeach

    @endif
</div>

            </div>


            {{-- RIGHT : DETAILS --}}
            <div class="lg:pt-5">


                {{-- Category --}}
                <p class="text-sm text-gray-500">
                    {{ $product->category->name ?? 'Collection' }}
                </p>


                {{-- Name --}}
                <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mt-2">
                    {{ $product->name }}
                </h1>


                {{-- Tag --}}

             @if($product->tags && $product->tags->count())
    <div class="mt-3 flex flex-wrap gap-2">

        @foreach($product->tags as $tag)

            @if(!empty($tag->name))

                <span class="inline-block px-3 py-1
                             bg-gray-100 rounded-lg
                             text-xs font-semibold text-gray-700">
                    {{ $tag->name }}
                </span>
            @endif
        @endforeach

    </div>
@endif


                {{-- Rating --}}
                <div class="flex items-center gap-3 mt-4">

                    @php
                        $reviewCount = $product->reviews->count();
                        $averageRating = $reviewCount > 0
                            ? round($product->reviews->avg('rating'), 1)
                            : 0;
                    @endphp

                    <div class="text-yellow-500 text-lg">

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

                    <span class="text-sm text-gray-500">

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

                <div class="flex items-center gap-3 mt-6">

                    <span id="product-price" class="text-3xl font-bold">
                        ₹{{ number_format($displayPrice, 2) }}
                    </span>

                    {{-- Original product price --}}
                    @if($product->discount_price && !$firstSizePrice)

                        <span class="text-lg text-gray-400 line-through">
                            ₹{{ number_format($product->price, 2) }}
                        </span>

                        <span class="bg-green-100
                                     text-green-700
                                     px-2.5 py-1
                                     rounded-lg
                                     text-xs font-semibold">

                            {{ round((($product->price - $product->discount_price) / $product->price) * 100) }}% OFF

                        </span>

                    @endif

                </div>


                {{-- Description --}}
                <div class="mt-6">

                    <h3 class="font-semibold text-lg">
                        Product Description
                    </h3>

                    <p class="text-gray-500 leading-7 mt-2">
                        {{ $product->description }}
                    </p>

                </div>


                <div class="border-t border-gray-200 mt-7 pt-7">


                    {{-- ================= COLOR ================= --}}
                    <div>

                        <div class="flex justify-between">

                            <label class="font-semibold">
                                Color
                            </label>

                            <span
                                id="selected-color"
                                class="text-sm text-gray-500">
                                {{ $product->colors->first()->name ?? 'Select Color' }}
                            </span>

                        </div>


                        <div class="flex gap-3 mt-4">

                            @forelse($product->colors as $color)

                                <button
                                    type="button"
                                    onclick="selectColor(
                                        '{{ $color->name }}',
                                        '{{ $color->id }}',
                                        this
                                    )"
                                    title="{{ $color->name }}"
                                    class="color-btn w-9 h-9 rounded-full border-2
                                           hover:ring-2 hover:ring-offset-2
                                           hover:ring-black transition"
                                    style="background-color: {{ $color->hex_code ?? '#000000' }}">

                                </button>

                            @empty

                                <span class="text-sm text-gray-500">
                                    No colors available
                                </span>

                            @endforelse

                        </div>

                    </div>


                    {{-- ================= SIZE ================= --}}
                    <div class="mt-7">

                        <div class="flex justify-between">

                            <label class="font-semibold">
                                Size
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
                                    class="size-btn min-w-12 px-4 py-2.5
                                           rounded-xl
                                           border border-gray-300
                                           text-sm font-semibold
                                           hover:border-black
                                           hover:bg-black
                                           hover:text-white
                                           transition">

                                    {{ $size->name }}

                                </button>

                            @empty

                                <span class="text-sm text-gray-500">
                                    No sizes available
                                </span>

                            @endforelse

                        </div>


                        {{-- Selected Size --}}
                        <div class="mt-4">

                            <span class="text-sm text-gray-500">
                                Selected Size:
                            </span>

                            <span
                                id="selected-size"
                                class="text-sm font-semibold">
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
                    <div class="mt-7">

                        <label class="font-semibold">
                            Quantity
                        </label>

                        <div class="flex items-center
                                    w-fit mt-3
                                    border border-gray-300
                                    rounded-xl overflow-hidden">

                            <button
                                type="button"
                                onclick="decreaseQty()"
                                class="w-11 h-11
                                       hover:bg-gray-100
                                       text-lg">
                                −
                            </button>

                            <input
                                id="quantity"
                                type="number"
                                value="1"
                                min="1"
                                class="w-12 h-11
                                       text-center
                                       border-x
                                       border-gray-300
                                       outline-none">

                            <button
                                type="button"
                                onclick="increaseQty()"
                                class="w-11 h-11
                                       hover:bg-gray-100
                                       text-lg">
                                +
                            </button>

                        </div>

                    </div>


                    {{-- ================= BUTTONS ================= --}}
                    <div class="grid sm:grid-cols-2 gap-3 mt-8">
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
                                class="w-full h-14
                                       bg-black text-white
                                       rounded-2xl
                                       font-semibold
                                       hover:bg-gray-800
                                       transition">

                                Add to Cart

                            </button>
                          

                        </form>
                          <button
                            type="button"
                            class="w-full h-14
                                   border-2 border-black
                                   rounded-2xl
                                   font-semibold
                                   hover:bg-black
                                   hover:text-white
                                   transition">

                            Buy Now

                        </button>
                        @else
                        <form
                            action="{{ route('product.notify', $product->id) }}"
                            method="POST">

                            @csrf

                           


                            <button
                                type="submit"
                                class="w-full h-14
                                       bg-black text-white
                                       rounded-2xl
                                       font-semibold
                                       hover:bg-gray-800
                                       transition">

                                Notify me

                            </button>

                        </form>
                        @endif

                        


                        

                    </div>


                    {{-- ================= FEATURES ================= --}}
                    <div class="grid grid-cols-3 gap-3 mt-8">

                        <div class="text-center">

                            <div class="text-xl">
                                🚚
                            </div>

                            <p class="text-xs font-semibold mt-2">
                                Fast Delivery
                            </p>

                        </div>


                        <div class="text-center">

                            <div class="text-xl">
                                ↩️
                            </div>

                            <p class="text-xs font-semibold mt-2">
                                Easy Returns
                            </p>

                        </div>


                        <div class="text-center">

                            <div class="text-xl">
                                🔒
                            </div>

                            <p class="text-xs font-semibold mt-2">
                                Secure Payment
                            </p>

                        </div>

                    </div>


                </div>

            </div>

        </div>

    </section>


    {{-- ================= REVIEWS ================= --}}
    <section class="bg-white border-t">

        <div class="max-w-7xl mx-auto
                    px-4 sm:px-6 lg:px-8
                    py-14">

            <h2 class="text-2xl font-bold">
                Customer Reviews
            </h2>


            @php
                $reviewCount = $product->reviews->count();

                $averageRating = $reviewCount > 0
                    ? round($product->reviews->avg('rating'), 1)
                    : 0;
            @endphp


            <div class="flex items-center gap-4 mt-5">

                <span class="text-4xl font-bold">

                    {{ $averageRating > 0 ? $averageRating : '0.0' }}

                </span>


                <div>

                    <div class="text-yellow-500">

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


                    <p class="text-sm text-gray-500 mt-1">

                        Based on {{ $reviewCount }} reviews

                    </p>

                </div>

            </div>


            {{-- Review List --}}
            @if($product->reviews->isNotEmpty())

                <div class="mt-8 space-y-5">

                    @foreach($product->reviews as $review)

                        <div class="border-b border-gray-200 pb-5">

                            <div class="flex justify-between">

                                <div>

                                    <p class="font-semibold">
                                        {{ $review->user->name ?? 'Customer' }}
                                    </p>

                                    <div class="text-yellow-500 text-sm">

                                        @for($i = 1; $i <= 5; $i++)

                                            @if($i <= $review->rating)
                                                ★
                                            @else
                                                ☆
                                            @endif

                                        @endfor

                                    </div>

                                </div>

                                <span class="text-xs text-gray-400">

                                    {{ $review->created_at?->format('d M Y') }}

                                </span>

                            </div>


                            @if($review->comment)

                                <p class="text-gray-600 mt-2">
                                    {{ $review->comment }}
                                </p>

                            @endif

                        </div>

                    @endforeach

                </div>

            @endif

        </div>

    </section>


</div>


{{-- ================= JAVASCRIPT ================= --}}
<script>

    // ================= COLOR =================

    function selectColor(colorName,colorId, button) {

        document.getElementById('selected-color').innerText = colorName;

        document
            .getElementById('selected-color-input')
            .value = button.dataset.id ?? '';

        document
            .getElementById('cart-color')
            .value = colorId ?? '';


        document.querySelectorAll('.color-btn').forEach(btn => {

            btn.classList.remove(
                'ring-2',
                'ring-offset-2',
                'ring-black'
            );

        });


        button.classList.add(
            'ring-2',
            'ring-offset-2',
            'ring-black'
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
                'bg-black',
                'text-white',
                'border-black'
            );

        });


        // Add selected class
        button.classList.add(
            'bg-black',
            'text-white',
            'border-black'
        );

    }


    // ================= QUANTITY =================

    function increaseQty() {

        let input = document.getElementById('quantity');

        let value = parseInt(input.value) || 1;

        input.value = value + 1;

        document.getElementById('cart-quantity').value =
            input.value;

    }


    function decreaseQty() {

        let input = document.getElementById('quantity');

        let value = parseInt(input.value) || 1;

        if (value > 1) {

            input.value = value - 1;

            document.getElementById('cart-quantity').value =
                input.value;

        }

    }

</script>


@endsection
