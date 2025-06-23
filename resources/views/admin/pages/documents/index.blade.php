@extends('admin.admin-dashboard')

@section('content')
<div class="container">
    <div class="card p-4">
        <div class="d-flex justify-content-between mb-3">
            <h3>Document List</h3>
            <a href="{{ route('documents.create') }}" class="btn btn-primary">Add New</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name (EN)</th>
                    <th>Name (NP)</th>
                    <th>PDF</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($documents as $key => $document)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td><img src="{{ asset($document->image_path) }}" width="60"></td>
                        <td>{{ $document->name_en }}</td>
                        <td>{{ $document->name_np }}</td>
                        <td><a href="{{ asset($document->pdf_path) }}" target="_blank">View</a></td>
                        <td>
                            <a href="{{ route('documents.edit', $document->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('documents.destroy', $document->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center">No documents found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
