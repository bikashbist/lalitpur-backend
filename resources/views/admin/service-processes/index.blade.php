@extends('admin.admin-dashboard')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Service Processes</h6>
            <a href="{{ route('admin.service-processes.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add New
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Last Updated</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($processes as $process)
                        <tr>
                            <td>{{ $process->title }}</td>
                            <td>
                                <span class="badge badge-{{ $process->status ? 'success' : 'danger' }}">
                                    {{ $process->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>{{ $process->updated_at->format('Y-m-d H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.service-processes.edit', $process->id) }}" 
                                   class="btn btn-sm btn-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.service-processes.destroy', $process->id) }}" 
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" 
                                            onclick="return confirm('Are you sure?')" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">No service processes found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $processes->links() }}
            </div>
        </div>
    </div>
</div>
@endsection