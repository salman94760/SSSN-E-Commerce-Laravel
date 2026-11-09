
@extends('layouts.admin.page')

@section('title', 'Edit Product')

@section('adminPage')

@php
    $cardClass = 'overflow-hidden rounded-[26px] border border-white/80 bg-white/65 shadow-[0_15px_45px_rgba(100,75,45,0.06)] backdrop-blur-2xl';

    $labelClass = 'mb-2 block text-xs font-bold uppercase tracking-wide text-[#796a59]';

    $inputClass = 'w-full rounded-xl border border-[#e8dccb] bg-white/80 px-4 py-3 text-sm text-[#5d4936] outline-none transition duration-200 placeholder:text-[#b0a292] focus:border-[#a58a6d] focus:ring-2 focus:ring-[#e7d5bb]/50';

    $selectedColors = old('color_ids', $product->colors->pluck('id')->all());
    $selectedSizes = old('size_ids', $product->sizes->pluck('id')->all());
    $selectedTags = old('tag_ids', $product->tags->pluck('id')->all());

    $existingSizeData = $product->sizes->mapWithKeys(function ($size) {
        return [
            $size->id => [
                'price' => $size->pivot->price,
                'stock' => $size->pivot->stock,
            ]
        ];
    })->all();

    $sizeData = old('sizes', $existingSizeData);
@endphp

