@extends('layouts.admin.page')

@section('title', 'Sizes')

@section('adminPage')

@php
    $status = ['All','Active','Inactive'];
    $column = ['Action','#','Size','Slug'];
@endphp

<div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
    <div class="mx-auto max-w-7xl">
        <x-admin.sub-header :arr="['title'=>'Sizes','subtitle'=>'Manage your clothing sizes.','AddButton'=>'+ Add Size','link'=>'sizes.create']"/>
                    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                    <x-admin.view-filter :arr="['status'=>$status,'searchname'=>'sizes','reset'=>'/sizes']"/>
                    
                    <x-admin.view-table :arr="['columnArr'=>$column]">
                
                  @forelse($sizes as $Size)

                        <tr class="transition hover:bg-slate-50">

                             <td class="whitespace-nowrap px-6 py-4 text-slate-500">
                                 <a href="{{ route('sizes.edit', $Size->id) }}" title="Edit" class="flex h-9 w-9 items-center justify-center rounded-lg border border-blue-200 text-blue-600 hover:bg-blue-50">✎</a>

                                        <form action="{{ route('sizes.destroy', $Size->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                            @csrf
                                            @method('DELETE')

                                            <button title="Delete" type="submit" class="flex h-9 w-9 items-center justify-center rounded-lg border border-red-200 text-red-600 hover:bg-red-50">🗑
                                            </button>
                                        </form>
                            </td>

                            {{-- ID --}}
                            <td class="whitespace-nowrap px-6 py-4 text-slate-500">
                                {{ $Size->id }}
                            </td>


                            {{-- Name --}}
                            <td class="whitespace-nowrap px-6 py-4">

                                <div class="font-medium text-slate-800">
                                    {{ $Size->name }}
                                </div>

                            </td>


                            {{-- Slug --}}
                            <td class="whitespace-nowrap px-6 py-4 text-slate-500">
                                {{ $Size->slug }}
                            </td>




                        


 

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
                                        No sizes found
                                    </p>

                                    <p class="mt-1 text-xs text-slate-400">
                                        Add your first clothing Size.
                                    </p>

                                    <a
                                        href="{{ route('sizes.create') }}"
                                        class="mt-4 inline-block text-sm font-semibold text-slate-800 hover:underline"
                                    >
                                        + Add Size
                                    </a>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                

                         

                          


           


                    </x-admin.view-table>
                    <x-admin.view-pagination :arr="['arrpagination'=>$sizes]"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>











@endsection