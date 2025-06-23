@extends('users.user-dashboard')

@section('content')
    <div class="page-header py-lg-4 py-3">
        <div class="container">
            <h1 class="fw-bold fs-2 text-white">संगठनात्मक संरचना</h1>
        </div>
    </div>
    
    <div class="content-section my-lg-5 my-3">
        <div class="container">
            <section id="structure" class="about-section">
                @if($structure)
                    <h2>{{ $structure->title }}</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="about-card card">
                                <div class="card-body">
                                    @if($structure->image_url)
                                    <img src="{{ $structure->image_url }}" alt="{{ $structure->title }}" class="img-fluid mb-3">
                                    @endif
                                    <div class="content-text">
                                        {!! nl2br(e($structure->description)) !!}
                                    </div>
                                    @if(count($structure->departments) > 0)
                                    <ul>
                                        @foreach($structure->departments as $department)
                                        <li>{{ $department }}</li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="alert alert-info text-center">
                        No organizational structure information available at the moment.
                    </div>
                @endif
            </section>
        </div>
    </div>

    <style>
        .content-text {
            white-space: pre-line;
            line-height: 1.8;
        }
    </style>
@endsection