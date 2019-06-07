<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="content-language" content="en-us">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <meta name="description" content="SchoolERP is a Google Material Design inspired ERP built with PHP, Laravel, Vue and Vuetify.">
    <meta name="keywords" content="admin, dashboard, webapp, erp, responsive, material, bootstrap, uikit, framework, backend, app, widgets, premium, file manamger, mail, vue, vuetify, echarts">
    {{-- <base href="{{}}"> --}}
    <title>{{ config('app.name', 'Welcome to School ERP') }}</title>
    <link rel="shortcut icon" href="/static/m.png" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700%7CMaterial+Icons' rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tenants.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/bootstrap-editable.css') }}" rel="stylesheet"/> --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    @yield('styles')
</head>

<body>
    @yield('content')

    {{-- <script src="{{ asset('js/jquery.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/bootstrap.min.js') }}"></script> --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.js"></script>
    {{-- <script src="{{ asset('cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js') }}"></script> --}}
    @yield('scripts')
</body>

</html>
