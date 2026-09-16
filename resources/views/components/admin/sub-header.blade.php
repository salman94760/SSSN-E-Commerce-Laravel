@props(['arr' => []])
<div class="mb-6 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">{{ $arr['title'] ?? '' }}</h1>
        <p class="mt-1 text-sm text-gray-500">{{ $arr['subtitle'] ?? '' }}</p>
    </div>

    @if(isset($arr['ordertotal']))
    <div class="rounded-lg bg-white px-4 py-2 text-sm font-medium text-gray-600 shadow-sm ring-1 ring-gray-200">
        Total Orders:
        <span class="font-bold text-gray-900">
            {{ $arr['ordertotal'] ?? 0 }}
        </span>
    </div>
    @endif

    @if(isset($arr['AddButton']))
    <a href="{{ isset($arr['link']) ?route($arr['link']):'' }}" class="rounded-lg bg-slate-800 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-slate-700">
            {{$arr['AddButton'] ?? ''}}
    </a>
    @endif

</div>