<div class="bg-white border-b px-6 py-3">
    <div class="text-sm text-slate-500">

        @hasSection('breadcrumb')
            <a href="{{ route('dashboard') }}"
               class="hover:text-slate-900">
                Dashboard
            </a>

            <span class="mx-2">/</span>

            <span class="text-slate-900 font-medium">
                @yield('breadcrumb')
            </span>
        @else
            <span class="text-slate-900 font-medium">
                Dashboard
            </span>
        @endif

    </div>
</div>