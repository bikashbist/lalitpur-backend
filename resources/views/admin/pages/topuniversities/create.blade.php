@extends('admin.admin-dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-white mb-4">Add Top University</h3>
            <div class="card p-3">
                <form action="{{ route('top-university.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">University Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="url">University URL</label>
                        <input type="url" name="url" id="url" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="image">University Image</label>
                        <input type="file" name="image" id="image" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add University</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
