@extends('users.user-dashboard')

@section('content')
    <div class="page-header py-lg-4 py-3">
        <div class="container">
            <h1 class="fw-bold fs-2 text-white">कार्यालयको परिचय</h1>

        </div>
    </div>

    <div class="reports-section py-5">
        <div class="container">
            <div class="section-header text-center mb-5">
                <h1 class="fw-bold text-primary">प्रतिवेदनहरू</h1>
                <p class="lead">पर्यटन कार्यालय ललितपुरले प्रकाशित गरेका विभिन्न प्रतिवेदनहरू तल उपलब्ध छन्।</p>
            </div>

            <div class="year-filter mb-5 text-center">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-outline-primary year-filter-btn active"
                        data-year="all">सबै</button>
                    @foreach ($years as $year)
                        <button type="button" class="btn btn-outline-primary year-filter-btn"
                            data-year="{{ $year }}">{{ $year }}</button>
                    @endforeach
                </div>
            </div>

            <div class="reports-list">
                <div class="row">
                    @foreach ($reports as $report)
                        <div class="col-md-6 col-lg-4 mb-4 report-item" data-year="{{ $report->year }}">
                            <div class="card report-card h-100">
                                <div class="card-header bg-primary text-white">
                                    <h3 class="h5 mb-0">{{ $report->title }}</h3>
                                </div>
                                <div class="card-body">
                                    <div class="report-meta mb-3">
                                        <span class="badge bg-secondary me-2">{{ $report->year }}</span>
                                        <span class="text-muted"><i
                                                class="far fa-file-pdf me-1"></i>{{ $report->file_size }} MB</span>
                                    </div>
                                    <p class="report-description">{{ $report->description }}</p>
                                </div>
                                <div class="card-footer bg-transparent">
                                    <a href="{{ route('download.file', $report->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-download me-1"></i>डाउनलोड
                                    </a>
                                    <button class="btn btn-outline-primary btn-sm ms-2 preview-btn" data-bs-toggle="modal"
                                        data-bs-target="#previewModal"
                                        data-url="{{ asset('storage/' . $report->file_path) }}">
                                        <i class="fas fa-eye me-1"></i>पूर्वावलोकन
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $reports->links() }}
            </div>
        </div>
    </div>

    <!-- Preview Modal (Same as forms page) -->
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Year filter functionality
            $('.year-filter-btn').on('click', function() {
                $('.year-filter-btn').removeClass('active');
                $(this).addClass('active');

                const year = $(this).data('year');
                if (year === 'all') {
                    $('.report-item').show();
                } else {
                    $('.report-item').hide();
                    $(`.report-item[data-year="${year}"]`).show();
                }
            });
        });
    </script>
@endpush

@push('styles')
    <style>
        .reports-section {
            background-color: #f8f9fa;
            min-height: calc(100vh - 150px);
        }

        .report-card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .report-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .report-description {
            color: #555;
            font-size: 0.9rem;
        }

        .year-filter {
            overflow-x: auto;
            white-space: nowrap;
            padding-bottom: 10px;
        }

        .year-filter-btn {
            border-radius: 20px !important;
            margin: 0 3px;
        }
    </style>
@endpush
