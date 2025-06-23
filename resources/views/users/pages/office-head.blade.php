@extends('users.user-dashboard')

@section('content')
    <div class="page-header py-lg-4 py-3">
        <div class="container">
            <h1 class="fw-bold fs-2 text-white">
                {{ app()->getLocale() === 'en' ? 'Office Chief' : 'कार्यालय प्रमुख' }}
            </h1>
        </div>
    </div>
    
    <div class="content-section my-lg-5 my-3">
        <div class="container">
            <!-- Leadership Section -->
            <section id="leadership" class="about-section">
                <div class="row">
                    @if($chief)
                    <div class="col-md-4">
                        <div class="staff-card" style="justify-content: center;">
                            <div>
                                @if($chief->image)
                                    <img src="{{ asset($chief->image) }}" 
                                         alt="{{ app()->getLocale() === 'en' ? $chief->name_en : $chief->name_np }}" 
                                         class="img-fluid">
                                @endif
                                <h4>{{ app()->getLocale() === 'en' ? $chief->name_en : $chief->name_np }}</h4>
                                <p>{{ app()->getLocale() === 'en' ? $chief->position_en : $chief->position_np }}</p>
                                <p>{{ app()->getLocale() === 'en' ? $chief->office_en : $chief->office_np }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="about-card card">
                            <div class="card-body">
                                <h4 class="card-title mb-3">
                                    {{ app()->getLocale() === 'en' ? 'Message from the Chief' : 'प्रमुखको सन्देश' }}
                                </h4>
                                <div class="content-text">
                                    {!! nl2br(e(app()->getLocale() === 'en' ? $chief->message_en : $chief->message_np)) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            {{ app()->getLocale() === 'en' ? 'No chief information available at the moment.' : 'हाल कार्यालय प्रमुखको जानकारी उपलब्ध छैन।' }}
                        </div>
                    </div>
                    @endif
                </div>
            </section>
        </div>
    </div>

    <style>
        .staff-card {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
            height: 100%;
        }
        .staff-card img {
            border-radius: 5px;
            margin-bottom: 15px;
            max-height: 300px;
            width: auto;
        }
        .content-text {
            white-space: pre-line;
            line-height: 1.8;
        }
    </style>
@endsection
