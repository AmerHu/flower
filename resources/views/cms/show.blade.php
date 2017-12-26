@extends('layouts.app')
@section ('content')

    <div class="col-md-5" style="margin-bottom:20px">
        <br/>


        <h3>Name : {{ $flower->name }}</h3>
        <h3>Type : {{ $flower->type }}</h3>
        <h3>Description : {{ $flower->desc }}</h3>
        <h3>Color : {{ $flower->color }}</h3>
        <h3>Price : {{ $flower->price }}</h3>
        <h3>Count : {{ $flower->count }}</h3>

        <a class="btn btn-primary" type="button" href="/cms/{{$flower->id}}/edit">edit</a>
        <a class="btn btn-danger" type="button" href="/cms/delete/{{$flower->id}}">Delete</a>


    </div>
    <div class="col-md-2" >
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
    <div class="col-md-5">
        @foreach($flower->images as $image )
            <div class="row">
                <div class="col-md-7">

                    <img src="/img/{{ $image->images }}" class="img-responsive">
                    <br/>
                </div>
                <div class="col-md-5"  style=" padding-top:60px;">
                    <div>
                        <a class="btn btn-primary" type="button" href="/img/edit/{{$image->id}}">edit</a>
                    </div>
                    <div>
                        <a class="btn btn-danger delete" type="button" href="/img/delete/{{$image->id}}">delete</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


@endsection