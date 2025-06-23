@extends('admin.admin-dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-2 mb-lg-0">
                        <h3 class="mb-0  text-white"> Advertisements List </h3>
                    </div>
                    <div>
                        <a href="{{ route('advertisements.create') }}" class="btn btn-white">Create </a>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <table class="table table-bordered bg-white">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image Name</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($advertisements as $advertisement)
                            <tr>
                                <td>{{ $advertisement->id }}</td>
                                <td>{{ $advertisement->image_name }}</td>
                                <td><img src="{{ asset($advertisement->image) }}" alt="{{ $advertisement->image_name }}"
                                        width="100"></td>
                                <td>
                                    <a href="{{ route('advertisements.edit', $advertisement->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('advertisements.destroy', $advertisement->id) }}" method="POST"
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
