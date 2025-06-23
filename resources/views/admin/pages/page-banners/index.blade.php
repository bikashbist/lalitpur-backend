@extends('admin.admin-dashboard')

@section('content')
<div class="container">
    <h2 class="text-white">Page Banners</h2>
    <a href="{{ route('page-banners.create') }}" class="btn btn-success mb-3">+ Add New Banner</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered bg-white">
        <thead>
            <tr>
                <th>Page</th>
                <th>Title</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($banners as $banner)
                <tr>
                    <td>{{ ucfirst($banner->page) }}</td>
                    <td>{{ $banner->title }}</td>
                    <td>
                        <img src="{{ asset($banner->image) }}" width="120" height="60" alt="Banner">
                    </td>
                    <td>
                        <a href="{{ route('page-banners.edit', $banner->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('page-banners.destroy', $banner->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
