@extends('admin.admin-dashboard')

@section('content')
<div class="container">
    <div class="row">
       
        <div class="col-12">
            <div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-2 mb-lg-0">
                        <h3 class="mb-0  text-white">Banner Edit</h3>
                    </div>
                    <div>
                        <nav aria-label="breadcrumb text-white">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a class="text-white text-decoration-none" href="{{ route('banner.index') }}">Baner List</a></li>
                
                              <li class="breadcrumb-item text-white active" aria-current="page">Edit </li>
                            </ol>
                          </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mt-3">
            <div class="card p-3">
                <form action="{{ route('banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="image_name_en">Title (English)</label>
                        <input type="text" name="image_name_en" id="image_name_en" 
                               class="form-control" value="{{ $banner->image_name_en }}" required>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="image_name_np">Title (Nepali)</label>
                        <input type="text" name="image_name_np" id="image_name_np" 
                               class="form-control" value="{{ $banner->image_name_np }}" required>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                   
                    <div class="mb-3">
                        <img src="{{ asset($banner->image) }}" alt="{{ $banner->image_name_en }}" style="width: 100px;">
                    </div>
                    
                    <button type="submit" class="btn btn-success mt-3">Update Banner</button>
                </form>
            </div>
        </div>
           
    </div>
    
   
</div>
@endsection

