<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin</title>

    @section('css')
            <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/bootstrap/js/bootstrap.min.js">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel="stylesheet" type="text/css">

    @show

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}"></a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/categories/') }}">Categorias</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/services/') }}">Serviços</a></li>
            </ul>

            <form method="post" action="{!! route('category.search') !!}" class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="Search">
                </div>
                <button type="submit"  class="btn btn-primary glyphicon glyphicon-search"></button>
            </form>

            @if (Auth::guest())
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{!! route('auth.index') !!}">Entrar</a></li>
                </ul>
            @else

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gerenciar<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{!! url('user')!!}">Usuario</a></li>
                        <li><a href="{{ url('/admin/category/') }}">Categorias</a></li>
                        <li><a href="{{ url('/admin/service/') }}">Serviços</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{!! url('/auth/logout') !!}">Sair</a></li>
                    </ul>
                </li>
            </ul>
            @endif
        </div>
    </div>
</nav>

@include('layout._session_errors')


@if (session('cmd'))
    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
            <ul>
                @foreach (session('cmd') as $cmd)
                    <li>{{ $cmd }}</li>
                @endforeach
            </ul>
    </div>
@endif


    <div class="container">
        @yield('content')
    </div>

    @section('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    @show

</body>
</html>

