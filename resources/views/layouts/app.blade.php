<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{ env('APP_URL', 'http://localhost/mealify/public') }}">

    <title>{{ config('app.name', 'Laravel') }} {{ isset($name) ? ' | ' . $name : ''}}</title>

    <!-- Styles -->
    <link href="css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <nav class="navbar navbar-light bg-white">
        <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2" aria-controls="exCollapsingNavbar2" aria-expanded="false" aria-label="Toggle navigation">
            &#9776;
        </button>
        <div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="img/logo-with-text.svg" height="50" alt="">
            </a>
            <ul class="nav navbar-nav pull-xs-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/register') }}">Register</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="icon-user"></span> {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{ url('/logout') }}"
                               class="dropdown-item"
                               onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                @endif
            </ul>
            <ul class="nav navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Explore</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Recipe Finder</a>
                </li>
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.recipes') }}">Your Recipes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('storage.index') }}">Your Storage</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('recipe.create') }}">Share a Recipe</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
    @yield('content')
    <footer class="footer">
        <div class="container">
            <div class="row flex-items-xs-center">
                <div class="col-lg-4 text-xs-center text-lg-left">
                    <img src="img/logo-with-text.svg" height="50" alt="">
                </div>
                <div class="col-lg-4 text-xs-center text-lg-left">
                    <p>Copyright Hollenbach Industries</p>
                    <p>Created by Jannik Hollenbach and Finn Schwenck</p>
                </div>
                <div class="col-lg-4 text-xs-center text-lg-left">
                    <p>Created for Neue Datenbankkonzepte, FH Kiel</p>
                    <p><a href="https://github.com/J12934/mealify">View on Github</a></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Scripts -->
    <script src="js/app.js"></script>
    @yield('custom-scripts')
</body>
</html>