<div class="min-h-screen bg-[#f8f5ef] p-4 sm:p-6 lg:p-8">

    <div class="mx-auto max-w-7xl space-y-6">

    

        <form
            action="{{ route('products.update', $product->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')

            <div class="{{ $cardClass }}">

                {{-- Section Header --}}
                <div class="border-b border-[#e8dccb]/60 bg-[#eee3d3]/30 px-6 py-5">

                    <h2 class="text-lg font-bold text-[#5d4936]">
                        Product Information
                    </h2>

                    <p class="mt-1 text-xs text-[#a58a6d]">
                        Edit product details, pricing, stock and images.
                    </p>

                </div>

                <div class="space-y-8 p-5 sm:p-8">

                    {{-- Basic Information --}}
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                        {{-- Product Name --}}
                        <div class="md:col-span-2">

                            <label for="name" class="{{ $labelClass }}">
                                Product Name <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name', $product->name) }}"
                                placeholder="e.g. Premium Cotton T-Shirt"
                                class="{{ $inputClass }}"
                            >

                            @error('name')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror

                        </div>

                        {{-- Slug --}}
                        <div>

                            <label for="slug" class="{{ $labelClass }}">
                                Slug <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="text"
                                name="slug"
                                id="slug"
                                value="{{ old('slug', $product->slug) }}"
                                placeholder="premium-cotton-t-shirt"
                                class="{{ $inputClass }}"
                            >

                            @error('slug')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror

                        </div>

                        {{-- SKU --}}
                        <div>

                            <label for="sku" class="{{ $labelClass }}">
                                SKU <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="text"
                                name="sku"
                                id="sku"
                                value="{{ old('sku', $product->sku) }}"
                                placeholder="premium-cotton-t-shirt-001"
                                class="{{ $inputClass }}"
                            >

                            @error('sku')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror

                        </div>

                        {{-- Category --}}
                        <div>

                            <label for="category_id" class="{{ $labelClass }}">
                                Category <span class="text-red-500">*</span>
                            </label>

                            <select
                                name="category_id"
                                id="category_id"
                                class="{{ $inputClass }}"
                            >
                                <option value="">Select Category</option>

                                @foreach($categories as $category)
                                    <option
                                        value="{{ $category->id }}"
                                        @selected(old('category_id', $product->category_id) == $category->id)
                                    >
                                        {{ $category->name }}
                                    </option>
                                @endforeach

                            </select>

                            @error('category_id')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror

                        </div>

                        {{-- Brand --}}
                        <div>

                            <label for="brand_id" class="{{ $labelClass }}">
                                Brand <span class="text-red-500">*</span>
                            </label>

                            <select
                                name="brand_id"
                                id="brand_id"
                                class="{{ $inputClass }}"
                            >
                                <option value="">Select Brand</option>

                                @foreach($brands as $brand)
                                    <option
                                        value="{{ $brand->id }}"
                                        @selected(old('brand_id', $product->brand_id) == $brand->id)
                                    >
                                        {{ $brand->name }}
                                    </option>
                                @endforeach

                            </select>

                            @error('brand_id')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror

                        </div>

                        {{-- Colors --}}
                        <div>

                            <label for="color_ids" class="{{ $labelClass }}">
                                Colors <span class="text-red-500">*</span>
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
                                        @selected(in_array($color->id, $selectedColors))
                                    >
                                        {{ $color->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('color_ids')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror

                            @error('color_ids.*')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror

                        </div>

                        {{-- Sizes --}}
                        <div>

                            <label for="size_ids" class="{{ $labelClass }}">
                                Sizes <span class="text-red-500">*</span>
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
                                        @selected(in_array($size->id, $selectedSizes))
                                    >
                                        {{ $size->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('size_ids')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror

                            @error('size_ids.*')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror

                        </div>

                    </div>

                    {{-- Size Wise Price & Stock --}}
                    <div class="border-t border-[#e8dccb]/70 pt-7">

                        <div class="mb-5">

                            <h3 class="text-base font-bold text-[#5d4936]">
                                Size Wise Price & Stock
                            </h3>

                            <p class="mt-1 text-xs text-[#a58a6d]">
                                Select sizes above and enter price and stock for each size.
                            </p>

                        </div>

                        <div id="size-price-container" class="space-y-3">

                            @foreach($sizes as $size)

                                @if(in_array($size->id, $selectedSizes))

                                    <div
                                        class="size-price-row rounded-2xl border border-[#e8dccb] bg-[#eee3d3]/30 p-4"
                                        data-size-id="{{ $size->id }}"
                                    >

                                        <div class="grid grid-cols-1 items-end gap-4 sm:grid-cols-5">

                                            <div class="sm:col-span-1">

                                                <p class="text-xs font-bold uppercase tracking-wide text-[#938778]">
                                                    Size
                                                </p>

                                                <p class="mt-2 text-sm font-bold text-[#6b5540]">
                                                    {{ $size->name }}
                                                </p>

                                                <input
                                                    type="hidden"
                                                    name="sizes[{{ $size->id }}][size_id]"
                                                    value="{{ $size->id }}"
                                                >

                                            </div>

                                            {{-- Price --}}
                                            <div class="sm:col-span-2">

                                                <label class="{{ $labelClass }}">
                                                    Price (₹)
                                                </label>

                                                <input
                                                    type="number"
                                                    name="sizes[{{ $size->id }}][price]"
                                                    value="{{ $sizeData[$size->id]['price'] ?? '' }}"
                                                    min="0"
                                                    step="0.01"
                                                    placeholder="Enter price"
                                                    class="{{ $inputClass }}"
                                                >

                                            </div>

                                            {{-- Stock --}}
                                            <div class="sm:col-span-2">

                                                <label class="{{ $labelClass }}">
                                                    Stock
                                                </label>

                                                <input
                                                    type="number"
                                                    name="sizes[{{ $size->id }}][stock]"
                                                    value="{{ $sizeData[$size->id]['stock'] ?? '' }}"
                                                    min="0"
                                                    step="1"
                                                    placeholder="Enter stock"
                                                    class="{{ $inputClass }}"
                                                >

                                            </div>

                                        </div>

                                        @error('sizes.' . $size->id . '.price')
                                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                                        @enderror

                                        @error('sizes.' . $size->id . '.stock')
                                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                                        @enderror

                                    </div>

                                @endif

                            @endforeach

                        </div>

                        <p
                            id="size-empty-message"
                            class="mt-3 hidden rounded-xl border border-dashed border-[#e8dccb] bg-white/50 p-5 text-center text-xs text-[#938778]"
                        >
                            Select at least one size to configure price and stock.
                        </p>

                    </div>

                    {{-- Pricing & Inventory --}}
                    <div class="border-t border-[#e8dccb]/70 pt-7">

                        <h3 class="mb-5 text-base font-bold text-[#5d4936]">
                            Pricing & Inventory
                        </h3>

                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                            {{-- Default Price --}}
                            <div>

                                <label for="price" class="{{ $labelClass }}">
                                    Default Price (₹)
                                    <span class="font-normal text-[#a58a6d]">(Optional)</span>
                                </label>

                                <input
                                    type="number"
                                    name="price"
                                    id="price"
                                    value="{{ old('price', $product->price) }}"
                                    min="0"
                                    step="0.01"
                                    placeholder="1499.00"
                                    class="{{ $inputClass }}"
                                >

                                @error('price')
                                    <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                                @enderror

                            </div>

                            {{-- Sale Price --}}
                            <div>

                                <label for="sale_price" class="{{ $labelClass }}">
                                    Sale Price (₹)
                                    <span class="font-normal text-[#a58a6d]">(Optional)</span>
                                </label>

                                <input
                                    type="number"
                                    name="sale_price"
                                    id="sale_price"
                                    value="{{ old('sale_price', $product->sale_price) }}"
                                    min="0"
                                    step="0.01"
                                    placeholder="999.00"
                                    class="{{ $inputClass }}"
                                >

                                @error('sale_price')
                                    <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                                @enderror

                            </div>

                            {{-- Stock --}}
                            <div>

                                <label for="stock" class="{{ $labelClass }}">
                                    Total Stock <span class="text-red-500">*</span>
                                </label>

                                <input
                                    type="number"
                                    name="stock"
                                    id="stock"
                                    value="{{ old('stock', $product->stock) }}"
                                    min="0"
                                    step="1"
                                    class="{{ $inputClass }}"
                                >

                                @error('stock')
                                    <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                                @enderror

                            </div>

                            {{-- Status --}}
                            <div>

                                <label for="status" class="{{ $labelClass }}">
                                    Product Status
                                </label>

                                <select
                                    name="status"
                                    id="status"
                                    class="{{ $inputClass }}"
                                >
                                    <option
                                        value="1"
                                        @selected(old('status', $product->status) == 1)
                                    >
                                        Active
                                    </option>

                                    <option
                                        value="0"
                                        @selected(old('status', $product->status) == 0)
                                    >
                                        Inactive
                                    </option>
                                </select>

                                @error('status')
                                    <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>

                    </div>

                    {{-- Tags --}}
                    <div class="border-t border-[#e8dccb]/70 pt-7">

                        <h3 class="mb-5 text-base font-bold text-[#5d4936]">
                            Product Tags
                        </h3>

                        <label for="tag_ids" class="{{ $labelClass }}">
                            Select Tags
                        </label>

                        <select
                            name="tag_ids[]"
                            id="tag_ids"
                            class="select2 w-full"
                            multiple
                        >
                            @foreach($tags as $tag)
                                <option
                                    value="{{ $tag->id }}"
                                    @selected(in_array($tag->id, $selectedTags))
                                >
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('tag_ids')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror

                        @error('tag_ids.*')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror

                    </div>

                    {{-- Product Images --}}
                    <div class="border-t border-[#e8dccb]/70 pt-7">

                        <h3 class="mb-5 text-base font-bold text-[#5d4936]">
                            Product Images
                        </h3>

                        {{-- Existing Images --}}
                        @if($product->images->isNotEmpty())

                            <div class="mb-6">

                                <p class="{{ $labelClass }}">
                                    Current Images
                                </p>

                                <div class="grid grid-cols-2 gap-4 sm:grid-cols-4 lg:grid-cols-6">

                                    @foreach($product->images as $image)

                                        <div class="overflow-hidden rounded-2xl border border-[#e8dccb] bg-[#eee3d3]/30 p-2">

                                            <img
                                                src="{{ asset('storage/' . $image->name) }}"
                                                alt="{{ $product->name }}"
                                                loading="lazy"
                                                class="aspect-square w-full rounded-xl object-cover"
                                            >

                                        </div>

                                    @endforeach

                                </div>

                            </div>

                        @elseif($product->image)

                            <div class="mb-6">

                                <p class="{{ $labelClass }}">
                                    Current Image
                                </p>

                                <img
                                    src="{{ asset('storage/' . $product->image) }}"
                                    alt="{{ $product->name }}"
                                    class="h-28 w-28 rounded-2xl border border-[#e8dccb] object-cover"
                                >

                            </div>

                        @endif

                        {{-- Upload New Images --}}
                        <div>

                            <label for="images" class="{{ $labelClass }}">
                                Upload New Images
                                <span class="font-normal text-[#a58a6d]">(Optional)</span>
                            </label>

                            <input
                                type="file"
                                name="images[]"
                                id="images"
                                multiple
                                accept="image/jpeg,image/png,image/webp"
                                class="block w-full rounded-xl border border-[#e8dccb] bg-white/80 text-sm text-[#796a59] file:mr-4 file:border-0 file:bg-[#6b5540] file:px-5 file:py-3 file:text-sm file:font-semibold file:text-white hover:file:bg-[#4e3c2b]"
                            >

                            <p class="mt-2 text-xs text-[#a58a6d]">
                                Supported formats: JPG, PNG and WebP.
                            </p>

                            @error('images')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror

                            @error('images.*')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror

                        </div>

                        {{-- New Image Preview --}}
                        <div
                            id="image-preview-container"
                            class="mt-4 hidden grid-cols-2 gap-4 sm:grid-cols-4 lg:grid-cols-6"
                        ></div>

                    </div>

                    {{-- Description --}}
                    <div class="border-t border-[#e8dccb]/70 pt-7">

                        <label for="description" class="{{ $labelClass }}">
                            Product Description
                        </label>

                        <textarea
                            name="description"
                            id="description"
                            rows="5"
                            placeholder="Enter product description..."
                            class="{{ $inputClass }}"
                        >{{ old('description', $product->description) }}</textarea>

                        @error('description')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror

                    </div>

                </div>

                {{-- Footer Actions --}}
                <div class="flex flex-col-reverse gap-3 border-t border-[#e8dccb]/70 bg-[#eee3d3]/25 px-6 py-5 sm:flex-row sm:justify-end">

                    <a
                        href="{{ route('products.index') }}"
                        class="inline-flex items-center justify-center rounded-xl border border-[#e8dccb] bg-white/80 px-6 py-3 text-sm font-semibold text-[#6b5540] transition hover:bg-[#eee3d3]"
                    >
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center rounded-xl bg-[#6b5540] px-6 py-3 text-sm font-semibold text-white transition duration-300 hover:-translate-y-0.5 hover:bg-[#4e3c2b]"
                    >
                        Update Product
                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

{{-- Select2 Styles --}}
<link
    href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
    rel="stylesheet"
>

<style>
    .select2-container {
        width: 100% !important;
    }

    .select2-container--default .select2-selection--multiple {
        min-height: 48px;
        border: 1px solid #e8dccb !important;
        border-radius: 12px !important;
        background: rgba(255,255,255,0.8) !important;
        padding: 6px 8px;
    }

    .select2-container--default.select2-container--focus
    .select2-selection--multiple {
        border-color: #a58a6d !important;
        box-shadow: 0 0 0 3px rgba(231,213,187,0.4);
    }

    .select2-container--default
    .select2-selection--multiple
    .select2-selection__choice {
        background: #eee3d3 !important;
        border: 1px solid #e8dccb !important;
        border-radius: 8px !important;
        color: #6b5540 !important;
        padding: 3px 8px;
    }

    .select2-dropdown {
        border-color: #e8dccb !important;
        border-radius: 10px !important;
        overflow: hidden;
    }

    .select2-container--default
    .select2-results__option--highlighted.select2-results__option--selectable {
        background: #6b5540 !important;
        color: white !important;
    }
</style>

{{-- Scripts --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function () {

    // Initialize Select2
    $('.select2').select2({
        width: '100%',
        placeholder: 'Select options',
        allowClear: false
    });

    // Existing size prices and stock
    const initialSizeData = @json($sizeData);

    const sizeData = {};

    Object.keys(initialSizeData).forEach(function (id) {
        sizeData[String(id)] = {
            price: initialSizeData[id]?.price ?? '',
            stock: initialSizeData[id]?.stock ?? ''
        };
    });

    const container = $('#size-price-container');
    const emptyMessage = $('#size-empty-message');

    const inputClasses =
        'w-full rounded-xl border border-[#e8dccb] bg-white/80 px-4 py-3 text-sm text-[#5d4936] outline-none transition focus:border-[#a58a6d] focus:ring-2 focus:ring-[#e7d5bb]/50';

    // Save current entered values before rebuilding rows
    function saveCurrentSizeValues() {
        container.find('.size-price-row').each(function () {

            const id = String($(this).data('size-id'));

            sizeData[id] = {
                price: $(this).find('input[name$="[price]"]').val(),
                stock: $(this).find('input[name$="[stock]"]').val()
            };

        });
    }

    // Create input element safely
    function createInput(name, value, placeholder, step) {
        return $('<input>', {
            type: 'number',
            name: name,
            min: 0,
            step: step,
            placeholder: placeholder,
            class: inputClasses
        }).val(value ?? '');
    }

    // Rebuild size-wise rows
    function renderSizeRows() {

        saveCurrentSizeValues();

        const selectedSizes = $('#size_ids').val() || [];

        container.empty();

        selectedSizes.forEach(function (sizeId) {

            const id = String(sizeId);

            const sizeName = $('#size_ids option').filter(function () {
                return this.value === id;
            }).text().trim();

            const values = sizeData[id] || {
                price: '',
                stock: ''
            };

            const row = $('<div>', {
                class: 'size-price-row rounded-2xl border border-[#e8dccb] bg-[#eee3d3]/30 p-4'
            }).attr('data-size-id', id);

            const grid = $('<div>', {
                class: 'grid grid-cols-1 items-end gap-4 sm:grid-cols-5'
            });

            const sizeColumn = $('<div>', {
                class: 'sm:col-span-1'
            });

            sizeColumn.append(
                $('<p>', {
                    class: 'text-xs font-bold uppercase tracking-wide text-[#938778]',
                    text: 'Size'
                })
            );

            sizeColumn.append(
                $('<p>', {
                    class: 'mt-2 text-sm font-bold text-[#6b5540]',
                    text: sizeName
                })
            );

            sizeColumn.append(
                $('<input>', {
                    type: 'hidden',
                    name: `sizes[${id}][size_id]`,
                    value: id
                })
            );

            const priceColumn = $('<div>', {
                class: 'sm:col-span-2'
            });

            priceColumn.append(
                $('<label>', {
                    class: 'mb-2 block text-xs font-bold uppercase tracking-wide text-[#796a59]',
                    text: 'Price (₹)'
                })
            );

            priceColumn.append(
                createInput(
                    `sizes[${id}][price]`,
                    values.price,
                    'Enter price',
                    '0.01'
                )
            );

            const stockColumn = $('<div>', {
                class: 'sm:col-span-2'
            });

            stockColumn.append(
                $('<label>', {
                    class: 'mb-2 block text-xs font-bold uppercase tracking-wide text-[#796a59]',
                    text: 'Stock'
                })
            );

            stockColumn.append(
                createInput(
                    `sizes[${id}][stock]`,
                    values.stock,
                    'Enter stock',
                    '1'
                )
            );

            grid.append(sizeColumn, priceColumn, stockColumn);
            row.append(grid);
            container.append(row);

        });

        emptyMessage.toggleClass('hidden', selectedSizes.length > 0);
    }

    // When size selection changes
    $('#size_ids').on('change', renderSizeRows);

    // Show empty message if no size selected
    emptyMessage.toggleClass(
        'hidden',
        ($('#size_ids').val() || []).length > 0
    );

    // Image Preview
    $('#images').on('change', function () {

        const preview = $('#image-preview-container');

        preview.empty();

        const files = Array.from(this.files || []);

        if (files.length === 0) {
            preview.addClass('hidden').removeClass('grid');
            return;
        }

        preview.removeClass('hidden').addClass('grid');

        files.forEach(function (file) {

            if (!file.type.startsWith('image/')) {
                return;
            }

            const url = URL.createObjectURL(file);

            const wrapper = $('<div>', {
                class: 'overflow-hidden rounded-2xl border border-[#e8dccb] bg-[#eee3d3]/30 p-2'
            });

            const img = $('<img>', {
                src: url,
                alt: file.name,
                class: 'aspect-square w-full rounded-xl object-cover'
            });

            img.on('load', function () {
                URL.revokeObjectURL(url);
            });

            wrapper.append(img);
            preview.append(wrapper);

        });

    });

});
</script>

@endsection
