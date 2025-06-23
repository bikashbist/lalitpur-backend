@extends('website.website-dashboard')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-slider">
            @foreach ($banner as $data)
                <div class="hero-slide active" style="    background-color: #1d3557;
height: 500px;">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-7">
                                <div class="hero-content">
                                    <h1 class="text-white">Reliable Import Service from China to Nepal</h1>
                                    <p class="text-white">We handle everything from product sourcing to delivery, making
                                        importing simple and hassle-free.</p>
                                    <p class="text-white">{{ $data->title }}</p>
                                    <div class="hero-buttons">
                                        <a href="{{route('contact')}}" class="btn btn-primary">Request a Quote</a>
                                        <a href="{{route('our-products')}}" class="btn btn-outline">Explore Products</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="hero-image">
                                    <img src="{{ asset($data->image) }}" alt="{{ $data->title }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- <div class="hero-slide" style="    background-color: #1b690b;
height: 500px;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <div class="hero-content">
                                <h1 class="text-white">Expert Customs Clearance Services</h1>
                                <p class="text-white">Navigate complex customs regulations with our experienced team
                                    handling all documentation and clearance procedures.</p>
                                <div class="hero-buttons">
                                    <a href="customs.html" class="btn btn-primary">Learn More</a>
                                    <a href="contact.html" class="btn btn-outline">Contact Us</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="hero-image">
                                <img src="imges/banner.png" alt="Customs Clearance Services">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-slide" style="    background-color: #1b690b;
