@extends('layouts.app')

@section('title','Create FAQ')

@section('content')
    <section class="content-header">
        <h1>
            Add FAQ
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class=""><a href="{{ route('faq') }}">FAQ</a></li>
            <li class="active">Add</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-12">
                <!-- form start -->
                <form role="form" action="{{ route('faq.create') }}" lpformnum="1" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add FAQ</h3>
                            <div class="pull-right">
                                <a href="{{ route('faq') }}" class="btn btn-xs btn-default">
                                  <i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <div class="col-sm-12">
                                <div class="form-group {{ $errors->first('question') ? 'has-error' : '' }}">
                                    <label for="question">Question</label>
                                    <input type="text"
                                           class="form-control"
                                           value="{{ old('question') }}"
                                           id="question"
                                           placeholder="Question"
                                           autocomplete="off"
                                           name="question">
                                    <span class="text-red">{!! $errors->first('question') !!}</span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group {{ $errors->first('answer') ? 'has-error' : '' }}">
                                    <label for="answer">Answer</label>
                                    <textarea rows="10"
                                           class="form-control"
                                           id="answer"
                                           placeholder="Content"
                                           autocomplete="off"
                                           name="answer">{{ old('answer') }}</textarea>
                                    <span class="text-red">{!! $errors->first('answer') !!}</span>
                                </div>
                            </div>                            
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer text-right">
                            <a href="{{ route('faq') }}" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i>
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

            initEditor('#answer', 'ltr');
        });

    </script>
@stop
