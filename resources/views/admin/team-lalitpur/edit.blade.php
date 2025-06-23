@extends('admin.admin-dashboard')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0">Edit Team Member</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.team-lalitpur-members.update', $team_lalitpur_member->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Name (English) *</label>
                            <input type="text" name="name_en" 
                                   class="form-control @error('name_en') is-invalid @enderror" 
                                   value="{{ old('name_en', $team_lalitpur_member->name_en) }}" required>
                            @error('name_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Position (English) *</label>
                            <input type="text" name="position_en" 
                                   class="form-control @error('position_en') is-invalid @enderror" 
                                   value="{{ old('position_en', $team_lalitpur_member->position_en) }}" required>
                            @error('position_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Name (Nepali) *</label>
                            <input type="text" name="name_np" 
                                   class="form-control @error('name_np') is-invalid @enderror" 
                                   value="{{ old('name_np', $team_lalitpur_member->name_np) }}" required>
                            @error('name_np')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Position (Nepali) *</label>
                            <input type="text" name="position_np" 
                                   class="form-control @error('position_np') is-invalid @enderror" 
                                   value="{{ old('position_np', $team_lalitpur_member->position_np) }}" required>
                            @error('position_np')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Phone *</label>
                            <input type="text" name="phone" 
                                   class="form-control @error('phone') is-invalid @enderror" 
                                   value="{{ old('phone', $team_lalitpur_member->phone) }}" required>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Email *</label>
                            <input type="email" name="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   value="{{ old('email', $team_lalitpur_member->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Current Image</label>
                    <div>
                        <img src="{{ asset($team_lalitpur_member->image_path) }}" 
                             alt="{{ $team_lalitpur_member->name_en }}" 
                             class="img-thumbnail" width="150">
                    </div>
                    <label class="form-label mt-2">New Image (Leave blank to keep current)</label>
                    <div class="custom-file">
                        <input type="file" name="image" 
                               class="custom-file-input @error('image') is-invalid @enderror" 
                               id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <small class="form-text text-muted">
                        Max size: 2MB | Allowed formats: jpeg, png, jpg
                    </small>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" name="is_spokesperson" 
                                       id="is_spokesperson" 
                                       class="form-check-input" 
                                       {{ old('is_spokesperson', $team_lalitpur_member->is_spokesperson) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_spokesperson">
                                    Is Spokesperson?
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Display Order *</label>
                            <input type="number" name="order" 
                                   class="form-control @error('order') is-invalid @enderror" 
                                   value="{{ old('order', $team_lalitpur_member->order) }}" required>
                            @error('order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Member
                    </button>
                    <a href="{{ route('admin.team-lalitpur-members.index') }}" 
                       class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
<script>
    // Show filename when file is selected
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = document.getElementById("customFile").files[0]?.name || "Choose file";
        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
    });
</script>
@endsection
@endsection