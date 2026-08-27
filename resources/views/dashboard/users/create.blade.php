@extends('layouts.admin')

@section('title', 'Add User')

@section('breadcrumb', 'Users / Create User')

@section('content')

<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-slate-800">Create User</h2>
        <p class="text-sm text-slate-500 mt-1">Create user account detail</p>
    </div>
    @if(session('success'))
    <div
        class="mb-6 flex items-center justify-between rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-700"
    >
        <span>
            {{ session('success') }}
        </span>

        <button
            onclick="this.parentElement.remove()"
            class="ml-4 text-green-700 hover:text-green-900"
        >
            ✕
        </button>
    </div>
@endif
    <div class="bg-white rounded-xl shadow-sm border border-slate-100">
        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="p-6 space-y-6">
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-slate-700 mb-2">Full name <span class="text-red-500">*</span></label>

                        <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Enter full name" class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-slate-500 focus:ring-2 focus:ring-slate-200 outline-none">
                        @error('name')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email <span class="text-red-500">*</span></label>

                        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email address" class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-slate-500 focus:ring-2 focus:ring-slate-200 outline-none">

                        @error('email')
                        <p class="text-sm text-red-500 mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>    
                </div>

                <div>
                    <label for="address" class="block text-sm font-medium text-slate-700 mb-2">Address</label>

                    <textarea id="address" name="address" value="{{ old('address') }}" placeholder="Enter address" class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-slate-500 focus:ring-2 focus:ring-slate-200 outline-none"></textarea>
                    @error('address')
                    <p class="text-sm text-red-500 mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="phone" class="block text-sm font-medium text-slate-700 mb-2">Phone <span class="text-red-500">*</span></label>

                        <input type="text" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Enter phone number" class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-slate-500 focus:ring-2 focus:ring-slate-200 outline-none">
                        @error('phone')
                        <p class="text-sm text-red-500 mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div>
                        <label for="zipcode" class="block text-sm font-medium text-slate-700 mb-2">Zipcode <span class="text-red-500">*</span></label>

                        <input type="text" id="zipcode" name="zipcode" value="{{ old('zipcode') }}" placeholder="Enter zipcode" class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-slate-500 focus:ring-2 focus:ring-slate-200 outline-none">
                        @error('zipcode')
                        <p class="text-sm text-red-500 mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>    
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="landmark" class="block text-sm font-medium text-slate-700 mb-2">Landmark</label>

                        <input type="text" id="landmark" name="landmark" value="{{ old('landmark') }}" placeholder="Landmark" class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-slate-500 focus:ring-2 focus:ring-slate-200 outline-none">
                        
                    </div>

                    <div>
                    <label for="role"
                           class="block text-sm font-medium text-slate-700 mb-2">
                        Role <span class="text-red-500">*</span>
                    </label>

                    <select
                        id="role"
                        name="role"
                        class="w-full rounded-lg border border-slate-300 px-4 py-2.5
                               focus:border-slate-500 focus:ring-2 focus:ring-slate-200
                               outline-none"
                    >
                        <option value="">Select Role</option>
                        <option value="customer"
                            {{ old('role') == 'customer' ? 'selected' : '' }}>
                            Customer
                        </option>

                        <option value="seller"
                            {{ old('role') == 'seller' ? 'selected' : '' }}>
                            Seller
                        </option>

                        <option value="admin"
                            {{ old('role') == 'admin' ? 'selected' : '' }}>
                            Admin
                        </option>
                    </select>

                    @error('role')
                        <p class="text-sm text-red-500 mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>   
                </div>

                  <div>
                    <label for="image" class="block text-sm font-medium text-slate-700 mb-2">Image/ Photo</label>

                    <input type="file" id="image" name="image" placeholder="Enter address" class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-slate-500 focus:ring-2 focus:ring-slate-200 outline-none"></textarea>
                </div>
            </div>


            {{-- Footer --}}
            <div class="border-t bg-slate-50 px-6 py-4 flex justify-end gap-3">

                <a href="{{ route('users.index') }}"
                   class="px-5 py-2.5 rounded-lg border border-slate-300
                          text-slate-700 hover:bg-white">
                    Cancel
                </a>

                <button
                    type="submit"
                    class="px-5 py-2.5 rounded-lg bg-slate-900 text-white
                           hover:bg-slate-700">
                    Create User
                </button>

            </div>

        </form>

    </div>

</div>

@endsection