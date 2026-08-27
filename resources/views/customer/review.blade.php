@extends('layouts.customer.customer-layout')

@section('title', 'SSSN | REVIEW')

@section('customerContent')




<section class="bg-white border-b">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8
                py-14 text-center">

        <span class="inline-flex px-4 py-2 rounded-full
                     bg-gray-100 text-gray-600
                     text-xs font-semibold uppercase
                     tracking-wider">

            Customer Feedback

        </span>

        <h1 class="text-4xl sm:text-5xl font-bold mt-5">
            What Our Customers
            <span class="text-gray-400">
                Say
            </span>
        </h1>

        <p class="max-w-2xl mx-auto text-gray-500
                  leading-7 mt-5">

            Real experiences from customers who shop
            with MyStore.

        </p>

    </div>

</section>



{{-- ========================================================= --}}
{{-- RATING SUMMARY --}}
{{-- ========================================================= --}}

<section class="max-w-7xl mx-auto
                px-4 sm:px-6 lg:px-8
                py-10">


    <div class="bg-white border border-gray-200
                rounded-3xl p-6 sm:p-8">


        <div class="grid lg:grid-cols-3 gap-10
                    items-center">


            {{-- Overall rating --}}
            <div class="text-center lg:border-r
                        lg:border-gray-200">

                <div class="text-6xl font-bold">
                    4.8
                </div>

                <div class="flex justify-center
                            gap-1 text-yellow-400
                            text-xl mt-3">

                    ★ ★ ★ ★ ★

                </div>

                <p class="text-sm text-gray-500 mt-3">
                    Based on 1,248 reviews
                </p>

                <div class="flex justify-center mt-4">

                    <span class="px-3 py-1 rounded-full
                                 bg-green-50 text-green-700
                                 text-xs font-semibold">

                        Excellent

                    </span>

                </div>

            </div>



            {{-- Rating bars --}}
            <div class="lg:col-span-2 space-y-4">

                {{-- 5 --}}
                <div class="flex items-center gap-3">

                    <span class="text-sm w-8">
                        5 ★
                    </span>

                    <div class="h-2.5 flex-1
                                bg-gray-100 rounded-full overflow-hidden">

                        <div class="h-full bg-black rounded-full"
                             style="width: 82%">
                        </div>

                    </div>

                    <span class="text-xs text-gray-500 w-10 text-right">
                        82%
                    </span>

                </div>


                {{-- 4 --}}
                <div class="flex items-center gap-3">

                    <span class="text-sm w-8">
                        4 ★
                    </span>

                    <div class="h-2.5 flex-1
                                bg-gray-100 rounded-full overflow-hidden">

                        <div class="h-full bg-gray-700 rounded-full"
                             style="width: 12%">
                        </div>

                    </div>

                    <span class="text-xs text-gray-500 w-10 text-right">
                        12%
                    </span>

                </div>


                {{-- 3 --}}
                <div class="flex items-center gap-3">

                    <span class="text-sm w-8">
                        3 ★
                    </span>

                    <div class="h-2.5 flex-1
                                bg-gray-100 rounded-full overflow-hidden">

                        <div class="h-full bg-gray-500 rounded-full"
                             style="width: 4%">
                        </div>

                    </div>

                    <span class="text-xs text-gray-500 w-10 text-right">
                        4%
                    </span>

                </div>


                {{-- 2 --}}
                <div class="flex items-center gap-3">

                    <span class="text-sm w-8">
                        2 ★
                    </span>

                    <div class="h-2.5 flex-1
                                bg-gray-100 rounded-full overflow-hidden">

                        <div class="h-full bg-gray-400 rounded-full"
                             style="width: 1%">
                        </div>

                    </div>

                    <span class="text-xs text-gray-500 w-10 text-right">
                        1%
                    </span>

                </div>


                {{-- 1 --}}
                <div class="flex items-center gap-3">

                    <span class="text-sm w-8">
                        1 ★
                    </span>

                    <div class="h-2.5 flex-1
                                bg-gray-100 rounded-full overflow-hidden">

                        <div class="h-full bg-gray-300 rounded-full"
                             style="width: 1%">
                        </div>

                    </div>

                    <span class="text-xs text-gray-500 w-10 text-right">
                        1%
                    </span>

                </div>

            </div>

        </div>

    </div>

</section>



{{-- ========================================================= --}}
{{-- FILTER BAR --}}
{{-- ========================================================= --}}

<section class="max-w-7xl mx-auto
                px-4 sm:px-6 lg:px-8">

    <div class="flex flex-col sm:flex-row
                items-center justify-between
                gap-4 mb-6">


        <div>

            <h2 class="text-xl font-bold">
                Customer Reviews
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                1,248 reviews
            </p>

        </div>


        <div class="flex items-center gap-3">

            <select
                class="h-11 px-4 rounded-xl
                       border border-gray-200
                       bg-white text-sm
                       font-medium outline-none">

                <option>Most Recent</option>
                <option>Highest Rated</option>
                <option>Lowest Rated</option>

            </select>


            <button
                onclick="document.getElementById('reviewModal').classList.remove('hidden')"
                class="h-11 px-5 rounded-xl
                       bg-black text-white
                       text-sm font-semibold">

                + Write Review

            </button>

        </div>

    </div>

</section>



{{-- ========================================================= --}}
{{-- REVIEWS --}}
{{-- ========================================================= --}}

<section class="max-w-7xl mx-auto
                px-4 sm:px-6 lg:px-8
                pb-14">


    <div class="grid lg:grid-cols-2 gap-5">


        {{-- Review 1 --}}
        <div class="bg-white border border-gray-200
                    rounded-2xl p-6">

            <div class="flex items-start
                        justify-between">


                <div class="flex items-center gap-3">

                    <div class="w-11 h-11 rounded-full
                                bg-gray-900 text-white
                                flex items-center
                                justify-center
                                font-semibold">

                        R

                    </div>


                    <div>

                        <div class="flex items-center gap-2">

                            <h3 class="font-semibold">
                                Rahul Sharma
                            </h3>

                            <span class="text-[10px]
                                         px-2 py-1 rounded-full
                                         bg-green-50
                                         text-green-700
                                         font-semibold">

                                ✓ Verified

                            </span>

                        </div>

                        <p class="text-xs text-gray-400 mt-1">
                            2 days ago
                        </p>

                    </div>

                </div>


                <div class="text-yellow-400">
                    ★★★★★
                </div>

            </div>


            <h4 class="font-semibold mt-5">
                Amazing quality and perfect fitting!
            </h4>


            <p class="text-sm text-gray-500
                      leading-6 mt-2">

                The quality is really good for the price.
                Fabric feels premium and the fitting is
                exactly as shown in the pictures.

            </p>


            <div class="flex gap-3 mt-5">

                <div class="w-20 h-20 rounded-xl
                            bg-gray-100 flex items-center
                            justify-center text-3xl">
                    👕
                </div>

                <div class="w-20 h-20 rounded-xl
                            bg-gray-100 flex items-center
                            justify-center text-3xl">
                    📦
                </div>

            </div>


            <div class="flex items-center
                        justify-between mt-5
                        pt-4 border-t">

                <span class="text-xs text-gray-400">
                    Was this helpful?
                </span>

                <div class="flex gap-2">

                    <button class="px-3 py-1.5
                                   border rounded-lg
                                   text-xs">
                        👍 Yes
                    </button>

                    <button class="px-3 py-1.5
                                   border rounded-lg
                                   text-xs">
                        👎 No
                    </button>

                </div>

            </div>

        </div>



        {{-- Review 2 --}}
        <div class="bg-white border border-gray-200
                    rounded-2xl p-6">

            <div class="flex items-start
                        justify-between">

                <div class="flex items-center gap-3">

                    <div class="w-11 h-11 rounded-full
                                bg-gray-200
                                flex items-center
                                justify-center
                                font-semibold">

                        A

                    </div>

                    <div>

                        <div class="flex items-center gap-2">

                            <h3 class="font-semibold">
                                Aman Verma
                            </h3>

                            <span class="text-[10px]
                                         px-2 py-1 rounded-full
                                         bg-green-50
                                         text-green-700
                                         font-semibold">

                                ✓ Verified

                            </span>

                        </div>

                        <p class="text-xs text-gray-400 mt-1">
                            5 days ago
                        </p>

                    </div>

                </div>

                <div class="text-yellow-400">
                    ★★★★★
                </div>

            </div>


            <h4 class="font-semibold mt-5">
                Worth every rupee
            </h4>


            <p class="text-sm text-gray-500
                      leading-6 mt-2">

                Delivery was quick and packaging was
                excellent. Product quality is much better
                than I expected. Definitely ordering again.

            </p>


            <div class="flex items-center
                        justify-between mt-5
                        pt-4 border-t">

                <span class="text-xs text-gray-400">
                    Was this helpful?
                </span>

                <div class="flex gap-2">

                    <button class="px-3 py-1.5
                                   border rounded-lg
                                   text-xs">
                        👍 Yes
                    </button>

                    <button class="px-3 py-1.5
                                   border rounded-lg
                                   text-xs">
                        👎 No
                    </button>

                </div>

            </div>

        </div>



        {{-- Review 3 --}}
        <div class="bg-white border border-gray-200
                    rounded-2xl p-6">

            <div class="flex items-start justify-between">

                <div class="flex items-center gap-3">

                    <div class="w-11 h-11 rounded-full
                                bg-gray-900 text-white
                                flex items-center
                                justify-center font-semibold">
                        P
                    </div>

                    <div>

                        <h3 class="font-semibold">
                            Priya Singh
                        </h3>

                        <p class="text-xs text-gray-400 mt-1">
                            1 week ago
                        </p>

                    </div>

                </div>

                <div class="text-yellow-400">
                    ★★★★☆
                </div>

            </div>


            <h4 class="font-semibold mt-5">
                Really nice product
            </h4>

            <p class="text-sm text-gray-500
                      leading-6 mt-2">

                Material is comfortable and looks premium.
                Size was slightly bigger than expected,
                but overall I really liked the product.

            </p>


            <div class="flex items-center
                        justify-between mt-5
                        pt-4 border-t">

                <span class="text-xs text-gray-400">
                    Was this helpful?
                </span>

                <div class="flex gap-2">

                    <button class="px-3 py-1.5
                                   border rounded-lg text-xs">
                        👍 Yes
                    </button>

                    <button class="px-3 py-1.5
                                   border rounded-lg text-xs">
                        👎 No
                    </button>

                </div>

            </div>

        </div>



        {{-- Review 4 --}}
        <div class="bg-white border border-gray-200
                    rounded-2xl p-6">

            <div class="flex items-start justify-between">

                <div class="flex items-center gap-3">

                    <div class="w-11 h-11 rounded-full
                                bg-gray-200
                                flex items-center
                                justify-center font-semibold">
                        S
                    </div>

                    <div>

                        <h3 class="font-semibold">
                            Saurabh Kumar
                        </h3>

                        <p class="text-xs text-gray-400 mt-1">
                            2 weeks ago
                        </p>

                    </div>

                </div>

                <div class="text-yellow-400">
                    ★★★★★
                </div>

            </div>


            <h4 class="font-semibold mt-5">
                Great shopping experience
            </h4>

            <p class="text-sm text-gray-500
                      leading-6 mt-2">

                Ordering was easy, checkout was smooth and
                delivery was on time. Product was exactly
                what I ordered.

            </p>


            <div class="flex items-center
                        justify-between mt-5
                        pt-4 border-t">

                <span class="text-xs text-gray-400">
                    Was this helpful?
                </span>

                <div class="flex gap-2">

                    <button class="px-3 py-1.5
                                   border rounded-lg text-xs">
                        👍 Yes
                    </button>

                    <button class="px-3 py-1.5
                                   border rounded-lg text-xs">
                        👎 No
                    </button>

                </div>

            </div>

        </div>

    </div>



    {{-- Pagination --}}
    <div class="flex justify-center
                items-center gap-2 mt-10">

        <button class="w-10 h-10 rounded-xl
                       border bg-white">
            ←
        </button>

        <button class="w-10 h-10 rounded-xl
                       bg-black text-white">
            1
        </button>

        <button class="w-10 h-10 rounded-xl
                       border bg-white">
            2
        </button>

        <button class="w-10 h-10 rounded-xl
                       border bg-white">
            3
        </button>

        <button class="w-10 h-10 rounded-xl
                       border bg-white">
            →
        </button>

    </div>

