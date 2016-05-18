@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{!! route('category.index') !!}"> Categorias </a> | Criar
                    </div>
                    <div class="panel-body">

                        <form method="post" action="{!! route('category.store') !!}" class="form-horizontal">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="name"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Exibir</label>
                                    <div class="col-sm-6">
                                        <label class="checkbox-inline"><input type="checkbox" name="show" value="1"></label>
                                    </div>
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


