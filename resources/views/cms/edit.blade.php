@extends ('layouts.app')

@section ('content')
    <img src="/img/{{$flower->img}}" class="img-responsive" style="max-width: 250px"/>
    <form method="post" action="/cms/{{$flower->id}}/edit" enctype="multipart/form-data"style="opacity: 0.6;">
        {{ csrf_field() }}
        <div class="form-group">

            <label>Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $flower->name }}" required>
            @if ($errors->has('name'))
                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="form-group">
            <label>Category</label>
            <select name="cate_id" class="form-control" style="height:36px">
                <option value="{{ $flower->cate_id }}">Same Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->cate }}
                    </option>
                @endforeach
                @if ($errors->has('type'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                @endif
            </select>
        </div>
        <div class="form-group">
            <label>Type</label>
            <input type="text" class="form-control" name="type" id="type" value="{{$flower->type}}" required>
            @if ($errors->has('cate_id'))
                <span class="help-block">
                                        <strong>{{ $errors->first('cate_id') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" name="desc" id="desc" value="{{$flower->desc}}" required>
            @if ($errors->has('email'))
                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="form-group">
            <label>Color</label>
            <input type="text" class="form-control" name="color" id="color" value="{{$flower->color}}" required>
            @if ($errors->has('color'))
                <span class="help-block">
                                        <strong>{{ $errors->first('color') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="text" class="form-control" name="price" id="price" value="{{$flower->price}}" required>
            @if ($errors->has('price'))
                <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="form-group">
            <label>Count</label>
            <input type="text" class="form-control" name="count" id="count" value="{{$flower->count}}" required>
            @if ($errors->has('count'))
                <span class="help-block">
                                        <strong>{{ $errors->first('count') }}</strong>
                                    </span>
            @endif
        </div>

        <button type="submit" class="btn btn-default">Publish</button>
    </form>
@endsection