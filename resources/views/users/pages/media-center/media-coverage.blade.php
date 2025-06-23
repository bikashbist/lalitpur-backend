@extends('users.user-dashboard')
  <title>मिडिया कवरेज - पर्यटन कार्यालय ललितपुर</title>
    <style>
        .media-coverage {
            padding: 30px 0;
        }
        .media-card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            margin-bottom: 25px;
            transition: all 0.3s;
        }
        .media-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .media-type {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(0,0,0,0.7);
            color: white;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 12px;
        }
        .media-play {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 50px;
            height: 50px;
            background: rgba(255,255,255,0.9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .media-play i {
            color: #0d6efd;
            font-size: 20px;
        }
        .media-image {
            height: 200px;
            overflow: hidden;
            position: relative;
        }
        .media-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .media-body {
            padding: 15px;
        }
        .media-date {
            color: #666;
            font-size: 14px;
        }
        .media-title {
            color: #333;
            font-weight: 600;
            margin: 10px 0;
        }
        .media-source {
            color: #0d6efd;
            font-size: 14px;
        }
        .media-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
        }
    </style>
@section('content')
    <div class="page-header py-lg-4 py-3">
        <div class="container">
            <h1 class="fw-bold fs-2 text-white">Media Coverage</h1>

        </div>
    </div>
     <div class="media-coverage">
        <div class="container">
            <div class="media-grid">
                <!-- TV Coverage -->
                <div class="media-card">
                    <div class="media-image">
                        <img src="images/media/tv1.jpg" alt="टिभी कवरेज">
                        <span class="media-type">टेलिभिजन</span>
                        <div class="media-play">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <div class="media-date">२०८१ असार ५</div>
                        <h4 class="media-title">ललितपुरको पर्यटन क्षमता बारे विशेष कार्यक्रम</h4>
                        <div class="media-source">हिमालय टेलिभिजन</div>
                    </div>
                </div>
                
                <!-- Online News -->
                <div class="media-card">
                    <div class="media-image">
                        <img src="images/media/online1.jpg" alt="अनलाइन समाचार">
                        <span class="media-type">अनलाइन</span>
                    </div>
                    <div class="media-body">
                        <div class="media-date">२०८१ जेठ २०</div>
                        <h4 class="media-title">ललितपुरका ऐतिहासिक स्थलहरूको डिजिटल प्रदर्शनी</h4>
                        <div class="media-source">onlinekhabar.com</div>
                    </div>
                </div>
                
                <!-- Newspaper -->
                <div class="media-card">
                    <div class="media-image">
                        <img src="images/media/paper1.jpg" alt="पत्रिका">
                        <span class="media-type">पत्रपत्रिका</span>
                    </div>
                    <div class="media-body">
                        <div class="media-date">२०८१ बैशाख १०</div>
                        <h4 class="media-title">पर्यटन कार्यालयले सुरु गर्यो नयाँ पर्यटक गाइड प्रशिक्षण</h4>
                        <div class="media-source">कान्तिपुर दैनिक</div>
                    </div>
                </div>
                
                <!-- Radio -->
                <div class="media-card">
                    <div class="media-image">
                        <img src="images/media/radio1.jpg" alt="रेडियो">
                        <span class="media-type">रेडियो</span>
                        <div class="media-play">
                            <i class="fas fa-volume-up"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <div class="media-date">२०८० चैत्र १५</div>
                        <h4 class="media-title">ललितपुर पर्यटन: सम्भावना र चुनौती</h4>
                        <div class="media-source">राडियो नेपाल</div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-4">
                <button class="btn btn-primary">थप मिडिया कवरेज हेर्नुहोस्</button>
            </div>
        </div>
    </div>
@endsection
