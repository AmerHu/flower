<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Flowers</a>
        </div>

        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Category</a>
                    <ul class="dropdown-menu">
                        @foreach($categories_name as $category)
                            <li>
                                <a href="/flowers/cate/{{ $category->id }}">{{ $category->cate }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(auth()->check()===true )
                    <li class="nav-item">
                        <a class="nav-link" href="/cms/admin">Admin</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/categories">Category Setting </a>
                    </li>
                    @if(\App\Category::first() !==null)
                        <li class="nav-item">
                            <a class="nav-link" href=" /cms/create">Create Flower</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="/user/index">Users </a>
                    </li>
                    <li>
                        <a href="/logout">
                            <span class="glyphicon glyphicon-log-out"></span>
                            Logout</a>
                    </li>
                @endif
                @if(auth()->check()===false )
                    <li>
                        <a href="/login">
                            <span class="glyphicon glyphicon-log-in"></span>
                            Logout</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
