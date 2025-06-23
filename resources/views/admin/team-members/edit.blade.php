@extends('admin.admin-dashboard')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Team Member</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.team-members.update', $teamMember->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name_en">Name (English)</label>
                    <input type="text" class="form-control" name="name_en" value="{{ old('name_en', $teamMember->name_en) }}" required>
                </div>
                <div class="form-group">
                    <label for="name_np">Name (Nepali)</label>
                    <input type="text" class="form-control" name="name_np" value="{{ old('name_np', $teamMember->name_np) }}" required>
                </div>
                <div class="form-group">
                    <label for="position_en">Position (English)</label>
                    <input type="text" class="form-control" name="position_en" value="{{ old('position_en', $teamMember->position_en) }}" required>
                </div>
                <div class="form-group">
                    <label for="position_np">Position (Nepali)</label>
                    <input type="text" class="form-control" name="position_np" value="{{ old('position_np', $teamMember->position_np) }}" required>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">{{ $teamMember->image ? basename($teamMember->image) : 'Choose file' }}</label>
                    </div>
                    @if($teamMember->image)
                    <div class="mt-2">
                        <img src="{{ asset($teamMember->image) }}" alt="Current Image" class="img-thumbnail" style="max-height: 150px;">
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="order">Display Order</label>
                    <input type="number" class="form-control" name="order" value="{{ old('order', $teamMember->order) }}">
                </div>
                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="status" name="status" {{ old('status', $teamMember->status) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="status">Active</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
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
