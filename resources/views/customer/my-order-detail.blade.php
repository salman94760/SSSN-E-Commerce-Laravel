@extends('layouts.customer.customer-layout')

@section('customerContent')

<div class="min-h-screen bg-gray-50 py-8">

    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">

        {{-- Back --}}
        <div class="mb-6">

            <a
                href="{{ route('customer.my-orders') }}"
                class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-gray-900"
            >
                <svg
                    class="mr-2 h-4 w-4"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M15 19l-7-7 7-7"
                    />
                </svg>

                Back to My Orders
            </a>

        </div>


        {{-- Page Header --}}
        <div class="mb-6 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">

            <div>
                <h1 class="text-2xl font-bold text-gray-900">
                    Order Details
                </h1>

                <p class="mt-1 text-sm text-gray-500">
                    Order #{{ $order->order_number }}
                </p>
            </div>


            {{-- Status --}}
            <div>

                @if($order->order_status === 'Pending')

                    <span class="inline-flex rounded-full bg-yellow-100 px-4 py-2 text-sm font-semibold text-yellow-800">
                        Pending
                    </span>

                @elseif($order->order_status === 'Processing')

                    <span class="inline-flex rounded-full bg-blue-100 px-4 py-2 text-sm font-semibold text-blue-800">
                        Processing
                    </span>

                @elseif($order->order_status === 'Shipped')

                    <span class="inline-flex rounded-full bg-purple-100 px-4 py-2 text-sm font-semibold text-purple-800">
                        Shipped
                    </span>

                @elseif($order->order_status === 'Delivered')

                    <span class="inline-flex rounded-full bg-green-100 px-4 py-2 text-sm font-semibold text-green-800">
                        Delivered
                    </span>

                @elseif($order->order_status === 'Cancelled')

                    <span class="inline-flex rounded-full bg-red-100 px-4 py-2 text-sm font-semibold text-red-800">
                        Cancelled
                    </span>

                @else

                    <span class="inline-flex rounded-full bg-gray-100 px-4 py-2 text-sm font-semibold text-gray-700">
                        {{ $order->order_status }}
                    </span>

                @endif

            </div>

        </div>


        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">


            {{-- LEFT --}}
            <div class="space-y-6 lg:col-span-2">

                
                {{-- Products --}}
                <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

                    <div class="border-b border-gray-200 px-5 py-4">

                        <h2 class="text-lg font-semibold text-gray-900">
                            Ordered Items
                        </h2>

                        <p class="mt-1 text-sm text-gray-500">
                           
                        </p>

                    </div>


                    <div class="divide-y divide-gray-100">

                        @foreach($orderitems as $item)

                            <div class="p-5">

                                <div class="flex gap-4">

                                    {{-- Image --}}
                                    <div class="h-24 w-24 shrink-0 overflow-hidden rounded-lg border border-gray-200 bg-gray-100">

                                        @if($item->product && $item->product->image)

                                            <img
                                                src="{{ asset('storage/' . $item->product->image) }}"
                                                alt="{{ $item->product->name }}"
                                                class="h-full w-full object-cover"
                                            >

                                        @else

                                            <div class="flex h-full items-center justify-center text-xs text-gray-400">
                                                No Image
                                            </div>

                                        @endif

                                    </div>


                                    {{-- Product --}}
                                    <div class="min-w-0 flex-1">

                                        @if($item->product)

                                            <h3 class="text-base font-semibold text-gray-900">
                                                {{ $item->product->name }}
                                            </h3>

                                        @else

                                            <h3 class="text-base font-semibold text-gray-500">
                                                Product unavailable
                                            </h3>

                                        @endif


                                        <div class="mt-2 space-y-1 text-sm text-gray-500">

                                            <p>
                                                Quantity:
                                                <span class="font-medium text-gray-700">
                                                    {{ $item->quantity }}
                                                </span>
                                            </p>

                                            <p>
                                                Price:
                                                <span class="font-medium text-gray-700">
                                                    ₹{{ number_format($item->product->sale_price, 2) }}
                                                </span>
                                            </p>

                                        </div>

                                    </div>


                                    {{-- Total --}}
                                    <div class="text-right">

                                        <p class="text-xs text-gray-500">
                                            Total
                                        </p>

                                        <p class="mt-1 text-base font-bold text-gray-900">
                                            ₹{{ number_format($item->product->sale_price*$item->quantity, 2) }}
                                        </p>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>
                {{-- Track Order --}}
