
@extends('layouts.admin.page')

@section('title', 'Edit Coupon')

@section('adminPage')

@php
    $cardClass = 'overflow-hidden rounded-[26px] border border-white/80 bg-white/65 shadow-[0_15px_45px_rgba(100,75,45,0.06)] backdrop-blur-2xl';

    $labelClass = 'mb-2 block text-xs font-bold uppercase tracking-wide text-[#796a59]';

    $inputClass = 'w-full rounded-xl border border-[#e8dccb] bg-white/80 px-4 py-3 text-sm text-[#5d4936] outline-none transition duration-200 placeholder:text-[#b0a292] focus:border-[#a58a6d] focus:ring-2 focus:ring-[#e7d5bb]/50';

    $expiryValue = $coupons->expires_at
        ? \Carbon\Carbon::parse($coupons->expires_at)->format('Y-m-d\TH:i')
        : '';
@endphp

<div class="min-h-screen bg-[#f8f5ef] p-4 sm:p-6 lg:p-8">

    <div class="mx-auto max-w-7xl space-y-6">

        

        {{-- Validation Errors --}}
        @if($errors->any())

            <div class="rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-700">

                <p class="mb-2 font-semibold">
                    Please correct the following errors:
                </p>

                <ul class="list-disc space-y-1 pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>

        @endif

        {{-- Main Card --}}
        <div class="{{ $cardClass }}">

            {{-- Card Header --}}
            <div class="border-b border-[#e8dccb]/60 bg-[#eee3d3]/30 px-6 py-5">

                <div class="flex flex-wrap items-center justify-between gap-3">

                    <div>

                        <h2 class="text-lg font-bold text-[#5d4936]">
                            Coupon Information
                        </h2>

                        <p class="mt-1 text-xs text-[#a58a6d]">
                            Edit coupon details, discount limits and expiry.
                        </p>

                    </div>

                    {{-- Coupon Code Badge --}}
                    <span class="rounded-xl border border-[#e8dccb] bg-white/70 px-4 py-2 text-xs font-bold uppercase tracking-wide text-[#6b5540]">
                        {{ $coupons->code }}
                    </span>

                </div>

            </div>

            {{-- Edit Coupon Form --}}
            <form
                action="{{ route('coupons.update', $coupons->id) }}"
                method="POST"
            >
                @csrf
                @method('PUT')

                <div class="p-5 sm:p-8">

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                        {{-- Coupon Code --}}
                        <div>

                            <label for="code" class="{{ $labelClass }}">
                                Coupon Code
                                <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="text"
                                name="code"
                                id="code"
                                value="{{ old('code', $coupons->code) }}"
                                placeholder="e.g. SAVE10"
                                class="{{ $inputClass }} uppercase"
                                required
                            >

                            @error('code')
                                <p class="mt-2 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        {{-- Discount Type --}}
                        <div>

                            <label for="type" class="{{ $labelClass }}">
                                Discount Type
                                <span class="text-red-500">*</span>
                            </label>

                            <select
                                name="type"
                                id="type"
                                class="{{ $inputClass }}"
                                required
                            >

                                <option
                                    value="percentage"
                                    @selected(old('type', $coupons->type) == 'percentage')
                                >
                                    Percentage (%)
                                </option>

                                <option
                                    value="fixed"
                                    @selected(old('type', $coupons->type) == 'fixed')
                                >
                                    Fixed Amount
                                </option>

                            </select>

                            @error('type')
                                <p class="mt-2 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        {{-- Discount Value --}}
                        <div>

                            <label for="value" class="{{ $labelClass }}">
                                Discount Value
                                <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="number"
                                name="value"
                                id="value"
                                value="{{ old('value', $coupons->value) }}"
                                step="0.01"
                                min="0"
                                placeholder="e.g. 10"
                                class="{{ $inputClass }}"
                                required
                            >

                            <p
                                id="discount-hint"
                                class="mt-2 text-xs text-[#a58a6d]"
                            >
                                Enter discount percentage.
                            </p>

                            @error('value')
                                <p class="mt-2 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        {{-- Minimum Order Amount --}}
                        <div>

                            <label for="min_order_amount" class="{{ $labelClass }}">
                                Minimum Order Amount
                            </label>

                            <input
                                type="number"
                                name="min_order_amount"
                                id="min_order_amount"
                                value="{{ old('min_order_amount', $coupons->min_order_amount ?? 0) }}"
                                step="0.01"
                                min="0"
                                placeholder="e.g. 500"
                                class="{{ $inputClass }}"
                            >

                            <p class="mt-2 text-xs text-[#a58a6d]">
                                Minimum cart amount required to apply this coupon.
                            </p>

                            @error('min_order_amount')
                                <p class="mt-2 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        {{-- Maximum Discount --}}
                        <div>

                            <label for="max_discount" class="{{ $labelClass }}">
                                Maximum Discount
                            </label>

                            <input
                                type="number"
                                name="max_discount"
                                id="max_discount"
                                value="{{ old('max_discount', $coupons->max_discount) }}"
                                step="0.01"
                                min="0"
                                placeholder="e.g. 100"
                                class="{{ $inputClass }}"
                            >

                            <p class="mt-2 text-xs text-[#a58a6d]">
                                Optional maximum discount amount.
                            </p>

                            @error('max_discount')
                                <p class="mt-2 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        {{-- Usage Limit --}}
                        <div>

                            <label for="usage_limit" class="{{ $labelClass }}">
                                Usage Limit
                            </label>

                            <input
                                type="number"
                                name="usage_limit"
                                id="usage_limit"
                                value="{{ old('usage_limit', $coupons->usage_limit) }}"
                                min="1"
                                step="1"
                                placeholder="e.g. 100"
                                class="{{ $inputClass }}"
                            >

                            <p class="mt-2 text-xs text-[#a58a6d]">
                                Leave empty for unlimited usage.
                            </p>

                            @error('usage_limit')
                                <p class="mt-2 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        {{-- Expiry Date --}}
                        <div>

                            <label for="expires_at" class="{{ $labelClass }}">
                                Expiry Date
                            </label>

                            <input
                                type="datetime-local"
                                name="expires_at"
                                id="expires_at"
                                value="{{ old('expires_at', $expiryValue) }}"
                                class="{{ $inputClass }}"
                            >

                            <p class="mt-2 text-xs text-[#a58a6d]">
                                Select the date and time when this coupon expires.
                            </p>

                            @error('expires_at')
                                <p class="mt-2 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                    </div>

                </div>

                {{-- Footer Actions --}}
                <div class="flex flex-col-reverse gap-3 border-t border-[#e8dccb]/70 bg-[#eee3d3]/25 px-6 py-5 sm:flex-row sm:items-center sm:justify-end">

                    {{-- Cancel Button --}}
                    <button
                        type="button"
                        onclick="window.history.back()"
                        class="inline-flex items-center justify-center rounded-xl border border-[#e8dccb] bg-white/80 px-6 py-3 text-sm font-semibold text-[#6b5540] transition duration-300 hover:bg-[#eee3d3]"
                    >
                        Cancel
                    </button>

                    {{-- Update Coupon Button --}}
                    <button
                        type="submit"
                        class="inline-flex items-center justify-center rounded-xl bg-[#6b5540] px-6 py-3 text-sm font-semibold text-white transition duration-300 hover:-translate-y-0.5 hover:bg-[#4e3c2b]"
                    >
                        Update Coupon
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

{{-- Discount Type Hint Script --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    const discountType = document.getElementById('type');
    const discountHint = document.getElementById('discount-hint');
    const discountValue = document.getElementById('value');

    function updateDiscountHint() {

        if (discountType.value === 'percentage') {

            discountHint.textContent =
                'Enter discount percentage (0 to 100).';

            discountValue.placeholder = 'e.g. 10';
            discountValue.max = '100';

        } else {

            discountHint.textContent =
                'Enter a fixed discount amount.';

            discountValue.placeholder = 'e.g. 200';
            discountValue.removeAttribute('max');

        }

    }

    discountType.addEventListener('change', updateDiscountHint);

    updateDiscountHint();

});
</script>

@endsection
