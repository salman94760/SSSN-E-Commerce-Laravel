@extends('layouts.mail.mail')

@section('mailContent')

<div class="w-full py-10 px-4">

    <div class="max-w-xl mx-auto bg-white rounded-2xl shadow-sm">

        <!-- Main Content -->
        <div class="p-8">

            <div class="text-center mb-8">
                <div class="text-4xl mb-3">⭐</div>

                <h1 class="text-2xl font-bold text-gray-900">
                    How did you like your purchase?
                </h1>

                <p class="text-gray-500 mt-2">
                    We'd love to hear your feedback about the products you purchased.
                </p>
            </div>


            <!-- Products -->
            @foreach($order->items as $item)

                <div class="border border-gray-200 rounded-xl p-4 mb-4">

                    <div class="flex items-center gap-4">

                        <!-- Product Image -->
                        <img
                            src="{{ asset('storage/'.$item->product->images->first()->name) }}"
                            alt="{{ $item->product->name }}"
                            class="w-20 h-20 object-cover rounded-lg"
                        >

                        <!-- Product Info -->
                        <div class="flex-1">

                            <h2 class="text-base font-semibold text-gray-900">
                                {{ $item->product->name }}
                            </h2>

                            <p class="text-sm text-gray-500 mt-1">
                                Quantity: {{ $item->quantity }}
                            </p>

                            <p class="text-sm font-medium text-gray-800 mt-1">
                                ₹{{ $item->price }}
                            </p>

                        </div>

                    </div>

                    <!-- Review Button -->
                    <div class="mt-4">

                        <a
                            href="{{route('product.review',$item->order_id)}}"
                            class="block text-center bg-blue-600 text-white
                                   font-semibold py-2.5 rounded-lg no-underline"
                        >
                            ⭐ Write a Review
                        </a>

                    </div>

                </div>

            @endforeach


            <p class="text-center text-sm text-gray-500 mt-6">
                Your feedback helps other customers make better decisions.
            </p>

        </div>

    </div>

</div>

@endsection