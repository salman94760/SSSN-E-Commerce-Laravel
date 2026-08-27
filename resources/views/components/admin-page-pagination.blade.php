@if($pagArray->hasPages())

    <div class="flex flex-col gap-4 border-t border-slate-200 bg-white px-6 py-4 sm:flex-row sm:items-center sm:justify-between">

        {{-- Showing --}}
        <p class="text-sm text-slate-500">
            Showing
            <span class="font-semibold text-slate-700">
                {{ $pagArray->firstItem() }}
            </span>

            to

            <span class="font-semibold text-slate-700">
                {{ $pagArray->lastItem() }}
            </span>

            of

            <span class="font-semibold text-slate-700">
                {{ $pagArray->total() }}
            </span>

            {{$title}}
        </p>


        {{-- Pagination --}}
        <div>
            {{ $pagArray->links() }}
        </div>

    </div>

@endif