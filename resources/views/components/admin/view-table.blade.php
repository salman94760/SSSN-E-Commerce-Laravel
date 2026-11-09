
@props(['arr' => []])

<div class="group relative overflow-hidden rounded-[26px] border border-white/80 bg-white/65 shadow-[0_15px_45px_rgba(100,75,45,0.06)] backdrop-blur-2xl transition-all duration-500 hover:shadow-[0_25px_55px_rgba(100,75,45,0.10)]">

    <!-- Background Glow -->
    <div class="pointer-events-none absolute -right-10 -top-10 h-40 w-40 rounded-full bg-[#e7d5bb]/30 blur-3xl"></div>

    <!-- Responsive Table -->
    <div class="relative overflow-x-auto">

        <table class="w-full min-w-[900px] text-left">

            <!-- Table Header -->
            <thead class="border-b border-[#e8dccb] bg-[#eee3d3]/60">

                <tr>
                    @if(!empty($arr['columnArr']))
                        @foreach($arr['columnArr'] as $key)
                            <th
                                scope="col"
                                class="whitespace-nowrap px-6 py-5 text-[10px] font-bold uppercase tracking-[1.5px] text-[#796a59]"
                            >
                                {{ $key }}
                            </th>
                        @endforeach
                    @endif
                </tr>

            </thead>

            <!-- Table Body -->
            <tbody class="divide-y divide-[#e8dccb]/50 text-sm text-[#6b5540] [&>tr]:transition-all [&>tr]:duration-300 [&>tr:hover]:bg-[#f5ecdf]/60 [&>tr>td]:px-6 [&>tr>td]:py-4">

                {{ $slot }}

            </tbody>

        </table>

    </div>

</div>
