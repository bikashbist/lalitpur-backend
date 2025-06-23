@extends('users.user-dashboard')

@section('content')
    <div class="news-ticker">

        <div class="ticker-content">
            @foreach ($blogs->where('category', 'news')->take(10) as $blog)
                <a class="text-white text-decoration-none" href="{{ route('news.show', $blog->slug) }}" class="ticker-item">
                    <strong>{{ app()->getLocale() == 'en' ? $blog->title_en : $blog->title_np }}</strong>
                </a>&nbsp;&nbsp;&nbsp;
            @endforeach

        </div>


    </div>
    <!-- News Ticker -->
    <div class="banner-part">
        <div class="hero-slider">
            <div class="owl-carousel owl-theme" id="heroCarousel">
                @foreach ($banners as $banner)
                    <div class="slide-item" style="background-image: url('{{ asset($banner->image) }}');">
                        <div class="slide-overlay">
                            <div class="container">
                                @if (app()->getLocale() == 'en')
                                    <div class="slide-title">{{ $banner->image_name_en }}</div>
                                @else
                                    <div class="slide-title">{{ $banner->image_name_np }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="team-lalitpur">
        <div class="container-fluid">
            <div class="row g-4 align-items-center">
                <!-- Team Members -->
                <div class="col-md-7">
                    <div class="row justify-content-end">
                        <div class="col-md-9">
                            <div class="row g-3">
                                @foreach ($regularMembers as $member)
                                    <div class="col-md-4 team-card">
                                        <img src="{{ asset($member->image_path) }}"
                                            alt="{{ app()->getLocale() == 'en' ? $member->name_en : $member->name_np }}" />
                                        <h6>{{ app()->getLocale() == 'en' ? $member->name_en : $member->name_np }}</h6>
                                        <p>{{ app()->getLocale() == 'en' ? $member->position_en : $member->position_np }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Spokesperson -->
                <div class="col-md-5">
                    <div class="spokesperson">
                        <h5 class="mb-3">{{ app()->getLocale() == 'en' ? 'Spokesperson' : 'प्रवक्ता' }}</h5>

                        <div class="owl-carousel owl-theme">
                            @foreach ($regularMembers as $member)
                                <div class="item d-flex gap-3 justify-content-start">
                                    <div>
                                        <img src="{{ asset($member->image_path) }}"
                                            alt="{{ app()->getLocale() == 'en' ? $member->name_en : $member->name_np }}" />
                                    </div>
                                    <div>
                                        <h5 class="mt-3">
                                            {{ app()->getLocale() == 'en' ? $member->name_en : $member->name_np }}</h5>
                                        <p>{{ app()->getLocale() == 'en' ? $member->position_en : $member->position_np }}
                                        </p>
                                        <p>{{ __('Phone') }}: {{ $member->phone }}</p>
                                        <p>{{ __('Email') }}: {{ $member->email }}</p>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="press-release mt-3">
        <div class="container px-lg-5 py-0">
            <div class="col-12 py-4 section-title-press">
                <h2>@lang('message.PressRelease')</h2>
            </div>
            <!-- News Tabs -->
            <div class="news-tabs">
                <ul class="nav nav-tabs" id="newsTabs">
                    @foreach (\App\Models\Blog::getCategories() as $key => $category)
                        <li class="nav-item">
                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab"
                                href="#{{ $key }}">
                                {{ $category[app()->getLocale()] ?? $category['np'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- News Content -->
            <div class="tab-content mt-3">
                @foreach (\App\Models\Blog::getCategories() as $key => $category)
                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $key }}">
                        <div class="row">
                            @foreach ($blogs->where('category', $key)->sortByDesc('created_at')->take(8) as $blog)
                                <div class="col-lg-3 col-md-4 col-12 mb-4">
                                    <div class="news-card">
                                        <div class="news-image">
                                            <img src="{{ asset($blog->image_path) }}"
                                                alt="{{ app()->getLocale() == 'en' ? $blog->title_en : $blog->title_np }}"
                                                class="w-100 h-100" style="object-fit: cover;">
                                            <div class="news-date">{{ $blog->created_at->format('F j, Y') }}</div>
                                        </div>
                                        <div class="news-content p-3">
                                            <h5>{{ app()->getLocale() == 'en' ? $blog->title_en : $blog->title_np }}</h5>
                                            <div class="d-flex justify-content-between mt-3">
                                                <a href="{{ route('news.show', $blog->slug) }}" class="view-all-btn">
                                                    {{ __('थप हेर्नुहोस्') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Hero Section -->
    <!-- Discover Places Section -->
    <div class="discover-section">
        <div class="container px-lg-5 py-0">
            @if ($oldestVideo)
                @php
                    // Extract YouTube video ID
                    $video_id = '';
                    if (
                        preg_match(
                            '%(?:youtube(?:nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i',
                            $oldestVideo->video_url,
                            $match,
                        )
                    ) {
                        $video_id = $match[1];
                    }
                    $thumbnail_url = $video_id
                        ? "https://img.youtube.com/vi/{$video_id}/maxresdefault.jpg"
                        : asset('tourism/images/3.webp');
                @endphp

                <div class="discover-video"
                    style="background-image: url('{{ $thumbnail_url }}'); 
                       object-fit: cover; 
                       background-repeat: no-repeat; 
                       background-size: cover;
                       background-position: center;">
                    <!-- Fancybox link (hidden) -->
                    <a data-fancybox href="{{ $oldestVideo->video_url }}" id="video-link" style="display: none;"></a>

                    <!-- Play button that triggers the Fancybox -->
                    <div class="play-btn" onclick="document.getElementById('video-link').click()">
                        <i class="fas fa-play"></i>
                    </div>
                </div>
            @else
                <!-- Fallback if no videos exist -->
                <div class="discover-video"
                    style="background-image: url('{{ asset('tourism/images/3.webp') }}'); 
                       object-fit: cover; 
                       background-repeat: no-repeat; 
                       background-size: cover;">
                    <a data-fancybox href="https://www.youtube.com/watch?v=PE3pO9hO2q4" id="video-link"
                        style="display: none;"></a>

                    <div class="play-btn" onclick="document.getElementById('video-link').click()">
                        <i class="fas fa-play"></i>
                    </div>
                </div>
            @endif
        </div>
    </div>



    <!-- Places to See Section -->
    <div class="places-section" id="places">
        <div class="container px-lg-5 py-0">
            <div class="col-12 section-title-press">
                <div class="places-header">
                    <h2> हेर्नैपर्ने स्थानहरू </h2>
                    <a class="view-all-btn" href="{{ route('user.photo-gallery') }}">थप हेर्नुहोस्</a>

                </div>
            </div>

            <div class="places-grid">
                @forelse($galleries as $gallery)
                    @if ($gallery->image_path)
                        <div class="place-card" style="background-image: url('{{ asset($gallery->image_path) }}');">
                            <div class="place-overlay">
                                <div class="place-title">
                                    {{ app()->getLocale() == 'en' ? $gallery->image_name_en : $gallery->image_name_np }}
                                </div>
                                <div class="place-subtitle text-white">
                                    {{ app()->getLocale() == 'en' ? $gallery->title_en : $gallery->title_np }}
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                    <p class="text-white">हाल कुनै स्थान उपलब्ध छैन।</p>
                @endforelse
            </div>
        </div>
    </div>

    <section class="hero-section">
        <div class="container px-lg-5 py-0">
            <div class="row">


                <div class="row">
                    <div class="col-lg-8">
                        <div class="col-12 section-title-press">
                            <h2>प्रकाशन</h2>
                        </div>

                        <!-- Main Content -->
                        <div class="content-area">



                            <!-- Tourism Documents Section -->
                            <div class="mt-4">
                                <div class="row">
                                    <div class="row">
                                        @foreach ($documents as $document)
                                            <div class="col-md-3 mb-4">
                                                <div class="document-card text-center">

                                                    {{-- Preview Box --}}
                                                    <div class="document-preview-box mb-2"
                                                        style="height: 130px; display: flex; align-items: center; justify-content: center; overflow: hidden; background: #f9f9f9; border-radius: 5px;">
                                                        @if ($document->image_path && file_exists(public_path($document->image_path)))
                                                            <img src="{{ asset($document->image_path) }}"
                                                                alt="Document Image"
                                                                style="max-height: 100%; max-width: 100%; object-fit: contain;">
                                                        @else
                                                            <i class="fas fa-file-pdf fa-4x text-danger"></i>
                                                        @endif
                                                    </div>

                                                    {{-- Title --}}
                                                    <div class="document-title text-dark fw-bold">
                                                        {{ app()->getLocale() == 'en' ? $document->name_en : $document->name_np }}
                                                    </div>

                                                    {{-- Date --}}
                                                    <div class="document-date mb-2 text-muted" style="font-size: 13px;">
                                                        {{ \Carbon\Carbon::parse($document->created_at)->format('F d, Y') }}
                                                    </div>

                                                    {{-- Action Button --}}
                                                    @if ($document->pdf_path && file_exists(public_path($document->pdf_path)))
                                                        <a href="{{ asset($document->pdf_path) }}" target="_blank"
                                                            class="btn btn-outline-danger btn-sm w-100">
                                                            <i class="fas fa-file-pdf"></i> {{ __('View PDF') }}
                                                        </a>
                                                    @elseif ($document->image_path && file_exists(public_path($document->image_path)))
                                                        <a href="{{ asset($document->image_path) }}" target="_blank"
                                                            class="btn btn-outline-primary btn-sm w-100">
                                                            <i class="fas fa-eye"></i> {{ __('Preview') }}
                                                        </a>
                                                    @endif

                                                </div>
                                            </div>
                                        @endforeach




                                    </div>


                                </div>
                            </div>

                            <!-- Video Section -->
                            <div class="video-lalitpur">

                                <div class="row">
                                    <div class="col-12 section-title-press">
                                        <h2>अडियो भिजुअल</h2>
                                    </div>

                                    @foreach ($latestVideos as $video)
                                        @php
                                            // Extract YouTube video ID
                                            $video_id = '';
                                            if (
                                                preg_match(
                                                    '%(?:youtube(?:nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i',
                                                    $video->video_url,
                                                    $match,
                                                )
                                            ) {
                                                $video_id = $match[1];
                                            }

                                            $embed_url = $video_id ? "https://www.youtube.com/embed/{$video_id}" : '';
                                        @endphp

                                        <div class="col-lg-4">
                                            <div class="video-section">
                                                <div class="video-container">
                                                    @if ($embed_url)
                                                        <iframe width="100%" height="200" src="{{ $embed_url }}"
                                                            frameborder="0" allowfullscreen
                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
                                                        </iframe>
                                                    @else
                                                        <div style="background-color: #000; width: 100%; height: 200px;">
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="mt-2 text-white">
                                                    <small>{{ $video->title }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="sidebar mt-3">
                            <div class="sidebar-section">
                                <div class="sidebar-title">हाइलाइटहरू</div>
                                <ul>
                                    @forelse($highlightBlogs as $highlight)
                                        <li>
                                            <a href="{{ route('news.show', $highlight->slug) }}">
                                                {{ app()->getLocale() == 'en' ? $highlight->title_en : $highlight->title_np }}
                                            </a>
                                            <span>
                                                Posted date:
                                                {{ \Carbon\Carbon::parse($highlight->created_at)->format('Y/m/d H:i:s') }}
                                            </span>
                                        </li>
                                    @empty
                                        <li>{{ app()->getLocale() == 'en' ? 'No highlights found.' : 'कुनै हाइलाइट फेला परेन।' }}
                                        </li>
                                    @endforelse
                                </ul>

                                <a href="{{ route('user.news') }}" class="view-all-btn text-white text-decoration-none">
                                    {{ app()->getLocale() == 'en' ? 'View more highlights' : 'थप समाचार हेर्नुहोस्' }}
                                </a>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </section>
@endsection
