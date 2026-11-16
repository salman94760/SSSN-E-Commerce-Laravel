
@extends('layouts.admin.page')

@section('title', 'Create Seller')

@section('adminPage')

@php
    $cardClass = 'overflow-hidden rounded-[26px] border border-white/80 bg-white/65 shadow-[0_15px_45px_rgba(100,75,45,0.06)] backdrop-blur-2xl';

    $labelClass = 'mb-2 block text-xs font-bold uppercase tracking-wide text-[#796a59]';

    $inputClass = 'w-full rounded-xl border border-[#e8dccb] bg-white/80 px-4 py-3 text-sm text-[#5d4936] outline-none transition duration-200 placeholder:text-[#b0a292] focus:border-[#a58a6d] focus:ring-2 focus:ring-[#e7d5bb]/50';

    $oldCompanies = old('companies', [
        ['company_name' => '']
    ]);
@endphp

<div class="min-h-screen bg-[#f8f5ef] p-4 sm:p-6 lg:p-8">

    <div class="mx-auto max-w-7xl space-y-6">

        

        {{-- Success Message --}}
        @if(session('success'))
            <div class="rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-sm text-green-700">
                {{ session('success') }}
            </div>
        @endif

        {{-- Validation Errors --}}
        @if($errors->any())
            <div class="rounded-xl border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-700">
                <p class="font-semibold">
                    Please correct the following errors:
                </p>

                <ul class="mt-2 list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('sellers.store') }}"
              method="POST"
              enctype="multipart/form-data"
              id="sellerForm">

            @csrf

            {{-- SELLER INFORMATION --}}
            <div class="{{ $cardClass }}">

                <div class="border-b border-[#e8dccb]/60 bg-[#eee3d3]/30 px-6 py-5">

                    <div class="flex items-center justify-between gap-3">

                        <div>
                            <h2 class="text-lg font-bold text-[#5d4936]">
                                Seller Information
                            </h2>

                            <p class="mt-1 text-xs text-[#a58a6d]">
                                Enter seller personal and account details.
                            </p>
                        </div>

                        <span class="rounded-full bg-[#eee3d3] px-4 py-2 text-xs font-semibold text-[#6b5540]">
                            New Seller
                        </span>

                    </div>

                </div>

                <div class="p-5 sm:p-8">

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                        {{-- Full Name --}}
                        <div>
                            <label class="{{ $labelClass }}">
                                Full Name *
                            </label>

                            <input type="text"
                                   name="name"
                                   value="{{ old('name') }}"
                                   placeholder="Enter seller name"
                                   autocomplete="name"
                                   class="{{ $inputClass }}"
                                   required>
                        </div>

                        {{-- Email --}}
                        <div>
                            <label class="{{ $labelClass }}">
                                Email Address *
                            </label>

                            <input type="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   placeholder="Enter email address"
                                   autocomplete="email"
                                   class="{{ $inputClass }}"
                                   required>
                        </div>

                        {{-- Phone --}}
                        <div>
                            <label class="{{ $labelClass }}">
                                Phone Number *
                            </label>

                            <input type="tel"
                                   name="phone"
                                   value="{{ old('phone') }}"
                                   placeholder="Enter phone number"
                                   autocomplete="tel"
                                   class="{{ $inputClass }}"
                                   required>
                        </div>

                        {{-- Zipcode --}}
                        <div>
                            <label class="{{ $labelClass }}">
                                Zipcode *
                            </label>

                            <input type="text"
                                   name="zipcode"
                                   value="{{ old('zipcode') }}"
                                   placeholder="Enter zipcode"
                                   autocomplete="postal-code"
                                   class="{{ $inputClass }}"
                                   required>
                        </div>

                        {{-- Address --}}
                        <div class="md:col-span-2">
                            <label class="{{ $labelClass }}">
                                Address
                            </label>

                            <textarea name="address"
                                      rows="3"
                                      placeholder="Enter complete address"
                                      autocomplete="street-address"
                                      class="{{ $inputClass }} resize-none">{{ old('address') }}</textarea>
                        </div>

                        {{-- Landmark --}}
                        <div>
                            <label class="{{ $labelClass }}">
                                Landmark
                            </label>

                            <input type="text"
                                   name="landmark"
                                   value="{{ old('landmark') }}"
                                   placeholder="Enter landmark"
                                   class="{{ $inputClass }}">
                        </div>

                        {{-- Password --}}
                        <div>
                            <label class="{{ $labelClass }}">
                                Password *
                            </label>

                            <input type="password"
                                   name="password"
                                   placeholder="Enter password"
                                   autocomplete="new-password"
                                   minlength="8"
                                   class="{{ $inputClass }}"
                                   required>
                        </div>

                        {{-- Confirm Password --}}
                        <div>
                            <label class="{{ $labelClass }}">
                                Confirm Password *
                            </label>

                            <input type="password"
                                   name="password_confirmation"
                                   placeholder="Confirm password"
                                   autocomplete="new-password"
                                   minlength="8"
                                   class="{{ $inputClass }}"
                                   required>
                        </div>

                        {{-- Profile Image --}}
                        <div class="md:col-span-2">

                            <label class="{{ $labelClass }}">
                                Seller Profile Image
                            </label>

                            <input type="file"
                                   name="image"
                                   id="image"
                                   accept="image/jpeg,image/png,image/webp"
                                   class="block w-full rounded-xl border border-[#e8dccb] bg-white/80 text-sm text-[#796a59] file:mr-4 file:border-0 file:bg-[#6b5540] file:px-4 file:py-3 file:text-sm file:font-semibold file:text-white hover:file:bg-[#4e3c2b]">

                            <div id="profilePreviewWrapper"
                                 class="mt-4 hidden">

                                <img id="profilePreview"
                                     alt="Seller profile preview"
                                     class="h-32 w-32 rounded-xl border border-[#e8dccb] object-cover">

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            {{-- MULTIPLE COMPANIES --}}
            <div class="{{ $cardClass }} mt-6">

                <div class="border-b border-[#e8dccb]/60 bg-[#eee3d3]/30 px-6 py-5">

                    <div class="flex flex-wrap items-center justify-between gap-4">

                        <div>
                            <h2 class="text-lg font-bold text-[#5d4936]">
                                Seller Companies
                            </h2>

                            <p class="mt-1 text-xs text-[#a58a6d]">
                                Add multiple companies under this seller.
                            </p>
                        </div>

                        <button type="button"
                                id="addCompanyBtn"
                                class="rounded-xl bg-[#6b5540] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#4e3c2b]">

                            + Add Company

                        </button>

                    </div>

                </div>

                <div class="p-5 sm:p-8">

                    <div id="companiesContainer" class="space-y-5">

                        @foreach($oldCompanies as $index => $company)

                            <div class="company-card rounded-2xl border border-[#e8dccb] bg-[#eee3d3]/20 p-5 sm:p-6"
                                 data-index="{{ $index }}">

                                <div class="mb-5 flex items-center justify-between gap-3">

                                    <h3 class="company-title text-base font-bold text-[#5d4936]">
                                        Company {{ $loop->iteration }}
                                    </h3>

                                    <button type="button"
                                            class="remove-company rounded-xl border border-red-200 bg-red-50 px-4 py-2 text-xs font-semibold text-red-600 hover:bg-red-100">
                                        Remove
                                    </button>

                                </div>

                                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                                    <div>
                                        <label class="{{ $labelClass }}">
                                            Company Name *
                                        </label>

                                        <input type="text"
                                               name="companies[{{ $index }}][company_name]"
                                               value="{{ $company['company_name'] ?? '' }}"
                                               placeholder="Enter company name"
                                               class="{{ $inputClass }}"
                                               required>
                                    </div>

                                    <div>
                                        <label class="{{ $labelClass }}">
                                            Company Logo
                                        </label>

                                        <input type="file"
                                               name="companies[{{ $index }}][logo]"
                                               accept="image/jpeg,image/png,image/webp"
                                               class="company-logo-input block w-full rounded-xl border border-[#e8dccb] bg-white/80 text-sm text-[#796a59] file:mr-4 file:border-0 file:bg-[#6b5540] file:px-4 file:py-3 file:text-sm file:font-semibold file:text-white hover:file:bg-[#4e3c2b]">

                                        <p class="mt-2 text-xs text-[#a58a6d]">
                                            JPG, PNG or WebP. Maximum 2MB.
                                        </p>
                                    </div>

                                </div>

                                <div class="company-preview mt-5 hidden">
                                    <p class="{{ $labelClass }}">
                                        Company Logo Preview
                                    </p>

                                    <img alt="Company logo preview"
                                         class="company-preview-image h-28 w-28 rounded-xl border border-[#e8dccb] bg-white object-contain p-2">
                                </div>

                            </div>

                        @endforeach

                    </div>

                    <div class="mt-6">

                        <button type="button"
                                id="addCompanyBottom"
                                class="w-full rounded-xl border-2 border-dashed border-[#d8c6b0] bg-[#eee3d3]/20 px-5 py-4 text-sm font-semibold text-[#6b5540] transition hover:bg-[#eee3d3]/60">

                            + Add Another Company

                        </button>

                    </div>

                </div>

            </div>

            {{-- FOOTER --}}
            <div class="mt-6 flex flex-col-reverse gap-3 rounded-[26px] border border-white/80 bg-white/65 px-6 py-5 shadow-sm sm:flex-row sm:items-center sm:justify-end">

                <a href="{{ route('users.index') }}"
                   class="inline-flex items-center justify-center rounded-xl border border-[#e8dccb] bg-white/80 px-6 py-3 text-sm font-semibold text-[#6b5540] hover:bg-[#eee3d3]">
                    Cancel
                </a>

                <button type="submit"
                        id="submitSeller"
                        class="inline-flex items-center justify-center rounded-xl bg-[#6b5540] px-8 py-3 text-sm font-semibold text-white transition hover:bg-[#4e3c2b]">

                    Create Seller

                </button>

            </div>

        </form>

    </div>

</div>

{{-- COMPANY CARD TEMPLATE --}}
<template id="companyTemplate">

    <div class="company-card rounded-2xl border border-[#e8dccb] bg-[#eee3d3]/20 p-5 sm:p-6">

        <div class="mb-5 flex items-center justify-between gap-3">

            <h3 class="company-title text-base font-bold text-[#5d4936]">
                Company
            </h3>

            <button type="button"
                    class="remove-company rounded-xl border border-red-200 bg-red-50 px-4 py-2 text-xs font-semibold text-red-600 hover:bg-red-100">
                Remove
            </button>

        </div>

        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

            <div>
                <label class="{{ $labelClass }}">
                    Company Name *
                </label>

                <input type="text"
                       data-field="company_name"
                       placeholder="Enter company name"
                       class="{{ $inputClass }}"
                       required>
            </div>

            <div>
                <label class="{{ $labelClass }}">
                    Company Logo
                </label>

                <input type="file"
                       data-field="logo"
                       accept="image/jpeg,image/png,image/webp"
                       class="company-logo-input block w-full rounded-xl border border-[#e8dccb] bg-white/80 text-sm text-[#796a59] file:mr-4 file:border-0 file:bg-[#6b5540] file:px-4 file:py-3 file:text-sm file:font-semibold file:text-white hover:file:bg-[#4e3c2b]">
            </div>

        </div>

        <div class="company-preview mt-5 hidden">

            <p class="{{ $labelClass }}">
                Company Logo Preview
            </p>

            <img alt="Company logo preview"
                 class="company-preview-image h-28 w-28 rounded-xl border border-[#e8dccb] bg-white object-contain p-2">

        </div>

    </div>

</template>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const container = document.getElementById('companiesContainer');
    const template = document.getElementById('companyTemplate');

    const addTop = document.getElementById('addCompanyBtn');
    const addBottom = document.getElementById('addCompanyBottom');

    let nextIndex = {{ count($oldCompanies) }};

    function updateCompanyNumbers() {
        const cards = container.querySelectorAll('.company-card');

        cards.forEach((card, index) => {
            card.querySelector('.company-title').textContent =
                'Company ' + (index + 1);
        });

        container.querySelectorAll('.remove-company').forEach(button => {
            button.disabled = cards.length === 1;
            button.classList.toggle('opacity-40', cards.length === 1);
            button.classList.toggle('cursor-not-allowed', cards.length === 1);
        });
    }

    function addCompany() {

        const fragment = template.content.cloneNode(true);
        const card = fragment.querySelector('.company-card');

        const nameInput = card.querySelector('[data-field="company_name"]');
        const logoInput = card.querySelector('[data-field="logo"]');

        nameInput.name = `companies[${nextIndex}][company_name]`;
        logoInput.name = `companies[${nextIndex}][logo]`;

        nextIndex++;

        container.appendChild(fragment);

        updateCompanyNumbers();

        nameInput.focus();
    }

    addTop.addEventListener('click', addCompany);
    addBottom.addEventListener('click', addCompany);

    container.addEventListener('click', function (event) {

        const button = event.target.closest('.remove-company');

        if (!button) return;

        const cards = container.querySelectorAll('.company-card');

        if (cards.length <= 1) return;

        button.closest('.company-card').remove();

        updateCompanyNumbers();
    });

    container.addEventListener('change', function (event) {

        if (!event.target.classList.contains('company-logo-input')) {
            return;
        }

        const input = event.target;
        const card = input.closest('.company-card');

        const wrapper = card.querySelector('.company-preview');
        const image = card.querySelector('.company-preview-image');

        if (image.dataset.objectUrl) {
            URL.revokeObjectURL(image.dataset.objectUrl);
            delete image.dataset.objectUrl;
        }

        const file = input.files[0];

        if (!file || !file.type.startsWith('image/')) {
            wrapper.classList.add('hidden');
            image.removeAttribute('src');
            return;
        }

        const url = URL.createObjectURL(file);

        image.src = url;
        image.dataset.objectUrl = url;
        wrapper.classList.remove('hidden');
    });

    // Profile image preview
    const profileInput = document.getElementById('image');
    const profilePreview = document.getElementById('profilePreview');
    const profileWrapper = document.getElementById('profilePreviewWrapper');

    profileInput.addEventListener('change', function () {

        if (profilePreview.dataset.objectUrl) {
            URL.revokeObjectURL(profilePreview.dataset.objectUrl);
            delete profilePreview.dataset.objectUrl;
        }

        const file = this.files[0];

        if (!file || !file.type.startsWith('image/')) {
            profileWrapper.classList.add('hidden');
            profilePreview.removeAttribute('src');
            return;
        }

        const url = URL.createObjectURL(file);

        profilePreview.src = url;
        profilePreview.dataset.objectUrl = url;
        profileWrapper.classList.remove('hidden');
    });

    // Disable duplicate form submission
    const form = document.getElementById('sellerForm');
    const submitButton = document.getElementById('submitSeller');

    form.addEventListener('submit', function () {
        if (form.checkValidity()) {
            submitButton.disabled = true;
            submitButton.textContent = 'Creating Seller...';
        }
    });

    updateCompanyNumbers();
});
</script>

@endsection
