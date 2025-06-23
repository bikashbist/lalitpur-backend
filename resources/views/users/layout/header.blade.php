<div class="top-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="social-icons">
                    <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="youtube"><i class="fab fa-youtube"></i></a>
                    <a href="#" class="rss"><i class="fas fa-rss"></i></a>
                    <span class="ms-3 text-white" style="font-size: 11px;">{{ now()->format('F d, Y') }}</span>
                </div>
            </div>
            <div class="col-md-6 text-end">
                <div class="top-links">
                    <a class="text-white {{ app()->getLocale() === 'en' ? 'active' : '' }}" href="{{ route('language.switch', 'en') }}">English  <img height="10" src="{{ asset('tourism/images/us.webp') }}" alt="US Flag" class="ms-2"></a>
                    <a class="text-white {{ app()->getLocale() === 'np' ? 'active' : '' }}" href="{{ route('language.switch', 'np') }}">नेपाली   <img height="10" src="{{ asset('tourism/images/flag-nepal.gif') }}" alt="nepali flag" class="ms-2"></a>
                    
                   
                  
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Header -->
<header class="main-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-1">
                <img src="{{ asset('tourism/images/cropped-logo.png') }}" alt="Logo" class="logo-left img-fluid"
                    style="object-fit: contain;">
            </div>
            <div class="col-md-4">
                <div class="org-title text-start">
                    @if(app()->getLocale() === 'np')
                        <h2>ललितपुर महानगरपालिका</h2>
                        <h1>बागमती प्रदेश, पुल्चोक, ललितपुर</h1>
                    @else
                        <h2>Lalitpur Metropolitan City</h2>
                        <h1>Bagmati Province, Pulchok, Lalitpur</h1>
                    @endif
                </div>
            </div>
            <div class="col-md-7 text-end">
                <img src="{{ asset('tourism/images/flag-nepal.gif') }}" alt="Nepal Emblem" class="logo-right img-fluid">
            </div>
        </div>
    </div>
</header>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav w-100">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.home') }}">@lang('navbar.home')</a>
                </li>
                
                <!-- About Us Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{ route('user.about-us') }}" id="aboutDropdown">
                        @lang('navbar.about_us')
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
                        <li><a class="dropdown-item" href="{{ route('user.office-introduction') }}">@lang('navbar.office_introduction')</a></li>
                        <li><a class="dropdown-item" href="{{ route('user.office-head') }}">@lang('navbar.office_head')</a></li>
                        <li><a class="dropdown-item" href="{{ route('user.organizational-structure') }}">@lang('navbar.organizational_structure')</a></li>
                        <li><a class="dropdown-item" href="{{ route('user.our-team') }}">@lang('navbar.our_team')</a></li>
                        <li><a class="dropdown-item" href="{{ route('user.service-receipt-method') }}">@lang('navbar.service_receipt_method')</a></li>
                        <li><a class="dropdown-item" href="{{ route('user.regulations') }}">@lang('navbar.regulations')</a></li>
                    </ul>
                </li>

                <!-- Services Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{ route('user.services') }}" id="servicesDropdown">
                        @lang('navbar.services')
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                        <li><a class="dropdown-item" href="{{ route('user.service-flow') }}">@lang('navbar.service_flow')</a></li>
                        <li><a class="dropdown-item" href="{{ route('user.citizen-charter') }}">@lang('navbar.citizen_charter')</a></li>
                        <li><a class="dropdown-item" href="{{ route('user.civil-service') }}">@lang('navbar.civil_service')</a></li>
                        <li><a class="dropdown-item" href="{{ route('user.publication-permission') }}">@lang('navbar.publication_permission')</a></li>
                        <li><a class="dropdown-item" href="{{ route('user.other-services') }}">@lang('navbar.other_services')</a></li>
                    </ul>
                </li>

                <!-- Publications Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{ route('user.publications') }}" id="publicationsDropdown">
                        @lang('navbar.publications')
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="publicationsDropdown">
                        <li><a class="dropdown-item" href="{{ route('user.news') }}">@lang('navbar.news')</a></li>
                        <li><a class="dropdown-item" href="{{ route('user.information-and-press-releases') }}">@lang('navbar.information_and_press_releases')</a></li>
                        <li><a class="dropdown-item" href="{{ route('user.statistics') }}">@lang('navbar.statistics')</a></li>
                        <li><a class="dropdown-item" href="{{ route('user.annual-report') }}">@lang('navbar.annual_report')</a></li>
                        <li><a class="dropdown-item" href="{{ route('user.other-publications') }}">@lang('navbar.other_publications')</a></li>
                    </ul>
                </li>

                <!-- Resources Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{ route('user.resources') }}" id="resourcesDropdown">
                        @lang('navbar.resources')
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="resourcesDropdown">
                        <li><a class="dropdown-item" href="{{ route('user.laws') }}">@lang('navbar.laws')</a></li>
                        {{-- <li><a class="dropdown-item" href="{{ route('user.regulations_resources') }}">@lang('navbar.regulations_resources')</a></li> --}}
                        <li><a class="dropdown-item" href="{{ route('user.guidelines') }}">@lang('navbar.guidelines')</a></li>
                        <li><a class="dropdown-item" href="{{ route('user.process') }}">@lang('navbar.process')</a></li>
                        <li><a class="dropdown-item" href="{{ route('user.forms') }}">@lang('navbar.forms')</a></li>
                    </ul>
                </li>

                <!-- Gallery Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{ route('user.gallery') }}" id="galleryDropdown">
                        @lang('navbar.gallery')
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="galleryDropdown">
                        <li><a class="dropdown-item" href="{{ route('user.photo-gallery') }}">@lang('navbar.photo_gallery')</a></li>
                        <li><a class="dropdown-item" href="{{ route('user.video-gallery') }}">@lang('navbar.video_gallery')</a></li>
                    </ul>
                </li>

                <!-- Media Center Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{ route('user.media-center') }}" id="mediaDropdown">
                        @lang('navbar.media_center')
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="mediaDropdown">
                        <li><a class="dropdown-item" href="{{ route('user.press-releases') }}">@lang('navbar.press_releases')</a></li>
                        <li><a class="dropdown-item" href="{{ route('user.news-clippings') }}">@lang('navbar.news_clippings')</a></li>
                        <li><a class="dropdown-item" href="{{ route('user.media-coverage') }}">@lang('navbar.media_coverage')</a></li>
                    </ul>
                </li>

                <!-- Downloads Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{ route('user.downloads') }}" id="downloadsDropdown">
                        @lang('navbar.downloads')
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="downloadsDropdown">
                        <li><a class="dropdown-item" href="{{ route('user.download-forms') }}">@lang('navbar.download_forms')</a></li>
                        <li><a class="dropdown-item" href="{{ route('user.download-reports') }}">@lang('navbar.download_reports')</a></li>
                        <li><a class="dropdown-item" href="{{ route('user.download-publications') }}">@lang('navbar.download_publications')</a></li>
                        <li><a class="dropdown-item" href="{{ route('user.other-files') }}">@lang('navbar.other_files')</a></li>
                    </ul>
                </li>

                <!-- Contact -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.contact') }}">@lang('navbar.contact')</a>
                </li>
            </ul>
        </div>
    </div>
</nav>