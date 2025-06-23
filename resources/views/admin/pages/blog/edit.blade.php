
@extends('admin.admin-dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-2 mb-lg-0">
                        <h3 class="mb-0 text-white">Edit Blog</h3>
                    </div>
                    <div>
                        <nav aria-label="breadcrumb text-white">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-white text-decoration-none" href="{{ route('blog.index') }}">List</a>
                                </li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Edit</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 mt-3">
            <div class="card p-3">
                <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="sub_title_en">Sub Title (English)</label>
                                <input type="text" name="sub_title_en" class="form-control" 
                                       value="{{ old('sub_title_en', $blog->sub_title_en) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="sub_title_np">उप शीर्षक (नेपाली)</label>
                                <input type="text" name="sub_title_np" class="form-control" 
                                       value="{{ old('sub_title_np', $blog->sub_title_np) }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="title_en">Title (English)</label>
                                <input type="text" name="title_en" class="form-control" 
                                       value="{{ old('title_en', $blog->title_en) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="title_np">शीर्षक (नेपाली)</label>
                                <input type="text" name="title_np" class="form-control" 
                                       value="{{ old('title_np', $blog->title_np) }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $key => $category)
                                <option value="{{ $key }}" 
                                    {{ old('category', $blog->category) == $key ? 'selected' : '' }}>
                                    {{ $category }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="image">Image</label>
                        @if($blog->image_path)
                            <div class="mb-2">
                                <img src="{{ asset($blog->image_path) }}" alt="Current Image" width="150">
                            </div>
                        @endif
                        <input type="file" name="image" class="form-control">
                        <small class="text-muted">Leave blank to keep current image</small>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="description_en">Description (English)</label>
                                <textarea name="description_en" id="editor_en" class="form-control" rows="5" required>
                                    {{ old('description_en', $blog->description_en) }}
                                </textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="description_np">विवरण (नेपाली)</label>
                                <textarea name="description_np" id="editor_np" class="form-control" rows="5" required>
                                    {{ old('description_np', $blog->description_np) }}
                                </textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <div class="form-check">
                            <input type="checkbox" name="is_active" id="is_active" 
                                   class="form-check-input" {{ $blog->is_active ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Active</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    ClassicEditor.create(document.querySelector('#editor_en')).catch(error => console.error(error));
    ClassicEditor.create(document.querySelector('#editor_np')).catch(error => console.error(error));
</script>
@endsection
@endsection