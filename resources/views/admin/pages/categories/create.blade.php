@extends('admin.admin-dashboard')

@section('content')
<div class="container">
   <div class="card p-3">
    <h1 class="mb-4">Create New डाउनलोड मेनु  </h1>
    
    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        
        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        
        <div class="form-group mb-3">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        
        <button type="submit" class="btn btn-primary">Create Category</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
   </div>
</div>
@endsection