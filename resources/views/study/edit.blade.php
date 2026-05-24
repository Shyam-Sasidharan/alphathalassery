@extends('layouts.app')

@section('title','Edit Study Center')

@section('content')
    <section class="content-header">
        <h1>
            Update Study Center
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class=""><a href="{{ route('study_centre') }}">Study Center</a></li>
            <li class="active">Update</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-12">
                <!-- form start -->
                <form role="form" action="{{ route('study_centre.edit', $study_centre->id) }}" lpformnum="1" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Study Center</h3>
                            <div class="pull-right">
                                <a href="{{ route('study_centre') }}" class="btn btn-xs btn-default">
                                	<i class="fa fa-chevron-left" aria-hidden="true"></i> Back
                                </a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            {{--English Title--}}
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group {{ $errors->first('location') ? 'has-error' : '' }}">
                                    <label for="center">Location</label>
                                    <select name="location" class="form-control">
                                    	<option value="Study Centers in Kerala" {{ $study_centre->location == 'Study Centers in Kerala' ? 'selected' : '' }}>Study Centers in Kerala </option>
                                    	<option value="Study Centers outside Kerala" {{ $study_centre->location == 'Study Centers outside Kerala' ? 'selected' : '' }}>Study Centers outside Kerala </option>
                                    	<option value="Study Centers outside India" {{ $study_centre->location == 'Study Centers outside India' ? 'selected' : '' }}>Study Centers outside India </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group {{ $errors->first('center') ? 'has-error' : '' }}">
                                    <label for="center">Center</label>
                                    <input type="text" class="form-control" value="{{ old('center') ?? $study_centre->center }}" id="center" placeholder="Center" autocomplete="off" name="center">
                                    <span class="text-red">{!! $errors->first('center') !!}</span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group {{ $errors->first('address') ? 'has-error' : '' }}">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" value="{{ old('address') ?? $study_centre->address }}" id="address" placeholder="Address" autocomplete="off" name="address">
                                    <span class="text-red">{!! $errors->first('address') !!}</span>
                                </div>
                            </div> 
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group {{ $errors->first('coordinator') ? 'has-error' : '' }}">
                                    <label for="coordinator">Course Coordinator</label>
                                    <input type="text" class="form-control" value="{{ old('coordinator') ?? $study_centre->coordinator }}" id="coordinator" placeholder="Course Coordinator" autocomplete="off" name="coordinator">
                                    <span class="text-red">{!! $errors->first('coordinator') !!}</span>
                                </div>
                            </div> 
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group {{ $errors->first('phone') ? 'has-error' : '' }}">
                                    <label for="phone">Contact No.</label>
                                    <input type="text" class="form-control" value="{{ old('phone') ?? $study_centre->phone }}" id="phone" placeholder="Contact No." autocomplete="off" name="phone">
                                    <span class="text-red">{!! $errors->first('phone') !!}</span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group {{ $errors->first('image') ? 'has-error' : '' }}">
                                    <label for="image">Center Image / Cover</label>
                                    @if($study_centre->image)
                                        <div style="margin-bottom: 10px;">
                                            <img src="{{ asset($study_centre->image) }}" class="img-thumbnail" style="max-height: 150px;">
                                        </div>
                                    @endif
                                    <input type="file" class="form-control" id="image" name="image">
                                    <span class="text-red">{!! $errors->first('image') !!}</span>
                                </div>
                            </div>                         
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer text-right">
                            <a href="{{ route('study_centre') }}" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i>
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