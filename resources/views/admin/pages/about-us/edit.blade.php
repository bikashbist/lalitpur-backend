
@extends('admin.admin-dashboard')
@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <div class="d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h3 class="mb-0  text-white">About Edit</h3>
                </div>
                <div>
                    <nav aria-label="breadcrumb text-white">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a class="text-white text-decoration-none" href="{{ route('about-us.index') }}">About List</a></li>
            
                          <li class="breadcrumb-item text-white active" aria-current="page">Edit </li>
                        </ol>
                      </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card p-3 bg-white">
            <form  action="{{ route('about-us.update', $group->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            
                <div id="dynamic-rows">
                    @foreach($group->aboutUsEntries as $index => $entry)
                    <div class="row mb-3 dynamic-row">
                        <input type="hidden" name="entry_ids[]" value="{{ $entry->id }}">
                        
                        <div class="col-lg-12">
                            <label class="form-label">Title</label>
                            <input type="text" name="title[]" class="form-control" value="{{ $entry->title }}" required>
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label">Description</label>
                            <textarea name="description[]" id="editor" class="form-control" required>{{ $entry->description }}</textarea>
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label">Image</label>
                            <input type="file" name="image[]" class="form-control">
                            @if ($entry->image)
                                <img src="{{ asset($entry->image) }}" alt="Image" width="100" class="mt-2">
                            @endif
                        </div>
                        <div class="col-12 mt-2">
                            <button type="button" class="btn btn-danger remove-row">Remove</button>
                        </div>
                    </div>
                    @endforeach
                </div>
            
                <button type="button" id="add-row" class="btn btn-primary mb-3">+ Add Row</button> <br>
                <button type="submit" class="btn btn-success " style="width: 200px;">Update</button>
            </form>
            
        </div>
       
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const dynamicRows = document.getElementById("dynamic-rows");
        const addRowBtn = document.getElementById("add-row");

        // Handle Add Row
        addRowBtn.addEventListener("click", function () {
            const newRow = document.createElement("div");
            newRow.classList.add("row", "mb-3", "dynamic-row");
            newRow.innerHTML = `
                <div class="col-lg-12">
                    <label class="form-label">Title</label>
                    <input type="text" name="title[]" class="form-control" required>
                </div>
                <div class="col-lg-12">
                    <label class="form-label">Description</label>
                    <textarea name="description[]" class="form-control" required></textarea>
                </div>
                <div class="col-lg-12">
                    <label class="form-label">Image</label>
                    <input type="file" name="image[]" class="form-control">
                </div>
                <div class="col-12 mt-2">
                    <button type="button" class="btn btn-danger remove-row">Remove</button>
                </div>
            `;
            dynamicRows.appendChild(newRow);
        });

        // Handle Remove Row (using event delegation)
        dynamicRows.addEventListener("click", function (e) {
            if (e.target && e.target.classList.contains("remove-row")) {
                e.target.closest(".dynamic-row").remove();
            }
        });
    });
</script>
@endsection
