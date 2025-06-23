@extends('admin.admin-dashboard')

@section('content')
<div class="container">
   <div class="card p-3">
    <h1 class="mb-4">{{ $subcategory->title }}</h1>
    
    <div class="card mb-4">
        @if($subcategory->image)
            <img src="{{ asset( $subcategory->image) }}" class="card-img-top" alt="{{ $subcategory->title }}" style="max-height: 400px; object-fit: cover;">
        @endif
        <div class="card-body">
            <h5 class="card-title">Category: {{ $subcategory->category->title }}</h5>
            <p class="card-text">{{ $subcategory->description }}</p>
            
            <div class="d-flex justify-content-between">
                <a href="{{ route('subcategories.edit', $subcategory) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('subcategories.destroy', $subcategory) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
    
    <a href="{{ route('subcategories.index') }}" class="btn btn-secondary">Back to Subcategories</a>
   </div>
</div>
@endsection