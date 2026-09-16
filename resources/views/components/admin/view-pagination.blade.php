         @props(['arr' => []])
                    <!-- Pagination -->
<div class="flex flex-col gap-4 border-t border-slate-200 px-5 py-4 sm:flex-row sm:items-center sm:justify-between">

    {{-- Showing 1 to 4 of 248 arr['arrpagination'] --}}
    <p class="text-sm text-slate-500">
        Showing
        <span class="font-semibold text-slate-900">
            {{ $arr['arrpagination']->firstItem() ?? 0 }}
        </span>

        to

        <span class="font-semibold text-slate-900">
            {{ $arr['arrpagination']->lastItem() ?? 0 }}
        </span>

        of

        <span class="font-semibold text-slate-900">
            {{ $arr['arrpagination']->total() }}
        </span>
        Totals
    </p>


    {{-- Pagination --}}
    <div class="flex items-center gap-1">

        {{-- Previous --}}
        @if ($arr['arrpagination']->onFirstPage())
            <span class="rounded-lg border border-slate-200 px-3 py-2 text-sm text-slate-400 cursor-not-allowed">
                Previous
            </span>
        @else
            <a href="{{ $arr['arrpagination']->previousPageUrl() }}"
               class="rounded-lg border border-slate-200 px-3 py-2 text-sm hover:bg-slate-50">
                Previous
            </a>
        @endif


        {{-- Page Numbers --}}
        @foreach ($arr['arrpagination']->getUrlRange(1, $arr['arrpagination']->lastPage()) as $page => $url)

            @if ($page == $arr['arrpagination']->currentPage())
                <span class="rounded-lg bg-slate-900 px-3 py-2 text-sm font-semibold text-white">
                    {{ $page }}
                </span>
            @else
                <a href="{{ $url }}"
                   class="rounded-lg border border-slate-200 px-3 py-2 text-sm hover:bg-slate-50">
                    {{ $page }}
                </a>
            @endif

        @endforeach


        {{-- Next --}}
        @if ($arr['arrpagination']->hasMorePages())
            <a href="{{ $arr['arrpagination']->nextPageUrl() }}"
               class="rounded-lg border border-slate-200 px-3 py-2 text-sm hover:bg-slate-50">
                Next
            </a>
        @else
            <span class="rounded-lg border border-slate-200 px-3 py-2 text-sm text-slate-400 cursor-not-allowed">
                Next
            </span>
        @endif

    </div>

</div>