@extends('admin.admin-dashboard')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">प्रकाशन अनुमति प्रक्रिया सम्पादन गर्नुहोस्</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.publication-processes.update', $publicationProcess->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="page_title">पृष्ठ शीर्षक</label>
                    <input type="text" class="form-control" id="page_title" name="page_title" 
                           value="{{ old('page_title', $publicationProcess->page_title) }}" required>
                    @error('page_title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="section_title">सेक्सन शीर्षक</label>
                    <input type="text" class="form-control" id="section_title" name="section_title" 
                           value="{{ old('section_title', $publicationProcess->section_title) }}" required>
                    @error('section_title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="section_description">सेक्सन विवरण</label>
                    <textarea class="form-control" id="section_description" name="section_description" 
                              rows="3" required>{{ old('section_description', $publicationProcess->section_description) }}</textarea>
                    @error('section_description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>प्रक्रिया चरणहरू</label>
                    <div id="process-steps-container">
                        @foreach(old('process_steps', $publicationProcess->process_steps) as $index => $step)
                        <div class="process-step mb-3">
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="process_steps[{{ $index }}][title]" 
                                           placeholder="चरण शीर्षक" value="{{ $step['title'] }}" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="process_steps[{{ $index }}][description]" 
                                           placeholder="चरण विवरण" value="{{ $step['description'] }}" required>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger remove-step">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <button type="button" id="add-step" class="btn btn-secondary mt-2">
                        <i class="fas fa-plus"></i> चरण थप्नुहोस्
                    </button>
                </div>

                <div class="form-group">
                    <label>आवश्यक कागजातहरू</label>
                    <div id="documents-container">
                        @foreach(old('required_documents', $publicationProcess->required_documents) as $index => $document)
                        <div class="document mb-2">
                            <div class="row">
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="required_documents[]" 
                                           placeholder="कागजातको नाम" value="{{ $document }}" required>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger remove-document">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <button type="button" id="add-document" class="btn btn-secondary mt-2">
                        <i class="fas fa-plus"></i> कागजात थप्नुहोस्
                    </button>
                </div>

                <div class="form-group">
                    <label>डाउनलोड लिङ्कहरू</label>
                    <div id="links-container">
                        @foreach(old('download_links', $publicationProcess->download_links) as $index => $link)
                        <div class="link mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="download_links[{{ $index }}][text]" 
                                           placeholder="लिङ्कको पाठ" value="{{ $link['text'] }}" required>
                                </div>
                                <div class="col-md-7">
                                    <input type="url" class="form-control" name="download_links[{{ $index }}][url]" 
                                           placeholder="URL" value="{{ $link['url'] }}" required>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger remove-link">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <button type="button" id="add-link" class="btn btn-secondary mt-2">
                        <i class="fas fa-plus"></i> लिङ्क थप्नुहोस्
                    </button>
                </div>

                <div class="form-group">
                    <label for="order">क्रम</label>
                    <input type="number" class="form-control" id="order" name="order" 
                           value="{{ old('order', $publicationProcess->order) }}">
                </div>

                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="status" name="status" 
                               {{ old('status', $publicationProcess->status) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="status">सक्रिय गर्नुहोस्</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> अपडेट गर्नुहोस्
                </button>
                <a href="{{ route('admin.publication-processes.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> रद्द गर्नुहोस्
                </a>
            </form>
        </div>
    </div>
</div>

<script>
    // Add process step
    let stepIndex = {{ count(old('process_steps', $publicationProcess->process_steps)) }};
    document.getElementById('add-step').addEventListener('click', function() {
        const container = document.getElementById('process-steps-container');
        const newStep = document.createElement('div');
        newStep.className = 'process-step mb-3';
        newStep.innerHTML = `
            <div class="row">
                <div class="col-md-5">
                    <input type="text" class="form-control" name="process_steps[${stepIndex}][title]" placeholder="चरण शीर्षक" required>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="process_steps[${stepIndex}][description]" placeholder="चरण विवरण" required>
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-danger remove-step">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        `;
        container.appendChild(newStep);
        stepIndex++;
    });

    // Add document
    document.getElementById('add-document').addEventListener('click', function() {
        const container = document.getElementById('documents-container');
        const newDoc = document.createElement('div');
        newDoc.className = 'document mb-2';
        newDoc.innerHTML = `
            <div class="row">
                <div class="col-md-10">
                    <input type="text" class="form-control" name="required_documents[]" placeholder="कागजातको नाम" required>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger remove-document">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        `;
        container.appendChild(newDoc);
    });

    // Add link
    let linkIndex = {{ count(old('download_links', $publicationProcess->download_links)) }};
    document.getElementById('add-link').addEventListener('click', function() {
        const container = document.getElementById('links-container');
        const newLink = document.createElement('div');
        newLink.className = 'link mb-3';
        newLink.innerHTML = `
            <div class="row">
                <div class="col-md-4">
                    <input type="text" class="form-control" name="download_links[${linkIndex}][text]" placeholder="लिङ्कको पाठ" required>
                </div>
                <div class="col-md-7">
                    <input type="url" class="form-control" name="download_links[${linkIndex}][url]" placeholder="URL" required>
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-danger remove-link">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        `;
        container.appendChild(newLink);
        linkIndex++;
    });

    // Remove elements
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-step') || e.target.closest('.remove-step')) {
            e.target.closest('.process-step').remove();
        }
        if (e.target.classList.contains('remove-document') || e.target.closest('.remove-document')) {
            e.target.closest('.document').remove();
        }
        if (e.target.classList.contains('remove-link') || e.target.closest('.remove-link')) {
            e.target.closest('.link').remove();
        }
    });
</script>
@endsection