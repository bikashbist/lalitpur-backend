@extends('admin.admin-dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-2 mb-lg-0">
                        <h3 class="mb-0 text-white">Edit News</h3>
                    </div>
                    <div>
                        <nav aria-label="breadcrumb text-white">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-white text-decoration-none"
                                        href="{{ route('service-categories.index') }}">Class List</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Edit</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 mt-3">
                <div class="card p-3">
                    <form action="{{ route('service-categories.update', $serviceCategory->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="name">Category Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $serviceCategory->name }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ $serviceCategory->description }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="image">Category Image</label>
                            @if($serviceCategory->image)
                                <div class="mb-2">
                                    <img src="{{ asset($serviceCategory->image) }}" alt="Category Image" style="width: 150px; height: auto;">
                                </div>
                                <small class="text-muted">Leave empty to keep the current image</small>
                            @endif
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="image_icon">Category Icon</label>
                            @if($serviceCategory->image_icon)
                                <div class="mb-2">
                                    <img src="{{ asset($serviceCategory->image_icon) }}" alt="Category Icon" style="width: 150px; height: auto;">
                                </div>
                                <small class="text-muted">Leave empty to keep the current icon</small>
                            @endif
                            <input type="file" name="image_icon" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
