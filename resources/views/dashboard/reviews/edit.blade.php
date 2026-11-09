
@extends('layouts.admin.page')

@section('title', 'Edit Review')

@section('adminPage')

@php
    $cardClass = 'overflow-hidden rounded-[26px] border border-white/80 bg-white/65 shadow-[0_15px_45px_rgba(100,75,45,0.06)] backdrop-blur-2xl';

    $labelClass = 'mb-2 block text-xs font-bold uppercase tracking-wide text-[#796a59]';

    $inputClass = 'w-full rounded-xl border border-[#e8dccb] bg-white/80 px-4 py-3 text-sm text-[#5d4936] outline-none transition duration-200 focus:border-[#a58a6d] focus:ring-2 focus:ring-[#e7d5bb]/50';
@endphp

<div class="min-h-screen bg-[#f8f5ef] p-4 sm:p-6 lg:p-8">

    <div class="mx-auto max-w-7xl space-y-6">

        <x-admin.sub-header :arr="[
            'title' => 'Edit Review',
            'subtitle' => 'Update customer review information.'
        ]" />

        <div class="{{ $cardClass }}">

            <div class="border-b border-[#e8dccb]/70 bg-[#eee3d3]/30 px-6 py-5">

                <h2 class="text-lg font-bold text-[#5d4936]">
                    Review Information
                </h2>

                <p class="mt-1 text-xs text-[#a58a6d]">
                    Edit review details, rating and visibility.
                </p>

            </div>

            <form
                action="{{ route('reviews.update', $review->id) }}"
                method="POST"
            >
                @csrf
                @method('PUT')

                <div class="p-5 sm:p-8">

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                        {{-- Customer Name --}}
                        <div>

                            <label for="name" class="{{ $labelClass }}">
                                Customer Name
                            </label>

                            <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name', $review->name) }}"
                                class="{{ $inputClass }}"
                                required
                            >

                            @error('name')
                                <p class="mt-2 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        {{-- Product Name --}}
                        <div>

                            <label for="product" class="{{ $labelClass }}">
                                Product Name
                            </label>

                            <input
                                type="text"
                                name="product"
                                id="product"
                                value="{{ old('product', $review->product) }}"
                                class="{{ $inputClass }}"
                                required
                            >

                            @error('product')
                                <p class="mt-2 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        {{-- Rating --}}
                        <div>

                            <label for="rating" class="{{ $labelClass }}">
                                Customer Rating
                            </label>

                            <select
                                name="rating"
                                id="rating"
                                class="{{ $inputClass }}"
                                required
                            >

                                @for($i = 1; $i <= 5; $i++)

                                    <option
                                        value="{{ $i }}"
                                        @selected(old('rating', $review->rating) == $i)
                                    >
                                        {{ $i }} Star{{ $i > 1 ? 's' : '' }}
                                    </option>

                                @endfor

                            </select>

                            @error('rating')
                                <p class="mt-2 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        {{-- Status --}}
                        <div>

                            <label for="status" class="{{ $labelClass }}">
                                Review Status
                            </label>

                            <select
                                name="status"
                                id="status"
                                class="{{ $inputClass }}"
                            >

                                <option
                                    value="1"
                                    @selected(old('status', $review->status) == 1)
                                >
                                    Active
                                </option>

                                <option
                                    value="0"
                                    @selected(old('status', $review->status) == 0)
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

                        {{-- Review Comment --}}
                        <div class="md:col-span-2">

                            <label for="comment" class="{{ $labelClass }}">
                                Review Comment
                            </label>

                            <textarea
                                name="comment"
                                id="comment"
                                rows="5"
                                class="{{ $inputClass }}"
                                placeholder="Customer review..."
                                required
                            >{{ old('comment', $review->comment) }}</textarea>

                            @error('comment')
                                <p class="mt-2 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                    </div>

                </div>

                {{-- Footer --}}
                <div class="flex flex-col-reverse gap-3 border-t border-[#e8dccb] bg-[#eee3d3]/25 px-6 py-5 sm:flex-row sm:justify-end">

                    <a
                        href="{{ route('reviews.index') }}"
                        class="inline-flex items-center justify-center rounded-xl border border-[#e8dccb] bg-white/80 px-6 py-3 text-sm font-semibold text-[#6b5540] transition hover:bg-[#eee3d3]"
                    >
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="rounded-xl bg-[#6b5540] px-6 py-3 text-sm font-semibold text-white transition hover:bg-[#4e3c2b]"
                    >
                        Update Review
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
