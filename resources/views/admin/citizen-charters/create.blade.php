@extends('admin.admin-dashboard')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create Citizen Charter</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.citizen-charters.store') }}" method="POST">
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
                    <label>Commitments</label>
                    <div id="commitments-container">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="commitments[]" required>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-success add-commitment">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="working_days">Working Days</label>
                    <input type="text" class="form-control" id="working_days" name="working_days" required>
                </div>
                
                <div class="form-group">
                    <label for="working_hours">Working Hours</label>
                    <input type="text" class="form-control" id="working_hours" name="working_hours" required>
                </div>
                
                <div class="form-group">
                    <label>Services</label>
                    <div id="services-container">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Service Name</label>
                                            <input type="text" class="form-control" name="services[0][name]" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Duration</label>
                                            <input type="text" class="form-control" name="services[0][duration]" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Fee</label>
                                            <input type="text" class="form-control" name="services[0][fee]" required>
                                        </div>
                                    </div>
                                    <div class="col-md-1 d-flex align-items-end">
                                        <button type="button" class="btn btn-success add-service">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
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
                <a href="{{ route('admin.citizen-charters.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let serviceIndex = 1;
        
        // Add commitment
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('add-commitment')) {
                const newInput = document.createElement('div');
                newInput.className = 'input-group mb-2';
                newInput.innerHTML = `
                    <input type="text" class="form-control" name="commitments[]" required>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-danger remove-item">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                `;
                document.getElementById('commitments-container').appendChild(newInput);
            }
            
            // Add service
            if (e.target.classList.contains('add-service')) {
                const newService = document.createElement('div');
                newService.className = 'card mb-3';
                newService.innerHTML = `
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="services[${serviceIndex}][name]" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="services[${serviceIndex}][duration]" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="services[${serviceIndex}][fee]" required>
                                </div>
                            </div>
                            <div class="col-md-1 d-flex align-items-end">
                                <button type="button" class="btn btn-danger remove-service">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
                document.getElementById('services-container').appendChild(newService);
                serviceIndex++;
            }
            
            // Remove items
            if (e.target.classList.contains('remove-item')) {
                e.target.closest('.input-group').remove();
            }
            
            if (e.target.classList.contains('remove-service')) {
                e.target.closest('.card').remove();
            }
        });
    });
</script>
@endsection