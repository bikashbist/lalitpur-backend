@extends('admin.admin-dashboard')

@section('content')
<div class="container mt-4">
    <div class="card p-3">
        <h2>Edit Location</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <form action="{{ route('locations.update', $location->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
    
            <div class="form-group mb-3">
                <label>Location Category</label>
                <input type="text" name="location_category" value="{{ $location->location_category }}" class="form-control" required>
            </div>
            
    
            <div class="form-group mb-3">
                <label>Contact Person Name</label>
                <input type="text" name="contact_name" value="{{ $location->contact_name }}" class="form-control" required>
            </div>
    
            <div class="form-group mb-3">
                <label>Phone</label>
                <input type="text" name="phone" value="{{ $location->phone }}" class="form-control" required>
            </div>
    
            <div class="form-group mb-3">
                <label>Email</label>
                <input type="email" name="email" value="{{ $location->email }}" class="form-control" required>
            </div>
    
            <div class="form-group mb-3">
                <label>Address</label>
                <input type="text" name="address" value="{{ $location->address }}" class="form-control" required>

            </div>
    
            <div class="form-group mb-3">
                <label>Map (Embed Code or Link)</label>
                <textarea name="map" class="form-control">{{ $location->map }}</textarea>
            </div>
    
            <div class="form-group mb-3">
                <label>Contact Person Image</label>
                <input type="file" name="image" class="form-control">
                @if($location->image)
                    <div class="mt-2">
                        <img src="{{ asset($location->image) }}" width="100">
                    </div>
                @endif
            </div>
    
            <button type="submit" class="btn btn-success">Update Location</button>
        </form>
    </div>
</div>
@endsection
