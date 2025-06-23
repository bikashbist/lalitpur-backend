@extends('admin.admin-dashboard')

@section('content')
<div class="container">
    <h2>Press Releases</h2>
    <a href="{{ route('admin.press.create') }}" class="btn btn-success mb-3">Add New</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered bg-white p-4">
        <thead>
            <tr>
                <th>Date</th>
                <th>Title</th>
                <th>File</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pressReleases as $item)
            <tr>
                <td>{{ $item->date }}</td>
                <td>{{ $item->title }}</td>
                <td>
                    @if($item->file_path)
                        <a href="{{ asset($item->file_path) }}" target="_blank">Download</a>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.press.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('admin.press.destroy', $item->id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Are you sure?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $pressReleases->links() }}
</div>
@endsection
