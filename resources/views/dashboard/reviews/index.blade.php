
@extends('layouts.admin.page')

@section('title', 'Reviews')

@section('adminPage')

@php
    $status = ['All', 'Active', 'Inactive'];

    $cardClass = 'overflow-hidden rounded-[26px] border border-white/80 bg-white/65 shadow-[0_15px_45px_rgba(100,75,45,0.06)] backdrop-blur-2xl';
@endphp

<div class="min-h-screen bg-[#f8f5ef] p-4 sm:p-6 lg:p-8">

    <div class="mx-auto max-w-7xl space-y-6">

       

        <div class="{{ $cardClass }}">

            {{-- Header --}}
            <div class="border-b border-[#e8dccb]/70 bg-[#eee3d3]/30 px-6 py-5">

                <h2 class="text-lg font-bold text-[#5d4936]">
                    All Customer Reviews
                </h2>

                <p class="mt-1 text-xs text-[#a58a6d]">
                    View and manage product reviews.
                </p>

            </div>

            {{-- Filters --}}
            <div class="border-b border-[#e8dccb]/70 bg-[#eee3d3]/20">

                <x-admin.view-filter :arr="[
                    'status' => $status,
                    'searchname' => 'reviews',
                    'reset' => '/reviews'
                ]" />

            </div>

            {{-- Reviews --}}
            <div class="space-y-4 p-4 sm:p-6">

                @forelse($reviews as $review)

                    <div class="rounded-2xl border border-[#e8dccb] bg-white/75 p-5 transition duration-300 hover:shadow-lg">

                        <div class="flex flex-col justify-between gap-4 sm:flex-row">

                            <div class="flex items-start gap-3">

                                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#eee3d3] text-xl">
                                    👤
                                </div>

                                <div>

                                    <h3 class="font-bold text-[#5d4936]">
                                        {{ $review->name }}
                                    </h3>

                                    <p class="mt-1 text-xs text-[#a58a6d]">
                                        {{ $review->product }}
                                    </p>

                                    <div class="mt-2 flex gap-1 text-lg text-amber-500">

                                        @for($i = 1; $i <= 5; $i++)
                                            <span>
                                                {{ $i <= $review->rating ? '★' : '☆' }}
                                            </span>
                                        @endfor

                                    </div>

                                </div>

                            </div>

                            <div class="flex items-center gap-3">

                                @if($review->status == 1)

                                    <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                        Active
                                    </span>

                                @else

                                    <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
                                        Inactive
                                    </span>

                                @endif

                                <a
                                    href="{{ route('reviews.edit', $review->id) }}"
                                    class="rounded-xl border border-[#e8dccb] bg-[#eee3d3]/60 px-4 py-2 text-sm font-semibold text-[#6b5540] transition hover:bg-[#e5d4bd]"
                                >
                                    ✎ Edit
                                </a>

                            </div>

                        </div>

                        <div class="mt-4 rounded-xl bg-[#f8f5ef] p-4">

                            <p class="text-sm leading-relaxed text-[#796a59]">
                                {{ $review->comment }}
                            </p>

                        </div>

                        <p class="mt-3 text-xs text-[#a58a6d]">
                            {{ $review->created_at->format('d M Y') }}
                        </p>

                    </div>

                @empty

                    <div class="py-16 text-center">

                        <div class="text-4xl">⭐</div>

                        <h3 class="mt-4 font-bold text-[#5d4936]">
                            No Reviews Found
                        </h3>

                        <p class="mt-2 text-sm text-[#a58a6d]">
                            Customer reviews will appear here.
                        </p>

                    </div>

                @endforelse

            </div>

            @if(method_exists($reviews, 'links'))

                <div class="border-t border-[#e8dccb] bg-[#eee3d3]/20">

                    <x-admin.view-pagination :arr="[
                        'arrpagination' => $reviews
                    ]" />

                </div>

            @endif

        </div>

    </div>

</div>

@endsection
