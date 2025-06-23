@extends('users.user-dashboard')



@section('content')
<div class="page-header py-lg-4 py-3">
        <div class="container">
            <h1 class="fw-bold fs-2 text-white">कार्यालयको परिचय</h1>

        </div>
    </div>
<div class="downloads-section py-5">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h1 class="fw-bold text-primary">फारमहरू</h1>
            <p class="lead">पर्यटन सम्बन्धी आवश्यक फारमहरू तल देखाइएको छ। तपाईंले चाहिएको फारम डाउनलोड गर्न सक्नुहुन्छ।</p>
        </div>

        <div class="search-filter mb-5">
            <div class="row">
                <div class="col-md-8 mb-3">
                    <input type="text" class="form-control form-control-lg" placeholder="फारम खोज्नुहोस्..." id="formSearch">
                </div>
                <div class="col-md-4 mb-3">
                    <select class="form-select form-select-lg" id="formCategory">
                        <option value="">सबै श्रेणी</option>
                        <option value="license">लाइसेन्स सम्बन्धी</option>
                        <option value="registration">दर्ता सम्बन्धी</option>
                        <option value="complaint">शिकायत सम्बन्धी</option>
                        <option value="permission">अनुमति सम्बन्धी</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="forms-list">
            <div class="row">
                @foreach($forms as $form)
                <div class="col-md-6 col-lg-4 mb-4 form-item" data-category="{{ $form->category }}">
                    <div class="card form-card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="form-badge bg-primary text-white rounded-pill px-3 py-1">{{ $form->category_name }}</div>
                                <div class="form-format text-muted"><i class="fas fa-file-pdf me-1"></i>PDF</div>
                            </div>
                            <h3 class="form-title h5">{{ $form->name }}</h3>
                            <p class="form-description text-muted small">{{ $form->description }}</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div class="form-size text-muted small">{{ $form->file_size }} MB</div>
                                <div class="download-actions">
                                    <a href="{{ route('download.file', $form->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-download me-1"></i>डाउनलोड
                                    </a>
                                    <button class="btn btn-sm btn-outline-secondary preview-btn" data-bs-toggle="modal" data-bs-target="#previewModal" data-url="{{ asset('storage/'.$form->file_path) }}">
                                        <i class="fas fa-eye me-1"></i>पूर्वावलोकन
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $forms->links() }}
        </div>
    </div>
</div>

<!-- Preview Modal -->
<div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="previewModalLabel">फारम पूर्वावलोकन</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe id="previewFrame" src="" style="width:100%; height:70vh;" frameborder="0"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">बन्द गर्नुहोस्</button>
                <a href="#" id="downloadFromPreview" class="btn btn-primary">
                    <i class="fas fa-download me-1"></i>डाउनलोड गर्नुहोस्
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Form search functionality
        $('#formSearch').on('keyup', function() {
            const searchText = $(this).val().toLowerCase();
            $('.form-item').each(function() {
                const formText = $(this).text().toLowerCase();
                $(this).toggle(formText.includes(searchText));
            });
        });

        // Form category filter
        $('#formCategory').on('change', function() {
            const category = $(this).val();
            if (category) {
                $('.form-item').hide();
                $(`.form-item[data-category="${category}"]`).show();
            } else {
                $('.form-item').show();
            }
        });

        // Preview modal
        $('.preview-btn').on('click', function() {
            const fileUrl = $(this).data('url');
            $('#previewFrame').attr('src', `https://docs.google.com/viewer?url=${encodeURIComponent(fileUrl)}&embedded=true`);
            $('#downloadFromPreview').attr('href', fileUrl);
        });
    });
</script>
@endpush

@push('styles')
<style>
    .downloads-section {
        background-color: #f8f9fa;
        min-height: calc(100vh - 150px);
    }
    .form-card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }
    .form-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    .form-badge {
        font-size: 0.75rem;
        text-transform: uppercase;
    }
    .form-title {
        color: #333;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    .form-description {
        min-height: 40px;
    }
    .form-size {
        font-size: 0.8rem;
    }
    .preview-btn {
        margin-left: 5px;
    }
    .pagination .page-link {
        color: #0d6efd;
    }
    .pagination .page-item.active .page-link {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }
</style>
@endpush