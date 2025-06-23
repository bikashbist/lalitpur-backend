<!-- Sidebar -->
<nav class="navbar-vertical navbar">
    <div class="nav-scroller">
        <!-- Brand logo -->
        <a class="navbar-brand d-flex align-items-center gap-3" href="{{ url('/dashboard') }}">
            <img src="{{ asset('tourism/images/cropped-logo.png') }}" alt="Logo" />
            <div>
                <h4 class="text-white fs-2 fw-bold mb-0">ललितपुर</h4>
            </div>
        </a>

        <!-- Sidebar menu -->
        <ul class="navbar-nav flex-column" id="sideNavbar">

            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/dashboard') }}">
                    <i data-feather="home" class="nav-icon icon-xs me-2 text-white"></i>
                    ड्यासबोर्ड
                </a>
            </li>
            
            <!-- गृह पृष्ठ -->
            <li class="nav-item">
                <a class="nav-link has-arrow {{ request()->is('auth/*') ? '' : 'collapsed' }}" data-bs-toggle="collapse"
                    href="#navAuth" role="button" aria-expanded="{{ request()->is('auth/*') ? 'true' : 'false' }}"
                    aria-controls="navAuth">
                    <i class="bi bi-house-door me-2"></i>
                    गृह पृष्ठ
                </a>
                <div id="navAuth" class="collapse {{ request()->is('auth/*') ? 'show' : '' }}">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('banner.index') ? 'active' : '' }}"
                                href="{{ route('banner.index') }}">
                                गृह ब्यानर
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/team-lalitpur-members*') ? 'active' : '' }}"
                            href="{{ route('admin.team-lalitpur-members.index') }}">
                            प्रवक्ता
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('gallery.index') ? 'active' : '' }}"
                                href="{{ route('gallery.index') }}">
                                ग्यालेरी
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('contact-info.index') ? 'active' : '' }}"
                                href="{{ route('contact-info.index') }}">
                                सम्पर्क जानकारी
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('contact-info.index') ? 'active' : '' }}"
                                href="{{ route('advertisements.index') }}">
                                भिडियो ब्यानर
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('services_product.index') ? 'active' : '' }}"
                                href="{{ route('services_product.index') }}">
                                हाम्रो सेवाहरू
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('testimonials.index') ? 'active' : '' }}"
                                href="{{ route('testimonials.index') }}">
                                प्रशंसापत्र
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            <!-- पृष्ठहरू -->
            <li class="nav-item">
                <a class="nav-link has-arrow {{ request()->is('pages/*') ? '' : 'collapsed' }}"
                    data-bs-toggle="collapse" href="#navPages" role="button"
                    aria-expanded="{{ request()->is('pages/*') ? 'true' : 'false' }}" aria-controls="navPages">
                    <i data-feather="layers" class="nav-icon icon-xs me-2"></i>
                    पृष्ठहरू
                </a>
                <div id="navPages" class="collapse {{ request()->is('pages/*') ? 'show' : '' }}">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('documents*') ? 'active' : '' }}" href="{{ route('documents.index') }}">
                              प्रकाशन
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('teams.index') ? 'active' : '' }}"
                                href="{{ route('teams.index') }}">
                                टोलीहरू
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('blog.index') ? 'active' : '' }}"
                                href="{{ route('blog.index') }}">
                                समाचार
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
           
            <!-- डाउनलोडहरू -->
            <li class="nav-item">
                <a class="nav-link has-arrow {{ request()->is('ourServices/*') ? '' : 'collapsed' }}"
                    data-bs-toggle="collapse" href="#ourServices" role="button"
                    aria-expanded="{{ request()->is('ourServices/*') ? 'true' : 'false' }}" aria-controls="ourServices">
                    <i data-feather="download" class="nav-icon icon-xs me-2"></i>
                    डाउनलोडहरू                    
                </a>
                <div id="ourServices" class="collapse {{ request()->is('ourServices/*') ? 'show' : '' }}">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('categories.index') ? 'active' : '' }}"
                                href=" {{ route('categories.index') }}">
                                डाउनलोड मेनु                   
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('subcategories.index') ? 'active' : '' }}"
                                href="{{ route('subcategories.index') }}">
                                डाउनलोड विवरण  
                            </a>
                        </li>
                    </ul>
                </div>
            </li> 
            
            <!-- मिडिया केन्द्र -->
            <li class="nav-item">
                <a class="nav-link has-arrow {{ request()->is('ourproduct/*') ? '' : 'collapsed' }}"
                    data-bs-toggle="collapse" href="#ourProduct" role="button"
                    aria-expanded="{{ request()->is('ourproduct/*') ? 'true' : 'false' }}" aria-controls="ourProduct">
                    <i data-feather="film" class="nav-icon icon-xs me-2"></i>
                    मिडिया केन्द्र
                </a>
                <div id="ourProduct" class="collapse {{ request()->is('ourproduct/*') ? 'show' : '' }}">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('menu-categories.index') ? 'active' : '' }}"
                                href=" {{ route('menu-categories.index') }}">
                                मिडिया श्रेणी
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('menu-products.index') ? 'active' : '' }}"
                                href="{{ route('menu-products.index') }}">
                                मिडिया विवरण
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- समाचार कतरन -->
            <li class="nav-item">
                <a class="nav-link has-arrow {{ request()->is('service/*') ? '' : 'collapsed' }}"
                    data-bs-toggle="collapse" href="#Servicx" role="button"
                    aria-expanded="{{ request()->is('service/*') ? 'true' : 'false' }}" aria-controls="Servicx">
                    <i data-feather="clipboard" class="nav-icon icon-xs me-2"></i>
                    समाचार क्लिपिङ
                </a>
                <div id="Servicx" class="collapse {{ request()->is('service/*') ? 'show' : '' }}">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('service-categories.index') ? 'active' : '' }}"
                                href="{{ route('service-categories.index') }}">
                                समाचार श्रेणी
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('testpreparation.index') ? 'active' : '' }}"
                                href="{{ route('testpreparation.index') }}">
                                समाचार विवरण
                            </a>
                        </li>
                    </ul>
                </div>
            </li> 
            
            <!-- हाम्रो बारेमा -->
            <li class="nav-item">
                <a class="nav-link has-arrow {{ request()->is(['office-introduction*', 'office-chiefs*']) ? '' : 'collapsed' }}"
                    data-bs-toggle="collapse" href="#aboutUs" role="button"
                    aria-expanded="{{ request()->is(['office-introduction*', 'office-chiefs*']) ? 'true' : 'false' }}"
                    aria-controls="aboutUs">
                    <i data-feather="info" class="nav-icon icon-xs me-2"></i>
                    हाम्रो बारेमा
                </a>
                <div id="aboutUs"
                    class="collapse {{ request()->is(['office-introduction*', 'office-chiefs*', 'team-members*', 'service-processes*', 'rules*', 'organizational-structures*']) ? 'show' : '' }}">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('office-introduction*') ? 'active' : '' }}"
                                href="{{ route('admin.office-introduction.index') }}">
                                कार्यालय परिचय
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('office-chiefs*') ? 'active' : '' }}"
                                href="{{ route('admin.office-chiefs.index') }}">
                                कार्यालय प्रमुखहरू
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('team-members*') ? 'active' : '' }}"
                                href="{{ route('admin.team-members.index') }}">
                                टोली सदस्यहरू
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('service-processes*') ? 'active' : '' }}"
                                href="{{ route('admin.service-processes.index') }}">
                                सेवा प्रक्रियाहरू
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('rules*') ? 'active' : '' }}"
                                href="{{ route('admin.rules.index') }}">
                                नियमहरू र नियमावली
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('organizational-structures*') ? 'active' : '' }}"
                                href="{{ route('admin.organizational-structures.index') }}">
                                संगठनात्मक संरचना
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            <!-- सेवा जानकारी -->
            <li class="nav-item">
                <a class="nav-link has-arrow {{ request()->is(['citizen-charters*']) ? '' : 'collapsed' }}"
                    data-bs-toggle="collapse" href="#service-informatiuion" role="button"
                    aria-expanded="{{ request()->is(['citizen-charters*']) ? 'true' : 'false' }}"
                    aria-controls="service-informatiuion">
                    <i data-feather="help-circle" class="nav-icon icon-xs me-2"></i>
                    सेवा जानकारी
                </a>
                <div id="service-informatiuion"
                    class="collapse {{ request()->is(['citizen-charters*', 'citizen-services*', 'other-services*', 'publication-processes*', 'service-flows*']) ? 'show' : '' }}">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('citizen-charters*') ? 'active' : '' }}"
                                href="{{ route('admin.citizen-charters.index') }}">
                                नागरिक चार्टर
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('citizen-services*') ? 'active' : '' }}"
                                href="{{ route('admin.citizen-services.index') }}">
                                नागरिक सेवाहरू
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('other-services*') ? 'active' : '' }}"
                                href="{{ route('admin.other-services.index') }}">
                                अन्य सेवाहरू
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('publication-processes*') ? 'active' : '' }}"
                                href="{{ route('admin.publication-processes.index') }}">
                                प्रकाशन प्रक्रियाहरू
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('service-flows*') ? 'active' : '' }}"
                                href="{{ route('admin.service-flows.index') }}">
                                सेवा प्रवाहहरू
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            <!-- प्रेस विज्ञप्ति -->
            <li class="nav-item">
                <a class="nav-link has-arrow {{ request()->is('publicationPart/*') ? '' : 'collapsed' }}"
                    data-bs-toggle="collapse" href="#publicationPart" role="button"
                    aria-expanded="{{ request()->is('publicationPart/*') ? 'true' : 'false' }}"
                    aria-controls="publicationPart">
                    <i data-feather="file-text" class="nav-icon icon-xs me-2"></i>
                    प्रेस विज्ञप्ति
                </a>
                <div id="publicationPart" class="collapse {{ request()->is('ourproduct/*') ? 'show' : '' }}">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin.press.index') ? 'active' : '' }}"
                                href=" {{ route('admin.press.index') }}">
                                प्रेस विज्ञप्ति
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>