@extends('layouts.customer.customer-layout')

@section('title', 'SSSN | HOME')
@section('customerContent')

@include('pageparts.home.slider')
@include('pageparts.home.category')
@include('pageparts.home.feature')
@include('pageparts.home.whychooseus')
@include('pageparts.home.couponbanner')
@include('pageparts.home.reviews')
<!-- @include('pageparts.home.feedback') -->
@include('pageparts.home.brands')

@endsection