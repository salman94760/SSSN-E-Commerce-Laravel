                <!-- ================================================= -->
                <!-- STAT CARDS -->
                <!-- ================================================= -->

                <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">


                    <!-- Card -->
                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                        <div class="flex items-center justify-between">

                            <div>
                                <p class="text-sm font-medium text-slate-500">
                                    Total Products
                                </p>

                                <p class="mt-2 text-2xl font-extrabold text-slate-900">
                                    {{$arr['productsInfo']['total']}}
                                </p>
                            </div>

                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-slate-100">

                                <svg
                                    class="h-5 w-5 text-slate-700"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-width="1.8"
                                        d="M20 7l-8-4-8 4m16 0v10l-8 4-8-4V7m16 0l-8 4m0 0L4 7m8 4v10"
                                    />
                                </svg>

                            </div>

                        </div>

                    </div>


                    <!-- Card -->
                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-sm font-medium text-slate-500">
                                    Active Products
                                </p>

                                <p class="mt-2 text-2xl font-extrabold text-green-600">
                                    {{$arr['productsInfo']['active']}}
                                </p>

                            </div>

                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-green-50">

                                <span class="h-3 w-3 rounded-full bg-green-500"></span>

                            </div>

                        </div>

                    </div>


                    <!-- Card -->
                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-sm font-medium text-slate-500">
                                    Out of Stock
                                </p>

                                <p class="mt-2 text-2xl font-extrabold text-red-600">
                                    {{$arr['productsInfo']['out_stock']}}
                                </p>

                            </div>

                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-red-50">

                                <span class="h-3 w-3 rounded-full bg-red-500"></span>

                            </div>

                        </div>

                    </div>


                    <!-- Card -->
                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-sm font-medium text-slate-500">
                                    Low Stock
                                </p>

                                <p class="mt-2 text-2xl font-extrabold text-yellow-600">
                                    {{$arr['productsInfo']['stock']}}
                                </p>

                            </div>

                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-yellow-50">

                                <span class="h-3 w-3 rounded-full bg-yellow-500"></span>

                            </div>

                        </div>

                    </div>

                </div>