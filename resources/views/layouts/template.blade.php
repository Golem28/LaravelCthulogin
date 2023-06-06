<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body> 
    <header class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" id="logo" width="45" height="45">
                Cthulogin
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ route('forum') }}">Forum</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('navigator') }}">Navigator</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('forum_overview') }}">Übersicht</a></li>

                        <!-- Logout button -->
                        
                        <li class="nav-item">
                            <form id="logout-form" action="{{ url('logout') }}" method="POST">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary">Logout</button>
                            </form>
                        </li>
                        
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Registration</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </header>

    <div class="container mt-3">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
