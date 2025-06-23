@extends('users.user-dashboard')

@section('content')
    <style>
        .staff-card {
            display: block !important;
            text-align: center;
            margin-bottom: 30px;
        }

        .staff-card img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .content-text {
            white-space: pre-line;
            line-height: 1.8;
        }
    </style>

    <div class="page-header py-lg-4 py-3">
        <div class="container">
            <h1 class="fw-bold fs-2 text-white">हाम्रो टोली</h1>
        </div>
    </div>

    <div class="content-section my-lg-5 my-3">
        <div class="container">
            <section id="team" class="about-section">
                <div class="row">
               
                    @foreach ($members as $member)
                        <div class="col-md-3">
                            <div class="team-card text-center">
                                 <div class="staff-card">
                                <img src="{{ asset($member->image) }}" alt="Image" class="img-fluid mb-2" />
                                <h5>{{ app()->getLocale() === 'en' ? $member->name_en : $member->name_np }}</h5>
                                <p>{{ app()->getLocale() === 'en' ? $member->position_en : $member->position_np }}</p>
                                 </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                {{-- <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="about-card card">
                            <div class="card-body">
                                <h5 class="card-title">हाम्रो टोलीबारे</h5>
                                <p>हाम्रो टोली विभिन्न क्षेत्रका अनुभवी र योग्य व्यक्तिहरूबाट मिलेर बनेको छ। हामी सबैले
                                    मिलेर ललितपुरको पर्यटन विकासका लागि समर्पित भएर काम गर्दछौं।</p>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </section>
        </div>
    </div>
@endsection
