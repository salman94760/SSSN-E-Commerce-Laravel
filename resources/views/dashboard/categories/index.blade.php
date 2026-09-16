@extends('layouts.admin.page')

@section('title', 'Categories')

@section('adminPage')

@php
    $status = ['All','Active','Inactive'];
    $column = ['Action','#','Category','Slug','Status','Image'];
@endphp

<div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
    <div class="mx-auto max-w-7xl">

        <x-admin.sub-header :arr="['title'=>'Categories','subtitle'=>'Manage your clothing categories.','AddButton'=>'+ Add Category','link'=>'categories.create']"/>

        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                    <x-admin.view-filter :arr="['status'=>$status,'searchname'=>'categories','reset'=>'/categories']"/>
                    
                    <x-admin.view-table :arr="['columnArr'=>$column]">
                    @forelse($categories as $category)

                        <tr class="transition hover:bg-slate-50">


                            <td class="whitespace-nowrap px-6 py-4 text-slate-500">
                                 <a href="{{ route('categories.edit', $category->id) }}" title="Edit" class="flex h-9 w-9 items-center justify-center rounded-lg border border-blue-200 text-blue-600 hover:bg-blue-50">✎</a>

                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                            @csrf
                                            @method('DELETE')

                                            <button title="Delete" type="submit" class="flex h-9 w-9 items-center justify-center rounded-lg border border-red-200 text-red-600 hover:bg-red-50">🗑
                                            </button>
                                        </form>
                            </td>

                            {{-- ID --}}
                            <td class="whitespace-nowrap px-6 py-4 text-slate-500">
                                {{ $category->id }}
                            </td>


                            {{-- Name --}}
                            <td class="whitespace-nowrap px-6 py-4">

                                <div class="font-medium text-slate-800">
                                    {{ $category->name }}
                                </div>

                            </td>


                            {{-- Slug --}}
                            <td class="whitespace-nowrap px-6 py-4 text-slate-500">
                                {{ $category->slug }}
                            </td>


                            {{-- Status --}}
                            <td class="whitespace-nowrap px-6 py-4">

                                @if($category->status)

                                    <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                        Active
                                    </span>

                                @else

                                    <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
                                        Inactive
                                    </span>

                                @endif

                            </td>

                            <td><img class="w-20 h-20" src="{{asset('storage/'.$category->image)}}" /></td>


                            

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="5"
                                class="px-6 py-12 text-center"
                            >

                                <div class="text-slate-400">

                                    <div class="text-4xl">
                                        📂
                                    </div>

                                    <p class="mt-3 text-sm font-medium text-slate-600">
                                        No categories found
                                    </p>

                                    <p class="mt-1 text-xs text-slate-400">
                                        Add your first clothing category.
                                    </p>

                                    <a
                                        href="{{ route('categories.create') }}"
                                        class="mt-4 inline-block text-sm font-semibold text-slate-800 hover:underline"
                                    >
                                        + Add Category
                                    </a>

                                </div>

                            </td>

                        </tr>

                    @endforelse
                    </x-admin.view-table>
                    <x-admin.view-pagination :arr="['arrpagination'=>$categories]"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection









