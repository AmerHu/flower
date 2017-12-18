@extends('layouts.app')
@section('content')

    @foreach($categories as $category )
             <div class="row">
            <div class="col-md-6">
                <h3>Name :
                    <a href="/flowers/{{ $category->flower_id }}">{{ $category->name }}</a>
                </h3>
                <h3>Type : {{ $category->type }}</h3>
                <h3>Description : {{ $category->desc }}</h3>
                <h3>Color : {{ $category->color }}</h3>
                <h3>Price : {{ $category->price }}</h3>
                <h3>Count : {{ $category->count }}</h3>
            </div>
            <div class="col-md-6">
                <img src="/img/{{ $category->images }}" class="img-responsive"/>
            </div>
        </div>
        <hr/>
    @endforeach
@endsection