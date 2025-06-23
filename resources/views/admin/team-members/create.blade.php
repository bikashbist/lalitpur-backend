@extends('admin.admin-dashboard')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add New Team Member</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.team-members.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name_en">Name (English)</label>
                    <input type="text" class="form-control" id="name_en" name="name_en" required>
                </div>
                <div class="form-group">
                    <label for="name_np">Name (Nepali)</label>
                    <input type="text" class="form-control" id="name_np" name="name_np" required>
                </div>
                <div class="form-group">
                    <label for="position_en">Position (English)</label>
                    <input type="text" class="form-control" id="position_en" name="position_en" required>
                </div>
                <div class="form-group">
                    <label for="position_np">Position (Nepali)</label>
                    <input type="text" class="form-control" id="position_np" name="position_np" required>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image" required>
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
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
                <a href="{{ route('admin.team-members.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

<script>
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        const fileName = e.target.files[0]?.name || 'Choose file';
        e.target.nextElementSibling.textContent = fileName;
    });
</script>
@endsection
