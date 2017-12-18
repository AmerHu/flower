@if(($errors))
    <div class="alert-danger">

            @foreach($errors->all() as $error)
              {{ $error }}
            @endforeach

    </div>
@endif