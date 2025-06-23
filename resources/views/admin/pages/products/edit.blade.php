@extends('admin.admin-dashboard')

@section('content')
<div class="card p-4">
    <h4>Edit Product</h4>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="text" name="title" value="{{ $product->title }}" class="form-control mb-2" required>

        @if($product->image)
            <div class="mb-2">
                <img src="{{ asset($product->image) }}" width="80" height="80" alt="">
            </div>
        @endif
        <input type="file" name="image" class="form-control mb-2">

        <input type="number" step="0.01" name="price" value="{{ $product->price }}" class="form-control mb-2" required>
        <textarea name="description" class="form-control mb-2">{{ $product->description }}</textarea>
        <input type="text" name="brand" value="{{ $product->brand }}" class="form-control mb-2">
        <input type="text" name="condition" value="{{ $product->condition }}" class="form-control mb-2">
        <input type="number" name="stock" value="{{ $product->stock }}" class="form-control mb-2" required>

        <select name="category" class="form-control mb-2" required>
            <option value="Men" {{ $product->category == 'Men' ? 'selected' : '' }}>Men</option>
            <option value="Women" {{ $product->category == 'Women' ? 'selected' : '' }}>Women</option>
            <option value="Children" {{ $product->category == 'Children' ? 'selected' : '' }}>Children</option>
        </select>

        <select name="shop_category" class="form-control mb-3" required>
            <option value="Glasses" {{ $product->shop_category == 'Glasses' ? 'selected' : '' }}>Shop Glasses</option>
            <option value="Sunglasses" {{ $product->shop_category == 'Sunglasses' ? 'selected' : '' }}>Shop Sunglasses</option>
            <option value="Contacts" {{ $product->shop_category == 'Contacts' ? 'selected' : '' }}>Shop Contacts</option>
        </select>

        <button class="btn btn-success">Update Product</button>
    </form>
</div>
@endsection
