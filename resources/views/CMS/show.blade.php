@extends('layouts.app')
@section ('content')

    <div class="col-md-6" style="margin-bottom:20px">
        <br/>
        <h3>Name : {{ $flower->name }}</h3>
        <h3>Type : {{ $flower->type }}</h3>
        <h3>Description : {{ $flower->desc }}</h3>
        <h3>Color : {{ $flower->color }}</h3>
        <h3>Price : {{ $flower->price }}</h3>
        <h3>Count : {{ $flower->count }}</h3>

        <a class="btn btn-primary" type="button" href="/cms/{{$flower->id}}/edit">edit</a>
        <a class="btn btn-primary" type="button" href="/cms/{{$flower->id}}/delete">delete</a>

        <hr/>
        <form method="post" action="/cms/flower/img/{{$flower->id}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="file" name="image" id="image">
                <input type="hidden" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="{{ $flower->id }}">
                @include('layouts.errors')
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Add Image</button>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        @foreach($flower->images as $image )
                <img src="/img/{{ $image->images }}" style="height: 337px" class="img-responsive">

        @endforeach
    </div>


@endsection