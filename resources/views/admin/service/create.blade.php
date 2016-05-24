@extends('layout.app')


@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="{!! route('service.index') !!}"> Serviços </a> | Criar</div>
                    <div class="panel-body">

                        <form method="post" action="{!! route('service.store') !!}" class="form-horizontal">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nome</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="name" id="name"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Slug</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="slug" id="slug" readonly/>
                                    </div>
                                </div>

                                 @include('admin.service._selectcategories',['id'=> $id])

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