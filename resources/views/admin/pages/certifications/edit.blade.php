@extends('admin.admin-dashboard')

@section('content')
<div class="container">
   <div class="card p-3">
    <div class="row">
        <div class="col-12">
            <h3 class="mb-3">Edit Certificate</h3>

            <form action="{{ route('certificate.update', $certificate->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="image_name">Image Name</label>
                    <input type="text" name="image_name" id="image_name" class="form-control" value="{{ $certificate->image_name }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="image">Change Image (optional)</label>
                    <input type="file" name="image" id="image" class="form-control">
                    <br>
                    <img src="{{ asset($certificate->image_path) }}" alt="" width="150">
                </div>

                <button type="submit" class="btn btn-primary">Update Certificate</button>
            </form>

        </div>
    </div>
   </div>
</div>
@endsection
