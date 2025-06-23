@extends('admin.admin-dashboard')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Rule</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.rules.update', $rule->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" 
                           value="{{ old('title', $rule->title) }}" required>
                </div>
                <div class="form-group">
                    <label for="file">Document File</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file" name="file">
                        <label class="custom-file-label" for="file">
                            {{ basename($rule->file_path) ?? 'Choose new file (PDF/DOC/DOCX)' }}
                        </label>
                    </div>
                    @if($rule->file_path)
                    <div class="mt-2">
                        <a href="{{ $rule->file_url }}" target="_blank" class="btn btn-sm btn-info">
                            View Current File
                        </a>
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="order">Display Order</label>
                    <input type="number" class="form-control" id="order" name="order" 
                           value="{{ old('order', $rule->order) }}">
                </div>
                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="status" 
                               name="status" {{ old('status', $rule->status) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="status">Active</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.rules.index') }}" class="btn btn-secondary">Cancel</a>
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