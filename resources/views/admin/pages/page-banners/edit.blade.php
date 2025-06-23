@extends('admin.admin-dashboard')

@section('content')
<div class="container">
    <div class="card p-3">
        <h3>Edit Page Banner</h3>
    <form action="{{ route('page-banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="page">Select Page</label>
            <select name="page" id="page" class="form-control" required>
                <option value="about" {{ $banner->page == 'about' ? 'selected' : '' }}>About</option>
                <option value="contact" {{ $banner->page == 'contact' ? 'selected' : '' }}>Contact</option>
                <option value="services" {{ $banner->page == 'services' ? 'selected' : '' }}>Services</option>
                <option value="blog" {{ $banner->page == 'blog' ? 'selected' : '' }}>Blog</option>
            </select>
        </div>

        <div class="form-group">
            <label for="title">Banner Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $banner->title }}" required>
        </div>

        <div class="form-group">
            <label for="image">Banner Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @if ($banner->image)
                <img src="{{ asset($banner->image) }}" width="120" class="mt-2" alt="Current Image">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Banner</button>
    </form>
    </div>
</div>
@endsection
