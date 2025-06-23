@extends('admin.admin-dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-2 mb-lg-0">
                        <h3 class="mb-0  text-white">Advertisements Edit</h3>
                    </div>
                    <div>
                        <nav aria-label="breadcrumb text-white">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-white text-decoration-none"
                                        href="{{ route('advertisements.index') }}">Advertisements List</a></li>

                                <li class="breadcrumb-item text-white active" aria-current="page">Edit </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-3">
              <div class="card p-3">
                <form action="{{ route('advertisements.update', $advertisement->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="image_name">Image Name</label>
                        <input type="text" name="image_name" id="image_name" class="form-control"
                            value="{{ $advertisement->image_name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                        <img class="my-3" src="{{ asset($advertisement->image) }}" alt="{{ $advertisement->image_name }}" width="100">
                    </div>
                    <button type="submit" class="btn btn-success">Update Advertisement</button>
                </form>
              </div>
            </div>
        </div>


    </div>
@endsection
