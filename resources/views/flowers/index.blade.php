@extends('layouts.app')

@section('content')
        <div class="row">
            @if (session('alert'))
                <div class="alert alert-success">
                    {{ session('alert') }}
                </div>
            @endif
            @foreach($flowers as $flower)
                <div class="col-md-6">
                    @include('flowers.flower')
                    <hr/>
                </div>
                <div class="col-md-6">
                    @foreach($flower->images as $image)
                        @if ($loop->first)
                            <img src="/img/{{ $image->images }}" class="img-responsive"/>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
@endsection
