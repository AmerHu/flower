@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8">
            @foreach($categories as $category)
                <div class="row">
                    <div class="col-md-6">
                        <h1>{{ $category->cate }}</h1>
                    </div>
                    <div class="col-md-3" style="margin-top: 25px">
                        <a href="/cate/edit/{{ $category->id }}" class="btn btn-block btn-primary">Edit</a>
                    </div>
                    <div class="col-md-3" style="padding-top: 25px">
                        <a href="/cate/delete/{{ $category->id }}" class=" btn btn-block btn-danger">Delete</a>
                    </div>
                </div>
                <hr/>
            @endforeach
        </div>
        <div class="col-md-4" style=" border-radius: 10px; background: #c7c7c7;opacity: 0.6;">
            <h1>Create Category</h1>

            <form method="post" action="/cateCreate">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" name="cate" class="form-control" id="cate">
                    @if ($errors->has('cate'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('cate') }}</strong>
                                    </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-default">Publish</button>
            </form>
            <br/>
        </div>
    </div>
@endsection
