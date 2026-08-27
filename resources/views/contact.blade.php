@extends('layouts.customer.customer-layout')

@section('title', 'SSSN | CONTACT')

@section('customerContent')

<section class="bg-white border-b">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8
                py-14 sm:py-16 text-center">

        <span class="inline-flex items-center px-4 py-2
                     rounded-full bg-gray-100
                     text-gray-600 text-xs
                     font-semibold uppercase tracking-wider">

            We're Here To Help

        </span>

        <h1 class="text-4xl sm:text-5xl font-bold mt-5">

            Let's Start a
            <span class="text-gray-400">
                Conversation
            </span>

        </h1>

        <p class="max-w-2xl mx-auto text-gray-500
                  leading-7 mt-5">

            Have a question about your order, product,
            delivery or anything else? Our team is here
            to help.

        </p>

    </div>

</section>



{{-- ========================================================= --}}
{{-- CONTACT CARDS --}}
{{-- ========================================================= --}}

<section class="max-w-7xl mx-auto
                px-4 sm:px-6 lg:px-8
                py-10">

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">


        {{-- Phone --}}
        <div class="bg-white border border-gray-200
                    rounded-2xl p-6
                    hover:shadow-lg
                    transition">

            <div class="w-12 h-12 rounded-xl
                        bg-gray-100 flex items-center
                        justify-center text-xl">

                ☎

            </div>

            <h3 class="font-bold text-lg mt-5">
                Call Us
            </h3>

            <p class="text-sm text-gray-500 mt-2">
                Monday to Saturday, 9 AM - 7 PM
            </p>

            <a href="tel:+919876543210"
               class="block font-semibold mt-4 hover:underline">

                +91 98765 43210

            </a>

        </div>


        {{-- Email --}}
        <div class="bg-white border border-gray-200
                    rounded-2xl p-6
                    hover:shadow-lg
                    transition">

            <div class="w-12 h-12 rounded-xl
                        bg-gray-100 flex items-center
                        justify-center text-xl">

                ✉

            </div>

            <h3 class="font-bold text-lg mt-5">
                Email Us
            </h3>

            <p class="text-sm text-gray-500 mt-2">
                We'll reply within 24 hours.
            </p>

            <a href="mailto:support@mystore.com"
               class="block font-semibold mt-4 hover:underline">

                support@mystore.com

            </a>

        </div>


        {{-- Address --}}
        <div class="bg-white border border-gray-200
                    rounded-2xl p-6
                    hover:shadow-lg
                    transition">

            <div class="w-12 h-12 rounded-xl
                        bg-gray-100 flex items-center
                        justify-center text-xl">

                📍

            </div>

            <h3 class="font-bold text-lg mt-5">
                Visit Us
            </h3>

            <p class="text-sm text-gray-500 mt-2">
                Monday to Friday, 10 AM - 6 PM
            </p>

            <p class="font-semibold mt-4">
                New Delhi, India
            </p>

        </div>

    </div>

</section>



{{-- ========================================================= --}}
{{-- CONTACT FORM + INFO --}}
{{-- ========================================================= --}}

