@extends('admin.admin-dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">

            <div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-2 mb-lg-0">
                        <h3 class="mb-0  text-white">Certificate Create</h3>
                    </div>
                    <div>
                        <nav aria-label="breadcrumb text-white">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-white text-decoration-none"
                                        href="">Certificate List</a></li>

                                <li class="breadcrumb-item text-white active" aria-current="page">Create </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 mt-3">
            <div class="card p-3">
                <form action="{{ route('certificate.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group mb-3">
                        <label for="image_name">Image Name</label>
                        <input type="text" name="image_name" id="image_name" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Certificate</button>
                </form>
            </div>
           
        </div>
    </div>
   
   
</div>
@endsection
