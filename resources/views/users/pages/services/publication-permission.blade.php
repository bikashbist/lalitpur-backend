@extends('users.user-dashboard')

@section('content')
    <div class="page-header py-lg-4 py-3">
        <div class="container">
            <h1 class="fw-bold fs-2 text-white">{{ $process->page_title ?? 'प्रकाशन अनुमति प्रक्रिया' }}</h1>
        </div>
    </div>
    
    <div class="content-section my-lg-5 my-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{ $process->section_title ?? 'प्रकाशन अनुमति प्रक्रिया' }}</h3>
                            <p>{{ $process->section_description ?? 'पर्यटन सम्बन्धी प्रकाशनहरूको लागि अनुमति लिने प्रक्रिया:' }}</p>

                            <div class="process-steps">
                                @foreach($process->process_steps ?? [] as $step)
                                <div class="step">
                                    <h5>{{ $step['title'] ?? '' }}</h5>
                                    <p>{{ $step['description'] ?? '' }}</p>
                                </div>
                                @endforeach
                                
                                @empty($process->process_steps)
                                <div class="step">
                                    <h5>१. आवेदन पेश गर्ने</h5>
                                    <p>निर्धारित फाराममा आवेदन पेश गर्नुहोस्</p>
                                </div>
                                <div class="step">
                                    <h5>२. कागजात जाँच</h5>
                                    <p>कार्यालयले प्रस्तावित प्रकाशनको मस्यौदा जाँच गर्ने</p>
                                </div>
                                <div class="step">
                                    <h5>३. अनुमति दिने</h5>
                                    <p>सबै कागजात पूरा भएमा ७ कार्यदिवसभित्र अनुमति दिने</p>
                                </div>
                                @endempty
                            </div>

                            <h4 class="mt-4">आवश्यक कागजातहरू</h4>
                            <ul>
                                @foreach($process->required_documents ?? [] as $document)
                                <li>{{ $document }}</li>
                                @endforeach
                                
                                @empty($process->required_documents)
                                <li>प्रकाशनको पूर्ण मस्यौदा</li>
                                <li>लेखकको नागरिकता प्रमाणपत्र</li>
                                <li>प्रकाशकको दर्ता प्रमाणपत्र</li>
                                <li>अन्य सम्बन्धित कागजात</li>
                                @endempty
                            </ul>

                            <div class="download-section mt-4">
                                <h4>डाउनलोड गर्नुहोस्</h4>
                                @foreach($process->download_links ?? [] as $link)
                                <a href="{{ $link['url'] ?? '#' }}" class="btn btn-primary me-2">{{ $link['text'] ?? 'Link' }}</a>
                                @endforeach
                                
                                @empty($process->download_links)
                                <a href="#" class="btn btn-primary me-2">आवेदन फाराम</a>
                                <a href="#" class="btn btn-primary me-2">निर्देशिका</a>
                                <a href="#" class="btn btn-primary">शुल्क तालिका</a>
                                @endempty
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection