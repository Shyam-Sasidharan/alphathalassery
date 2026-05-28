@extends('layouts.app')

@section('title','Update Downloads')

@section('content')
    <section class="content-header">
        <h1>
            Update Downloads
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class=""><a href="{{ route('downloads') }}">Downloads</a></li>
            <li class="active">Update</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-12">
                <!-- form start -->
                <form role="form" action="{{ route('downloads.edit', $downloads->id) }}" lpformnum="1" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Downloads</h3>
                            <div class="pull-right">
                                <a href="{{ route('downloads') }}" class="btn btn-xs btn-default">
                                  <i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                             <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group {{ $errors->first('download_category_id') ? 'has-error' : '' }}">
                                    <label for="download_category_id">Category</label>
                                    <select name="download_category_id" id="download_category_id" class="form-control select2">
                                        @foreach(\App\Models\DownloadCategory::orderBy('name')->get() as $category)
                                            <option  value="{{$category->id}}" {{$category->id == $downloads->download_category_id ? 'selected' : ''}} >{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-red">{!! $errors->first('download_category_id') !!}</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->first('title') ? 'has-error' : '' }}">
                                    <label for="title">Title</label>
                                    <input type="text"
                                           class="form-control"
                                           value="{{ old('title') ?? $downloads->title }}"
                                           id="title"
                                           placeholder="Title"
                                           autocomplete="off"
                                           name="title">
                                    <span class="text-red">{!! $errors->first('title') !!}</span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group {{ $errors->first('content') ? 'has-error' : '' }}">
                                    <label for="content">Cntent</label>
                                    <textarea rows="10"
                                           class="form-control"
                                           id="content"
                                           placeholder="Content"
                                           autocomplete="off"
                                           name="content">{{ old('content') ?? $downloads->content }}</textarea>
                                    <span class="text-red">{!! $errors->first('content') !!}</span>
                                </div>
                            </div> 
                            <div class="col-sm-12">
                                <div class="form-group {{ $errors->first('doc') ? 'has-error' : '' }}">
                                    <label for="doc">Download Doc</label>
                                    <input type="file"
                                           class="form-control"
                                           id="doc"
                                           placeholder="Profile"
                                           autocomplete="off"
                                           accept=".pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png"
                                           name="doc">
                                    <span class="text-red">{!! $errors->first('doc') !!}</span>
                                </div>
                            </div>  
                            <div class="col-md-12">
                            	<div class="form-group">
                            		<label>Uploaded Doc</label>
                            		<div class="clearfix"></div>
                            		<a href="{{ asset($downloads->doc) }}" class="btn btn-primary" target="_blank"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> {{ basename($downloads->doc) }}</a>
                            		<div class="clearfix"></div><br>
                            		<iframe id="fred" style="border:1px solid #666CCC" title="PDF in an i-Frame" src="{{asset($downloads->doc)}}" frameborder="1" scrolling="auto" height="500" width="100%" ></iframe>
                            	</div>
                            </div>                         
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer text-right">
                            <a href="{{ route('downloads') }}" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i>
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

            initEditor('#content', 'ltr');
        });

    </script>
@stop
