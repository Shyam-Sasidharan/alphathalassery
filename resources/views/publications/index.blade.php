@extends('layouts.app')

@section('title','Publication Management')

@section('content')
    <section class="content-header">
        <h1>
            Manage Publications
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Publications</li>
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
                                        <option value="">All Categories</option>
                                        @foreach(\App\Models\Category::orderBy('name')->get() as $category)
                                            <option {{ request('category_id') == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                             <div class="col-sm-8 col-md-8 col-lg-8">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" name="search" id="inputID" class="form-control" value="{{ request('search') }}"
                                               required="required" placeholder="Search with title">
                                        <div class="input-group-btn">
                                            <button class="btn btn-flat btn-primary"><i class="fa fa-search" aria-hidden="true"></i> GO!</button>
                                            <a href="{{ route('publications') }}" class="btn btn-flat btn-danger" ><i class="fa fa-refresh" aria-hidden="true"></i> Reset Search</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if (request()->input('search') )
                        <div class="box-footer with-border">
                            Found {{ $publications->total() }} results out of {{ \App\Models\Publication::count() }} records.
                        </div>
                    @endif
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border">

                        <div class="pull-right">
                            <a href="{{ route('publications.create') }}" class="btn btn-primary btn-sm btn-flat">
                                <i class="fa fa-plus"></i> Add Publication</a>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Language</th>
                                    <th>Category</th>
                                    <th>Images</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($publications as $publication)
                                    <tr>
                                        <td>{{ (($publications->currentPage() - 1) * $publications->perPage() + ($loop->index + 1)) }}</td>
                                        <td>{{ $publication->name }}</td>
                                        <td>{{ $publication->author }}</td>
                                        <td>{{ $publication->category ? $publication->category->name : '' }}</td>
                                        <td>
                                            <img src="{{$publication->photo}}" class="img-responsive" width="100">
                                        </td>
                                        <td>
                                            <a href="{{ route('publications.edit', $publication->id) }}"  class="btn btn-flat btn-sm btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                            <a href="{{ route('publications.delete', $publication->id) }}" onclick="return confirm('Are you sure ?')" class="btn btn-flat btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
                            {!! $publications->render() !!}
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