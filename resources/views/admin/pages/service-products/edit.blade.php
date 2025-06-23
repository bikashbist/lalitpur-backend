@extends('admin.admin-dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">

                <div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mb-2 mb-lg-0">
                            <h3 class="mb-0  text-white"> Service Product Edit</h3>
                        </div>
                        <div>
                            <nav aria-label="breadcrumb text-white">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-white text-decoration-none"
                                            href="{{ route('service-products.index') }}"> Service Product List</a></li>

                                    <li class="breadcrumb-item text-white active" aria-current="page">Edit </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card p-3">
                    <form action="{{ route('service-products.update', $serviceProduct->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
            
                        <div class="form-group mb-3">
                            <label for="service_category_id">Category</label>
                            <select name="service_category_id" class="form-control" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $serviceProduct->service_category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
            
                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" value="{{ $serviceProduct->title }}" class="form-control" required>
                        </div>
            
                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" id="editor" class="form-control" rows="5">{{ $serviceProduct->description }}</textarea>
                        </div>
            
                        <div class="form-group mb-3">
                            <label>Existing Image</label><br>
                            @if($serviceProduct->image)
                                <img src="{{ asset($serviceProduct->image) }}" width="120" class="mb-2">
                            @endif
                            <input type="file" name="image" class="form-control">
                        </div>
            
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </form>
                </div>
            </div>


        </div>

    </div>
@endsection

@section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
