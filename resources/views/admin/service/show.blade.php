@extends('layout.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="bs-example" data-example-id="contextual-panels">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"> {!! $service->name !!} </h3>
                    <!--<i class="glyphicon glyphicon-share"></i>-->
                </div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <th>Nome</th>
                        <th></th>
                        </thead>
                        <tbody>
                        @foreach($service->Commands as $command)

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

            </div>
        </div>
    </div>
</div>
@endsection
