@extends('admin.admin-dashboard')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h3 class="mb-0 text-white">Edit Testimonial</h3>
            </div>
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-white text-decoration-none" href="{{ route('testimonials.index') }}">Testimonials List</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card p-4 mt-3">
            <form action="{{ route('testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ old('name', $testimonial->name) }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Position</label>
                    <input type="text" name="position" value="{{ old('position', $testimonial->position) }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Message</label>
                    <textarea name="desc" class="form-control" rows="5">{{ old('desc', $testimonial->desc) }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Current Image</label><br>
                    @if($testimonial->image)
                        <img src="{{ asset( $testimonial->image) }}" alt="" width="100" class="img-thumbnail mb-2">
                    @else
                        <p>No image uploaded</p>
                    @endif
                </div>

                <div class="mb-3">
                    <label>Change Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Update Testimonial</button>
                <a href="{{ route('testimonials.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
