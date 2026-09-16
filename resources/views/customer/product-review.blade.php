@extends('layouts.customer.customer-layout')
@section('customerContent')

<div class="min-h-screen bg-gray-100 py-10 px-4">

    <div class="max-w-2xl mx-auto">

        <div class="bg-white rounded-2xl shadow-sm p-8">

            <!-- Heading -->
            <div class="text-center mb-8">

                <div class="text-4xl mb-3">
                    ⭐
                </div>

                <h1 class="text-2xl font-bold text-gray-900">
                    Review Your Products
                </h1>

                <p class="text-gray-500 mt-2">
                    Tell us what you think about the products you purchased.
                </p>

            </div>


            <!-- Products -->
            @foreach($order->items as $item)

                <div class="border border-gray-200 rounded-xl p-5 mb-5">

                    <!-- Product Info -->
                    <div class="flex items-center gap-4">

                        <img
                            src="{{ $item->product->image }}"
                            alt="{{ $item->product->name }}"
                            class="w-24 h-24 rounded-lg object-cover"
                        >

                        <div>
                            <h2 class="text-lg font-semibold text-gray-900">
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


                    <!-- Review Form -->
                    <form
                        action="{{ route('product.review.store') }}"
                        method="POST"
                        class="mt-5"
                    >

                        @csrf

                        <input
                            type="hidden"
                            name="product_id"
                            value="{{ $item->product->id }}"
                        >

                        <input
                            type="hidden"
                            name="order_id"
                            value="{{ $order->id }}"
                        >


                        <!-- Rating -->
                        <div class="mb-4">

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Your Rating
                            </label>

                            <div class="flex gap-2">

                                @for($i = 1; $i <= 5; $i++)

                                    <label class="cursor-pointer">

                                        <input
                                            type="radio"
                                            name="rating"
                                            value="{{ $i }}"
                                            class="hidden peer"
                                            required
                                        >

                                        <span class="
                                            text-3xl
                                            text-gray-300
                                            peer-checked:text-yellow-400
                                        ">
                                            ★
                                        </span>

                                    </label>

                                @endfor

                            </div>

                        </div>


                        <!-- Review -->
                        <div class="mb-4">

                            <label
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                Your Review
                            </label>

                            <textarea
                                name="review"
                                rows="3"
                                required
                                placeholder="Write your review..."
                                class="w-full border border-gray-300 rounded-lg
                                       px-4 py-3 focus:outline-none
                                       focus:ring-2 focus:ring-blue-500"
                            ></textarea>

                        </div>


                        <!-- Submit -->
                        <button
                            type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700
                                   text-white font-semibold py-3 rounded-lg"
                        >
                            Submit Review
                        </button>

                    </form>

                </div>

            @endforeach

        </div>

    </div>

</div>

@endsection