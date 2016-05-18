@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"> Usuarios  <a href="{!! route('user.create') !!}" title="Nova categoria" ><i class="pull-right glyphicon glyphicon-plus"></i></a> </div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <th>Nome</th>
                        <th>#</th>
                        </thead>
                        <tbody>

                            @foreach($users as $user)
                            <tr>
                                <td>{!! $user->name !!}</td>
                                <td>
                                    <a href="" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a href="" title="Novo comando"><i class="glyphicon glyphicon-flash"></i></a>
                                    <a href="" title="Excluir"><i class="glyphicon glyphicon-trash"></i></a>
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