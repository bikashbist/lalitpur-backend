@extends('admin.admin-dashboard')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Create Office Introduction</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.office-introduction.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Title (EN)</label>
                        <input type="text" name="title_en" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Title (NP)</label>
                        <input type="text" name="title_np" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Description (EN)</label>
                        <textarea name="description_en" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Description (NP)</label>
                        <textarea name="description_np" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Objectives (EN)</label>
                        <textarea name="objectives_en[]" class="form-control mb-2" rows="2" required></textarea>
                        <textarea name="objectives_en[]" class="form-control mb-2" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Objectives (NP)</label>
                        <textarea name="objectives_np[]" class="form-control mb-2" rows="2" required></textarea>
                        <textarea name="objectives_np[]" class="form-control mb-2" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" name="status" class="form-check-input" checked>
                        <label class="form-check-label">Active</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('objectives-container');

            // Add objective
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('add-objective')) {
                    const newInput = document.createElement('div');
                    newInput.className = 'input-group mb-2';
                    newInput.innerHTML = `
                    <input type="text" class="form-control" name="objectives[]" required>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-danger remove-objective">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                `;
                    container.appendChild(newInput);
                }

                // Remove objective
                if (e.target.classList.contains('remove-objective')) {
                    e.target.closest('.input-group').remove();
                }
            });

            // Show file name on file input
            document.querySelector('.custom-file-input').addEventListener('change', function(e) {
                const fileName = e.target.files[0]?.name || 'Choose file';
                e.target.nextElementSibling.textContent = fileName;
            });
        });
    </script>
@endsection
