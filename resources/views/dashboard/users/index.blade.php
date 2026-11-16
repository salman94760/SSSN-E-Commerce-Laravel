
@extends('layouts.admin.page')

@section('title', 'Users')

@section('adminPage')

@php
    $types = ['All', 'Admin', 'Seller', 'Customer'];

    $column = [
        'Action',
        '#',
        'Users',
        'Email',
        'Role',
        'Image'
    ];
@endphp

<div class="min-h-screen bg-[#f8f5ef] p-4 sm:p-6 lg:p-8">

    <div class="mx-auto max-w-7xl space-y-6">

        {{-- Page Header --}}
        <x-admin.sub-header :arr="[
            'title' => 'Users',
            'subtitle' => 'Manage your users, roles and account information.',
            'AddButton' => '+ Add User',
            'link' => 'users.create'
        ]" />

        {{-- User Filters --}}
        {{-- Custom filter to preserve existing search/type parameters --}}
        <div class="overflow-hidden rounded-[26px] border border-white/80 bg-white/65 shadow-[0_15px_45px_rgba(100,75,45,0.06)] backdrop-blur-2xl">

            <form action="{{ route('users.index') }}"
                  method="GET"
                  class="grid grid-cols-1 gap-4 p-5 sm:p-6 lg:grid-cols-12 lg:items-end">

                {{-- Search --}}
                <div class="lg:col-span-6">

                    <label for="search"
                           class="mb-2 block text-xs font-bold uppercase tracking-wide text-[#796a59]">
                        Search Users
                    </label>

                    <input type="text"
                           name="search"
                           id="search"
                           value="{{ request('search') }}"
                           placeholder="Search by name or email..."
                           class="w-full rounded-xl border border-[#e8dccb] bg-white/80 px-4 py-3 text-sm text-[#5d4936] outline-none transition placeholder:text-[#b0a292] focus:border-[#a58a6d] focus:ring-2 focus:ring-[#e7d5bb]/50">

                </div>

                {{-- User Type --}}
                <div class="lg:col-span-3">

                    <label for="type"
                           class="mb-2 block text-xs font-bold uppercase tracking-wide text-[#796a59]">
                        User Type
                    </label>

                    <select name="type"
                            id="type"
                            class="w-full rounded-xl border border-[#e8dccb] bg-white/80 px-4 py-3 text-sm text-[#5d4936] outline-none transition focus:border-[#a58a6d] focus:ring-2 focus:ring-[#e7d5bb]/50">

                        <option value="">All Users</option>

                        <option value="admin" @selected(request('type') === 'admin')>
                            Admin
                        </option>

                        <option value="seller" @selected(request('type') === 'seller')>
                            Seller
                        </option>

                        <option value="customer" @selected(request('type') === 'customer')>
                            Customer
                        </option>

                    </select>

                </div>

                {{-- Filter Buttons --}}
                <div class="flex gap-2 lg:col-span-3">

                    <button type="submit"
                            class="flex-1 rounded-xl bg-[#6b5540] px-4 py-3 text-sm font-semibold text-white transition duration-300 hover:bg-[#4e3c2b]">
                        Apply
                    </button>

                    <a href="{{ route('users.index') }}"
                       class="flex-1 rounded-xl border border-[#e8dccb] bg-white/80 px-4 py-3 text-center text-sm font-semibold text-[#6b5540] transition duration-300 hover:bg-[#eee3d3]">
                        Reset
                    </a>

                </div>

            </form>

        </div>

        {{-- Users Table --}}
        <x-admin.view-table :arr="[
            'columnArr' => $column
        ]">

            @forelse($users as $user)

                <tr>

                    {{-- Actions --}}
                    <td class="whitespace-nowrap">

                        <div class="flex items-center gap-2">

                            {{-- View --}}
                            <a href="{{ route('users.show', $user->id) }}"
                               title="View User"
                               class="flex h-9 w-9 items-center justify-center rounded-xl border border-[#e8dccb] bg-white/70 text-[#6b5540] transition-all duration-300 hover:-translate-y-0.5 hover:bg-[#eee3d3]">

                                <svg class="h-4 w-4" fill="none"
                                     stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12zM12 15a3 3 0 100-6 3 3 0 000 6z"/>
                                </svg>

                            </a>

                            {{-- Edit --}}
                            <a href="{{ route('users.edit', $user->id) }}"
                               title="Edit User"
                               class="flex h-9 w-9 items-center justify-center rounded-xl border border-[#e8dccb] bg-white/70 text-[#6b5540] transition-all duration-300 hover:-translate-y-0.5 hover:bg-[#eee3d3]">
                                ✎
                            </a>

                            {{-- Delete --}}
                            <form action="{{ route('users.destroy', $user->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this user?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        title="Delete User"
                                        class="flex h-9 w-9 items-center justify-center rounded-xl border border-red-200 bg-red-50 text-red-600 transition-all duration-300 hover:-translate-y-0.5 hover:bg-red-100">
                                    🗑
                                </button>

                            </form>

                        </div>

                    </td>

                    {{-- User ID --}}
                    <td class="whitespace-nowrap font-medium text-[#938778]">
                        #{{ $user->id }}
                    </td>

                    {{-- User Name --}}
                    <td class="whitespace-nowrap">

                        <div class="font-semibold text-[#5d4936]">
                            {{ $user->name }}
                        </div>

                    </td>

                    {{-- Email --}}
                    <td class="whitespace-nowrap">

                        <span class="text-sm text-[#796a59]">
                            {{ $user->email }}
                        </span>

                    </td>

                    {{-- Role --}}
                    <td class="whitespace-nowrap">

                        @if($user->role === 'admin')

                            <span class="inline-flex items-center gap-1.5 rounded-full bg-[#eee3d3] px-3 py-1.5 text-xs font-semibold text-[#6b5540]">
                                <span class="h-1.5 w-1.5 rounded-full bg-[#a58a6d]"></span>
                                Admin
                            </span>

                        @elseif($user->role === 'seller')

                            <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-100 px-3 py-1.5 text-xs font-semibold text-blue-700">
                                <span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span>
                                Seller
                            </span>

                        @elseif($user->role === 'customer')

                            <span class="inline-flex items-center gap-1.5 rounded-full bg-green-100 px-3 py-1.5 text-xs font-semibold text-green-700">
                                <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                Customer
                            </span>

                        @else

                            <span class="rounded-full bg-gray-100 px-3 py-1.5 text-xs font-semibold text-gray-600">
                                {{ $user->role ?? 'Unknown' }}
                            </span>

                        @endif

                    </td>

                    {{-- User Image --}}
                    <td>

                        @if($user->userInfo?->image)

                            <img src="{{ asset('storage/' . $user->userInfo->image) }}"
                                 alt="{{ $user->name }}"
                                 loading="lazy"
                                 class="h-16 w-16 rounded-xl border border-[#e8dccb] bg-white object-cover shadow-sm">

                        @else

                            <div class="flex h-16 w-16 items-center justify-center rounded-xl border border-[#e8dccb] bg-[#eee3d3] text-xl font-bold text-[#6b5540]">

                                {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}

                            </div>

                        @endif

                    </td>

                </tr>

            @empty

                {{-- Empty State --}}
                <tr>

                    <td colspan="{{ count($column) }}"
                        class="py-16 text-center">

                        <div class="flex flex-col items-center justify-center">

                            <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-[#eee3d3] text-3xl text-[#a58a6d]">
                                👥
                            </div>

                            <h3 class="mt-4 text-sm font-semibold text-[#6b5540]">
                                No Users Found
                            </h3>

                            <p class="mt-2 text-xs text-[#a58a6d]">
                                Try changing your filters or add your first user.
                            </p>

                            <a href="{{ route('users.create') }}"
                               class="mt-5 inline-flex items-center rounded-xl bg-[#6b5540] px-5 py-2.5 text-xs font-semibold text-white transition-all duration-300 hover:-translate-y-0.5 hover:bg-[#4e3c2b]">
                                + Add User
                            </a>

                        </div>

                    </td>

                </tr>

            @endforelse

        </x-admin.view-table>

        {{-- Pagination --}}
        <x-admin.view-pagination :arr="[
            'arrpagination' => $users
        ]" />

    </div>

</div>

@endsection
