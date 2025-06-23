@extends('admin.admin-dashboard')

@section('content')
<div class="container">
    <h2 class="fs-4 fw-bold text-white">Add Press Release</h2>
    <form class="bg-white p-4" action="{{ route('admin.press.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label>PDF File (Optional)</label>
            <input type="file" name="file_path" class="form-control">
        </div>

        <button class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
