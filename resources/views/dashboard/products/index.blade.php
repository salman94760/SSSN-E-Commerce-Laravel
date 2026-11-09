
@extends('layouts.admin.page')

@section('title', 'Products')

@section('adminPage')

@php
    $status = ['All', 'Active', 'Inactive', 'Stock', 'OutStock'];

    $column = [
        'Action', 'Status', '#', 'Product',
        'Product Added By', 'Category', 'Brand',
        'Colors', 'Sizes', 'Tags', 'Price', 'Stock'
    ];
@endphp

<div class="min-h-screen bg-[#f8f5ef] p-4 sm:p-6 lg:p-8">

    <div class="mx-auto max-w-7xl space-y-6">

        {{-- Header --}}
        <x-admin.sub-header :arr="[
            'title' => 'Products',
            'subtitle' => 'Manage your clothing products.',
            'AddButton' => '+ Add Product',
            'link' => 'products.create'
        ]" />
       
<div class="grid grid-cols-2 gap-4 xl:grid-cols-4 xl:gap-6">

    {{-- Total Products --}}
    <x-admin.view-cards
        :arr="[
            'title' => 'Total Products',
            'icon' => '📦',
            'count' => $productsInfo->total ?? 0,
            'text' => 'Total products in store',
        ]"
    />

    {{-- Active Products --}}
    <x-admin.view-cards
        :arr="[
            'title' => 'Active Products',
            'icon' => '✅',
            'count' => $productsInfo->active ?? 0,
            'text' => 'Currently active products',
        ]"
    />

    {{-- Out of Stock --}}
    <x-admin.view-cards
        :arr="[
            'title' => 'Out of Stock',
            'icon' => '🚫',
            'count' => $productsInfo->out_stock ?? 0,
            'text' => 'Products currently out of stock',
        ]"
    />

    {{-- Low Stock --}}
    <x-admin.view-cards
        :arr="[
            'title' => 'Low Stock',
            'icon' => '⚠️',
            'count' => $productsInfo->low_stock ?? 0,
            'text' => 'Products running low on stock',
        ]"
    />

