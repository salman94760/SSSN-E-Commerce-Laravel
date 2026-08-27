@extends('layouts.admin.admin')

@section('content')

<div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">

    <div class="mx-auto max-w-7xl">

        {{-- Header --}}
        <div class="mb-6 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">

            <div>
                <h1 class="text-2xl font-bold text-gray-900">
                    Coupons
                </h1>

                <p class="mt-1 text-sm text-gray-500">
                    Create and manage discount coupons.
                </p>
            </div>

            <a
                href="{{ route('coupons.create') }}"
                class="inline-flex items-center justify-center rounded-lg bg-gray-900 px-4 py-2.5 text-sm font-semibold text-white hover:bg-gray-700"
            >
                + Create Coupon
            </a>

        </div>
          {{-- Filter --}}
<div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">

    <form
        action="{{ route('categories.index') }}"
        method="GET"
        class="flex flex-col gap-3 lg:flex-row lg:items-end"
    >

        {{-- Search --}}
        <div class="flex-1">
            <label class="mb-1.5 block text-xs font-medium text-slate-600">
                Search
            </label>

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search coupon..."
                class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm outline-none focus:border-slate-800 focus:ring-2 focus:ring-slate-200"
            >
        </div>


        {{-- Status --}}
        <div class="w-full lg:w-44">
            <label class="mb-1.5 block text-xs font-medium text-slate-600">
                Status
            </label>

            <select
                name="status"
                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm outline-none focus:border-slate-800 focus:ring-2 focus:ring-slate-200"
            >
                <option value="">All Status</option>

                <option
                    value="1"
                    {{ request('status') === '1' ? 'selected' : '' }}
                >
                    Active
                </option>

                <option
                    value="0"
                    {{ request('status') === '0' ? 'selected' : '' }}
                >
                    Inactive
                </option>
            </select>
        </div>


        {{-- Sort --}}
        <div class="w-full lg:w-44">
            <label class="mb-1.5 block text-xs font-medium text-slate-600">
                Sort
            </label>

            <select
                name="sort"
                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm outline-none focus:border-slate-800 focus:ring-2 focus:ring-slate-200"
            >
                <option value="latest">Newest</option>

                <option
                    value="oldest"
                    {{ request('sort') === 'oldest' ? 'selected' : '' }}
                >
                    Oldest
                </option>
                <option
                    value="percentage"
                    {{ request('sort') === 'asc' ? 'selected' : '' }}
                >
                    Percentage
                </option>

                <option
                    value="fixed"
                    {{ request('sort') === 'desc' ? 'selected' : '' }}
                >
                    Fixed
                </option>
            </select>
        </div>


        {{-- Filter Button --}}
        <button
            type="submit"
            class="rounded-lg bg-slate-800 px-5 py-2.5 text-sm font-semibold text-white hover:bg-slate-700"
        >
            Filter
        </button>


        {{-- Reset --}}
        <a
            href="{{ route('coupons.index') }}"
            class="rounded-lg border border-slate-300 bg-white px-5 py-2.5 text-center text-sm font-medium text-slate-600 hover:bg-slate-50"
        >
            Reset
        </a>

    </form>

</div>

        {{-- Table --}}
        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

            <div class="overflow-x-auto">

                <table class="min-w-full divide-y divide-gray-200">

                    <thead class="bg-gray-50">

                        <tr>

                            <th class="px-5 py-4 text-left text-xs font-semibold uppercase text-gray-500">
                                Code
                            </th>

                            <th class="px-5 py-4 text-left text-xs font-semibold uppercase text-gray-500">
                                Discount
                            </th>

                            <th class="px-5 py-4 text-left text-xs font-semibold uppercase text-gray-500">
                                Min Order
                            </th>

                            <th class="px-5 py-4 text-left text-xs font-semibold uppercase text-gray-500">
                                Usage
                            </th>

                            <th class="px-5 py-4 text-left text-xs font-semibold uppercase text-gray-500">
                                Validity
                            </th>

                            <th class="px-5 py-4 text-left text-xs font-semibold uppercase text-gray-500">
                                Status
                            </th>

                            <th class="px-5 py-4 text-right text-xs font-semibold uppercase text-gray-500">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-gray-100">

                        @forelse($coupons as $coupon)

                            <tr class="hover:bg-gray-50">

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


                                <td class="px-5 py-4 text-right">

                                    <a
                                        href="{{ route('coupons.edit', $coupon->id) }}"
                                        class="rounded-lg bg-gray-900 px-3 py-2 text-xs font-semibold text-white hover:bg-gray-700"
                                    >
                                        Edit
                                    </a>

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

                    </tbody>

                </table>

            </div>


            <div class="border-t border-gray-200 px-5 py-4">

                {{ $coupons->links() }}

            </div>

        </div>

    </div>

</div>

@endsection