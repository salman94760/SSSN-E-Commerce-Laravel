@extends('layouts.admin.admin')

@section('title', 'Product Details')

@section('breadcrumb', 'Products / ' . $product->name)

@section('content')

<div class="mx-auto max-w-5xl">

    {{-- Header --}}
    <div class="mb-6 flex items-center justify-between">

        <div>
            <h1 class="text-2xl font-bold text-slate-800">
                Product Details
            </h1>

            <p class="mt-1 text-sm text-slate-500">
                View product information
            </p>
        </div>

        <div class="flex gap-2">

            <a
                href="{{ route('products.edit', $product->id) }}"
                class="rounded-lg bg-slate-800 px-4 py-2.5 text-sm font-semibold text-white hover:bg-slate-700"
            >
                Edit
            </a>

            <a
                href="{{ route('products.index') }}"
                class="rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm font-medium text-slate-600 hover:bg-slate-50"
            >
                Back
            </a>

        </div>

    </div>


    {{-- Product Card --}}
    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

        <div class="grid grid-cols-1 md:grid-cols-3">


            {{-- Image --}}
            <div class="flex items-center justify-center border-b border-slate-200 bg-slate-50 p-8 md:border-b-0 md:border-r">

                @if($product->image)

                    <img
                        src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->name }}"
                        class="h-72 w-72 rounded-xl object-cover"
                    >

                @else

                    <div class="flex h-72 w-72 items-center justify-center rounded-xl bg-slate-200 text-sm text-slate-400">
                        No Image
                    </div>

                @endif

            </div>


            {{-- Details --}}
            <div class="p-8 md:col-span-2">

                <h2 class="text-2xl font-bold text-slate-800">
                    {{ $product->name }}
                </h2>

                <p class="mt-1 text-sm text-slate-400">
                    {{ $product->slug }}
                </p>


                <div class="mt-6 grid grid-cols-1 gap-5 sm:grid-cols-2">


                    {{-- Category --}}
                    <div>

                        <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                            Category
                        </p>

                        <p class="mt-1 font-medium text-slate-800">
                            {{ $product->category->name ?? 'N/A' }}
                        </p>

                    </div>


                    {{-- Brand --}}
                    <div>

                        <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                            Brand
                        </p>

                        <p class="mt-1 font-medium text-slate-800">
                            {{ $product->brand->name ?? 'N/A' }}
                        </p>

                    </div>


                    {{-- Price --}}
                    <div>

                        <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                            Price
                        </p>

                        <p class="mt-1 font-semibold text-slate-800">
                            ₹{{ number_format($product->price, 2) }}
                        </p>

                    </div>


                    {{-- Sale Price --}}
                    <div>

                        <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                            Sale Price
                        </p>

                        <p class="mt-1 font-semibold text-green-600">

                            @if($product->sale_price)
                                ₹{{ number_format($product->sale_price, 2) }}
                            @else
                                —
                            @endif

                        </p>

                    </div>


                    {{-- Stock --}}
                    <div>

                        <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                            Stock
                        </p>

                        <p class="mt-1 font-semibold text-slate-800">
                            {{ $product->stock }}
                        </p>

                    </div>


                    {{-- Status --}}
                    <div>

                        <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                            Status
                        </p>

                        <div class="mt-1">

                            @if($product->status)

                                <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                    Active
                                </span>

                            @else

                                <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
                                    Inactive
                                </span>

                            @endif

                        </div>

                    </div>

                </div>


                {{-- Description --}}
                <div class="mt-7 border-t border-slate-200 pt-6">

                    <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                        Description
                    </p>

                    <p class="mt-2 text-sm leading-6 text-slate-600">
                        {{ $product->description ?: 'No description available.' }}
                    </p>

                </div>

            </div>

        </div>


        {{-- Footer --}}
        <div class="flex justify-end border-t border-slate-200 bg-slate-50 px-6 py-4">

            <form
                action="{{ route('products.destroy', $product->id) }}"
                method="POST"
                onsubmit="return confirm('Are you sure you want to delete this product?')"
            >

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="rounded-lg border border-red-200 bg-white px-4 py-2.5 text-sm font-medium text-red-600 hover:bg-red-50"
                >
                    Delete Product
                </button>

            </form>

        </div>

    </div>

</div>

@endsection