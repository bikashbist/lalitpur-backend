@extends('admin.admin-dashboard')

@section('content')
<div class="container mt-5">
   <div class="card p-3">
    <h2>Edit T
                                समाचार विवरण
                            </h2>

    <form action="{{ route('testpreparation.update', $testPreparation->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="service_category_id">Category</label>
            <select name="service_category_id" class="form-control" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" 
                        {{ $testPreparation->service_category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label>Title</label>
            <input type="text" name="title" value="{{ $testPreparation->title }}" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $testPreparation->description }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label>Image</label><br>
            @if($testPreparation->image)
                <img src="{{ asset($testPreparation->image) }}" width="100" class="mb-2">
          
            @endif
            <input type="file" name="image" class="form-control">
        </div>

        <hr>
        <h4>Sub Items</h4>

        <div id="dynamic-rows">
            @foreach($testPreparation->items as $item)
            <div class="row mb-3 dynamic-row">
                <div class="col-lg-12">
                    <label>Title</label>
                    <input type="text" name="row_title[]" value="{{ $item->title }}" class="form-control" required>
                </div>
                <div class="col-lg-12">
                    <label>Description</label>
                    <textarea name="row_description[]" class="form-control">{{ $item->description }}</textarea>
                </div>
                <div class="col-lg-12">
                    <label>Image</label><br>
                    @if($item->image)
                        <img src="{{ asset($item->image) }}" width="100" class="mb-2">
                    @endif
                    <input type="file" name="row_image[]" class="form-control">
                </div>
                <div class="col-12 mt-2">
                    <button type="button" class="btn btn-danger remove-row">Remove</button>
                </div>
            </div>
            @endforeach
        </div>

        <button type="button" id="add-row" class="btn btn-primary mb-3">+ Add Row</button> <br>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
   </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dynamicRowsContainer = document.getElementById('dynamic-rows');
        const addRowButton = document.getElementById('add-row');

        addRowButton.addEventListener('click', function() {
            const newRow = document.createElement('div');
            newRow.classList.add('row', 'mb-3', 'dynamic-row');
            newRow.innerHTML = `
                <div class="col-lg-12">
                    <label>Title</label>
                    <input type="text" name="row_title[]" class="form-control" required>
                </div>
                <div class="col-lg-12">
                    <label>Description</label>
                    <textarea name="row_description[]" class="form-control"></textarea>
                </div>
                <div class="col-lg-12">
                    <label>Image</label>
                    <input type="file" name="row_image[]" class="form-control">
                </div>
                <div class="col-12 mt-2">
                    <button type="button" class="btn btn-danger remove-row">Remove</button>
                </div>
            `;
            dynamicRowsContainer.appendChild(newRow);
            addRemoveButtonHandler(newRow);
        });

        function addRemoveButtonHandler(row) {
            row.querySelector('.remove-row').addEventListener('click', function() {
                row.remove();
            });
        }
    });
</script>

@endsection
