@extends('admin.admin-dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-2 mb-lg-0">
                        <h3 class="mb-0 text-white">About Us</h3>
                    </div>
                    @if(!count($groups))
                        <div>
                            <a href="{{ route('about-us.create') }}" class="btn btn-white">Create</a>
                        </div>
                    @endif
                </div>
            </div>
        </div> 

        <div class="col-12 mt-3">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
       
            <table class="table table-bordered mt-3 bg-white">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($groups))
                        @foreach ($groups as $group)
                            @foreach ($group->aboutUsEntries as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{!! $item->description !!}</td>
                                    <td>
                                        @if ($item->image)
                                            <img src="{{ asset($item->image) }}" alt="About Us Image" width="100">
                                        @else
                                            <p>No image available</p>
                                        @endif
                                    </td>
                                    <td class="d-flex justify-content-center align-items-center gap-1">
                                        <a href="{{ route('about-us.edit', $group->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center">
                                No About Us information found. <a href="{{ route('about-us.create') }}">Create About Us</a>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection