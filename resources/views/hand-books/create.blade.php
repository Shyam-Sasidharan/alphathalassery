@extends('layouts.app')

@section('title','Create Hand Book')

@section('content')
    <section class="content-header">
        <h1>
            Add Hand Book
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class=""><a href="{{ route('hand-book') }}">Hand Book</a></li>
            <li class="active">Add</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-12">
                <!-- form start -->
                <form role="form" action="{{ route('hand-book.create') }}" lpformnum="1" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Hand Book</h3>
                            <div class="pull-right">
                                <a href="{{ route('hand-book') }}" class="btn btn-xs btn-default">
                                  <i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-sm-12">
                                <div class="form-group {{ $errors->first('file') ? 'has-error' : '' }}">
                                    <label for="file">Hand Book File</label>
                                    <input type="file"
                                           class="form-control"
                                           id="file"
                                           placeholder="Profile"
                                           autocomplete="off"
                                           accept=".pdf"
                                           name="file">
                                    <span class="text-red">{!! $errors->first('file') !!}</span>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer text-right">
                            <a href="{{ route('hand-book') }}" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i>
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
