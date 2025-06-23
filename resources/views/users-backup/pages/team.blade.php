@extends('users.user-dashboard')

@section('content')
    <div class="inner-banner d-flex align-items-center " style="background-image: url('images/inner-banner.jpg');">
        <div class="container  h-100 px-lg-5 p-0">
            <div class="inner-banner__content ">

                <div class="inner-banner__content__title">
                    <h1 class="mb-lg-4 mb-3">Our Teams</h1>

                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb pb-0 mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Our Teams</li>
                        </ol>
                    </nav>
                </div>


            </div>
        </div>
    </div>
    <div class="inner-main-content  ">

        <div class="services py-lg-5 py-3">
            <div class="container">
             
                <div class="row">

               
                    @foreach ($data as $data)
                        <div class="col-lg-3">
                            <div class="services__content h-100 text-center">
                                <img src="{{ asset($data->image) }}" alt="services">
                                <h2>{{ $data->name }}</h2>
                                <p class="text-center">{{ $data->position }}</p>
                                  
                                <a class="btn-learn-more bg-primary-color py-3" style="background-color: #4db748; color:white;" href="{{ route('teams.details', $data->id) }}">
                                     View Details
                                </a>
                                
                            </div>
                        </div>
                    @endforeach
                </div>
    
             
    
            </div>
        </div>
      
    </div>
@endsection
