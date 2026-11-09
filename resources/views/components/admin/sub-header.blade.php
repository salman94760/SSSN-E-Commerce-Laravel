@props(['arr' => []])


<div class="flex flex-wrap items-center justify-between gap-4 border-b border-[#eee8df] p-4 sm:p-6">

                <div>
                    

                    


                    <p class="text-[10px] font-bold uppercase tracking-[3px] text-[#aa8d6d]">
                    {{ $arr['eyebrow'] ?? '' }}
                </p>

                <h2 class="mt-2 text-xl font-semibold text-[#40372e]">
                    {{ $arr['title'] ?? '' }}
                </h2>

                <p class="mt-1 text-xs text-[#a49a8d]">
                    {{ $arr['subtitle'] ?? '' }}
                </p>


                </div>
                
           
@if(isset($arr['ordertotal']))
    <div class="group relative inline-flex items-center gap-3 overflow-hidden rounded-2xl border border-white/80 bg-white/65 px-5 py-3 shadow-[0_10px_30px_rgba(100,75,45,0.06)] backdrop-blur-2xl transition-all duration-500 hover:-translate-y-1 hover:shadow-[0_15px_35px_rgba(100,75,45,0.13)]">

        <!-- Background Glow -->
        <div class="absolute -right-5 -top-5 h-16 w-16 rounded-full bg-[#e7d5bb]/40 blur-2xl transition group-hover:scale-150"></div>

        <!-- Label -->
        <span class="relative text-[10px] font-bold uppercase tracking-[1.5px] text-[#938778]">
            Total Orders
        </span>

        <!-- Count -->
        <span class="relative rounded-xl bg-[#eee3d3] px-3 py-1.5 text-sm font-bold text-[#6b5540]">
            {{ number_format($arr['ordertotal'] ?? 0) }}
        </span>

    </div>
@endif

                @if(isset($arr['AddButton']))
    <a href="{{ isset($arr['link']) ?route($arr['link']):'' }}" class="rounded-full bg-[#a58a6d] px-5 py-3 text-[10px] font-bold uppercase tracking-[2px] text-white transition hover:bg-[#765b3e]">
            {{$arr['AddButton'] ?? ''}}
    </a>
    @endif

                

            </div>


  