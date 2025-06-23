@extends('admin.admin-dashboard')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Office Chief</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.office-chiefs.update', $officeChief->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Name (English)</label>
                    <input type="text" class="form-control" name="name_en" value="{{ old('name_en', $officeChief->name_en) }}" required>
                </div>
                <div class="form-group">
                    <label>Name (Nepali)</label>
                    <input type="text" class="form-control" name="name_np" value="{{ old('name_np', $officeChief->name_np) }}" required>
                </div>

                <div class="form-group">
                    <label>Position (English)</label>
                    <input type="text" class="form-control" name="position_en" value="{{ old('position_en', $officeChief->position_en) }}" required>
                </div>
                <div class="form-group">
                    <label>Position (Nepali)</label>
                    <input type="text" class="form-control" name="position_np" value="{{ old('position_np', $officeChief->position_np) }}" required>
                </div>

                <div class="form-group">
                    <label>Office (English)</label>
                    <input type="text" class="form-control" name="office_en" value="{{ old('office_en', $officeChief->office_en) }}" required>
                </div>
                <div class="form-group">
                    <label>Office (Nepali)</label>
                    <input type="text" class="form-control" name="office_np" value="{{ old('office_np', $officeChief->office_np) }}" required>
                </div>

                <div class="form-group">
                    <label>Message (English)</label>
                    <textarea class="form-control" name="message_en" rows="4" required>{{ old('message_en', $officeChief->message_en) }}</textarea>
                </div>
                <div class="form-group">
                    <label>Message (Nepali)</label>
                    <textarea class="form-control" name="message_np" rows="4" required>{{ old('message_np', $officeChief->message_np) }}</textarea>
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image">
                        <label class="custom-file-label">{{ $officeChief->image ? basename($officeChief->image) : 'Choose file' }}</label>
                    </div>
                    @if($officeChief->image)
                        <img src="{{ asset($officeChief->image) }}" alt="Image" class="img-thumbnail mt-2" style="max-height: 150px;">
                    @endif
                </div>

                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="status" name="status" {{ $officeChief->status ? 'checked' : '' }}>
                        <label class="custom-control-label" for="status">Active</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
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
