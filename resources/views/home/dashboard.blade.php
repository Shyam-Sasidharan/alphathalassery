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
        <div class="cms-dashboard-toolbar">
            <a href="{{ route('course.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Add Course
            </a>
            <a href="{{ route('gallery.create') }}" class="btn btn-default">
                <i class="fa fa-image"></i> Add Gallery
            </a>
        </div>
        <div class="row cms-quick-links">
            <div class="col-sm-6 col-lg-3">
                <a href="{{ route('course') }}" class="cms-stat-card">
                    <i class="fa fa-paper-plane-o"></i>
                    <strong>Courses</strong>
                    <span>Manage programs</span>
                </a>
            </div>
            <div class="col-sm-6 col-lg-3">
                <a href="{{ route('publications') }}" class="cms-stat-card">
                    <i class="fa fa-book"></i>
                    <strong>Publications</strong>
                    <span>Update resources</span>
                </a>
            </div>
            <div class="col-sm-6 col-lg-3">
                <a href="{{ route('gallery') }}" class="cms-stat-card">
                    <i class="fa fa-image"></i>
                    <strong>Gallery</strong>
                    <span>Manage images</span>
                </a>
            </div>
            <div class="col-sm-6 col-lg-3">
                <a href="{{ route('downloads') }}" class="cms-stat-card">
                    <i class="fa fa-download"></i>
                    <strong>Downloads</strong>
                    <span>Maintain files</span>
                </a>
            </div>
        </div>
        <!-- /.row -->
    </section>
@endsection
