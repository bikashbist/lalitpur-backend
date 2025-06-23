@extends('admin.admin-dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-2 mb-lg-0">
                        <h3 class="mb-0  text-white">Our Process Edit</h3>
                    </div>
                    <div>
                        <nav aria-label="breadcrumb text-white">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-white text-decoration-none"
                                        href="{{ route('core-values.index') }}">Our Process List</a></li>

                                <li class="breadcrumb-item text-white active" aria-current="page">Edit </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card p-3">
                <form action="{{ route('core-values.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" value="{{ $data->title }}" class="form-control" required>
                    </div>
        
                    <div class="form-group mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" id="editor" class="form-control" rows="5">{{ $data->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update </button>
                </form>
            </div>
        </div>
    </div>
  
   
</div>
@endsection
