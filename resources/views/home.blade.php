<style>
    .center {
        margin: auto;
    }
</style>

@extends('layout.app')

@section('content')

    <form method="post" action="{!! route($action) !!}" class="navbar " role="search">
        <div class="row">
            <div class="col-lg-8 input-group center">
                <input type="text" name="search" class="form-control" placeholder="Pesquisar">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Pesquisar</button>
                 </span>
            </div>
        </div>
    </form>

    @include('_'.$action,[$action => $data])

@endsection

