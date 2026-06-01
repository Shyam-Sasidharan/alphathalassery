@extends('layouts.app')

@section('title','Course Management')

@section('content')
    <section class="content-header">
        <h1>
            Manage Course
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Courses</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-body">
                        <form action="" method="GET" role="form">
                            <div class="input-group">
                                <input type="text" name="search" id="inputID" class="form-control" value="{{ request('search') }}"
                                       required="required" placeholder="Search with course name">
                                <div class="input-group-btn">
                                    <button class="btn btn-flat btn-primary"><i class="fa fa-search" aria-hidden="true"></i> GO!</button>
                                    <a href="{{ route('course') }}" class="btn btn-flat btn-danger" ><i class="fa fa-refresh" aria-hidden="true"></i> Reset Search</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if (request()->input('search') )
                        <div class="box-footer with-border">
                            Found {{ $courses->total() }} results out of {{ \App\Models\Course::count() }} records.
                        </div>
                    @endif
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border">

                        <div class="pull-right">
                            <a href="{{ route('course.create') }}" class="btn btn-primary btn-sm btn-flat">
                                <i class="fa fa-plus"></i> Add Course</a>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                <th>College</th>
                                <th>Name</th>
                                    <th>Duration</th>
                                    <th>Fee</th>
                                    <!-- <th>No. of Products</th> -->
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($courses as $course)
                                    <tr>
                                        <td>{{ (($courses->currentPage() - 1) * $courses->perPage() + ($loop->index + 1)) }}</td>
                                        <td>{{ $course->college == 'tacrs' ? 'Tely-Alpha Center For Religious Sciences' : 'Alpha Higher Institute of Religious Sciences' }}</td>
                                        <td>{{ $course->name }}</td>
                                        <td>{{ $course->duration }}</td>
                                        <td>{{ $course->fee }}</td>
                                        <td>
                                            <a href="{{ route('course.edit', $course->id) }}"  class="btn btn-flat btn-sm btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                            <a href="{{ route('course.delete', $course->id) }}" onclick="return confirm('Are you sure ?')" class="btn btn-flat btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <div class="alert alert-danger text-center">
                                                <strong>No records found</strong>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            {!! $courses->render() !!}
                        </div>
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
@endsection
