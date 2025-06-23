@extends('admin.admin-dashboard')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Team Lalitpur Members</h3>
            <a href="{{ route('admin.team-lalitpur-members.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New Member
            </a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th width="5%">#</th>
                            <th width="15%">Image</th>
                            <th>Name (EN)</th>
                            <th>Name (NP)</th>
                            <th>Position</th>
                            <th width="10%">Type</th>
                            <th width="8%">Order</th>
                            <th width="15%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($members as $key => $member)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <img src="{{ asset($member->image_path) }}" alt="{{ $member->name_en }}" 
                                     class="img-thumbnail" width="80">
                            </td>
                            <td>{{ $member->name_en }}</td>
                            <td>{{ $member->name_np }}</td>
                            <td>{{ $member->position_en }}</td>
                            <td>
                                <span class="badge {{ $member->is_spokesperson ? 'badge-success' : 'badge-info' }}">
                                    {{ $member->is_spokesperson ? 'Spokesperson' : 'Member' }}
                                </span>
                            </td>
                            <td>{{ $member->order }}</td>
                            <td>
                                <a href="{{ route('admin.team-lalitpur-members.edit', $member->id) }}" 
                                   class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.team-lalitpur-members.destroy', $member->id) }}" 
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" 
                                            onclick="return confirm('Are you sure you want to delete this member?')"
                                            title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">No team members found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection