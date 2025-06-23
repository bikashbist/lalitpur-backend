@extends('admin.admin-dashboard')
@section('content')
    <div class="container">
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="mb-4">
                                डाउनलोड मेनु                   
                            </h1>

                <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Create डाउनलोड मेनु  </a>

            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            @if ($category->image)
                                <img src="{{ asset( $category->image) }}" class="card-img-top"
                                    alt="{{ $category->title }}" style="height: 200px; object-fit: cover;">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $category->title }}</h5>
                                <p class="card-text">{{ Str::limit($category->description, 100) }}</p>

                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('categories.show', $category) }}" class="btn btn-sm btn-info">View</a>
                                    <a href="{{ route('categories.edit', $category) }}"
                                        class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </div>

                                <div class="mt-3">
                                    <h6>Subcategories:</h6>
                                    <ul class="list-group">
                                        @foreach ($category->subcategories as $subcategory)
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                {{ $subcategory->title }}
                                                <div>
                                                    <a href="{{ route('subcategories.edit', $subcategory) }}"
                                                        class="btn btn-sm btn-outline-primary">Edit</a>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <a href="{{ route('subcategories.create', $category) }}"
                                        class="btn btn-sm btn-success mt-2">Add Subcategory</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
