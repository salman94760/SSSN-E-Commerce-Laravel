@props(['arr' => []])


<div class="flex flex-wrap items-center justify-between gap-4 border-b border-[#eee8df] p-4 sm:p-6">

                <div>
                    

                    <h2 class="mb-2 text-xl font-semibold text-[#40372e]">
                        {{ $arr['title'] ?? '' }}
                    </h2>
                    <p class="text-[10px] font-bold uppercase tracking-[3px] text-[#aa8d6d]">
                        {{ $arr['subtitle'] ?? '' }}
                    </p>
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
    <a href="{{ isset($arr['link']) ?route($arr['link']):'' }}" class="rounded-full bg-[#a58a6d] px-5 py-3 text-[10px] font-bold uppercase tracking-[2px] text-white transition hover:bg-[#765b3e]">
            {{$arr['AddButton'] ?? ''}}
    </a>
    @endif

                

            </div>