</section>



{{-- ========================================================= --}}
{{-- REVIEW MODAL --}}
{{-- ========================================================= --}}

<div id="reviewModal"
     class="hidden fixed inset-0 z-[100]
            bg-black/50 backdrop-blur-sm
            p-4 overflow-y-auto">


    <div class="min-h-full flex items-center
                justify-center">


        <div class="bg-white w-full max-w-lg
                    rounded-3xl p-6 sm:p-8">


            <div class="flex items-center
                        justify-between">

                <div>

                    <h2 class="text-xl font-bold">
                        Write a Review
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        Share your experience with us.
                    </p>

                </div>


                <button
                    onclick="document.getElementById('reviewModal').classList.add('hidden')"
                    class="w-9 h-9 rounded-full
                           bg-gray-100">
                    ✕
                </button>

            </div>


            <form action="{{ url('/reviews') }}"
                  method="POST"
                  class="mt-7 space-y-5">

                @csrf


                {{-- Rating --}}
                <div>

                    <label class="block text-sm
                                  font-semibold mb-2">
                        Your Rating
                    </label>

                    <div class="flex gap-2">

                        @for($i = 1; $i <= 5; $i++)

                            <label class="cursor-pointer">

                                <input
                                    type="radio"
                                    name="rating"
                                    value="{{ $i }}"
                                    class="hidden peer">

                                <span class="text-3xl
                                             text-gray-300
                                             peer-checked:text-yellow-400">
                                    ★
                                </span>

                            </label>

                        @endfor

                    </div>

                </div>


                {{-- Title --}}
                <div>

                    <label class="block text-sm
                                  font-semibold mb-2">
                        Review Title
                    </label>

                    <input
                        type="text"
                        name="title"
                        placeholder="What did you think?"
                        class="w-full h-12 px-4
                               border border-gray-200
                               rounded-xl outline-none
                               focus:border-black">

                </div>


                {{-- Review --}}
                <div>

                    <label class="block text-sm
                                  font-semibold mb-2">
                        Your Review
                    </label>

                    <textarea
                        name="review"
                        rows="5"
                        placeholder="Tell us about your experience..."
                        class="w-full px-4 py-3
                               border border-gray-200
                               rounded-xl outline-none
                               focus:border-black"></textarea>

                </div>


                {{-- Image --}}
                <div>

                    <label class="block text-sm
                                  font-semibold mb-2">
                        Add Photos
                    </label>

                    <input
                        type="file"
                        name="images[]"
                        multiple
                        class="w-full text-sm
                               border border-gray-200
                               rounded-xl p-3">

                </div>


                <button
                    type="submit"
                    class="w-full h-12
                           rounded-xl bg-black
                           text-white font-semibold">

                    Submit Review

                </button>

            </form>

        </div>

    </div>

</div>



@endsection