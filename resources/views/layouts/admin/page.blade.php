@include('layouts.admin.header')

<div class="min-h-screen">


    <!-- ========================================================= -->
    <!-- SIDEBAR -->
    <!-- ========================================================= -->

    @include('layouts.admin.sidebar')


    <!-- ========================================================= -->
    <!-- MAIN -->
    <!-- ========================================================= -->

    <main class="lg:pl-64">


        <!-- TOPBAR -->
        @include('layouts.admin.topbar')


        <!-- CONTENT -->
        @yield('adminPage')

@include('layouts.admin.footer')