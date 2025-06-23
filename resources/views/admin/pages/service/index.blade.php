@extends('admin.admin-dashboard')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="text-white">All Services</h3>
        <a href="{{ route('services_product.create') }}" class="btn btn-white">Add New Service</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered bg-white">
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th style="width: 160px">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
                <tr>
                    <td><img src="{{ asset($service->image) }}" width="100" alt="Image"></td>
                    <td>{{ $service->title }}</td>
                    <td>{{ \Illuminate\Support\Str::limit(strip_tags($service->description), 100) }}</td>
                    <td>
                        <a href="{{ route('services_product.edit', $service->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('services_product.destroy', $service->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this service?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
