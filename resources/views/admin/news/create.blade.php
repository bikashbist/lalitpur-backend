@extends('admin.admin-dashboard')


@section('content')
<div class="container">
    <h1 class="mb-4">Create News</h1>

    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Title (ने)</label>
            <input type="text" name="title_ne" class="form-control" required value="{{ old('title_ne') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Content (ने)</label>
            <textarea name="content_ne" class="form-control" rows="5" required>{{ old('content_ne') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Date</label>
            <input type="date" name="date" class="form-control" required value="{{ old('date') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Upload File (optional)</label>
            <input type="file" name="file_path" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
