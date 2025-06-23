@extends('admin.admin-dashboard')

@section('content')
<div class="container">
   <div class="card p-3">
    <h1 class="mb-4">Edit डाउनलोड मेनु  </h1>
    
    <form action="{{ route('categories.update', $category) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $category->title }}" required>
        </div>
        
        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $category->description }}</textarea>
        </div>
        
        <div class="form-group mb-3">
            <label for="image">Image</label>
            @if($category->image)
                <div class="mb-2">
                    <img src="{{ asset( $category->image) }}" alt="Current Image" width="100">
                </div>
            @endif
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        
        <button type="submit" class="btn btn-primary">Update Category</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
   </div>
</div>
@endsection