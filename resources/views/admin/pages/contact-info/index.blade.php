@extends('admin.admin-dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h3 class="mb-0  text-white"> Info List </h3>
                </div>
                <div>
                    <a href="{{ route('contact-info.create') }}" class="btn btn-white">Create </a>
                </div>
            </div>
        </div>
        <div class="col-lg-12 mt-4">
          
    
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
        
            @if($contactInfo)
                <table class="table table-bordered bg-white">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Social</th>
                            <th>Logo</th>
                          
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $contactInfo->id }}</td>
                            <td>{{ $contactInfo->phone }}</td>
                            <td>{{ $contactInfo->email }}</td>
                            <td>{{ $contactInfo->address }}</td>
                            <td>
                                @if($contactInfo->facebook)
                                    <a href="{{ $contactInfo->facebook }}" target="_blank">Facebook</a><br>
                                @endif
                                @if($contactInfo->instagram)
                                    <a href="{{ $contactInfo->instagram }}" target="_blank">Instagram</a><br>
                                @endif
                                @if($contactInfo->twitter)
                                    <a href="{{ $contactInfo->twitter }}" target="_blank">Twitter</a><br>
                                @endif
                                @if($contactInfo->linkedin)
                                    <a href="{{ $contactInfo->linkedin }}" target="_blank">LinkedIn</a>
                                @endif
                            </td>
                            
                            <td>
                                @if($contactInfo->logo)
                                    <img src="{{ asset( $contactInfo->logo) }}" alt="Logo" width="100">
                                @else
                                    No Logo
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('contact-info.edit', $contactInfo->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                
                                <form action="{{ route('contact-info.destroy', $contactInfo->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger  btn-sm" onclick="return confirm('Are you sure you want to delete this contact info?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            @else
                <p>No contact information found. <a href="{{ route('contact-info.create') }}">Create New</a></p>
            @endif
        </div>
    </div>
   
</div>
@endsection
