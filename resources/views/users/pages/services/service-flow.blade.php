@extends('users.user-dashboard')

@section('styles')
<style>
    .service-flow-section {
        padding: 40px 0;
    }
    .service-header {
        text-align: center;
        margin-bottom: 40px;
    }
    .service-header h2 {
        color: #0d6efd;
        font-weight: 700;
        margin-bottom: 15px;
    }
    .service-header p {
        color: #555;
        max-width: 800px;
        margin: 0 auto;
    }
    .service-tabs {
        margin-bottom: 30px;
    }
    .service-tabs .nav-link {
        color: #555;
        border: none;
        padding: 12px 25px;
        font-weight: 500;
        border-radius: 30px;
        margin: 0 5px;
        transition: all 0.3s;
    }
    .service-tabs .nav-link.active {
        background: #0d6efd;
        color: white;
    }
    .service-tabs .nav-link:hover:not(.active) {
        background: #f0f0f0;
    }
    .process-steps {
        position: relative;
        padding: 40px 0;
    }
    .process-steps::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50px;
        width: 3px;
        height: 100%;
        background: #0d6efd;
        z-index: 1;
    }
    .step {
        display: flex;
        margin-bottom: 40px;
        position: relative;
        z-index: 2;
    }
    .step-number {
        width: 100px;
        height: 100px;
        background: white;
        border: 3px solid #0d6efd;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        font-weight: bold;
        color: #0d6efd;
        margin-right: 30px;
        flex-shrink: 0;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    .step-content {
        background: white;
        border-radius: 10px;
        padding: 25px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        flex-grow: 1;
    }
    .step-content h4 {
        color: #333;
        margin-bottom: 15px;
        font-weight: 600;
    }
    .step-content p {
        color: #555;
        margin-bottom: 0;
    }
    .step-documents {
        margin-top: 15px;
        padding-top: 15px;
        border-top: 1px dashed #ddd;
    }
    .document-list {
        list-style-type: none;
        padding-left: 0;
    }
    .document-list li {
        margin-bottom: 8px;
        position: relative;
        padding-left: 25px;
    }
    .document-list li::before {
        content: '\f15c';
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        position: absolute;
        left: 0;
        color: #0d6efd;
    }
    .time-duration {
        display: inline-block;
        background: #f8f9fa;
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 14px;
        margin-top: 10px;
        color: #666;
    }
    .download-btn {
        margin-top: 15px;
    }
    .service-notes {
        background: #f8f9fa;
        border-left: 4px solid #0d6efd;
        padding: 20px;
        border-radius: 0 5px 5px 0;
        margin-top: 40px;
    }
    @media (max-width: 768px) {
        .step {
            flex-direction: column;
        }
        .step-number {
            margin-right: 0;
            margin-bottom: 20px;
            width: 70px;
            height: 70px;
            font-size: 24px;
        }
        .process-steps::before {
            left: 35px;
        }
    }
</style>
@endsection

@section('content')
    <div class="page-header py-lg-4 py-3">
        <div class="container">
            <h1 class="fw-bold fs-2 text-white">हाम्रो सेवा प्रवाह प्रक्रिया</h1>
        </div>
    </div>
    
    <div class="service-flow-section mt-4">
        <div class="container">
            <div class="service-header">
                <h2>हाम्रो सेवा प्रवाह प्रक्रिया</h2>
                <p>पर्यटन कार्यालय ललितपुरले प्रदान गर्ने सेवाहरूको प्रवाह प्रक्रिया तल देखाइएको छ। सेवा अनुसारको विस्तृत प्रक्रिया जान्नका लागि सम्बन्धित सेवा छान्नुहोस्।</p>
            </div>

            @if($services->count() > 0)
                <ul class="nav nav-pills service-tabs justify-content-center" id="serviceTabs" role="tablist">
                    @foreach($services as $index => $service)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $index === 0 ? 'active' : '' }}" 
                                    id="{{ $service->service_slug }}-tab" 
                                    data-bs-toggle="pill" 
                                    data-bs-target="#{{ $service->service_slug }}" 
                                    type="button" 
                                    role="tab">
                                {{ $service->service_name }}
                            </button>
                        </li>
                    @endforeach
                </ul>

                <div class="tab-content" id="serviceTabsContent">
                    @foreach($services as $index => $service)
                        <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" 
                             id="{{ $service->service_slug }}" 
                             role="tabpanel">
                            <div class="process-steps">
                                @foreach($service->steps as $stepIndex => $step)
                                    <div class="step">
                                        <div class="step-number">{{ $stepIndex + 1 }}</div>
                                        <div class="step-content">
                                            <h4>{{ $step['title'] }}</h4>
                                            <p>{{ $step['description'] }}</p>
                                            
                                            @if(isset($step['documents']))
                                                <div class="step-documents">
                                                    <h6>आवश्यक कागजातहरू:</h6>
                                                    <ul class="document-list">
                                                        @foreach($step['documents'] as $document)
                                                            <li>{{ $document }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            
                                            @if(isset($step['duration']))
                                                <span class="time-duration">
                                                    <i class="far fa-clock me-2"></i>समय: {{ $step['duration'] }}
                                                </span>
                                            @endif
                                            
                                            @if(isset($step['download_link']))
                                                <a href="{{ $step['download_link'] }}" 
                                                   class="btn btn-outline-primary download-btn">
                                                    <i class="fas fa-download me-2"></i>आवेदन फाराम डाउनलोड गर्नुहोस्
                                                </a>
                                            @endif
                                            
                                            @if(isset($step['fee']))
                                                <div class="alert alert-info mt-3">
                                                    <strong>शुल्क:</strong> {{ $step['fee'] }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            
                            @if(isset($service->notes))
                                <div class="service-notes">
                                    <h5><i class="fas fa-info-circle me-2"></i>महत्त्वपूर्ण सूचना:</h5>
                                    <ul>
                                        @foreach($service->notes as $note)
                                            <li>{!! $note !!}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-info">
                    सेवा प्रवाहहरू उपलब्ध छैनन्
                </div>
            @endif
        </div>
    </div>

    <script>
        // Initialize tab functionality
        var serviceTabElms = document.querySelectorAll('#serviceTabs button[data-bs-toggle="pill"]')
        serviceTabElms.forEach(function(tabElm) {
            tabElm.addEventListener('shown.bs.tab', function (event) {
                // You can add additional functionality when tabs change
            })
        })
    </script>
@endsection