<section class="max-w-7xl mx-auto
                px-4 sm:px-6 lg:px-8
                pb-14">

    <div class="grid lg:grid-cols-5 gap-8">


        {{-- LEFT INFO --}}
        <div class="lg:col-span-2
                    rounded-3xl bg-gray-950
                    text-white p-7 sm:p-9
                    relative overflow-hidden">


            <div class="relative z-10">

                <span class="text-xs uppercase
                             tracking-widest text-gray-400">
                    Get In Touch
                </span>

                <h2 class="text-3xl font-bold mt-4">
                    We'd love to hear from you.
                </h2>

                <p class="text-gray-400 text-sm
                          leading-6 mt-4">

                    Whether you have a question about our
                    products or need help with an order,
                    feel free to contact our team.

                </p>


                {{-- Contact info --}}
                <div class="space-y-6 mt-10">


                    <div class="flex gap-4">

                        <div class="w-10 h-10 rounded-xl
                                    bg-white/10
                                    flex items-center
                                    justify-center">
                            ✉
                        </div>

                        <div>

                            <p class="text-xs text-gray-500">
                                Email
                            </p>

                            <p class="text-sm font-medium mt-1">
                                support@mystore.com
                            </p>

                        </div>

                    </div>


                    <div class="flex gap-4">

                        <div class="w-10 h-10 rounded-xl
                                    bg-white/10
                                    flex items-center
                                    justify-center">
                            ☎
                        </div>

                        <div>

                            <p class="text-xs text-gray-500">
                                Phone
                            </p>

                            <p class="text-sm font-medium mt-1">
                                +91 98765 43210
                            </p>

                        </div>

                    </div>


                    <div class="flex gap-4">

                        <div class="w-10 h-10 rounded-xl
                                    bg-white/10
                                    flex items-center
                                    justify-center">
                            📍
                        </div>

                        <div>

                            <p class="text-xs text-gray-500">
                                Address
                            </p>

                            <p class="text-sm font-medium mt-1">
                                New Delhi, India
                            </p>

                        </div>

                    </div>


                    <div class="flex gap-4">

                        <div class="w-10 h-10 rounded-xl
                                    bg-white/10
                                    flex items-center
                                    justify-center">
                            🕐
                        </div>

                        <div>

                            <p class="text-xs text-gray-500">
                                Working Hours
                            </p>

                            <p class="text-sm font-medium mt-1">
                                Mon - Sat · 9 AM - 7 PM
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Social --}}
                <div class="border-t border-white/10
                            mt-10 pt-7">

                    <p class="text-xs text-gray-500">
                        Follow us
                    </p>

                    <div class="flex gap-3 mt-4">

                        <a href="#"
                           class="w-10 h-10 rounded-xl
                                  bg-white/10
                                  flex items-center
                                  justify-center
                                  hover:bg-white
                                  hover:text-black">
                            f
                        </a>

                        <a href="#"
                           class="w-10 h-10 rounded-xl
                                  bg-white/10
                                  flex items-center
                                  justify-center
                                  hover:bg-white
                                  hover:text-black">
                            ◎
                        </a>

                        <a href="#"
                           class="w-10 h-10 rounded-xl
                                  bg-white/10
                                  flex items-center
                                  justify-center
                                  hover:bg-white
                                  hover:text-black">
                            𝕏
                        </a>

                    </div>

                </div>

            </div>


            {{-- Decoration --}}
            <div class="absolute -right-20 -bottom-20
                        w-64 h-64 rounded-full
                        border border-white/10">
            </div>

            <div class="absolute -right-10 -bottom-10
                        w-40 h-40 rounded-full
                        border border-white/10">
            </div>

        </div>



        {{-- RIGHT FORM --}}
        <div class="lg:col-span-3
                    bg-white border border-gray-200
                    rounded-3xl p-6 sm:p-9">


            <div>

                <h2 class="text-2xl font-bold">
                    Send us a message
                </h2>

                <p class="text-sm text-gray-500 mt-2">
                    Fill in the form below and we'll get
                    back to you shortly.
                </p>

            </div>


            <form action="#"
                  method="POST"
                  class="mt-8 space-y-5">

                @csrf


                {{-- Name + Email --}}
                <div class="grid sm:grid-cols-2 gap-5">

                    <div>

                        <label class="block text-sm
                                      font-semibold mb-2">
                            Full Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', auth()->user()->name ?? '') }}"
                            placeholder="Enter your name"
                            class="w-full h-12 px-4
                                   rounded-xl
                                   border border-gray-200
                                   bg-gray-50
                                   focus:bg-white
                                   focus:border-black
                                   outline-none">

                        @error('name')
                            <p class="text-xs text-red-500 mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    <div>

                        <label class="block text-sm
                                      font-semibold mb-2">
                            Email Address
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email', auth()->user()->email ?? '') }}"
                            placeholder="you@example.com"
                            class="w-full h-12 px-4
                                   rounded-xl
                                   border border-gray-200
                                   bg-gray-50
                                   focus:bg-white
                                   focus:border-black
                                   outline-none">

                        @error('email')
                            <p class="text-xs text-red-500 mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                </div>



                {{-- Phone --}}
                <div>

                    <label class="block text-sm
                                  font-semibold mb-2">
                        Phone Number
                    </label>

                    <input
                        type="text"
                        name="phone"
                        value="{{ old('phone') }}"
                        placeholder="+91 98765 43210"
                        class="w-full h-12 px-4
                               rounded-xl
                               border border-gray-200
                               bg-gray-50
                               focus:bg-white
                               focus:border-black
                               outline-none">

                </div>



                {{-- Subject --}}
                <div>

                    <label class="block text-sm
                                  font-semibold mb-2">
                        Subject
                    </label>

                    <select
                        name="subject"
                        class="w-full h-12 px-4
                               rounded-xl
                               border border-gray-200
                               bg-gray-50
                               focus:bg-white
                               focus:border-black
                               outline-none">

                        <option value="">
                            Select a subject
                        </option>

                        <option value="order">
                            Order Related
                        </option>

                        <option value="product">
                            Product Information
                        </option>

                        <option value="delivery">
                            Delivery
                        </option>

                        <option value="refund">
                            Refund / Return
                        </option>

                        <option value="other">
                            Other
                        </option>

                    </select>

                </div>



                {{-- Message --}}
                <div>

                    <label class="block text-sm
                                  font-semibold mb-2">
                        Message
                    </label>

                    <textarea
                        name="message"
                        rows="6"
                        placeholder="Write your message..."
                        class="w-full px-4 py-3
                               rounded-xl
                               border border-gray-200
                               bg-gray-50
                               focus:bg-white
                               focus:border-black
                               outline-none resize-none">{{ old('message') }}</textarea>

                    @error('message')
                        <p class="text-xs text-red-500 mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>



                {{-- Submit --}}
                <button
                    type="submit"
                    class="w-full h-13
                           rounded-xl bg-black
                           text-white font-semibold
                           hover:bg-gray-800
                           transition">

                    Send Message →

                </button>


                <p class="text-xs text-gray-400 text-center">
                    We usually respond within 24 hours.
                </p>

            </form>

        </div>

    </div>

