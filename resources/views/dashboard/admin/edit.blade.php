@extends('layouts.admin')
@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">

        {{-- Header --}}
        <div class="px-6 py-5 border-b border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900">Edit Profile</h2>
            <p class="mt-1 text-sm text-gray-500">
                Update your profile information and profile photo.
            </p>
        </div>
            <div class="bg-white rounded-xl shadow-sm border border-slate-100">
        <form action="{{ route('adminprofile.update',$user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            {{-- Profile Image --}}
                <div class="p-6 space-y-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">
                        Profile Photo
                    </h3>

                    <div class="flex items-center gap-5">
                        <div class="w-24 h-24 rounded-full overflow-hidden bg-gray-100 border border-gray-200">
                            @if($user->userInfo?->image)
                                <img src="{{ asset('storage/' . $user->userInfo->image) }}"
                                     alt="Profile"
                                     class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400">
                                    <svg class="w-10 h-10" fill="none" stroke="currentColor"
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M5.121 17.804A13.937 13.937 0 0112 15c2.21 0 4.25.514 6.879 2.804M15 10a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Change Profile Photo
                            </label>

                            <input type="file"
                                   name="image"
                                   accept="image/*"
                                   class="block w-full text-sm text-gray-500
                                          file:mr-4 file:py-2 file:px-4
                                          file:rounded-lg file:border-0
                                          file:text-sm file:font-medium
                                          file:bg-gray-100 file:text-gray-700
                                          hover:file:bg-gray-200">

                            @error('image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            <div class="p-6 space-y-6">
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-slate-700 mb-2">Full name <span class="text-red-500">*</span></label>

                        <input type="text" id="name" name="name" value="{{ $user->name?$user->name:old('name') }}" placeholder="Enter full name" class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-slate-500 focus:ring-2 focus:ring-slate-200 outline-none">
                        @error('name')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email <span class="text-red-500">*</span></label>

                        <input disabled type="email" id="email" name="email" value="{{ $user->email?$user->email:old('email') }}" placeholder="Enter email address" class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-slate-500 focus:ring-2 focus:ring-slate-200 outline-none bg-gray-400">

                        @error('email')
                        <p class="text-sm text-red-500 mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>    
                </div>

                <div>
                    <label for="address" class="block text-sm font-medium text-slate-700 mb-2">Address</label>

                    <textarea id="address" name="address" placeholder="Enter address" class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-slate-500 focus:ring-2 focus:ring-slate-200 outline-none">{{ $user->userInfo?->address?$user->userInfo->address:old('address') }}</textarea>
                    @error('address')
                    <p class="text-sm text-red-500 mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="phone" class="block text-sm font-medium text-slate-700 mb-2">Phone <span class="text-red-500">*</span></label>

                        <input type="text" id="phone" name="phone" value="{{ $user->userInfo?->phone?$user->userInfo->phone:old('phone') }}" placeholder="Enter phone number" class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-slate-500 focus:ring-2 focus:ring-slate-200 outline-none">
                        @error('phone')
                        <p class="text-sm text-red-500 mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div>
                        <label for="zipcode" class="block text-sm font-medium text-slate-700 mb-2">Zipcode <span class="text-red-500">*</span></label>

                        <input type="text" id="zipcode" name="zipcode" value="{{ $user->userInfo?->zipcode?$user->userInfo->zipcode:old('zipcode') }}" placeholder="Enter zipcode" class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-slate-500 focus:ring-2 focus:ring-slate-200 outline-none">
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

                        <input type="text" id="landmark" name="landmark" value="{{ $user->userInfo?->landmark?$user->userInfo->landmark:old('landmark') }}" placeholder="Landmark" class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-slate-500 focus:ring-2 focus:ring-slate-200 outline-none">
                        
                    </div>

                      
                </div>

                  
            </div>


                        {{-- Footer --}}
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end gap-3">
                <a href="{{ route('profile') }}"
                   class="px-5 py-2.5 rounded-lg border border-gray-300
                          text-sm font-medium text-gray-700 hover:bg-gray-100">
                    Cancel
                </a>

                <button type="submit"
                        class="px-5 py-2.5 rounded-lg bg-black
                               text-sm font-medium text-white hover:bg-black">
                    Save Changes
                </button>
            </div>

        </form>

    </div>


    </div>
</div>
@endsection