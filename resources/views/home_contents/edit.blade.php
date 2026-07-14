@extends('layouts.app')

@section('title','Edit Home Content')

@section('content')
    <section class="content-header">
        <h1>Edit Home Content</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ route('home_content') }}">Home Content</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form role="form" action="{{ route('home_content.edit', $home_content) }}" method="post">
                    {!! csrf_field() !!}
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ ucwords(str_replace('_', ' ', $home_content->section_key)) }}</h3>
                            <div class="pull-right">
                                <a href="{{ route('home_content') }}" class="btn btn-xs btn-default">
                                    <i class="fa fa-chevron-left"></i> Back
                                </a>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="form-group {{ $errors->first('title') ? 'has-error' : '' }}">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" value="{{ old('title', $home_content->title) }}" id="title" name="title">
                                <span class="text-red">{!! $errors->first('title') !!}</span>
                            </div>
                            <div class="form-group {{ $errors->first('description') ? 'has-error' : '' }}">
                                <label for="description">Description</label>
                                <textarea rows="8" class="form-control" id="description" name="description">{{ old('description', $home_content->description) }}</textarea>
                                <span class="text-red">{!! $errors->first('description') !!}</span>
                            </div>
                        </div>
                        <div class="box-footer text-right">
                            <a href="{{ route('home_content') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Back</a>
                            <button type="submit" class="btn btn-flat btn-primary"><i class="fa fa-floppy-o"></i> Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
