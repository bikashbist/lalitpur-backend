@extends('admin.admin-dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">

                <div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mb-2 mb-lg-0">
                            <h3 class="mb-0  text-white"> Our Process List </h3>
                        </div>
                        <div>
                            <a href="{{ route('core-values.create') }}" class="btn btn-white">Create </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-3">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <table class="table  bg-white">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->title }}</td>
                                <td>{!! Str::limit(strip_tags($data->description), 60) !!}</td>
                                
                                <td>
                                    <a href="{{ route('core-values.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('core-values.destroy', $data->id) }}" method="POST"
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
