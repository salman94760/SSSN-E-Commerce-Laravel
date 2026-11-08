<a href="{{ $link }}" class="group flex w-full items-center gap-3 rounded-xl px-3 py-3 text-sm font-medium text-[#77716a] transition-all duration-200 hover:bg-[#f7f3ed] hover:text-[#927653]
   {{ request()->is(ltrim(parse_url($link, PHP_URL_PATH), '/'))
        ? 'bg-[#f4eee6] text-[#927653] font-semibold'
        : 'text-slate-600 hover:bg-slate-100' }}">

    <svg class="h-5 w-5 shrink-0 text-current" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    	<path stroke-linecap="{{$linecap}}"
              stroke-linejoin="{{$linejoin}}"
              stroke-width="{{$width}}"
              d="{{$d}}"/>
    </svg>
	{{ $text }}
</a>

