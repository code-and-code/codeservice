@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{!! route('user.index') !!}"> Ususarios </a> | Criar
                    </div>
                    <div class="panel-body">

                        <form method="post" action="{!! route('user.store') !!}" class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nome</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="name"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" name="email" required autofocus/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Senha</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" name="password" required/>
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