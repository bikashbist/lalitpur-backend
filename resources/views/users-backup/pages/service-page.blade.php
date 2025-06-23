@extends('users.user-dashboard')

@section('content')




    @if ($banner)
        <div class="inner-banner d-flex align-items-center py-5" style="background-image: url('{{ asset($banner->image) }}')">
            <div class="container  h-100 px-lg-5 px-4">
                <div class="inner-banner__content ">

                    <div class="inner-banner__content__title">
                        <h1 class="mb-lg-4 mb-3">Services</h1>

                        <nav aria-label="breadcrumb ">
                            <ol class="breadcrumb pb-0 mb-0">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Services</li>
                            </ol>
                        </nav>
                    </div>


                </div>
            </div>
        </div>
    @endif

    <div class="inner-main-content py-lg-4 py-3 ">
        <section class="services-section">
            <div class="container">
                
                <div class="row">
                    @foreach($services as $service)
                  
                    <div class="col-md-4">
                        <div class="service-card">
                            <div class="service-icon overflow-hidden">
                               
                                <img src="{{ asset($service->image) }}" alt="img">
                            </div>
                            <h3>{{ $service->title }}</h3>
                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($service->description), 70) }}</p>
                            <a href="{{ route('services.show', $service->id) }}" class="read-more">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach
                   
                  
                </div>
               
            </div>
        </section>
    </div>

@endsection
