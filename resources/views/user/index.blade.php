@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-9">
        @foreach($users as $user)
            <div class="row">
                <div class="col-md-4">
                    <h3>
                        {{$user->name}}
                    </h3>
                </div>
                <div class="col-md-4">
                    <h5 style="margin-top: 30px;">
                        {{$user->email}}
                    </h5>
                </div>
                <div class="col-md-2">
                    <a type="button" class="btn btn-block btn-primary" href="/user/edit/{{$user->id}}" style="margin-top: 10px">Edit </a>
                </div>
                <div class="col-md-2">
                    <h5>
                        <a type="button" class="btn btn-block btn-danger" href="/user/delete/{{$user->id}}">Delete </a>
                    </h5>
                </div>
            </div>
            <br/>
        @endforeach
    </div>
    <div class="col-md-3">
        <a type="button" class="btn btn-block btn-primary" href="/register" style="margin-top: 10px">Create New User </a>
    </div>
</div>
@endsection