</section>



{{-- ========================================================= --}}
{{-- FAQ --}}
{{-- ========================================================= --}}

<section class="bg-white border-y">

    <div class="max-w-4xl mx-auto
                px-4 sm:px-6 lg:px-8
                py-14">


        <div class="text-center">

            <span class="text-xs uppercase
                         tracking-widest
                         text-gray-400">
                FAQ
            </span>

            <h2 class="text-3xl font-bold mt-3">
                Frequently Asked Questions
            </h2>

            <p class="text-sm text-gray-500 mt-3">
                Quick answers to common questions.
            </p>

        </div>


        <div class="mt-8 space-y-3">


            <details class="group border
                            border-gray-200
                            rounded-2xl p-5">

                <summary class="cursor-pointer
                                font-semibold
                                flex items-center
                                justify-between">

                    How can I track my order?

                    <span class="text-gray-400
                                 group-open:rotate-180
                                 transition">
                        ↓
                    </span>

                </summary>

                <p class="text-sm text-gray-500
                          leading-6 mt-4">

                    You can track your order from the
                    "My Orders" section in your account.

                </p>

            </details>


            <details class="group border
                            border-gray-200
                            rounded-2xl p-5">

                <summary class="cursor-pointer
                                font-semibold
                                flex items-center
                                justify-between">

                    How can I request a return?

                    <span class="text-gray-400
                                 group-open:rotate-180
                                 transition">
                        ↓
                    </span>

                </summary>

                <p class="text-sm text-gray-500
                          leading-6 mt-4">

                    Go to My Orders, select the order and
                    choose the return option.

                </p>

            </details>


            <details class="group border
                            border-gray-200
                            rounded-2xl p-5">

                <summary class="cursor-pointer
                                font-semibold
                                flex items-center
                                justify-between">

                    How long does delivery take?

                    <span class="text-gray-400
                                 group-open:rotate-180
                                 transition">
                        ↓
                    </span>

                </summary>

                <p class="text-sm text-gray-500
                          leading-6 mt-4">

                    Orders are generally delivered within
                    3-7 business days.

                </p>

            </details>


            <details class="group border
                            border-gray-200
                            rounded-2xl p-5">

                <summary class="cursor-pointer
                                font-semibold
                                flex items-center
                                justify-between">

                    Do you offer refunds?

                    <span class="text-gray-400
                                 group-open:rotate-180
                                 transition">
                        ↓
                    </span>

                </summary>

                <p class="text-sm text-gray-500
                          leading-6 mt-4">

                    Yes. Eligible products can be returned
                    according to our refund policy.

                </p>

            </details>

        </div>

    </div>

</section>



@endsection