<div class="mb-6 overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

    <div class="border-b border-gray-200 px-5 py-4">
        <h2 class="text-lg font-semibold text-gray-900">
            Track Order
        </h2>

        <p class="mt-1 text-sm text-gray-500">
            Order #{{ $order->order_number }}
        </p>
    </div>

    @php
        $statuses = [
            'Pending' => [
                'title' => 'Order Placed',
                'description' => 'Your order has been successfully placed.',
            ],
            'Processing' => [
                'title' => 'Processing',
                'description' => 'Your order is being prepared.',
            ],
            'Shipped' => [
                'title' => 'Shipped',
                'description' => 'Your order has been shipped.',
            ],
            'Delivered' => [
                'title' => 'Delivered',
                'description' => 'Your order has been delivered.',
            ],
        ];

        $statusOrder = [
            'Pending',
            'Processing',
            'Shipped',
            'Delivered'
        ];

        $currentStatus = $order->order_status;

        $currentIndex = array_search($currentStatus, $statusOrder);

        if ($currentIndex === false) {
            $currentIndex = 0;
        }
    @endphp


    <div class="px-5 py-6">

        <div class="relative">

            {{-- Vertical Line --}}
            <div class="absolute left-[15px] top-4 h-[calc(100%-32px)] w-0.5 bg-gray-200"></div>


            @foreach($statusOrder as $index => $status)

                @php
                    $isCompleted = $index <= $currentIndex;
                    $isCurrent = $index === $currentIndex;
                @endphp

                <div class="relative flex gap-4 pb-8 last:pb-0">

                    {{-- Circle --}}
                    <div class="relative z-10 flex h-8 w-8 shrink-0 items-center justify-center rounded-full
                        {{ $isCompleted ? 'bg-green-600' : 'bg-gray-200' }}">

                        @if($isCompleted)

                            <svg
                                class="h-4 w-4 text-white"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 13l4 4L19 7"
                                />
                            </svg>

                        @else

                            <span class="h-2.5 w-2.5 rounded-full bg-gray-400"></span>

                        @endif

                    </div>


                    {{-- Status Content --}}
                    <div class="flex-1">

                        <div class="flex flex-col justify-between gap-1 sm:flex-row">

                            <div>

                                <h3 class="text-sm font-semibold
                                    {{ $isCurrent ? 'text-green-600' : ($isCompleted ? 'text-gray-900' : 'text-gray-400') }}">
                                    {{ $statuses[$status]['title'] }}
                                </h3>

                                <p class="mt-1 text-sm
                                    {{ $isCompleted ? 'text-gray-500' : 'text-gray-400' }}">
                                    {{ $statuses[$status]['description'] }}
                                </p>

                            </div>


                            @if($isCurrent)

                                <span class="inline-flex h-fit w-fit rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                    Current
                                </span>

                            @endif

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</div>

                {{-- Shipping Address --}}
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">

                    <div class="border-b border-gray-200 px-5 py-4">

                        <h2 class="text-lg font-semibold text-gray-900">
                            Shipping Address
                        </h2>

                    </div>


                    <div class="px-5 py-5">

                        <p class="text-sm leading-6 text-gray-600">
                            {{ $order->shipping_address }}
                        </p>

                    </div>

                </div>


                {{-- Customer Information --}}
                @if($order->userInfo)

                    <div class="rounded-xl border border-gray-200 bg-white shadow-sm">

                        <div class="border-b border-gray-200 px-5 py-4">

                            <h2 class="text-lg font-semibold text-gray-900">
                                Customer Information
                            </h2>

                        </div>


                        <div class="grid grid-cols-1 gap-5 px-5 py-5 sm:grid-cols-2">

                            <div>

                                <p class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                    Phone
                                </p>

                                <p class="mt-1 text-sm font-medium text-gray-900">
                                    {{ $order->userInfo->phone ?? 'N/A' }}
                                </p>

                            </div>


                            <div>

                                <p class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                    ZIP Code
                                </p>

                                <p class="mt-1 text-sm font-medium text-gray-900">
                                    {{ $order->userInfo->zipcode ?? 'N/A' }}
                                </p>

                            </div>

                        </div>

                    </div>

                @endif

            </div>


            {{-- RIGHT --}}
            <div class="space-y-6">


                {{-- Order Summary --}}
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">

                    <div class="border-b border-gray-200 px-5 py-4">

                        <h2 class="text-lg font-semibold text-gray-900">
                            Order Summary
                        </h2>

                    </div>


                    <div class="space-y-4 px-5 py-5">

                        <div class="flex justify-between text-sm">

                            <span class="text-gray-500">
                                Subtotal
                            </span>

                            <span class="font-medium text-gray-900">
                                ₹{{ number_format($order->subtotal, 2) }}
                            </span>

                        </div>


                        <div class="flex justify-between text-sm">

                            <span class="text-gray-500">
                                Shipping
                            </span>

                            <span class="font-medium text-gray-900">
                                ₹{{ number_format($order->shipping_charge, 2) }}
                            </span>

                        </div>

                        <div class="flex justify-between text-sm">

                            <span class="text-gray-500">
                                Discount
                            </span>

                            <span class="font-medium text-gray-900">
                                -₹{{ number_format($order->discount_amount, 2) }}
                            </span>

                        </div>

                        <div class="flex justify-between text-sm">

                            <span class="text-gray-500">
                                Coupon Applied
                            </span>

                            <span class="font-medium text-gray-900">
                                <b>{{strtoupper($order->coupon_code)}}</b>
                            </span>

                        </div>


                        <div class="border-t border-gray-200 pt-4">

                            <div class="flex justify-between">

                                <span class="text-base font-semibold text-gray-900">
                                    Total
                                </span>

                                <span class="text-lg font-bold text-gray-900">
                                    ₹{{ number_format($order->total_amount-$order->discount_amount, 2) }}
                                </span>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- Payment --}}
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">

                    <div class="border-b border-gray-200 px-5 py-4">

                        <h2 class="text-lg font-semibold text-gray-900">
                            Payment Information
                        </h2>

                    </div>


                    <div class="space-y-4 px-5 py-5">

                        <div>

                            <p class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                Payment Method
                            </p>

                            <p class="mt-1 text-sm font-semibold text-gray-900">
                                {{ $order->payment_method }}
                            </p>

                        </div>


                        <div>

                            <p class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                Payment Status
                            </p>


                            @if($order->payment_status === 'Paid')

                                <span class="mt-1 inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-800">
                                    Paid
                                </span>

                            @elseif($order->payment_status === 'Failed')

                                <span class="mt-1 inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-800">
                                    Failed
                                </span>

                            @else

                                <span class="mt-1 inline-flex rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-800">
                                    {{ $order->payment_status }}
                                </span>

                            @endif

                        </div>


                        @if($order->transaction_id)

                            <div>

                                <p class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                    Transaction ID
                                </p>

                                <p class="mt-1 break-all text-sm text-gray-700">
                                    {{ $order->transaction_id }}
                                </p>

                            </div>

                        @endif

                    </div>

                </div>


                {{-- Order Information --}}
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">

                    <div class="border-b border-gray-200 px-5 py-4">

                        <h2 class="text-lg font-semibold text-gray-900">
                            Order Information
                        </h2>

                    </div>


                    <div class="space-y-4 px-5 py-5">

                        <div class="flex justify-between gap-4">

                            <span class="text-sm text-gray-500">
                                Order Number
                            </span>

                            <span class="text-right text-sm font-medium text-gray-900">
                                {{ $order->order_number }}
                            </span>

                        </div>


                        <div class="flex justify-between gap-4">

                            <span class="text-sm text-gray-500">
                                Order Date
                            </span>

                            <span class="text-right text-sm font-medium text-gray-900">
                                {{ $order->created_at->format('d M Y, h:i A') }}
                            </span>

                        </div>


                        <div class="flex justify-between gap-4">

                            <span class="text-sm text-gray-500">
                                Items
                            </span>

                            <span class="text-sm font-medium text-gray-900">
                               {{$totalitems}}
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection