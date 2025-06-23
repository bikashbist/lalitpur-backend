@extends('admin.admin-dashboard')

@section('content')
<div class="container">
    <div class="card p-4">
        <h3>Add New Document</h3>
        <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Document Name (English)</label>
                <input type="text" name="name_en" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Document Name (नेपाली)</label>
                <input type="text" name="name_np" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Upload Image</label>
                <input type="file" name="image" class="form-control" >
            </div>

            <div class="form-group">
                <label>Upload PDF</label>
                <input type="file" name="pdf" class="form-control" >
            </div>

            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
</div>
@endsection
