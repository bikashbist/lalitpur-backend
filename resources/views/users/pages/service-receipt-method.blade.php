@extends('users.user-dashboard')

@section('content')
    <div class="page-header py-lg-4 py-3">
        <div class="container">
            <h1 class="fw-bold fs-2 text-white">सेवा प्राप्त गर्ने विधि</h1>
        </div>
    </div>
    
    <div class="content-section my-lg-5 my-3">
        <div class="container">
            <section id="services" class="about-section">
                @if($process)
                    <h2>{{ $process->title }}</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="about-card card">
                                <div class="card-body">
                                    <h5 class="card-title">सेवा प्रक्रिया</h5>
                                    <p>{{ $process->introduction }}</p>
                                    <ul>
                                        @foreach($process->services as $service)
                                            <li class="list-style-type-none">{{ $service }}</li>
                                        @endforeach
                                    </ul>
                                    <h5 class="mt-4">आवश्यक कागजातहरू</h5>
                                    <ul>
                                        @foreach($process->documents as $document)
                                            <li>{{ $document }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="alert alert-info text-center">
                        No service process information available at the moment.
                    </div>
                @endif
            </section>
        </div>
    </div>
@endsection