<div class="top-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="contact-info">
                    <a href="mailto:info@nepalchinaimports.com"><i class="fas fa-envelope"></i> {{ $contactInfo->email }}</a>
                    <a href="tel:+9771234567890"><i class="fas fa-phone-alt"></i> {{ $contactInfo->phone }}</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="social-links">
                    <li class="list-s"><a href="{{ $contactInfo->facebook }}"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li class="list-s"><a href="{{ $contactInfo->twitter }}"><i class="fa-brands fa-twitter"></i></a></li>
                    <li class="list-s"><a href="{{ $contactInfo->instagram }}"><i class="fa-brands fa-instagram"></i></a></li>
                    <li class="list-s"><a href="{{ $contactInfo->linkedin }}"><i class="fa-brands fa-linkedin-in"></i></a></li>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Navigation -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ asset($contactInfo->logo) }}" alt="NepalChina Imports Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}">Our Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('our-products') ? 'active' : '' }}" href="{{ route('our-products') }}">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('our-blog') ? 'active' : '' }}" href="{{ route('our-blog') }}">Our Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
