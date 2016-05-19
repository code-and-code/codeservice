@foreach($categories as $category)

    <div class="list-group">
        <a href="{!! url('/services/find/') !!}" class="list-group-item active">
            <h4 class="list-group-item-heading">{!! $category->name !!} </h4>
            <p class="list-group-item-text">Total de Serviços {!! $category->Services->count() !!}</p>
        </a>
    </div>

@endforeach

