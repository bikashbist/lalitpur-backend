@extends('admin.admin-dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h3 class="mb-0 text-white">Edit Gallery Item</h3>
                </div>
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-white text-decoration-none" href="{{ route('gallery.index') }}">Gallery List</a>
                            </li>
                            <li class="breadcrumb-item text-white active">Edit</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-lg-12 mt-3">
            <div class="card p-3">
                <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group mb-3">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $key => $category)
                                <option value="{{ $key }}" {{ $gallery->category == $key ? 'selected' : '' }}>{{ $category }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="image_name_en">Image Name (English)</label>
                                <input type="text" name="image_name_en" id="image_name_en" class="form-control" value="{{ $gallery->image_name_en }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="image_name_np">Image Name (Nepali)</label>
                                <input type="text" name="image_name_np" id="image_name_np" class="form-control" value="{{ $gallery->image_name_np }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="title_en">Title (English)</label>
                                <input type="text" name="title_en" id="title_en" class="form-control" value="{{ $gallery->title_en }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="title_np">Title (Nepali)</label>
                                <input type="text" name="title_np" id="title_np" class="form-control" value="{{ $gallery->title_np }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="image">Image</label>
                        @if($gallery->image_path)
                            <div class="mb-2">
                                <img src="{{ asset($gallery->image_path) }}" alt="{{ $gallery->image_name_en }}" style="max-width: 200px;" class="img-thumbnail">
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="remove_image" id="remove_image" value="1">
                                    <label class="form-check-label" for="remove_image">
                                        Remove current image
                                    </label>
                                </div>
                            </div>
                        @endif
                        <input type="file" name="image" id="image" class="form-control">
                        <small class="text-muted">Allowed formats: jpeg, png, jpg, gif | Max size: 2MB</small>
                    </div>

                    <div class="form-group mb-3">
                        <label for="video_url">YouTube Video URL</label>
                        <input type="url" name="video_url" id="video_url" class="form-control" 
                               value="{{ $gallery->video_url }}" 
                               placeholder="https://www.youtube.com/embed/... or https://youtu.be/...">
                        <small class="text-muted">Example: https://www.youtube.com/embed/VIDEO_ID or https://youtu.be/VIDEO_ID</small>
                    </div>

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">Update Item</button>
                        <a href="{{ route('gallery.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection