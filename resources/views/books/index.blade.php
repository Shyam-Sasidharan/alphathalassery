@extends('layouts.app')

@section('title','Library Book Management')

@section('content')
    <section class="content-header">
        <h1>
            Manage Library Book
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Library Book</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">

                        <div class="pull-right">
                            <a href="{{ route('book.create') }}" class="btn btn-primary btn-sm btn-flat">
                                <i class="fa fa-plus"></i> Add Book</a>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Books</th>
                                    <th>Category</th>
                                    <th width="100">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($books as $book)
                                    <tr>
                                        <td>{{ (($books->currentPage() - 1) * $books->perPage() + ($loop->index + 1)) }}</td>
                                        <td><a href="{{ asset($book->pdf) }}" target="_blank">{{ $book->pdf }}</a> </td>
                                        <td>{{ $book->library ? $book->library->name : '' }}</td>
                                        <td>
                                            <a href="{{ route('book.edit', $book->id) }}"  class="btn btn-flat btn-sm btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                            <a href="{{ route('book.delete', $book->id) }}" onclick="return confirm('Are you sure ?')" class="btn btn-flat btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
                            {!! $books->render() !!}
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