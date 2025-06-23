@extends('admin.admin-dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">


                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-2 mb-lg-0">
                        <h3 class="mb-0  text-white"> Services Product List </h3>
                    </div>
                    <div>
                        <a href="{{ route('service-products.create') }}" class="btn btn-white">Create </a>
                    </div>
                </div>

            </div>
            <div class="col-12 mt-3">

                <table class="table table-bordered table-hover bg-white">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th width="160">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $index => $product)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $product->scategory->name ?? '-' }}</td>
                                <td>{{ $product->title }}</td>
                                <td>{!! Str::limit(strip_tags($product->description), 60) !!}</td>
                                <td>
                                    @if ($product->image)
                                        <img src="{{ asset($product->image) }}" width="80">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('service-products.edit', $product->id) }}"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('service-products.destroy', $product->id) }}" method="POST"
                                        class="d-inline-block" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No service products found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>


    </div>
@endsection
