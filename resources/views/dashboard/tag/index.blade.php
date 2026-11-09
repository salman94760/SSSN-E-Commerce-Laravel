
@extends('layouts.admin.page')

@section('title', 'Tags')

@section('adminPage')

@php
    $status = ['All', 'Active', 'Inactive'];

    $column = ['Actions', '#', 'Tag Name', 'Status'];

    $cardClass = 'overflow-hidden rounded-[26px] border border-white/80 bg-white/65 shadow-[0_15px_45px_rgba(100,75,45,0.06)] backdrop-blur-2xl';
@endphp

<div class="min-h-screen bg-[#f8f5ef] p-4 sm:p-6 lg:p-8">

    <div class="mx-auto max-w-7xl space-y-6">

        {{-- Page Header --}}
        <x-admin.sub-header :arr="[
            'title' => 'Tags',
            'subtitle' => 'Manage your clothing tags.',
            'AddButton' => '+ Add Tag',
            'link' => 'tags.create'
        ]" />

        {{-- Main Card --}}
        <div class="{{ $cardClass }}">

            {{-- Filter Section --}}
            <div class="border-b border-[#e8dccb]/70 bg-[#eee3d3]/25">

                <x-admin.view-filter :arr="[
                    'status' => $status,
                    'searchname' => 'tags',
                    'reset' => '/tags'
                ]" />

            </div>

            {{-- Table Section --}}
            <div class="overflow-x-auto">

                <x-admin.view-table :arr="[
                    'columnArr' => $column
                ]">

                    @forelse($tags as $tag)

                        <tr class="transition duration-200 hover:bg-[#eee3d3]/30">

                            {{-- Actions --}}
                            <td class="whitespace-nowrap px-6 py-4">

                                <div class="flex items-center gap-2">

                                    {{-- Edit Button --}}
                                    <a
                                        href="{{ route('tags.edit', $tag->id) }}"
                                        title="Edit Tag"
                                        aria-label="Edit Tag"
                                        class="inline-flex h-9 w-9 items-center justify-center rounded-xl border border-[#e8dccb] bg-white/80 text-[#6b5540] transition duration-200 hover:border-[#a58a6d] hover:bg-[#eee3d3]"
                                    >
                                        ✎
                                    </a>

                                    {{-- Delete Button --}}
                                    <form
                                        action="{{ route('tags.destroy', $tag->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this tag?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            title="Delete Tag"
                                            aria-label="Delete Tag"
                                            class="inline-flex h-9 w-9 items-center justify-center rounded-xl border border-red-200 bg-red-50/70 text-red-600 transition duration-200 hover:bg-red-100"
                                        >
                                            🗑
                                        </button>

                                    </form>

                                </div>

                            </td>

                            {{-- ID --}}
                            <td class="whitespace-nowrap px-6 py-4">

                                <span class="text-sm font-medium text-[#938778]">
                                    #{{ $tag->id }}
                                </span>

                            </td>

                            {{-- Tag Name --}}
                            <td class="whitespace-nowrap px-6 py-4">

                                <div class="flex items-center gap-3">

                                    {{-- Tag Icon --}}
                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-[#e8dccb] bg-[#eee3d3]/60 text-lg">
                                        🏷️
                                    </div>

                                    <div>

                                        <p class="text-sm font-semibold text-[#5d4936]">
                                            {{ $tag->name }}
                                        </p>

                                        <p class="mt-0.5 text-xs text-[#a58a6d]">
                                            Clothing Tag
                                        </p>

                                    </div>

                                </div>

                            </td>

                            {{-- Status --}}
                            <td class="whitespace-nowrap px-6 py-4">

                                @if($tag->status == 1)

                                    <span class="inline-flex items-center gap-2 rounded-full border border-green-200 bg-green-50 px-3 py-1.5 text-xs font-semibold text-green-700">

                                        <span class="h-2 w-2 rounded-full bg-green-500"></span>

                                        Active

                                    </span>

                                @else

                                    <span class="inline-flex items-center gap-2 rounded-full border border-red-200 bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-700">

                                        <span class="h-2 w-2 rounded-full bg-red-500"></span>

                                        Inactive

                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        {{-- Empty State --}}
                        <tr>

                            <td colspan="4" class="px-6 py-16 text-center">

                                <div class="flex flex-col items-center justify-center">

                                    {{-- Empty Icon --}}
                                    <div class="flex h-16 w-16 items-center justify-center rounded-2xl border border-[#e8dccb] bg-[#eee3d3]/50 text-3xl">
                                        🏷️
                                    </div>

                                    <h3 class="mt-4 text-base font-bold text-[#5d4936]">
                                        No Tags Found
                                    </h3>

                                    <p class="mt-2 max-w-sm text-sm text-[#938778]">
                                        No clothing tags are available. Create your first tag to get started.
                                    </p>

                                    <a
                                        href="{{ route('tags.create') }}"
                                        class="mt-5 inline-flex items-center justify-center rounded-xl bg-[#6b5540] px-5 py-2.5 text-sm font-semibold text-white transition duration-300 hover:bg-[#4e3c2b]"
                                    >
                                        + Add Tag
                                    </a>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </x-admin.view-table>

            </div>

            {{-- Pagination --}}
            <div class="border-t border-[#e8dccb]/70 bg-[#eee3d3]/20">

                <x-admin.view-pagination :arr="[
                    'arrpagination' => $tags
                ]" />

            </div>

        </div>

    </div>

</div>

@endsection
