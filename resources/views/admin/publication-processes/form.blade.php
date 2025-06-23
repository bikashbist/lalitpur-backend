@extends('admin.admin-dashboard')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($publicationProcess) ? 'Edit' : 'Add' }} Publication Process</h6>
        </div>
        <div class="card-body">
            <form action="{{ isset($publicationProcess) ? route('admin.publication-processes.update', $publicationProcess->id) : route('admin.publication-processes.store') }}" method="POST">
                @csrf
                @if(isset($publicationProcess))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label for="page_title">Page Title</label>
                    <input type="text" class="form-control" id="page_title" name="page_title" 
                           value="{{ old('page_title', $publicationProcess->page_title ?? '') }}" required>
                </div>

                <div class="form-group">
                    <label for="section_title">Section Title</label>
                    <input type="text" class="form-control" id="section_title" name="section_title" 
                           value="{{ old('section_title', $publicationProcess->section_title ?? '') }}" required>
                </div>

                <div class="form-group">
                    <label for="section_description">Section Description</label>
                    <textarea class="form-control" id="section_description" name="section_description" rows="3" required>{{ old('section_description', $publicationProcess->section_description ?? '') }}</textarea>
                </div>

                <div class="form-group">
                    <label>Process Steps</label>
                    <div id="process-steps-container">
                        @if(isset($publicationProcess) && $publicationProcess->process_steps)
                            @foreach($publicationProcess->process_steps as $index => $step)
                            <div class="process-step mb-3">
                                <div class="row">
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="process_steps[{{ $index }}][title]" 
                                               placeholder="Step Title" value="{{ $step['title'] }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="process_steps[{{ $index }}][description]" 
                                               placeholder="Step Description" value="{{ $step['description'] }}" required>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-danger remove-step">Remove</button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="process-step mb-3">
                                <div class="row">
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="process_steps[0][title]" 
                                               placeholder="Step Title" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="process_steps[0][description]" 
                                               placeholder="Step Description" required>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-danger remove-step">Remove</button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <button type="button" id="add-step" class="btn btn-secondary mt-2">Add Step</button>
                </div>

                <div class="form-group">
                    <label>Required Documents</label>
                    <div id="documents-container">
                        @if(isset($publicationProcess) && $publicationProcess->required_documents)
                            @foreach($publicationProcess->required_documents as $index => $document)
                            <div class="document mb-2">
                                <div class="row">
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="required_documents[]" 
                                               placeholder="Document name" value="{{ $document }}" required>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger remove-document">Remove</button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="document mb-2">
                                <div class="row">
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="required_documents[]" 
                                               placeholder="Document name" required>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger remove-document">Remove</button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <button type="button" id="add-document" class="btn btn-secondary mt-2">Add Document</button>
                </div>

                <div class="form-group">
                    <label>Download Links</label>
                    <div id="links-container">
                        @if(isset($publicationProcess) && $publicationProcess->download_links)
                            @foreach($publicationProcess->download_links as $index => $link)
                            <div class="link mb-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="download_links[{{ $index }}][text]" 
                                               placeholder="Link Text" value="{{ $link['text'] }}" required>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="url" class="form-control" name="download_links[{{ $index }}][url]" 
                                               placeholder="URL" value="{{ $link['url'] }}" required>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-danger remove-link">Remove</button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="link mb-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="download_links[0][text]" 
                                               placeholder="Link Text" required>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="url" class="form-control" name="download_links[0][url]" 
                                               placeholder="URL" required>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-danger remove-link">Remove</button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <button type="button" id="add-link" class="btn btn-secondary mt-2">Add Link</button>
                </div>

                <div class="form-group">
                    <label for="order">Display Order</label>
                    <input type="number" class="form-control" id="order" name="order" 
                           value="{{ old('order', $publicationProcess->order ?? 0) }}">
                </div>

                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="status" name="status" 
                               {{ isset($publicationProcess) && $publicationProcess->status ? 'checked' : '' }}>
                        <label class="custom-control-label" for="status">Active</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.publication-processes.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

<script>
    // Add process step
    let stepIndex = {{ isset($publicationProcess) && $publicationProcess->process_steps ? count($publicationProcess->process_steps) : 1 }};
    document.getElementById('add-step').addEventListener('click', function() {
        const container = document.getElementById('process-steps-container');
        const newStep = document.createElement('div');
        newStep.className = 'process-step mb-3';
        newStep.innerHTML = `
            <div class="row">
                <div class="col-md-5">
                    <input type="text" class="form-control" name="process_steps[${stepIndex}][title]" placeholder="Step Title" required>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="process_steps[${stepIndex}][description]" placeholder="Step Description" required>
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-danger remove-step">Remove</button>
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
                    <input type="text" class="form-control" name="required_documents[]" placeholder="Document name" required>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger remove-document">Remove</button>
                </div>
            </div>
        `;
        container.appendChild(newDoc);
    });

    // Add link
    let linkIndex = {{ isset($publicationProcess) && $publicationProcess->download_links ? count($publicationProcess->download_links) : 1 }};
    document.getElementById('add-link').addEventListener('click', function() {
        const container = document.getElementById('links-container');
        const newLink = document.createElement('div');
        newLink.className = 'link mb-3';
        newLink.innerHTML = `
            <div class="row">
                <div class="col-md-4">
                    <input type="text" class="form-control" name="download_links[${linkIndex}][text]" placeholder="Link Text" required>
                </div>
                <div class="col-md-7">
                    <input type="url" class="form-control" name="download_links[${linkIndex}][url]" placeholder="URL" required>
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-danger remove-link">Remove</button>
                </div>
            </div>
        `;
        container.appendChild(newLink);
        linkIndex++;
    });

    // Remove elements
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-step')) {
            e.target.closest('.process-step').remove();
        }
        if (e.target.classList.contains('remove-document')) {
            e.target.closest('.document').remove();
        }
        if (e.target.classList.contains('remove-link')) {
            e.target.closest('.link').remove();
        }
    });
</script>
@endsection