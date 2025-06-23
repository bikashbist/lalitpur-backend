@extends('admin.admin-dashboard')

@section('content')
<div class="container">
   <div class="card p-3">
    <h1 class="mb-4">Edit 
                                डाउनलोड विवरण  
                            </h1>
    
    <form action="{{ route('subcategories.update', $subcategory) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group mb-3">
            <label for="category_id">Category</label>
            <select class="form-control" id="category_id" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $subcategory->category_id == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $subcategory->title }}" required>
        </div>
        
        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea class="form-control" id="editor" name="description" rows="3">{{ $subcategory->description }}</textarea>
        </div>
        
        <div class="form-group mb-3">
            <label for="image">Image</label>
            @if($subcategory->image)
                <div class="mb-2">
                    <img src="{{ asset($subcategory->image) }}" alt="Current Image" width="100">
                </div>
            @endif
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        
        <button type="submit" class="btn btn-primary">Update डाउनलोड विवरण </button>
        <a href="{{ route('subcategories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
   </div>
</div>
@endsection