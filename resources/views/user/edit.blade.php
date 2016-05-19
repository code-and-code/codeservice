@extends('layout.app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{!! route('user.index') !!}"> Categorias </a> | Editar
                </div>

                <div class="panel-body">
                    <form method="post" action="{!! route('user.update', ['id'=>$user]) !!}" class="form-horizontal" role = 'form'>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="name" value="{!! $user->name !!}"/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="email" value="{!! $user->email !!}"/>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Editar</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection