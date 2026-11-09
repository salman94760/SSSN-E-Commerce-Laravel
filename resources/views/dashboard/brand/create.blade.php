
@extends('layouts.admin.page')

@section('title', 'Add Brand')

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

                <h2 class="text-lg font-bold text-[#5d4936]">
                    Brand Information
                </h2>

                <p class="mt-1 text-xs text-[#a58a6d]">
                    Enter the details to create a new clothing brand.
                </p>

            </div>

            {{-- Add Brand Form --}}
            <form
                action="{{ route('brands.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf

                <div class="p-5 sm:p-8">

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                        {{-- Brand Name --}}
                        <div>

                            <label for="name" class="{{ $labelClass }}">
                                Brand Name
                                <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name') }}"
                                placeholder="e.g. Nike, Adidas, Puma"
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
                                value="{{ old('slug') }}"
                                placeholder="e.g. nike"
                                class="{{ $inputClass }}"
                                required
                            >

                            @error('slug')
                                <p class="mt-2 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        {{-- Brand Image --}}
                        <div>

                            <label for="image" class="{{ $labelClass }}">
                                Brand Image
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

                            {{-- Image Preview --}}
                            <div
                                id="image-preview-wrapper"
                                class="mt-4 hidden"
                            >

                                <p class="{{ $labelClass }}">
                                    Image Preview
                                </p>

                                <div class="inline-block rounded-2xl border border-[#e8dccb] bg-[#eee3d3]/30 p-2">

                                    <img
                                        id="image-preview"
                                        alt="Brand Image Preview"
                                        class="h-32 w-32 rounded-xl object-cover"
                                    >

                                </div>

                            </div>

                        </div>

                        {{-- Status --}}
                        <div>

                            <label for="status" class="{{ $labelClass }}">
                                Brand Status
                            </label>

                            <select
                                name="status"
                                id="status"
                                class="{{ $inputClass }}"
                            >

                                <option
                                    value="1"
                                    @selected(old('status', '1') == '1')
                                >
                                    Active
                                </option>

                                <option
                                    value="0"
                                    @selected(old('status', '1') == '0')
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

                </div>

                {{-- Footer Actions --}}
                <div class="flex flex-col-reverse gap-3 border-t border-[#e8dccb]/70 bg-[#eee3d3]/25 px-6 py-5 sm:flex-row sm:items-center sm:justify-end">

                    {{-- Cancel --}}
                    <a
                        href="{{ route('brands.index') }}"
                        class="inline-flex items-center justify-center rounded-xl border border-[#e8dccb] bg-white/80 px-6 py-3 text-sm font-semibold text-[#6b5540] transition duration-300 hover:bg-[#eee3d3]"
                    >
                        Cancel
                    </a>

                    {{-- Add Brand --}}
                    <button
                        type="submit"
                        class="inline-flex items-center justify-center rounded-xl bg-[#6b5540] px-6 py-3 text-sm font-semibold text-white transition duration-300 hover:-translate-y-0.5 hover:bg-[#4e3c2b]"
                    >
                        Add Brand
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
            return;
        }

        currentImageUrl = URL.createObjectURL(file);

        previewImage.src = currentImageUrl;

        previewWrapper.classList.remove('hidden');

    });

});
</script>

@endsection
