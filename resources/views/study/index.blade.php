@extends('layouts.app')

@section('title','Study Center Management')

@section('content')
    <section class="content-header">
        <h1>
            Manage Study Centers
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Study Centers</li>
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
                                    <a href="{{ route('study_centre') }}" class="btn btn-flat btn-danger" ><i class="fa fa-refresh" aria-hidden="true"></i> Reset Search</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if (request()->input('search') )
                        <div class="box-footer with-border">
                            Found {{ $centres->total() }} results out of {{ \App\Models\Center::count() }} records.
                        </div>
                    @endif
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border">

                        <div class="pull-right">
                            <a href="{{ route('study_centre.create') }}" class="btn btn-primary btn-sm btn-flat">
                                <i class="fa fa-plus"></i> Add Center</a>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Center</th>
                                    <th>Location</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($centres as $centre)
                                    <tr>
                                        <td>{{ (($centres->currentPage() - 1) * $centres->perPage() + ($loop->index + 1)) }}</td>
                                        <td>
                                            @if($centre->image)
                                                <img src="{{ asset($centre->image) }}" style="max-height: 40px; border-radius: 4px;" alt="Center Image">
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td>
                                        <td>{{ $centre->center }}</td>
                                        <td>{{ $centre->location }}</td>
                                        <td>
                                            <a href="{{ route('study_centre.edit', $centre->id) }}"  class="btn btn-flat btn-sm btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                            <a href="{{ route('study_centre.delete', $centre->id) }}" onclick="return confirm('Are you sure ?')" class="btn btn-flat btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
                            {!! $centres->render() !!}
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