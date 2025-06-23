@extends('users.user-dashboard')

@section('content')
<style>
    .gallery-section {
        padding: 30px 0;
    }
    .gallery-filter {
        margin-bottom: 30px;
        text-align: center;
    }
    .filter-btn {
        background: none;
        border: 1px solid #ddd;
        padding: 8px 20px;
        margin: 0 5px;
        border-radius: 30px;
        transition: all 0.3s;
    }
    .filter-btn.active,
    .filter-btn:hover {
        background: #0d6efd;
        color: white;
        border-color: #0d6efd;
    }
    .gallery-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
    }
    .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s;
    }
    .gallery-item:hover {
        transform: translateY(-5px);
    }
    .gallery-item img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    .gallery-caption {
        padding: 10px;
        background: white;
    }
    .gallery-caption h5 {
        margin-bottom: 5px;
    }
</style>

<div class="page-header py-lg-4 py-3">
    <div class="container">
        <h1 class="fw-bold fs-2 text-white">
            {{ app()->getLocale() == 'en' ? 'Photo Gallery' : 'फोटो ग्यालेरी' }}
        </h1>
    </div>
</div>

<div class="gallery-section">
    <div class="container">
       

        <div class="gallery-container">
            @foreach($galleries as $gallery)
                @if($gallery->image_path)
                    <div class="gallery-item" data-category="{{ $gallery->type }}">
                        <a class="text-decoration-none" href="{{ asset($gallery->image_path) }}" data-fancybox="gallery">
                            <img src="{{ asset($gallery->image_path) }}" 
                                 alt="{{ app()->getLocale() == 'en' ? $gallery->image_name_en : $gallery->image_name_np }}">
                            <div class="gallery-caption">
                                <h5>{{ app()->getLocale() == 'en' ? $gallery->image_name_en : $gallery->image_name_np }}</h5>
                                <p class="text-muted">
                                    {{ app()->getLocale() == 'en' ? $gallery->title_en : $gallery->title_np }}
                                </p>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>

    
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
    Fancybox.bind("[data-fancybox]", {});
</script>
@endsection