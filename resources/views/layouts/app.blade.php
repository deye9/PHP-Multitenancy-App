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
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" type="text/css">
    @yield('styles')
</head>

<body>

    <div class="wrapper">

        <nav class="navbar navbar-dark bg-dark fixed-top">

            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="https://getbootstrap.com/docs/4.1/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="" />
                {{ config('app.name', ' ') }}
            </a>

            <form class="form-inline">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                &nbsp;&nbsp;
                <button class="btn btn-outline-default" type="submit">Search</button>
            </form>

        </nav>

        <div id="app">

            <app-default key="default" v-if="activeview === 'default'" :title="'{{$title}}'" :catchphase="'{{$catchphase}}'"></app-default>
            <app-info key="moreInfo" v-if="activeview === 'moreInfo'" style="margin-top:100px;"></app-info>
            <app-school key="registerSchool" v-if="activeview === 'registerSchool'" style="margin-top:100px;" :url="'{{$url}}'" :title="'{{$title}}'"></app-school>
            <app-notification key="notification" v-if="activeview === 'notification'" style="margin-top:100px;"></app-notification>

        </div>

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

    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        var js_schoolerp = {
            toastType : {
                Info: 'info',
                Error: 'error',
                Success: 'success',
                Warning: 'warning'
            },
            toastTitle: 'School ERP Notification Service'
        };
        function Notify(toastType, toastMessage) {
            toastr[toastType](toastMessage, js_schoolerp.toastTitle);
        }
    </script>
    @yield('scripts')

</body>

</html>
