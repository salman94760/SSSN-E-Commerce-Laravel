@extends('layouts.customer.customer-layout')

@section('title', 'SSSN | RETURN & REFUND')

@section('customerContent')

{{-- HERO --}}
<section class="bg-[#fffdf9] border-b border-[#e8dccb]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <span class="text-xs uppercase tracking-[0.2em] text-[#9a846a]">
            My Account
        </span>

        <h1 class="text-4xl font-bold mt-3 text-[#493825]">
            Returns & Refunds
        </h1>

        <p class="text-[#79654e] mt-2">
            Track your returned products and refund details.
        </p>

    </div>
</section>


{{-- MAIN CONTENT --}}
<section class="bg-[#faf7f2] min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">


        {{-- SUMMARY CARDS --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-8">

            {{-- RETURNED ITEMS --}}
            <div class="bg-white border border-[#e8dccb]
                        rounded-3xl p-6 shadow-sm">

                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-sm text-[#9a846a]">
                            Total Returned Items
                        </p>

                        <h2 class="text-3xl font-bold text-[#493825] mt-3">
                            05
                        </h2>

                        <p class="text-xs text-[#79654e] mt-2">
                            Products returned
                        </p>
                    </div>

                    <div class="w-12 h-12 rounded-2xl bg-[#f5efe6]
                                flex items-center justify-center
                                text-[#79654e] text-xl">

                        <i class="fa-solid fa-box-open"></i>

                    </div>

                </div>

            </div>


            {{-- TOTAL REFUND --}}
            <div class="bg-white border border-[#e8dccb]
                        rounded-3xl p-6 shadow-sm">

                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-sm text-[#9a846a]">
                            Total Refund Received
                        </p>

                        <h2 class="text-3xl font-bold text-[#493825] mt-3">
                            ₹4,500
                        </h2>

                        <p class="text-xs text-[#79654e] mt-2">
                            Successfully refunded
                        </p>
                    </div>

                    <div class="w-12 h-12 rounded-2xl bg-[#f5efe6]
                                flex items-center justify-center
                                text-[#79654e] text-xl">

                        <i class="fa-solid fa-wallet"></i>

                    </div>

                </div>

            </div>


            {{-- PENDING REFUND --}}
            <div class="bg-white border border-[#e8dccb]
                        rounded-3xl p-6 shadow-sm">

                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-sm text-[#9a846a]">
                            Pending Refund
                        </p>

                        <h2 class="text-3xl font-bold text-[#493825] mt-3">
                            ₹1,200
                        </h2>

                        <p class="text-xs text-[#79654e] mt-2">
                            Awaiting processing
                        </p>
                    </div>

                    <div class="w-12 h-12 rounded-2xl bg-[#f5efe6]
                                flex items-center justify-center
                                text-[#79654e] text-xl">

                        <i class="fa-solid fa-clock"></i>

                    </div>

                </div>

            </div>

        </div>


        {{-- RETURN HISTORY --}}
        <div class="bg-white border border-[#e8dccb]
                    rounded-3xl shadow-sm overflow-hidden">

            <div class="p-6 sm:p-8 border-b border-[#eee4d8]">

                <span class="text-xs uppercase tracking-[0.2em] text-[#9a846a]">
                    Order Activity
                </span>

                <h2 class="text-xl font-bold text-[#493825] mt-1">
                    Return History
                </h2>

                <p class="text-sm text-[#79654e] mt-2">
                    Details of your returned products and refunds.
                </p>

            </div>


            {{-- TABLE --}}
            <div class="overflow-x-auto">

                <table class="w-full text-left min-w-[850px]">

                    <thead class="bg-[#faf7f2]">

                        <tr class="text-xs uppercase tracking-wider text-[#9a846a]">

                            <th class="px-6 py-4 font-semibold">Product</th>

                            <th class="px-6 py-4 font-semibold">Order ID</th>

                            <th class="px-6 py-4 font-semibold">Quantity</th>

                            <th class="px-6 py-4 font-semibold">Return Date</th>

                            <th class="px-6 py-4 font-semibold">Refund Amount</th>

                            <th class="px-6 py-4 font-semibold">Status</th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-[#eee4d8]">


                        {{-- PRODUCT 1 --}}
                        <tr class="hover:bg-[#fffdf9] transition">

                            <td class="px-6 py-5">

                                <div class="flex items-center gap-3">

                                    <img src="https://placehold.co/80x100/f5efe6/493825?text=Product"
                                         class="w-14 h-16 object-cover rounded-xl"
                                         alt="Product">

                                    <div>
                                        <p class="font-semibold text-sm text-[#493825]">
                                            Premium Casual Shirt
                                        </p>

                                        <p class="text-xs text-[#9a846a] mt-1">
                                            Clothing
                                        </p>
                                    </div>

                                </div>

                            </td>

                            <td class="px-6 py-5 text-sm text-[#79654e]">
                                #SSSN1025
                            </td>

                            <td class="px-6 py-5 text-sm text-[#493825]">
                                1
                            </td>

                            <td class="px-6 py-5 text-sm text-[#79654e]">
                                12 Nov 2026
                            </td>

                            <td class="px-6 py-5 font-semibold text-[#493825]">
                                ₹1,500
                            </td>

                            <td class="px-6 py-5">

                                <span class="inline-flex items-center gap-1.5
                                             px-3 py-1.5 rounded-full
                                             bg-green-50 text-green-700
                                             text-xs font-semibold">

                                    <i class="fa-solid fa-check-circle"></i>
                                    Refunded

                                </span>

                            </td>

                        </tr>


                        {{-- PRODUCT 2 --}}
                        <tr class="hover:bg-[#fffdf9] transition">

                            <td class="px-6 py-5">

                                <div class="flex items-center gap-3">

                                    <img src="https://placehold.co/80x100/f5efe6/493825?text=Product"
                                         class="w-14 h-16 object-cover rounded-xl"
                                         alt="Product">

                                    <div>
                                        <p class="font-semibold text-sm text-[#493825]">
                                            Classic Denim Jeans
                                        </p>

                                        <p class="text-xs text-[#9a846a] mt-1">
                                            Clothing
                                        </p>
                                    </div>

                                </div>

                            </td>

                            <td class="px-6 py-5 text-sm text-[#79654e]">
                                #SSSN1018
                            </td>

                            <td class="px-6 py-5 text-sm text-[#493825]">
                                2
                            </td>

                            <td class="px-6 py-5 text-sm text-[#79654e]">
                                08 Nov 2026
                            </td>

                            <td class="px-6 py-5 font-semibold text-[#493825]">
                                ₹2,000
                            </td>

                            <td class="px-6 py-5">

                                <span class="inline-flex items-center gap-1.5
                                             px-3 py-1.5 rounded-full
                                             bg-green-50 text-green-700
                                             text-xs font-semibold">

                                    <i class="fa-solid fa-check-circle"></i>
                                    Refunded

                                </span>

                            </td>

                        </tr>


                        {{-- PRODUCT 3 --}}
                        <tr class="hover:bg-[#fffdf9] transition">

                            <td class="px-6 py-5">

                                <div class="flex items-center gap-3">

                                    <img src="https://placehold.co/80x100/f5efe6/493825?text=Product"
                                         class="w-14 h-16 object-cover rounded-xl"
                                         alt="Product">

                                    <div>
                                        <p class="font-semibold text-sm text-[#493825]">
                                            Elegant Party Wear
                                        </p>

                                        <p class="text-xs text-[#9a846a] mt-1">
                                            Fashion
                                        </p>
                                    </div>

                                </div>

                            </td>

                            <td class="px-6 py-5 text-sm text-[#79654e]">
                                #SSSN1009
                            </td>

                            <td class="px-6 py-5 text-sm text-[#493825]">
                                1
                            </td>

                            <td class="px-6 py-5 text-sm text-[#79654e]">
                                15 Nov 2026
                            </td>

                            <td class="px-6 py-5 font-semibold text-[#493825]">
                                ₹1,200
                            </td>

                            <td class="px-6 py-5">

                                <span class="inline-flex items-center gap-1.5
                                             px-3 py-1.5 rounded-full
                                             bg-amber-50 text-amber-700
                                             text-xs font-semibold">

                                    <i class="fa-solid fa-clock"></i>
                                    Processing

                                </span>

                            </td>

                        </tr>


                    </tbody>

                </table>

            </div>


            {{-- TABLE FOOTER --}}
            <div class="p-5 sm:px-8 bg-[#fffdf9]
                        border-t border-[#eee4d8]">

                <p class="text-xs text-[#9a846a]">
                    Showing 3 sample return records.
                </p>

            </div>

        </div>


        {{-- SUPPORT --}}
        <div class="mt-8 bg-[#493825] rounded-3xl p-7 sm:p-9
                    flex flex-col sm:flex-row
                    items-center justify-between gap-5">

            <div class="text-center sm:text-left">

                <h3 class="text-xl font-bold text-white">
                    Need Help With Your Refund?
                </h3>

                <p class="text-sm text-[#e5d7c5] mt-2">
                    Contact our support team for return and refund assistance.
                </p>

            </div>

            <a href="mailto:YOUR-SUPPORT-EMAIL"
               class="shrink-0 inline-flex items-center gap-2
                      px-6 py-3 rounded-xl bg-[#f5efe6]
                      text-[#493825] text-sm font-semibold
                      hover:bg-white transition">

                <i class="fa-regular fa-envelope"></i>
                Contact Support

            </a>

        </div>

    </div>
</section>

@endsection