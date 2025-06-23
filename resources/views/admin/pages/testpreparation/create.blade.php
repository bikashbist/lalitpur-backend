 @extends('admin.admin-dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">

                <div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mb-2 mb-lg-0">
                            <h3 class="mb-0  text-white"> 
                                समाचार विवरण
                            </h3>
                        </div>
                        <div>
                            <nav aria-label="breadcrumb text-white">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-white text-decoration-none"
                                            href="#"> 
                                समाचार विवरण
                             List</a></li>

                                    <li class="breadcrumb-item text-white active" aria-current="page">Create </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card p-3 mt-3">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                 
                    <form action="{{ route('testpreparation.store') }}" method="POST" enctype="multipart/form-data">
                         @csrf

                         <div class="form-group mb-3">
                            <label for="service_category_id">Category</label>
                            <select name="service_category_id" class="form-control" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" id="editor" class="form-control" rows="5"></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                        <div id="dynamic-rows"></div>
                        <button type="button" id="add-row" class="btn btn-primary mb-3">+ Add Row</button> <br>
                        <button type="submit" class="btn btn-success">Save Product</button>
                    </form>
                </div>
            </div>

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
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="row_title[]" class="form-control" required>
                </div>
                <div class="col-lg-12">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="row_description[]" class="form-control" required></textarea>
                </div>
                <div class="col-lg-12">
                    <label for="image" class="form-label">Image</label>
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

