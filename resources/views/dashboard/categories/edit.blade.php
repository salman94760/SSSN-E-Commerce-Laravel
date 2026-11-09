
@extends('layouts.admin.page')

@section('title', 'Edit Category')

@section('adminPage')

@php
    $cardClass = 'overflow-hidden rounded-[26px] border border-white/80 bg-white/65 shadow-[0_15px_45px_rgba(100,75,45,0.06)] backdrop-blur-2xl';

    $labelClass = 'mb-2 block text-xs font-bold uppercase tracking-wide text-[#796a59]';

    $inputClass = 'w-full rounded-xl border border-[#e8dccb] bg-white/80 px-4 py-3 text-sm text-[#5d4936] outline-none transition duration-200 placeholder:text-[#b0a292] focus:border-[#a58a6d] focus:ring-2 focus:ring-[#e7d5bb]/50';
@endphp

<div class="min-h-screen bg-[#f8f5ef] p-4 sm:p-6 lg:p-8">

    <div class="mx-auto max-w-7xl space-y-6">

        

        {{-- Main Card --}}
        <div class="{{ $cardClass }}">

            {{-- Card Header --}}
            <div class="border-b border-[#e8dccb]/60 bg-[#eee3d3]/30 px-6 py-5">

                <div class="flex flex-wrap items-center justify-between gap-3">

                    <div>
                        <h2 class="text-lg font-bold text-[#5d4936]">
                            Category Information
                        </h2>

                        <p class="mt-1 text-xs text-[#a58a6d]">
                            Edit category details, image and status.
                        </p>
                    </div>

                    {{-- Current Status --}}
                    @if($category->status == 1)

                        <span class="inline-flex items-center gap-2 rounded-full bg-green-100 px-4 py-2 text-xs font-semibold text-green-700">
                            <span class="h-2 w-2 rounded-full bg-green-500"></span>
                            Active
                        </span>

                    @else

                        <span class="inline-flex items-center gap-2 rounded-full bg-red-100 px-4 py-2 text-xs font-semibold text-red-700">
                            <span class="h-2 w-2 rounded-full bg-red-500"></span>
                            Inactive
                        </span>

                    @endif

                </div>

            </div>

            {{-- Edit Category Form --}}
            <form
                action="{{ route('categories.update', $category->id) }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                @method('PUT')

                <div class="p-5 sm:p-8">

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                        {{-- Category Name --}}
                        <div>

                            <label for="name" class="{{ $labelClass }}">
                                Category Name
                                <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name', $category->name) }}"
                                placeholder="e.g. T-Shirt"
                                class="{{ $inputClass }}"
                                required
                            >

                            @error('name')
                                <p class="mt-2 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        {{-- Slug --}}
                        <div>

                            <label for="slug" class="{{ $labelClass }}">
                                Slug
                                <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="text"
                                name="slug"
                                id="slug"
                                value="{{ old('slug', $category->slug) }}"
                                placeholder="e.g. t-shirt"
                                class="{{ $inputClass }}"
                                required
                            >

                            @error('slug')
                                <p class="mt-2 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        {{-- Category Image --}}
                        <div>

                            <label for="image" class="{{ $labelClass }}">
                                Category Image
                                <span class="font-normal text-[#a58a6d]">
                                    (Optional)
                                </span>
                            </label>

                            <input
                                type="file"
                                name="image"
                                id="image"
                                accept="image/jpeg,image/png,image/webp"
                                class="block w-full rounded-xl border border-[#e8dccb] bg-white/80 text-sm text-[#796a59] file:mr-4 file:border-0 file:bg-[#6b5540] file:px-4 file:py-3 file:text-sm file:font-semibold file:text-white hover:file:bg-[#4e3c2b]"
                            >

                            <p class="mt-2 text-xs text-[#a58a6d]">
                                Supported formats: JPG, PNG and WebP.
                            </p>

                            @error('image')
                                <p class="mt-2 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        {{-- Status --}}
                        <div>

                            <label for="status" class="{{ $labelClass }}">
                                Category Status
                            </label>

                            <select
                                name="status"
                                id="status"
                                class="{{ $inputClass }}"
                            >

                                <option
                                    value="1"
                                    @selected(old('status', $category->status) == 1)
                                >
                                    Active
                                </option>

                                <option
                                    value="0"
                                    @selected(old('status', $category->status) == 0)
                                >
                                    Inactive
                                </option>

                            </select>

                            @error('status')
                                <p class="mt-2 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                    </div>

                    {{-- Existing Image & Preview --}}
                    <div class="mt-8 border-t border-[#e8dccb]/70 pt-7">

                        <h3 class="text-base font-bold text-[#5d4936]">
                            Category Image Preview
                        </h3>

                        <p class="mt-1 text-xs text-[#a58a6d]">
                            View your current image or preview a newly selected image.
                        </p>

                        <div class="mt-5 flex flex-wrap gap-6">

                            {{-- Existing Image --}}
                            @if(!empty($category->image))

                                <div>

                                    <p class="{{ $labelClass }}">
                                        Current Image
                                    </p>

                                    <div class="rounded-2xl border border-[#e8dccb] bg-[#eee3d3]/30 p-2">

                                        <img
                                            src="{{ asset('storage/' . $category->image) }}"
                                            alt="{{ $category->name }}"
                                            class="h-36 w-36 rounded-xl object-cover"
                                        >

                                    </div>

                                </div>

                            @endif

                            {{-- New Image Preview --}}
                            <div id="image-preview-wrapper" class="hidden">

                                <p class="{{ $labelClass }}">
                                    New Image Preview
                                </p>

                                <div class="rounded-2xl border border-[#e8dccb] bg-[#eee3d3]/30 p-2">

                                    <img
                                        id="image-preview"
                                        alt="New Category Image"
                                        class="h-36 w-36 rounded-xl object-cover"
                                    >

                                </div>

                            </div>

                            {{-- No Image Message --}}
                            @if(empty($category->image))

                                <div
                                    id="no-image-message"
                                    class="flex h-36 w-36 items-center justify-center rounded-2xl border border-dashed border-[#e8dccb] bg-[#eee3d3]/30 text-center text-xs text-[#938778]"
                                >
                                    No image uploaded
                                </div>

                            @endif

                        </div>

                    </div>

                </div>

                {{-- Footer Actions --}}
                <div class="flex flex-col-reverse gap-3 border-t border-[#e8dccb]/70 bg-[#eee3d3]/25 px-6 py-5 sm:flex-row sm:items-center sm:justify-end">

                    {{-- Cancel --}}
                    <a
                        href="{{ route('categories.index') }}"
                        class="inline-flex items-center justify-center rounded-xl border border-[#e8dccb] bg-white/80 px-6 py-3 text-sm font-semibold text-[#6b5540] transition duration-300 hover:bg-[#eee3d3]"
                    >
                        Cancel
                    </a>

                    {{-- Update --}}
                    <button
                        type="submit"
                        class="inline-flex items-center justify-center rounded-xl bg-[#6b5540] px-6 py-3 text-sm font-semibold text-white transition duration-300 hover:-translate-y-0.5 hover:bg-[#4e3c2b]"
                    >
                        Update Category
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

{{-- Image Preview Script --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    const imageInput = document.getElementById('image');
    const previewWrapper = document.getElementById('image-preview-wrapper');
    const previewImage = document.getElementById('image-preview');
    const noImageMessage = document.getElementById('no-image-message');

    let currentImageUrl = null;

    imageInput.addEventListener('change', function () {

        const file = this.files[0];

        if (currentImageUrl) {
            URL.revokeObjectURL(currentImageUrl);
            currentImageUrl = null;
        }

        if (!file || !file.type.startsWith('image/')) {

            previewWrapper.classList.add('hidden');
            previewImage.removeAttribute('src');

            if (noImageMessage) {
                noImageMessage.classList.remove('hidden');
            }

            return;
        }

        currentImageUrl = URL.createObjectURL(file);

        previewImage.src = currentImageUrl;

        previewWrapper.classList.remove('hidden');

        if (noImageMessage) {
            noImageMessage.classList.add('hidden');
        }

    });

});
</script>

@endsection
