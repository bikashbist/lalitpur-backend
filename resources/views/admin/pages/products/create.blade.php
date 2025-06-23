@extends('admin.admin-dashboard')

@section('content')
<div class="card p-4">
    <h3>Create Product</h3>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="text" name="title" class="form-control mb-2" placeholder="Product Title" required>
        <input type="file" name="image" class="form-control mb-2">
        <input type="number" step="0.01" name="price" class="form-control mb-2" placeholder="Price" required>
        <textarea name="description" class="form-control mb-2" placeholder="Description"></textarea>
        <input type="text" name="brand" class="form-control mb-2" placeholder="Brand">
        <input type="text" name="condition" class="form-control mb-2" placeholder="Condition (New/Used)">
        <input type="number" name="stock" class="form-control mb-2" placeholder="Stock" required>

        <select name="category" class="form-control mb-2" required>
            <option value="">Select Category</option>
            <option value="Men">Men</option>
            <option value="Women">Women</option>
            <option value="Children">Children</option>
        </select>

        <select name="shop_category" class="form-control mb-2" required>
            <option value="">Select Shop Category</option>
            <option value="Glasses">Shop Glasses</option>
            <option value="Sunglasses">Shop Sunglasses</option>
            <option value="Contacts">Shop Contacts</option>
        </select>

        <button class="btn btn-success">Submit</button>
    </form>
</div>
@endsection
