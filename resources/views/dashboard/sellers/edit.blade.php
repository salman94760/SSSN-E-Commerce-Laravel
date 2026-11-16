
@extends('layouts.admin.page')

@section('title', 'Edit Seller')

@section('adminPage')

@php
    $cardClass = 'overflow-hidden rounded-[26px] border border-white/80 bg-white/65 shadow-[0_15px_45px_rgba(100,75,45,0.06)] backdrop-blur-2xl';
    $labelClass = 'mb-2 block text-xs font-bold uppercase tracking-wide text-[#796a59]';
    $inputClass = 'w-full rounded-xl border border-[#e8dccb] bg-white/80 px-4 py-3 text-sm text-[#5d4936] outline-none transition placeholder:text-[#b0a292] focus:border-[#a58a6d] focus:ring-2 focus:ring-[#e7d5bb]/50';



@endphp

<div class="min-h-screen bg-[#f8f5ef] p-4 sm:p-6 lg:p-8">
    <div class="mx-auto max-w-7xl space-y-6">

        

        @if(session('success'))
            <div class="rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-sm text-green-700">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="rounded-xl border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-700">
                <p class="font-semibold">Please correct the errors:</p>
                <ul class="mt-2 list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('sellers.update', $user->id) }}"
              method="POST"
              enctype="multipart/form-data"
              id="sellerEditForm">
            @csrf
            @method('PUT')

            {{-- Seller Information --}}
            <div class="{{ $cardClass }}">

                <div class="border-b border-[#e8dccb]/60 bg-[#eee3d3]/30 px-6 py-5">
                    <div class="flex items-center justify-between gap-3">
                        <div>
                            <h2 class="text-lg font-bold text-[#5d4936]">
                                Seller Information
                            </h2>
                            <p class="mt-1 text-xs text-[#a58a6d]">
                                Update seller personal and account details.
                            </p>
                        </div>

                        <span class="rounded-full bg-[#eee3d3] px-4 py-2 text-xs font-semibold text-[#6b5540]">
                            Seller #{{ $user->id }}
                        </span>
                    </div>
                </div>

                <div class="p-5 sm:p-8">
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                        <div>
                            <label class="{{ $labelClass }}">Full Name *</label>
                            <input type="text"
                                   name="name"
                                   value="{{ old('name', $user->name) }}"
                                   class="{{ $inputClass }}"
                                   required>
                        </div>

                        <div>
                            <label class="{{ $labelClass }}">Email Address *</label>
                            <input type="email"
                                   name="email"
                                   value="{{ old('email', $user->email) }}"
                                   class="{{ $inputClass }}"
                                   required>
                        </div>

                        <div>
                            <label class="{{ $labelClass }}">Phone Number *</label>
                            <input type="tel"
                                   name="phone"
                                   value="{{ old('phone', $user->userInfo?->phone) }}"
                                   class="{{ $inputClass }}"
                                   required>
                        </div>

                        <div>
                            <label class="{{ $labelClass }}">Zipcode *</label>
                            <input type="text"
                                   name="zipcode"
                                   value="{{ old('zipcode', $user->userInfo?->zipcode) }}"
                                   class="{{ $inputClass }}"
                                   required>
                        </div>

                        <div class="md:col-span-2">
                            <label class="{{ $labelClass }}">Address</label>
                            <textarea name="address"
                                      rows="3"
                                      class="{{ $inputClass }} resize-none">{{ old('address', $user->userInfo?->address) }}</textarea>
                        </div>

                        <div>
                            <label class="{{ $labelClass }}">Landmark</label>
                            <input type="text"
                                   name="landmark"
                                   value="{{ old('landmark', $user->userInfo?->landmark) }}"
                                   class="{{ $inputClass }}">
                        </div>

                        <div>
                            <label class="{{ $labelClass }}">
                                New Password (Optional)
                            </label>
                            <input type="password"
                                   name="password"
                                   autocomplete="new-password"
                                   placeholder="Leave blank to keep current password"
                                   class="{{ $inputClass }}">
                        </div>

                        <div>
                            <label class="{{ $labelClass }}">
                                Confirm New Password
                            </label>
                            <input type="password"
                                   name="password_confirmation"
                                   autocomplete="new-password"
                                   class="{{ $inputClass }}">
                        </div>

                        <div class="md:col-span-2">
                            <label class="{{ $labelClass }}">Profile Image</label>

                            <div class="flex flex-wrap items-center gap-5">
                                <img id="profilePreview"
                                     src="{{ $user->userInfo?->image
                                         ? asset('storage/' . $user->userInfo->image)
                                         : 'data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22120%22 height=%22120%22%3E%3Crect width=%22120%22 height=%22120%22 fill=%22%23eee3d3%22/%3E%3C/svg%3E' }}"
                                     alt="Seller profile image"
                                     class="h-28 w-28 rounded-2xl border border-[#e8dccb] bg-[#eee3d3] object-cover">

                                <input type="file"
                                       name="image"
                                       id="profileImage"
                                       accept="image/jpeg,image/png,image/webp"
                                       class="block max-w-full rounded-xl border border-[#e8dccb] bg-white/80 text-sm text-[#796a59] file:mr-4 file:border-0 file:bg-[#6b5540] file:px-4 file:py-3 file:text-white">
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- Companies --}}
            <div class="{{ $cardClass }} mt-6">

                <div class="flex flex-wrap items-center justify-between gap-4 border-b border-[#e8dccb]/60 bg-[#eee3d3]/30 px-6 py-5">
                    <div>
                        <h2 class="text-lg font-bold text-[#5d4936]">
                            Seller Companies
                        </h2>
                        <p class="mt-1 text-xs text-[#a58a6d]">
                            Edit, remove or add companies.
                        </p>
                    </div>

                    <button type="button"
                            id="addCompany"
                            class="rounded-xl bg-[#6b5540] px-5 py-3 text-sm font-semibold text-white hover:bg-[#4e3c2b]">
                        + Add Company
                    </button>
                </div>

                <div class="p-5 sm:p-8">
                    <div id="companiesContainer" class="space-y-5">

                        @foreach($companyRows as $index => $company)
                            <div class="company-card rounded-2xl border border-[#e8dccb] bg-[#eee3d3]/20 p-5 sm:p-6">

                                <div class="mb-5 flex items-center justify-between gap-3">
                                    <h3 class="company-title text-base font-bold text-[#5d4936]">
                                        Company {{ $loop->iteration }}
                                    </h3>

                                    <button type="button"
                                            class="remove-company rounded-xl border border-red-200 bg-red-50 px-4 py-2 text-xs font-semibold text-red-600 hover:bg-red-100">
                                        Remove
                                    </button>
                                </div>

                                @if(!empty($company['id']))
                                    <input type="hidden"
                                           name="companies[{{ $index }}][id]"
                                           value="{{ $company['id'] }}">
                                @endif

                                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                                    <div>
                                        <label class="{{ $labelClass }}">
                                            Company Name *
                                        </label>
                                        <input type="text"
                                               name="companies[{{ $index }}][company_name]"
                                               value="{{ $company['company_name'] ?? '' }}"
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
                                               class="company-logo-input block w-full rounded-xl border border-[#e8dccb] bg-white/80 text-sm text-[#796a59] file:mr-4 file:border-0 file:bg-[#6b5540] file:px-4 file:py-3 file:text-white">
                                    </div>
                                </div>

                                <div class="mt-5">
                                    @php
                                        $existingLogo = $company->logo
                                            ?? $user->companies->firstWhere('id', $company['id'] ?? null)?->logo;
                                    @endphp

                                    <div class="company-preview {{ $existingLogo ? '' : 'hidden' }}">
                                        <p class="{{ $labelClass }}">Logo Preview</p>
                                        <img class="company-preview-image h-28 w-28 rounded-xl border border-[#e8dccb] bg-white object-contain p-2"
                                             alt="Company logo"
                                             @if($existingLogo)
                                                 src="{{ asset('storage/' . $existingLogo) }}"
                                             @endif>
                                    </div>
                                </div>

                            </div>
                        @endforeach

                    </div>

                    <button type="button"
                            id="addCompanyBottom"
                            class="mt-6 w-full rounded-xl border-2 border-dashed border-[#d8c6b0] bg-[#eee3d3]/20 px-5 py-4 text-sm font-semibold text-[#6b5540] hover:bg-[#eee3d3]/60">
                        + Add Another Company
                    </button>
                </div>
            </div>

            {{-- Footer --}}
            <div class="mt-6 flex flex-col-reverse gap-3 rounded-[26px] border border-white/80 bg-white/65 px-6 py-5 sm:flex-row sm:justify-end">
                <a href="{{ route('sellers.index') }}"
                   class="rounded-xl border border-[#e8dccb] bg-white/80 px-6 py-3 text-center text-sm font-semibold text-[#6b5540]">
                    Cancel
                </a>

                <button type="submit"
                        id="updateSellerButton"
                        class="rounded-xl bg-[#6b5540] px-8 py-3 text-sm font-semibold text-white hover:bg-[#4e3c2b]">
                    Update Seller
                </button>
            </div>
        </form>
    </div>
</div>

<template id="companyTemplate">
    <div class="company-card rounded-2xl border border-[#e8dccb] bg-[#eee3d3]/20 p-5 sm:p-6">

        <div class="mb-5 flex items-center justify-between">
            <h3 class="company-title text-base font-bold text-[#5d4936]">
                New Company
            </h3>

            <button type="button"
                    class="remove-company rounded-xl border border-red-200 bg-red-50 px-4 py-2 text-xs font-semibold text-red-600">
                Remove
            </button>
        </div>

        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
            <div>
                <label class="{{ $labelClass }}">Company Name *</label>
                <input type="text"
                       data-field="company_name"
                       placeholder="Enter company name"
                       class="{{ $inputClass }}"
                       required>
            </div>

            <div>
                <label class="{{ $labelClass }}">Company Logo</label>
                <input type="file"
                       data-field="logo"
                       accept="image/jpeg,image/png,image/webp"
                       class="company-logo-input block w-full rounded-xl border border-[#e8dccb] bg-white/80 text-sm text-[#796a59] file:mr-4 file:border-0 file:bg-[#6b5540] file:px-4 file:py-3 file:text-white">
            </div>
        </div>

        <div class="company-preview mt-5 hidden">
            <p class="{{ $labelClass }}">Logo Preview</p>
            <img alt="Company logo preview"
                 class="company-preview-image h-28 w-28 rounded-xl border border-[#e8dccb] bg-white object-contain p-2">
        </div>
    </div>
</template>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById('companiesContainer');
    const template = document.getElementById('companyTemplate');

    let nextIndex = {{ count($companyRows) }};

    function renumber() {
        container.querySelectorAll('.company-card').forEach((card, i) => {
            card.querySelector('.company-title').textContent =
                'Company ' + (i + 1);
        });
    }

    function addCompany() {
        const fragment = template.content.cloneNode(true);
        const card = fragment.querySelector('.company-card');

        card.querySelector('[data-field="company_name"]').name =
            `companies[${nextIndex}][company_name]`;

        card.querySelector('[data-field="logo"]').name =
            `companies[${nextIndex}][logo]`;

        nextIndex++;
        container.appendChild(fragment);
        renumber();
    }

    document.getElementById('addCompany').addEventListener('click', addCompany);
    document.getElementById('addCompanyBottom').addEventListener('click', addCompany);

    container.addEventListener('click', function (event) {
        const button = event.target.closest('.remove-company');
        if (!button) return;

        if (container.querySelectorAll('.company-card').length <= 1) {
            alert('At least one company is required.');
            return;
        }

        if (confirm('Remove this company from the seller?')) {
            button.closest('.company-card').remove();
            renumber();
        }
    });

    container.addEventListener('change', function (event) {
        if (!event.target.classList.contains('company-logo-input')) return;

        const card = event.target.closest('.company-card');
        const preview = card.querySelector('.company-preview');
        const image = card.querySelector('.company-preview-image');
        const file = event.target.files[0];

        if (image.dataset.objectUrl) {
            URL.revokeObjectURL(image.dataset.objectUrl);
            delete image.dataset.objectUrl;
        }

        if (!file) return;

        const url = URL.createObjectURL(file);
        image.src = url;
        image.dataset.objectUrl = url;
        preview.classList.remove('hidden');
    });

    const profileInput = document.getElementById('profileImage');
    const profilePreview = document.getElementById('profilePreview');

    profileInput.addEventListener('change', function () {
        const file = this.files[0];
        if (!file) return;

        if (profilePreview.dataset.objectUrl) {
            URL.revokeObjectURL(profilePreview.dataset.objectUrl);
        }

        const url = URL.createObjectURL(file);
        profilePreview.src = url;
        profilePreview.dataset.objectUrl = url;
    });

    document.getElementById('sellerEditForm').addEventListener('submit', function () {
        if (this.checkValidity()) {
            const button = document.getElementById('updateSellerButton');
            button.disabled = true;
            button.textContent = 'Updating Seller...';
        }
    });

    renumber();
});
</script>

@endsection
