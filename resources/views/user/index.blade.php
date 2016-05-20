@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"> Usuarios  <a href="{!! route('user.register') !!}" title="Nova categoria" ><i class="pull-right glyphicon glyphicon-plus"></i></a> </div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>#</th>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{!! $user->name !!}</td>
                                <td>{!! $user->email !!}</td>
                                <td>
                                    <a href="{!! route('user.edit',['id' => $user]) !!}" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a href="{!! route('user.delete',['id'=>$user]) !!}" title="Excluir"><i class="glyphicon glyphicon-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection