
@props(['arr' => []])

<div class="group relative overflow-hidden rounded-[26px] border border-white/80 bg-white/65 p-5 shadow-[0_15px_45px_rgba(100,75,45,0.06)] backdrop-blur-2xl transition duration-500 hover:-translate-y-2 hover:shadow-[0_25px_55px_rgba(100,75,45,0.13)] sm:p-7">

    <div class="absolute -right-8 -top-8 h-32 w-32 rounded-full bg-[#e7d5bb]/40 blur-2xl transition group-hover:scale-150"></div>

    <div class="relative flex items-center justify-between">
        <p class="text-[10px] font-bold uppercase tracking-[2px] text-[#938778]">
            {{ $arr['title'] ?? '' }}
        </p>

        <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#eee3d3] text-xl">
            {{ $arr['icon'] ?? '' }}
        </div>
    </div>

    <h2 class="relative mt-6 text-3xl font-semibold tracking-tight">
        {{ number_format($arr['count'] ?? 0) }}
    </h2>

    <p class="relative mt-2 text-xs text-[#a58a6d]">
        {{ $arr['text'] ?? '' }}
    </p>

</div>
