<style>
    .select-control
    {
          border: 1px solid #ccc;
          height: 34px;
          width: 120px;
    }
</style>

<form method="post" action="{!! route('task.store') !!}" class="form-inline">
    <input type="hidden" name="command_id" value="{!! $command !!}"/>

    <div class="form-group">
        <select class="select-control" name="hour">
            <option>Hora</option>
            @for ($i = 0; $i <= 23; $i++)
                <option value="{!! $i !!}">{!! $i !!}</option>
            @endfor
        </select>
    </div>

    <div class="form-group">
        <select class="select-control" name="minutes">
            <option>Minutos</option>
            @for ($i = 0; $i <= 59; $i++)
                <option value="{!! $i !!}">{!! $i !!}</option>
            @endfor
        </select>
    </div>

    <div class="form-group">
        <select class="select-control" name="month">
            <option>Mes</option>
            <option value="*">Todos</option>
            @for ($i = 1; $i <= 12; $i++)
                <option value="{!! $i !!}">{!! $i !!}</option>
            @endfor
        </select>
    </div>

    <div class="form-group">
        <select class="select-control" name="day">
            <option>Dia Mes</option>
            <option value="*">Todos</option>
            @for ($i = 1; $i <= 31; $i++)
                <option value="{!! $i !!}">{!! $i !!}</option>
            @endfor
        </select>
    </div>

    <div class="form-group">
        <select class="select-control" name="week">
            <option>Dia da Semana</option>
            <option value="*">Todos</option>
            <option value="1">Segunda</option>
            <option value="2">Terça</option>
            <option value="3">Quarta</option>
            <option value="4">Quinta</option>
            <option value="5">Sexta</option>
            <option value="6">Sábado</option>
            <option value="0">Domingo</option>
        </select>
    </div>

    <button type="submit" title="Agendar" class="btn btn-info" aria-label="Left Align"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Agendar</button>


</form>

