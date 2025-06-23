@extends('admin.admin-dashboard')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Office Introduction</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.office-introduction.update', $officeIntroduction->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title_en">Title (English)</label>
                    <input type="text" class="form-control" id="title_en" name="title_en" 
                           value="{{ old('title_en', $officeIntroduction->title_en) }}" required>
                </div>

                <div class="form-group">
                    <label for="title_np">Title (Nepali)</label>
                    <input type="text" class="form-control" id="title_np" name="title_np" 
                           value="{{ old('title_np', $officeIntroduction->title_np) }}" required>
                </div>

                <div class="form-group">
                    <label for="description_en">Description (English)</label>
                    <textarea class="form-control" id="description_en" name="description_en" rows="5" required>{{ old('description_en', $officeIntroduction->description_en) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="description_np">Description (Nepali)</label>
                    <textarea class="form-control" id="description_np" name="description_np" rows="5" required>{{ old('description_np', $officeIntroduction->description_np) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">
                            {{ $officeIntroduction->image ? basename($officeIntroduction->image) : 'Choose file' }}
                        </label>
                    </div>
                    @if($officeIntroduction->image)
                    <div class="mt-2">
                        <img src="{{ asset($officeIntroduction->image) }}" alt="Current Image" 
                             class="img-thumbnail" style="max-height: 150px;">
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <label>Objectives (English)</label>
                    <div id="objectives-en-container">
                        @foreach(old('objectives_en', $officeIntroduction->objectives_en ?? []) as $objective)
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="objectives_en[]" 
                                   value="{{ $objective }}" required>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-danger remove-objective">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        @endforeach
                        <button type="button" class="btn btn-success add-objective-en">
                            <i class="fas fa-plus"></i> Add Objective (EN)
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <label>Objectives (Nepali)</label>
                    <div id="objectives-np-container">
                        @foreach(old('objectives_np', $officeIntroduction->objectives_np ?? []) as $objective)
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="objectives_np[]" 
                                   value="{{ $objective }}" required>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-danger remove-objective">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        @endforeach
                        <button type="button" class="btn btn-success add-objective-np">
                            <i class="fas fa-plus"></i> Add Objective (NP)
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="status" 
                               name="status" {{ old('status', $officeIntroduction->status) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="status">Active</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.office-introduction.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const containers = {
            en: document.getElementById('objectives-en-container'),
            np: document.getElementById('objectives-np-container')
        };

        document.addEventListener('click', function (e) {
            if (e.target.closest('.add-objective-en')) {
                const div = document.createElement('div');
                div.className = 'input-group mb-2';
                div.innerHTML = `
                    <input type="text" class="form-control" name="objectives_en[]" required>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-danger remove-objective">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>`;
                containers.en.insertBefore(div, e.target.closest('button'));
            }
            if (e.target.closest('.add-objective-np')) {
                const div = document.createElement('div');
                div.className = 'input-group mb-2';
                div.innerHTML = `
                    <input type="text" class="form-control" name="objectives_np[]" required>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-danger remove-objective">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>`;
                containers.np.insertBefore(div, e.target.closest('button'));
            }
            if (e.target.closest('.remove-objective')) {
                e.target.closest('.input-group').remove();
            }
        });

        document.querySelector('.custom-file-input').addEventListener('change', function (e) {
            const fileName = e.target.files[0]?.name || 'Choose file';
            e.target.nextElementSibling.textContent = fileName;
        });
    });
</script>
@endsection
