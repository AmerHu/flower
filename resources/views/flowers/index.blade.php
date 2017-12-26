@extends('layouts.app')
@section('content')
    @foreach($flowers as $flower)
        <div class="row">
            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
            <div class="col-md-9">
                @include('flowers.flower')
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
@endsection
