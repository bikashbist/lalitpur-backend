@extends('admin.admin-dashboard')
@section('content')
<div class="row">
    {{-- <div class="col-lg-12 col-md-12 col-12 mb-3">

        <div>
            <div class="d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h3 class="mb-0  text-white"> Team | List</h3>
                </div>
                <div>
                    <a href="{{ route('teams.create') }}" class="btn btn-white">Add Team </a>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="col-12">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    
        <div class="card mt-3 p-3">
            <div class="d-flex justify-content-between mb-3">
                <h4>Team Members</h4>
                <a href="{{ route('teams.create') }}" class="btn btn-primary">+ Add Member</a>
            </div>
    
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead >
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Team Category</th>
                            <th>Position</th>
                            <th>Phone</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($teams as $index => $team)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    @if($team->image)
                                        <img src="{{ asset($team->image) }}" alt="{{ $team->name }}" width="60" class="rounded">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td>{{ $team->name }}</td>
                                <td>{{ ucfirst($team->team_type) }}</td>
                                <td>{{ $team->position }}</td>
                               
                                <td>{{ $team->phone }}</td>
                                <td>{!! \Illuminate\Support\Str::limit($team->description, 50) !!}</td>
                                <td class="d-flex gap-1">
                                    <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-sm btn-warning">Edit</a>
    
                                    <form action="{{ route('teams.destroy', $team->id) }}" method="POST" style="display:inline-block;">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this member?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No team members found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>
@endsection
