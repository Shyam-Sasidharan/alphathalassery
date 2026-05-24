@extends('layouts.app')

@section('title',config('app.name').' Dashboard')

@section('content')
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row text-center">
            <img src="{{ asset('front/images/logo.png') }}" alt="Alpha Center for Theology and Science" style="display: inline-block;" />
            <h1> DASHBOARD</h1>
        </div>
        <!-- /.row -->
    </section>
@endsection