@extends('layouts.app')

@section ('content')
    
    
        <div class="col-md-6">
            <h2> {{ $flower->name }}</h2>
            <h3> {{ $flower->desc }}</h3>
            <h3>Type : {{ $flower->type }}</h3>
            <h3>Color : {{ $flower->color }}</h3>
            <h3>Price : {{ $flower->price }}</h3>
            <h3>Count : {{ $flower->count }}</h3>
        </div>
        <div class="col-md-6">
            @if($flower->id !== null)
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        @foreach( $flower->images as $image)
                            <li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}"
                                class="{{ $loop->first ? 'active' : '' }}"></li>
                        @endforeach
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        @foreach($flower->images as $image )
                            <div class="item {{ $loop->first ? ' active' : '' }}">
                                <img src="/img/{{ $image->images }}" style="height: 337px"
                                     class="img-responsive">
                            </div>
                        @endforeach
                    </div>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button"
                       data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button"
                       data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
        </div>
        @endif
@endsection