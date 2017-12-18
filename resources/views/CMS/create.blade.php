@extends('layouts.app')

@section ('content')

    <form method="post" action="/cms/create" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>
        <div class="form-group">
            <label>Type</label>
            <input type="text" class="form-control" name="type" id="type" required>
        </div>
        <div class="form-group">
            <label>Category</label>
            <select name="cate_id" class="form-control" style="height:36px">
                <option>Select Vehicle</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->cate }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" name="desc" id="desc" required>
        </div>
        <div class="form-group">
            <label>Color</label>
            <input type="text" class="form-control" name="color" id="color" required>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="number" class="form-control" name="price" id="price" required>
        </div>
        <div class="form-group">
            <label>Count</label>
            <input type="number" class="form-control" name="count" id="count" required>
        </div>
        <button type="submit" class="btn btn-default">Publish</button>
    </form>
@endsection
