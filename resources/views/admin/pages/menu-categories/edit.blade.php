@extends('admin.admin-dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-2 mb-lg-0">
                        <h3 class="mb-0  text-white">Category Edit</h3>
                    </div>
                    <div>
                        <nav aria-label="breadcrumb text-white">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-white text-decoration-none"
                                        href="{{ route('menu-categories.index') }}">Category List</a></li>

                                <li class="breadcrumb-item text-white active" aria-current="page">Edit </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mt-3">
       
                <div class="card p-4">

                    <form action="{{ route('menu-categories.update', $menuCategory->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="menu-category" class="form-label">Menu Category</label>
                            <input type="text" class="form-control" id="menu-category" name="name"
                                value="{{ $menuCategory->name }}" placeholder="Menu Name">
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                            @if ($menuCategory->image)
                                <img src="{{ asset($menuCategory->image) }}" alt="{{ $menuCategory->name }}" width="100"
                                    class="mt-2">
                            @endif
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
        </div>
    </div>
@endsection
