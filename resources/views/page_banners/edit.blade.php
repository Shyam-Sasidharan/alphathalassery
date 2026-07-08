@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Edit Page Banner</h1>
    </section>

    <section class="content">
        <div class="box">
            <form action="{{ route('page_banner.edit', $page_banner) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label>Page</label>
                        <input type="text" class="form-control" value="{{ ucwords(str_replace('_', ' ', $page_banner->page_key)) }}" disabled>
                    </div>
                    <div class="form-group">
                        <label>Main Header</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $page_banner->title) }}" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" rows="5" class="form-control">{{ old('description', $page_banner->description) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Banner Image</label>
                        <input type="file" name="image" class="form-control">
                        @if($page_banner->image)
                            <div class="mt-10">
                                <img src="{{ asset($page_banner->image) }}" alt="{{ $page_banner->title }}" style="max-width: 320px; height: auto;">
                            </div>
                        @endif
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update Banner</button>
                    <a href="{{ route('page_banner') }}" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div>
    </section>
@endsection
