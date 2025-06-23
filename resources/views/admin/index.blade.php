@extends('admin.admin-dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-2 mb-lg-0">
                        <h3 class="mb-0  text-white">Dashboard</h3>
                    </div>
                    {{-- <div>
                        <a href="#" class="btn btn-white">Create New Project</a>
                    </div> --}}
                </div>
            </div>
        </div>
   

    <div class="row my-6">
        {{-- <div class="col-xl-4 col-lg-12 col-md-12 col-12 mb-6 mb-xl-0">
            <img class="img-fluid rounded-5" src="{{ asset('tourism/images/golden-temple-in-patan-nepal.webp') }}" alt="">

        </div> --}}

        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="card h-100 rounded-5">

                {{-- <div class="card-header bg-white py-4">
                    <h4 class="mb-0">Patan Darbar </h4>
                </div> --}}

                <div class="table-responsive h-100">
                    <img class="img-fluid h-100 rounded-5" src="{{ asset('tourism/images/3.webp') }}" alt="" style="object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
@endsection
