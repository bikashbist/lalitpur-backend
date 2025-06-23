@extends('users.user-dashboard')

@section('content')
<style>
    /* resources/css/app.css */
.blog-post {
    line-height: 1.8;
}

.blog-post .featured-image {
    max-height: 500px;
    overflow: hidden;
    border-radius: 8px;
}

.blog-post .post-content {
    font-size: 1.1rem;
}

.blog-post .post-content img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin: 1rem 0;
}

.related-post img {
    border-radius: 4px;
}
</style>

<div class="page-header py-lg-4 py-3">
    <div class="container">
        <h1 class="fw-bold fs-2 text-white"> {{ app()->getLocale() == 'en' ? $blog->title_en : $blog->title_np }}</h1>
    </div>
</div>
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Blog Post Content -->
            <article class="blog-post">
                <!-- Featured Image -->
                <div class="featured-image mb-4">
                    <img src="{{ asset($blog->image_path) }}" 
                         alt="{{ app()->getLocale() == 'en' ? $blog->title_en : $blog->title_np }}" 
                         class="img-fluid rounded">
                </div>
                
                <!-- Post Meta -->
                <div class="post-meta mb-4">
                    <span class="text-muted">
                        <i class="far fa-calendar-alt"></i> 
                        {{ $blog->created_at->format('F j, Y') }}
                    </span>
                    <span class="mx-2">|</span>
                    <span class="badge bg-primary">
                        {{ $blog->is_active ? __('Active') : __('Inactive') }}
                    </span>
                </div>
                
                <!-- Title -->
                <h1 class="mb-3">
                    {{ app()->getLocale() == 'en' ? $blog->title_en : $blog->title_np }}
                </h1>
                
                <!-- Subtitle -->
                <h4 class="text-muted mb-4">
                    {{ app()->getLocale() == 'en' ? $blog->sub_title_en : $blog->sub_title_np }}
                </h4>
                
                <!-- Content -->
                <div class="post-content">
                    {!! app()->getLocale() == 'en' ? $blog->description_en : $blog->description_np !!}
                </div>
            </article>
            
            <!-- Share Buttons (Optional) -->
            {{-- <div class="share-buttons mt-5 pt-4 border-top">
                <h5>{{ __('Share this post') }}:</h5>
                <div class="d-flex gap-3 mt-3">
                    <a href="#" class="btn btn-sm btn-outline-primary">
                        <i class="fab fa-facebook-f"></i> Facebook
                    </a>
                    <a href="#" class="btn btn-sm btn-outline-info">
                        <i class="fab fa-twitter"></i> Twitter
                    </a>
                    <a href="#" class="btn btn-sm btn-outline-danger">
                        <i class="fab fa-instagram"></i> Instagram
                    </a>
                </div>
            </div> --}}
        </div>
        
        <!-- Sidebar with Related Posts -->
        <div class="col-lg-4">
            <div class="sidebar">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">{{ __('Related Posts') }}</h5>
                    </div>
                    <div class="card-body">
                        @foreach($relatedBlogs as $related)
                        <div class="related-post mb-3">
                            <a href="{{ route('blog.show', $related->slug) }}" class="d-flex gap-3 text-decoration-none">
                                <img src="{{ asset($related->image_path) }}" 
                                     alt="{{ app()->getLocale() == 'en' ? $related->title_en : $related->title_np }}"
                                     width="80" height="80" style="object-fit: cover;">
                                <div>
                                    <h6 class="mb-1">
                                        {{ app()->getLocale() == 'en' ? $related->title_en : $related->title_np }}
                                    </h6>
                                    <small class="text-muted">
                                        {{ $related->created_at->format('M d, Y') }}
                                    </small>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Categories Widget (Optional) -->
                {{-- <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">{{ __('Categories') }}</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="#" class="text-decoration-none">Culture</a>
                                <span class="badge bg-primary rounded-pill">14</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="#" class="text-decoration-none">Tourism</a>
                                <span class="badge bg-primary rounded-pill">8</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="#" class="text-decoration-none">Events</a>
                                <span class="badge bg-primary rounded-pill">5</span>
                            </li>
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection