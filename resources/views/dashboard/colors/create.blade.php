@extends('layouts.admin.admin')

@section('title', 'Add Color')

@section('breadcrumb', 'Color / Create Color')

@section('content')

<div class="mx-auto max-w-4xl">

    {{-- Page Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-800">
            Add Color
        </h1>

        <p class="mt-1 text-sm text-slate-500">
            Create a new clothing Color
        </p>
    </div>


    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">

            <ul class="list-disc space-y-1 pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
    @endif


    {{-- Form Card --}}
    <div class="rounded-xl border border-slate-200 bg-white shadow-sm">

        <form
            action="{{ route('colors.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            <div class="p-6">

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                    {{-- Color Name --}}
                    <div>
                        <label
                            for="name"
                            class="mb-2 block text-sm font-medium text-slate-700"
                        >
                            Color Name
                            <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="text"
                            name="name"
                            id="name"
                            value="{{ old('name') }}"
                            placeholder="e.g. White"
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-slate-800 focus:ring-2 focus:ring-slate-200"
                        >

                        @error('name')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    {{-- Slug --}}
                    <div>
                        <label
                            for="slug"
                            class="mb-2 block text-sm font-medium text-slate-700"
                        >
                            Slug
                            <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="text"
                            name="slug"
                            id="slug"
                            value="{{ old('slug') }}"
                            placeholder="e.g. white"
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-slate-800 focus:ring-2 focus:ring-slate-200"
                        >

                        @error('slug')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>      

                    {{-- hex_code --}}
                    <div>
                        <label
                            for="slug"
                            class="mb-2 block text-sm font-medium text-slate-700"
                        >
                            Hex Code
                            <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="text"
                            name="hex_code"
                            id="hex_code"
                            value="{{ old('hex_code') }}"
                            placeholder="e.g. #ffffff"
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-slate-800 focus:ring-2 focus:ring-slate-200"
                        >

                        @error('hex_code')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                  


         

                </div>

            </div>


            {{-- Footer --}}
            <div class="flex items-center justify-end gap-3 border-t border-slate-200 bg-slate-50 px-6 py-4">

                <a
                    href="{{ route('categories.index') }}"
                    class="rounded-lg border border-slate-300 bg-white px-5 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-slate-100"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="rounded-lg bg-slate-800 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-slate-700"
                >
                    Add Color
                </button>

            </div>

        </form>

    </div>

</div>

@endsection