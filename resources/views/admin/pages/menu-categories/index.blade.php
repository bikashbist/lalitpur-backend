@extends('admin.admin-dashboard')

@section('content')
    <div class="row  " >
        <div class="col-lg-12 col-md-12 col-12">

            <div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-2 mb-lg-0">
                        <h3 class="mb-0  text-white"> Media List</h3>
                    </div>
                    <div>
                        <a href="{{ route('menu-categories.create') }}" class="btn btn-white">Create Media</a>
                    </div>
                </div>
            </div>
        </div>
   
        <div class="col-12 mt-3">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif


            <table class="table table-bordered bg-white">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>
                                @if ($category->image)
                                    <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" width="100">
                                @else
                                    No image
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('menu-categories.edit', $category->id) }}"
                                    class="btn btn-primary btn-sm" data-bs-toggle="tooltip" title="Edit Category">
                                    <i class="bi bi-pencil-square text-white"></i>
                                </a>
                                <form action="{{ route('menu-categories.destroy', $category->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" title="Delete Category">
                                        <i class="bi bi-archive"></i>
                                    </button>
                                </form>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
