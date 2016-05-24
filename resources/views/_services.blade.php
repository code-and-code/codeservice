@if($services->count())

    <div class="row">
    @foreach($services as $service)


            <div class="col-md-4">
                <div class="bs-example" data-example-id="contextual-panels">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"> {!! $service->name !!} </h3>
                            <h4 class="panel-title badge pull-right"> {!! $service->Category->name !!} </h4>
                            <!--<i class="glyphicon glyphicon-share"></i>-->
                        </div>

                        <div class="panel-body" style="height: 200px !important;">
                            <table class="table">
                                <thead>
                                <th>Nome</th>
                                <th>#</th>
                                </thead>
                                <tbody>
                                @foreach($service->Commands->take(3) as $command)

                                    <tr>
                                        <td>{!! $command->name !!}</td>
                                        <td>
                                            <a href="{!! route('command.exec',['id' => $command])!!}" title="Excutar"><i class="glyphicon glyphicon-play-circle"></i></a>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>

                            </table>
                        </div>
                        <div class="panel-footer" style="height: 30px !important;">
                            @if($service->Commands->count() > 3)
                                <a href="/{!!$service->slug !!}">  Mais... </a>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
    @endforeach
    </div>

@else

    <div class="alert alert-danger" role="alert">
        <strong>Ops!</strong> Esse Serviço não existe.
    </div>

@endif
