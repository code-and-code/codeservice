@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{!! route('service.index') !!}"> Serviços </a> | Editar</div>
                <div class="panel-body">

                    <form method="post" action="{!! route('service.update',['id' => $service]) !!}" class="form-horizontal" role = 'form'>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="name" id='name' value="{!! $service->name !!}"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Slug</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="slug" id="slug" value="{!! $service->slug !!}" readonly/>
                                </div>
                            </div>

                            @include('admin.service._selectcategories',['id'=> $service->Category->id])

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
            <div class="panel-heading">Comandos  <a href="{!! route('command.create',['id'=>$service]) !!}" title="Nova categoria" ><i class="pull-right glyphicon glyphicon-plus"></i></a></div>
            <div class="panel-body">

                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <th>Nome</th>
                        <th>#</th>
                        </thead>
                        <tbody>
                        @foreach($service->Commands as $command)

                            <tr>
                                <td>{!! $command->name !!}</td>
                                <td>
                                    <a href="{!! route('command.edit',['id' => $command])!!}" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a href="{!! route('command.exec',['id' => $command])!!}" title="Excutar"><i class="glyphicon glyphicon-play-circle"></i></a>
                                    <a href="{!! route('task.create', ['id' => $command])!!}" title="Agendar"><i class="glyphicon glyphicon-calendar"></i></a>
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

    @section('scripts')
        @parent
        <script src="/slug/jquery.stringtoslug.min.js"></script>
        <script src="/slug/speakingurl.min.js"></script>
        <script>

            $(document).ready( function() {
                $("#name").stringToSlug({
                    setEvents: 'keyup keydown blur',
                    getPut: '#slug',
                    space: '-',
                    prefix: '',
                    suffix: '',
                    replace: '',
                    AND: 'and',
                    options: {},
                    callback: false
                });
            });

        </script>
@stop