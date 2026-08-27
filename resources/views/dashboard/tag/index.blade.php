@extends('layouts.admin')

@section('title', 'Add tags')

@section('breadcrumb', 'tags')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <h1 class="text-2xl font-bold text-slate-800">
                Tags
            </h1>

            <p class="mt-1 text-sm text-slate-500">
                Manage your clothing tags
            </p>
        </div>

        <a
            href="{{ route('tags.create') }}"
            class="inline-flex items-center justify-center rounded-lg bg-slate-800 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-slate-700"
        >
            + Add Tag
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


    {{-- tags Table --}}
    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

        <div class="overflow-x-auto">
            {{-- Filter --}}
<div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">

    <form
        action="{{ route('tags.index') }}"
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
                placeholder="Search tag..."
                class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm outline-none focus:border-slate-800 focus:ring-2 focus:ring-slate-200"
            >
        </div>


        {{-- Status --}}
        <div class="w-full lg:w-44">
            <label class="mb-1.5 block text-xs font-medium text-slate-600">
                Status
            </label>

            <select
                name="status"
                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm outline-none focus:border-slate-800 focus:ring-2 focus:ring-slate-200"
            >
                <option value="">All Status</option>

                <option
                    value="1"
                    {{ request('status') === '1' ? 'selected' : '' }}
                >
                    Active
                </option>

                <option
                    value="0"
                    {{ request('status') === '0' ? 'selected' : '' }}
                >
                    Inactive
                </option>
            </select>
        </div>


        {{-- Sort --}}
        <div class="w-full lg:w-44">
            <label class="mb-1.5 block text-xs font-medium text-slate-600">
                Sort
            </label>

            <select
                name="sort"
                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm outline-none focus:border-slate-800 focus:ring-2 focus:ring-slate-200"
            >
                <option value="latest">Newest</option>

                <option
                    value="oldest"
                    {{ request('sort') === 'oldest' ? 'selected' : '' }}
                >
                    Oldest
                </option>

                <option
                    value="asc"
                    {{ request('sort') === 'name_asc' ? 'selected' : '' }}
                >
                    Name A-Z
                </option>

                <option
                    value="desc"
                    {{ request('sort') === 'name_desc' ? 'selected' : '' }}
                >
                    Name Z-A
                </option>
            </select>
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
            href="{{ route('tags.index') }}"
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
                            Tag
                        </th>

                       

                        <th class="px-6 py-4 font-semibold text-slate-600">
                            Status
                        </th>

                      

                        <th class="px-6 py-4 text-right font-semibold text-slate-600">
                            Action
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-slate-100">

                    @forelse($tags as $b)

                        <tr class="transition hover:bg-slate-50">

                            {{-- ID --}}
                            <td class="whitespace-nowrap px-6 py-4 text-slate-500">
                                {{ $b->id }}
                            </td>


                            {{-- Name --}}
                            <td class="whitespace-nowrap px-6 py-4">

                                <div class="font-medium text-slate-800">
                                    {{ $b->name }}
                                </div>

                            </td>


                           


                            {{-- Status --}}
                            <td class="whitespace-nowrap px-6 py-4">

                                @if($b->status)

                                    <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                        Active
                                    </span>

                                @else

                                    <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
                                        Inactive
                                    </span>

                                @endif

                            </td>



                            {{-- Actions --}}
                            <td class="whitespace-nowrap px-6 py-4 text-right">

                                <div class="flex justify-end gap-2">

                                    {{-- Edit --}}
                                    <a
                                        href="{{ route('tags.edit', $b->id) }}"
                                        class="rounded-lg border border-slate-200 px-3 py-2 text-xs font-medium text-slate-600 transition hover:bg-slate-100"
                                    >
                                        Edit
                                    </a>


                                    {{-- Delete --}}
                                    <form
                                        action="{{ route('tags.destroy', $b->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this Tag?')"
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
                                        No tags found
                                    </p>

                                    <p class="mt-1 text-xs text-slate-400">
                                        Add your first clothing Tag.
                                    </p>

                                    <a
                                        href="{{ route('tags.create') }}"
                                        class="mt-4 inline-block text-sm font-semibold text-slate-800 hover:underline"
                                    >
                                        + Add Tag
                                    </a>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>
            @if($tags->hasPages())

    <div class="flex flex-col gap-4 border-t border-slate-200 bg-white px-6 py-4 sm:flex-row sm:items-center sm:justify-between">

        {{-- Showing --}}
        <p class="text-sm text-slate-500">
            Showing
            <span class="font-semibold text-slate-700">
                {{ $tags->firstItem() }}
            </span>

            to

            <span class="font-semibold text-slate-700">
                {{ $tags->lastItem() }}
            </span>

            of

            <span class="font-semibold text-slate-700">
                {{ $tags->total() }}
            </span>

            Tags
        </p>


        {{-- Pagination --}}
        <div>
            {{ $tags->links() }}
        </div>

    </div>

@endif
        </div>

    </div>

</div>

@endsection