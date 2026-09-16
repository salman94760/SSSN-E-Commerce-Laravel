@extends('layouts.customer.customer-layout')
@section('customerContent')

<div class="min-h-screen bg-gray-100 flex items-center justify-center px-4 py-10">

    <div class="max-w-lg w-full bg-white rounded-2xl shadow-sm p-10 text-center">

        <!-- Success Icon -->
        <div class="mx-auto mb-6 flex items-center justify-center
                    w-20 h-20 rounded-full bg-green-100">

            <svg
                class="w-10 h-10 text-green-600"
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

        </div>


        <!-- Heading -->
        <h1 class="text-3xl font-bold text-gray-900 mb-3">
            Thank You! 🎉
        </h1>


        <!-- Message -->
        <p class="text-gray-600 leading-7 mb-8">
            Thank you for taking the time to share your feedback.
            Your review helps us and other customers make better decisions.
        </p>


        <!-- Review Submitted -->
        <div class="bg-gray-50 rounded-xl p-5 mb-8">

            <p class="text-sm text-gray-500 mb-1">
                Your review has been
            </p>

            <p class="text-lg font-semibold text-green-600">
                Successfully Submitted ✓
            </p>

        </div>


        <!-- Continue Shopping -->
        <a
            href="{{ route('products.index') }}"
            class="inline-block w-full bg-blue-600 hover:bg-blue-700
                   text-white font-semibold py-3 px-6 rounded-xl
                   no-underline"
        >
            Continue Shopping
        </a>


        <!-- Home -->
        <a
            href="{{ url('/') }}"
            class="inline-block mt-4 text-sm text-gray-500
                   hover:text-gray-900"
        >
            Back to Home
        </a>

    </div>

</div>

@endsection