@extends('admin.admin-dashboard')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create Organizational Structure</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.organizational-structures.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Structure Image</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image" required>
                        <label class="custom-file-label" for="image">Choose image</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Departments</label>
                    <div id="departments-container">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="departments[]" required>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-success add-department">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="status" name="status" checked>
                        <label class="custom-control-label" for="status">Active</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
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
                container.appendChild(newInput);
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