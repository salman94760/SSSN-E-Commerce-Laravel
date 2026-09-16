<a href="{{ $link }}" class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-semibold
   {{ request()->is(ltrim(parse_url($link, PHP_URL_PATH), '/'))
        ? 'bg-slate-900 text-white'
        : 'text-slate-600 hover:bg-slate-100' }}">

    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    	<path stroke-linecap="{{$linecap}}"
              stroke-linejoin="{{$linejoin}}"
              stroke-width="{{$width}}"
              d="{{$d}}"/>
    </svg>
	{{ $text }}
</a>