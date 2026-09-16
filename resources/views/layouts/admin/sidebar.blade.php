    <aside
        id="sidebar"
        class="fixed inset-y-0 left-0 z-50 hidden w-64 border-r border-slate-200 bg-white lg:block"
    >

        <!-- Logo -->
        <div class="flex h-20 items-center border-b border-slate-200 px-6">

            <div class="flex items-center gap-3">

                <div
                    class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-900 text-white"
                >
                    <svg
                        class="h-5 w-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 10.5L12 3l9 7.5M5 9.5V21h14V9.5M9 21v-7h6v7"
                        />
                    </svg>
                </div>

                <div>
                    <h1 class="text-lg font-bold tracking-tight">
                        {{ __('messages.brand') }} AdminPanel
                    </h1>

                    <p class="text-xs text-slate-500">
                        Ecommerce
                    </p>
                </div>

            </div>

        </div>


        <!-- Navigation -->
        <div class="h-[calc(100vh-80px)] overflow-y-auto px-4 py-5">

            <p class="mb-3 px-3 text-[11px] font-bold uppercase tracking-widest text-slate-400">
                Main
            </p>


            <nav class="space-y-1">

                <!-- Dashboard -->
                <x-admin.side-bar-button linecap='round' linejoin='round' width='2' d='M3 12l9-9 9 9M5 10v10h14V10M9 20v-6h6v6' link="/dashboard" text="Dashboard" />
                <x-admin.side-bar-button linecap='round' linejoin='' width='2' d='M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z' link="/orders" text="Orders" />
                <x-admin.side-bar-button linecap='round' linejoin='' width='2' d='M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4' link="/products" text="Products" />
                <x-admin.side-bar-button linecap='round' linejoin='' width='2' d='M4 6h16M4 12h16M4 18h16' link="/categories" text="Categories" />
                <x-admin.side-bar-button linecap='round' linejoin='' width='2' d='M20 12H4M12 4v16' link="/brands" text="Brands" />
                <!-- <x-admin.side-bar-button linecap='round' linejoin='' width='2' d='M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m4-8a4 4 0 110 8 4 4 0 000-8' link="/customers" text="Customers" /> -->



                              
               
              








            </nav>


            <!-- Catalog -->
            <p class="mb-3 mt-8 px-3 text-[11px] font-bold uppercase tracking-widest text-slate-400">
                Catalog
            </p>

            <nav class="space-y-1">

              
                <x-admin.side-bar-button linecap='round' linejoin='' width='2' d='M12 3v18M3 12h18' link="/colors" text="Colors" />
                <x-admin.side-bar-button linecap='round' linejoin='' width='2' d="M6 3h12M6 21h12M8 3v18M16 3v18" link="/sizes" text="Sizes" />
                <x-admin.side-bar-button linecap='round' linejoin='' width='2' d="M20 13l-7 7-9-9V4h7l9 9zM7 7h.01" link="/tags" text="Tags" />
                <x-admin.side-bar-button linecap='round' linejoin='' width='2' d="M20 12a2 2 0 010-4V5a2 2 0 00-2-2H6a2 2 0 00-2 2v3a2 2 0 010 4v3a2 2 0 002 2h12a2 2 0 002-2v-3zM9 9h.01M15 15h.01M9 15l6-6" link="/coupons" text="Coupons" />



            </nav>


            <!-- Management -->
            <p class="mb-3 mt-8 px-3 text-[11px] font-bold uppercase tracking-widest text-slate-400">
                Management
            </p>

            <nav class="space-y-1">
                 <x-admin.side-bar-button linecap='round' linejoin='' width='2' d="M3 10h18M7 15h2M11 15h6M5 5h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z" link="/payments" text="Payments" />
                 <x-admin.side-bar-button linecap='round' linejoin='' width='2' d="M12 3l2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 18.9 6.4 21.2l1.1-6.2L3 9.6l6.2-.9L12 3z" link="/reviews" text="Reviews" />
                 <x-admin.side-bar-button linecap='round' linejoin='' width='2' d="M4 19V5M4 19h16M8 16v-5M12 16V8M16 16v-8" link="/reports" text="Reports" />
             
       

            </nav>


            <!-- Bottom User -->
            <div class="mt-8 rounded-2xl bg-slate-50 p-4">

                <div class="flex items-center gap-3">

                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-full bg-slate-900 text-sm font-bold text-white"
                    >
                        A
                    </div>

                    <div class="min-w-0">

                        <p class="truncate text-sm font-semibold text-slate-900">
                            Admin
                        </p>

                        <p class="truncate text-xs text-slate-500">
                            admin@example.com
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </aside>