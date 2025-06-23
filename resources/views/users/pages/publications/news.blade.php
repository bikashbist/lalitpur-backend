@extends('users.user-dashboard')

@section('content')
    <div class="page-header py-lg-4 py-3">
        <div class="container">
            <h1 class="fw-bold fs-2 text-white">समाचार</h1>
        </div>
    </div>

    <div class="content-section my-lg-5 my-3">
        <div class="container">
            <div class="row">
                @foreach ($blogs as $blog)
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
                                {{-- <p class="text-muted">
                                            {{ app()->getLocale() == 'en' ? $blog->sub_title_en : $blog->sub_title_np }}
                                        </p> --}}
                                <div class="d-flex justify-content-between mt-3 ">
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
    </div>
@endsection
