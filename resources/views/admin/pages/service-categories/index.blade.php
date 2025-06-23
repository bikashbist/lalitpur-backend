@extends('admin.admin-dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h3 class="mb-0 text-white">News List</h3>
                </div>
                <div>
                    <a href="{{ route('service-categories.create') }}" class="btn btn-white">Create</a>
                </div>
            </div>
        </div> 
        <div class="col-lg-12 mt-3">
            <table class="table table-bordered mt-3 bg-white">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Icon</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            @if($category->image)
                                <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" style="width: 100px; height: auto;">
                            @else
                                <span>No Image</span>
                            @endif
                        </td>
                        <td>
                            @if($category->image_icon)
                                <img src="{{ asset($category->image_icon) }}" alt="{{ $category->name }}" style="width: 100px; height: auto;">
                            @else
                                <span>No Icon</span>
                            @endif
                        </td>
                        <td>{{ Str::limit($category->description, 50) }}</td>
                        <td class="d-flex justify-content-center align-items-center gap-1">
                            <a href="{{ route('service-categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('service-categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
