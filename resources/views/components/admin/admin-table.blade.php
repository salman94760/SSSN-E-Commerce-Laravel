<div class="mt-8 overflow-hidden rounded-[28px] border border-white/80 bg-white/65 shadow-[0_15px_45px_rgba(100,75,45,0.06)] backdrop-blur-2xl">

            <div class="flex flex-wrap items-center justify-between gap-4 border-b border-[#eee8df] p-6 sm:p-8">

                <div>
                    <p class="text-[10px] font-bold uppercase tracking-[3px] text-[#aa8d6d]">
                        Store Activity
                    </p>

                    <h2 class="mt-2 text-xl font-semibold">
                        Recent Orders
                    </h2>
                </div>

                <a href="{{ url('/admin/orders') }}"
                   class="text-[10px] font-bold uppercase tracking-[2px] text-[#a58a6d] transition hover:text-[#765b3e]">
                    View All →
                </a>

            </div>


            <div class="overflow-x-auto">

                <table class="w-full min-w-[650px] text-left">

                    <thead>
                        <tr class="bg-[#f9f6f1] text-[9px] font-bold uppercase tracking-[2px] text-[#9b9185]">
                        	@foreach($head as $h)
                            	<th class="px-8 py-5">{{$h}}</th>
                        	@endforeach
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-[#eee8df]">

                        @forelse($body as $order)

                            <tr class="transition hover:bg-[#faf7f2]">

                                <td class="px-8 py-5 text-sm font-semibold">
                                    #{{ $order->id }}
                                </td>

                                <td class="px-8 py-5">
                                    <p class="text-sm font-semibold">
                                        {{ $order->customer->name ?? $order->name ?? 'Customer' }}
                                    </p>
                                </td>

                                <td class="px-8 py-5 text-xs text-[#938a7f]">
                                    {{ $order->created_at?->format('d M Y') ?? '—' }}
                                </td>

                                <td class="px-8 py-5 text-sm font-semibold">
                                    ₹{{ number_format((float) ($order->total_amount ?? $order->total ?? 0), 2) }}
                                </td>

                                <td class="px-8 py-5">
                                    @php
                                        $status = strtolower($order->status ?? 'pending');
                                        $statusClasses = [
                                            'completed' => 'bg-green-100 text-green-700',
                                            'delivered' => 'bg-green-100 text-green-700',
                                            'pending' => 'bg-amber-100 text-amber-700',
                                            'processing' => 'bg-blue-100 text-blue-700',
                                            'cancelled' => 'bg-red-100 text-red-700',
                                        ];
                                    @endphp

                                    <span class="rounded-full px-3 py-1.5 text-[9px] font-bold uppercase tracking-wider {{ $statusClasses[$status] ?? 'bg-gray-100 text-gray-600' }}">
                                        {{ $status }}
                                    </span>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="px-8 py-12 text-center text-sm text-[#a49a8d]">
                                    No recent orders available.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>