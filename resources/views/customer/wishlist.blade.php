@extends('layouts.customer.customer-layout')

@section('title', 'SSSN | WISHLIST')

@section('customerContent')

{{-- HERO --}}
<section class="bg-white border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-5">

            <div>
                <span class="text-xs uppercase tracking-widest text-gray-400">
                    Your Collection
                </span>

                <h1 class="text-4xl font-bold mt-3">
                    My Wishlist
                </h1>

                <p class="text-gray-500 mt-2">
                    Products you've saved for later.
                </p>
            </div>

            <span class="text-sm text-gray-500">
                {{ $products->count() }} saved items
            </span>

        </div>
    </div>
</section>


{{-- WISHLIST --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">

        @foreach($products as $product)
         <x-products.productCard :product="$product" />

           

        @endforeach

    </div>

</section>

@endsection
