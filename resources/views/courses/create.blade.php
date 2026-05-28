@extends('layouts.app')

@section('title','Create Course Record')

@section('content')
    <section class="content-header">
        <h1>
            Add Course
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class=""><a href="{{ route('course') }}">Course</a></li>
            <li class="active">Add</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-12">
                <!-- form start -->
                <form role="form" action="{{ route('course.create') }}" lpformnum="1" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Course</h3>
                            <div class="pull-right">
                                <a href="{{ route('course') }}" class="btn btn-xs btn-default">
                                	<i class="fa fa-chevron-left" aria-hidden="true"></i> Back
                                </a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            {{--English Title--}}
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group {{ $errors->first('name') ? 'has-error' : '' }}">
                                    <label for="name">Course Name</label>
                                    <input type="text" class="form-control" value="{{ old('name') }}" id="name" placeholder="Course Name" autocomplete="off" name="name">
                                    <span class="text-red">{!! $errors->first('name') !!}</span>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group {{ $errors->first('home_content') ? 'has-error' : '' }}">
                                    <label for="home_content">Home Content</label>
                                    <textarea rows="10" class="form-control" id="home_content" placeholder="Course Content" autocomplete="off" name="home_content">{{ old('home_content') }}</textarea>
                                    <span class="text-red">{!! $errors->first('home_content') !!}</span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group {{ $errors->first('content') ? 'has-error' : '' }}">
                                    <label for="content">Content</label>
                                    <textarea rows="10" class="form-control" id="content" placeholder="Course Content" autocomplete="off" name="content">{{ old('content') }}</textarea>
                                    <span class="text-red">{!! $errors->first('content') !!}</span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-sm-6 col-md-3 col-lg-3">
                                <div class="form-group {{ $errors->first('duration') ? 'has-error' : '' }}">
                                    <label for="duration">Course Duration</label>
                                    <input type="text" class="form-control" value="{{ old('duration') }}" id="duration" placeholder="Duration" autocomplete="off" name="duration">
                                    <span class="text-red">{!! $errors->first('duration') !!}</span>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 col-lg-3">
                                <div class="form-group {{ $errors->first('mode') ? 'has-error' : '' }}">
                                    <label for="mode">Course Mode</label>
                                    <input type="text" class="form-control" value="{{ old('mode') }}" id="mode" placeholder="Full-Time" autocomplete="off" name="mode">
                                    <span class="text-red">{!! $errors->first('mode') !!}</span>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 col-lg-3">
                                <div class="form-group {{ $errors->first('type') ? 'has-error' : '' }}">
                                    <label for="type">Course Type</label>
                                    <input type="text" class="form-control" value="{{ old('type') }}" id="type" placeholder="Diploma" autocomplete="off" name="type">
                                    <span class="text-red">{!! $errors->first('type') !!}</span>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 col-lg-3">
                                <div class="form-group {{ $errors->first('intake') ? 'has-error' : '' }}">
                                    <label for="intake">Course Intake</label>
                                    <input type="text" class="form-control" value="{{ old('intake') }}" id="intake" placeholder="May 2026" autocomplete="off" name="intake">
                                    <span class="text-red">{!! $errors->first('intake') !!}</span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group {{ $errors->first('fee') ? 'has-error' : '' }}">
                                    <label for="fee">Course Fee</label>
                                    <input type="text" class="form-control" value="{{ old('fee') }}" id="fee" placeholder="Course Fee" autocomplete="off" name="fee">
                                    <span class="text-red">{!! $errors->first('fee') !!}</span>
                                </div>
                            </div> 
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
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group {{ $errors->first('heading') ? 'has-error' : '' }}">
                                    <label for="heading">Course Heading</label>
                                    <input type="text" class="form-control" value="{{ old('heading') }}" id="heading" placeholder="Course Name" autocomplete="off" name="heading">
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
@section('js')
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
        });

    </script>
@stop
