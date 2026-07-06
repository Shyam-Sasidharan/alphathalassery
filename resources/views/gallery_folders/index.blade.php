@extends('layouts.app')

@section('title','Gallery Folder Management')

@section('content')
    <section class="content-header">
        <h1>Manage Gallery Folders</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Gallery Folders</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-body">
                        <form action="" method="GET" role="form">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" value="{{ request('search') }}" required="required" placeholder="Search with folder name">
                                <div class="input-group-btn">
                                    <button class="btn btn-flat btn-primary"><i class="fa fa-search"></i> GO!</button>
                                    <a href="{{ route('gallery_folder') }}" class="btn btn-flat btn-danger"><i class="fa fa-refresh"></i> Reset Search</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="pull-right">
                            <a href="{{ route('gallery_folder.create') }}" class="btn btn-primary btn-sm btn-flat">
                                <i class="fa fa-plus"></i> Add Folder
                            </a>
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
                                @forelse ($folders as $folder)
                                    <tr>
                                        <td>{{ (($folders->currentPage() - 1) * $folders->perPage() + ($loop->index + 1)) }}</td>
                                        <td>{{ $folder->name }}</td>
                                        <td>{{ $folder->galleries()->count() }}</td>
                                        <td>
                                            <a href="{{ route('gallery_folder.edit', $folder->id) }}" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('gallery_folder.delete', $folder->id) }}" onclick="return confirm('Are you sure ?')" class="btn btn-flat btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">
                                            <div class="alert alert-danger text-center">
                                                <strong>No records found</strong>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            {!! $folders->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
