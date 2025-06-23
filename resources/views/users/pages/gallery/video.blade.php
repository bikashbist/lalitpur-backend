@extends('users.user-dashboard')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
<style>
    .video-gallery {
        padding: 30px 0;
        background-color: #f8f9fa;
    }
    .video-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        background: #fff!important;
        gap: 25px;
    }
    .video-item {
        position: relative;
        border-radius: 8px;
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #fff;
        transition: all 0.3s ease;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    .video-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    .video-thumbnail {
        position: relative;
    }
    .video-thumbnail img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        display: block;
    }
    .play-icon {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 60px;
        height: 60px;
        background: rgba(255,255,255,0.9);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s;
    }
    .play-icon i {
        color: #0d6efd;
        font-size: 24px;
        margin-left: 5px;
        transition: all 0.3s;
    }
    .video-item:hover .play-icon {
        background: rgba(13, 110, 253, 0.9);
    }
    .video-item:hover .play-icon i {
        color: white;
    }
    .video-info {
        padding: 15px;
    }
    .video-info h4 {
        margin-bottom: 8px;
        font-size: 18px;
        color: #333;
        line-height: 1.3;
    }
    .video-meta {
        display: flex;
        justify-content: space-between;
        color: #6c757d;
        font-size: 14px;
    }
    .video-category {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #0d6efd;
        color: white;
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 12px;
    }
    .page-header {
        background-color: #0d6efd;
        color: white;
    }
</style>
@section('content')
<div class="page-header py-lg-4 py-3">
    <div class="container">
        <h1 class="fw-bold fs-2 text-white">
            {{ app()->getLocale() == 'en' ? 'Video Gallery' : 'भिडियो ग्यालेरी' }}
        </h1>
    </div>
</div>
<div class="video-gallery">
    <div class="container">
        <div class="video-container">
            @foreach($videos as $video)
                @if($video->video_url)
                    @php
                        // Extract YouTube video ID
                        $video_id = '';
                        if (preg_match('%(?:youtube(?:nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video->video_url, $match)) {
                            $video_id = $match[1];
                        }
                        $thumbnail_url = $video_id ? "https://img.youtube.com/vi/{$video_id}/hqdefault.jpg" : asset('images/default-video-thumb.jpg');
                    @endphp
                    
                    <div class="video-item">
                        <a class="text-decoration-none" href="{{ $video->video_url }}" data-fancybox="video-gallery" 
                           data-caption="{{ app()->getLocale() == 'en' ? $video->image_name_en : $video->image_name_np }}">
                            <div class="video-thumbnail">
                                <img src="{{ $thumbnail_url }}" 
                                     alt="{{ app()->getLocale() == 'en' ? $video->image_name_en : $video->image_name_np }}">
                                <div class="play-icon">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                            <div class="video-info">
                                <h4>{{ app()->getLocale() == 'en' ? $video->image_name_en : $video->image_name_np }}</h4>
                                <div class="video-meta">
                                    <span>{{ app()->getLocale() == 'en' ? $video->title_en : $video->title_np }}</span>
                                    <span>{{ $video->duration ?? (app()->getLocale() == 'en' ? '00:00' : '००:००') }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
    // Initialize Fancybox
    Fancybox.bind("[data-fancybox]", {
        Thumbs: false,
        Toolbar: {
            display: {
                left: [],
                middle: [],
                right: ["close"],
            },
        },
        // Automatically start playback when opened
        Youtube: {
            noCookie: true,
            rel: 0,
            autoplay: 1
        },
    });
</script>
@endsection