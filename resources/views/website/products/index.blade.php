@extends('website.layout')
@section('title', 'Products')

@section('content')
    @include('website.home.product-list', ['products' => $products])
@endsection
