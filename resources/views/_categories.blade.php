@if($categories->count())

    @foreach($categories as $category)

        <div class="list-group">
            <a href="{!! route('getservices', ['id'=>$category]) !!}" class="list-group-item active">
                <h4 class="list-group-item-heading">{!! $category->name !!} </h4>
                <p class="list-group-item-text">Total de Serviços {!! $category->Services->count() !!}</p>
            </a>
        </div>

    @endforeach

@else
    <div class="alert alert-danger" role="alert">
        <strong>Ops!</strong> Essa Categoria não existe.
    </div>
@endif