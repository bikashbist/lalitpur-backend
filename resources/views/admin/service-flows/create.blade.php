@extends('admin.admin-dashboard')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create New Service Flow</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.service-flows.store') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label>Service Name</label>
                    <input type="text" name="service_name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Service Slug</label>
                    <input type="text" name="service_slug" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="service_description" class="form-control" rows="3" required></textarea>
                </div>

                <div class="form-group">
                    <label>Steps</label>
                    <div id="steps-container">
                        <div class="step-group mb-3 p-3 border rounded">
                            <div class="form-group">
                                <label>Step Title</label>
                                <input type="text" name="steps[0][title]" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="steps[0][description]" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Documents (comma separated)</label>
                                <input type="text" name="steps[0][documents]" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Duration</label>
                                        <input type="text" name="steps[0][duration]" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Fee</label>
                                        <input type="text" name="steps[0][fee]" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Download Link</label>
                                        <input type="url" name="steps[0][download_link]" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm remove-step">Remove Step</button>
                        </div>
                    </div>
                    <button type="button" id="add-step" class="btn btn-secondary">Add Step</button>
                </div>

                <div class="form-group">
                    <label>Notes (one per line)</label>
                    <textarea name="notes" class="form-control" rows="3"></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Order</label>
                            <input type="number" name="order" class="form-control" value="0">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="custom-control custom-switch mt-4">
                                <input type="checkbox" name="is_active" class="custom-control-input" id="is_active" checked>
                                <label class="custom-control-label" for="is_active">Active</label>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('admin.service-flows.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

<script>
    let stepCount = 1;
    
    // Add step
    document.getElementById('add-step').addEventListener('click', function() {
        const container = document.getElementById('steps-container');
        const newStep = document.createElement('div');
        newStep.className = 'step-group mb-3 p-3 border rounded';
        newStep.innerHTML = `
            <div class="form-group">
                <label>Step Title</label>
                <input type="text" name="steps[${stepCount}][title]" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="steps[${stepCount}][description]" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label>Documents (comma separated)</label>
                <input type="text" name="steps[${stepCount}][documents]" class="form-control">
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Duration</label>
                        <input type="text" name="steps[${stepCount}][duration]" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Fee</label>
                        <input type="text" name="steps[${stepCount}][fee]" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Download Link</label>
                        <input type="url" name="steps[${stepCount}][download_link]" class="form-control">
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-danger btn-sm remove-step">Remove Step</button>
        `;
        container.appendChild(newStep);
        stepCount++;
    });

    // Remove step
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-step')) {
            e.target.closest('.step-group').remove();
        }
    });
</script>
@endsection