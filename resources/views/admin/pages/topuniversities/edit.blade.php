@extends('admin.admin-dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-white mb-4">Edit Top University</h3>
            <div class="card p-3">
                <form action="{{ route('top-university.update', $university->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group mb-3">
                        <label for="name">University Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $university->name }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="url">University URL</label>
                        <input type="url" name="url" id="url" class="form-control" value="{{ $university->url }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="image">University Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                        <small class="text-muted">Leave empty if you don't want to change the image.</small><br>
                        <img src="{{ asset($university->image_path) }}" width="120" class="mt-2" alt="Current Image">
                    </div>

                    <button type="submit" class="btn btn-primary">Update University</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
