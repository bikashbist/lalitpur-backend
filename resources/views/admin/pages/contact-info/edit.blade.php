@extends('admin.admin-dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-2 mb-lg-0">
                        <h3 class="mb-0 text-white">Contact Edit</h3>
                    </div>
                    <div>
                        <nav aria-label="breadcrumb text-white">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-white text-decoration-none"
                                        href="{{ route('contact-info.index') }}">Contact List</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Edit</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 mt-3">
            <div class="card p-3">
                <form action="{{ route('contact-info.update', $contactInfo->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone', $contactInfo->phone) }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $contactInfo->email) }}">
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" value="{{ old('address', $contactInfo->address) }}">
                    </div>

                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input type="url" name="facebook" class="form-control" value="{{ old('facebook', $contactInfo->facebook) }}">
                    </div>

                    <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input type="url" name="instagram" class="form-control" value="{{ old('instagram', $contactInfo->instagram) }}">
                    </div>

                    <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input type="url" name="twitter" class="form-control" value="{{ old('twitter', $contactInfo->twitter) }}">
                    </div>
                    <div class="form-group">
                        <label for="linkedin">linkedin</label>
                        <input type="url" name="linkedin" class="form-control" value="{{ old('linkedin', $contactInfo->linkedin) }}">
                    </div>

                    <div class="form-group">
                        <label for="logo">Logo</label>
                        @if($contactInfo->logo)
                            <div class="mb-2">
                                <img src="{{ asset($contactInfo->logo) }}" alt="Logo" width="100">
                            </div>
                        @endif
                        <input type="file" name="logo" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
