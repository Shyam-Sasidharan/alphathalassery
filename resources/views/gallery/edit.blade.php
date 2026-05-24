@extends('layouts.app')

@section('title','Edit Gallery Record')

@section('content')
    <section class="content-header">
        <h1>
            Update Gallery
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class=""><a href="{{ route('gallery') }}">Gallery</a></li>
            <li class="active">Update</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-12">
                <!-- form start -->
                <form role="form" action="{{ route('gallery.edit', $gallery->id) }}" lpformnum="1" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update Gallery</h3>
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
                                    <label for="name"> Gallery Title</label>
                                    <input type="text"
                                           class="form-control"
                                           value="{{ old('name') ?? $gallery->name }}"
                                           id="name"
                                           placeholder="Gallery Title"
                                           autocomplete="off"
                                           name="name">
                                    <span class="text-red">{!! $errors->first('name') !!}</span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-sm-6">
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
                            @if ($gallery && $gallery->image && is_file(public_path($gallery->image)))
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->first('image') ? 'has-error' : '' }}">
                                        <label class="control-label">Uploaded Image : </label>
                                        <img src="{{ asset($gallery->image) }}" class="img-responsive">
                                    </div>
                                </div>
                            @endif
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

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.min.css" />
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.7.4/tinymce.min.js"></script>
    <script>
        $(function () {
            $('#image').fileinput({'showUpload':false});
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

            initEditor('#content', 'ltr');
            $('#image').fileinput({'showUpload':false});
        });

    </script>
@stop