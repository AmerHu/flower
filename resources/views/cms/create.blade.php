@extends('layouts.app')

@section ('content')

    <form method="post" action="/cms/create" enctype="multipart/form-data" style="opacity: 0.6;">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" id="name">
            @if ($errors->has('name'))
                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="form-group">
            <label>Type</label>
            <input type="text" class="form-control" name="type" id="type"/>
            @if ($errors->has('type'))
                <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="form-group">
            <label>Category</label>
            <select name="cate_id" class="form-control" style="height:36px">
                <option>Select Vehicle</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->cate }}
                    </option>
                @endforeach
                @if ($errors->has('cate_id'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('cate_id') }}</strong>
                                    </span>
                @endif
            </select>
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" name="desc" id="desc"/>
            @if ($errors->has('desc'))
                <span class="help-block">
                                        <strong>{{ $errors->first('desc') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="form-group">
            <label>Color</label>
            <input type="text" class="form-control" name="color" id="color"/>
            @if ($errors->has('color'))
                <span class="help-block">
                                        <strong>{{ $errors->first('color') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="number" class="form-control" name="price" id="price"/>
            @if ($errors->has('price'))
                <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="form-group">
            <label>Count</label>
            <input type="number" class="form-control" name="count" id="count"/>
            @if ($errors->has('count'))
                <span class="help-block">
                                        <strong>{{ $errors->first('count') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="form-group">
            <input type="file" name="image" id="image">
            <input type="hidden" value="{{ csrf_token() }}">
            @if ($errors->has('image'))
                <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
            @endif
        </div>
        <button type="submit" class="btn btn-default">Publish</button>
    </form>
@endsection
