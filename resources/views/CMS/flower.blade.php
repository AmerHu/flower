<div class="row">
    <div class="col-md-6">
        <h1><a href="/cms/flowers/{{ $flower->id }}">{{ $flower->name }}</a></h1>
        <h3>Type : {{ $flower->type }}</h3>
        <h3>Description : {{ $flower->desc }}</h3>
        <h3>Color : {{ $flower->color }}</h3>
        <h3>Price : {{ $flower->price }}</h3>
        <h3>Count : {{ $flower->count }}</h3>
        <a class="btn btn-primary" type="button" href="/cms/{{$flower->id}}/edit">edit</a>
        <a class="btn btn-danger delete" type="button" href="/cms/delete/{{$flower->id}}">delete</a>

        <hr/>
    </div>
    <div class="col-md-6">
        @foreach($flower->images as $image )
            @if ($loop->first)
                <img src="/img/{{ $image->images }}" style="height: 337px" class="img-responsive">
            @endif

        @endforeach
    </div>

</div>