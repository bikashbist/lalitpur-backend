@extends('admin.admin-dashboard')

@section('content')
<div class="container mt-4">
    <div class="card p-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Locations List</h2>
            <a href="{{ route('locations.create') }}" class="btn btn-primary">Add New Location</a>
        </div>
    
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Location Category</th>
                        <th>Contact Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>nap</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($locations as $location)
                        <tr>
                            <td>{{ $location->location_category }}</td>
                            <td>{{ $location->contact_name }}</td>
                            <td>{{ $location->phone }}</td>
                            <td>{{ $location->email }}</td>
                            <td>{{ $location->address }}</td>
                            <td>
                                @if($location->map)
                                    <div class="map-container" style="width: 100px; height: 100px;overflow:hidden;">
                                        {!! $location->map !!}
                                    </div>
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                @if($location->image)
                                    <img src="{{ asset($location->image) }}" alt="Contact Image" width="60">
                                @else
                                    N/A
                                @endif
                            </td>
                            <td class="d-flex gap-1">
                                <a href="{{ route('locations.edit', $location->id) }}" class="btn btn-sm btn-warning">Edit</a>
    
                                <form action="{{ route('locations.destroy', $location->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-sm btn-danger">
                                        Delete
                                    </button>
                                </form>
    
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
