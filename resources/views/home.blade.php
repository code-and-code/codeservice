@extends('layout.app')

@section('content')

    @include('_categories',['categories' => $categories])

@endsection