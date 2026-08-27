@extends('layouts.customer.customer-layout')

@section('title', 'SSSN | PROFILE')

@section('customerContent')



<section class="bg-white border-b">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <span class="text-xs uppercase tracking-widest text-gray-400">
            Account
        </span>

        <h1 class="text-4xl font-bold mt-3">
            My Profile
        </h1>

        <p class="text-gray-500 mt-2">
            Manage your account and personal information.
        </p>

    </div>

</section>


{{-- CONTENT --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <div class="grid lg:grid-cols-3 gap-7">

        {{-- LEFT PROFILE --}}
        <div class="lg:col-span-1">

            <div class="bg-white border border-gray-200
                        rounded-3xl p-7 text-center">

                {{-- IMAGE --}}
                <div class="relative w-28 h-28 mx-auto">

                    @if(auth()->user()->userInfo?->image)

                        <img
                            src="{{ asset('storage/' . auth()->user()->userInfo->image) }}"
                            alt="Profile"
                            class="w-full h-full object-cover
                                   rounded-full border-4 border-white
                                   shadow-lg">

                    @else

                        <div class="w-full h-full rounded-full
                                    bg-black text-white
                                    flex items-center justify-center
                                    text-4xl font-bold
                                    border-4 border-white shadow-lg">

                            {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}

                        </div>

                    @endif

                    <span class="absolute bottom-1 right-1
                                 w-7 h-7 rounded-full
                                 bg-green-500 border-4 border-white">
                    </span>

                </div>


                <h2 class="text-xl font-bold mt-5">
                    {{ auth()->user()->name }}
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    {{ auth()->user()->email }}
                </p>


                <a href="{{ route('profile.edit') }}"
                   class="flex items-center justify-center
                          w-full h-11 mt-6 rounded-xl
                          bg-black text-white
                          text-sm font-semibold
                          hover:bg-gray-800">

                    Edit Profile

                </a>

            </div>




        </div>


        {{-- RIGHT --}}
        <div class="lg:col-span-2 space-y-6">

            {{-- PERSONAL INFO --}}
            <div class="bg-white border border-gray-200
                        rounded-3xl p-6 sm:p-8">

                <div class="flex items-center justify-between">

                    <div>

                        <span class="text-xs uppercase
                                     tracking-widest text-gray-400">
                            Personal
                        </span>

                        <h2 class="text-xl font-bold mt-1">
                            Personal Information
                        </h2>

                    </div>

                    <a href="{{ route('profile.edit') }}"
                       class="text-sm font-semibold hover:underline">
                        Edit
                    </a>

                </div>


                <div class="grid sm:grid-cols-2 gap-5 mt-7">

                    <div class="bg-gray-50 rounded-2xl p-5">

                        <p class="text-xs text-gray-400">
                            Full Name
                        </p>

                        <p class="font-semibold mt-2">
                            {{ auth()->user()->name }}
                        </p>

                    </div>


                    <div class="bg-gray-50 rounded-2xl p-5">

                        <p class="text-xs text-gray-400">
                            Email Address
                        </p>

                        <p class="font-semibold mt-2 break-all">
                            {{ auth()->user()->email }}
                        </p>

                    </div>


                    <div class="bg-gray-50 rounded-2xl p-5">

                        <p class="text-xs text-gray-400">
                            Phone Number
                        </p>

                        <p class="font-semibold mt-2">
                            {{ auth()->user()->userInfo?->phone ?? 'Not added' }}
                        </p>

                    </div>


                    <div class="bg-gray-50 rounded-2xl p-5">

                        <p class="text-xs text-gray-400">
                            Zip Code
                        </p>

                        <p class="font-semibold mt-2">
                            {{ auth()->user()->userInfo?->zipcode ?? 'Not added' }}
                        </p>

                    </div>

                </div>

            </div>


            {{-- ADDRESS --}}
            <div class="bg-white border border-gray-200
                        rounded-3xl p-6 sm:p-8">

                <div class="flex items-center justify-between">

                    <div>

                        <span class="text-xs uppercase
                                     tracking-widest text-gray-400">
                            Address
                        </span>

                        <h2 class="text-xl font-bold mt-1">
                            Delivery Address
                        </h2>

                    </div>

                    <a href="{{ route('profile.edit') }}"
                       class="text-sm font-semibold hover:underline">
                        Edit
                    </a>

                </div>


                <div class="mt-6 bg-gray-50 rounded-2xl p-5">

                    @if(auth()->user()->userInfo)

                        <p class="font-semibold">
                            {{ auth()->user()->name }}
                        </p>

                        <p class="text-sm text-gray-500
                                  leading-6 mt-2">

                            {{ auth()->user()->userInfo->address ?: 'Address not added' }}

                        </p>

                        @if(auth()->user()->userInfo->landmark)
                            <p class="text-sm text-gray-500 mt-1">
                                Landmark:
                                {{ auth()->user()->userInfo->landmark }}
                            </p>
                        @endif

                    @else

                        <p class="text-sm text-gray-400">
                            No address added yet.
                        </p>

                    @endif

                </div>

            </div>


            {{-- QUICK STATS --}}
<!--             <div class="grid sm:grid-cols-3 gap-5">

                <div class="bg-black text-white rounded-3xl p-6">

                    <p class="text-xs text-gray-400">
                        Total Orders
                    </p>

                    <p class="text-3xl font-bold mt-3">
                        12
                    </p>

                    <p class="text-xs text-gray-400 mt-2">
                        Orders placed
                    </p>

                </div>


                <div class="bg-white border border-gray-200
                            rounded-3xl p-6">

                    <p class="text-xs text-gray-400">
                        Wishlist
                    </p>

                    <p class="text-3xl font-bold mt-3">
                        8
                    </p>

                    <p class="text-xs text-gray-400 mt-2">
                        Saved products
                    </p>

                </div>


                <div class="bg-white border border-gray-200
                            rounded-3xl p-6">

                    <p class="text-xs text-gray-400">
                        Reviews
                    </p>

                    <p class="text-3xl font-bold mt-3">
                        5
                    </p>

                    <p class="text-xs text-gray-400 mt-2">
                        Reviews given
                    </p>

                </div>

            </div> -->

        </div>

    </div>

</section>


@endsection