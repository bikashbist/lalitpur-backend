@extends('admin.admin-dashboard')

@section('content')
<div class="container">
  <div class="card p-3">
    <h1 class="mb-4">{{ $category->title }}</h1>
    
    <div class="card mb-4">
        @if($category->image)
            <img src="{{ asset($category->image) }}" class="card-img-top" alt="{{ $category->title }}" style="max-height: 400px; object-fit: cover;">
        @endif
        <div class="card-body">
            <p class="card-text">{{ $category->description }}</p>
            
            <div class="d-flex justify-content-between">
                <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('categories.destroy', $category) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
    
    <h2 class="mb-3">Subcategories</h2>
    
    <a href="{{ route('categories.subcategories.create', $category) }}" class="btn btn-success mb-3">Add Subcategory</a>
    
    <div class="row">
        @foreach($category->subcategories as $subcategory)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if($subcategory->image)
                        <img src="{{ asset( $subcategory->image) }}" class="card-img-top" alt="{{ $subcategory->title }}" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $subcategory->title }}</h5>
                        <p class="card-text">{{ Str::limit($subcategory->description, 100) }}</p>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('subcategories.edit', $subcategory) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('subcategories.destroy', $subcategory) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
  </div>
</div>
@endsection