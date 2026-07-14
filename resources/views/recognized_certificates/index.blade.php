@extends('layouts.app')

@section('title','Recognized Certificates')

@section('content')
    <section class="content-header">
        <h1>Recognized Certificates</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Recognized Certificates</li>
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
                                    <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Search with title">
                                    <div class="input-group-btn">
                                        <button class="btn btn-flat btn-primary"><i class="fa fa-search"></i> GO!</button>
                                        <a href="{{ route('recognized_certificate') }}" class="btn btn-flat btn-danger"><i class="fa fa-refresh"></i> Reset Search</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if (request()->input('search'))
                        <div class="box-footer with-border">
                            Found {{ $certificates->total() }} results out of {{ \App\Models\RecognizedCertificate::count() }} records.
                        </div>
                    @endif
                </div>

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="pull-right">
                            <a href="{{ route('recognized_certificate.create') }}" class="btn btn-primary btn-sm btn-flat">
                                <i class="fa fa-plus"></i> Add Certificate
                            </a>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Certificate</th>
                                    <th>Status</th>
                                    <th width="100">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($certificates as $certificate)
                                    <tr>
                                        <td>{{ (($certificates->currentPage() - 1) * $certificates->perPage() + ($loop->index + 1)) }}</td>
                                        <td>{{ $certificate->title }}</td>
                                        <td>
                                            <a href="{{ asset($certificate->certificate) }}" target="_blank">View Certificate</a>
                                        </td>
                                        <td>
                                            <span class="label {{ $certificate->status ? 'label-success' : 'label-default' }}">
                                                {{ $certificate->status ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('recognized_certificate.edit', $certificate->id) }}" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('recognized_certificate.delete', $certificate->id) }}" onclick="return confirm('Are you sure ?')" class="btn btn-flat btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>
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
                            {!! $certificates->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
