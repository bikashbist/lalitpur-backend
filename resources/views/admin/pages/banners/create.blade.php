@extends('admin.admin-dashboard')

@section('content')
    <div class="container">
        <div class="card p-3">
            <h1>Add New Banner</h1>
            <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label for="image_name_en">Title (English)</label>
                    <input type="text" name="image_name_en" id="image_name_en"
                        class="form-control @error('image_name_en') is-invalid @enderror" value="{{ old('image_name_en') }}"
                        required>
                    @error('image_name_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="image_name_np">Title (Nepali)</label>
                    <input type="text" name="image_name_np" id="image_name_np"
                        class="form-control @error('image_name_np') is-invalid @enderror" value="{{ old('image_name_np') }}"
                        required>
                    @error('image_name_np')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="image">Banner Image</label>
                    <input type="file" name="image" id="image"
                        class="form-control @error('image') is-invalid @enderror" required>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Max file size: 2MB | Allowed formats: jpeg, png, jpg, gif</small>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Add Image</button>
            </form>
        </div>
    </div>
@endsection
