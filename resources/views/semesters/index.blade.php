@extends('layouts.app')

@section('title','Course Syllabus Management')

@section('content')
    <section class="content-header">
        <h1>
            Manage Course Syllabus
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Syllabus</li>
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
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <select name="course_id" id="inputCourse_id" class="form-control select2">
                                        <option value="">All Courses</option>
                                        @foreach(\App\Models\Course::orderBy('name')->get() as $course)
                                            <option {{ request('course_id') == $course->id ? 'selected' : ''}} value="{{$course->id}}">{{$course->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-8 col-md-8 col-lg-8">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" name="search" id="inputID" class="form-control" value="{{ request('search') }}"
                                                placeholder="Search..">
                                        <div class="input-group-btn">
                                            <button class="btn btn-flat btn-primary"><i class="fa fa-search" aria-hidden="true"></i> GO!</button>
                                            <a href="{{ route('semester') }}" class="btn btn-flat btn-danger" ><i class="fa fa-refresh" aria-hidden="true"></i> Reset Search</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if (request()->input('search') )
                        <div class="box-footer with-border">
                            Found {{ $semesters->total() }} results out of {{ \App\Models\Semester::count() }} records.
                        </div>
                    @endif
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border">

                        <div class="pull-right">
                            <a href="{{ route('semester.create') }}" class="btn btn-primary btn-sm btn-flat">
                                <i class="fa fa-plus"></i> Add Semester
                            </a>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Semester</th>
                                    <th>Course</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($semesters as $semester)
                                    <tr>
                                        <td>{{ (($semesters->currentPage() - 1) * $semesters->perPage() + ($loop->index + 1)) }}</td>
                                        <td>{{ $semester->semester }}</td>
                                        <td> {{ $semester->course ? $semester->course->name : '' }}</td>
                                        <td>
                                            <a href="{{ route('semester.edit', $semester->id) }}"  class="btn btn-flat btn-sm btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                            <a href="{{ route('semester.delete', $semester->id) }}" onclick="return confirm('Are you sure ?')" class="btn btn-flat btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <div class="alert alert-danger text-center">
                                                <strong>No records found</strong>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            {!! $semesters->render() !!}
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