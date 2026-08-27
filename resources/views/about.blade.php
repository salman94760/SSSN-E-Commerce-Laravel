@extends('layouts.customer.customer-layout')

@section('title', 'SSSN | ABOUT')

@section('customerContent')

<section class="bg-white">

    <div class="max-w-7xl mx-auto
                px-4 sm:px-6 lg:px-8
                py-16 sm:py-24">

        <div class="grid lg:grid-cols-2
                    gap-12 lg:gap-20
                    items-center">


            {{-- LEFT --}}
            <div>

                <span class="inline-flex
                             px-4 py-2
                             rounded-full
                             bg-gray-100
                             text-xs font-semibold
                             uppercase tracking-widest">

                    About MyStore

                </span>


                <h1 class="text-4xl sm:text-5xl lg:text-6xl
                           font-bold
                           leading-tight
                           mt-6">

                    We believe shopping
                    should feel
                    <span class="text-gray-400">
                        effortless.
                    </span>

                </h1>


                <p class="text-gray-500
                          text-base sm:text-lg
                          leading-8
                          mt-6
                          max-w-xl">

                    MyStore is built around one simple idea:
                    make quality products accessible while
                    creating a shopping experience that feels
                    simple, personal and enjoyable.

                </p>


                <div class="flex flex-wrap gap-3 mt-8">

                    <a href="{{ url('/shop') }}"
                       class="inline-flex items-center
                              justify-center
                              px-6 py-3
                              rounded-xl
                              bg-black text-white
                              text-sm font-semibold
                              hover:bg-gray-800">

                        Explore Collection →

                    </a>

                    <a href="{{ url('/contact') }}"
                       class="inline-flex items-center
                              justify-center
                              px-6 py-3
                              rounded-xl
                              border border-gray-200
                              bg-white
                              text-sm font-semibold
                              hover:bg-gray-50">

                        Talk to Us

                    </a>

                </div>

            </div>


            {{-- RIGHT IMAGE --}}
            <div class="relative">

                <div class="rounded-[2rem]
                            overflow-hidden
                            aspect-[4/5]
                            bg-gray-100">

                    <img
                        src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=1000"
                        alt="MyStore"
                        class="w-full h-full
                               object-cover">

                </div>


                {{-- Floating Card --}}
                <div class="absolute
                            -bottom-6
                            -left-4 sm:-left-8
                            bg-white
                            rounded-2xl
                            shadow-xl
                            border border-gray-100
                            p-5
                            w-56">

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11
                                    rounded-xl
                                    bg-black text-white
                                    flex items-center
                                    justify-center
                                    text-lg">

                            ★

                        </div>

                        <div>

                            <p class="font-bold">
                                4.9/5
                            </p>

                            <p class="text-xs text-gray-400">
                                Customer Rating
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



{{-- ========================================================= --}}
{{-- STATS --}}
{{-- ========================================================= --}}

<section class="bg-black text-white">

    <div class="max-w-7xl mx-auto
                px-4 sm:px-6 lg:px-8
                py-14">

        <div class="grid grid-cols-2
                    lg:grid-cols-4
                    gap-8">

            <div>

                <p class="text-4xl font-bold">
                    10K+
                </p>

                <p class="text-sm text-gray-400 mt-2">
                    Happy Customers
                </p>

            </div>


            <div>

                <p class="text-4xl font-bold">
                    500+
                </p>

                <p class="text-sm text-gray-400 mt-2">
                    Products
                </p>

            </div>


            <div>

                <p class="text-4xl font-bold">
                    25+
                </p>

                <p class="text-sm text-gray-400 mt-2">
                    Cities Delivered
                </p>

            </div>


            <div>

                <p class="text-4xl font-bold">
                    99%
                </p>

                <p class="text-sm text-gray-400 mt-2">
                    Customer Satisfaction
                </p>

            </div>

        </div>

    </div>

</section>



{{-- ========================================================= --}}
{{-- OUR STORY --}}
{{-- ========================================================= --}}

<section class="bg-gray-50">

    <div class="max-w-7xl mx-auto
                px-4 sm:px-6 lg:px-8
                py-16 sm:py-24">

        <div class="grid lg:grid-cols-2
                    gap-12
                    items-center">


            {{-- IMAGE --}}
            <div class="rounded-[2rem]
                        overflow-hidden
                        h-[450px]
                        bg-gray-200">

                <img
                    src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=1000"
                    alt="Our Story"
                    class="w-full h-full
                           object-cover">

            </div>


            {{-- CONTENT --}}
            <div>

                <span class="text-xs uppercase
                             tracking-widest
                             text-gray-400">

                    Our Story

                </span>


                <h2 class="text-3xl sm:text-4xl
                           font-bold
                           mt-3">

                    Started with a simple idea,
                    built for real people.

                </h2>


                <div class="space-y-5
                            text-gray-500
                            leading-7
                            mt-6">

                    <p>

                        MyStore started with a simple goal:
                        create a place where customers could
                        discover products they actually love
                        without making online shopping
                        complicated.

                    </p>

                    <p>

                        From carefully selecting products to
                        creating an easy checkout experience,
                        every part of MyStore is designed with
                        the customer in mind.

                    </p>

                    <p>

                        We are constantly improving, listening
                        to customer feedback and adding products
                        that bring value to everyday life.

                    </p>

                </div>


                <div class="flex items-center
                            gap-4 mt-8">

                    <div class="w-12 h-12
                                rounded-full
                                bg-black text-white
                                flex items-center
                                justify-center
                                font-bold">

                        M

                    </div>

                    <div>

                        <p class="font-semibold">
                            The MyStore Team
                        </p>

                        <p class="text-xs text-gray-400">
                            Building better shopping experiences
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



{{-- ========================================================= --}}
{{-- VALUES --}}
{{-- ========================================================= --}}

<section class="bg-white">

    <div class="max-w-7xl mx-auto
                px-4 sm:px-6 lg:px-8
                py-16 sm:py-24">

        <div class="text-center max-w-2xl mx-auto">

            <span class="text-xs uppercase
                         tracking-widest
                         text-gray-400">

                What We Stand For

            </span>

            <h2 class="text-3xl sm:text-4xl
                       font-bold mt-3">

                Our Values

            </h2>

            <p class="text-gray-500
                      leading-7 mt-4">

                These principles guide everything we do,
                from product selection to customer support.

            </p>

        </div>


        <div class="grid md:grid-cols-2
                    lg:grid-cols-3
                    gap-5 mt-12">


            {{-- VALUE 1 --}}
            <div class="group
                        rounded-3xl
                        bg-gray-50
                        border border-gray-100
                        p-7
                        hover:bg-black
                        hover:text-white
                        transition">

                <div class="w-12 h-12
                            rounded-xl
                            bg-white
                            flex items-center
                            justify-center
                            text-xl
                            group-hover:bg-white">

                    ✦

                </div>

                <h3 class="text-xl
                           font-bold mt-6">

                    Quality First

                </h3>

                <p class="text-sm
                          text-gray-500
                          group-hover:text-gray-400
                          leading-6
                          mt-3">

                    We focus on products that offer
                    genuine quality, useful features
                    and lasting value.

                </p>

            </div>


            {{-- VALUE 2 --}}
            <div class="group
                        rounded-3xl
                        bg-gray-50
                        border border-gray-100
                        p-7
                        hover:bg-black
                        hover:text-white
                        transition">

                <div class="w-12 h-12
                            rounded-xl
                            bg-white
                            flex items-center
                            justify-center
                            text-xl">

                    ♡

                </div>

                <h3 class="text-xl font-bold mt-6">
                    Customer First
                </h3>

                <p class="text-sm
                          text-gray-500
                          group-hover:text-gray-400
                          leading-6 mt-3">

                    Every decision starts with one
                    question: how can we make the
                    customer experience better?

                </p>

            </div>


            {{-- VALUE 3 --}}
            <div class="group
                        rounded-3xl
                        bg-gray-50
                        border border-gray-100
                        p-7
                        hover:bg-black
                        hover:text-white
                        transition">

                <div class="w-12 h-12
                            rounded-xl
                            bg-white
                            flex items-center
                            justify-center
                            text-xl">

                    ⚡

                </div>

                <h3 class="text-xl font-bold mt-6">
                    Keep It Simple
                </h3>

                <p class="text-sm
                          text-gray-500
                          group-hover:text-gray-400
                          leading-6 mt-3">

                    From browsing to checkout,
                    we keep everything simple,
                    clear and hassle-free.

                </p>

            </div>


            {{-- VALUE 4 --}}
            <div class="group
                        rounded-3xl
                        bg-gray-50
                        border border-gray-100
                        p-7
                        hover:bg-black
                        hover:text-white
                        transition">

                <div class="w-12 h-12
                            rounded-xl
                            bg-white
                            flex items-center
                            justify-center
                            text-xl">

                    ♻

                </div>

                <h3 class="text-xl font-bold mt-6">
                    Responsible Choices
                </h3>

                <p class="text-sm
                          text-gray-500
                          group-hover:text-gray-400
                          leading-6 mt-3">

                    We continuously look for better
                    ways to reduce waste and make
                    responsible choices.

                </p>

            </div>


            {{-- VALUE 5 --}}
            <div class="group
                        rounded-3xl
                        bg-gray-50
                        border border-gray-100
                        p-7
                        hover:bg-black
                        hover:text-white
                        transition">

                <div class="w-12 h-12
                            rounded-xl
                            bg-white
                            flex items-center
                            justify-center
                            text-xl">

                    ◉

                </div>

                <h3 class="text-xl font-bold mt-6">
                    Transparency
                </h3>

                <p class="text-sm
                          text-gray-500
                          group-hover:text-gray-400
                          leading-6 mt-3">

                    Clear pricing, honest information
                    and straightforward communication
                    are important to us.

                </p>

            </div>


            {{-- VALUE 6 --}}
            <div class="group
                        rounded-3xl
                        bg-gray-50
                        border border-gray-100
                        p-7
                        hover:bg-black
                        hover:text-white
                        transition">

                <div class="w-12 h-12
                            rounded-xl
                            bg-white
                            flex items-center
                            justify-center
                            text-xl">

                    ↗

                </div>

                <h3 class="text-xl font-bold mt-6">
                    Always Improving
                </h3>

                <p class="text-sm
                          text-gray-500
                          group-hover:text-gray-400
                          leading-6 mt-3">

                    Your feedback helps us grow,
                    improve our service and build
                    a better store.

                </p>

            </div>

        </div>

    </div>

