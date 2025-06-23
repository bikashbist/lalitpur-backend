@extends('admin.admin-dashboard')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit News</h1>

    <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Title (ने)</label>
            <input type="text" name="title_ne" class="form-control" required value="{{ old('title_ne', $news->title_ne) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Content (ने)</label>
            <textarea name="content_ne" class="form-control" rows="5" required>{{ old('content_ne', $news->content_ne) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Date</label>
            <input type="date" name="date" class="form-control" required value="{{ old('date', $news->date) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Current File:</label><br>
            @if($news->file_path)
                <a href="{{ asset($news->file_path) }}" target="_blank">View Current File</a>
            @else
                <span>N/A</span>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Replace File (optional)</label>
            <input type="file" name="file_path" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
