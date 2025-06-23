@extends('admin.admin-dashboard')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Organizational Structure</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.organizational-structures.update', $organizationalStructure->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" 
                           value="{{ old('title', $organizationalStructure->title) }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" 
                              rows="3" required>{{ old('description', $organizationalStructure->description) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">Structure Image</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">
                            {{ basename($organizationalStructure->image) ?? 'Choose new image' }}
                        </label>
                    </div>
                    @if($organizationalStructure->image)
                    <div class="mt-2">
                        <img src="{{ asset($organizationalStructure->image) }}" alt="Current Image" class="img-thumbnail" style="max-height: 150px;">
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Departments</label>
                    <div id="departments-container">
                        @foreach(old('departments', $organizationalStructure->departments) as $department)
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="departments[]" 
                                   value="{{ $department }}" required>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-danger remove-department">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        @endforeach
                        <button type="button" class="btn btn-success add-department">
                            <i class="fas fa-plus"></i> Add Department
                        </button>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="status" 
                               name="status" {{ old('status', $organizationalStructure->status) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="status">Active</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.organizational-structures.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('departments-container');
        
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('add-department')) {
                const newInput = document.createElement('div');
                newInput.className = 'input-group mb-2';
                newInput.innerHTML = `
                    <input type="text" class="form-control" name="departments[]" required>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-danger remove-department">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                `;
                container.insertBefore(newInput, e.target);
            }
            
            if (e.target.classList.contains('remove-department')) {
                e.target.closest('.input-group').remove();
            }
        });

        document.querySelector('.custom-file-input').addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name || 'Choose file';
            e.target.nextElementSibling.textContent = fileName;
        });
    });
</script>
@endsection