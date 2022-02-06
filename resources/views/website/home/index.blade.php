@extends('website.layout')
@section('title', 'Home')

@section('content')
    @include('website.home.intro')
    @include('website.home.brief')
    {{-- @include('website.home.product-list') --}}
@endsection
