@extends('admin.admin-dashboard')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Team Members</h6>
            <a href="{{ route('admin.team-members.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add New
            </a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Status</th>
                            <th>Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($members as $member)
                        <tr>
                            <td>
                                @if($member->image)
                                    <img src="{{ asset($member->image) }}" alt="Image" style="height: 60px;">
                                @endif
                            </td>
                            <td>{{ app()->getLocale() === 'en' ? $member->name_en : $member->name_np }}</td>
                            <td>{{ app()->getLocale() === 'en' ? $member->position_en : $member->position_np }}</td>
                            <td>
                                <span class="badge badge-{{ $member->status ? 'success' : 'danger' }}">
                                    {{ $member->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>{{ $member->order }}</td>
                            <td>
                                <a href="{{ route('admin.team-members.edit', $member->id) }}" class="btn btn-sm btn-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.team-members.destroy', $member->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">No team members found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $members->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
