@extends('layouts.admin.page')

@section('title', 'Add Coupons')

@section('adminPage')

<div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
    <div class="mx-auto max-w-7xl">

        <x-admin.sub-header :arr="['title'=>'Add Coupons','subtitle'=>'Create and manage discount coupons..']"/>

        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                    <x-admin.view-table>
    

<form
    action="{{ route('coupons.store') }}"
    method="POST"
    class="space-y-5"
>
    @csrf

    {{-- Code --}}
    <div>
        <label class="mb-2 block text-sm font-medium text-gray-700">
            Coupon Code
        </label>

        <input
            type="text"
            name="code"
            placeholder="SAVE10"
            class="w-full rounded-lg border border-gray-300 px-4 py-3 uppercase focus:border-gray-900 focus:ring-gray-900"
            required
        >
    </div>


    {{-- Type --}}
    <div>
        <label class="mb-2 block text-sm font-medium text-gray-700">
            Discount Type
        </label>

        <select
            name="type"
            class="w-full rounded-lg border border-gray-300 px-4 py-3"
            required
        >
            <option value="percentage">
                Percentage
            </option>

            <option value="fixed">
                Fixed Amount
            </option>
        </select>
    </div>


    {{-- Value --}}
    <div>
        <label class="mb-2 block text-sm font-medium text-gray-700">
            Discount Value
        </label>

        <input
            type="number"
            name="value"
            step="0.01"
            min="0"
            class="w-full rounded-lg border border-gray-300 px-4 py-3"
            required
        >
    </div>


    {{-- Minimum --}}
    <div>
        <label class="mb-2 block text-sm font-medium text-gray-700">
            Minimum Order Amount
        </label>

        <input
            type="number"
            name="min_order_amount"
            step="0.01"
            min="0"
            value="0"
            class="w-full rounded-lg border border-gray-300 px-4 py-3"
        >
    </div>


    {{-- Maximum Discount --}}
    <div>
        <label class="mb-2 block text-sm font-medium text-gray-700">
            Maximum Discount
        </label>

        <input
            type="number"
            name="max_discount"
            step="0.01"
            min="0"
            class="w-full rounded-lg border border-gray-300 px-4 py-3"
        >
    </div>


    {{-- Usage --}}
    <div>
        <label class="mb-2 block text-sm font-medium text-gray-700">
            Usage Limit
        </label>

        <input
            type="number"
            name="usage_limit"
            min="1"
            class="w-full rounded-lg border border-gray-300 px-4 py-3"
        >

        <p class="mt-1 text-xs text-gray-500">
            Empty = unlimited
        </p>
    </div>


    {{-- Expiry --}}
    <div>
        <label class="mb-2 block text-sm font-medium text-gray-700">
            Expiry Date
        </label>

        <input
            type="datetime-local"
            name="expires_at"
            class="w-full rounded-lg border border-gray-300 px-4 py-3"
        >
    </div>


    <button
        type="submit"
        class="rounded-lg bg-gray-900 px-6 py-3 font-semibold text-white hover:bg-gray-700"
    >
        Create Coupon
    </button>

</form>

  
                    </x-admin.view-table>
                   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

















@endsection