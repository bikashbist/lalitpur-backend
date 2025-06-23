@extends('users.user-dashboard')

@section('content')
    @if ($introduction)
        <div class="page-header py-lg-4 py-3">
            <div class="container">
                <h1 class="fw-bold fs-2 text-white">{{ app()->getLocale() == 'en' ? $introduction->title_en : $introduction->title_np }}</h1>
            </div>
        </div>

        <div class="content-section my-lg-5 my-3">
            <div class="container">
                <section id="introduction" class="about-section">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="about-card card">
                                <div class="card-body">


                                 


                                    
                                        <div class="intro-section">
                                            <h2>{{ app()->getLocale() == 'en' ? $introduction->title_en : $introduction->title_np }}
                                            </h2>
                                            <p>{!! app()->getLocale() == 'en' ? $introduction->description_en : $introduction->description_np !!}</p>
                                            @if ($introduction->image)
                                                <div class=" mb-4">
                                                    <img src="{{ asset($introduction->image) }}"
                                                        alt="{{ $introduction->title }}" class="img-fluid rounded"
                                                        >
                                                </div>
                                            @endif
                                            <h4>{{ __('Objectives') }}</h4>
                                            <ul>
                                                @foreach (app()->getLocale() == 'en' ? $introduction->objectives_en : $introduction->objectives_np as $objective)
                                                    <li>{{ $objective }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                 






                                </div>



                            </div>

                        </div>
                    </div>
                </section>
            </div>
        </div>
    @else
        <div class="alert alert-info text-center my-5">No office introduction available at the moment.</div>
    @endif

    <style>
        .content-text {
            white-space: pre-line;
            line-height: 1.8;
        }

        .objectives-list {
            padding-left: 20px;
        }

        .objectives-list li {
            margin-bottom: 8px;
        }
    </style>
@endsection
