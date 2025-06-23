@extends('admin.admin-dashboard')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add New Service</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.other-services.store') }}" method="POST">
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
                    <label for="link">Read More Link (Optional)</label>
                    <input type="url" class="form-control" id="link" name="link">
                </div>
                <div class="form-group">
                    <label for="order">Display Order</label>
                    <input type="number" class="form-control" id="order" name="order" value="0">
                </div>
                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="status" name="status" checked>
                        <label class="custom-control-label" for="status">Active</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.other-services.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection