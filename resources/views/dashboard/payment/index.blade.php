@extends('layouts.admin.page')
@section('title', 'Orders')
@section('adminPage')

@php
$status = ['Pending','Processing','Shipped','Delivered','Cancelled'];

@endphp



<div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
    <div class="mx-auto max-w-7xl">

        <x-admin.sub-header :arr="['title'=>'Payments','subtitle'=>'Manage all customer payments.']"/>

            <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
                <div class="overflow-x-auto">
                    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                        <x-admin.view-filter :arr="['status'=>$status,'reset'=>'/payments','searchname'=>'payments']"/>
                        <x-admin.view-table>
@forelse($orders as $order)

    <div class="rounded-xl border border-gray-200 bg-white p-5">

        <div class="flex items-center justify-between">

            <div>
                <p class="text-sm text-gray-500">
                    Order
                </p>

                <p class="font-semibold text-gray-900">
                    {{ $order->order_number }}
                </p>
            </div>

            <div class="text-right">
                <p class="font-bold text-gray-900">
                    ₹{{ number_format($order->total_amount-$order->discount_amount, 2) }}
                </p>
            </div>

        </div>


        <div class="mt-4 grid grid-cols-2 gap-4 sm:grid-cols-4">

            {{-- Payment Method --}}
            <div>
                <p class="text-xs text-gray-500">
                    Payment Method
                </p>

                <p class="mt-1 text-sm font-semibold text-gray-900">
                    {{ $order->payment_method }}
                </p>
            </div>


            {{-- Payment Status --}}
            <div>
                <p class="text-xs text-gray-500">
                    Payment Status
                </p>

                @if($order->payment_status === 'Paid')

                    <span class="mt-1 inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                        Paid
                    </span>

                @elseif($order->payment_status === 'Pending')

                    <span class="mt-1 inline-flex rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-700">
                        Pending
                    </span>

                @else

                    <span class="mt-1 inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
                        {{ $order->payment_status }}
                    </span>

                @endif
            </div>


            {{-- Order Status --}}
<div>
    <p class="text-xs text-gray-500">
        Order Status
    </p>

    <form action="{{ route('admin.orders.status', $order->id) }}" method="POST"
          method="POST"
          class="mt-1">
        @csrf
        @method('PUT')

        <select name="order_status"
                onchange="this.form.submit()"
                class="rounded-lg border-gray-300 text-sm font-semibold
                       focus:border-indigo-500 focus:ring-indigo-500">

            <option value="Pending"
                {{ $order->order_status === 'Pending' ? 'selected' : '' }}>
                Pending
            </option>

            <option value="Processing"
                {{ $order->order_status === 'Processing' ? 'selected' : '' }}>
                Processing
            </option>

            <option value="Shipped"
                {{ $order->order_status === 'Shipped' ? 'selected' : '' }}>
                Shipped
            </option>

            <option value="Delivered"
                {{ $order->order_status === 'Delivered' ? 'selected' : '' }}>
                Delivered
            </option>

            <option value="Cancelled"
                {{ $order->order_status === 'Cancelled' ? 'selected' : '' }}>
                Cancelled
            </option>

        </select>
    </form>
</div>


            {{-- Date --}}
            <div>
                <p class="text-xs text-gray-500">
                    Date
                </p>

                <p class="mt-1 text-sm text-gray-700">
                    {{ $order->created_at->format('d M Y') }}
                </p>
            </div>

        </div>

    </div>

@empty

    <div class="rounded-xl border border-gray-200 bg-white p-10 text-center">
        <p class="text-gray-500">
            No payments found.
        </p>
    </div>

@endforelse
                        </x-admin.view-table>
               
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection