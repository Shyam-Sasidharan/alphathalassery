@extends('layouts.app')

@section('title','Create Course Syllabus')

@section('content')
    <section class="content-header">
        <h1>
            Course Syllabus
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Course Syllabus</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-12">
                <!-- form start -->
                <form role="form" action="{{ route('semester.create') }}" lpformnum="1" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">&nbsp;</h3>
                            <div class="pull-right">
                                <a href="{{ route('semester') }}" class="btn btn-xs btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group {{ $errors->first('course_id') ? 'has-error' : '' }}">
                                    <label for="course_id">Course</label>
                                    <select name="course_id" id="course_id" class="form-control select2">
                                        @foreach(\App\Models\Course::orderBy('name')->get() as $course)
                                            <option {{old('course_id') == $course->id ? 'selected' : ''}} value="{{$course->id}}">{{$course->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-red">{!! $errors->first('course_id') !!}</span>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group {{ $errors->first('semester') ? 'has-error' : '' }}">
                                    <label for="semester">Semester </label>
                                    <input type="text" class="form-control" value="{{ old('semester') }}" id="semester" autocomplete="off" name="semester">
                                    <span class="text-red">{!! $errors->first('semester') !!}</span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group {{ $errors->first('syllabus') ? 'has-error' : '' }}">
                                    <label for="syllabus">Subject</label>
                                    <textarea rows="10"
                                           class="form-control"
                                           id="syllabus"
                                           placeholder="Syllabus"
                                           autocomplete="off"
                                           name="syllabus">{{ old('syllabus') }}</textarea>
                                    <span class="text-red">{!! $errors->first('syllabus') !!}</span>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer text-right">
                            <a href="{{ route('semester') }}" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i>
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

            initEditor('#syllabus', 'ltr');
        });

    </script>
@stop