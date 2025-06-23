@extends('users.user-dashboard')

@section('content')
    <div class="inner-banner d-flex align-items-center " style="background-image: url('images/inner-banner.jpg');">
        <div class="container  h-100 px-lg-5 px-4">
            <div class="inner-banner__content ">

                <div class="inner-banner__content__title">
                    <h1 class="mb-lg-4 mb-3">Our Core Values</h1>

                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb pb-0 mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Core Value</li>
                        </ol>
                    </nav>
                </div>


            </div>
        </div>
    </div>
    <div class="inner-main-content py-lg-4 py-3 ">
        <div class="container px-lg-5 px-4">
            @foreach ($data as $data)
                <h5>{{ $data->title }}</h5>
                <p>{!! $data->description !!}</p>
            @endforeach
        </div>
    </div>
@endsection
