@extends ('layouts.app')

@section ('content')
    <img src="/img/{{$flower->img}}" class="img-responsive" style="max-width: 250px"/>
    <form method="post" action="/cms/{{$flower->id}}/edit" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">

            <label>Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $flower->name }}" required>
            @include('layouts.errors')
        </div>

        <div class="form-group">
            <label>Type</label>
            <input type="text" class="form-control" name="type" id="type" value="{{$flower->type}}" required>
            @include('layouts.errors')
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" name="desc" id="desc" value="{{$flower->desc}}" required>
            @include('layouts.errors')
        </div>
        <div class="form-group">
            <label>Color</label>
            <input type="text" class="form-control" name="color" id="color" value="{{$flower->color}}" required>
            @include('layouts.errors')
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="text" class="form-control" name="price" id="price" value="{{$flower->price}}" required>
            @include('layouts.errors')
        </div>
        <div class="form-group">
            <label>Count</label>
            <input type="text" class="form-control" name="count" id="count" value="{{$flower->count}}" required>
            @include('layouts.errors')
        </div>

        <div class="form-group">
            <input type="file" name="img" id="img" value="{{$flower->img}}">
            <input type="hidden" value="{{csrf_token()}}">
        </div>
        <button type="submit" class="btn btn-default">Publish</button>
    </form>
@endsection