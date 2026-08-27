@extends('layouts.admin')

@section('title', 'Category Details')

@section('breadcrumb', 'Categories / ' . $category->name)

@section('content')

<div class="mx-auto max-w-4xl">

    {{-- Header --}}
    <div class="mb-6 flex items-center justify-between">

        <div>
            <h1 class="text-2xl font-bold text-slate-800">
                Category Details
            </h1>

            <p class="mt-1 text-sm text-slate-500">
                View category information
            </p>
        </div>

        <div class="flex gap-2">

            <a
                href="{{ route('categories.edit', $category->id) }}"
                class="rounded-lg bg-slate-800 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-slate-700"
            >
                Edit
            </a>

            <a
                href="{{ route('categories.index') }}"
                class="rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-slate-50"
            >
                Back
            </a>

        </div>

    </div>


    {{-- Category Card --}}
    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

        {{-- Image Section --}}
        <div class="flex justify-center border-b border-slate-200 bg-slate-50 p-8">

            @if($category->image)

                <img
                    src="{{ asset('storage/' . $category->image) }}"
                    alt="{{ $category->name }}"
                    class="h-48 w-48 rounded-xl object-cover shadow-sm"
                >

            @else

                <div class="flex h-48 w-48 items-center justify-center rounded-xl bg-slate-200 text-slate-400">
                    No Image
                </div>

            @endif

        </div>


        {{-- Details --}}
        <div class="p-6">

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                {{-- ID --}}
                <div>
                    <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                        Category ID
                    </p>

                    <p class="mt-1 text-sm font-semibold text-slate-800">
                        #{{ $category->id }}
                    </p>
                </div>


                {{-- Name --}}
                <div>
                    <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                        Category Name
                    </p>

                    <p class="mt-1 text-sm font-semibold text-slate-800">
                        {{ $category->name }}
                    </p>
                </div>


                {{-- Slug --}}
                <div>
                    <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                        Slug
                    </p>

                    <p class="mt-1 text-sm text-slate-600">
                        {{ $category->slug }}
                    </p>
                </div>


                {{-- Status --}}
                <div>
                    <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                        Status
                    </p>

                    <div class="mt-1">

                        @if($category->status)

                            <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                Active
                            </span>

                        @else

                            <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
                                Inactive
                            </span>

                        @endif

                    </div>
                </div>


                {{-- Created At --}}
                <div>
                    <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                        Created At
                    </p>

                    <p class="mt-1 text-sm text-slate-600">
                        {{ $category->created_at->format('d M Y, h:i A') }}
                    </p>
                </div>


                {{-- Updated At --}}
                <div>
                    <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                        Last Updated
                    </p>

                    <p class="mt-1 text-sm text-slate-600">
                        {{ $category->updated_at->format('d M Y, h:i A') }}
                    </p>
                </div>

            </div>

        </div>


        {{-- Footer --}}
        <div class="flex justify-end border-t border-slate-200 bg-slate-50 px-6 py-4">

            <form
                action="{{ route('categories.destroy', $category->id) }}"
                method="POST"
                onsubmit="return confirm('Are you sure you want to delete this category?')"
            >

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="rounded-lg border border-red-200 bg-white px-4 py-2.5 text-sm font-medium text-red-600 transition hover:bg-red-50"
                >
                    Delete Category
                </button>

            </form>

        </div>

    </div>

</div>

@endsection