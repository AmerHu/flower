@extends('layouts.app')

@section ('content')
            @foreach($flowers as $flower)
                @include('CMS.flower')
                <hr/>
            @endforeach
@endsection
