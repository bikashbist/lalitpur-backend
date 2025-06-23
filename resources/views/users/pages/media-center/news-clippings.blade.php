@extends('users.user-dashboard')
<title>समाचार क्लिपिङ - पर्यटन कार्यालय ललितपुर</title>
    <style>
        .clippings-section {
            padding: 30px 0;
        }

        .clipping-card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 25px;
            transition: all 0.3s;
        }

        .clipping-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .clipping-image {
            height: 200px;
            overflow: hidden;
        }

        .clipping-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .clipping-card:hover .clipping-image img {
            transform: scale(1.05);
        }

        .clipping-date {
            color: #666;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .clipping-source {
            background: #f0f0f0;
            color: #555;
            padding: 2px 10px;
            border-radius: 20px;
            font-size: 12px;
            display: inline-block;
            margin-bottom: 10px;
        }

        .clipping-title {
            color: #333;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .filter-tabs .nav-link {
            color: #555;
            border: none;
            padding: 10px 20px;
            margin-right: 5px;
        }

        .filter-tabs .nav-link.active {
            color: #0d6efd;
            background: none;
            border-bottom: 3px solid #0d6efd;
            font-weight: 600;
        }
    </style>
@section('content')
    <div class="page-header py-lg-4 py-3">
        <div class="container">
            <h1 class="fw-bold fs-2 text-white">News Clipping</h1>

        </div>
    </div>
      <div class="clippings-section">
        <div class="container">
            <ul class="nav filter-tabs" id="clippingTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab">सबै</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="newspaper-tab" data-bs-toggle="tab" data-bs-target="#newspaper" type="button" role="tab">पत्रपत्रिका</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="online-tab" data-bs-toggle="tab" data-bs-target="#online" type="button" role="tab">अनलाइन</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tv-tab" data-bs-toggle="tab" data-bs-target="#tv" type="button" role="tab">टेलिभिजन</button>
                </li>
            </ul>
            
            <div class="tab-content mt-4" id="clippingTabsContent">
                <div class="tab-pane fade show active" id="all" role="tabpanel">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="clipping-card card">
                                <div class="clipping-image">
                                    <img src="images/clippings/news1.jpg" alt="समाचार क्लिपिङ">
                                </div>
                                <div class="card-body">
                                    <div class="clipping-date">२०८१ असार १०</div>
                                    <span class="clipping-source">कान्तिपुर दैनिक</span>
                                    <h4 class="clipping-title">ललितपुरमा पर्यटक आगमन ३०% ले बढ्यो</h4>
                                    <a href="#" class="btn btn-outline-primary">पूरा पढ्नुहोस्</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="clipping-card card">
                                <div class="clipping-image">
                                    <img src="images/clippings/news2.jpg" alt="समाचार क्लिपिङ">
                                </div>
                                <div class="card-body">
                                    <div class="clipping-date">२०८१ जेठ २५</div>
                                    <span class="clipping-source">नागरिक दैनिक</span>
                                    <h4 class="clipping-title">पाटन दरबार क्षेत्रमा नयाँ पर्यटक सुविधा</h4>
                                    <a href="#" class="btn btn-outline-primary">पूरा पढ्नुहोस्</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="clipping-card card">
                                <div class="clipping-image">
                                    <img src="images/clippings/news3.jpg" alt="समाचार क्लिपिङ">
                                </div>
                                <div class="card-body">
                                    <div class="clipping-date">२०८१ बैशाख १५</div>
                                    <span class="clipping-source">हिमालय टेलिभिजन</span>
                                    <h4 class="clipping-title">रातो मच्छिन्द्रनाथ जात्रा सफलतापूर्वक सम्पन्न</h4>
                                    <a href="#" class="btn btn-outline-primary">पूरा पढ्नुहोस्</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Other tab panes would contain filtered content -->
            </div>
            
            <div class="text-center mt-4">
                <button class="btn btn-primary">थप समाचार क्लिपिङ हेर्नुहोस्</button>
            </div>
        </div>
    </div>
@endsection
