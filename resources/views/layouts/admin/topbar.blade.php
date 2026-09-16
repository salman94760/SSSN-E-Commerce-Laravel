        <header
            class="sticky top-0 z-40 flex h-20 items-center justify-between border-b border-slate-200 bg-white/95 px-4 backdrop-blur sm:px-6 lg:px-8"
        >

            <div class="flex items-center gap-3">

                <!-- Mobile Menu -->
                <button
                    onclick="toggleSidebar()"
                    class="rounded-lg p-2 text-slate-600 hover:bg-slate-100 lg:hidden"
                >
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                    </svg>
                </button>

                <div>

                    <h2 class="text-lg font-bold text-slate-900">
                        Dashboard
                    </h2>

                    <p class="hidden text-xs text-slate-500 sm:block">
                        Welcome back, {{auth()->user()->name}}
                    </p>

                </div>

            </div>


            <div class="flex items-center gap-3">

                <!-- Search -->
       <!--          <button
                    class="hidden rounded-xl border border-slate-200 p-2.5 text-slate-500 hover:bg-slate-50 sm:block"
                >
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-width="2"
                            d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z"
                        />
                    </svg>
                </button> -->


                <!-- Notification -->
                <!-- <button
                    class="relative rounded-xl border border-slate-200 p-2.5 text-slate-500 hover:bg-slate-50"
                >

                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-width="2"
                            d="M15 17h5l-1.5-2.5V10a6.5 6.5 0 00-13 0v4.5L4 17h5m6 0a3 3 0 01-6 0"
                        />
                    </svg>

                    <span
                        class="absolute right-2 top-2 h-2 w-2 rounded-full bg-red-500"
                    ></span>

                </button> -->


                <!-- Profile -->
                <div class="hidden items-center gap-3 border-l border-slate-200 pl-3 sm:flex">

                    <div class="text-right">

                        <p class="text-sm font-semibold text-slate-900">
                            {{auth()->user()->name}}
                        </p>

                        <p class="text-xs text-slate-500">
                            @if(auth()->user()->name === 'Admin')
                            Administrator
                            @else
                            Seller
                            @endif
                            
                        </p>

                    </div>

                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-full bg-slate-900 font-semibold text-white"
                    >
                        {{auth()->user()->name[0]}}
                    </div>

                </div>

                <form method="POST" action="{{route('logout')}}">
                <button type="submit"
                    class="rounded-xl bg-red-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-red-700"
                >
                    Sign Out
                </button>
            </form>

            </div>

        </header>