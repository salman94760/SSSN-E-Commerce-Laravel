@extends('layouts.admin.admin')

@section('content')

<div class="mx-auto max-w-5xl">

    {{-- Page Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">
            Website Settings
        </h1>

        <p class="mt-1 text-sm text-gray-500">
            Manage your company information, logo and website details.
        </p>
    </div>


    {{-- Success Message --}}
    @if(session('success'))
        <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm font-medium text-green-700">
            {{ session('success') }}
        </div>
    @endif





    <form action="{{route('company.store')}}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
 


        {{-- Company Information --}}
        <div class="rounded-xl border border-gray-200 bg-white shadow-sm">

            <div class="border-b border-gray-200 px-6 py-5">
                <h2 class="text-lg font-semibold text-gray-900">
                    Company Information
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Basic information about your company.
                </p>
            </div>


            <div class="grid grid-cols-1 gap-6 p-6 md:grid-cols-2">

                {{-- Company Name --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Company Name <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        name="company_name"
                        value="{{ old('company_name', $companyDetail->company_name ?? '') }}"
                        placeholder="Enter company name"
                        class="w-full rounded-lg border-gray-300 px-4 py-2.5
                               text-sm shadow-sm
                               focus:border-indigo-500
                               focus:ring-indigo-500">
                    @error('company_name')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                    @enderror
                </div>


                {{-- Email --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Company Email <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="email"
                        name="company_email"
                        value="{{ old('company_email', $companyDetail->company_email ?? '') }}"
                        placeholder="company@example.com"
                        class="w-full rounded-lg border-gray-300 px-4 py-2.5
                               text-sm shadow-sm
                               focus:border-indigo-500
                               focus:ring-indigo-500">
                                @error('company_email')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                    @enderror
                </div>


                {{-- Phone --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Phone Number <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        name="phone"
                        value="{{ old('phone', $companyDetail->phone ?? '') }}"
                        placeholder="+91 98765 43210"
                        class="w-full rounded-lg border-gray-300 px-4 py-2.5
                               text-sm shadow-sm
                               focus:border-indigo-500
                               focus:ring-indigo-500">
                                @error('phone')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                    @enderror
                </div>


                {{-- Website --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Website URL <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="url"
                        name="website"
                        value="{{ old('website', $companyDetail->website ?? '') }}"
                        placeholder="https://example.com"
                        class="w-full rounded-lg border-gray-300 px-4 py-2.5
                               text-sm shadow-sm
                               focus:border-indigo-500
                               focus:ring-indigo-500">
                                @error('website')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                    @enderror
                </div>


                {{-- Address --}}
                <div class="md:col-span-2">
                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Company Address <span class="text-red-500">*</span>
                    </label>

                    <textarea
                        name="address"
                        rows="3"
                        placeholder="Enter company address"
                        class="w-full rounded-lg border-gray-300 px-4 py-2.5
                               text-sm shadow-sm
                               focus:border-indigo-500
                               focus:ring-indigo-500">{{ old('address', $companyDetail->address ?? '') }}</textarea>
                                @error('address')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

            </div>

        </div>


        {{-- Logo & Branding --}}
        <div class="mt-6 rounded-xl border border-gray-200 bg-white shadow-sm">

            <div class="border-b border-gray-200 px-6 py-5">
                <h2 class="text-lg font-semibold text-gray-900">
                    Logo & Branding
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Upload your company logo.
                </p>
            </div>


            <div class="p-6">

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                    {{-- Current Logo --}}
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-700">
                            Current Logo
                        </p>

                        <div class="flex h-40 items-center justify-center rounded-xl border border-gray-200 bg-gray-50">

                            @if(!empty($companyDetail->logo))
                                <img
                                    src="{{ asset('logo/' . $companyDetail->logo) }}"
                                    alt="Company Logo"
                                    class="max-h-32 max-w-[220px] object-contain">
                            @else
                                <span class="text-sm text-gray-400">
                                    No logo uploaded
                                </span>
                            @endif

                        </div>
                    </div>


                    {{-- Upload New Logo --}}
                    <div>
                        <label class="mb-2 block text-sm font-medium text-gray-700">
                            Upload New Logo
                        </label>

                        <label
                            for="logo"
                            class="flex h-40 cursor-pointer flex-col items-center justify-center
                                   rounded-xl border-2 border-dashed border-gray-300
                                   bg-gray-50 text-center
                                   transition hover:border-indigo-500 hover:bg-indigo-50">

                            <svg
                                class="mb-3 h-8 w-8 text-gray-400"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5.002 5.002 0 0116.9 6H17a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v9"/>

                            </svg>

                            <span class="text-sm font-medium text-gray-700">
                                Click to upload
                            </span>

                            <span class="mt-1 text-xs text-gray-500">
                                PNG, JPG, JPEG or SVG
                            </span>

                            <input
                                id="logo"
                                name="logo"
                                type="file"
                                accept=".png,.jpg,.jpeg,.svg"
                                class="hidden">
                        </label>
                    </div>

                </div>

            </div>

        </div>


        {{-- Social Media --}}
        <div class="mt-6 rounded-xl border border-gray-200 bg-white shadow-sm">

            <div class="border-b border-gray-200 px-6 py-5">
                <h2 class="text-lg font-semibold text-gray-900">
                    Social Media
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Add your social media profile links.
                </p>
            </div>


            <div class="grid grid-cols-1 gap-6 p-6 md:grid-cols-2">

                {{-- Facebook --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Facebook
                    </label>

                    <input
                        type="url"
                        name="facebook"
                        value="{{ old('facebook', $companyDetail->facebook ?? '') }}"
                        placeholder="https://facebook.com/..."
                        class="w-full rounded-lg border-gray-300 px-4 py-2.5 text-sm
                               focus:border-indigo-500 focus:ring-indigo-500">
                </div>


                {{-- Instagram --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Instagram
                    </label>

                    <input
                        type="url"
                        name="instagram"
                        value="{{ old('instagram', $companyDetail->instagram ?? '') }}"
                        placeholder="https://instagram.com/..."
                        class="w-full rounded-lg border-gray-300 px-4 py-2.5 text-sm
                               focus:border-indigo-500 focus:ring-indigo-500">
                </div>


                {{-- YouTube --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        YouTube
                    </label>

                    <input
                        type="url"
                        name="youtube"
                        value="{{ old('youtube', $companyDetail->youtube ?? '') }}"
                        placeholder="https://youtube.com/..."
                        class="w-full rounded-lg border-gray-300 px-4 py-2.5 text-sm
                               focus:border-indigo-500 focus:ring-indigo-500">
                </div>


                {{-- WhatsApp --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        WhatsApp
                    </label>

                    <input
                        type="text"
                        name="whatsapp"
                        value="{{ old('whatsapp', $companyDetail->whatsapp ?? '') }}"
                        placeholder="+91 98765 43210"
                        class="w-full rounded-lg border-gray-300 px-4 py-2.5 text-sm
                               focus:border-indigo-500 focus:ring-indigo-500">
                </div>

            </div>

        </div>


        {{-- Save Button --}}
        <div class="mt-6 flex justify-end">

            <button
                type="submit"
                class="rounded-lg bg-black px-6 py-2.5
                       text-sm font-semibold text-white
                       shadow-sm transition
                       hover:bg-black
                       focus:outline-none
                       focus:ring-2
                       focus:ring-black
                       focus:ring-offset-2">

                Save Changes

            </button>

        </div>

    </form>

</div>

@endsection