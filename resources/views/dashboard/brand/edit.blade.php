@extends('layouts.admin.page')

@section('title', 'Edit brand')

@section('adminPage')

<div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
    <div class="mx-auto max-w-7xl">

        <x-admin.sub-header :arr="['title'=>'Edit brand','subtitle'=>'Edit clothing brand.']"/>

        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                    <x-admin.view-table>
    <div class="rounded-xl border border-slate-200 bg-white shadow-sm">

        <form
            action="{{ route('brand.update',$brand->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method("PUT")

            <div class="p-6">

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                    {{-- brand Name --}}
                    <div>
                        <label
                            for="name"
                            class="mb-2 block text-sm font-medium text-slate-700"
                        >
                            brand Name
                            <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="text"
                            name="name"
                            id="name"
                            value="{{ $brand->name?$brand->name:old('name') }}"
                            placeholder="e.g. T-Shirt"
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
                            value="{{ $brand->slug?$brand->slug:old('slug') }}"
                            placeholder="e.g. t-shirt"
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-slate-800 focus:ring-2 focus:ring-slate-200"
                        >

                        @error('slug')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    {{-- brand Image --}}
                    <div>
                        <label
                            for="image"
                            class="mb-2 block text-sm font-medium text-slate-700"
                        >
                            brand Image
                            <span class="font-normal text-slate-400">
                                (Optional)
                            </span>
                        </label>

                        <input
                            type="file"
                            name="image"
                            id="image"
                            accept="image/jpeg,image/png,image/webp"
                            class="block w-full rounded-lg border border-slate-300 bg-white text-sm text-slate-500 file:mr-4 file:border-0 file:bg-slate-800 file:px-4 file:py-2.5 file:text-sm file:font-medium file:text-white hover:file:bg-slate-700"
                        >

                        @error('image')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    {{-- Status --}}
                    <div>
                        <label
                            for="status"
                            class="mb-2 block text-sm font-medium text-slate-700"
                        >
                            Status
                        </label>

                        <select
                            name="status"
                            id="status"
                            class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm outline-none focus:border-slate-800 focus:ring-2 focus:ring-slate-200"
                        >

                            <option value="1" {{ $brand->status == 1 ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="0" {{ $brand->status === '0' ? 'selected' : '' }}>
                                Inactive
                            </option>

                        </select>

                        @error('status')
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
                    href="{{ route('brands.index') }}"
                    class="rounded-lg border border-slate-300 bg-white px-5 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-slate-100"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="rounded-lg bg-slate-800 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-slate-700"
                >
                    Edit brand
                </button>

            </div>

        </form>

    </div>
                    </x-admin.view-table>
                   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection









