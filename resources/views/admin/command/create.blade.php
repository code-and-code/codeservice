@extends('layout.app')


@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="{!! route('category.edit', ['id'=>$id]) !!}"> Comandos </a> | Criar</div>
                    <div class="panel-body">

                        <form method="post" action="{!! route('command.store') !!}" class="form-horizontal">
                                <input type="hidden" name="category_id" value="{!! $id !!}"/>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="name"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <table>
                                        <label for="inputEmail3" class="col-sm-2 control-label">Comando</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="command"/>
                                        </div>
                                    </table>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-btn fa-check"></i>Salvar</button>
                                    </div>
                                </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection