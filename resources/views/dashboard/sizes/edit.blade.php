
@extends('layouts.admin.page')

@section('title', 'Edit Size')

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
                    Size Information
                </h2>

                <p class="mt-1 text-xs text-[#a58a6d]">
                    Edit the details of your clothing size.
                </p>

            </div>

            {{-- Edit Size Form --}}
            <form
                action="{{ route('sizes.update', $size->id) }}"
                method="POST"
            >
                @csrf
                @method('PUT')

                <div class="p-5 sm:p-8">

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                        {{-- Size Name --}}
                        <div>

                            <label for="name" class="{{ $labelClass }}">
                                Size Name
                                <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name', $size->name) }}"
                                placeholder="e.g. S, M, L, XL"
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
                                value="{{ old('slug', $size->slug) }}"
                                placeholder="e.g. small, medium, large"
                                class="{{ $inputClass }}"
                                required
                            >

                            @error('slug')
                                <p class="mt-2 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                    </div>

                </div>

                {{-- Footer Actions --}}
                <div class="flex flex-col-reverse gap-3 border-t border-[#e8dccb]/70 bg-[#eee3d3]/25 px-6 py-5 sm:flex-row sm:items-center sm:justify-end">

                    {{-- Cancel Button --}}
                    <a
                        href="{{ route('sizes.index') }}"
                        class="inline-flex items-center justify-center rounded-xl border border-[#e8dccb] bg-white/80 px-6 py-3 text-sm font-semibold text-[#6b5540] transition duration-300 hover:bg-[#eee3d3]"
                    >
                        Cancel
                    </a>

                    {{-- Update Button --}}
                    <button
                        type="submit"
                        class="inline-flex items-center justify-center rounded-xl bg-[#6b5540] px-6 py-3 text-sm font-semibold text-white transition duration-300 hover:-translate-y-0.5 hover:bg-[#4e3c2b]"
                    >
                        Update Size
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
