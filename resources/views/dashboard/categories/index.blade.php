
@extends('layouts.admin.page')

@section('title', 'Categories')

@section('adminPage')

@php
    $status = ['All', 'Active', 'Inactive'];

    $column = [
        'Action',
        '#',
        'Category',
        'Slug',
        'Status',
        'Image'
    ];
@endphp

<div class="min-h-screen bg-[#f8f5ef] p-4 sm:p-6 lg:p-8">

    <div class="mx-auto max-w-7xl space-y-6">

        {{-- Page Header --}}
        <x-admin.sub-header :arr="[
            'title' => 'Categories',
            'subtitle' => 'Manage your clothing categories.',
            'AddButton' => '+ Add Category',
            'link' => 'categories.create'
        ]" />

        {{-- Category Filters --}}
        <x-admin.view-filter :arr="[
            'status' => $status,
            'searchname' => 'categories',
            'reset' => '/categories'
        ]" />

        {{-- Categories Table --}}
        <x-admin.view-table :arr="[
            'columnArr' => $column
        ]">

            @forelse($categories as $category)

                <tr>

                    {{-- Actions --}}
                    <td class="whitespace-nowrap">

                        <div class="flex items-center gap-2">

                            {{-- Edit --}}
                            <a
                                href="{{ route('categories.edit', $category->id) }}"
                                title="Edit Category"
                                class="flex h-9 w-9 items-center justify-center rounded-xl border border-[#e8dccb] bg-white/70 text-[#6b5540] transition-all duration-300 hover:-translate-y-0.5 hover:bg-[#eee3d3]"
                            >
                                ✎
                            </a>

                            {{-- Delete --}}
                            <form
                                action="{{ route('categories.destroy', $category->id) }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this category?')"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    title="Delete Category"
                                    class="flex h-9 w-9 items-center justify-center rounded-xl border border-red-200 bg-red-50 text-red-600 transition-all duration-300 hover:-translate-y-0.5 hover:bg-red-100"
                                >
                                    🗑
                                </button>

                            </form>

                        </div>

                    </td>

                    {{-- Category ID --}}
                    <td class="whitespace-nowrap font-medium text-[#938778]">
                        #{{ $category->id }}
                    </td>

                    {{-- Category Name --}}
                    <td class="whitespace-nowrap">

                        <div class="font-semibold text-[#5d4936]">
                            {{ $category->name }}
                        </div>

                    </td>

                    {{-- Slug --}}
                    <td class="whitespace-nowrap">

                        <span class="rounded-lg bg-[#eee3d3]/60 px-3 py-1.5 text-xs font-medium text-[#796a59]">
                            {{ $category->slug }}
                        </span>

                    </td>

                    {{-- Status --}}
                    <td class="whitespace-nowrap">

                        @if($category->status == 1)

                            <span class="inline-flex items-center gap-1.5 rounded-full bg-green-100 px-3 py-1.5 text-xs font-semibold text-green-700">

                                <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                Active

                            </span>

                        @else

                            <span class="inline-flex items-center gap-1.5 rounded-full bg-red-100 px-3 py-1.5 text-xs font-semibold text-red-700">

                                <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                Inactive

                            </span>

                        @endif

                    </td>

                    {{-- Category Image --}}
                    <td>

                        @if($category->image)

                            <img
                                src="{{ asset('storage/' . $category->image) }}"
                                alt="{{ $category->name }}"
                                loading="lazy"
                                class="h-16 w-16 rounded-xl border border-[#e8dccb] bg-white object-cover shadow-sm"
                            >

                        @else

                            <div class="flex h-16 w-16 items-center justify-center rounded-xl border border-[#e8dccb] bg-[#eee3d3] text-2xl text-[#938778]">
                                📂
                            </div>

                        @endif

                    </td>

                </tr>

            @empty

                {{-- Empty State --}}
                <tr>

                    <td colspan="{{ count($column) }}" class="py-16 text-center">

                        <div class="flex flex-col items-center justify-center">

                            <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-[#eee3d3] text-3xl text-[#a58a6d]">
                                📂
                            </div>

                            <h3 class="mt-4 text-sm font-semibold text-[#6b5540]">
                                No Categories Found
                            </h3>

                            <p class="mt-2 text-xs text-[#a58a6d]">
                                Add your first clothing category to get started.
                            </p>

                            <a
                                href="{{ route('categories.create') }}"
                                class="mt-5 inline-flex items-center rounded-xl bg-[#6b5540] px-5 py-2.5 text-xs font-semibold text-white transition-all duration-300 hover:-translate-y-0.5 hover:bg-[#4e3c2b]"
                            >
                                + Add Category
                            </a>

                        </div>

                    </td>

                </tr>

            @endforelse

        </x-admin.view-table>

        {{-- Pagination --}}
        <x-admin.view-pagination :arr="[
            'arrpagination' => $categories
        ]" />

    </div>

</div>

@endsection
