@extends('admin.admin-dashboard')
@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <div class="d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h3 class="mb-0 text-white">Edit </h3>
                </div>
                <div>
                    <nav aria-label="breadcrumb text-white">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a class="text-white text-decoration-none" href="{{ route('menu-categories.index') }}"> List</a></li>
                          <li class="breadcrumb-item text-white active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 mt-3">
        <div class="card p-3">
            <form action="{{ route('menu-products.update', $menuProduct->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="menu_category_id" class="form-label">Category</label>
                    <select name="menu_category_id" id="menu_category_id" class="form-control" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $menuProduct->menu_category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Title</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $menuProduct->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label"> Price</label>
                    <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ $menuProduct->price }}" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label"> Image</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*">
                    @if($menuProduct->image)
                        <img class="mt-3" src="{{ asset($menuProduct->image) }}" alt="{{ $menuProduct->name }}" width="100">
                    @endif
                </div>

                {{-- New CKEditor Fields --}}
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control">{!! $menuProduct->description !!}</textarea>
                </div>

                <div class="mb-3">
                    <label for="reasons_to_study" class="form-label">  Our Shipping Process</label>
                    <textarea name="reasons_to_study" id="reasons_to_study" class="form-control">{!! $menuProduct->reasons_to_study !!}</textarea>
                </div>

                <div class="mb-3">
                    <label for="scholarships" class="form-label"> Cost & Pricing</label>
                    <textarea name="scholarships" id="scholarships" class="form-control">{!! $menuProduct->scholarships !!}</textarea>
                </div>

                <div class="mb-3">
                    <label for="application_process" class="form-label"> Required Documentation</label>
                    <textarea name="application_process" id="application_process" class="form-control">{!! $menuProduct->application_process !!}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
</div>

{{-- CKEditor Scripts --}}
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create(document.querySelector('#description')).catch(error => console.error(error));
    ClassicEditor.create(document.querySelector('#reasons_to_study')).catch(error => console.error(error));
    ClassicEditor.create(document.querySelector('#scholarships')).catch(error => console.error(error));
    ClassicEditor.create(document.querySelector('#application_process')).catch(error => console.error(error));
</script>
@endsection
