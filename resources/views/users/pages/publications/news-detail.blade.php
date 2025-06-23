@extends('users.user-dashboard')

@section('content')
    <div class="page-header py-lg-4 py-3">
        <div class="container">
            <h1 class="fw-bold fs-2 text-white">समाचार विवरण</h1>
        </div>
    </div>
    <div class="content-section my-lg-5 my-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="news-detail">
                        <div class="news-date mb-3">{{ $news->date->format('Y-m-d') }}</div>
                        <h2 class="news-title mb-4">{{ $news->title_ne }}</h2>
                        <div class="news-content mb-4">
                            {!! nl2br(e($news->content_ne)) !!}
                        </div>
                        @if($news->file_path)
                        <div class="mb-4">
                            <a href="{{ Storage::url($news->file_path) }}" class="btn btn-primary" download>
                                Download Attachment
                            </a>
                        </div>
                        @endif
                        <a href="{{ route('news') }}" class="btn btn-secondary">Back to News</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection