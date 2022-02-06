@extends('website.layout')
@section('title', 'Categories')

@section('content')
    @include('website.home.brief', ['categories' => $categories])
@endsection
