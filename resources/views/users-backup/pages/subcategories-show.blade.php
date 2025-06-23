@extends('users.user-dashboard')

@section('content')

<div class="inner-banner d-flex align-items-center" style="background-image: url('{{ asset($subcategory->category->image ?? 'images/inner-banner.jpg') }}');">
    <div class="container h-100 px-lg-5 p-0">
        <div class="inner-banner__content">
            <div class="inner-banner__content__title">
                <h1 class="mb-lg-4 mb-3">{{ $subcategory->title }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb pb-0 mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('services.page', $subcategory->category->id) }}">{{ $subcategory->category->title }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $subcategory->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="inner-main-content py-lg-4 py-3">
    <div class="container px-lg-5 p-0">
        <div class="row">
            <div class="col-lg-8">
                <div class="inner-main--content__left">
                    <h5>{{ $subcategory->title }}</h5>
                    <p>{!! $subcategory->description !!}</p>

                    {{-- @if ($subcategory->image)
                        <img src="{{ asset($subcategory->image) }}" alt="{{ $subcategory->title }}" class="img-fluid rounded-3 mt-3">
                    @endif --}}
                </div>
            </div>

            <div class="col-lg-4">
                <div class="inner-main--content__right">
                    <div class="related-links p-3">
                        <h5 class="mb-3">ALL SUBCATEGORIES</h5>
                        <ul class="list-unstyled">
                            @foreach ($all as $sub)
                                <li>
                                    <a href="{{ route('sub-services.page', $sub->id) }}" class="related-link {{ $sub->id == $subcategory->id ? 'fw-bold text-white' : '' }}">
                                        {{ $sub->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    @if ($contactInfo)
                        <div class="contact-info mt-4 m-3 p-3 border rounded">
                            <h6 class="text-uppercase fs-5 fw-bold">Contact Info</h6>
                            <p><strong>Phone:</strong> {{ $contactInfo->phone }}</p>
                            <p><strong>Email:</strong> {{ $contactInfo->email }}</p>
                            <p><strong>Address:</strong> {{ $contactInfo->address }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
