@extends('admin.admin-dashboard')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Citizen Charters</h6>
            <a href="{{ route('admin.citizen-charters.create') }}" class="btn btn-primary btn-sm">
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
                        @forelse($charters as $charter)
                        <tr>
                            <td>{{ $charter->title }}</td>
                            <td>
                                <span class="badge badge-{{ $charter->status ? 'success' : 'danger' }}">
                                    {{ $charter->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>{{ $charter->updated_at->format('Y-m-d H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.citizen-charters.edit', $charter->id) }}" 
                                   class="btn btn-sm btn-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.citizen-charters.destroy', $charter->id) }}" 
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
                            <td colspan="4" class="text-center">No citizen charters found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $charters->links() }}
            </div>
        </div>
    </div>
</div>
@endsection