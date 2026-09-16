<body class="bg-slate-100 min-h-screen">
    @include('layouts.admin.admin-header')

    {{-- Breadcrumb --}}
    @include('layouts.admin.bread-crum')

    {{-- Main Layout --}}
    <div class="flex min-h-[calc(100vh-120px)]">
        {{-- Sidebar --}}
        <h1>{{ __('messages.welcome') }}</h1>
        <aside class="w-64 bg-white border-r shadow-sm">
            <div class="p-5">
                <div class="w-full">
                    @can('isAdmin')
                    <x-side-bar-button text="Company" link="{{ route('company.index') }}"></x-side-bar-button>
                    <x-side-bar text="Users" :list="['List'=> 'users.index','Add User'=> 'users.create']"></x-side-bar>
                    @endcan
                    <x-side-bar text="Categories" :list="['List'=> 'categories.index','Add Category'=> 'categories.create']"></x-side-bar>
                    <x-side-bar text="Brands" :list="['List'=> 'brands.index','Add Brand'=> 'brands.create']"></x-side-bar>
                    <x-side-bar text="Colors" :list="['List'=> 'colors.index','Add Color'=> 'colors.create']"></x-side-bar>
                    <x-side-bar text="Sizes" :list="['List'=> 'sizes.index','Add Size'=> 'sizes.create']"></x-side-bar>
                    <x-side-bar text="Tags" :list="['List'=> 'tags.index','Add Tag'=> 'tags.create']"></x-side-bar>
                    <x-side-bar text="Products" :list="['List'=> 'products.index','Add Product'=> 'products.create']"></x-side-bar>
                    <x-side-bar-button text="Orders" link="{{ route('admin.orders') }}"></x-side-bar-button>
                    <x-side-bar text="Coupons" :list="['List'=> 'coupons.index','Add Coupon'=> 'coupons.create']"></x-side-bar>
                    <x-side-bar-button text="Payments" link="{{ route('admin.payments') }}"></x-side-bar-button>
                    <x-side-bar-button text="Reviews" link="{{ route('admin.reviews') }}"></x-side-bar-button>
                    <x-side-bar-button text="Reports" link="{{ route('admin.reports') }}"></x-side-bar-button>
                </div>
            </div>
        </aside>

        {{-- Right Content --}}
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>
@include('layouts.admin.admin-footer')