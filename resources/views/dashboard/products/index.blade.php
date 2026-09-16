@extends('layouts.admin.page')

@section('title', 'Products')

@section('adminPage')

@php
    $status = ['All','Active','Inactive','Stock','OutStock'];
    $column = ['Action','Status','#','Product','Product Added By','Category','Brand','Colors','Sizes','Tages','Price','Stock'];
@endphp

<div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
    <div class="mx-auto max-w-7xl">

        <x-admin.sub-header :arr="['title'=>'Products','subtitle'=>'Manage your clothing products.','AddButton'=>'+ Add Product','link'=>'products.create']"/>

        <x-admin.view-cards :arr="['productsInfo'=>$productsInfo]"/>

        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                    <x-admin.view-filter :arr="['status'=>$status,'categories'=>$categories,'brands'=>$brands,'searchname'=>'products','reset'=>'/products']"/>
                    
                    <x-admin.view-table :arr="['columnArr'=>$column]">
                    @forelse($products as $product)
                       
                       
                  

                            
                        <tr class="transition hover:bg-slate-50">
                            
                            {{-- Actions --}}
                            <td class="px-6 py-4">
                                <div class=" justify-end gap-2">
                                    <a href="{{ route('products.show', $product->id) }}" title="View" class="flex h-9 w-9 items-center justify-center rounded-lg border border-slate-200 text-slate-500 hover:bg-slate-100 hover:text-slate-900">👁</a>
                                    
                                    @if($userid === $product->user_id)
                                        <a href="{{ route('products.edit', $product->id) }}" title="Edit" class="flex h-9 w-9 items-center justify-center rounded-lg border border-blue-200 text-blue-600 hover:bg-blue-50">✎</a>

                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                            @csrf
                                            @method('DELETE')

                                            <button title="Delete" type="submit" class="flex h-9 w-9 items-center justify-center rounded-lg border border-red-200 text-red-600 hover:bg-red-50">🗑
                                            </button>
                                        </form>
                                    @else
                                        @can('isAdmin')
                                        <a href="{{ route('products.edit', $product->id) }}" title="Edit" class="flex h-9 w-9 items-center justify-center rounded-lg border border-blue-200 text-blue-600 hover:bg-blue-50">✎</a>

                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                            @csrf
                                            @method('DELETE')
                                            <button title="Delete" type="submit" class="flex h-9 w-9 items-center justify-center rounded-lg border border-red-200 text-red-600 hover:bg-red-50">
                                                🗑
                                            </button>
                                        </form>
                                        @endcan
                                    @endif
                                </div>
                            </td>
                            
                            <td>  
                            @if($product->status)
                                <span class="inline-flex rounded-full bg-green-100 px-3 py-3 text-xs font-semibold text-green-700">Active</span>
                            @else
                                <span class="inline-flex rounded-full bg-red-100 px-3 py-3 text-xs font-semibold text-red-700">Inactive</span>
                            @endif
                            </td>

                            <td class="px-6 py-4 text-slate-500">
                                {{ $product->id }}
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    @if(!empty($product->images->first()))
                                        <img src="{{ asset('storage/' . $product->images->first()->name) }}" alt="{{ $product->name }}" class="h-12 w-12 rounded-lg object-cover">

                                    @else
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="h-12 w-12 rounded-lg object-cover">
                                    @endif
                                    <div>
                                        <p class="font-semibold text-slate-800">{{ $product->name }}</p>
                                        <p class="text-xs text-slate-400">{{ $product->slug }}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ $product->users->name ?? 'N/A' }}
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ $product->category->name ?? 'N/A' }}
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ $product->brand->name ?? 'N/A' }}
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                            @if($product->colors && $product->colors->count())
                                @foreach($product->colors as $color)
                                    {{ $color->name }}
                                @endforeach
                            @else
                                N/A
                            @endif
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                            @if($product->sizes && $product->sizes->count())
                                @foreach($product->sizes as $size)
                                    {{ $size->name }} - ₹{{ $size->pivot->price }}
                                @endforeach
                            @else
                                N/A
                            @endif
                            </td>

                             <td class="px-6 py-4 text-slate-600">
                            @if($product->tags && $product->tags->count())
                                @foreach($product->tags as $tag)
                                    {{ $tag->name }}
                                @endforeach
                            @else
                                N/A
                            @endif
                            </td>

                            <td class="px-6 py-4">

                                @if($product->sale_price)

                                    <div class="font-semibold text-slate-800">
                                        ₹{{ number_format($product->sale_price, 2) }}
                                    </div>

                                    <div class="text-xs text-slate-400 line-through">
                                        ₹{{ number_format($product->price, 2) }}
                                    </div>

                                @else

                                    <span class="font-semibold text-slate-800">
                                        ₹{{ number_format($product->price, 2) }}
                                    </span>

                                @endif

                            </td>


                            {{-- Stock --}}
                            <td class="px-6 py-4">

                                @if($product->stock > 0)

                                    <span class="font-medium text-slate-700">
                                        {{ $product->stock }}
                                    </span>

                                @else

                                    <span class="font-semibold text-red-600">
                                        Out of Stock
                                    </span>

                                @endif

                            </td>
                        </tr>
                    @empty

                        <tr>
                            <td colspan="8" class="px-6 py-12 text-center">

                                <p class="font-medium text-slate-600">
                                    No products found
                                </p>

                                <p class="mt-1 text-xs text-slate-400">
                                    Add your first product.
                                </p>
                            </td>
                        </tr>
                    @endforelse

                    </x-admin.view-table>
                    <x-admin.view-pagination :arr="['arrpagination'=>$products]"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection