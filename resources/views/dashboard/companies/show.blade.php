
@extends('layouts.admin.page')

@section('title', 'Company Details')

@section('adminPage')

@php
    $cardClass = 'overflow-hidden rounded-[26px] border border-white/80 bg-white/65 shadow-[0_15px_45px_rgba(100,75,45,0.06)] backdrop-blur-2xl';
    $labelClass = 'mb-2 block text-xs font-bold uppercase tracking-wide text-[#796a59]';
    $valueClass = 'mt-2 break-words text-sm font-semibold text-[#5d4936]';
    $inputClass = 'w-full rounded-xl border border-[#e8dccb] bg-white/80 px-4 py-3 text-sm text-[#5d4936] outline-none transition focus:border-[#a58a6d] focus:ring-2 focus:ring-[#eee3d3]';
@endphp

<div class="min-h-screen bg-[#f8f5ef] p-4 sm:p-6 lg:p-8"
     x-data="{ editing: false }">

    <div class="mx-auto max-w-7xl space-y-6">

        

        @if(session('success'))
            <div class="rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-semibold text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST"
              action="{{ route('companies.update', $company->id) }}">

            @csrf
            @method('PUT')

            <div class="space-y-6">

                {{-- Company Profile --}}
                <div class="{{ $cardClass }}">

                    <div class="border-b border-[#e8dccb]/60 bg-[#eee3d3]/30 px-6 py-5">

                        <h2 class="text-lg font-bold text-[#5d4936]">
                            Company Profile
                        </h2>

                        <p class="mt-1 text-xs text-[#a58a6d]">
                            Basic company profile and identification details.
                        </p>

                    </div>

                    <div class="p-5 sm:p-8">

                        <div class="flex flex-col items-start gap-6 sm:flex-row sm:items-center">

                            <div class="flex h-28 w-28 shrink-0 items-center justify-center rounded-2xl border border-[#e8dccb] bg-[#eee3d3]/60 shadow-sm">

                                <span class="text-4xl font-bold text-[#6b5540]">
                                    {{ strtoupper(substr($company->name ?? 'C', 0, 1)) }}
                                </span>

                            </div>

                            <div class="min-w-0 flex-1">

                                <div x-show="!editing">

                                    <h3 class="break-words text-2xl font-bold text-[#5d4936]">
                                        {{ $company->company_name ?? '—' }}
                                    </h3>

                                    <p class="mt-2 text-sm text-[#796a59]">
                                        {{ $company->company_email ?? '—' }}
                                    </p>

                                    <p class="mt-2 text-xs font-medium text-[#a58a6d]">
                                        Company ID: #{{ $company->id }}
                                    </p>

                                </div>


                               

                            </div>

                        </div>

                    </div>

                </div>

                {{-- Company Information --}}
                <div class="{{ $cardClass }}">

                    <div class="border-b border-[#e8dccb]/60 bg-[#eee3d3]/30 px-6 py-5">

                        <h2 class="text-lg font-bold text-[#5d4936]">
                            Company Information
                        </h2>

                        <p class="mt-1 text-xs text-[#a58a6d]">
                            Company registration and identification details.
                        </p>

                    </div>

                    <div class="grid grid-cols-1 gap-7 p-5 sm:grid-cols-2 sm:p-8 lg:grid-cols-3">

                        @foreach([
                            'dot_number' => 'DOT Number',
                            'mc_number' => 'MC Number',
                            'ein_number' => 'EIN Number',
                            'email' => 'Email Address',
                            'phone' => 'Phone Number',
                            'status' => 'Company Status'
                        ] as $field => $label)

                            <div>

                                <label class="{{ $labelClass }}">
                                    {{ $label }}
                                </label>

                               

                                <div x-show="editing" x-cloak>

                                    @if($field === 'status')

                                        <select name="status" class="{{ $inputClass }}">

                                            @foreach(['Active', 'Inactive', 'Pending'] as $status)
                                                <option value="{{ $status }}"
                                                    @selected(old('status', $company->status) === $status)>
                                                    {{ $status }}
                                                </option>
                                            @endforeach

                                        </select>

                                    @else

                                        <input type="{{ $field === 'email' ? 'email' : 'text' }}"
                                               name="{{ $field }}"
                                               value="{{ old($field, $company->{$field}) }}"
                                               class="{{ $inputClass }}">

                                    @endif

                                </div>

                            </div>

                        @endforeach

                        <div>

                            <label class="{{ $labelClass }}">
                                Registered At
                            </label>

                            <p class="{{ $valueClass }}">
                                {{ $company->created_at?->format('d M Y, h:i A') ?? '—' }}
                            </p>

                        </div>

                    </div>

                </div>

                {{-- Contact & Address Information --}}
                <div class="{{ $cardClass }}">

                    <div class="border-b border-[#e8dccb]/60 bg-[#eee3d3]/30 px-6 py-5">

                        <h2 class="text-lg font-bold text-[#5d4936]">
                            Contact & Address Information
                        </h2>

                        <p class="mt-1 text-xs text-[#a58a6d]">
                            Company location and contact details.
                        </p>

                    </div>

                    <div class="grid grid-cols-1 gap-7 p-5 sm:grid-cols-2 sm:p-8">

                        @foreach([
                            'address' => 'Company Address',
                            'city' => 'City',
                            'state' => 'State',
                            'zipcode' => 'Zipcode',
                            'country' => 'Country'
                        ] as $field => $label)

                            <div>

                                <label class="{{ $labelClass }}">
                                    {{ $label }}
                                </label>

                               

                                <div x-show="editing" x-cloak>

                                    @if($field === 'address')

                                        <textarea name="address"
                                                  rows="3"
                                                  class="{{ $inputClass }}">{{ old('address', $company->address) }}</textarea>

                                    @else

                                        <input type="text"
                                               name="{{ $field }}"
                                               value="{{ old($field, $company->{$field}) }}"
                                               class="{{ $inputClass }}">

                                    @endif

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

                {{-- Footer Actions --}}
                <div class="flex flex-col-reverse gap-3 rounded-[26px] border border-white/80 bg-white/65 px-6 py-5 shadow-[0_15px_45px_rgba(100,75,45,0.06)] backdrop-blur-2xl sm:flex-row sm:items-center sm:justify-end">

                   

                    <button type="button"
                            x-show="editing"
                            @click="editing = false"
                            class="rounded-xl border border-[#e8dccb] bg-white px-6 py-3 text-sm font-semibold text-[#6b5540]">
                        Cancel
                    </button>

                    <button type="submit"
                            x-show="editing"
                            x-cloak
                            class="rounded-xl bg-[#6b5540] px-6 py-3 text-sm font-semibold text-white transition hover:bg-[#4e3c2b]">
                        Update Company
                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection
