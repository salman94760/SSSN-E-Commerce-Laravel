
@extends('layouts.admin.page')

@section('title', 'Create User')

@section('adminPage')

@php
    $cardClass = 'overflow-hidden rounded-[26px] border border-white/80 bg-white/65 shadow-[0_15px_45px_rgba(100,75,45,0.06)] backdrop-blur-2xl';

    $labelClass = 'mb-2 block text-xs font-bold uppercase tracking-wide text-[#796a59]';

    $inputClass = 'w-full rounded-xl border border-[#e8dccb] bg-white/80 px-4 py-3 text-sm text-[#5d4936] outline-none transition duration-200 placeholder:text-[#b0a292] focus:border-[#a58a6d] focus:ring-2 focus:ring-[#e7d5bb]/50';
@endphp

<div class="min-h-screen bg-[#f8f5ef] p-4 sm:p-6 lg:p-8">

    <div class="mx-auto max-w-7xl space-y-6">

        {{-- Success Message --}}
        @if(session('success'))
            <div class="flex items-center justify-between rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-sm text-green-700">
                <span>{{ session('success') }}</span>

                <button type="button"
                        onclick="this.parentElement.remove()"
                        class="font-bold">
                    &times;
                </button>
            </div>
        @endif

        {{-- Validation Summary --}}
        @if($errors->any())
            <div class="rounded-xl border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-700">
                Please correct the highlighted fields.
            </div>
        @endif

        {{-- Main Card --}}
        <div class="{{ $cardClass }}">

            {{-- Card Header --}}
            <div class="border-b border-[#e8dccb]/60 bg-[#eee3d3]/30 px-6 py-5">

                <div class="flex flex-wrap items-center justify-between gap-3">

                    <div>
                        <h2 class="text-lg font-bold text-[#5d4936]">
                            User Information
                        </h2>

                        <p class="mt-1 text-xs text-[#a58a6d]">
                            Add user personal details, account role and profile photo.
                        </p>
                    </div>

                    <span class="inline-flex items-center gap-2 rounded-full bg-[#eee3d3] px-4 py-2 text-xs font-semibold text-[#6b5540]">
                        <span class="h-2 w-2 rounded-full bg-[#a58a6d]"></span>
                        New User
                    </span>

                </div>

            </div>

            {{-- Create User Form --}}
            <form action="{{ route('users.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="p-5 sm:p-8">

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                        {{-- Full Name --}}
                        <div>
                            <label for="name" class="{{ $labelClass }}">
                                Full Name
                                <span class="text-red-500">*</span>
                            </label>

                            <input type="text"
                                   name="name"
                                   id="name"
                                   value="{{ old('name') }}"
                                   placeholder="Enter full name"
                                   autocomplete="name"
                                   class="{{ $inputClass }}"
                                   required>

                            @error('name')
                                <p class="mt-2 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Email Address --}}
                        <div>
                            <label for="email" class="{{ $labelClass }}">
                                Email Address
                                <span class="text-red-500">*</span>
                            </label>

                            <input type="email"
                                   name="email"
                                   id="email"
                                   value="{{ old('email') }}"
                                   placeholder="Enter email address"
                                   autocomplete="email"
                                   class="{{ $inputClass }}"
                                   required>

                            @error('email')
                                <p class="mt-2 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Phone Number --}}
                        <div>
                            <label for="phone" class="{{ $labelClass }}">
                                Phone Number
                                <span class="text-red-500">*</span>
                            </label>

                            <input type="tel"
                                   name="phone"
                                   id="phone"
                                   value="{{ old('phone') }}"
                                   placeholder="Enter phone number"
                                   autocomplete="tel"
                                   class="{{ $inputClass }}"
                                   required>

                            @error('phone')
                                <p class="mt-2 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Zipcode --}}
                        <div>
                            <label for="zipcode" class="{{ $labelClass }}">
                                Zipcode
                                <span class="text-red-500">*</span>
                            </label>

                            <input type="text"
                                   name="zipcode"
                                   id="zipcode"
                                   value="{{ old('zipcode') }}"
                                   placeholder="Enter zipcode"
                                   autocomplete="postal-code"
                                   class="{{ $inputClass }}"
                                   required>

                            @error('zipcode')
                                <p class="mt-2 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Address --}}
                        <div class="md:col-span-2">
                            <label for="address" class="{{ $labelClass }}">
                                Address
                            </label>

                            <textarea name="address"
                                      id="address"
                                      rows="3"
                                      placeholder="Enter complete address"
                                      autocomplete="street-address"
                                      class="{{ $inputClass }} resize-none">{{ old('address') }}</textarea>

                            @error('address')
                                <p class="mt-2 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Landmark --}}
                        <div>
                            <label for="landmark" class="{{ $labelClass }}">
                                Landmark
                            </label>

                            <input type="text"
                                   name="landmark"
                                   id="landmark"
                                   value="{{ old('landmark') }}"
                                   placeholder="Enter nearby landmark"
                                   class="{{ $inputClass }}">

                            @error('landmark')
                                <p class="mt-2 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- User Role --}}
                        <div>
                            <label for="role" class="{{ $labelClass }}">
                                User Role
                                <span class="text-red-500">*</span>
                            </label>

                            <select name="role"
                                    id="role"
                                    class="{{ $inputClass }}"
                                    required>

                                <option value="">Select Role</option>

                                <option value="customer"
                                    @selected(old('role') == 'customer')>
                                    Customer
                                </option>

                                <option value="seller"
                                    @selected(old('role') == 'seller')>
                                    Seller
                                </option>

                                <option value="admin"
                                    @selected(old('role') == 'admin')>
                                    Admin
                                </option>

                            </select>

                            @error('role')
                                <p class="mt-2 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Profile Image --}}
                        <div class="md:col-span-2">

                            <label for="image" class="{{ $labelClass }}">
                                Profile Image
                                <span class="font-normal text-[#a58a6d]">
                                    (Optional)
                                </span>
                            </label>

                            <input type="file"
                                   name="image"
                                   id="image"
                                   accept="image/jpeg,image/png,image/webp"
                                   class="block w-full rounded-xl border border-[#e8dccb] bg-white/80 text-sm text-[#796a59] file:mr-4 file:border-0 file:bg-[#6b5540] file:px-4 file:py-3 file:text-sm file:font-semibold file:text-white hover:file:bg-[#4e3c2b]">

                            <p class="mt-2 text-xs text-[#a58a6d]">
                                Supported formats: JPG, PNG and WebP.
                            </p>

                            @error('image')
                                <p class="mt-2 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                    </div>

                    {{-- Image Preview Section --}}
                    <div class="mt-8 border-t border-[#e8dccb]/70 pt-7">

                        <h3 class="text-base font-bold text-[#5d4936]">
                            Profile Image Preview
                        </h3>

                        <p class="mt-1 text-xs text-[#a58a6d]">
                            Preview the selected profile image before creating the user.
                        </p>

                        <div class="mt-5 flex flex-wrap gap-6">

                            {{-- New Image Preview --}}
                            <div id="image-preview-wrapper" class="hidden">

                                <p class="{{ $labelClass }}">
                                    Selected Image
                                </p>

                                <div class="rounded-2xl border border-[#e8dccb] bg-[#eee3d3]/30 p-2">

                                    <img id="image-preview"
                                         alt="New User Image"
                                         class="h-36 w-36 rounded-xl object-cover">

                                </div>

                            </div>

                            {{-- No Image Message --}}
                            <div id="no-image-message"
                                 class="flex h-36 w-36 items-center justify-center rounded-2xl border border-dashed border-[#e8dccb] bg-[#eee3d3]/30 text-center text-xs text-[#938778]">

                                No image selected

                            </div>

                        </div>

                    </div>

                </div>

                {{-- Footer Actions --}}
                <div class="flex flex-col-reverse gap-3 border-t border-[#e8dccb]/70 bg-[#eee3d3]/25 px-6 py-5 sm:flex-row sm:items-center sm:justify-end">

                    <a href="{{ route('users.index') }}"
                       class="inline-flex items-center justify-center rounded-xl border border-[#e8dccb] bg-white/80 px-6 py-3 text-sm font-semibold text-[#6b5540] transition duration-300 hover:bg-[#eee3d3]">
                        Cancel
                    </a>

                    <button type="submit"
                            class="inline-flex items-center justify-center rounded-xl bg-[#6b5540] px-6 py-3 text-sm font-semibold text-white transition duration-300 hover:-translate-y-0.5 hover:bg-[#4e3c2b]">

                        Create User

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

{{-- Image Preview Script --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    const imageInput = document.getElementById('image');
    const previewWrapper = document.getElementById('image-preview-wrapper');
    const previewImage = document.getElementById('image-preview');
    const noImageMessage = document.getElementById('no-image-message');

    let currentImageUrl = null;

    imageInput.addEventListener('change', function () {

        const file = this.files[0];

        if (currentImageUrl) {
            URL.revokeObjectURL(currentImageUrl);
            currentImageUrl = null;
        }

        if (!file || !file.type.startsWith('image/')) {

            previewWrapper.classList.add('hidden');
            previewImage.removeAttribute('src');
            noImageMessage.classList.remove('hidden');

            return;
        }

        currentImageUrl = URL.createObjectURL(file);

        previewImage.src = currentImageUrl;
        previewWrapper.classList.remove('hidden');
        noImageMessage.classList.add('hidden');

    });

    window.addEventListener('beforeunload', function () {
        if (currentImageUrl) {
            URL.revokeObjectURL(currentImageUrl);
        }
    });

});
</script>

@endsection
