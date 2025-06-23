@extends('admin.admin-dashboard')

@section('content')
    <div class="container">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h3 class="mb-0 text-white">Create News</h3>
                </div>
                <div>
                    <nav aria-label="breadcrumb text-white">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-white text-decoration-none"
                                    href="{{ route('service-categories.index') }}">Class List</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Create</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        
        <div class="col-lg-12 mt-3">
            <div class="card p-3">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form action="{{ route('service-categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Category Name</label>
                        <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="image">Category Image</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="image_icon">Image Icon</label>
                        <input type="file" name="image_icon" class="form-control" accept="image/*">
                        @error('image_icon')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection