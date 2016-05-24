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
                    <div class="panel-heading"><a href="{!! route('service.edit', ['id'=>$id]) !!}"> Comandos </a> | Criar</div>
                    <div class="panel-body">

                        <form method="post" action="{!! route('command.store') !!}" class="form-horizontal">
                                <input type="hidden" name="service_id"  id="service_id" value="{!! $id !!}"/>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="name" id="name_str"/>
                                    </div>
                                </div>
                                <div class="form-group" id="command_show">
                                     <label class="col-sm-2 control-label">Comando</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="command"/>
                                        </div>
                                </div>
                                <div class="form-group" id="file_show" style="display:none">
                                      <label class="col-sm-2 control-label">Arquivo</label>
                                        <div class="col-sm-6">
                                            <input type="file" name="file" id="filer_input">
                                        </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-btn fa-check"></i>Salvar</button>
                                        <input type="checkbox" id="button_show"/> Enviar Arquivo
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
    <script src="/jquery.filer/js/jquery.filer.min.js"></script>
    <script>
        $(document).ready(function()
        {

            $("#button_show").click(function(){
                $("#file_show").toggle();
                $("#command_show").toggle();
            });

            var lastUrl = document.referrer;

            $form = $('#jquery-filer');

            $('#filer_input').filer({
                changeInput: '<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-cloud-up-o"></i></div><div class="jFiler-input-text"><h3>Arrastar e soltar arquivos aqui</h3> <span style="display:inline-block; margin: 15px 0">ou</span></div><a class="jFiler-input-choose-btn blue">Procurar Arquivo</a></div></div>',
                maxSize: 1,
                extensions: ['sh'],
                disableImageResize: false,
                imageMaxWidth: 150,
                imageMaxHeight: 150,

                showThumbs: true,
                theme: "dragdropbox",

                progressBar: '<div class="bar"></div>',
                itemAppendToEnd: false,
                removeConfirmation: true,
                _selectors: {
                    list: '.jFiler-items-list',
                    item: '.jFiler-item',
                    progressBar: '.bar',
                    remove: '.jFiler-item-trash-action'
                },

                dragDrop: {
                    dragEnter: null,
                    dragLeave: null,
                    drop: null,
                },

                uploadFile: {
                    url: '{!! route('command.upload') !!}',
                    data: {service:$('#service_id').val() },
                    type: 'POST',
                    enctype: 'multipart/form-data',
                    beforeSend: function(){},

                    success: function(data, el){
                        var parent = el.find(".jFiler-jProgressBar").parent();
                        el.find(".jFiler-jProgressBar").fadeOut("slow", function(){
                            $("<div class=\"jFiler-item-others text-success\"><i class=\"icon-jfi-check-circle\"></i> Success (seconds...)</div>").hide().appendTo(parent).fadeIn("slow");
                        });

                        console.log(data);
                        setTimeout($(location).attr("href", data.route), '1000')
                    },
                    error: function(el){

                        var parent = el.find(".jFiler-jProgressBar").parent();
                        el.find(".jFiler-jProgressBar").fadeOut("slow", function(){
                            $("<div class=\"jFiler-item-others text-error\"><i class=\"icon-jfi-minus-circle\"></i>Error</div>").hide().appendTo(parent).fadeIn("slow");
                        });
                    },
                    statusCode: null,
                    onProgress: null,
                    onComplete: null
                }
            });

        });
    </script>

@stop