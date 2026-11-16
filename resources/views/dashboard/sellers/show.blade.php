
@extends('layouts.admin.page')

@section('title', 'User Details')

@section('adminPage')

@php
    $cardClass = 'overflow-hidden rounded-[26px] border border-white/80 bg-white/65 shadow-[0_15px_45px_rgba(100,75,45,0.06)] backdrop-blur-2xl';

    $labelClass = 'mb-2 block text-xs font-bold uppercase tracking-wide text-[#796a59]';

    $valueClass = 'mt-2 break-words text-sm font-semibold text-[#5d4936]';

    $role = strtolower((string) $user->role);
@endphp

<div class="min-h-screen bg-[#f8f5ef] p-4 sm:p-6 lg:p-8">

    <div class="mx-auto max-w-7xl space-y-6">

       

        {{-- Profile Card --}}
        <div class="{{ $cardClass }}">

            {{-- Card Header --}}
            <div class="border-b border-[#e8dccb]/60 bg-[#eee3d3]/30 px-6 py-5">

                <div class="flex flex-wrap items-center justify-between gap-3">

                    <div>
                        <h2 class="text-lg font-bold text-[#5d4936]">
                            Seller Profile
                        </h2>

                        <p class="mt-1 text-xs text-[#a58a6d]">
                            Basic seller profile and account role.
                        </p>
                    </div>

                    {{-- Role Badge --}}
                    @if($role === 'admin')

                        <span class="inline-flex items-center gap-2 rounded-full bg-[#eee3d3] px-4 py-2 text-xs font-semibold text-[#6b5540]">
                            <span class="h-2 w-2 rounded-full bg-[#a58a6d]"></span>
                            Admin
                        </span>

                    @elseif($role === 'seller')

                        <span class="inline-flex items-center gap-2 rounded-full bg-blue-100 px-4 py-2 text-xs font-semibold text-blue-700">
                            <span class="h-2 w-2 rounded-full bg-blue-500"></span>
                            Seller
                        </span>

                    @elseif($role === 'customer')

                        <span class="inline-flex items-center gap-2 rounded-full bg-green-100 px-4 py-2 text-xs font-semibold text-green-700">
                            <span class="h-2 w-2 rounded-full bg-green-500"></span>
                            Customer
                        </span>

                    @else

                        <span class="inline-flex items-center rounded-full bg-gray-100 px-4 py-2 text-xs font-semibold text-gray-600">
                            {{ $user->role ?? 'User' }}
                        </span>

                    @endif

                </div>

            </div>

            {{-- Profile Content --}}
            <div class="p-5 sm:p-8">

                <div class="flex flex-col items-start gap-6 sm:flex-row sm:items-center">

                    {{-- Profile Image --}}
                    <div class="flex h-28 w-28 shrink-0 items-center justify-center overflow-hidden rounded-2xl border border-[#e8dccb] bg-[#eee3d3]/60 p-1 shadow-sm">

                        @if($user->userInfo?->image)

                            <img src="{{ asset('storage/' . $user->userInfo->image) }}"
                                 alt="{{ $user->name }}"
                                 class="h-full w-full rounded-xl object-cover">

                        @else

                            <span class="text-4xl font-bold text-[#6b5540]">
                                {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}
                            </span>

                        @endif

                    </div>

                    {{-- Profile Details --}}
                    <div class="min-w-0">

                        <h3 class="break-words text-2xl font-bold text-[#5d4936]">
                            {{ $user->name }}
                        </h3>

                        <p class="mt-2 break-all text-sm text-[#796a59]">
                            {{ $user->email }}
                        </p>

                        <p class="mt-2 text-xs font-medium text-[#a58a6d]">
                            User ID: #{{ $user->id }}
                        </p>

                    </div>

                </div>

            </div>

        </div>

        {{-- Account Information --}}
        <div class="{{ $cardClass }}">

            {{-- Card Header --}}
            <div class="border-b border-[#e8dccb]/60 bg-[#eee3d3]/30 px-6 py-5">

                <h2 class="text-lg font-bold text-[#5d4936]">
                    Account Information
                </h2>

                <p class="mt-1 text-xs text-[#a58a6d]">
                    User account, role and registration details.
                </p>

            </div>

            {{-- Account Details --}}
            <div class="grid grid-cols-1 gap-7 p-5 sm:grid-cols-2 sm:p-8 lg:grid-cols-3">

                {{-- User ID --}}
                <div>
                    <p class="{{ $labelClass }}">
                        User ID
                    </p>

                    <p class="{{ $valueClass }}">
                        #{{ $user->id }}
                    </p>
                </div>

                {{-- Full Name --}}
                <div>
                    <p class="{{ $labelClass }}">
                        Full Name
                    </p>

                    <p class="{{ $valueClass }}">
                        {{ $user->name }}
                    </p>
                </div>

                {{-- Email --}}
                <div>
                    <p class="{{ $labelClass }}">
                        Email Address
                    </p>

                    <p class="{{ $valueClass }} break-all">
                        {{ $user->email }}
                    </p>
                </div>

                {{-- Account Role --}}
                <div>
                    <p class="{{ $labelClass }}">
                        Account Role
                    </p>

                    <p class="{{ $valueClass }} capitalize">
                        {{ $user->role ?? '—' }}
                    </p>
                </div>

                {{-- Email Verification --}}
                <div>
                    <p class="{{ $labelClass }}">
                        Email Verification
                    </p>

                    <div class="mt-2">

                        @if($user->email_verified_at)

                            <span class="inline-flex items-center gap-2 rounded-full bg-green-100 px-4 py-2 text-xs font-semibold text-green-700">
                                <span class="h-2 w-2 rounded-full bg-green-500"></span>
                                Verified
                            </span>

                        @else

                            <span class="inline-flex items-center gap-2 rounded-full bg-yellow-100 px-4 py-2 text-xs font-semibold text-yellow-700">
                                <span class="h-2 w-2 rounded-full bg-yellow-500"></span>
                                Not Verified
                            </span>

                        @endif

                    </div>
                </div>

                {{-- Registration Date --}}
                <div>
                    <p class="{{ $labelClass }}">
                        Registered At
                    </p>

                    <p class="{{ $valueClass }}">
                        {{ $user->created_at?->format('d M Y, h:i A') ?? '—' }}
                    </p>
                </div>

            </div>

        </div>

        {{-- Contact & Address Information --}}
        <div class="{{ $cardClass }}">

            {{-- Card Header --}}
            <div class="border-b border-[#e8dccb]/60 bg-[#eee3d3]/30 px-6 py-5">

                <h2 class="text-lg font-bold text-[#5d4936]">
                    Contact & Address Information
                </h2>

                <p class="mt-1 text-xs text-[#a58a6d]">
                    User contact information and address details.
                </p>

            </div>

            {{-- Contact Details --}}
            <div class="grid grid-cols-1 gap-7 p-5 sm:grid-cols-2 sm:p-8">

                {{-- Phone --}}
                <div>
                    <p class="{{ $labelClass }}">
                        Phone Number
                    </p>

                    <p class="{{ $valueClass }}">
                        {{ $user->userInfo?->phone ?: '—' }}
                    </p>
                </div>

                {{-- Zipcode --}}
                <div>
                    <p class="{{ $labelClass }}">
                        Zipcode
                    </p>

                    <p class="{{ $valueClass }}">
                        {{ $user->userInfo?->zipcode ?: '—' }}
                    </p>
                </div>

                {{-- Address --}}
                <div>
                    <p class="{{ $labelClass }}">
                        Address
                    </p>

                    <p class="{{ $valueClass }} whitespace-pre-line">{{ $user->userInfo?->address ?: '—' }}</p>
                </div>

                {{-- Landmark --}}
                <div>
                    <p class="{{ $labelClass }}">
                        Landmark
                    </p>

                    <p class="{{ $valueClass }}">
                        {{ $user->userInfo?->landmark ?: '—' }}
                    </p>
                </div>

            </div>

        </div>
                {{-- Seller Customer Summary and List --}}
        @if($role === 'seller')
            <div class="{{ $cardClass }}">
                <div class="flex flex-wrap items-center justify-between gap-4 border-b border-[#e8dccb]/60 bg-[#eee3d3]/30 px-6 py-5">
                    <div>
                        <h2 class="text-lg font-bold text-[#5d4936]">Seller Companies</h2>
                        <p class="mt-1 text-xs text-[#a58a6d]">Companies linked to this seller.</p>
                    </div>
                    <div class="rounded-xl bg-[#6b5540] px-5 py-3 text-center text-white">
                        <p class="text-xs text-white/80">Total Companies</p>
                        <p class="mt-1 text-2xl font-bold">{{ $totalCustomers ?? 0 }}</p>
                    </div>
                </div>
                <div class="overflow-x-auto p-5 sm:p-8">
                    <table class="w-full min-w-[700px] text-left text-sm">
                        <thead>
                            <tr class="border-b border-[#e8dccb] text-xs uppercase tracking-wide text-[#796a59]">
                                <th class="px-4 py-4">ID</th>
                                <th class="px-4 py-4">Company Name</th>
                                <th class="px-4 py-4">Email</th>
                                <th class="px-4 py-4">Phone</th>
                                <th class="px-4 py-4">Registered</th>
                                <th class="px-4 py-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(($customers ?? collect()) as $company)
                                <tr class="border-b border-[#e8dccb]/60 text-[#5d4936] hover:bg-[#eee3d3]/30">
                                    <td class="px-4 py-4">#{{ $company->id }}</td>
                                    <td class="px-4 py-4 font-semibold">{{ $company->company_name }}</td>
                                    <td class="px-4 py-4 break-all">{{ $company->company_email }}</td>
                                    <td class="px-4 py-4">{{ $company->phone ?: '—' }}</td>
                                    <td class="px-4 py-4">{{ $company->created_at?->format('d M Y') ?? '—' }}</td>
                                    <td class="px-4 py-4">
                                        <a href="{{ route('companies.show', $company->id) }}"
                                           class="inline-flex rounded-xl bg-[#eee3d3] px-4 py-2 text-xs font-semibold text-[#6b5540] hover:bg-[#e2d2bd]">View</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-10 text-center text-[#a58a6d]">No customers found for this seller.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        {{-- Footer Actions --}}
        <div class="flex flex-col-reverse gap-3 rounded-[26px] border border-white/80 bg-white/65 px-6 py-5 shadow-[0_15px_45px_rgba(100,75,45,0.06)] backdrop-blur-2xl sm:flex-row sm:items-center sm:justify-end">

            <a href="{{ route('users.index') }}"
               class="inline-flex items-center justify-center rounded-xl border border-[#e8dccb] bg-white/80 px-6 py-3 text-sm font-semibold text-[#6b5540] transition duration-300 hover:bg-[#eee3d3]">
                Back to Sellers
            </a>

            <a href="{{ route('users.edit', $user->id) }}"
               class="inline-flex items-center justify-center rounded-xl bg-[#6b5540] px-6 py-3 text-sm font-semibold text-white transition duration-300 hover:-translate-y-0.5 hover:bg-[#4e3c2b]">
                Edit Seller
            </a>

        </div>

    </div>

</div>

@endsection
