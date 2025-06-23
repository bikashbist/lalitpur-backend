@extends('admin.admin-dashboard')

@section('content')
<div class="container">
   <div class="card p-3">
    <h3>Edit Service</h3>
    <form action="{{ route('services_product.update', $service->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
            </div>
        @endif

        <div class="mb-3">
            <label>Current Image</label><br>
            @if($service->image)
                <img src="{{ asset($service->image) }}" width="120" class="mb-2">
            @endif
            <input type="file" name="image" class="form-control" />
        </div>

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" value="{{ $service->title }}" class="form-control" required />
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="5" id="editor">{{ $service->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
   </div>
</div>
@endsection
