@extends('admin.admin-dashboard')
@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <div class="d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h3 class="mb-0  text-white">Edit Product</h3>
                </div>
                <div>
                    <nav aria-label="breadcrumb text-white">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a class="text-white text-decoration-none" href="{{ route('menu-categories.index') }}">Product List</a></li>
            
                          <li class="breadcrumb-item text-white active" aria-current="page">Edit </li>
                        </ol>
                      </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 mt-3">
        <div class="card p-3">
            <form action="{{ route('teams.update', $team->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
        
                <div class="mb-3">
                    <label>Team Category</label>
                    <select name="team_type" class="form-control" required>
                        <option value="counselling" {{ $team->team_type == 'counselling' ? 'selected' : '' }}>Counselling</option>
                        <option value="our_team" {{ $team->team_type == 'our_team' ? 'selected' : '' }}>Our Team</option>
                    </select>
                </div>
        
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $team->name }}" required>
                </div>
        
                <div class="mb-3">
                    <label>Position</label>
                    <input type="text" name="position" class="form-control" value="{{ $team->position }}" required>
                </div>
                <div class="mb-3">
                    <label>Phone Number</label>
                    <input type="text" name="phone" class="form-control" value="{{ $team->phone }}" required>
                </div>
                
                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <textarea name="description" id="editor" class="form-control" rows="5">{!! $team->description !!}</textarea>
                </div>
                
        
                <div class="mb-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                   
                    @if($team->image)
                    <img src="{{ asset($team->image) }}" alt="{{ $team->name }}" width="100">
                @endif
                </div>
        
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
