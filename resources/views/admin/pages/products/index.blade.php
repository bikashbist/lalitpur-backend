@extends('admin.admin-dashboard')

@section('content')
<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>All Products</h4>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Title</th>
                <th>Price</th>
                <th>Brand</th>
                <th>Condition</th>
                <th>Stock</th>
                <th>Category</th>
                <th>Shop Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    @if($product->image)
                        <img src="{{ asset($product->image) }}" width="50" height="50" alt="">
                    @else
                        <span>No Image</span>
                    @endif
                </td>
                <td>{{ $product->title }}</td>
                <td>Rs. {{ $product->price }}</td>
                <td>{{ $product->brand }}</td>
                <td>{{ $product->condition }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->category }}</td>
                <td>{{ $product->shop_category }}</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Delete this product?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="10" class="text-center">No products found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
