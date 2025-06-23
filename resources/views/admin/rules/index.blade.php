@extends('admin.admin-dashboard')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Rules and Regulations</h6>
            <a href="{{ route('admin.rules.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add New
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>File</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rules as $rule)
                        <tr>
                            <td>{{ $rule->title }}</td>
                            <td>
                                <a href="{{ $rule->file_url }}" target="_blank" class="btn btn-sm btn-info">
                                    View File
                                </a>
                            </td>
                            <td>{{ $rule->order }}</td>
                            <td>
                                <span class="badge badge-{{ $rule->status ? 'success' : 'danger' }}">
                                    {{ $rule->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.rules.edit', $rule->id) }}" 
                                   class="btn btn-sm btn-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.rules.destroy', $rule->id) }}" 
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
                            <td colspan="5" class="text-center">No rules found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $rules->links() }}
            </div>
        </div>
    </div>
</div>
@endsection