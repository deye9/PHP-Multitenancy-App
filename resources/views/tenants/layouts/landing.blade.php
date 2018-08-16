<?php
    use Carbon\Carbon;
?>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'Welcome to School ERP') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    @yield('styles')
</head>

<body>

    <nav class="navbar navbar-dark bg-dark fixed-top">
        @guest
            <a class="navbar-brand" href="{{ url('/') }}"  title="Change to school Logo and get School Name">
                <img src="https://getbootstrap.com/docs/4.1/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="" />
                {{ config('app.name', 'School ERP') }}
            </a>
        @else
            <a class="navbar-brand" href="{{ route('home') }}"  title="Change to school Logo and get School Name" >
                <img src="https://getbootstrap.com/docs/4.1/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="" />
                {{ config('app.name', 'School ERP') }}
            </a>
        @endguest

        @if (Route::has('login'))
            <ul class="nav justify-content-end">
                @auth
                    <li class="nav-item">
                        <form class="navbar-form" role="search">
                            <div class="input-group">
                                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="{{ route('register') }}">Register</a>
                    </li>
                @endauth
            </ul>
        @endif
    </nav>

    <div id="content" class="m-t-2">
        @yield('content')
    </div>

    <footer class="footer" style="text-align: center;">
        <div class="container">
            <div>
                <span class="text-muted"> &copy {{ Carbon::now()->year }}</span>
                <a href="https://www.konga.com/terms-conditions/">Terms of use</a>
                |
                <a href="https://www.konga.com/help/privacy-policy/">Privacy</a>
                |
                <a href="https://www.konga.com/authentic-items-policy/"> Authentic Items</a>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    @yield('scripts')

</body>

</html>