</section>



{{-- ========================================================= --}}
{{-- WHY CHOOSE US --}}
{{-- ========================================================= --}}

<section class="bg-gray-50">

    <div class="max-w-7xl mx-auto
                px-4 sm:px-6 lg:px-8
                py-16 sm:py-24">

        <div class="text-center">

            <span class="text-xs uppercase
                         tracking-widest
                         text-gray-400">

                Why MyStore?

            </span>

            <h2 class="text-3xl sm:text-4xl
                       font-bold mt-3">

                Shopping made better.

            </h2>

        </div>


        <div class="grid sm:grid-cols-2
                    lg:grid-cols-4
                    gap-5 mt-12">


            <div class="bg-white
                        rounded-3xl
                        p-7
                        border border-gray-100">

                <div class="text-3xl">
                    🚚
                </div>

                <h3 class="font-bold mt-5">
                    Fast Delivery
                </h3>

                <p class="text-sm
                          text-gray-500
                          leading-6 mt-2">

                    Quick and reliable delivery
                    right to your doorstep.

                </p>

            </div>


            <div class="bg-white
                        rounded-3xl
                        p-7
                        border border-gray-100">

                <div class="text-3xl">
                    🔒
                </div>

                <h3 class="font-bold mt-5">
                    Secure Payments
                </h3>

                <p class="text-sm
                          text-gray-500
                          leading-6 mt-2">

                    Safe and secure checkout
                    for every purchase.

                </p>

            </div>


            <div class="bg-white
                        rounded-3xl
                        p-7
                        border border-gray-100">

                <div class="text-3xl">
                    ↩
                </div>

                <h3 class="font-bold mt-5">
                    Easy Returns
                </h3>

                <p class="text-sm
                          text-gray-500
                          leading-6 mt-2">

                    Simple return process when
                    something isn't right.

                </p>

            </div>


            <div class="bg-white
                        rounded-3xl
                        p-7
                        border border-gray-100">

                <div class="text-3xl">
                    💬
                </div>

                <h3 class="font-bold mt-5">
                    Friendly Support
                </h3>

                <p class="text-sm
                          text-gray-500
                          leading-6 mt-2">

                    Our team is always ready
                    to help you.

                </p>

            </div>

        </div>

    </div>

</section>



{{-- ========================================================= --}}
{{-- CTA --}}
{{-- ========================================================= --}}

<section class="bg-black text-white">

    <div class="max-w-4xl mx-auto
                px-4 sm:px-6
                py-16 sm:py-20
                text-center">

        <span class="text-xs uppercase
                     tracking-widest
                     text-gray-500">

            Ready to Shop?

        </span>

        <h2 class="text-3xl sm:text-5xl
                   font-bold mt-4">

            Find something you'll love.

        </h2>

        <p class="text-gray-400
                  max-w-xl mx-auto
                  leading-7 mt-5">

            Explore our latest collection and
            discover products selected with you
            in mind.

        </p>

        <div class="flex flex-wrap
                    justify-center
                    gap-3 mt-8">

            <a href="{{ url('/shop') }}"
               class="px-7 py-3.5
                      rounded-xl
                      bg-white text-black
                      text-sm font-semibold
                      hover:bg-gray-100">

                Shop Now →

            </a>

            <a href="{{ url('/contact') }}"
               class="px-7 py-3.5
                      rounded-xl
                      border border-white/20
                      text-white
                      text-sm font-semibold
                      hover:bg-white/10">

                Contact Us

            </a>

        </div>

    </div>

</section>



@endsection