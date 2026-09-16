@extends('layouts.admin.admin')

@section('title', 'Admin Dashboard')



@section('content')

<div class="space-y-6">




    {{-- Dashboard Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">

        {{-- Users --}}
        @can('isAdmin')
        <x-admin-dashboard-cards link="users.index" title="Users" subTitle="Manage users →" :count="$allUsers"></x-admin-dashboard-cards>
        <x-admin-dashboard-cards link="users.index" title="Sellers" subTitle="Manage sellers →" :count="$allSellers"></x-admin-dashboard-cards>
        @endcan
        <x-admin-dashboard-cards link="categories.index" title="Categories" subTitle="Manage categories →" :count="$categories"></x-admin-dashboard-cards>
        <x-admin-dashboard-cards link="brands.index" title="brands" subTitle="Manage brands →" :count="$brands"></x-admin-dashboard-cards>
        <x-admin-dashboard-cards link="colors.index" title="colors" subTitle="Manage colors →" :count="$colors"></x-admin-dashboard-cards>
        <x-admin-dashboard-cards link="sizes.index" title="sizes" subTitle="Manage sizes →" :count="$sizes"></x-admin-dashboard-cards>
        <x-admin-dashboard-cards link="products.index" title="Products" subTitle="Manage products →" :count="$products"></x-admin-dashboard-cards>
        <x-admin-dashboard-cards link="admin.orders" title="Orders" subTitle="Manage orders →" :count="$ordersCount"></x-admin-dashboard-cards>
        <x-admin-dashboard-cards link="coupons.index" title="Coupons" subTitle="Manage coupons →" :count="$couponsCount"></x-admin-dashboard-cards>
        <x-admin-dashboard-cards link="admin.reviews" title="Reviews" subTitle="Manage reviews →" :count="$reviewsCount"></x-admin-dashboard-cards>
        <x-admin-dashboard-cards link="admin.payments" title="Payments" subTitle="Manage payments →" :count="$toalPayments"></x-admin-dashboard-cards>
        <x-admin-dashboard-cards link="admin.reports" title="Reports" subTitle="View Reports →"></x-admin-dashboard-cards>
    </div>
</div>
@endsection