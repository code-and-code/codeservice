@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Servicos  <a href="{!! route('service.create') !!}" title="Nova categoria" ><i class="pull-right glyphicon glyphicon-plus"></i></a> </div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Commandos</th>
                        <th>#</th>
                        </thead>
                        <tbody>
                            @foreach($services as $service)
                                <tr>
                                    <td>{!! $service->id !!}</td>
                                    <td>{!! $service->name !!}</td>
                                    <td>{!! $service->Commands->count() !!}</td>
                                    <td>
                                        <a href="{!! route('service.edit',['id' => $service])  !!}" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>
                                        <a href="{!! route('command.create',['id'=> $service])  !!}" title="Novo comando"><i class="glyphicon glyphicon-flash"></i></a>
                                        <a href="{!! route('service.delete',['id' => $service])!!}" title="Excluir"><i class="glyphicon glyphicon-trash"></i></a>
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

