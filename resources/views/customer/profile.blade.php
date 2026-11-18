@extends('layouts.customer.customer-layout')

@section('title', 'SSSN | PROFILE')

@section('customerContent')

{{-- PAGE HEADER --}}
<section class="bg-[#fffdf9] border-b border-[#e8dccb]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <span class="text-xs uppercase tracking-[0.2em] text-[#9a846a]">
            Account
        </span>

        <h1 class="text-4xl font-bold mt-3 text-[#493825]">
            My Profile
        </h1>

        <p class="text-[#79654e] mt-2">
            Manage your account and personal information.
        </p>

    </div>
</section>


{{-- PROFILE CONTENT --}}
<section class="bg-[#faf7f2]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <div class="grid lg:grid-cols-3 gap-7">

            {{-- LEFT PROFILE CARD --}}
            <div class="lg:col-span-1">

                <div class="bg-white border border-[#e8dccb]
                            rounded-3xl p-7 text-center shadow-sm">

                    {{-- PROFILE IMAGE --}}
                    <div class="relative w-28 h-28 mx-auto">

                        @if(auth()->user()->profile_photo)

                            <img
                                src="{{ asset('profilePhoto/'.auth()->user()->id.'/'. auth()->user()->profile_photo) }}"
                                alt="Profile"
                                class="w-full h-full object-cover rounded-full
                                       border-4 border-[#f5efe6] shadow-md">

                        @else

                            <div class="w-full h-full rounded-full
                                        bg-[#493825] text-[#fffdf9]
                                        flex items-center justify-center
                                        text-4xl font-bold
                                        border-4 border-[#f5efe6] shadow-md">

                                {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}

                            </div>

                        @endif

                        <span class="absolute bottom-1 right-1
                                     w-7 h-7 rounded-full
                                     bg-green-500 border-4 border-white">
                        </span>

                    </div>


                    <h2 class="text-xl font-bold mt-5 text-[#493825]">
                        {{ auth()->user()->name }}
                    </h2>

                    <p class="text-sm text-[#8b7964] mt-1 break-all">
                        {{ auth()->user()->email }}
                    </p>


                    <a href="{{ route('profile.edit') }}"
                       class="flex items-center justify-center gap-2
                              w-full h-11 mt-6 rounded-xl
                              bg-[#493825] text-white
                              text-sm font-semibold
                              hover:bg-[#5c4630]
                              transition duration-300">

                        <i class="fa-regular fa-pen-to-square"></i>
                        Edit Profile

                    </a>

                </div>

            </div>


            {{-- RIGHT CONTENT --}}
            <div class="lg:col-span-2 space-y-6">


                {{-- PERSONAL INFORMATION --}}
                <div class="bg-white border border-[#e8dccb]
                            rounded-3xl p-6 sm:p-8 shadow-sm">

                    <div class="flex items-center justify-between">

                        <div>

                            <span class="text-xs uppercase
                                         tracking-[0.2em] text-[#9a846a]">
                                Personal
                            </span>

                            <h2 class="text-xl font-bold mt-1 text-[#493825]">
                                Personal Information
                            </h2>

                        </div>

                        <a href="{{ route('profile.edit') }}"
                           class="text-sm font-semibold text-[#79654e]
                                  hover:text-[#493825] hover:underline
                                  transition">
                            Edit
                        </a>

                    </div>


                    <div class="grid sm:grid-cols-2 gap-5 mt-7">

                        {{-- FULL NAME --}}
                        <div class="bg-[#faf7f2] border border-[#eee4d8]
                                    rounded-2xl p-5">

                            <p class="text-xs uppercase tracking-wider text-[#9a846a]">
                                Full Name
                            </p>

                            <p class="font-semibold mt-2 text-[#493825]">
                                {{ auth()->user()->name }}
                            </p>

                        </div>


                        {{-- EMAIL --}}
                        <div class="bg-[#faf7f2] border border-[#eee4d8]
                                    rounded-2xl p-5">

                            <p class="text-xs uppercase tracking-wider text-[#9a846a]">
                                Email Address
                            </p>

                            <p class="font-semibold mt-2 text-[#493825] break-all">
                                {{ auth()->user()->email }}
                            </p>

                        </div>


                        {{-- PHONE --}}
                        <div class="bg-[#faf7f2] border border-[#eee4d8]
                                    rounded-2xl p-5">

                            <p class="text-xs uppercase tracking-wider text-[#9a846a]">
                                Phone Number
                            </p>

                            <p class="font-semibold mt-2 text-[#493825]">
                                {{ auth()->user()->userInfo?->phone ?? 'Not added' }}
                            </p>

                        </div>


                        {{-- ZIP CODE --}}
                        <div class="bg-[#faf7f2] border border-[#eee4d8]
                                    rounded-2xl p-5">

                            <p class="text-xs uppercase tracking-wider text-[#9a846a]">
                                Zip Code
                            </p>

                            <p class="font-semibold mt-2 text-[#493825]">
                                {{ auth()->user()->userInfo?->zipcode ?? 'Not added' }}
                            </p>

                        </div>

                    </div>

                </div>


                {{-- DELIVERY ADDRESS --}}
                <div class="bg-white border border-[#e8dccb]
                            rounded-3xl p-6 sm:p-8 shadow-sm">

                    <div class="flex items-center justify-between">

                        <div>

                            <span class="text-xs uppercase
                                         tracking-[0.2em] text-[#9a846a]">
                                Address
                            </span>

                            <h2 class="text-xl font-bold mt-1 text-[#493825]">
                                Delivery Address
                            </h2>

                        </div>

                        <a href="{{ route('profile.edit') }}"
                           class="text-sm font-semibold text-[#79654e]
                                  hover:text-[#493825] hover:underline
                                  transition">
                            Edit
                        </a>

                    </div>


                    <div class="mt-6 bg-[#faf7f2] border border-[#eee4d8]
                                rounded-2xl p-5">

                        @if(auth()->user()->userInfo)

                            <div class="flex items-start gap-3">

                                <div class="w-10 h-10 shrink-0 rounded-xl
                                            bg-[#eee4d8] text-[#79654e]
                                            flex items-center justify-center">

                                    <i class="fa-solid fa-location-dot"></i>

                                </div>

                                <div>

                                    <p class="font-semibold text-[#493825]">
                                        {{ auth()->user()->name }}
                                    </p>

                                    <p class="text-sm text-[#79654e]
                                              leading-6 mt-2">

                                        {{ auth()->user()->userInfo->address ?: 'Address not added' }}, {{ auth()->user()->userInfo->city ?: '' }}, {{ auth()->user()->userInfo->state ?: '' }}, {{ auth()->user()->userInfo->zipcode ?: '' }} 

                                    </p>

                                    @if(auth()->user()->userInfo->landmark)

                                        <p class="text-sm text-[#79654e] mt-2">

                                            <span class="font-semibold text-[#493825]">
                                                Landmark:
                                            </span>

                                            {{ auth()->user()->userInfo->landmark }}

                                        </p>

                                    @endif

                                </div>

                            </div>

                        @else

                            <div class="flex items-center gap-3">

                                <i class="fa-solid fa-location-dot text-[#b49a7a] text-xl"></i>

                                <p class="text-sm text-[#9a846a]">
                                    No address added yet.
                                </p>

                            </div>

                        @endif

                    </div>

                </div>


                {{-- QUICK STATS SECTION REMAINS COMMENTED AS BEFORE --}}

            </div>

        </div>

    </div>
</section>

@endsection