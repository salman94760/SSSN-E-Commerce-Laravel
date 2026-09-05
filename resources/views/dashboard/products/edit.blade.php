@extends('layouts.admin.admin')

@section('title', 'Edit Product')

@section('breadcrumb', 'Products / Edit Product')

@section('content')

<div class="mx-auto max-w-5xl">

    {{-- Header --}}
    <div class="mb-6">

        <h1 class="text-2xl font-bold text-slate-800">
            Edit Product
        </h1>

        <p class="mt-1 text-sm text-slate-500">
            Edit your clothing product
        </p>

    </div>


    <div class="rounded-xl border border-slate-200 bg-white shadow-sm">

        <form
            action="{{ route('products.update', $product->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')


            <div class="p-6">

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">


                    {{-- Product Name --}}
                    <div class="md:col-span-2">

                        <label
                            for="name"
                            class="mb-2 block text-sm font-medium text-slate-700"
                        >
                            Product Name
                            <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="text"
                            name="name"
                            id="name"
                            value="{{ old('name', $product->name) }}"
                            placeholder="e.g. Premium Cotton T-Shirt"
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm outline-none focus:border-slate-800 focus:ring-2 focus:ring-slate-200"
                        >

                        @error('name')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Slug --}}
                    <div>

                        <label
                            for="slug"
                            class="mb-2 block text-sm font-medium text-slate-700"
                        >
                            Slug
                            <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="text"
                            name="slug"
                            id="slug"
                            value="{{ old('slug', $product->slug) }}"
                            placeholder="premium-cotton-t-shirt"
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm outline-none focus:border-slate-800 focus:ring-2 focus:ring-slate-200"
                        >

                        @error('slug')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Category --}}
                    <div>

                        <label
                            for="category_id"
                            class="mb-2 block text-sm font-medium text-slate-700"
                        >
                            Category
                            <span class="text-red-500">*</span>
                        </label>

                        <select
                            name="category_id"
                            id="category_id"
                            class="h-[45px] w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm outline-none focus:border-slate-800"
                        >

                            <option value="">
                                Select Category
                            </option>

                            @foreach($categories as $category)

                                <option
                                    value="{{ $category->id }}"
                                    {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}
                                >
                                    {{ $category->name }}
                                </option>

                            @endforeach

                        </select>

                        @error('category_id')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Brand --}}
                    <div>

                        <label
                            for="brand_id"
                            class="mb-2 block text-sm font-medium text-slate-700"
                        >
                            Brand
                            <span class="text-red-500">*</span>
                        </label>

                        <select
                            name="brand_id"
                            id="brand_id"
                            class="h-[45px] w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm outline-none focus:border-slate-800"
                        >

                            <option value="">
                                Select Brand
                            </option>

                            @foreach($brands as $brand)

                                <option
                                    value="{{ $brand->id }}"
                                    {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}
                                >
                                    {{ $brand->name }}
                                </option>

                            @endforeach

                        </select>

                        @error('brand_id')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Color --}}
                    <div>

                        <label
                            for="color_ids"
                            class="mb-2 block text-sm font-medium text-slate-700"
                        >
                            Color
                            <span class="text-red-500">*</span>
                        </label>

                        <select
                            name="color_ids[]"
                            id="color_ids"
                            class="select2 w-full"
                            multiple
                        >

                            @foreach($colors as $color)

                                <option
                                    value="{{ $color->id }}"
                                    {{ $product->colors->contains($color->id) ? 'selected' : '' }}
                                >
                                    {{ $color->name }}
                                </option>

                            @endforeach

                        </select>

                        @error('color_ids')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Sizes --}}
                    <div>

                        <label
                            for="size_ids"
                            class="mb-2 block text-sm font-medium text-slate-700"
                        >
                            Sizes
                            <span class="text-red-500">*</span>
                        </label>

                        <select
                            name="size_ids[]"
                            id="size_ids"
                            class="select2 w-full"
                            multiple
                        >

                            @foreach($sizes as $size)

                                <option
                                    value="{{ $size->id }}"
                                    {{ $product->sizes->contains($size->id) ? 'selected' : '' }}
                                >
                                    {{ $size->name }}
                                </option>

                            @endforeach

                        </select>

                        @error('size_ids')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- ================================= --}}
                    {{-- SIZE WISE PRICE --}}
                    {{-- ================================= --}}

                    <div class="md:col-span-2">

                        <div class="mb-3">

                            <label class="block text-sm font-medium text-slate-700">
                                Size Wise Price
                            </label>

                            <p class="mt-1 text-xs text-slate-500">
                                Select sizes above and enter price for each size.
                            </p>

                        </div>


                        <div
                            id="size-price-container"
                            class="space-y-3"
                        >

                            @foreach($product->sizes as $size)

                                <div
                                    class="size-price-row flex items-center gap-4 rounded-lg border border-slate-200 bg-slate-50 p-3"
                                    data-size-id="{{ $size->id }}"
                                >

                                    {{-- Size Name --}}
                                    <div class="w-24">

                                        <span class="font-semibold text-slate-700">
                                            {{ $size->name }}
                                        </span>

                                    </div>


                                    {{-- Hidden Size ID --}}
                                    <input
                                        type="hidden"
                                        name="sizes[{{ $size->id }}][size_id]"
                                        value="{{ $size->id }}"
                                    >


                                    {{-- Price --}}
                                    <div class="flex-1">

                                        <input
                                            type="number"
                                            name="sizes[{{ $size->id }}][price]"
                                            value="{{ old('sizes.' . $size->id . '.price', $size->pivot->price) }}"
                                            min="0"
                                            step="0.01"
                                            placeholder="Enter price"
                                            class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm outline-none focus:border-slate-800 focus:ring-2 focus:ring-slate-200"
                                        >

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>


                    {{-- Product Default Price --}}
                    <div>

                        <label
                            for="price"
                            class="mb-2 block text-sm font-medium text-slate-700"
                        >
                            Default Price
                            <span class="text-slate-400">
                                (Optional)
                            </span>
                        </label>

                        <input
                            type="number"
                            name="price"
                            id="price"
                            value="{{ old('price', $product->price) }}"
                            min="0"
                            step="0.01"
                            placeholder="1499.00"
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm outline-none focus:border-slate-800"
                        >

                        @error('price')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Sale Price --}}
                    <div>

                        <label
                            for="sale_price"
                            class="mb-2 block text-sm font-medium text-slate-700"
                        >
                            Sale Price
                            <span class="text-slate-400">
                                (Optional)
                            </span>
                        </label>

                        <input
                            type="number"
                            name="sale_price"
                            id="sale_price"
                            value="{{ old('sale_price', $product->sale_price) }}"
                            min="0"
                            step="0.01"
                            placeholder="999.00"
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm outline-none focus:border-slate-800"
                        >

                        @error('sale_price')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Stock --}}
                    <div>

                        <label
                            for="stock"
                            class="mb-2 block text-sm font-medium text-slate-700"
                        >
                            Stock
                            <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="number"
                            name="stock"
                            id="stock"
                            value="{{ old('stock', $product->stock) }}"
                            min="0"
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm outline-none focus:border-slate-800"
                        >

                        @error('stock')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Status --}}
                    <div>

                        <label
                            for="status"
                            class="mb-2 block text-sm font-medium text-slate-700"
                        >
                            Status
                        </label>

                        <select
                            name="status"
                            id="status"
                            class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm outline-none focus:border-slate-800"
                        >

                            <option
                                value="1"
                                {{ $product->status == 1 ? 'selected' : '' }}
                            >
                                Active
                            </option>

                            <option
                                value="0"
                                {{ $product->status == 0 ? 'selected' : '' }}
                            >
                                Inactive
                            </option>

                        </select>

                    </div>


                    {{-- Tag --}}
                    <div>

                        <label
                            for="tag_id"
                            class="mb-2 block text-sm font-medium text-slate-700"
                        >
                            Tag
                        </label>

                        <select
                          name="tag_ids[]"
                            id="tag_ids"
                    
                            multiple
                           
                            class="select2 w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm outline-none focus:border-slate-800"
                        >

                            <option value="">
                                Select Tag
                            </option>

                            @foreach($tags as $tag)

                                <option
                                    value="{{ $tag->id }}"
                                    {{ old('tag_id', $product->tag_id) == $tag->id ? 'selected' : '' }}
                                >
                                    {{ $tag->name }}
                                </option>

                            @endforeach

                        </select>

                        @error('tag_id')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Image --}}
                    <div class="md:col-span-2">

                        <label
                            for="image"
                            class="mb-2 block text-sm font-medium text-slate-700"
                        >
                            Product Image
                            <span class="text-slate-400">
                                (Optional)
                            </span>
                        </label>

                        <input
                            type="file"
                            name="images[]"
                            multiple
                            id="image"
                            accept="image/jpeg,image/png,image/webp"
                            class="block w-full rounded-lg border border-slate-300 bg-white text-sm text-slate-500 file:mr-4 file:border-0 file:bg-slate-800 file:px-4 file:py-3 file:text-sm file:font-medium file:text-white"
                        >

                        @error('image')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Description --}}
                    <div class="md:col-span-2">

                        <label
                            for="description"
                            class="mb-2 block text-sm font-medium text-slate-700"
                        >
                            Description
                        </label>

                        <textarea
                            name="description"
                            id="description"
                            rows="5"
                            placeholder="Enter product description..."
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm outline-none focus:border-slate-800 focus:ring-2 focus:ring-slate-200"
                        >{{ old('description', $product->description) }}</textarea>

                        @error('description')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                </div>

            </div>


            {{-- Footer --}}
            <div class="flex justify-end gap-3 border-t border-slate-200 bg-slate-50 px-6 py-4">

                <a
                    href="{{ route('products.index') }}"
                    class="rounded-lg border border-slate-300 bg-white px-5 py-2.5 text-sm font-medium text-slate-600 hover:bg-slate-100"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="rounded-lg bg-slate-800 px-5 py-2.5 text-sm font-semibold text-white hover:bg-slate-700"
                >
                    Update Product
                </button>

            </div>

        </form>

    </div>

