@extends('users.user-dashboard')

@section('content')
    <div class="page-header py-lg-4 py-3">
        <div class="container">
            <h1 class="fw-bold fs-2 text-white">नागरिक चार्टर</h1>
        </div>
    </div>
    
    <div class="content-section my-lg-5 my-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            @if($charter)
                                <h3 class="card-title">{{ $charter->title }}</h3>
                                <div class="content-text">
                                    {!! nl2br(e($charter->introduction)) !!}
                                </div>
                                
                                <div class="charter-section">
                                    <h4>हाम्रो प्रतिबद्धता</h4>
                                    <ul>
                                        @foreach($charter->commitments as $commitment)
                                        <li>{{ $commitment }}</li>
                                        @endforeach
                                    </ul>
                                    
                                    <h4 class="mt-4">सेवा समय</h4>
                                    <p>{{ $charter->working_days }}<br>
                                    {{ $charter->working_hours }}</p>
                                    
                                    <h4 class="mt-4">प्रमुख सेवाहरू</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>सेवा</th>
                                                    <th>समय अवधि</th>
                                                    <th>शुल्क</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($charter->services as $service)
                                                <tr>
                                                    <td>{{ $service['name'] }}</td>
                                                    <td>{{ $service['duration'] }}</td>
                                                    <td>{{ $service['fee'] }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @else
                                <div class="alert alert-info">
                                    No citizen charter information available at the moment.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .content-text {
            white-space: pre-line;
            line-height: 1.8;
        }
        .charter-section h4 {
            color: #2c3e50;
            margin-top: 1.5rem;
            margin-bottom: 1rem;
        }
        .charter-section ul {
            padding-left: 1.5rem;
        }
        .charter-section ul li {
            margin-bottom: 0.5rem;
        }
    </style>
@endsection