height: 500px;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <div class="hero-content">
                                <h1 class="text-white">Quality Product <br> Sourcing</h1>
                                <p class="text-white">Find reliable manufacturers and suppliers in China with our extensive
                                    network and quality verification process.</p>
                                <div class="hero-buttons">
                                    <a href="services.html" class="btn btn-primary">Our Services</a>
                                    <a href="quote.html" class="btn btn-outline">Get Started</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="hero-image">
                                <img src="imges/banner.png" alt="Product Sourcing in China">
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="slider-controls">
            <button class="prev-slide"><i class="fas fa-chevron-left" style="    color: #fff;"></i></button>
            <div class="slider-dots">
                <span class="dot active" data-slide="0"></span>
                <span class="dot" data-slide="1" style="    background-color: #fff;"></span>
                <span class="dot" data-slide="2" style="    background-color: #fff;"></span>
            </div>
            <button class="next-slide"><i class="fas fa-chevron-right" style="    color: #fff;"></i></button>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    @if ($groups1->count() > 0 && $groups1[0]->aboutUsEntries->count() > 0)
                    @php
                        $firstItem = $groups1[0]->aboutUsEntries->first();
                    @endphp
    
                    
                    @if ($firstItem->image)
                    <div class="about-image">
                        <img src="{{ asset($firstItem->image) }}" alt="About NepalChina Imports">
                    </div>
                    @endif
                @endif
                    
                </div>
                <div class="col-lg-6">
                    <div class="section-heading">
                        @if ($groups1->count() > 0 && $groups1[0]->aboutUsEntries->count() > 0)
                        @php
                            $firstItem = $groups1[0]->aboutUsEntries->first();
                        @endphp
                        <span>About Us</span>
                        <h2>{{ $firstItem->title }}</h2>
                        <h5></h5>
                        <div>
                            {!! Str::words($firstItem->description, 30, '...') !!}
                        </div>
                       
                      
                    @endif
                        
                    </div>
                    <div class="about-content">
                        {{-- <p>NepalChina Imports has been bridging the gap between Chinese manufacturers and Nepalese
                            businesses since 2010. With offices in both Kathmandu and Guangzhou, we provide end-to-end
                            import solutions tailored to your specific needs.</p> --}}
                            @foreach ($groups1 as $group)
                            @foreach ($group->aboutUsEntries->skip(1) as $index => $entry)
                                <div class="about-features">
                                    <div class="feature">
                                        <div class="feature-icon">
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div class="feature-text">
                                            <h4>{{ $entry->title }}</h4>
                                            <p>{!! Str::words(strip_tags($entry->description), 50, '...') !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                        <a href="{{route('about')}}" class="btn btn-primary">Learn More About Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section">
        <div class="container">
            <div class="section-heading text-center">
                <span>Our Services</span>
                <h2>Comprehensive Import Solutions</h2>
                <p>We handle every aspect of the import process, from sourcing to delivery</p>
            </div>
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
            <div class="text-center mt-5">
                <a href="{{route('services')}}" class="btn btn-primary">View All Services</a>
            </div>
        </div>
    </section>

    <!-- Product Categories Section -->
    <section class="product-categories">
        <div class="container">
            <div class="section-heading text-center">
                <span>Product Categories</span>
                <h2>What We Import</h2>
                <p>Browse through our wide range of product categories</p>
            </div>
            <div class="row">
                @foreach (\App\Models\MenuCategory::get() as $category)  
                    <div class="col-md-3 col-6">
                        <div class="category-card">
                            <div class="category-image">
                                <img src="{{ asset($category->image) }}" alt="Electronics">
                            </div>
                            <h3>{{ $category->name }}</h3>
                            <a href="{{ route('Product-Categories', ['id' => $category->id]) }}" class="category-link">View Details</a>
                        </div>
                    </div>
                @endforeach
               
            </div>
            <div class="text-center mt-5">
                <a href="{{route('our-products')}}" class="btn btn-primary">Explore All Products</a>
            </div>
        </div>
    </section>

    <!-- Process Section -->
  
    <section class="process-section">
        <div class="container">
            <div class="section-heading text-center">
                <span>Our Process</span>
                <h2>How It Works</h2>
                <p>Simple steps to import products from China to Nepal</p>
            </div>
            <div class="process-timeline">
                @foreach ($OurProcess as $key => $item)
                    <div class="process-step">
                        <div class="step-number">{{ $key + 1 }}</div>
                        <div class="step-content">
                            <h3>{{ $item->title }}</h3>
                            <p>{!! $item->description !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>Ready to Import from China?</h2>
                <p>Get a free consultation and quote for your import needs</p>
                <a href="{{route('contact')}}" class="btn btn-light">Request a Quote</a>
                <a href="{{route('contact')}}" class="btn btn-outline-light">Contact Us</a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    {{-- <section class="testimonials-section">
        <div class="container">
            <div class="section-heading text-center">
                <span>Testimonials</span>
                <h2>What Our Clients Say</h2>
                <p>Hear from businesses that have successfully imported with us</p>
            </div>
            <div class="testimonial-slider">
       
                <div class="testimonial-slide active">
                    <div class="testimonial-card">
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-text">"NepalChina Imports made the entire process seamless. From sourcing
                            quality electronics to handling customs clearance, they took care of everything. Highly
                            recommended!"</p>
                        <div class="testimonial-author">
                            <img src="imges/67441.jpg" alt="Rajesh Sharma">
                            <div class="author-info">
                                <h4>Rajesh Sharma</h4>
                                <p>Tech Solutions, Kathmandu</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-slide">
                    <div class="testimonial-card">
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-text">"As a first-time importer, I was nervous about the process. The team at
                            NepalChina Imports guided me through every step and helped me source quality furniture for my
                            new hotel."</p>
                        <div class="testimonial-author">
                            <img src="imges/67441.jpg" alt="Sunita Thapa">
                            <div class="author-info">
                                <h4>Sunita Thapa</h4>
                                <p>Mountain View Hotel, Pokhara</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-slide">
                    <div class="testimonial-card">
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <p class="testimonial-text">"We've been working with NepalChina Imports for over 5 years now. Their
                            attention to detail and commitment to quality has helped us grow our business significantly."
                        </p>
                        <div class="testimonial-author">
                            <img src="imges/67441.jpg" alt="Binod Shrestha">
                            <div class="author-info">
                                <h4>Binod Shrestha</h4>
                                <p>Himalayan Trading Co., Birgunj</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-controls">
                <button class="prev-testimonial"><i class="fas fa-chevron-left"></i></button>
                <div class="testimonial-dots">
                    <span class="dot active" data-slide="0"></span>
                    <span class="dot" data-slide="1"></span>
                    <span class="dot" data-slide="2"></span>
                </div>
                <button class="next-testimonial"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </section> --}}
    <section class="testimonials-section">
        <div class="container">
            <div class="section-heading text-center">
                <span>Testimonials</span>
                <h2>What Our Clients Say</h2>
                <p>Hear from businesses that have successfully imported with us</p>
            </div>
            <div class="testimonial-slider">
                @foreach($testimonials as $index => $item)
                    <div class="testimonial-slide {{ $index === 0 ? 'active' : '' }}">
                        <div class="testimonial-card">
                            <div class="testimonial-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="testimonial-text">"{{ $item->desc }}"</p>
                            <div class="testimonial-author">
                                <img src="{{ asset($item->image) }}" alt="{{ $item->name }}">
                                <div class="author-info">
                                    <h4>{{ $item->name }}</h4>
                                    <p>{{ $item->position }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="testimonial-controls">
                <button class="prev-testimonial"><i class="fas fa-chevron-left"></i></button>
                <div class="testimonial-dots">
                    @foreach($testimonials as $index => $item)
                        <span class="dot {{ $index === 0 ? 'active' : '' }}" data-slide="{{ $index }}"></span>
                    @endforeach
                </div>
                <button class="next-testimonial"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </section>
    

    <!-- Blog Section -->
    <section class="blog-section">
        <div class="container">
            <div class="section-heading text-center">
                <span>Our Blog</span>
                <h2>Latest Import Tips & News</h2>
                <p>Stay updated with the latest trends and information</p>
            </div>
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-card">
                            <div class="blog-image">
                                <img src="{{ asset($blog->image) }}" alt="{{ $blog->sub_title }}" style="width:100%; height:250px; object-fit:cover;">
                                <div class="blog-date">
                                    @php
                                        $date = \Carbon\Carbon::parse($blog->date);
                                    @endphp
                                    <span>{{ $date->format('d') }}</span>
                                    <span>{{ $date->format('M') }}</span>
                                </div>
                            </div>
                            <div class="blog-content">
                                <div class="blog-category">{{ $blog->sub_title }}</div>
                                <h3><a href="{{ route('blog.details', $blog->id) }}">{{ $blog->title }}</a></h3>
                                <p>{{ Str::limit(strip_tags($blog->description), 110) }}</p>
                                <a href="{{ route('blog.details', $blog->id) }}" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('blog.index') }}" class="btn btn-primary">View All Articles</a>
            </div>
        </div>
    </section>
    

    <!-- Contact Form Section -->
    <section class="contact-form-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-info">
                        <div class="section-heading">
                            <span>Get In Touch</span>
                            <h2>Have Questions? Contact Us</h2>
                            <p>Our team is ready to assist you with any inquiries about importing from China to Nepal</p>
                        </div>
                        <div class="contact-details">
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-text">
                                    <h4>Our Office</h4>
                                    <p>{{ $contactInfo->address ?? 'Thamel, Kathmandu, Nepal' }}</p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="contact-text">
                                    <h4>Phone Number</h4>
                                    <p>{{ $contactInfo->phone ?? '+977 1234 567 890' }}</p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="contact-text">
                                    <h4>Email Address</h4>
                                    <p>{{ $contactInfo->email ?? 'info@nepalchinaimports.com' }}</p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="contact-text">
                                    <h4>Working Hours</h4>
                                    <p>Mon - Fri: 9:00 AM - 6:00 PM</p>
                                </div>
                            </div>
                            {{-- <div class="social-links mt-4">
                                @if($contactInfo->facebook)
                                    <a href="{{ $contactInfo->facebook }}" target="_blank" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                                @endif
                                @if($contactInfo->instagram)
                                    <a href="{{ $contactInfo->instagram }}" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
                                @endif
                                @if($contactInfo->twitter)
                                    <a href="{{ $contactInfo->twitter }}" target="_blank" class="social-icon"><i class="fab fa-twitter"></i></a>
                                @endif
                                @if($contactInfo->linkedin)
                                    <a href="{{ $contactInfo->linkedin }}" target="_blank" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                                @endif
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-form">
                        <h3>Send Us a Message</h3>
                        <form id="contactForm">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" placeholder="Your Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" placeholder="Your Email" required>
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control" id="phone" placeholder="Your Phone">
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="subject">
                                    <option value="" selected disabled>Select Subject</option>
                                    <option value="Product Sourcing">Product Sourcing</option>
                                    <option value="Shipping & Logistics">Shipping & Logistics</option>
                                    <option value="Customs Clearance">Customs Clearance</option>
                                    <option value="General Inquiry">General Inquiry</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="message" rows="5" placeholder="Your Message" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- end shipping --}}




@endsection
