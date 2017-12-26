@extends ('layouts.app')

@section ('content')
    <img src="/img/{{$images->images}}" class="img-responsive" style="max-width: 250px;opacity: 0.6"/>
    <form method="post" action="/img/edit/{{$images->id}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="file" name="img" id="img" value="{{$images->images}}">
            <input type="hidden" value="{{csrf_token()}}">
            @if ($errors->has('image'))
                <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
            @endif

        </div>
        <button type="submit" class="btn btn-default">Publish</button>
    </form>
@endsection