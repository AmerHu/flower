@extends ('layouts.app')

@section ('content')
    <form method="post" action="/user/edit/{{$user->id}}" enctype="multipart/form-data" style="opacity: 0.6;">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $user->name}}" required>
            @if ($errors->has('name'))
                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" id="email" value="{{ $user->email }}" required>
            @if ($errors->has('email'))
                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="form-group">
            <label>Type</label>
            <input type="password" class="form-control" name="password" id="password" value="{{$user->password}}" required>
            @if ($errors->has('password'))
                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
            @endif
        </div>
        <button type="submit" class="btn btn-default">Publish</button>
    </form>
@endsection