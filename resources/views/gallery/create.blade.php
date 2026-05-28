@extends('layouts.app')

@section('title','Create Gallery')

@section('content')
    <section class="content-header">
        <h1>
            Add Gallery
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class=""><a href="{{ route('gallery') }}">Gallery</a></li>
            <li class="active">Add</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-12">
                <!-- form start -->
                <form role="form" action="{{ route('gallery.create') }}" lpformnum="1" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Gallery</h3>
                            <div class="pull-right">
                                <a href="{{ route('gallery') }}" class="btn btn-xs btn-default">
                                  <i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            {{--English Title--}}
                            <div class="col-sm-12">
                                <div class="form-group {{ $errors->first('name') ? 'has-error' : '' }}">
                                    <label for="name">Gallery Title</label>
                                    <input type="text"
                                           class="form-control"
                                           value="{{ old('name') }}"
                                           id="name"
                                           placeholder="Gallery Title"
                                           autocomplete="off"
                                           name="name">
                                    <span class="text-red">{!! $errors->first('name') !!}</span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-sm-12">
                                <div class="form-group {{ $errors->first('image') ? 'has-error' : '' }}">
                                    <label for="image">Image</label>
                                    <input type="file"
                                           class="form-control"
                                           id="image"
                                           placeholder="Profile"
                                           autocomplete="off"
                                           accept="image/*"
                                           name="image">
                                    <span class="text-red">{!! $errors->first('image') !!}</span>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer text-right">
                            <a href="{{ route('gallery') }}" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i>
                                Back</a>
                            <button type="submit" class="btn btn-flat btn-primary"><i class="fa fa-floppy-o"></i> Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </section>
@endsection
