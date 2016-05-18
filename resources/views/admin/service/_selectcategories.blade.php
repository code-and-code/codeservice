@inject('category', 'App\Model\Category')

<div class="form-group"{{ $errors->has('category_id') ? ' has-error' : '' }}>
    <label class="col-sm-2 control-label">Categorias</label>
    <div class="col-sm-6">

        <select class="form-control" name="category_id">

            <option>Select..</option>

            @foreach($category->all() as $category)

                @if($id != null)

                    @if($id == $category->id)
                        <option value="{!! $category->id !!}" selected>{!! $category->name !!}</option>
                    @else
                        <option value="{!! $category->id !!}">{!! $category->name !!}</option>
                    @endif
                @else
                    <option value="{!! $category->id !!}">{!! $category->name !!}</option>
                @endif

            @endforeach

        </select>
        @if ($errors->has('category_id'))
            <span class="help-block"><strong>{{ $errors->first('category_id') }}</strong></span>
        @endif

    </div>
</div>