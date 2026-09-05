@extends('layouts.admin.admin')

@section('title', 'Add Size')

@section('breadcrumb', 'sizes / Create Size')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <h1 class="text-2xl font-bold text-slate-800">
                Sizes
            </h1>

            <p class="mt-1 text-sm text-slate-500">
                Manage your clothing sizes
            </p>
        </div>

        <a
            href="{{ route('sizes.create') }}"
            class="inline-flex items-center justify-center rounded-lg bg-slate-800 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-slate-700"
        >
            + Add Size
        </a>

    </div>


    {{-- Success Message --}}
    @if(session('success'))
        <div class="flex items-center justify-between rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">

            <span>
                {{ session('success') }}
            </span>

            <button
                type="button"
                onclick="this.parentElement.remove()"
                class="font-bold hover:text-green-900"
            >
                ×
            </button>

        </div>
    @endif


    {{-- sizes Table --}}
    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

        <div class="overflow-x-auto">
       {{-- Filter --}}
<div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">

    <form
        action="{{ route('sizes.index') }}"
        method="GET"
        class="flex flex-col gap-3 lg:flex-row lg:items-end"
    >

        {{-- Search --}}
        <div class="flex-1">
            <label class="mb-1.5 block text-xs font-medium text-slate-600">
                Search
            </label>

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search Size..."
                class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm outline-none focus:border-slate-800 focus:ring-2 focus:ring-slate-200"
            >
        </div>






        {{-- Filter Button --}}
        <button
            type="submit"
            class="rounded-lg bg-slate-800 px-5 py-2.5 text-sm font-semibold text-white hover:bg-slate-700"
        >
            Filter
        </button>


        {{-- Reset --}}
        <a
            href="{{ route('sizes.index') }}"
            class="rounded-lg border border-slate-300 bg-white px-5 py-2.5 text-center text-sm font-medium text-slate-600 hover:bg-slate-50"
        >
            Reset
        </a>

    </form>

</div>
            <table class="w-full text-left text-sm">

                <thead class="border-b border-slate-200 bg-slate-50">

                    <tr>

                        <th class="px-6 py-4 font-semibold text-slate-600">
                            #
                        </th>

                        <th class="px-6 py-4 font-semibold text-slate-600">
                            Size
                        </th>

                        <th class="px-6 py-4 font-semibold text-slate-600">
                            Slug
                        </th>

                      

                        <th class="px-6 py-4 text-right font-semibold text-slate-600">
                            Action
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-slate-100">

                    @forelse($sizes as $Size)

                        <tr class="transition hover:bg-slate-50">

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




                        


                            {{-- Actions --}}
                            <td class="whitespace-nowrap px-6 py-4 text-right">

                                <div class="flex justify-end gap-2">

                                    {{-- Edit --}}
                                    <a
                                        href="{{ route('sizes.edit', $Size->id) }}"
                                        class="rounded-lg border border-slate-200 px-3 py-2 text-xs font-medium text-slate-600 transition hover:bg-slate-100"
                                    >
                                        Edit
                                    </a>


                                    {{-- Delete --}}
                                    <form
                                        action="{{ route('sizes.destroy', $Size->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this Size?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="rounded-lg border border-red-200 px-3 py-2 text-xs font-medium text-red-600 transition hover:bg-red-50"
                                        >
                                            Delete
                                        </button>

                                    </form>

                                </div>

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

                </tbody>

            </table>
            <x-admin-page-pagination :pagArray="$sizes" title="sizes"></x-admin-page-pagination>

        </div>

    </div>

</div>

@endsection