@extends('users.user-dashboard')
@section('content')
    <div class="inner-banner d-flex align-items-center " style="background-image: url('images/inner-banner.jpg');">
        <div class="container  h-100 px-lg-5 p-0">
            <div class="inner-banner__content ">
                <div class="inner-banner__content__title">
                    <h1 class="mb-lg-4 mb-3">{{ $team->name }}</h1>
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb pb-0 mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('teams.index') }}">Our Teams</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $team->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="team-details inner-main-content py-lg-5 py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="team-image text-center">
                        <img src="{{ asset($team->image) }}" alt="{{ $team->name }}" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="team-info">
                        <h5>{{ $team->name }}</h5>
                        <p><strong>Position:</strong> {{ $team->position }}</p>
                        <p><strong>Phone:</strong> {{ $team->phone }}</p>
                     
                        <p>{!! $team->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
