@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Page Banners</h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <form action="" method="get" class="form-inline">
                    <div class="form-group">
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search banners">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Page</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th width="100">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($banners as $banner)
                        <tr>
                            <td>{{ ucwords(str_replace('_', ' ', $banner->page_key)) }}</td>
                            <td>{{ $banner->title }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($banner->description, 90) }}</td>
                            <td>
                                <a href="{{ route('page_banner.edit', $banner) }}" class="btn btn-xs btn-primary">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No page banners found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
                {{ $banners->links() }}
            </div>
        </div>
    </section>
@endsection
