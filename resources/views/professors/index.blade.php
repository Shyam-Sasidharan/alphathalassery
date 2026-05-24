@extends('layouts.app')

@section('title','Professor Management')

@section('content')
    <section class="content-header">
        <h1>
            Manage Professors
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Professors</li>
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
                                       required="required" placeholder="Search with title">
                                <div class="input-group-btn">
                                    <button class="btn btn-flat btn-primary"><i class="fa fa-search" aria-hidden="true"></i> GO!</button>
                                    <a href="{{ route('professor') }}" class="btn btn-flat btn-danger" ><i class="fa fa-refresh" aria-hidden="true"></i> Reset Search</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if (request()->input('search') )
                        <div class="box-footer with-border">
                            Found {{ $professors->total() }} results out of {{ \App\Models\Professor::count() }} records.
                        </div>
                    @endif
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border">

                        <div class="pull-right">
                            <a href="{{ route('professor.create') }}" class="btn btn-primary btn-sm btn-flat">
                                <i class="fa fa-plus"></i> Add Professor</a>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Images</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($professors as $professor)
                                    <tr>
                                        <td>{{ (($professors->currentPage() - 1) * $professors->perPage() + ($loop->index + 1)) }}</td>
                                        <td>{{ $professor->name }}</td>
                                        <td>
                                            <img src="{{$professor->photo}}" class="img-responsive" width="100">
                                        </td>
                                        <td>
                                            <a href="{{ route('professor.edit', $professor->id) }}"  class="btn btn-flat btn-sm btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                            <a href="{{ route('professor.delete', $professor->id) }}" onclick="return confirm('Are you sure ?')" class="btn btn-flat btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
                            {!! $professors->render() !!}
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