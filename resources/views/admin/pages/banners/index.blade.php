@extends('admin.admin-dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">

                <div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mb-2 mb-lg-0">
                            <h3 class="mb-0  text-white"> Banner List </h3>
                        </div>
                        <div>
                            <a href="{{ route('banner.create') }}" class="btn btn-white">Create </a>
                        </div>
                    </div>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-bordered bg-white">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title (English)</th>
                        <th>Title (Nepali)</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banners as $banner)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $banner->image_name_en }}</td>
                            <td>{{ $banner->image_name_np }}</td>
                            <td><img src="{{ asset($banner->image) }}" style="width: 100px;"></td>
                            <td>
                                <a href="{{ route('banner.edit', $banner->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('banner.destroy', $banner->id) }}" method="POST"
                                    style="display:inline-block;">
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
