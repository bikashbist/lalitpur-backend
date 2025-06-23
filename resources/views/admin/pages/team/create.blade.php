@extends('admin.admin-dashboard')
@section('content')
    <div class="row">
        
        <div class="col-12">
           
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-2 mb-lg-0">
                        <h3 class="mb-0  text-white">Create Team</h3>
                    </div>
                    <div>
                        <nav aria-label="breadcrumb text-white">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a class="text-white text-decoration-none" href="{{ route('teams.index') }}">Product List</a></li>
                
                              <li class="breadcrumb-item text-white active" aria-current="page">Create </li>
                            </ol>
                          </nav>
                    </div>
                </div>
           
        </div>
        <div class="col-lg-12">
            <div class="card p-4 mt-3">
                <form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                
                    <div class="mb-3">
                        <label for="team_type">Team Category</label>
                        <select name="team_type" class="form-control" required>
                            <option value="">-- Select Team --</option>
                            <option value="counselling">Counselling Team</option>
                            <option value="our_team">Our Team</option>
                        </select>
                    </div>
                
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                
                    <div class="mb-3">
                        <label>Position</label>
                        <input type="text" name="position" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Phone Number</label>
                        <input type="number" name="phone" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Phone Number</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" id="editor" class="form-control" rows="5"></textarea>
                    </div>
                    
                
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                
                    <button type="submit" class="btn btn-success">Save Team Member</button>
                </form>
                
            </div>
        </div>
           
            
        </div>
    </div>
@endsection
