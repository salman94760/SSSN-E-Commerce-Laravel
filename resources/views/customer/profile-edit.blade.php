@extends('layouts.customer.customer-layout')

@section('title', 'SSSN | PROFILE UPDATE')

@section('customerContent')

<section class="bg-white border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <span class="text-xs uppercase tracking-widest text-gray-400">Account Settings</span>
        <h1 class="text-4xl font-bold mt-3">Edit Profile</h1>
        <p class="text-gray-500 mt-2">
            Update your personal information and delivery details.
        </p>
    </div>
</section>

<section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <form action="{{route('profile.update', auth()->user()->id)}}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="bg-white border border-gray-200 rounded-3xl p-6 sm:p-8">
            <div>
                <span class="text-xs uppercase tracking-widest text-gray-400">Profile</span>
                <h2 class="text-xl font-bold mt-1">Profile Photo</h2>
            </div>

            <div class="flex flex-col sm:flex-row items-center gap-6 mt-7">
                <div class="relative w-28 h-28">
                    @if(auth()->user()->userInfo?->image)
                    <img id="profilePreview" src="{{ asset('storage/' . auth()->user()->userInfo->image) }}" class="w-full h-full object-cover rounded-full border-4 border-white shadow-lg">
                    @else
                    <div id="profilePreview" class="w-full h-full rounded-full bg-black text-white flex items-center justify-center text-4xl font-bold">
                        {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                    </div>
                    @endif
                </div>

                <div>
                    <label
                        class="inline-flex items-center
                               px-5 py-3
                               rounded-xl
                               bg-black text-white
                               text-sm font-semibold
                               cursor-pointer
                               hover:bg-gray-800">

                        Choose New Photo

                        <input
                            type="file"
                            name="image"
                            accept="image/*"
                            class="hidden"
                            onchange="previewImage(event)">

                    </label>

                    <p class="text-xs text-gray-400 mt-3">
                        JPG, PNG or WEBP. Maximum 2MB.
                    </p>

                    @error('image')
                        <p class="text-xs text-red-500 mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

            </div>

        </div>


        {{-- PERSONAL DETAILS --}}
        <div class="bg-white
                    border border-gray-200
                    rounded-3xl
                    p-6 sm:p-8">

            <div>

                <span class="text-xs uppercase
                             tracking-widest text-gray-400">
                    Personal Information
                </span>

                <h2 class="text-xl font-bold mt-1">
                    Basic Details
                </h2>

            </div>


            <div class="grid sm:grid-cols-2
                        gap-5 mt-7">


                {{-- NAME --}}
                <div>

                    <label class="block text-sm
                                  font-semibold mb-2">
                        Full Name <x-required />
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', auth()->user()->name) }}"
                        placeholder="Enter your name"
                        class="w-full h-12 px-4
                               rounded-xl
                               border border-gray-200
                               bg-gray-50
                               focus:bg-white
                               focus:border-black
                               outline-none">

                    @error('name')
                        <p class="text-xs text-red-500 mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- EMAIL --}}
                <div>

                    <label class="block text-sm
                                  font-semibold mb-2">
                        Email Address <x-required />
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', auth()->user()->email) }}"
                        placeholder="Enter your email"
                        class="w-full h-12 px-4
                               rounded-xl
                               border border-gray-200
                               bg-gray-50
                               focus:bg-white
                               focus:border-black
                               outline-none">

                    @error('email')
                        <p class="text-xs text-red-500 mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- PHONE --}}
                <div>

                    <label class="block text-sm
                                  font-semibold mb-2">
                        Phone Number <x-required />
                    </label>

                    <input
                        type="text"
                        name="phone"
                        value="{{ old(
                            'phone',
                            auth()->user()->userInfo?->phone
                        ) }}"
                        placeholder="+91 98765 43210"
                        class="w-full h-12 px-4
                               rounded-xl
                               border border-gray-200
                               bg-gray-50
                               focus:bg-white
                               focus:border-black
                               outline-none">

                    @error('phone')
                        <p class="text-xs text-red-500 mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- ZIPCODE --}}
                <div>

                    <label class="block text-sm
                                  font-semibold mb-2">
                        Zip Code <x-required />
                    </label>

                    <input
                        type="text"
                        name="zipcode"
                        value="{{ old(
                            'zipcode',
                            auth()->user()->userInfo?->zipcode
                        ) }}"
                        placeholder="123456"
                        class="w-full h-12 px-4
                               rounded-xl
                               border border-gray-200
                               bg-gray-50
                               focus:bg-white
                               focus:border-black
                               outline-none">

                    @error('zipcode')
                        <p class="text-xs text-red-500 mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

            </div>

        </div>


        {{-- ADDRESS --}}
        <div class="bg-white
                    border border-gray-200
                    rounded-3xl
                    p-6 sm:p-8">

            <div>

                <span class="text-xs uppercase
                             tracking-widest text-gray-400">
                    Delivery
                </span>

                <h2 class="text-xl font-bold mt-1">
                    Address Details
                </h2>

            </div>


            <div class="space-y-5 mt-7">


                {{-- ADDRESS --}}
                <div>

                    <label class="block text-sm
                                  font-semibold mb-2">
                        Full Address
                    </label>

                    <textarea
                        name="address"
                        rows="4"
                        placeholder="House number, street, area..."
                        class="w-full px-4 py-3
                               rounded-xl
                               border border-gray-200
                               bg-gray-50
                               focus:bg-white
                               focus:border-black
                               outline-none
                               resize-none">{{ old(
    'address',
    auth()->user()->userInfo?->address
) }}</textarea>

                    @error('address')
                        <p class="text-xs text-red-500 mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- LANDMARK --}}
                <div>

                    <label class="block text-sm
                                  font-semibold mb-2">
                        Landmark
                    </label>

                    <input
                        type="text"
                        name="landmark"
                        value="{{ old(
                            'landmark',
                            auth()->user()->userInfo?->landmark
                        ) }}"
                        placeholder="Near school, hospital, market..."
                        class="w-full h-12 px-4
                               rounded-xl
                               border border-gray-200
                               bg-gray-50
                               focus:bg-white
                               focus:border-black
                               outline-none">

                    @error('landmark')
                        <p class="text-xs text-red-500 mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

            </div>

        </div>


        {{-- BUTTONS --}}
        <div class="flex flex-col-reverse
                    sm:flex-row
                    sm:justify-end
                    gap-3">

            <a href="{{ route('profile') }}"
               class="h-12 px-7
                      rounded-xl
                      border border-gray-200
                      bg-white
                      flex items-center
                      justify-center
                      text-sm font-semibold
                      hover:bg-gray-50">

                Cancel

            </a>


            <button
                type="submit"
                class="h-12 px-8
                       rounded-xl
                       bg-black text-white
                       text-sm font-semibold
                       hover:bg-gray-800">

                Save Changes

            </button>

        </div>

    </form>

</section>

<script>

function previewImage(event)
{
    const input = event.target;

    if (!input.files || !input.files[0]) {
        return;
    }

    const reader = new FileReader();

    reader.onload = function(e) {

        const preview = document.getElementById('profilePreview');

        // Agar div hai to img create karo
        if (preview.tagName !== 'IMG') {

            const img = document.createElement('img');

            img.id = 'profilePreview';

            img.className =
                'w-full h-full object-cover rounded-full border-4 border-white shadow-lg';

            preview.replaceWith(img);

            img.src = e.target.result;

        } else {

            preview.src = e.target.result;

        }

    };

    reader.readAsDataURL(input.files[0]);
}

</script>

@endsection



