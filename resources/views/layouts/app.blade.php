<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Flower New Day</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/docsearch.min.css" rel="stylesheet">
    <link href="/css/docs.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
@include('layouts.nav')
<div class="container">
    <div class="row">
        <main role="main" class="container">

            <div class="row">

                <div class="col-md-3" style="height:auto ;">
                    @if(auth()->check()===true)
                        <a href="/cms/create" class="btn btn-primary" type="button">create flower</a>
                    @endif
                    <h2>Categories</h2>
                    @include('layouts.sid')
                </div>
                <div class="col-md-9">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<br/>
<!-- Scripts -->
<script src="/js/jquery-3.2.1.slim.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/js/my-js.js"></script>
</body>
</html>
