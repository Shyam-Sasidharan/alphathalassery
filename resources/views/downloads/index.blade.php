@extends('layouts.app')

@section('title','Latest News Management')

@section('content')
    <section class="content-header">
        <h1>
            Manage Downloads
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Downloads</li>
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
                             <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" name="search" id="inputID" class="form-control" value="{{ request('search') }}" placeholder="Search with title">
                                        <div class="input-group-btn">
                                            <button class="btn btn-flat btn-primary"><i class="fa fa-search" aria-hidden="true"></i> GO!</button>
                                            <a href="{{ route('downloads') }}" class="btn btn-flat btn-danger" ><i class="fa fa-refresh" aria-hidden="true"></i> Reset Search</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if (request()->input('search') )
                        <div class="box-footer with-border">
                            Found {{ $downloads->total() }} results out of {{ \App\Models\Download::count() }} records.
                        </div>
                    @endif
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border">

                        <div class="pull-right">
                            <a href="{{ route('downloads.create') }}" class="btn btn-primary btn-sm btn-flat">
                                <i class="fa fa-plus"></i> Add Downloads</a>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th width="100">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($downloads as $download)
                                    <tr>
                                        <td>{{ (($downloads->currentPage() - 1) * $downloads->perPage() + ($loop->index + 1)) }}</td>
                                        <td>{{ $download->title }}</td>
                                        <td>{{ $download->download_category ? $download->download_category->name : '' }}</td>
                                        <td>
                                            <a href="{{ route('downloads.edit', $download->id) }}"  class="btn btn-flat btn-sm btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                            <a href="{{ route('downloads.delete', $download->id) }}" onclick="return confirm('Are you sure ?')" class="btn btn-flat btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">
                                            <div class="alert alert-danger text-center">
                                                <strong>No records found</strong>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            {!! $downloads->render() !!}
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