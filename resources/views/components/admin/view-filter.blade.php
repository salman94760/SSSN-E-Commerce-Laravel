@props(['arr' => []])

<div class="border-b border-[#eee8df] bg-white/40 sm:p-6">

    <form method="GET" action="{{ url()->current() }}">

        <div class="flex flex-col gap-4 xl:flex-row xl:items-center xl:justify-between">

            {{-- Search --}}
            <div class="relative w-full xl:max-w-sm">

                <svg class="absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-[#aa9a87]"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-width="1.8"
                          d="m21 21-4.35-4.35m2.35-5.65a8 8 0 1 1-16 0 8 8 0 0 1 16 0Z"/>

                </svg>

                <input
                    name="search"
                    type="text"
                    value="{{ request('search') }}"
                    placeholder="Search {{ $arr['searchname'] ?? 'records' }}..."
                    class="w-full rounded-full border border-[#e9e0d5] bg-white/80 py-3.5 pl-12 pr-5 text-sm text-[#514638] outline-none transition placeholder:text-[#b4a797] focus:border-[#b49a7b] focus:ring-4 focus:ring-[#b49a7b]/10"
                />

            </div>


            {{-- Filters --}}
            <div class="flex flex-wrap items-center gap-3">

                {{-- Categories --}}
                @if(!empty($arr['categories']))

                    <select name="categories"
                            class="min-w-[145px] rounded-full border border-[#e9e0d5] bg-white/80 px-5 py-3.5 text-xs font-semibold text-[#806e5a] outline-none transition focus:border-[#b49a7b]">

                        <option value="">All Categories</option>

                        @foreach($arr['categories'] as $category)

                            <option value="{{ $category->id }}"
                                {{ request('category_id') == $category->id ? 'selected' : '' }}>

                                {{ $category->name }}

                            </option>

                        @endforeach

                    </select>

                @endif


                {{-- Brands --}}
                @if(!empty($arr['brands']))

                    <select name="brands"
                            class="min-w-[130px] rounded-full border border-[#e9e0d5] bg-white/80 px-5 py-3.5 text-xs font-semibold text-[#806e5a] outline-none transition focus:border-[#b49a7b]">

                        <option value="">All Brands</option>

                        @foreach($arr['brands'] as $brand)

                            <option value="{{ $brand->id }}"
                                {{ request('brand_id') == $brand->id ? 'selected' : '' }}>

                                {{ $brand->name }}

                            </option>

                        @endforeach

                    </select>

                @endif


                {{-- Status --}}
                @if(!empty($arr['status']) && is_array($arr['status']))

                    <select name="status"
                            class="min-w-[125px] rounded-full border border-[#e9e0d5] bg-white/80 px-5 py-3.5 text-xs font-semibold text-[#806e5a] outline-none transition focus:border-[#b49a7b]">

                        <option value="">All Status</option>

                        @foreach($arr['status'] as $status)

                            <option value="{{ $status }}"
                                {{ request('status') == $status ? 'selected' : '' }}>

                                {{ $status }}

                            </option>

                        @endforeach

                    </select>

                @endif


                {{-- Filter Button --}}
                <button type="submit"
                        class="rounded-full bg-[#a58a6d] px-6 py-3.5 text-[10px] font-bold uppercase tracking-[2px] text-white shadow-sm transition hover:bg-[#765b3e]">

                    Filter

                </button>


                {{-- Reset Button --}}
                <a href="{{ url($arr['reset'] ?? '/') }}"
                   class="rounded-full border border-[#e9e0d5] bg-white/70 px-6 py-3.5 text-[10px] font-bold uppercase tracking-[2px] text-[#927e67] transition hover:bg-[#f7f2eb]">

                    Reset

                </a>

            </div>

        </div>

    </form>

</div>