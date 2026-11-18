@extends('layouts.customer.customer-layout')

@section('title', 'SSSN | WISHLIST')

@section('customerContent')

{{-- HERO --}}
<section class="bg-[#fffdf9] border-b border-[#e8dccb]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-5">

            <div>
                <span class="text-xs uppercase tracking-[0.2em] text-[#9a846a]">
                    Your Collection
                </span>

                <h1 class="text-4xl font-bold mt-3 text-[#493825]">
                    My Wishlist
                </h1>

                <p class="text-[#79654e] mt-2">
                    Products you've saved for later.
                </p>
            </div>

            <span class="inline-flex items-center gap-2 text-sm
                         text-[#79654e] bg-[#f5efe6]
                         border border-[#e8dccb]
                         px-4 py-2 rounded-full">

                <i class="fa-regular fa-heart text-[#9a846a]"></i>

                {{ $products->count() }} saved items

            </span>

        </div>

    </div>
</section>


{{-- WISHLIST --}}
<section class="bg-[#faf7f2] min-h-[400px]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        @if($products->count() > 0)

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">

                @foreach($products as $product)

                    <x-products.productCard :product="$product" />

                @endforeach

            </div>

        @else

            {{-- EMPTY WISHLIST --}}
            <div class="bg-white border border-[#e8dccb]
                        rounded-3xl py-16 px-6 text-center shadow-sm">

                <div class="w-20 h-20 mx-auto rounded-full
                            bg-[#f5efe6] flex items-center
                            justify-center">

                    <i class="fa-regular fa-heart text-3xl text-[#9a846a]"></i>

                </div>

                <h2 class="text-2xl font-bold text-[#493825] mt-6">
                    Your Wishlist is Empty
                </h2>

                <p class="text-[#79654e] mt-2">
                    Save your favourite products here and find them whenever you need.
                </p>

                <a href="{{ route('customer.shop') }}"
                   class="inline-flex items-center justify-center gap-2
                          mt-7 px-7 py-3 rounded-xl
                          bg-[#493825] text-white
                          text-sm font-semibold
                          hover:bg-[#5c4630] transition duration-300">

                    <i class="fa-solid fa-bag-shopping"></i>
                    Explore Collection

                </a>

            </div>

        @endif

    </div>
</section>

@endsection