</div>


{{-- Select2 --}}
<link
    href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
    rel="stylesheet"
/>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>

$(document).ready(function () {

    /*
    |--------------------------------------------------------------------------
    | Select2
    |--------------------------------------------------------------------------
    */

    $('.select2').select2({
        width: '100%'
    });


    /*
    |--------------------------------------------------------------------------
    | Existing Size Prices
    |--------------------------------------------------------------------------
    */

    const existingPrices = @json(
        $product->sizes->mapWithKeys(function ($size) {
            return [
                $size->id => $size->pivot->price
            ];
        })
    );


    /*
    |--------------------------------------------------------------------------
    | Size Change
    |--------------------------------------------------------------------------
    */

    $('#size_ids').on('change', function () {

        let selectedSizes = $(this).val() || [];

        let container = $('#size-price-container');

        container.empty();


        selectedSizes.forEach(function (sizeId) {

            let size = $('#size_ids option[value="' + sizeId + '"]');

            let sizeName = size.text().trim();

            let price = existingPrices[sizeId] ?? '';


            let html = `

                <div
                    class="size-price-row flex items-center gap-4 rounded-lg border border-slate-200 bg-slate-50 p-3"
                    data-size-id="${sizeId}"
                >

                    <div class="w-24">

                        <span class="font-semibold text-slate-700">
                            ${sizeName}
                        </span>

                    </div>


                    <input
                        type="hidden"
                        name="sizes[${sizeId}][size_id]"
                        value="${sizeId}"
                    >


                    <div class="flex-1">

                        <input
                            type="number"
                            name="sizes[${sizeId}][price]"
                            value="${price}"
                            min="0"
                            step="0.01"
                            placeholder="Enter price"
                            class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm outline-none focus:border-slate-800 focus:ring-2 focus:ring-slate-200"
                        >

                    </div>

                </div>

            `;

            container.append(html);

        });

    });

});

</script>

@endsection