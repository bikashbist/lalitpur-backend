@extends('users.user-dashboard')

@section('content')
    <div class="page-header py-lg-4 py-3 bg-primary text-white">
        <div class="container">
            <h1 class="fw-bold fs-2">प्रेस विज्ञप्तिहरू</h1>
        </div>
    </div>

    <div class="content-section my-lg-5 my-3">
        <div class="container">
            <div class="row">
                @forelse ($releases as $item)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="card h-100 shadow-sm border-1">
                            <div class="card-body d-flex flex-column">
                                <div class="mb-2 text-muted small">
                                    <i class="fas fa-calendar-alt me-2"></i>
                                    {{ \Carbon\Carbon::parse($item->date)->format('Y F d') }}
                                </div>

                                <h5 class="fw-bold text-dark">{{ $item->title }}</h5>
                                
                                <div class="mt-2 text-body">
                                    <p>{!! Str::limit(strip_tags($item->content), 120) !!}</p>
                                </div>

                                @if($item->file_path)
                                    <div class="mt-auto">
                                        <embed src="{{ asset($item->file_path) }}" type="application/pdf" width="100%" height="150px" class="rounded border" />
                                        <a href="{{ asset($item->file_path) }}" class="btn btn-outline-primary btn-sm mt-2 w-100" download>
                                            <i class="fas fa-download"></i> डाउनलोड गर्नुहोस् (PDF)
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center">प्रेस विज्ञप्तिहरू उपलब्ध छैनन्।</div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
