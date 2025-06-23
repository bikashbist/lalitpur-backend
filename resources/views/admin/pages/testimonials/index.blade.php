@extends('admin.admin-dashboard')
@section('content')
<div class="card p-3">
    <div class="d-flex justify-content-between mb-3">
        <h4>Testimonials List</h4>
        <a href="{{ route('testimonials.create') }}" class="btn btn-primary">Create New</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Position</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($testimonials as $item)
            <tr>
                <td><img src="{{ asset( $item->image ) }}" width="60" alt=""></td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->position }}</td>
                <td>{{ Str::limit($item->desc, 100) }}</td>
                <td class="d-flex gap-1">
                    <a href="{{ route('testimonials.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('testimonials.destroy', $item->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
