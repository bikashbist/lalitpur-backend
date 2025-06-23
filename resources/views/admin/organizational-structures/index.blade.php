@extends('admin.admin-dashboard')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Organizational Structures</h6>
            <a href="{{ route('admin.organizational-structures.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add New
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($structures as $structure)
                        <tr>
                            <td>{{ $structure->title }}</td>
                            <td>
                                @if($structure->image)
                                <img src="{{ asset($structure->image) }}" alt="{{ $structure->title }}" style="max-height: 50px;">
                                @endif
                            </td>
                            <td>
                                <span class="badge badge-{{ $structure->status ? 'success' : 'danger' }}">
                                    {{ $structure->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.organizational-structures.edit', $structure->id) }}" 
                                   class="btn btn-sm btn-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.organizational-structures.destroy', $structure->id) }}" 
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
                            <td colspan="4" class="text-center">No organizational structures found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $structures->links() }}
            </div>
        </div>
    </div>
</div>
@endsection