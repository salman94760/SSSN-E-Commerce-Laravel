@extends('layouts.admin.admin')

@section('title', 'Add Product')

@section('breadcrumb', 'Products / Create Product')

@section('content')

<div class="mx-auto max-w-5xl">

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-800">
            Add Product
        </h1>

        <p class="mt-1 text-sm text-slate-500">
            Add a new clothing product
        </p>
    </div>


    @if($errors->any())

        <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">

            <ul class="list-disc space-y-1 pl-5">

                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif


    <div class="rounded-xl border border-slate-200 bg-white shadow-sm">

        <form
            action="{{ route('products.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

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
                            value="{{ old('name') }}"
                            placeholder="e.g. Premium Cotton T-Shirt"
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm outline-none focus:border-slate-800 focus:ring-2 focus:ring-slate-200"
                        >

                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
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
                            value="{{ old('slug') }}"
                            placeholder="premium-cotton-t-shirt"
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm outline-none focus:border-slate-800 focus:ring-2 focus:ring-slate-200"
                        >

                        @error('slug')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
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
                            class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm outline-none focus:border-slate-800"
                        >

                            <option value="">
                                Select Category
                            </option>

                            @foreach($categories as $category)

                                <option
                                    value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}
                                >
                                    {{ $category->name }}
                                </option>

                            @endforeach

                        </select>

                        @error('category_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
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
                            class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm outline-none focus:border-slate-800"
                        >

                            <option value="">
                                Select Brand
                            </option>

                            @foreach($brands as $brand)

                                <option
                                    value="{{ $brand->id }}"
                                    {{ old('brand_id') == $brand->id ? 'selected' : '' }}
                                >
                                    {{ $brand->name }}
                                </option>

                            @endforeach

                        </select>

                        @error('brand_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                    </div>


                    {{-- Price --}}
                    <div>

                        <label
                            for="price"
                            class="mb-2 block text-sm font-medium text-slate-700"
                        >
                            Price
                            <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="number"
                            name="price"
                            id="price"
                            value="{{ old('price') }}"
                            min="0"
                            step="0.01"
                            placeholder="1499.00"
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm outline-none focus:border-slate-800"
                        >

                        @error('price')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
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
                            value="{{ old('sale_price') }}"
                            min="0"
                            step="0.01"
                            placeholder="999.00"
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm outline-none focus:border-slate-800"
                        >

                        @error('sale_price')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
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
                            value="{{ old('stock', 0) }}"
                            min="0"
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm outline-none focus:border-slate-800"
                        >

                        @error('stock')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
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

                            <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>
                                Inactive
                            </option>

                        </select>

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
                            name="image"
                            id="image"
                            accept="image/jpeg,image/png,image/webp"
                            class="block w-full rounded-lg border border-slate-300 bg-white text-sm text-slate-500 file:mr-4 file:border-0 file:bg-slate-800 file:px-4 file:py-3 file:text-sm file:font-medium file:text-white"
                        >

                        @error('image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
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
                        >{{ old('description') }}</textarea>

                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
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
                    Add Product
                </button>

            </div>

        </form>

    </div>

</div>

@endsection