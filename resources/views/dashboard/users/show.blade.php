@extends('layouts.admin')

@section('title', 'Users')

@section('breadcrumb', 'User Detail')

@section('content')

    <div class="min-h-screen bg-slate-50 px-6 py-8">

        <div class="mx-auto max-w-6xl">

            <div class="mb-8 flex items-center justify-between">
                <div>
                    <a
                        href="{{ route('users.index') }}"
                        class="mb-3 inline-flex items-center text-sm font-medium text-slate-500 hover:text-slate-800"
                    >
                        ← Back to Users
                    </a>

                    <h1 class="text-3xl font-bold text-slate-800">
                        User Details
                    </h1>

                    <p class="mt-1 text-slate-500">
                        View user information and account details.
                    </p>
                </div>

                <a
                    href="{{ route('users.edit', $user->id) }}"
                    class="rounded-lg bg-slate-800 px-5 py-2.5 text-sm font-semibold text-white hover:bg-slate-700"
                >
                    Edit User
                </a>
            </div>

            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-200 px-8 py-7">
                    <div class="flex items-center gap-5">

                       <div class="flex h-16 w-16 shrink-0 items-center justify-center overflow-hidden rounded-full bg-slate-100 text-xl font-bold text-slate-700">

    <img
        src="{{ asset('storage/' . $user->userInfo->image) }}"
        alt="{{ $user->name }}"
        class="h-full w-full object-cover"
    >

</div>

                        <div>
                            <h2 class="text-2xl font-bold text-slate-800">
                                {{ $user->name }}
                            </h2>

                            <p class="mt-1 text-sm text-slate-500">
                                {{ $user->email }}
                            </p>
                        </div>

                    </div>
                </div>

                <div class="px-8 py-8">

                    <h3 class="mb-6 text-lg font-semibold text-slate-800">
                        Account Information
                    </h3>

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                        <div>
                            <p class="text-sm font-medium text-slate-500">
                                Full Name
                            </p>
                            <p class="mt-1 font-semibold text-slate-800">
                                {{ $user->name }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-slate-500">
                                Email Address
                            </p>
                            <p class="mt-1 font-semibold text-slate-800">
                                {{ $user->email }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-slate-500">
                                Email Verification
                            </p>

                            @if($user->email_verified_at)
                                <span class="mt-1 inline-block rounded-full bg-green-100 px-3 py-1 text-sm font-medium text-green-700">
                                    Verified
                                </span>
                            @else
                                <span class="mt-1 inline-block rounded-full bg-yellow-100 px-3 py-1 text-sm font-medium text-yellow-700">
                                    Not Verified
                                </span>
                            @endif
                        </div>

                        <div>
                            <p class="text-sm font-medium text-slate-500">
                                Registered At
                            </p>
                            <p class="mt-1 font-semibold text-slate-800">
                                {{ $user->created_at?->format('d M Y, h:i A') }}
                            </p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection