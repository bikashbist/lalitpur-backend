@extends('admin.admin-dashboard')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-white">Top Universities</h3>
        <a href="{{ route('top-university.create') }}" class="btn btn-success">Add New University</a>
    </div>

    <div class="card p-3">
        @if($universities->count())
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>URL</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($universities as $university)
                        <tr>
                            <td>{{ $university->name }}</td>
                            <td><a href="{{ $university->url }}" target="_blank">{{ $university->url }}</a></td>
                            <td><img src="{{ asset($university->image_path) }}" width="100" alt=""></td>
                            <td>
                                <a href="{{ route('top-university.edit', $university->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('top-university.destroy', $university->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h5>No Universities Found!</h5>
        @endif
    </div>
</div>
@endsection
