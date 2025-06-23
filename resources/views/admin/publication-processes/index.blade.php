@extends('admin.admin-dashboard')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Publication Processes</h6>
            <a href="{{ route('admin.publication-processes.create') }}" class="btn btn-primary">Add New</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Page Title</th>
                            <th>Section Title</th>
                            <th>Status</th>
                            <th>Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($processes as $process)
                        <tr>
                            <td>{{ $process->page_title }}</td>
                            <td>{{ $process->section_title }}</td>
                            <td>{{ $process->status ? 'Active' : 'Inactive' }}</td>
                            <td>{{ $process->order }}</td>
                            <td>
                                <a href="{{ route('admin.publication-processes.edit', $process->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('admin.publication-processes.destroy', $process->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $processes->links() }}
            </div>
        </div>
    </div>
</div>
@endsection