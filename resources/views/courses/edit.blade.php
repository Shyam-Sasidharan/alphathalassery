@extends('layouts.app')

@section('title','Edit Course Record')

@section('content')
    <section class="content-header">
        <h1>
            Update Course
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class=""><a href="{{ route('course') }}">Course</a></li>
            <li class="active">Update</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-12">
                <!-- form start -->
                <form role="form" action="{{ route('course.edit', $course->id) }}" lpformnum="1" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update Course</h3>
                            <div class="pull-right">
                                <a href="{{ route('course') }}" class="btn btn-xs btn-default">
                                	<i class="fa fa-chevron-left" aria-hidden="true"></i> Back
                                </a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                          @if ($course && $course->image && is_file(public_path($course->image)))
                                <div class="col-sm-12">
                                    <div class="form-group {{ $errors->first('image') ? 'has-error' : '' }}">
                                        <img src="{{ asset($course->image) }}" class="img-responsive center-block" width="300">
                                    </div>
                                </div>
                            @endif
                            {{--English Title--}}
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group {{ $errors->first('name') ? 'has-error' : '' }}">
                                    <label for="name"> Course Name</label>
                                    <input type="text"
                                           class="form-control"
                                           value="{{ old('name') ?? $course->name }}"
                                           id="name"
                                           placeholder="Course Name"
                                           autocomplete="off"
                                           name="name">
                                    <span class="text-red">{!! $errors->first('name') !!}</span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group {{ $errors->first('home_content') ? 'has-error' : '' }}">
                                    <label for="home_content">Home Content</label>
                                    <textarea rows="10"
                                           class="form-control"
                                           id="home_content"
                                           placeholder="Content"
                                           autocomplete="off"
                                           name="home_content">{{ old('home_content') ?? $course->home_content }}</textarea>
                                    <span class="text-red">{!! $errors->first('home_content') !!}</span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group {{ $errors->first('content') ? 'has-error' : '' }}">
                                    <label for="content">Content</label>
                                    <textarea rows="10"
                                           class="form-control"
                                           id="content"
                                           placeholder="Content"
                                           autocomplete="off"
                                           name="content">{{ old('content') ?? $course->content }}</textarea>
                                    <span class="text-red">{!! $errors->first('content') !!}</span>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group {{ $errors->first('duration') ? 'has-error' : '' }}">
                                    <label for="duration"> Course Duration</label>
                                    <input type="text"
                                           class="form-control"
                                           value="{{ old('duration') ?? $course->duration }}"
                                           id="duration"
                                           placeholder="Course Name"
                                           autocomplete="off"
                                           name="duration">
                                    <span class="text-red">{!! $errors->first('duration') !!}</span>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group {{ $errors->first('fee') ? 'has-error' : '' }}">
                                    <label for="fee"> Course Fee</label>
                                    <input type="text"
                                           class="form-control"
                                           value="{{ old('fee') ?? $course->fee }}"
                                           id="fee"
                                           placeholder="Course Name"
                                           autocomplete="off"
                                           name="fee">
                                    <span class="text-red">{!! $errors->first('fee') !!}</span>
                                </div>
                            </div>    
                            <div class="col-sm-12">
                                <div class="form-group {{ $errors->first('image') ? 'has-error' : '' }}">
                                    <label for="image">Image</label>
                                    <input type="file"
                                           class="form-control"
                                           id="image"
                                           placeholder="Image"
                                           autocomplete="off"
                                           accept="image/*"
                                           name="image">
                                    <span class="text-red">{!! $errors->first('image') !!}</span>
                                </div>
                            </div>
                            
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group {{ $errors->first('heading') ? 'has-error' : '' }}">
                                    <label for="heading">Course Heading</label>
                                    <input type="text" class="form-control" value="{{ old('heading') ?? $course->heading }}" id="heading" placeholder="Course Name" autocomplete="off" name="heading">
                                    <span class="text-red">{!! $errors->first('heading') !!}</span>
                                </div>
                            </div> 
                            <div class="col-sm-12">
                                <div class="form-group {{ $errors->first('pdf') ? 'has-error' : '' }}">
                                    <label for="pdf">Course Content Document</label>
                                    <input type="file"
                                           class="form-control"
                                           id="pdf"
                                           placeholder="Profile"
                                           autocomplete="off"
                                           accept=".pdf"
                                           name="pdf">
                                    <span class="text-red">{!! $errors->first('pdf') !!}</span>
                                </div>
                            </div> 
                            @if ($course && $course->pdf && is_file(public_path($course->pdf)))
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label>Uploaded Doc</label>
                                  <div class="clearfix"></div>
                                  <a href="{{ asset($course->pdf) }}" class="btn btn-primary" target="_blank"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> {{ basename($course->pdf) }}</a>
                                  <div class="clearfix"></div><br>
                                  <iframe id="fred" style="border:1px solid #666CCC" title="PDF in an i-Frame" src="{{asset($course->pdf)}}" frameborder="1" scrolling="auto" height="500" width="100%" ></iframe>
                                </div>
                              </div>  
                            @endif                      
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer text-right">
                            <a href="{{ route('course') }}" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.7.4/tinymce.min.js"></script>
    <script>
        $(function () {
            let initEditor = (el, dir) => {
                tinymce.init({
                    selector: el,
                    branding: false,
                    height: "300",
                    theme_advanced_statusbar_location: "",
                    menubar: false,
                    plugins: [
                        'advlist autolink lists link image charmap print preview anchor textcolor',
                        'searchreplace visualblocks code fullscreen',
                        'insertdatetime media table contextmenu paste code help wordcount'
                    ],
                    toolbar: 'undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
                    forced_root_block : false,
                    directionality: dir
                });
            };

            initEditor('#content, #home_content', 'ltr');
            $('#image, #pdf').fileinput({'showUpload':false});
        });

    </script>
@stop