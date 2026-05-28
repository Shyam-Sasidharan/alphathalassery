@extends('layouts.app')

@section('title','Edit Publication')

@section('content')
    <section class="content-header">
        <h1>
            Update Publication
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class=""><a href="{{ route('publications') }}">Publication</a></li>
            <li class="active">Update</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-12">
                <!-- form start -->
                <form role="form" action="{{ route('publications.edit', $publications->id) }}" lpformnum="1" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update Publication</h3>
                            <div class="pull-right">
                                <a href="{{ route('publications') }}" class="btn btn-xs btn-default">
                                    <i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group {{ $errors->first('category_id') ? 'has-error' : '' }}">
                                    <label for="category_id">Category</label>
                                    <select name="category_id" id="category_id" class="form-control select2">
                                        @foreach(\App\Models\Category::orderBy('name')->get() as $category)
                                            <option  value="{{$category->id}}" {{$category->id == $publications->category_id ? 'selected' : ''}} >{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-red">{!! $errors->first('category_id') !!}</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->first('name') ? 'has-error' : '' }}">
                                    <label for="name"> Publication Name</label>
                                    <input type="text"
                                           class="form-control"
                                           value="{{ old('name') ?? $publications->name }}"
                                           id="name"
                                           placeholder="Publication Name"
                                           autocomplete="off"
                                           name="name">
                                    <span class="text-red">{!! $errors->first('name') !!}</span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->first('author') ? 'has-error' : '' }}">
                                    <label for="author">Language</label>
                                    <input type="text"
                                           class="form-control"
                                           value="{{ old('author') ?? $publications->author }}"
                                           id="author"
                                           placeholder="Author Name"
                                           autocomplete="off"
                                           name="author">
                                    <span class="text-red">{!! $errors->first('author') !!}</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->first('price') ? 'has-error' : '' }}">
                                    <label for="price">Price</label>
                                    <input type="text"
                                           class="form-control"
                                           value="{{ old('price') ?? $publications->price }}"
                                           id="price"
                                           placeholder="Author Name"
                                           autocomplete="off"
                                           name="price">
                                    <span class="text-red">{!! $errors->first('price') !!}</span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-sm-12">
                                <div class="form-group {{ $errors->first('content') ? 'has-error' : '' }}">
                                    <label for="content">Content</label>
                                    <textarea rows="10"
                                            class="form-control"
                                            id="content"
                                            placeholder="Content"
                                            autocomplete="off"
                                            name="content">{{ old('content') ?? $publications->content }}</textarea>
                                    <span class="text-red">{!! $errors->first('content') !!}</span>
                                </div>
                            </div>
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
                            @if ($publications && $publications->image && is_file(public_path($publications->image)))
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->first('image') ? 'has-error' : '' }}">
                                        <label class="control-label">Uploaded Image : </label>
                                        <img src="{{ asset($publications->image) }}" class="img-responsive">
                                    </div>
                                </div>
                            @endif
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer text-right">
                            <a href="{{ route('publications') }}" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i>
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

            initEditor('#content');
        });

    </script>
@stop
