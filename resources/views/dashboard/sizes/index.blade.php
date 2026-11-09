
@extends('layouts.admin.page')

@section('title', 'Sizes')

@section('adminPage')

@php
    $status = ['All','Active','Inactive'];
    $column = ['Action','#','Size','Slug'];
@endphp

<div class="min-h-screen bg-[#faf9f6] p-4 sm:p-4 lg:p-6">

    <div class="mx-auto max-w-7xl">

        

        <div class="mt-8 overflow-hidden rounded-[28px] border border-white/80 bg-white/65 shadow-[0_15px_45px_rgba(100,75,45,0.06)] backdrop-blur-2xl">

            {{-- Table Header --}}
            <x-admin.sub-header :arr="[
            'eyebrow' =>'Store Management',
            'title' => 'Sizes',
            'subtitle' => 'Manage your clothing sizes.',
            'AddButton' => '+ Add Size',
            'link' => 'sizes.create'
        ]"/>

            {{-- Filters --}}
            <div class="border-b border-[#eee8df]">
                <x-admin.view-filter :arr="[
                    'status' => $status,
                    'searchname' => 'sizes',
                    'reset' => '/sizes'
                ]"/>
            </div>

            {{-- Table --}}
            <div class="overflow-x-auto">

                <table class="w-full min-w-[750px] text-left">

                    <thead>
                        <tr class="bg-[#f9f6f1] text-[9px] font-bold uppercase tracking-[2px] text-[#9b9185]">

                            @foreach($column as $h)
                                <th class="px-6 py-5 sm:px-8">
                                    {{ $h }}
                                </th>
                            @endforeach

                        </tr>
                    </thead>

                    <tbody class="divide-y divide-[#eee8df]">

                        @forelse($sizes as $Size)

                            <tr class="transition hover:bg-[#faf7f2]">

                                {{-- Actions --}}
                                <td class="px-6 py-5 sm:px-8">

                                    <div class="flex items-center gap-2">

                                        <a href="{{ route('sizes.edit', $Size->id) }}"
                                           title="Edit"
                                           class="flex h-9 w-9 items-center justify-center rounded-full border border-[#e7dccd] text-[#a58a6d] transition hover:bg-[#f4eee5]">
                                            ✎
                                        </a>

                                        <form action="{{ route('sizes.destroy', $Size->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this size?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    title="Delete"
                                                    class="flex h-9 w-9 items-center justify-center rounded-full border border-red-100 text-red-500 transition hover:bg-red-50">
                                                🗑
                                            </button>

                                        </form>

                                    </div>

                                </td>

                                {{-- ID --}}
                                <td class="px-6 py-5 text-sm font-semibold text-[#8d8276] sm:px-8">
                                    #{{ $Size->id }}
                                </td>

                                {{-- Color Name --}}
                                <td class="px-6 py-5 sm:px-8">

                                    <div class="flex items-center gap-3">

                                        

                                        <p class="text-sm font-semibold text-[#40372e]">
                                            {{ $Size->name }}
                                        </p>

                                    </div>

                                </td>

                                {{-- Slug --}}
                                <td class="px-6 py-5 text-xs text-[#938a7f] sm:px-8">
                                    {{ $Size->slug }}
                                </td>

                                

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="px-8 py-16 text-center">

                                    <div class="mx-auto max-w-sm">

                                        <div class="text-4xl">
                                            🎨
                                        </div>

                                        <p class="mt-4 text-sm font-semibold text-[#65584a]">
                                            No sizes found
                                        </p>

                                        <p class="mt-2 text-xs text-[#a49a8d]">
                                            Add your first clothing color to get started.
                                        </p>

                                        <a href="{{ route('sizes.create') }}"
                                           class="mt-5 inline-block rounded-full bg-[#a58a6d] px-5 py-3 text-[10px] font-bold uppercase tracking-[2px] text-white transition hover:bg-[#765b3e]">
                                            + Add Size
                                        </a>

                                    </div>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            {{-- Pagination --}}
            <div class="border-t border-[#eee8df] p-4 sm:p-6">

                <x-admin.view-pagination :arr="['arrpagination' => $sizes]"/>

            </div>

        </div>

    </div>

</div>

@endsection



