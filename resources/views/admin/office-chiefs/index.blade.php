@extends('admin.admin-dashboard')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Office Chiefs</h6>
            <a href="{{ route('admin.office-chiefs.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add New
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name (EN)</th>
                            <th>Name (NP)</th>
                            <th>Position (EN)</th>
                            <th>Position (NP)</th>
                            <th>Office (EN)</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($chiefs as $chief)
                        <tr>
                            <td>{{ $chief->name_en }}</td>
                            <td>{{ $chief->name_np }}</td>
                            <td>{{ $chief->position_en }}</td>
                            <td>{{ $chief->position_np }}</td>
                            <td>{{ $chief->office_en }}</td>
                            {{-- <td>
                                <span class="badge text-dark badge-{{ $chief->status ? 'success' : 'danger' }}">
                                    {{ $chief->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td> --}}
                            <td>
                                <a href="{{ route('admin.office-chiefs.edit', $chief->id) }}" 
                                   class="btn btn-sm btn-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.office-chiefs.destroy', $chief->id) }}" 
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
                            <td colspan="7" class="text-center">No office chiefs found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $chiefs->links() }}
            </div>
        </div>
    </div>
</div>
@endsection