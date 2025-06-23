@extends('admin.admin-dashboard')

@section('content')
<div class="container ">
    <div class="card p-3">
        <h4>Add New Service</h4>
        <form action="{{ route('services_product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
    
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
                </div>
            @endif
    
            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control" />
            </div>
    
            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" required />
            </div>
    
            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="5" id="editor"></textarea>
            </div>
    
            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
  
</div>
@endsection
