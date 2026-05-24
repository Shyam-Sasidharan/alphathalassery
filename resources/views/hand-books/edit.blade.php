@extends('layouts.app')

@section('title','Edit Hand Book')

@section('content')
    <section class="content-header">
        <h1>
            Update Hand Book
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class=""><a href="{{ route('hand-book') }}">Hand Book</a></li>
            <li class="active">Update</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-12">
                <!-- form start -->
               <form role="form" action="{{ route('hand-book.edit', $hand_book->id) }}" lpformnum="1" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update Hand Book</h3>
                            <div class="pull-right">
                                <a href="{{ route('hand-book') }}" class="btn btn-xs btn-default">
                                  <i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <div class="col-sm-12">
                                <div class="form-group {{ $errors->first('file') ? 'has-error' : '' }}">
                                    <label for="file">Hand Books File</label>
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
                            @if ($hand_book && $hand_book->file && is_file(public_path($hand_book->file)))
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label>Uploaded Doc</label>
                                  <div class="clearfix"></div>
                                  <a href="{{ asset($hand_book->file) }}" class="btn btn-primary" target="_blank"> <i class="fa fa-file-file-o" aria-hidden="true"></i> {{ basename($hand_book->file) }}</a>
                                  <div class="clearfix"></div><br>
                                  <iframe id="fred" style="border:1px solid #666CCC" title="PDF in an i-Frame" src="{{asset($hand_book->file)}}" frameborder="1" scrolling="auto" height="500" width="100%" ></iframe>
                                </div>
                              </div>  
                            @endif    
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
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.min.css" />
@stop
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.min.js"></script>
    <script>
        $(function () {
          $('#file').fileinput({'showUpload':false});
        });

    </script>
@stop
