@extends('users.user-dashboard')

@section('content')
    <div class="page-header py-lg-4 py-3">
        <div class="container">
            <h1 class="fw-bold fs-2 text-white">नागरिक सेवाहरू</h1>
        </div>
    </div>
    
    <div class="content-section my-lg-5 my-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">नागरिक सेवाहरू</h3>
                            @if($services->count() > 0)
                                <p>हाम्रो कार्यालयले निम्न नागरिक सेवाहरू प्रदान गर्दछ:</p>
                                
                                <div class="services-list">
                                    @foreach($services as $service)
                                    <div class="service-item">
                                        <h5>{{ $loop->iteration }}. {{ $service->service_name }}</h5>
                                        <p>आवश्यक कागजातहरू:</p>
                                        <ul>
                                            @foreach($service->required_documents as $document)
                                            <li>{{ $document }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="alert alert-info">
                                    Currently no citizen services available.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .services-list {
            margin-top: 20px;
        }
        .service-item {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        .service-item:last-child {
            border-bottom: none;
        }
        .service-item h5 {
            color: #2c3e50;
            margin-bottom: 15px;
        }
        .service-item ul {
            padding-left: 20px;
        }
        .service-item ul li {
            margin-bottom: 5px;
        }
    </style>
@endsection