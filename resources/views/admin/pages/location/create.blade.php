@extends('admin.admin-dashboard')

@section('content')
<div class="container mt-4">
  <div class="card p-3">
    <h2>Add New Location</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('locations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

      
        <div class="form-group mb-3">
            <label>Location Category</label>
            <input type="text" name="location_category" class="form-control" required>
        </div>
        

        <div class="form-group mb-3">
            <label>Contact Person Name</label>
            <input type="text" name="contact_name" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Address</label>
            <input type="text" name="address" class="form-control" required>
   
        </div>

        <div class="form-group mb-3">
            <label>Map (Embed Code or Link)</label>
            <textarea name="map" class="form-control" rows="5" placeholder="Paste Google Maps embed code here"></textarea>
        </div>
        

        <div class="form-group mb-3">
            <label>Contact Person Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Create Location</button>
    </form>
  </div>
</div>
@endsection
