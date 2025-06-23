@extends('admin.admin-dashboard')


@section('content')
<div class="container">
    <h1 class="mb-4">News List</h1>

    <a href="{{ route('admin.news.create') }}" class="btn btn-success mb-3">Create News</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title (ने)</th>
                <th>Date</th>
                <th>File</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($news as $item)
            <tr>
                <td>{{ $item->title_ne }}</td>
                <td>{{ $item->date }}</td>
                <td>
                    @if($item->file_path)
                        <a href="{{ asset($item->file_path) }}" target="_blank">View File</a>
                    @else
                        N/A
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>

                    <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
