@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading"><h4>Tarefa</h4></div>

                <div class="panel-body">
                    <table class="table table-hover">

                        <tbody>

                            <tr>
                                <td><strong>Nome</strong></td>
                                <td>{!! $task->Command->name !!}</td>
                            </tr>
                            <tr>
                                <td><strong>Agendamento</strong></td>
                                <td>@include('admin.task._show_date',['dates' => explode(' ',$task->date)])</td>
                            </tr>
                            <tr>
                                <td><strong>Comando</strong></td>
                                <td>{!!$task->Command->command !!}</td>
                            </tr>
                            <tr>
                                <td><strong>Crontab</strong></td>
                                <td>{!! $task->cron !!}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
