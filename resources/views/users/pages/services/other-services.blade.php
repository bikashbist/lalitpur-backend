@extends('users.user-dashboard')

@section('content')
    <div class="page-header py-lg-4 py-3">
        <div class="container">
            <h1 class="fw-bold fs-2 text-white">अन्य सेवा तथा सुविधाहरू</h1>
        </div>
    </div>
    
    <div class="content-section my-lg-5 my-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">अन्य सेवा तथा सुविधाहरू</h3>
                            
                            @if($services->count() > 0)
                            <div class="other-services">
                                @foreach($services as $service)
                                <div class="service-item">
                                    <h5>{{ $service->title }}</h5>
                                    <p>{{ $service->description }}</p>
                                    @if($service->link)
                                    <a href="{{ $service->link }}" class="btn btn-sm btn-outline-primary">
                                        अझै पढ्नुहोस्
                                    </a>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                            @else
                            <div class="alert alert-info">
                                Currently no other services available.
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .other-services {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .service-item {
            padding: 20px;
            border: 1px solid #eee;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        .service-item:hover {
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .service-item h5 {
            color: #2c3e50;
            margin-bottom: 15px;
        }
        .service-item p {
            margin-bottom: 15px;
        }
    </style>
@endsection