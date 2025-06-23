@extends('admin.admin-dashboard')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create Service Process</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.service-processes.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="introduction">Introduction</label>
                    <textarea class="form-control" id="introduction" name="introduction" rows="3" required></textarea>
                </div>
                
                <div class="form-group">
                    <label>Services (Ordered List)</label>
                    <div id="services-container">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="services[]" required>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-success add-service">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Required Documents (Unordered List)</label>
                    <div id="documents-container">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="documents[]" required>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-success add-document">
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
                <a href="{{ route('admin.service-processes.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Services
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('add-service')) {
                const newInput = document.createElement('div');
                newInput.className = 'input-group mb-2';
                newInput.innerHTML = `
                    <input type="text" class="form-control" name="services[]" required>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-danger remove-item">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                `;
                document.getElementById('services-container').appendChild(newInput);
            }
            
            // Documents
            if (e.target.classList.contains('add-document')) {
                const newInput = document.createElement('div');
                newInput.className = 'input-group mb-2';
                newInput.innerHTML = `
                    <input type="text" class="form-control" name="documents[]" required>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-danger remove-item">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                `;
                document.getElementById('documents-container').appendChild(newInput);
            }
            
            // Remove items
            if (e.target.classList.contains('remove-item')) {
                e.target.closest('.input-group').remove();
            }
        });
    });
</script>
@endsection