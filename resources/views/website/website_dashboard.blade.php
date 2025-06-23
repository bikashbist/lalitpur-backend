<!doctype html>
<html lang="en">


@include('website.layout.head')

<body>
    @include('website.layout.header')
    @if ($errors->any())
        <div class="alert alert-danger w-100">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success w-100">
            {{ session('success') }}
        </div>
    @endif
    @yield('content')
   <!-- Footer -->
   <footer class="footer">
    <div class="container">
        <div class="footer-top">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="footer-widget about-widget">
                        <div class="footer-logo">
                            <img src="{{ asset($contactInfo->logo) }}" alt="NepalChina Imports Logo">
                        </div>
                        <p>NepalChina Imports is your trusted partner for importing goods from China to Nepal. We provide end-to-end import solutions tailored to your specific needs.</p>
                        <div class="social-links">
                            <li class="list-s"><a href="{{ $contactInfo->facebook }}"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li class="list-s"><a href="{{ $contactInfo->twitter }}"><i class="fa-brands fa-twitter"></i></a></li>
                            <li class="list-s"><a href="{{ $contactInfo->instagram }}"><i class="fa-brands fa-instagram"></i></a></li>
                            <li class="list-s"><a href="{{ $contactInfo->linkedin }}"><i class="fa-brands fa-linkedin-in"></i></a></li>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h4 class="widget-title">Quick Links</h4>
                        <ul class="footer-links">
                            <li><a href="/">Home</a></li>
                            <li><a href="{{route('about')}}">About Us</a></li>
                            <li><a href="{{route('services')}}">Services</a></li>
                            <li><a href="{{route('our-products')}}">Products</a></li>
                            <li><a href="{{route('our-blog')}}">Our Blogs</a></li>
                            <li><a href="{{route('contact')}}">Contact</a></li>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h4 class="widget-title">Our Services</h4>
                     
                        @php
                            use App\Models\Service;
                            $services = Service::all(); // Get all services
                        @endphp

                        <ul class="footer-links">
                            @forelse($services as $service)
                                <li class="service-item">
                                    <a href="{{ route('services.show', $service->id) }}" 
                                    class="service-link"
                                    title="{{ $service->title }}">
                                    {{ $service->title }}
                                    </a>
                                </li>
                            @empty
                                <li class="no-services">No services available</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
                <!-- <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h4 class="widget-title">Newsletter</h4>
                        <p>Subscribe to our newsletter for the latest updates and import tips.</p>
                        <form class="newsletter-form">
                            <input type="email" placeholder="Your Email Address" required>
                            <button type="submit"><i class="fas fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="footer-bottom">
            <div class="row">
                <div class="col-md-6">
                    <p class="copyright">© 2025 NepalChina Imports. All Rights Reserved.</p>
                </div>
                <div class="col-md-6">
                    <ul class="footer-bottom-links">
                        <li><a href="https://softechfoundation.com/" target="_blank">Design and Devloped by: Softech</a></li>
                      
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Back to Top Button -->
<a href="#" class="back-to-top"><i class="fas fa-arrow-up"></i></a>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JS -->
<script src="{{asset('shipping/js/main.js')}}"></script>
<script src="{{asset('shipping/js/slider.js')}}"></script>



    

</body>

</html>
