@extends('layouts.app')

@section('title','FAQ Management')

@section('content')
    <section class="content-header">
        <h1>
            Manage FAQ
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">FAQ</li>
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
                                        <input type="text" name="search" id="inputID" class="form-control" value="{{ request('search') }}" placeholder="Search with Question">
                                        <div class="input-group-btn">
                                            <button class="btn btn-flat btn-primary"><i class="fa fa-search" aria-hidden="true"></i> GO!</button>
                                            <a href="{{ route('faq') }}" class="btn btn-flat btn-danger" ><i class="fa fa-refresh" aria-hidden="true"></i> Reset Search</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if (request()->input('search') )
                        <div class="box-footer with-border">
                            Found {{ $faq->total() }} results out of {{ \App\Models\Faq::count() }} records.
                        </div>
                    @endif
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border">

                        <div class="pull-right">
                            <a href="{{ route('faq.create') }}" class="btn btn-primary btn-sm btn-flat">
                                <i class="fa fa-plus"></i> Add FAQ</a>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Question</th>
                                    <th width="100">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($faq as $f)
                                    <tr>
                                        <td>{{ (($faq->currentPage() - 1) * $faq->perPage() + ($loop->index + 1)) }}</td>
                                        <td>{{ $f->question }}</td>
                                        <td>
                                            <a href="{{ route('faq.edit', $f->id) }}"  class="btn btn-flat btn-sm btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                            <a href="{{ route('faq.delete', $f->id) }}" onclick="return confirm('Are you sure ?')" class="btn btn-flat btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
                            {!! $faq->render() !!}
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