<div x-data="{ open: false }" class="border-b border-gray-200">
    <button @click="open = !open" class="flex w-full items-center justify-between py-3 text-left">
        <span class="font-semibold text-slate-800">{{$text}}</span>
        <svg class="h-5 w-5 text-gray-500 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
    </button>

    <div x-show="open" x-transition class="pb-4 pl-8">
        @if(is_array($list))
        @foreach($list as $k => $v)
            <a href="{{ route($v) }}" class="text-sm block text-l text-gray-600 hover:text-slate-900">{{$k}}</a>    
        @endforeach
        @endif
    </div>
</div>