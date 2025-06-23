@extends('admin.admin-dashboard')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add New Office Chief</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.office-chiefs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name_en">Name (English)</label>
                    <input type="text" class="form-control" name="name_en" required>
                </div>
                <div class="form-group">
                    <label for="name_np">Name (Nepali)</label>
                    <input type="text" class="form-control" name="name_np" required>
                </div>

                <div class="form-group">
                    <label for="position_en">Position (English)</label>
                    <input type="text" class="form-control" name="position_en" required>
                </div>
                <div class="form-group">
                    <label for="position_np">Position (Nepali)</label>
                    <input type="text" class="form-control" name="position_np" required>
                </div>

                <div class="form-group">
                    <label for="office_en">Office (English)</label>
                    <input type="text" class="form-control" name="office_en" required>
                </div>
                <div class="form-group">
                    <label for="office_np">Office (Nepali)</label>
                    <input type="text" class="form-control" name="office_np" required>
                </div>

                <div class="form-group">
                    <label for="message_en">Message (English)</label>
                    <textarea class="form-control" name="message_en" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="message_np">Message (Nepali)</label>
                    <textarea class="form-control" name="message_np" rows="4" required></textarea>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" required>
                        <label class="custom-file-label">Choose file</label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="status" name="status" checked>
                        <label class="custom-control-label" for="status">Active</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.office-chiefs.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

<script>
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        e.target.nextElementSibling.textContent = e.target.files[0]?.name || 'Choose file';
    });
</script>
@endsection
