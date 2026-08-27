@extends('layouts.admin')

@section('title', 'Users')

@section('breadcrumb', 'Users')

@section('content')

    <div class="bg-white rounded-xl shadow-sm p-6">

        <div class="flex justify-between items-center mb-6">

            <div>
                <h2 class="text-xl font-bold text-slate-800">
                    Users
                </h2>

                <p class="text-sm text-slate-500">
                    Manage all users
                </p>
            </div>

            <a href="{{ route('users.create') }}"
               class="bg-slate-900 text-white px-4 py-2 rounded-lg hover:bg-slate-700">
                Add User
            </a>

        </div>
            {{-- Filter --}}
    <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">

        <form
            action="{{ route('users.index') }}"
            method="GET"
            class="flex flex-col gap-3 lg:flex-row lg:items-end"
        >

            {{-- Search --}}
            <div class="flex-1">

                <label class="mb-1.5 block text-xs font-medium text-slate-600">
                    Search
                </label>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search user..."
                    class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm outline-none focus:border-slate-800 focus:ring-2 focus:ring-slate-200"
                >

            </div>


            


            


            {{-- Status --}}
            <div class="w-full lg:w-36">

                <label class="mb-1.5 block text-xs font-medium text-slate-600">
                    Type
                </label>

                <select
                    name="type"
                    class="w-full rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm outline-none focus:border-slate-800"
                >

                    <option value="">
                        All
                    </option>

                    <option
                        value="admin"
                        {{ request('type') === '1' ? 'selected' : '' }}
                    >
                        Admin
                    </option>

                    <option
                        value="seller"
                        {{ request('type') === '2' ? 'selected' : '' }}
                    >
                        Seller
                    </option>
                    <option
                        value="customer"
                        {{ request('type') === '3' ? 'selected' : '' }}
                    >
                        Customer
                    </option>

                </select>

            </div>


            <button
                type="submit"
                class="rounded-lg bg-slate-800 px-5 py-2.5 text-sm font-semibold text-white hover:bg-slate-700"
            >
                Filter
            </button>


            <a
                href="{{ route('users.index') }}"
                class="rounded-lg border border-slate-300 px-5 py-2.5 text-center text-sm font-medium text-slate-600 hover:bg-slate-50"
            >
                Reset
            </a>

        </form>

    </div>

        <div class="overflow-x-auto">

            <table class="w-full text-left">

                <thead class="border-b">
                    <tr>
                        <th class="p-3">ID</th>
                        <th class="p-3">Image</th>
                        <th class="p-3">Name</th>
                        <th class="p-3">Email</th>
                        <th class="p-3">Role</th>
                        <th class="p-3">Password</th>
                        <th class="p-3">Actions</th>
                    </tr>
                </thead>

                <tbody>
                  
                    @foreach($users as $user)

                        <tr class="border-b hover:bg-slate-50">

                            <td class="p-3">
                                {{ $user->id }}
                            </td>

                            <td class="p-3">
                                @if(isset($user->userInfo->image))
                                <img class="h-20 w-20" src="{{ asset('storage/' . $user->userInfo->image) }}" />
                                @else
                                @endif
                            </td>

                            <td class="p-3">
                                {{ $user->name }}
                            </td>

                            <td class="p-3">
                                {{ $user->email }}
                            </td>

                            <td class="p-3">
                                <b>{{ $user->role }}</b>
                            </td>

                            <td class="p-3">
                                {{ $user->userInfo->password_hint }}
                            </td>

                            <td class="p-3">

                                <div class="flex gap-2">

                                    <a href="{{ route('users.show', $user->id) }}"
                                       class="px-3 py-1 bg-blue-100 text-blue-700 rounded">
                                        Show
                                    </a>

                                    <a href="{{ route('users.edit', $user->id) }}"
                                       class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded">
                                        Edit
                                    </a>

                                    <form action="{{ route('users.destroy', $user->id) }}"
                                          method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="px-3 py-1 bg-red-100 text-red-700 rounded">
                                            Delete
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @endforeach
                

                </tbody>

            </table>
            <x-admin-page-pagination :pagArray="$users" title="Users"></x-admin-page-pagination>

        </div>

    </div>

@endsection