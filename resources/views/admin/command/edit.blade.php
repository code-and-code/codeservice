@extends('layout.app')

@section('css')
    @parent
    <link href="/jquery.filer/css/jquery.filer.css" type="text/css" rel="stylesheet" />
    <link href="/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet" />
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{!! route('service.edit', ['id'=>$command]) !!}"> Comando </a> | Editar</div>
                <div class="panel-body">

                    <form method="post" action="{!! route('command.update',['id' => $command]) !!}" class="form-horizontal" role = 'form'>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nome</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="name" value="{!! $command->name !!}"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Command</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="command" value="{!! $command->command !!}"  @if(!is_null($command->file)) readonly @endif />
                                </div>
                            </div>

                            @if(!is_null($command->file))
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Arquivo</label>
                                <div class="col-sm-6">
                                    <div class="jFiler-items jFiler-row">
                                        <ul class="jFiler-items-list jFiler-items-grid">
                                            <li class="jFiler-item" data-jfiler-index="1">
                                                <div class="jFiler-item-container">
                                                    <div class="jFiler-item-inner">
                                                        <div class="jFiler-item-thumb">
                                                            <div class="jFiler-item-status"></div>
                                                            <div class="jFiler-item-info">
                                                                <span class="jFiler-item-title"><b title="{!! $command->file !!}">{!! $command->file!!} </b></span>
                                                            </div>
                                                            <div class="jFiler-item-thumb-image">
                                                                <img src="" draggable="false">
                                                            </div>
                                                        </div>
                                                        <div class="jFiler-item-assets jFiler-row">
                                                            <ul class="list-inline pull-left">
                                                                <li>
                                                                    <a href="" class="icon-jfi-file-image jfi-file-ext-png"></a>
                                                                </li>
                                                            </ul>
                                                            <ul class="list-inline pull-right">
                                                                <li>
                                                                    <a href="" data-method="delete" class="icon-jfi-trash jFiler-item-trash-action"></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            @endif

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Editar</button>
                                    <a href="{!! route('command.exec',['id' => $command])!!}"   title="Excutar" class="btn btn-danger">Executar</a>
                                   </div>
                            </div>

                    </form>
                </div>
            </div>
        </div>

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Tarefas</div>
                    <div class="panel-body">
                        @include('admin.task.create',['command'=> $command->id])

                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                <th>Date</th>
                                <th>Job</th>
                                <th>#</th>
                                </thead>
                                <tbody>
                                @foreach($command->Tasks as $task)

                                    <tr>
                                        <td> @include('admin.task._show_date',['dates' => explode(' ',$task->date)])</td>
                                        <td>{!! $task->date !!} {!! $task->Command->command !!}</td>
                                        <td>
                                        <td>
                                            <a href="{!! route('task.delete',['id' => $task])!!}" title="Excluir"><i class="glyphicon glyphicon-trash"></i></a>
                                        </td>
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
</div>
@endsection