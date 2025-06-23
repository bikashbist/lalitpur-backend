@extends('users.user-dashboard')

@section('content')

@if ($banner)
<div class="inner-banner d-flex align-items-center py-5" style="background-image: url('{{ asset($banner->image) }}')">
    <div class="container  h-100 px-lg-5 px-4">
        <div class="inner-banner__content ">

            <div class="inner-banner__content__title">
                <h1 class="mb-lg-4 mb-3">Contact Us</h1>

                <nav aria-label="breadcrumb ">
                    <ol class="breadcrumb pb-0 mb-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ol>
                </nav>
            </div>


        </div>
    </div>
</div>
@endif
<div class="container py-5">
    <div class="row g-4">
        <!-- Google Map Section -->
        <div class="col-md-8 p-0 rounded overflow-hidden shadow-sm">
            <div class="ratio ratio-16x9">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.229421119305!2d85.33129431438574!3d27.70619488279256!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb198e630059ed%3A0xa63c6d158fa763e1!2sSankhamul%2C%20Kathmandu!5e0!3m2!1sen!2snp!4v1612360994050!5m2!1sen!2snp"
                    allowfullscreen="" 
                    loading="lazy"
                    class="border-0"
                    style="min-height: 400px;">
                </iframe>
            </div>
        </div>

        <!-- Contact Info Section -->
        <div class="col-md-4">
            <div class="contact-info bg-white p-4 rounded shadow-sm h-100">
                <h4 class="mb-4 fw-bold border-bottom pb-3">Contact Information</h4>
        
                <div class="info-item d-flex align-items-start mb-4 pb-3 border-bottom">
                    <div class="icon bg-light rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                        <i class="fas fa-phone-alt text-primary"></i>
                    </div>
                    <div>
                        <div class="fw-semibold text-dark">Phone</div>
                        <div class="text-muted">{{ $contactInfo->phone ?? '+977 1234 567 890' }}</div>
                    </div>
                </div>
        
                <div class="info-item d-flex align-items-start mb-4 pb-3 border-bottom">
                    <div class="icon bg-light rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                        <i class="fas fa-envelope text-primary"></i>
                    </div>
                    <div>
                        <div class="fw-semibold text-dark">Email</div>
                        <div class="text-muted">{{ $contactInfo->email ?? 'info@example.com' }}</div>
                    </div>
                </div>
        
                <div class="info-item d-flex align-items-start mb-4 pb-3 border-bottom">
                    <div class="icon bg-light rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                        <i class="fas fa-map-marker-alt text-primary"></i>
                    </div>
                    <div>
                        <div class="fw-semibold text-dark">Location</div>
                        <div class="text-muted">{{ $contactInfo->address ?? 'Sankhamul, Kathmandu, Nepal' }}</div>
                    </div>
                </div>
        
                <div class="info-item d-flex align-items-start mb-4">
                    <div class="icon bg-light rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                        <i class="fas fa-clock text-primary"></i>
                    </div>
                    <div>
                        <div class="fw-semibold text-dark">Working Hours</div>
                        <div class="text-muted">Mon-Fri: 9AM - 6PM</div>
                    </div>
                </div>
        
                <div class="social-icons mt-4 pt-3 border-top">
                    <div class="d-flex">
                        @if($contactInfo->facebook)
                            <a href="{{ $contactInfo->facebook }}" target="_blank" class="btn btn-outline-secondary btn-sm rounded-circle me-2">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        @endif
                        @if($contactInfo->instagram)
                            <a href="{{ $contactInfo->instagram }}" target="_blank" class="btn btn-outline-secondary btn-sm rounded-circle me-2">
                                <i class="fab fa-instagram"></i>
                            </a>
                        @endif
                        @if($contactInfo->twitter)
                            <a href="{{ $contactInfo->twitter }}" target="_blank" class="btn btn-outline-secondary btn-sm rounded-circle me-2">
                                <i class="fab fa-twitter"></i>
                            </a>
                        @endif
                        @if($contactInfo->linkedin)
                            <a href="{{ $contactInfo->linkedin }}" target="_blank" class="btn btn-outline-secondary btn-sm rounded-circle">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection