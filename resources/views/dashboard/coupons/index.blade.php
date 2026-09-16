@extends('layouts.admin.page')

@section('title', 'Coupon')

@section('adminPage')

@php
    $status = ['All','Active','Inactive'];
    $column = ['Action','Code','Discount','Min Order','Usage','Validity','Status'];
@endphp

<div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
    <div class="mx-auto max-w-7xl">
        <x-admin.sub-header :arr="['title'=>'Coupons','subtitle'=>'Create and manage discount coupons.','AddButton'=>'+ Add Coupon','link'=>'coupons.create']"/>
                    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                    <x-admin.view-filter :arr="['status'=>$status,'searchname'=>'coupons','reset'=>'/coupons']"/>
                    
                    <x-admin.view-table :arr="['columnArr'=>$column]">
                                   

                        @forelse($coupons as $coupon)

                            <tr class="hover:bg-gray-50">
                                 <td class="whitespace-nowrap px-6 py-4 text-slate-500">
                                 <a href="{{ route('coupons.edit', $coupon->id) }}" title="Edit" class="flex h-9 w-9 items-center justify-center rounded-lg border border-blue-200 text-blue-600 hover:bg-blue-50">✎</a>

                                  
                            </td>
                                      

                                <td class="px-5 py-4">

                                    <span class="rounded-md bg-gray-100 px-3 py-1.5 text-sm font-bold tracking-wide text-gray-900">
                                        {{ $coupon->code }}
                                    </span>

                                </td>


                                <td class="px-5 py-4 text-sm font-semibold text-gray-900">

                                    @if($coupon->type === 'percentage')

                                        {{ $coupon->value }}%

                                    @else

                                        ₹{{ number_format($coupon->value, 2) }}

                                    @endif

                                </td>


                                <td class="px-5 py-4 text-sm text-gray-600">

                                    ₹{{ number_format($coupon->min_order_amount, 2) }}

                                </td>


                                <td class="px-5 py-4 text-sm text-gray-600">

                                    {{ $coupon->used_count }}

                                    /

                                    {{ $coupon->usage_limit ?? '∞' }}

                                </td>


                                <td class="px-5 py-4 text-sm text-gray-600">

                                    @if($coupon->expires_at)

                                        {{ $coupon->expires_at->format('d M Y') }}

                                    @else

                                        No expiry

                                    @endif

                                </td>


                                <td class="px-5 py-4">

                                    @if($coupon->is_active)

                                        <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                            Active
                                        </span>

                                    @else

                                        <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
                                            Inactive
                                        </span>

                                    @endif

                                </td>


                         

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="7"
                                    class="px-5 py-12 text-center text-sm text-gray-500"
                                >
                                    No coupons found.
                                </td>

                            </tr>

                        @endforelse
                    </x-admin.view-table>
                    <x-admin.view-pagination :arr="['arrpagination'=>$coupons]"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>










@endsection