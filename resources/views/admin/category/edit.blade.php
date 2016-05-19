@extends('layout.app')

@section('content')

<div class="row">

    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="{!! route('category.index') !!}"> Categorias </a> | Editar

                <a href="{!! route('category.active',['id' => $category]) !!}?action=active" type="button"
                   @if($category->active)
                        title="Desativar"><i class="pull-right glyphicon glyphicon-ok-circle"></i>
                    @else
                        title="Ativar"><i class="pull-right glyphicon glyphicon-ban-circle"></i>
                    @endif
                </a>


                <a href="{!! route('category.active',['id' => $category])!!}?action=show" type="button"
                   @if($category->show)
                        title="Não Exibir"><i class="pull-right glyphicon glyphicon-eye-open"></i>
                    @else
                        title="Exibir"><i class="pull-right glyphicon glyphicon-eye-close"></i>
                    @endif
                </a>
            </div>
            <div class="panel-body">

                <form method="post" action="{!! route('category.update',['id' => $category]) !!}" class="form-horizontal" role = 'form'>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="name" value="{!! $category->name !!}"/>

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

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Serviços  <a href="{!! route('service.create',['id'=>$category]) !!}" title="Novo serviço" ><i class="pull-right glyphicon glyphicon-plus"></i></a></div>
                <div class="panel-body">

                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <th>Nome</th>
                            <th>Comandos</th>
                            <th>#</th>
                            </thead>
                            <tbody>
                            @foreach($category->Services as $service)

                                <tr>
                                    <td>{!! $service->name !!}</td>
                                    <td>{!! $service->Commands->count() !!}</td>
                                    <td>
                                        <a href="{!! route('service.edit',['id' => $service])!!}" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>
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

</div>

@endsection