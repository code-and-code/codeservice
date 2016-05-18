@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{!! route('service.edit', ['id'=>$command]) !!}"> Comando </a> | Editar</div>
                <div class="panel-body">

                    <form method="post" action="{!! route('command.update',['id' => $command]) !!}" class="form-horizontal" role = 'form'>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="name" value="{!! $command->name !!}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Command</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="command" value="{!! $command->command !!}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Editar</button>
                                    <a href="{!! route('command.exec',['id' => $command])!!}" title="Excutar" class="btn btn-danger">Executar</a>
                                </div>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection