@extends('admin.admin-dashboard')

@section('content')
<div class="container mt-5">
  <div class="card p-3">
    <div class="d-flex justify-content-between">
        <h2>
                                समाचार विवरण
                            </h2>
        <a href="{{ route('testpreparation.create') }}" class="btn btn-primary mb-3">+ Create New</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="GET" action="{{ route('testpreparation.index') }}">
        <select class="form-select w-25 mb-4" name="category_id" onchange="this.form.submit()">
            <option value="">All Categories</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Category</th>
                <th>Main Title</th>
                <th>Description</th>
                <th>Main Image</th>
                <th>Sub Items</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($testPreparations as $tp)
            <tr>
                <td>{{ $tp->category?->name ?? 'No Category' }}</td>
                <td>{{ $tp->title }}</td>
                <td>{{ $tp->description }}</td>
                <td>
                    @if($tp->image)
                    <img src="{{ asset($tp->image) }}" width="100">
                @endif
                </td>
                <td>
                    <ul>
                        @foreach($tp->items as $item)
                            <li>{{ $item->title }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <a href="{{ route('testpreparation.edit', $tp->id) }}" class="btn btn-sm btn-info">Edit</a>
                    <form action="{{ route('testpreparation.destroy', $tp->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>
</div>
@endsection
