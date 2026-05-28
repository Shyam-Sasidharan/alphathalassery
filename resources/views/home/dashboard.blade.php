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
        <div class="cms-dashboard-hero">
            <div>
                <span class="cms-kicker">Alpha Center for Theology and Science</span>
                <h2>Content Management Dashboard</h2>
                <p>Manage courses, publications, library records, downloads, galleries, news, faculty, and study centre content from one focused workspace.</p>
            </div>
            <img src="{{ asset('front/images/logo.png') }}" alt="Alpha Center for Theology and Science" />
        </div>
        <div class="row cms-quick-links">
            <div class="col-sm-6 col-lg-3">
                <a href="{{ route('course') }}" class="cms-stat-card">
                    <i class="fa fa-paper-plane-o"></i>
                    <span>Courses</span>
                    <strong>Manage Programs</strong>
                </a>
            </div>
            <div class="col-sm-6 col-lg-3">
                <a href="{{ route('publications') }}" class="cms-stat-card">
                    <i class="fa fa-book"></i>
                    <span>Publications</span>
                    <strong>Update Resources</strong>
                </a>
            </div>
            <div class="col-sm-6 col-lg-3">
                <a href="{{ route('gallery') }}" class="cms-stat-card">
                    <i class="fa fa-image"></i>
                    <span>Gallery</span>
                    <strong>Curate Media</strong>
                </a>
            </div>
            <div class="col-sm-6 col-lg-3">
                <a href="{{ route('downloads') }}" class="cms-stat-card">
                    <i class="fa fa-download"></i>
                    <span>Downloads</span>
                    <strong>Maintain Files</strong>
                </a>
            </div>
        </div>
        <!-- /.row -->
    </section>
@endsection
