
@extends('layout.app')

@section('content')


    @include('_'.$action,[$action => $data])


@endsection