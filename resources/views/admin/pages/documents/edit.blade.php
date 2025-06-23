@extends('admin.admin-dashboard')

@section('content')
<div class="container">
    <div class="card p-4">
        <h3>Edit Document</h3>
        <form action="{{ route('documents.update', $document->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Document Name (English)</label>
                <input type="text" name="name_en" class="form-control" value="{{ $document->name_en }}" required>
            </div>

            <div class="form-group">
                <label>Document Name (नेपाली)</label>
                <input type="text" name="name_np" class="form-control" value="{{ $document->name_np }}" required>
            </div>

            <div class="form-group">
                <label>Current Image</label><br>
                <img src="{{ asset($document->image_path) }}" width="150" class="mb-2">
                <input type="file" name="image" class="form-control">
            </div>

            <div class="form-group">
                <label>Current PDF</label><br>
                <a href="{{ asset($document->pdf_path) }}" target="_blank">View PDF</a>
                <input type="file" name="pdf" class="form-control mt-2">
            </div>

            <button type="submit" class="btn btn-success mt-3">Update</button>
        </form>
    </div>
</div>
@endsection
