@extends('admin.admin-dashboard')

@section('content')
<div class="container">
  <div class="card p-3">
    <h1>Add Page Banner</h1>
    <form action="{{ route('page-banners.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="page">Select Page</label>
            <select name="page" id="page" class="form-control" required>
                <option value="">-- Select Page --</option>
                <option value="about">About</option>
                <option value="contact">Contact</option>
                <option value="services">Services</option>
                <option value="blog">Blog</option>
            </select>
        </div>

        <div class="form-group">
            <label for="title">Banner Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="image">Banner Image</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Banner</button>
    </form>
  </div>
</div>
@endsection
