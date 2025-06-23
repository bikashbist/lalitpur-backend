@extends('admin.admin-dashboard')
@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-12 mb-3">

        <div>
            <div class="d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h3 class="mb-0  text-white">Media Details</h3>
                </div>
                <div>
                    <a href="{{ route('menu-products.create') }}" class="btn btn-white">Add Media </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        {{-- <h4>Menu Products</h4>
        <a href="" class="btn btn-primary mb-3">Add New Product</a> --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered bg-white">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th> Image</th>
                        <th>Description</th>
                        {{-- <th>Our Shipping Process</th>
                        <th> Cost & Pricing</th>
                        <th> Required Documentation</th> --}}
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
    
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                @if($product->image)
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="100">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>{!! Str::limit(strip_tags($product->description), 50) !!}</td>
                            <td>{!! Str::limit(strip_tags($product->reasons_to_study), 50) !!}</td>
                            <td>{!! Str::limit(strip_tags($product->scholarships), 50) !!}</td>
                            <td>{!! Str::limit(strip_tags($product->application_process), 50) !!}</td>
                            <td class="d-flex justify-content-center align-items-center gap-1">
                                <a href="{{ route('menu-products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('menu-products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
     
    </div>
</div>
@endsection
