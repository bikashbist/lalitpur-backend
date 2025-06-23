

@extends('users.user-dashboard')

@section('content')
<div class="inner-banner d-flex align-items-center py-lg-5 py-3" style="background-image: url('{{ asset($blog->image) }}');">
    <div class="container h-100 px-lg-5 p-0">
        <div class="inner-banner__content">
            <div class="inner-banner__content__title">
                <h1 class="mb-lg-4 mb-3">News & Blog Details</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb pb-0 mb-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $blog->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="inner-main-content py-lg-4 py-3">
    <div class="container px-lg-5 p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-main--content__left">
                  

           
                    <div class="preparation-content mb-5">
                        <!-- Title and Description Outside Accordion -->
                        <h5 class="mt-4">{{ $blog->title }}</h5>
                        
                       
                        <h1>{{ $blog->title }}</h1>
                        <p><strong>Date:</strong> {{ $blog->date }}</p>
                        @if($blog->image)
                            <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" class="img-fluid rounded mb-3" style="max-height: 400px; object-fit: contain;">
                        @endif
                        <p class="mt-3">{!! $blog->description !!}</p>
                    </div>
                 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


