@extends('users.user-dashboard')

@section('content')
    <div class="page-header py-lg-4 py-3">
        <div class="container">
            <h1 class="fw-bold fs-2 text-white">{{ $release->title }}</h1>
        </div>
    </div>

    <div class="content-section my-5">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="text-muted mb-3">{{ \Carbon\Carbon::parse($release->date)->format('Y F d') }}</div>
                    <div class="press-content">
                        {!! $release->content !!}
                    </div>

                    @if($release->file_path)
                        <div class="mt-4">
                            <a href="{{ asset($release->file_path) }}" class="btn btn-outline-primary" download>
                                डाउनलोड गर्नुहोस् (PDF)
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