</div>


       

        {{-- Filters --}}
        <x-admin.view-filter :arr="[
            'status' => $status,
            'categories' => $categories,
            'brands' => $brands,
            'searchname' => 'products',
            'reset' => '/products'
        ]" />

        {{-- Products Table --}}
        <x-admin.view-table :arr="[
            'columnArr' => $column
        ]">

            @forelse($products as $product)

                <tr>

                    {{-- Actions --}}
                    <td>
                        <div class="flex items-center gap-2">

                            <a href="{{ route('products.show', $product->id) }}"
                               title="View"
                               class="flex h-9 w-9 items-center justify-center rounded-xl border border-[#e8dccb] bg-white/70 text-[#6b5540] transition hover:bg-[#eee3d3]">
                                👁
                            </a>

                            @if($userid === $product->user_id || auth()->user()->can('isAdmin'))

                                <a href="{{ route('products.edit', $product->id) }}"
                                   title="Edit"
                                   class="flex h-9 w-9 items-center justify-center rounded-xl border border-[#e8dccb] bg-white/70 text-[#6b5540] transition hover:bg-[#eee3d3]">
                                    ✎
                                </a>

                                <form action="{{ route('products.destroy', $product->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this product?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            title="Delete"
                                            class="flex h-9 w-9 items-center justify-center rounded-xl border border-red-200 bg-red-50 text-red-600 transition hover:bg-red-100">
                                        🗑
                                    </button>

                                </form>

                            @endif

                        </div>
                    </td>

                    {{-- Status --}}
                    <td>
                        @if($product->status)
                            <span class="inline-flex rounded-full bg-green-100 px-3 py-1.5 text-xs font-semibold text-green-700">
                                Active
                            </span>
                        @else
                            <span class="inline-flex rounded-full bg-red-100 px-3 py-1.5 text-xs font-semibold text-red-700">
                                Inactive
                            </span>
                        @endif
                    </td>

                    {{-- ID --}}
                    <td class="font-medium text-[#938778]">
                        #{{ $product->id }}
                    </td>

                    {{-- Product --}}
                    <td>
                        <div class="flex min-w-[200px] items-center gap-3">

                            @php
                                $image = $product->images->first()?->name
                                    ?? $product->image;
                            @endphp

                            @if($image)
                                <img src="{{ asset('storage/' . $image) }}"
                                     alt="{{ $product->name }}"
                                     class="h-12 w-12 rounded-xl border border-[#e8dccb] object-cover">
                            @else
                                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#eee3d3] text-[#938778]">
                                    ♧
                                </div>
                            @endif

                            <div>
                                <p class="font-semibold text-[#5d4936]">
                                    {{ $product->name }}
                                </p>

                                <p class="mt-1 text-xs text-[#a58a6d]">
                                    {{ $product->slug }}
                                </p>
                            </div>

                        </div>
                    </td>

                    {{-- Added By --}}
                    <td>
                        {{ $product->users?->name ?? 'N/A' }}
                    </td>

                    {{-- Category --}}
                    <td>
                        {{ $product->category?->name ?? 'N/A' }}
                    </td>

                    {{-- Brand --}}
                    <td>
                        {{ $product->brand?->name ?? 'N/A' }}
                    </td>

                    {{-- Colors --}}
                    <td>
                        <div class="flex min-w-[120px] flex-wrap gap-1">

                            @forelse($product->colors as $color)

                                <span class="rounded-lg bg-[#eee3d3] px-2 py-1 text-xs font-medium text-[#6b5540]">
                                    {{ $color->name }}
                                </span>

                            @empty
                                <span class="text-[#a58a6d]">N/A</span>
                            @endforelse

                        </div>
                    </td>

                    {{-- Sizes --}}
                    <td>
                        <div class="flex min-w-[140px] flex-wrap gap-1">

                            @forelse($product->sizes as $size)

                                <span class="rounded-lg border border-[#e8dccb] bg-white/70 px-2 py-1 text-xs text-[#6b5540]">
                                    {{ $size->name }} -
                                    ₹{{ number_format($size->pivot->price ?? 0, 2) }}
                                </span>

                            @empty
                                <span class="text-[#a58a6d]">N/A</span>
                            @endforelse

                        </div>
                    </td>

                    {{-- Tags --}}
                    <td>
                        <div class="flex min-w-[120px] flex-wrap gap-1">

                            @forelse($product->tags as $tag)

                                <span class="rounded-full bg-[#f0e6d1] px-3 py-1 text-xs text-[#6b5540]">
                                    {{ $tag->name }}
                                </span>

                            @empty
                                <span class="text-[#a58a6d]">N/A</span>
                            @endforelse

                        </div>
                    </td>

                    {{-- Price --}}
                    <td class="whitespace-nowrap">

                        @if($product->sale_price !== null)

                            <div class="font-bold text-[#6b5540]">
                                ₹{{ number_format($product->sale_price, 2) }}
                            </div>

                            <div class="mt-1 text-xs text-[#a58a6d] line-through">
                                ₹{{ number_format($product->price, 2) }}
                            </div>

                        @else

                            <span class="font-bold text-[#6b5540]">
                                ₹{{ number_format($product->price, 2) }}
                            </span>

                        @endif
                    </td>

                    {{-- Stock --}}
                    <td class="whitespace-nowrap">

                        @if($product->stock > 0)

                            <span class="rounded-full bg-green-100 px-3 py-1.5 text-xs font-semibold text-green-700">
                                {{ $product->stock }} In Stock
                            </span>

                        @else

                            <span class="rounded-full bg-red-100 px-3 py-1.5 text-xs font-semibold text-red-700">
                                Out of Stock
                            </span>

                        @endif

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="{{ count($column) }}" class="py-16 text-center">

                        <div class="flex flex-col items-center justify-center">

                            <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-[#eee3d3] text-3xl text-[#a58a6d]">
                                ♧
                            </div>

                            <h3 class="mt-4 font-semibold text-[#6b5540]">
                                No Products Found
                            </h3>

                            <p class="mt-2 text-xs text-[#a58a6d]">
                                Add your first product to get started.
                            </p>

                        </div>

                    </td>
                </tr>

            @endforelse

        </x-admin.view-table>

        {{-- Pagination --}}
        <x-admin.view-pagination :arr="[
            'arrpagination' => $products
        ]" />

    </div>

</div>

@endsection
