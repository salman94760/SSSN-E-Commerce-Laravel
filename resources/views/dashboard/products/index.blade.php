@extends('layouts.admin.admin')

@section('title', 'Products')

@section('breadcrumb', 'Products')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex items-center justify-between">

        <div>
            <h1 class="text-2xl font-bold text-slate-800">
                Products
            </h1>

            <p class="mt-1 text-sm text-slate-500">
                Manage your clothing products
            </p>
        </div>

        <a
            href="{{ route('products.create') }}"
            class="rounded-lg bg-slate-800 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-slate-700"
        >
            + Add Product
        </a>

    </div>


    {{-- Success --}}
    @if(session('success'))

        <div class="flex items-center justify-between rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">

            <span>{{ session('success') }}</span>

            <button
                type="button"
                onclick="this.parentElement.remove()"
                class="text-lg font-bold"
            >
                ×
            </button>

        </div>

    @endif


    {{-- Filter --}}
    <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">

        <form
            action="{{ route('products.index') }}"
            method="GET"
            class="flex flex-col gap-3 lg:flex-row lg:items-end"
        >

            {{-- Search --}}
            <div class="flex-1">

                <label class="mb-1.5 block text-xs font-medium text-slate-600">
                    Search
                </label>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search product..."
                    class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm outline-none focus:border-slate-800 focus:ring-2 focus:ring-slate-200"
                >

            </div>


            {{-- Category --}}
            <div class="w-full lg:w-48">

                <label class="mb-1.5 block text-xs font-medium text-slate-600">
                    Category
                </label>

                <select
                    name="category_id"
                    class="w-full rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm outline-none focus:border-slate-800"
                >

                    <option value="">
                        All Categories
                    </option>

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            {{ request('category_id') == $category->id ? 'selected' : '' }}
                        >
                            {{ $category->name }}
                        </option>

                    @endforeach

                </select>

            </div>


            {{-- Brand --}}
            <div class="w-full lg:w-48">

                <label class="mb-1.5 block text-xs font-medium text-slate-600">
                    Brand
                </label>

                <select
                    name="brand_id"
                    class="w-full rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm outline-none focus:border-slate-800"
                >

                    <option value="">
                        All Brands
                    </option>

                    @foreach($brands as $brand)

                        <option
                            value="{{ $brand->id }}"
                            {{ request('brand_id') == $brand->id ? 'selected' : '' }}
                        >
                            {{ $brand->name }}
                        </option>

                    @endforeach

                </select>

            </div>


            {{-- Status --}}
            <div class="w-full lg:w-36">

                <label class="mb-1.5 block text-xs font-medium text-slate-600">
                    Status
                </label>

                <select
                    name="status"
                    class="w-full rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm outline-none focus:border-slate-800"
                >

                    <option value="">
                        All
                    </option>

                    <option
                        value="1"
                        {{ request('status') === '1' ? 'selected' : '' }}
                    >
                        Active
                    </option>

                    <option
                        value="0"
                        {{ request('status') === '0' ? 'selected' : '' }}
                    >
                        Inactive
                    </option>

                </select>

            </div>


            <button
                type="submit"
                class="rounded-lg bg-slate-800 px-5 py-2.5 text-sm font-semibold text-white hover:bg-slate-700"
            >
                Filter
            </button>


            <a
                href="{{ route('products.index') }}"
                class="rounded-lg border border-slate-300 px-5 py-2.5 text-center text-sm font-medium text-slate-600 hover:bg-slate-50"
            >
                Reset
            </a>

        </form>

    </div>


    {{-- Table --}}
    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

        <div class="overflow-x-auto">

            <table class="w-full text-left text-sm">

                <thead class="border-b border-slate-200 bg-slate-50">

                    <tr>

                        <th class="px-6 py-4 font-semibold text-slate-600">
                            #
                        </th>

                        <th class="px-6 py-4 font-semibold text-slate-600">
                            Product
                        </th>

                       

                        <th class="px-6 py-4 font-semibold text-slate-600">Product Added By</th>

                         <th class="px-6 py-4 font-semibold text-slate-600">
                            Category
                        </th>

                        <th class="px-6 py-4 font-semibold text-slate-600">
                            Brand
                        </th>

                        <th class="px-6 py-4 font-semibold text-slate-600">
                            Price
                        </th>

                        <th class="px-6 py-4 font-semibold text-slate-600">
                            Stock
                        </th>

                        <th class="px-6 py-4 font-semibold text-slate-600">
                            Status
                        </th>

                        <th class="px-6 py-4 text-right font-semibold text-slate-600">
                            Action
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-slate-100">

                    @forelse($products as $product)

                        <tr class="transition hover:bg-slate-50">

                            <td class="px-6 py-4 text-slate-500">
                                {{ $product->id }}
                            </td>


                            {{-- Product --}}
                            <td class="px-6 py-4">

                                <div class="flex items-center gap-3">

                                    @if($product->image)

                                        <img
                                            src="{{ asset('storage/' . $product->image) }}"
                                            alt="{{ $product->name }}"
                                            class="h-12 w-12 rounded-lg object-cover"
                                        >

                                    @else

                                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-slate-100 text-xs text-slate-400">
                                            N/A
                                        </div>

                                    @endif


                                    <div>

                                        <p class="font-semibold text-slate-800">
                                            {{ $product->name }}
                                        </p>

                                        <p class="text-xs text-slate-400">
                                            {{ $product->slug }}
                                        </p>

                                    </div>

                                </div>

                            </td>

                             <td class="px-6 py-4 text-slate-600">
                                {{ $product->category->name ?? 'N/A' }}
                            </td>

                            {{-- Category --}}
                            <td class="px-6 py-4 text-slate-600">
                                {{ $product->category->name ?? 'N/A' }}
                            </td>


                            {{-- Brand --}}
                            <td class="px-6 py-4 text-slate-600">
                                {{ $product->brand->name ?? 'N/A' }}
                            </td>


                            {{-- Price --}}
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


                            {{-- Status --}}
                            <td class="px-6 py-4">

                                @if($product->status)

                                    <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                        Active
                                    </span>

                                @else

                                    <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
                                        Inactive
                                    </span>

                                @endif

                            </td>


                            {{-- Actions --}}
                            <td class="px-6 py-4">

                                <div class="flex justify-end gap-2">

                                    <a
                                        href="{{ route('products.show', $product->id) }}"
                                        class="rounded-lg border border-slate-200 px-3 py-2 text-xs font-medium text-slate-600 hover:bg-slate-100"
                                    >
                                        View
                                    </a>

                                    @if($userid === $product->user_id)
                                    <a
                                        href="{{ route('products.edit', $product->id) }}"
                                        class="rounded-lg border border-slate-200 px-3 py-2 text-xs font-medium text-slate-600 hover:bg-slate-100"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('products.destroy', $product->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this product?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="rounded-lg border border-red-200 px-3 py-2 text-xs font-medium text-red-600 hover:bg-red-50"
                                        >
                                            Delete
                                        </button>

                                    </form>
                                    @else
                                    @can('isAdmin')
                                    <a
                                        href="{{ route('products.edit', $product->id) }}"
                                        class="rounded-lg border border-slate-200 px-3 py-2 text-xs font-medium text-slate-600 hover:bg-slate-100"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('products.destroy', $product->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this product?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="rounded-lg border border-red-200 px-3 py-2 text-xs font-medium text-red-600 hover:bg-red-50"
                                        >
                                            Delete
                                        </button>

                                    </form>
                                    @endcan
                                    @endif

                                    

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="8"
                                class="px-6 py-12 text-center"
                            >

                                <p class="font-medium text-slate-600">
                                    No products found
                                </p>

                                <p class="mt-1 text-xs text-slate-400">
                                    Add your first product.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- Pagination --}}
        @if($products->hasPages())

            <div class="flex flex-col gap-4 border-t border-slate-200 px-6 py-4 sm:flex-row sm:items-center sm:justify-between">

                <p class="text-sm text-slate-500">
                    Showing
                    <span class="font-semibold text-slate-700">
                        {{ $products->firstItem() }}
                    </span>
                    -
                    <span class="font-semibold text-slate-700">
                        {{ $products->lastItem() }}
                    </span>
                    of
                    <span class="font-semibold text-slate-700">
                        {{ $products->total() }}
                    </span>
                    products
                </p>

                {{ $products->withQueryString()->links() }}

            </div>

        @endif

    </div>

</div>

@endsection