<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Alpha Institute Admin'))</title>

    <link rel="shortcut icon" href="{{ asset('front/images/logo.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">

    <style>
        body {
            font-family: "Helvetica Neue", Arial, sans-serif;
        }

        .content-wrapper {
            background: #f4f6f9;
        }

        .box {
            border-radius: 6px;
            overflow: hidden;
            border-top-width: 3px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
        }

        .box-header.with-border {
            background: #fff;
        }

        .table > thead > tr > th {
            background: #f8fafc;
            color: #334155;
            font-weight: 700;
        }

        .btn {
            border-radius: 4px;
        }
    </style>
    @yield('css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
