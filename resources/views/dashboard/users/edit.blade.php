@extends('layouts.admin')

@section('title', 'Add User')

@section('breadcrumb', 'Users / Edit User')

@section('content')

<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-slate-800">Edit User</h2>
        <p class="text-sm text-slate-500 mt-1">Edit user account detail</p>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-100">
        <form action="{{ route('users.update',$user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
             @method('PUT')
            <div class="p-6 space-y-6">
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-slate-700 mb-2">Full name *</label>

                        <input type="text" id="name" name="name" value="{{ $user->name }}" placeholder="Enter full name" class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-slate-500 focus:ring-2 focus:ring-slate-200 outline-none">
                        @error('name')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email *</label>

                        <input type="email" id="email" name="email" value="{{ $user->email }}" placeholder="Enter email address" class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-slate-500 focus:ring-2 focus:ring-slate-200 outline-none">

                        @error('email')
                        <p class="text-sm text-red-500 mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>    
                </div>

                <div>
                    <label for="address" class="block text-sm font-medium text-slate-700 mb-2">Address</label>

                    <textarea id="address" name="address" placeholder="Enter address" class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-slate-500 focus:ring-2 focus:ring-slate-200 outline-none">{{ $user->userInfo->address }}</textarea>
                    @error('address')
                    <p class="text-sm text-red-500 mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="phone" class="block text-sm font-medium text-slate-700 mb-2">Phone *</label>

                        <input type="text" id="phone" name="phone" value="{{ $user->userInfo->phone }}" placeholder="Enter phone number" class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-slate-500 focus:ring-2 focus:ring-slate-200 outline-none">
                        @error('phone')
                        <p class="text-sm text-red-500 mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div>
                        <label for="zipcode" class="block text-sm font-medium text-slate-700 mb-2">Zipcode *</label>

                        <input type="text" id="zipcode" name="zipcode" value="{{ $user->userInfo->zipcode }}" placeholder="Enter zipcode" class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-slate-500 focus:ring-2 focus:ring-slate-200 outline-none">
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

                        <input type="text" id="landmark" name="landmark" value="{{ $user->userInfo->landmark }}" placeholder="Landmark" class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-slate-500 focus:ring-2 focus:ring-slate-200 outline-none">
                        
                    </div>

                    <div>
                    <label for="role"
                           class="block text-sm font-medium text-slate-700 mb-2">
                        Role
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
                            {{ $user->role == 'customer' ? 'selected' : '' }}>
                            Customer
                        </option>

                        <option value="seller"
                            {{ $user->role == 'seller' ? 'selected' : '' }}>
                            Seller
                        </option>

                        <option value="admin"
                            {{ $user->role == 'admin' ? 'selected' : '' }}>
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

                    <input type="file" id="image" name="image" placeholder="Enter address" class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-slate-500 focus:ring-2 focus:ring-slate-200 outline-none">
                </div>
                <div class="h-20"><img class="w-20 h-20" src="{{asset('storage/'.$user->userInfo->image)}}" /></div>
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
                    Edit User
                </button>

            </div>

        </form>

    </div>

</div>

@endsection