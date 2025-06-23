@extends('users.user-dashboard')

@section('content')
    @if ($banner)
        <div class="inner-banner d-flex align-items-center py-5" style="background-image: url('{{ asset($banner->image) }}')">
            <div class="container  h-100 px-lg-5 px-4">
                <div class="inner-banner__content ">

                    <div class="inner-banner__content__title">
                        <h1 class="mb-lg-4 mb-3">{{ $service->title }}</h1>

                        <nav aria-label="breadcrumb ">
                            <ol class="breadcrumb pb-0 mb-0">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $service->title }}</li>
                            </ol>
                        </nav>
                    </div>


                </div>
            </div>
        </div>
    @endif

    <div class="inner-main-content py-lg-4 py-3 ">
        <div class="container px-lg-5 px-4">
            <div class="inner-details my-4">
               
                            <h5>{{ $service->title }}</h5>
                            <p>{!! $service->description !!}</p>
                  
                        <img src="{{ asset($service->image) }}" alt="{{ $service->title }}" class="img-fluid w-100" style="max-height: 400p%; object-fit: cover;">
                   

            
            </div>
        </div>
    </div>
@endsection
