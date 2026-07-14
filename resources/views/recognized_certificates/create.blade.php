@extends('layouts.app')

@section('title','Add Recognized Certificate')

@section('content')
    <section class="content-header">
        <h1>Add Recognized Certificate</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ route('recognized_certificate') }}">Recognized Certificates</a></li>
            <li class="active">Add</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form role="form" action="{{ route('recognized_certificate.create') }}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Recognized Certificate</h3>
                            <div class="pull-right">
                                <a href="{{ route('recognized_certificate') }}" class="btn btn-xs btn-default">
                                    <i class="fa fa-chevron-left"></i> Back
                                </a>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="col-sm-8">
                                <div class="form-group {{ $errors->first('title') ? 'has-error' : '' }}">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" value="{{ old('title') }}" id="title" placeholder="Title" name="title">
                                    <span class="text-red">{!! $errors->first('title') !!}</span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group {{ $errors->first('status') ? 'has-error' : '' }}">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    <span class="text-red">{!! $errors->first('status') !!}</span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group {{ $errors->first('description') ? 'has-error' : '' }}">
                                    <label for="description">Description</label>
                                    <textarea rows="5" class="form-control" id="description" placeholder="Description" name="description">{{ old('description') }}</textarea>
                                    <span class="text-red">{!! $errors->first('description') !!}</span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group {{ $errors->first('certificate') ? 'has-error' : '' }}">
                                    <label for="certificate">Certificate</label>
                                    <input type="file" class="form-control" id="certificate" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx" name="certificate">
                                    <span class="text-red">{!! $errors->first('certificate') !!}</span>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer text-right">
                            <a href="{{ route('recognized_certificate') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Back</a>
                            <button type="submit" class="btn btn-flat btn-primary"><i class="fa fa-floppy-o"></i> Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
