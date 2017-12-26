@extends('layouts.app')

@section ('content')
    <div class="row">
        @foreach($flowers as $flower)
            @include('cms.flower')
            <br/>
        @endforeach
            <div class="text-center">
                {{$flowers->links()}}
            </div>
    </div>
@endsection
