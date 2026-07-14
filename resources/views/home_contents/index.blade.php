@extends('layouts.app')

@section('title','Home Content')

@section('content')
    <section class="content-header">
        <h1>Home Content</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Home Content</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-body">
                        <form action="" method="GET" role="form">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Search content">
                                    <div class="input-group-btn">
                                        <button class="btn btn-flat btn-primary"><i class="fa fa-search"></i> GO!</button>
                                        <a href="{{ route('home_content') }}" class="btn btn-flat btn-danger"><i class="fa fa-refresh"></i> Reset Search</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="box box-primary">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Section</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th width="80">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($contents as $content)
                                    <tr>
                                        <td>{{ (($contents->currentPage() - 1) * $contents->perPage() + ($loop->index + 1)) }}</td>
                                        <td>{{ ucwords(str_replace('_', ' ', $content->section_key)) }}</td>
                                        <td>{{ $content->title }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($content->description, 100) }}</td>
                                        <td>
                                            <a href="{{ route('home_content.edit', $content->id) }}" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-edit"></i></a>
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
                            {!! $contents->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
