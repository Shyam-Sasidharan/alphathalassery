<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="{{ asset('front/images/logo.png') }}" type="image/x-icon">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body{
            background-image: url("{{asset('img/logo-sm.png')}}");
            background-repeat: no-repeat;
            background-size: cover;
            min-width: 100%;
            min-height: 100%;
        }
    </style>
</head>
<body>
    <div id="app">
        <div class="" style="margin-top: 10%"></div>
        @yield('content')
    </div>

</body>
</html>
