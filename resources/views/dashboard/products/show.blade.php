
@extends('layouts.admin.page')

@section('title', 'Product Details')

@section('adminPage')

@php
    $mainImage = $product->images->first()?->name ?? $product->image;

    $cardClass = 'overflow-hidden rounded-[26px] border border-white/80 bg-white/65 shadow-[0_15px_45px_rgba(100,75,45,0.06)] backdrop-blur-2xl';

    $labelClass = 'text-[10px] font-bold uppercase tracking-[1.5px] text-[#938778]';
@endphp

<div class="min-h-screen bg-[#f8f5ef] p-4 sm:p-6 lg:p-8">

    <div class="mx-auto max-w-7xl space-y-6">

        {{-- Page Header --}}
        <x-admin.sub-header :arr="[
            'title' => 'Product Details',
            'subtitle' => 'View product information'
        ]" />

        {{-- Product Details Card --}}
        <div class="{{ $cardClass }}">

            <div class="grid grid-cols-1 lg:grid-cols-3">

                {{-- LEFT: Product Image --}}
                <div class="relative flex items-center justify-center border-b border-[#e8dccb] bg-[#eee3d3]/40 p-6 sm:p-8 lg:border-b-0 lg:border-r">

                    <div class="absolute -left-10 -top-10 h-40 w-40 rounded-full bg-[#e7d5bb]/50 blur-3xl"></div>

                    <div class="relative w-full max-w-[340px]">

                        @if($mainImage)

                            <img
                                src="{{ asset('storage/' . $mainImage) }}"
                                alt="{{ $product->name }}"
                                class="aspect-square w-full rounded-[24px] border border-white/80 bg-white object-cover shadow-[0_15px_35px_rgba(100,75,45,0.12)]"
                            >

                        @else

                            <div class="flex aspect-square w-full items-center justify-center rounded-[24px] border border-[#e8dccb] bg-white/60 text-6xl text-[#a58a6d]">
                                ♧
                            </div>

                        @endif

                        {{-- Stock Badge --}}
                        <div class="absolute bottom-4 left-4">

                            @if($product->stock > 0)

                                <span class="inline-flex rounded-full bg-green-100/95 px-4 py-2 text-xs font-bold text-green-700 shadow-sm">
                                    {{ $product->stock }} In Stock
                                </span>

                            @else

                                <span class="inline-flex rounded-full bg-red-100/95 px-4 py-2 text-xs font-bold text-red-700 shadow-sm">
                                    Out of Stock
                                </span>

                            @endif

                        </div>

                    </div>

                </div>

                {{-- RIGHT: Product Information --}}
                <div class="p-6 sm:p-8 lg:col-span-2">

                    {{-- Product Title --}}
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">

                        <div class="min-w-0">

                            <h2 class="text-2xl font-bold tracking-tight text-[#5d4936] sm:text-3xl">
                                {{ $product->name }}
                            </h2>

                            <p class="mt-2 break-all text-sm text-[#a58a6d]">
                                {{ $product->slug }}
                            </p>

                            <p class="mt-2 text-xs font-medium text-[#938778]">
                                Product ID: #{{ $product->id }}
                            </p>

                        </div>

                        {{-- Status --}}
                        <div class="shrink-0">

                            @if($product->status == 1)

                                <span class="inline-flex items-center gap-2 rounded-full bg-green-100 px-4 py-2 text-xs font-bold text-green-700">

                                    <span class="h-2 w-2 rounded-full bg-green-500"></span>
                                    Active

                                </span>

                            @else

                                <span class="inline-flex items-center gap-2 rounded-full bg-red-100 px-4 py-2 text-xs font-bold text-red-700">

                                    <span class="h-2 w-2 rounded-full bg-red-500"></span>
                                    Inactive

                                </span>

                            @endif

                        </div>

                    </div>

                    {{-- Product Price --}}
                    <div class="mt-6 rounded-2xl border border-[#e8dccb]/70 bg-[#eee3d3]/40 p-5">

                        <p class="{{ $labelClass }}">
                            Product Price
                        </p>

                        @if($product->sale_price !== null)

                            <div class="mt-2 flex flex-wrap items-center gap-3">

                                <span class="text-3xl font-bold text-[#6b5540]">
                                    ₹{{ number_format($product->sale_price, 2) }}
                                </span>

                                <span class="text-base text-[#a58a6d] line-through">
                                    ₹{{ number_format($product->price, 2) }}
                                </span>

                            </div>

                            <p class="mt-2 text-xs font-medium text-green-700">
                                Sale Price
                            </p>

                        @else

                            <p class="mt-2 text-3xl font-bold text-[#6b5540]">
                                ₹{{ number_format($product->price, 2) }}
                            </p>

                        @endif

                    </div>

                    {{-- Product Attributes --}}
                    <div class="mt-7 grid grid-cols-1 gap-6 sm:grid-cols-2">

                        {{-- Category --}}
                        <div>
                            <p class="{{ $labelClass }}">Category</p>

                            <p class="mt-2 text-sm font-semibold text-[#5d4936]">
                                {{ $product->category?->name ?? 'N/A' }}
                            </p>
                        </div>

                        {{-- Brand --}}
                        <div>
                            <p class="{{ $labelClass }}">Brand</p>

                            <p class="mt-2 text-sm font-semibold text-[#5d4936]">
                                {{ $product->brand?->name ?? 'N/A' }}
                            </p>
                        </div>

                        {{-- Colors --}}
                        <div>
                            <p class="{{ $labelClass }}">Available Colors</p>

                            <div class="mt-3 flex flex-wrap gap-2">

                                @forelse($product->colors as $color)

                                    <span class="inline-flex rounded-lg bg-[#eee3d3] px-3 py-1.5 text-xs font-semibold text-[#6b5540]">
                                        {{ $color->name }}
                                    </span>

                                @empty

                                    <span class="text-sm text-[#a58a6d]">
                                        N/A
                                    </span>

                                @endforelse

                            </div>
                        </div>

                        {{-- Sizes --}}
                        <div>
                            <p class="{{ $labelClass }}">Available Sizes</p>

                            <div class="mt-3 flex flex-wrap gap-2">

                                @forelse($product->sizes as $size)

                                    <span class="inline-flex rounded-lg border border-[#e8dccb] bg-white/70 px-3 py-1.5 text-xs font-semibold text-[#6b5540]">

                                        {{ $size->name }}

                                        @if($size->pivot?->price !== null)
                                            - ₹{{ number_format($size->pivot->price, 2) }}
                                        @endif

                                    </span>

                                @empty

                                    <span class="text-sm text-[#a58a6d]">
                                        N/A
                                    </span>

                                @endforelse

                            </div>
                        </div>

                        {{-- Stock --}}
                        <div>
                            <p class="{{ $labelClass }}">Stock Quantity</p>

                            <p class="mt-2 text-sm font-bold {{ $product->stock > 0 ? 'text-green-700' : 'text-red-600' }}">
                                {{ $product->stock ?? 0 }}
                            </p>
                        </div>

                        {{-- Product Status --}}
                        <div>
                            <p class="{{ $labelClass }}">Product Status</p>

                            <p class="mt-2 text-sm font-semibold text-[#5d4936]">
                                {{ $product->status == 1 ? 'Active' : 'Inactive' }}
                            </p>
                        </div>

                    </div>

                    {{-- Description --}}
                    <div class="mt-8 border-t border-[#e8dccb]/70 pt-6">

                        <p class="{{ $labelClass }}">
                            Product Description
                        </p>

                        <p class="mt-3 whitespace-pre-line text-sm leading-7 text-[#796a59]">{{ $product->description ?: 'No description available.' }}</p>

                    </div>

                </div>

            </div>

            {{-- Footer Actions --}}
            <div class="flex flex-col gap-4 border-t border-[#e8dccb]/70 bg-[#eee3d3]/25 px-6 py-5 sm:flex-row sm:items-center sm:justify-between">

                <div class="flex flex-wrap items-center gap-3">

                    {{-- Back --}}
                    <a
                        href="{{ route('products.index') }}"
                        class="inline-flex items-center justify-center rounded-xl border border-[#e8dccb] bg-white/70 px-5 py-2.5 text-sm font-semibold text-[#6b5540] transition duration-300 hover:bg-[#eee3d3]"
                    >
                        &larr; Back
                    </a>

                    {{-- Edit --}}
                    <a
                        href="{{ route('products.edit', $product->id) }}"
                        class="inline-flex items-center justify-center rounded-xl bg-[#6b5540] px-5 py-2.5 text-sm font-semibold text-white transition duration-300 hover:-translate-y-0.5 hover:bg-[#4e3c2b]"
                    >
                        ✎ Edit Product
                    </a>

                </div>

                {{-- Delete --}}
                <form
                    action="{{ route('products.destroy', $product->id) }}"
                    method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this product?')"
                >
                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="inline-flex w-full items-center justify-center rounded-xl border border-red-200 bg-red-50 px-5 py-2.5 text-sm font-semibold text-red-600 transition duration-300 hover:bg-red-100 sm:w-auto"
                    >
                        🗑 Delete Product
                    </button>

                </form>

            </div>

        </div>

        {{-- Additional Product Images --}}
        @if($product->images->count() > 1)

            <div class="{{ $cardClass }}">

                <div class="border-b border-[#e8dccb]/60 bg-[#eee3d3]/30 px-6 py-5">

                    <h2 class="text-base font-bold text-[#5d4936]">
                        Product Gallery
                    </h2>

                    <p class="mt-1 text-xs text-[#a58a6d]">
                        Additional product images
                    </p>

                </div>

                <div class="grid grid-cols-2 gap-4 p-6 sm:grid-cols-3 lg:grid-cols-5">

                    @foreach($product->images as $image)

                        <div class="group overflow-hidden rounded-2xl border border-[#e8dccb] bg-[#eee3d3]/30">

                            <img
                                src="{{ asset('storage/' . $image->name) }}"
                                alt="{{ $product->name }}"
                                loading="lazy"
                                class="aspect-square w-full object-cover transition duration-500 group-hover:scale-110"
                            >

                        </div>

                    @endforeach

                </div>

            </div>

        @endif

    </div>

</div>

@endsection
