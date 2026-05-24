@extends('layouts.app')

@section('title','Hand Book Management')

@section('content')
    <section class="content-header">
        <h1>
            Manage Hand Book
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Hand Book</li>
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
                            <a href="{{ route('hand-book.create') }}" class="btn btn-primary btn-sm btn-flat">
                                <i class="fa fa-plus"></i> Add Hand Book</a>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Hand Book</th>
                                    <th width="100">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($hand_books as $hand_book)
                                    <tr>
                                        <td>{{ (($hand_books->currentPage() - 1) * $hand_books->perPage() + ($loop->index + 1)) }}</td>
                                        <td><a href="{{ asset($hand_book->file) }}" target="_blank">{{ $hand_book->file }}</a> </td>
                                        <td>
                                            <a href="{{ route('hand-book.edit', $hand_book->id) }}"  class="btn btn-flat btn-sm btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                            <a href="{{ route('hand-book.delete', $hand_book->id) }}" onclick="return confirm('Are you sure ?')" class="btn btn-flat btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
                            {!! $hand_books->render() !!}
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