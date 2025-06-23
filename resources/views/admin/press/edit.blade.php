@extends('admin.admin-dashboard')

@section('content')
<div class="container">
    <h2 class="fs-4 fw-bold text-white">Edit Press Release</h2>
    <form class="bg-white p-4" action="{{ route('admin.press.update', $press->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $press->title) }}" required>
        </div>

        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" class="form-control" value="{{ old('date', $press->date) }}" required>
        </div>

        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="5" required>{{ old('content', $press->content) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Current PDF</label>
            @if($press->file_path)
                <p><a href="{{ asset($press->file_path) }}" target="_blank">View Current File</a></p>
            @else
                <p>No file uploaded.</p>
            @endif
        </div>

        <div class="mb-3">
            <label>Change PDF File (Optional)</label>
            <input type="file" name="file_path" class="form-control">
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('admin.press.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
