@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-12">
        
       
         
        <div>
            <div class="d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h3 class="mb-0  text-white">Create Media Type</h3>
                </div>
                <div>
                    <nav aria-label="breadcrumb text-white">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a class="text-white text-decoration-none" href="{{ route('menu-categories.index') }}">Media Categories</a></li>
            
                          <li class="breadcrumb-item text-white active" aria-current="page">Create Category</li>
                        </ol>
                      </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 mt-3">
      
        <div class="card p-4">
        

            <form action="{{ route('menu-categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="menu-category" class="form-label">Name of the Category</label>
                    <input type="text" class="form-control" id="menu-category" name="name" placeholder="Menu Name">
                </div>
    
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
    
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
   
    </div>
</div>
@endsection
