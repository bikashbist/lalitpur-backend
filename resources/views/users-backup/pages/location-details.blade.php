@extends('users.user-dashboard')

@section('content')

<div class="inner-banner d-flex align-items-center " style="background-image: url('{{ asset($location->image) }}')">
    <div class="container  h-100 px-lg-5 px-4">
        <div class="inner-banner__content ">

            <div class="inner-banner__content__title">
                <h1 class="mb-lg-4 mb-3">{{ $location->location_category }}</h1>

                <nav aria-label="breadcrumb ">
                    <ol class="breadcrumb pb-0 mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $location->location_category }}</li>
                    </ol>
                </nav>
            </div>


        </div>
    </div>
</div>
    <div class="inner-main-content py-lg-4 py-3 ">
        <section class="contact-section">
            <div class="container">
                <div class="row g-lg-4 g-3">
                    <div class="col-md-6 mb-4">
                        {{-- @if ($location->image)
                        <div class="contact-img d-flex justify-content-center">
                            <div class="text-center">
                                <img class="rounded-1" src="{{ asset($location->image) }}" alt="Contact Image" >
                                <h4 class="mt-2">{{ $location->contact_name }}</h4 class="mt-2">
                            </div>
                         
                            
                        </div>
                        @else
                         <div></div>
                        @endif --}}
                        @if ($location->map)
                            <div class="map-container" >
                                {!! $location->map !!}
                            </div>
                        @else
                           <div></div>
                        @endif

                        

                        <div class="contact-info mt-4">
                            <p> <i class="fa fa-user"></i> Contact Person : {{ $location->contact_name }}</p>
                           
                            <p><i class="fa fa-phone"></i> {{ $location->phone }}</p>
                            <p><i class="fa-solid fa-envelope"></i> {{ $location->email }}</p>
                            <p>
                                <a class="text-decoration-none text-whatsapp" href="https://wa.me/{{ $location->phone }}">
                                    <i class="fa-brands fa-whatsapp text-whatsapp"></i> {{ $location->phone }}
                                </a>
                            </p>
                            <p><i class="fa fa-location"></i> {{ $location->address }}</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="contact-form">
                            <form>
                                <select class="form-select">
                                    <option selected>{{ $location->location_category }}</option>
                                </select>
                                <input type="text" class="form-control" placeholder="First Name">
                                <input type="text" class="form-control" placeholder="Last Name">
                                <input type="email" class="form-control" placeholder="Email">
                                <input type="text" class="form-control" placeholder="Contact Number">
                                <textarea class="form-control mb-3" rows="5" placeholder="Your message here..."></textarea>
                                <button type="submit"
                                    class="btn bg-primary-color text-white py-3 fw-bold w-100">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
