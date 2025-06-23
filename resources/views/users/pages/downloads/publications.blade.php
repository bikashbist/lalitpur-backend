@extends('users.user-dashboard')

@section('content')
    <div class="page-header py-lg-4 py-3">
        <div class="container">
            <h1 class="fw-bold fs-2 text-white">कार्यालयको परिचय</h1>

        </div>
    </div>

    <div class="publications-section py-5">
        <div class="container">
            <div class="section-header text-center mb-5">
                <h1 class="fw-bold text-primary">प्रकाशनहरू</h1>
                <p class="lead">पर्यटन सम्बन्धी विभिन्न प्रकाशनहरू तल उपलब्ध छन्।</p>
            </div>

            <div class="publications-tabs mb-5">
                <ul class="nav nav-tabs justify-content-center" id="publicationsTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="books-tab" data-bs-toggle="tab" data-bs-target="#books"
                            type="button">पुस्तकहरू</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="brochures-tab" data-bs-toggle="tab" data-bs-target="#brochures"
                            type="button">ब्रोसरहरू</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="guidelines-tab" data-bs-toggle="tab" data-bs-target="#guidelines"
                            type="button">निर्देशिकाहरू</button>
                    </li>
                </ul>
            </div>

            <div class="tab-content" id="publicationsTabContent">
                <!-- Books Tab -->
                <div class="tab-pane fade show active" id="books" role="tabpanel">
                    <div class="row">
                        @foreach ($books as $book)
                            <div class="col-md-4 mb-4">
                                <div class="card publication-card h-100">
                                    <div class="publication-cover">
                                        <img src="{{ asset('storage/' . $book->cover_image) }}" class="card-img-top"
                                            alt="{{ $book->title }}">
                                    </div>
                                    <div class="card-body">
                                        <h3 class="h5">{{ $book->title }}</h3>
                                        <p class="text-muted small">{{ $book->author }}</p>
                                        <p class="publication-description small">{{ Str::limit($book->description, 100) }}
                                        </p>
                                    </div>
                                    <div class="card-footer bg-transparent">
                                        <a href="{{ route('download.file', $book->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-download me-1"></i>डाउनलोड
                                        </a>
                                        <a href="{{ route('publication.detail', $book->id) }}"
                                            class="btn btn-outline-primary btn-sm ms-2">
                                            <i class="fas fa-info-circle me-1"></i>विवरण
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Other tabs would follow the same pattern -->
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $books->links() }}
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .publications-section {
            background-color: #f8f9fa;
            min-height: calc(100vh - 150px);
        }

        .publication-card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .publication-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .publication-cover {
            height: 200px;
            overflow: hidden;
            background: #eee;
        }

        .publication-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .publication-card:hover .publication-cover img {
            transform: scale(1.05);
        }

        .publication-description {
            color: #666;
            min-height: 40px;
        }

        .nav-tabs .nav-link {
            color: #555;
            font-weight: 500;
        }

        .nav-tabs .nav-link.active {
            color: #0d6efd;
            border-bottom: 3px solid #0d6efd;
        }
    </style>
@endpush
