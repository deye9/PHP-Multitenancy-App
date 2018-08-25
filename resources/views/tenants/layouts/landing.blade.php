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
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    @yield('styles')
</head>

<body>

    <div id="app"></div>

    <footer class="footer" style="text-align: center;">
        <div class="container">
            <div>
                <span class="text-muted"> &copy {{ Carbon::now()->year }}</span>
                <a href="#">Terms of use</a>
                |
                <a href="#">Privacy</a>
                |
                <a href="#"> Authentic Items</a>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/tenantauth.js') }}"></script>
</body>

</html>
