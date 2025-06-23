@extends('admin.admin-dashboard')

@section('content')
<div class="container">
    <div class="card p-3">
        <div class="row">
            <div class="col-12">
               <div class="d-flex justify-content-between">
                    <h3 class="mb-3">Certificate List</h3>
        
                    <a href="{{ route('certificate.create') }}" class="btn btn-primary mb-3">Add New Certificate</a>
        
               </div>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
    
                <table class="table table-bordered bg-white">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($certificates as $certificate)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $certificate->image_name }}</td>
                                <td><img src="{{ asset($certificate->image_path) }}" alt="" width="100"></td>
                                <td>
                                    <a href="{{ route('certificate.edit', $certificate->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('certificate.destroy', $certificate->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
    
            </div>
        </div>
    </div>
  
</div>
@endsection
