
@props(['arr' => []])

@php
    $pagination = $arr['arrpagination'] ?? null;
@endphp

@if($pagination && $pagination->total() > 0)

    <div class="relative overflow-hidden rounded-[26px] border border-white/80 bg-white/65 px-5 py-5 shadow-[0_15px_45px_rgba(100,75,45,0.06)] backdrop-blur-2xl sm:px-7">

        <!-- Background Glow -->
        <div class="pointer-events-none absolute -right-10 -top-10 h-32 w-32 rounded-full bg-[#e7d5bb]/30 blur-3xl"></div>

        <div class="relative flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">

            <!-- Showing Records -->
            <div class="text-center lg:text-left">

                <p class="text-xs font-medium text-[#938778]">
                    Showing

                    <span class="font-bold text-[#6b5540]">
                        {{ $pagination->firstItem() ?? 0 }}
                    </span>

                    to

                    <span class="font-bold text-[#6b5540]">
                        {{ $pagination->lastItem() ?? 0 }}
                    </span>

                    of

                    <span class="font-bold text-[#6b5540]">
                        {{ number_format($pagination->total()) }}
                    </span>

                    total records
                </p>

            </div>

            <!-- Pagination Buttons -->
            @if($pagination->hasPages())

                <div class="flex flex-wrap items-center justify-center gap-2">

                    <!-- Previous -->
                    @if($pagination->onFirstPage())

                        <span class="inline-flex cursor-not-allowed items-center rounded-xl border border-[#e8dccb] bg-[#f5efe7]/50 px-4 py-2.5 text-xs font-semibold text-[#b8a998] opacity-60">
                            &larr; Previous
                        </span>

                    @else

                        <a
                            href="{{ $pagination->previousPageUrl() }}"
                            class="inline-flex items-center rounded-xl border border-[#e8dccb] bg-white/70 px-4 py-2.5 text-xs font-semibold text-[#6b5540] transition-all duration-300 hover:-translate-y-0.5 hover:border-[#d6bea0] hover:bg-[#eee3d3]"
                        >
                            &larr; Previous
                        </a>

                    @endif

                    <!-- Page Numbers -->
                    @php
                        $current = $pagination->currentPage();
                        $last = $pagination->lastPage();

                        $pages = collect([
                            1,
                            $current - 1,
                            $current,
                            $current + 1,
                            $last
                        ])
                        ->filter(fn($page) => $page >= 1 && $page <= $last)
                        ->unique()
                        ->sort()
                        ->values();

                        $previousPage = 0;
                    @endphp

                    @foreach($pages as $page)

                        @if($page - $previousPage > 1)

                            <span class="px-1 text-xs text-[#a58a6d]">
                                ...
                            </span>

                        @endif

                        @if($page == $current)

                            <span
                                aria-current="page"
                                class="inline-flex h-10 min-w-10 items-center justify-center rounded-xl bg-[#6b5540] px-3 text-xs font-bold text-white shadow-[0_5px_15px_rgba(107,85,64,0.25)]"
                            >
                                {{ $page }}
                            </span>

                        @else

                            <a
                                href="{{ $pagination->url($page) }}"
                                class="inline-flex h-10 min-w-10 items-center justify-center rounded-xl border border-[#e8dccb] bg-white/70 px-3 text-xs font-semibold text-[#6b5540] transition-all duration-300 hover:-translate-y-0.5 hover:border-[#d6bea0] hover:bg-[#eee3d3]"
                            >
                                {{ $page }}
                            </a>

                        @endif

                        @php
                            $previousPage = $page;
                        @endphp

                    @endforeach

                    <!-- Next -->
                    @if($pagination->hasMorePages())

                        <a
                            href="{{ $pagination->nextPageUrl() }}"
                            class="inline-flex items-center rounded-xl border border-[#e8dccb] bg-white/70 px-4 py-2.5 text-xs font-semibold text-[#6b5540] transition-all duration-300 hover:-translate-y-0.5 hover:border-[#d6bea0] hover:bg-[#eee3d3]"
                        >
                            Next &rarr;
                        </a>

                    @else

                        <span class="inline-flex cursor-not-allowed items-center rounded-xl border border-[#e8dccb] bg-[#f5efe7]/50 px-4 py-2.5 text-xs font-semibold text-[#b8a998] opacity-60">
                            Next &rarr;
                        </span>

                    @endif

                </div>

            @endif

        </div>

    </div>

@endif
