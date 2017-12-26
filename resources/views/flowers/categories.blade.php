@extends('layouts.app')
@section('content')
   @if($result > 0)
    @foreach($flowers as $flower )
        <div class="row">
            <div class="col-md-9">
                <h3>Name :
                    <a href="/flowers/{{ $flower->id }}">{{ $flower->name }}</a>
                </h3>
                <h3>Type : {{ $flower->type }}</h3>
                <h3>Description : {{ $flower->desc }}</h3>
                <h3>Color : {{ $flower->color }}</h3>
                <h3>Price : {{ $flower->price }}</h3>
                <h3>Count : {{ $flower->count }}</h3>
            </div>
            <div class="col-md-3">
                @foreach($flower->images as $image)
                    @if ($loop->first)
                        <img src="/img/{{ $image->images }}" class="img-responsive" style=" padding-top:60px;"/>
                    @endif
                @endforeach
            </div>
        </div>
    @endforeach
    <div class="text-center">
        {{$flowers->links()}}
    </div>
    @endif

@endsection