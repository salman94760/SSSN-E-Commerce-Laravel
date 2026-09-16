@extends('layouts.admin.page')

@section('title', 'Products Show')

@section('adminPage')

<div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
    <div class="mx-auto max-w-7xl">

        <x-admin.sub-header :arr="['title'=>'Product Details','subtitle'=>'View product information']"/>

            <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
                <div class="overflow-x-auto">
                    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                        <x-admin.view-table>
                            <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
                                <div class="grid grid-cols-1 md:grid-cols-3">
                                    <div class="flex items-center justify-center border-b border-slate-200 bg-slate-50 p-8 md:border-b-0 md:border-r">

                                    @if(!empty($product->images->first()))
                                    <img src="{{ asset('storage/' . $product->images->first()->name) }}" alt="{{ $product->name }}" class="h-72 w-72 rounded-xl object-cover">
                                    @else
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="h-72 w-72 rounded-xl object-cover">
                                    @endif
                                    </div>

                                    <div class="p-8 md:col-span-2">
                                        <h2 class="text-2xl font-bold text-slate-800">
                                            {{ $product->name }}
                                        </h2>

                                        <p class="mt-1 text-sm text-slate-400">
                                            {{ $product->slug }}
                                        </p>

                                        <div class="mt-6 grid grid-cols-1 gap-5 sm:grid-cols-2">
                                            <div>
                                                <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                                    Category
                                                </p>

                                                <p class="mt-1 font-medium text-slate-800">
                                                    {{ $product->category->name ?? 'N/A' }}
                                                </p>
                                            </div>

                                            <div>

                                                <p class="text-xs font-medium uppercase tracking-wide text-slate-400">Brand</p>

                                                <p class="mt-1 font-medium text-slate-800">
                                                    {{ $product->brand->name ?? 'N/A' }}
                                                </p>
                                            </div>

                                             <div>
                                                <p class="text-xs font-medium uppercase tracking-wide text-slate-400">Colors</p>
                                                @if(!empty($product->colors))
                                                @foreach($product->colors as $color)
                                                    <p class="mt-1 font-medium text-slate-800">
                                                    {{ $color->name ?? 'N/A' }}
                                                    </p>
                                                @endforeach
                                                @endif
                                            </div>

                                            <div>
                                                <p class="text-xs font-medium uppercase tracking-wide text-slate-400">Sizes</p>
                                                @if(!empty($product->sizes))
                                                @foreach($product->sizes as $size)
                                                    <p class="mt-1 font-medium text-slate-800">
                                                    {{ $size->name ?? 'N/A' }} - ₹{{ $size->pivot->price ?? 'N/A' }} 
                                                    </p>
                                                @endforeach
                                                @endif
                                            </div>

                                            <div>
                                                <p class="text-xs font-medium uppercase tracking-wide text-slate-400">Price</p>

                                                <p class="mt-1 font-semibold text-slate-800">
                                                    ₹{{ number_format($product->price, 2) }}
                                                </p>
                                            </div>

                                            <div>
                                                <p class="text-xs font-medium uppercase tracking-wide text-slate-400">Sale Price</p>

                                                <p class="mt-1 font-semibold text-green-600">
                                                    @if($product->sale_price)
                                                        ₹{{ number_format($product->sale_price, 2) }}
                                                    @else
                                                    —
                                                    @endif
                                                </p>
                                            </div>

                                            <div>
                                                <p class="text-xs font-medium uppercase tracking-wide text-slate-400">Stock</p>
                                                <p class="mt-1 font-semibold text-slate-800">
                                                    {{ $product->stock }}
                                                </p>
                                            </div>

                                            <div>
                                                <p class="text-xs font-medium uppercase tracking-wide text-slate-400">Status</p>
                                                <div class="mt-1">
                                                    @if($product->status)
                                                    <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">Active</span>

                                                    @else
                                                    <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
                                                        Inactive
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-7 border-t border-slate-200 pt-6">
                                            <p class="text-xs font-medium uppercase tracking-wide text-slate-400">Description</p>
                                            <p class="mt-2 text-sm leading-6 text-slate-600">
                                                {{ $product->description ?: 'No description available.' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between border-t border-slate-200 bg-slate-50 px-6 py-4">
                                    <div class="flex gap-2">
                                        <a href="{{ route('products.edit', $product->id) }}" class="rounded-lg bg-slate-800 px-4 py-2.5 text-sm font-semibold text-white hover:bg-slate-700">Edit
                                        </a>

                                        <a href="{{ route('products.index') }}" class="rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm font-medium text-slate-600 hover:bg-slate-50">Back</a>
                                    </div>

                                    <div>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="rounded-lg border border-red-200 bg-white px-4 py-2.5 text-sm font-medium text-red-600 hover:bg-red-50">Delete Product</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </x-admin.view-table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection