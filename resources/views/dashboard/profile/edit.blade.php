
@extends('layouts.admin.page')

@section('title', 'My Profile')

@section('adminPage')

@php
    $card = 'overflow-hidden rounded-[26px] border border-white/80 bg-white/65 shadow-[0_15px_45px_rgba(100,75,45,0.06)] backdrop-blur-2xl';

    $label = 'mb-2 block text-xs font-bold uppercase tracking-wide text-[#796a59]';

    $input = 'w-full rounded-xl border border-[#e8dccb] bg-white/80 px-4 py-3 text-sm text-[#5d4936] outline-none transition focus:border-[#a58a6d] focus:ring-2 focus:ring-[#e7d5bb]/50';
@endphp

<div class="min-h-screen bg-[#f8f5ef] p-4 sm:p-6 lg:p-8">

    <div class="mx-auto max-w-5xl space-y-6">

       

        @if(session('success'))
            <div class="rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-medium text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <form
            action="{{ route('admin.profile.update') }}"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-6"
        >
            @csrf
            @method('PUT')

            {{-- Profile Information --}}
            <div class="{{ $card }}">

                <div class="border-b border-[#e8dccb] bg-[#eee3d3]/30 px-6 py-5">
                    <h2 class="text-lg font-bold text-[#5d4936]">
                        Personal Information
                    </h2>
                    <p class="mt-1 text-xs text-[#a58a6d]">
                        Update your account information and profile picture.
                    </p>
                </div>

                <div class="space-y-6 p-6 sm:p-8">

                    {{-- Profile Photo --}}
                    <div class="flex flex-col gap-5 sm:flex-row sm:items-center">

                        <div class="flex h-24 w-24 shrink-0 items-center justify-center overflow-hidden rounded-2xl border-4 border-white bg-[#a58a6d] text-3xl font-bold text-white shadow-md">

                            @if($user->profile_photo)
                                <img
                                    src="{{ asset('storage/' . $user->profile_photo) }}"
                                    alt="Profile Photo"
                                    class="h-full w-full object-cover"
                                >
                            @else
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            @endif

                        </div>

                        <div class="flex-1">

                            <label class="{{ $label }}">
                                Profile Photo
                            </label>

                            <input
                                type="file"
                                name="profile_photo"
                                accept="image/jpeg,image/png,image/webp"
                                class="{{ $input }}"
                            >

                            <p class="mt-2 text-xs text-[#a58a6d]">
                                JPG, PNG or WEBP. Maximum 2 MB.
                            </p>

                            @error('profile_photo')
                                <p class="mt-1 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                    </div>

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                        <div>
                            <label for="name" class="{{ $label }}">
                                Full Name
                            </label>

                            <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name', $user->name) }}"
                                class="{{ $input }}"
                                required
                            >

                            @error('name')
                                <p class="mt-1 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="{{ $label }}">
                                Email Address
                            </label>

                            <input
                                type="email"
                                name="email"
                                id="email"
                                value="{{ old('email', $user->email) }}"
                                class="{{ $input }}"
                                required
                            >

                            @error('email')
                                <p class="mt-1 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                    </div>

                </div>

            </div>

            {{-- Company Information --}}
            <div class="{{ $card }}">

                <div class="border-b border-[#e8dccb] bg-[#eee3d3]/30 px-6 py-5">

                    <h2 class="text-lg font-bold text-[#5d4936]">
                        Company Information
                    </h2>

                    <p class="mt-1 text-xs text-[#a58a6d]">
                        Manage your company name and brand logo.
                    </p>

                </div>

                <div class="space-y-6 p-6 sm:p-8">

                    {{-- Company Logo --}}
                    <div class="flex flex-col gap-5 sm:flex-row sm:items-center">

                        <div class="flex h-28 w-28 shrink-0 items-center justify-center overflow-hidden rounded-2xl border border-[#e8dccb] bg-white p-3 shadow-sm">

                            @if($user->company_logo)
                                <img
                                    src="{{ asset('storage/' . $user->company_logo) }}"
                                    alt="Company Logo"
                                    class="h-full w-full object-contain"
                                >
                            @else
                                <span class="text-center text-xs font-bold text-[#a58a6d]">
                                    Company Logo
                                </span>
                            @endif

                        </div>

                        <div class="flex-1">

                            <label class="{{ $label }}">
                                Upload Company Logo
                            </label>

                            <input
                                type="file"
                                name="company_logo"
                                accept="image/jpeg,image/png,image/webp"
                                class="{{ $input }}"
                            >

                            <p class="mt-2 text-xs text-[#a58a6d]">
                                Recommended: square PNG or transparent WEBP, max 2 MB.
                            </p>

                            @error('company_logo')
                                <p class="mt-1 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                    </div>

                    <div>
                        <label for="company_name" class="{{ $label }}">
                            Company Name
                        </label>

                        <input
                            type="text"
                            name="company_name"
                            id="company_name"
                            value="{{ old('company_name', $user->company_name) }}"
                            placeholder="Enter your company name"
                            class="{{ $input }}"
                        >

                        @error('company_name')
                            <p class="mt-1 text-xs text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                </div>

            </div>

            {{-- Action Buttons --}}
            <div class="{{ $card }} flex flex-col-reverse gap-3 p-5 sm:flex-row sm:justify-end">

                <a
                    href="{{ url()->previous() }}"
                    class="inline-flex items-center justify-center rounded-xl border border-[#e8dccb] bg-white px-6 py-3 text-sm font-semibold text-[#6b5540] transition hover:bg-[#eee3d3]"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="rounded-xl bg-[#6b5540] px-8 py-3 text-sm font-semibold text-white transition hover:bg-[#4e3c2b]"
                >
                    Save Changes
                </button>

            </div>

        </form>

    </div>

</div>

@endsection
