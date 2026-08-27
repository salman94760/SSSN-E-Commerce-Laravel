@extends('layouts.admin.admin')
@section('content')

<div class="min-h-screen bg-slate-50 p-6 lg:p-8">

    {{-- Header --}}
    <div class="mb-7 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            

            <h1 class="mt-2 text-2xl font-bold text-slate-900">
                My Profile
            </h1>

            <p class="mt-1 text-sm text-slate-500">
                Manage your account information and security settings.
            </p>
        </div>

        <a href="{{ route('adminprofile.edit',$user->id) }}"
           class="inline-flex items-center justify-center rounded-xl bg-black
                  px-5 py-2.5 text-sm font-semibold text-white shadow-sm
                  transition hover:bg-black">
            Edit Profile
        </a>
    </div>


    {{-- Profile Card --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        {{-- Cover --}}
        <div class="relative h-32 bg-gradient-to-r from-blach">
            <div class="absolute -right-10 -top-16 h-48 w-48 rounded-full bg-white/10"></div>
            <div class="absolute right-28 -bottom-20 h-40 w-40 rounded-full bg-white/10"></div>
        </div>

        {{-- Profile Info --}}
        <div class="px-6 pb-6">
            <div class="-mt-14 flex flex-col gap-5 sm:flex-row sm:items-end">

                {{-- Avatar --}}
                <div class="relative shrink-0">
                    <div class="h-28 w-28 overflow-hidden rounded-2xl border-4
                                border-white bg-slate-100 shadow-lg">
                        <img src="{{ asset('storage/' . $user->userInfo?->image) }}"
                            
                            alt="Profile"
                            class="h-full w-full object-cover"
                        >
                    </div>

                    <span class="absolute bottom-1 right-1 h-5 w-5 rounded-full
                                 border-4 border-white bg-emerald-500"></span>
                </div>

                {{-- Name --}}
                <div class="min-w-0 flex-1 pb-1">
                    <div class="flex flex-wrap items-center gap-3">
                        <h2 class="text-2xl font-bold text-slate-900">
                            {{ auth()->user()->name }}
                        </h2>

                        <span class="inline-flex items-center gap-1.5 rounded-full
                                     bg-emerald-50 px-3 py-1 text-xs font-semibold
                                     text-emerald-600">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                            Active
                        </span>
                    </div>

                    <p class="mt-1 text-sm text-slate-500">
                        {{ auth()->user()->email }}
                    </p>
                </div>

                {{-- Role --}}
                <div class="hidden pb-1 sm:block">
                    <div class="rounded-xl border border-slate-200 bg-slate-50
                                px-4 py-2.5 text-center">
                        <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-400">
                            Account Type
                        </p>

                        <p class="mt-0.5 text-sm font-bold text-indigo-600">
                            Administrator
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>


    {{-- Information --}}
    <div class="mt-6 grid grid-cols-1 gap-6 xl:grid-cols-3">

        {{-- Personal Information --}}
        <div class="xl:col-span-2 rounded-2xl border border-slate-200
                    bg-white shadow-sm">

            <div class="border-b border-slate-100 px-6 py-5">
                <h3 class="text-base font-bold text-slate-900">
                    Personal Information
                </h3>

                <p class="mt-1 text-xs text-slate-500">
                    Your basic account information
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2">

                <div class="space-y-6 p-6">

                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                            Full Name
                        </p>

                        <p class="mt-2 text-sm font-semibold text-slate-800">
                            {{ auth()->user()->name }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                            Email Address
                        </p>

                        <p class="mt-2 break-all text-sm font-semibold text-slate-800">
                            {{ auth()->user()->email }}
                        </p>
                    </div>

                </div>

                <div class="space-y-6 border-t border-slate-100 p-6 sm:border-l sm:border-t-0">

                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                            Username
                        </p>

                        <p class="mt-2 text-sm font-semibold text-slate-800">
                            {{ auth()->user()->username ?? 'Not Available' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                            Phone Number
                        </p>

                        <p class="mt-2 text-sm font-semibold text-slate-800">
                            {{ $user->userInfo->phone ?? 'Not Available' }}
                        </p>
                    </div>

                </div>

            </div>
        </div>


        {{-- Account Overview --}}
        <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-100 px-6 py-5">
                <h3 class="text-base font-bold text-slate-900">
                    Account Overview
                </h3>

                <p class="mt-1 text-xs text-slate-500">
                    Account status and details
                </p>
            </div>

            <div class="space-y-5 p-6">

                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-slate-400">Role</p>
                        <p class="mt-1 text-sm font-semibold text-slate-800">
                            Administrator
                        </p>
                    </div>

                    <span class="rounded-lg bg-indigo-50 px-3 py-1 text-xs
                                 font-semibold text-indigo-600">
                        Admin
                    </span>
                </div>

                <div class="h-px bg-slate-100"></div>

                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-slate-400">Status</p>
                        <p class="mt-1 text-sm font-semibold text-emerald-600">
                            Active
                        </p>
                    </div>

                    <span class="h-2.5 w-2.5 rounded-full bg-emerald-500
                                 ring-4 ring-emerald-50"></span>
                </div>

                <div class="h-px bg-slate-100"></div>

                <div>
                    <p class="text-xs text-slate-400">
                        Member Since
                    </p>

                    <p class="mt-1 text-sm font-semibold text-slate-800">
                        {{ auth()->user()->created_at->format('d M Y') }}
                    </p>
                </div>

                <div>
                    <p class="text-xs text-slate-400">
                        Last Login
                    </p>

                    <p class="mt-1 text-sm font-semibold text-slate-800">
                        {{ auth()->user()->last_login_at
                            ? auth()->user()->last_login_at->format('d M Y, h:i A')
                            : 'Not Available' }}
                    </p>
                </div>

            </div>
        </div>

    </div>


    {{-- Security --}}
    <div class="mt-6 rounded-2xl border border-slate-200 bg-white shadow-sm">

        <div class="flex flex-col gap-5 px-6 py-5 sm:flex-row
                    sm:items-center sm:justify-between">

            <div>
                <h3 class="text-sm font-bold text-slate-900">
                    Password & Security
                </h3>

                <p class="mt-1 text-xs text-slate-500">
                    Keep your admin account secure with a strong password.
                </p>
            </div>

            <a href="#"
               class="inline-flex items-center justify-center rounded-xl
                      border border-slate-200 px-4 py-2.5 text-sm font-semibold
                      text-slate-700 transition hover:bg-slate-50">
                Change Password
            </a>

        </div>
    </div>

</div>

@endsection