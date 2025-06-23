@extends('users.user-dashboard')


@section('content')
    <div class="page-header py-lg-4 py-3">
        <div class="container">
            <h1 class="fw-bold fs-2 text-white">कार्यालयको परिचय</h1>

        </div>
    </div>

    <div class="other-files-section py-5">
        <div class="container">
            <div class="section-header text-center mb-5">
                <h1 class="fw-bold text-primary">अन्य फाइलहरू</h1>
                <p class="lead">पर्यटन सम्बन्धी अन्य आवश्यक फाइलहरू तल उपलब्ध छन्।</p>
            </div>

            <div class="file-categories mb-5">
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-md-3 mb-3">
                            <div class="category-card text-center p-4 rounded-3 shadow-sm bg-white">
                                <div class="category-icon mb-3">
                                    <i class="fas {{ $category->icon }} fa-3x text-primary"></i>
                                </div>
                                <h3 class="h5 mb-0">{{ $category->name }}</h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="files-list">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>फाइलको नाम</th>
                                <th>श्रेणी</th>
                                <th>प्रकार</th>
                                <th>आकार</th>
                                <th>अपलोड मिति</th>
                                <th>कार्यहरू</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($files as $file)
                                <tr>
                                    <td>{{ $file->name }}</td>
                                    <td><span class="badge bg-primary">{{ $file->category->name }}</span></td>
                                    <td>{{ strtoupper($file->file_type) }}</td>
                                    <td>{{ $file->file_size }} MB</td>
                                    <td>{{ $file->uploaded_at->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{ route('download.file', $file->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        @if (in_array($file->file_type, ['pdf', 'jpg', 'png']))
                                            <button class="btn btn-sm btn-outline-primary preview-btn"
                                                data-bs-toggle="modal" data-bs-target="#previewModal"
                                                data-url="{{ asset('storage/' . $file->file_path) }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $files->links() }}
            </div>
        </div>
    </div>

    <!-- Preview Modal (Same as forms page) -->
@endsection

@push('styles')
    <style>
        .other-files-section {
            background-color: #f8f9fa;
            min-height: calc(100vh - 150px);
        }

        .category-card {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .table {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
        }

        .table th {
            border-top: none;
        }
    </style>
@endpush
