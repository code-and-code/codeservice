@extends('layout.app')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="{!! route('category.index') !!}"> Categorias </a> | Editar
                @if($category->active)
                    <a href="{!! route('category.active',['id' => $category]) !!}" type="button" title="Desativar"><i class="pull-right glyphicon glyphicon-ban-circle"></i>  </a>
                @else
                    <a href="{!! route('category.active',['id' => $category]) !!}" type="button" title="Ativar"><i class="pull-right glyphicon glyphicon-ok-circle"></i>  </a>
                @endif

                @if($category->show)
                    <a href="{!! route('category.display',['id' => $category]) !!}" type="button" title="Exibir"><i class="pull-right glyphicon glyphicon-eye-open"></i>  </a>
                @else
                    <a href="{!! route('category.display',['id' => $category]) !!}" type="button" title="Não Exibir"><i class="pull-right glyphicon glyphicon-eye-close"></i>  </a>
                @endif
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
                <div class="panel-heading">Comandos  <a href="{!! route('command.create',['id'=>$category]) !!}" title="Nova categoria" ><i class="pull-right glyphicon glyphicon-plus"></i></a></div>
                <div class="panel-body">

                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <th>Nome</th>
                            <th>Categoria</th>
                            <th>#</th>
                            </thead>
                            <tbody>
                            @foreach($category->Commands as $command)

                                <tr>
                                    <td>{!! $command->name !!}</td>
                                    <td>{!! $command->Category->name !!}</td>
                                    <td>
                                        <a href="{!! route('command.edit',['id' => $command])!!}" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>
                                        <a href="{!! route('command.exec',['id' => $command])!!}" title="Excutar"><i class="glyphicon glyphicon-play-circle"></i></a>
                                        <a href="{!! route('command.delete',['id' => $command])!!}" title="Excluir"><i class="glyphicon glyphicon-trash"></i></a>
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