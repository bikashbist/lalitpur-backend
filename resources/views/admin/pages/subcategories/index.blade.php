@extends('admin.admin-dashboard')

@section('content')
<div class="container">
  <div class="card p-3">
   <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="mb-4">
                                डाउनलोड विवरण  
                            </h1>
    
    <a href="{{ route('subcategories.create') }}" class="btn btn-primary mb-3">Create New Subcategory</a>
   </div>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @foreach($subcategories as $subcategory)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if($subcategory->image)
                        <img src="{{ asset( $subcategory->image) }}" class="card-img-top" alt="{{ $subcategory->title }}" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $subcategory->title }}</h5>
                        <p class="card-text">{!! Str::limit($subcategory->description, 100) !!}</p>
                        <p class="card-text"><small class="text-muted">Category: {{ $subcategory->category->title }}</small></p>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('subcategories.show', $subcategory) }}" class="btn btn-sm btn-info">View</a>
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