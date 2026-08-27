@extends('layouts.customer.customer-layout')

@section('title', 'SSSN | CATEGORY')

@section('customerContent')






{{-- Categories Page --}}
<section class="min-h-screen bg-gray-50">

    {{-- Header --}}
    <div class="bg-black text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

            <span class="text-xs uppercase tracking-[0.25em] text-gray-400">
                Explore
            </span>

            <h1 class="text-4xl md:text-5xl font-bold mt-3">
                Shop by Category
            </h1>

            <p class="text-gray-400 mt-4 max-w-xl">
                Discover collections curated for every style,
                occasion and everyday look.
            </p>

        </div>
    </div>


    {{-- Categories --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">

        <div class="flex items-end justify-between mb-8">

            <div>
                <h2 class="text-2xl font-bold">
                    All Categories
                </h2>

                <p class="text-gray-500 text-sm mt-1">
                    Choose a collection to start shopping.
                </p>
            </div>

            <span class="text-sm text-gray-400">
                {{ $categories->count() }} Categories
            </span>

        </div>


        {{-- Category Grid --}}
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">

            @foreach($categories as $category)

                <a href="{{url('/shop/'.$category->slug)}}"
                   class="group">

                    <div class="relative
                                bg-white
                                rounded-2xl
                                overflow-hidden
                                border border-gray-200
                                hover:shadow-xl
                                transition duration-300">


                        {{-- Image --}}
                        <div class="relative
                                    h-56
                                    overflow-hidden
                                    bg-gray-100">

                            @if($category->image)

                                <img
                                    src="{{ asset('storage/' . $category->image) }}"
                                    alt="{{ $category->name }}"
                                    class="w-full h-full
                                           object-cover
                                           group-hover:scale-105
                                           transition duration-500"
                                >

                            @else

                                <div class="w-full h-full
                                            flex items-center
                                            justify-center
                                            text-gray-300">

                                    <span class="text-4xl">
                                        🛍️
                                    </span>

                                </div>

                            @endif


                            {{-- Overlay --}}
                            <div class="absolute inset-0
                                        bg-gradient-to-t
                                        from-black/60
                                        via-black/10
                                        to-transparent">
                            </div>


                            {{-- Category Name on Image --}}
                            <div class="absolute
                                        bottom-4 left-4 right-4">

                                <h3 class="text-white
                                           text-xl
                                           font-bold">

                                    {{ $category->name }}

                                </h3>

                            </div>


                            {{-- Arrow --}}
                            <div class="absolute
                                        top-4 right-4
                                        w-10 h-10
                                        rounded-full
                                        bg-white
                                        flex items-center
                                        justify-center
                                        opacity-0
                                        translate-y-2
                                        group-hover:opacity-100
                                        group-hover:translate-y-0
                                        transition">

                                →

                            </div>

                        </div>


                        {{-- Bottom --}}
                        <div class="p-4
                                    flex items-center
                                    justify-between">

                            <div>

                                <p class="text-sm
                                          font-semibold">

                                    Explore Collection

                                </p>

                                <p class="text-xs
                                          text-gray-400
                                          mt-1">

                                    {{ $category->products_count ?? '' }}
                                    Products

                                </p>

                            </div>


                            <span class="text-gray-400
                                         group-hover:text-black
                                         group-hover:translate-x-1
                                         transition">

                                →

                            </span>

                        </div>

                    </div>

                </a>

            @endforeach

        </div>


        {{-- Empty State --}}
        @if($categories->count() == 0)

            <div class="bg-white
                        rounded-2xl
                        border border-gray-200
                        py-20
                        text-center">

                <div class="text-5xl">
                    🛍️
                </div>

                <h3 class="text-xl font-bold mt-5">
                    No Categories Found
                </h3>

                <p class="text-gray-500 mt-2">
                    Categories will appear here once they are added.
                </p>

            </div>

        @endif

    </div>

</section>



@endsection