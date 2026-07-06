@extends('layouts.app')

@section('title','Create Gallery Folder')

@section('content')
    <section class="content-header">
        <h1>Add Gallery Folder</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ route('gallery_folder') }}">Gallery Folders</a></li>
            <li class="active">Add</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form role="form" action="{{ route('gallery_folder.create') }}" method="post">
                    {!! csrf_field() !!}
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Gallery Folder</h3>
                            <div class="pull-right">
                                <a href="{{ route('gallery_folder') }}" class="btn btn-xs btn-default"><i class="fa fa-chevron-left"></i> Back</a>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="form-group {{ $errors->first('name') ? 'has-error' : '' }}">
                                <label for="name">Folder Name</label>
                                <input type="text" class="form-control" value="{{ old('name') }}" id="name" placeholder="Folder Name" autocomplete="off" name="name">
                                <span class="text-red">{!! $errors->first('name') !!}</span>
                            </div>
                            <div class="form-group {{ $errors->first('description') ? 'has-error' : '' }}">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" placeholder="Description" name="description" rows="4">{{ old('description') }}</textarea>
                                <span class="text-red">{!! $errors->first('description') !!}</span>
                            </div>
                        </div>
                        <div class="box-footer text-right">
                            <a href="{{ route('gallery_folder') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Back</a>
                            <button type="submit" class="btn btn-flat btn-primary"><i class="fa fa-floppy-o"></i> Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
