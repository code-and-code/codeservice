<style>
    .center {
        margin: auto;
    }
</style>

@extends('layout.app')

@section('content')

        <form method="post" action="{!! route($search.'.search') !!}" class="navbar" role="search">
            <div class="input-group col-lg-6 center">
                <input type="text" name="search" class="form-control" placeholder="Pesquisar {{$action}} ">
                <span class="input-group-btn">
                    <button class="btn btn-secondary glyphicon glyphicon-search" type="submit"></button>
                </span>
            </div>
        </form>

    @include('_'.$action,[$action => $data])

@endsection