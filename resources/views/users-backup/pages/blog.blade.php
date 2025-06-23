

@extends('users.user-dashboard')

@section('content')

@if ($banner)
<div class="inner-banner d-flex align-items-center py-5" style="background-image: url('{{ asset($banner->image) }}')">
    <div class="container  h-100 px-lg-5 px-4">
        <div class="inner-banner__content ">

            <div class="inner-banner__content__title">
                <h1 class="mb-lg-4 mb-3">Our Blogs</h1>

                <nav aria-label="breadcrumb ">
                    <ol class="breadcrumb pb-0 mb-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Our Blogs</li>
                    </ol>
                </nav>
            </div>


        </div>
    </div>
</div>
@endif

<div class="inner-main-content py-lg-4 py-3">
    <section class="blog-section">
        <div class="container">
          
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
         
        </div>
    </section>
</div>

@endsection






