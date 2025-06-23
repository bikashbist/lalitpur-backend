@extends('users.user-dashboard')
  <title>प्रेस विज्ञप्ति - पर्यटन कार्यालय ललितपुर</title>
    <style>
        .press-section {
            padding: 30px 0;
        }
        .press-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            margin-bottom: 25px;
            transition: transform 0.3s;
        }
        .press-card:hover {
            transform: translateY(-5px);
        }
        .press-date {
            background: #0d6efd;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            display: inline-block;
            font-size: 14px;
        }
        .press-title {
            color: #333;
            margin: 15px 0;
            font-weight: 600;
        }
        .press-summary {
            color: #666;
            margin-bottom: 15px;
        }
        .press-tags {
            margin-top: 15px;
        }
        .press-tag {
            background: #f0f0f0;
            color: #555;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 12px;
            margin-right: 8px;
            display: inline-block;
        }
        .search-box {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
        }
        .year-filter {
            margin-bottom: 30px;
        }
        .year-btn {
            border: 1px solid #ddd;
            background: none;
            padding: 5px 15px;
            margin: 0 5px 10px 0;
            border-radius: 20px;
            transition: all 0.3s;
        }
        .year-btn.active, .year-btn:hover {
            background: #0d6efd;
            color: white;
            border-color: #0d6efd;
        }
    </style>
@section('content')
    <div class="page-header py-lg-4 py-3">
        <div class="container">
            <h1 class="fw-bold fs-2 text-white">प्रेस विज्ञप्ति</h1>

        </div>
    </div>
      <div class="press-section">
        <div class="container">
            <div class="search-box">
                <div class="row">
                    <div class="col-md-8">
                        <input type="text" class="form-control" placeholder="प्रेस विज्ञप्ति खोज्नुहोस्...">
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary w-100">खोज्नुहोस्</button>
                    </div>
                </div>
            </div>
            
            <div class="year-filter">
                <h5>वर्ष अनुसार फिल्टर गर्नुहोस्:</h5>
                <button class="year-btn active">सबै</button>
                <button class="year-btn">२०८१</button>
                <button class="year-btn">२०८०</button>
                <button class="year-btn">२०७९</button>
                <button class="year-btn">२०७८</button>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="press-card card">
                        <div class="card-body">
                            <span class="press-date">२०८१ असार १५</span>
                            <h3 class="press-title">ललितपुरमा नयाँ पर्यटन योजना सार्वजनिक</h3>
                            <p class="press-summary">पर्यटन कार्यालय ललितपुरले आगामी ५ वर्षको लागि नयाँ पर्यटन विकास योजना सार्वजनिक गरेको छ। यस योजनामा ललितपुरका प्रमुख पर्यटकीय स्थलहरूको विकास र संरक्षणलाई प्राथमिकता दिइएको छ...</p>
                            <div class="press-tags">
                                <span class="press-tag">पर्यटन योजना</span>
                                <span class="press-tag">विकास</span>
                            </div>
                            <a href="#" class="btn btn-outline-primary mt-3">पूरा पढ्नुहोस्</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="press-card card">
                        <div class="card-body">
                            <span class="press-date">२०८१ जेठ ३०</span>
                            <h3 class="press-title">पर्यटक गाइडहरूको प्रशिक्षण कार्यक्रम सुरु</h3>
                            <p class="press-summary">पर्यटन कार्यालय ललितपुरले स्थानीय गाइडहरूको क्षमता अभिवृद्धि गर्न विशेष प्रशिक्षण कार्यक्रम सुरु गरेको छ। यस कार्यक्रममा १५० जना गाइडहरूले प्रशिक्षण प्राप्त गर्नेछन्...</p>
                            <div class="press-tags">
                                <span class="press-tag">प्रशिक्षण</span>
                                <span class="press-tag">गाइड</span>
                            </div>
                            <a href="#" class="btn btn-outline-primary mt-3">पूरा पढ्नुहोस्</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="press-card card">
                        <div class="card-body">
                            <span class="press-date">२०८१ बैशाख १२</span>
                            <h3 class="press-title">युनेस्कोले ललितपुरका ऐतिहासिक स्थलहरू मर्मत गर्ने</h3>
                            <p class="press-summary">युनेस्कोले ललितपुरका विश्व सम्पदा स्थलहरूको संरक्षण र मर्मत कार्यका लागि रु. ५ करोड सहयोग गर्ने घोषणा गरेको छ। यस अन्तर्गत पाटन दरबार क्षेत्रका धरोहरहरूको मर्मत कार्य गरिनेछ...</p>
                            <div class="press-tags">
                                <span class="press-tag">युनेस्को</span>
                                <span class="press-tag">संरक्षण</span>
                            </div>
                            <a href="#" class="btn btn-outline-primary mt-3">पूरा पढ्नुहोस्</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="press-card card">
                        <div class="card-body">
                            <span class="press-date">२०८० चैत्र १५</span>
                            <h3 class="press-title">पर्यटन कर सम्बन्धी निर्देशिका सार्वजनिक</h3>
                            <p class="press-summary">पर्यटन कार्यालय ललितपुरले पर्यटन कर सम्बन्धी नयाँ निर्देशिका सार्वजनिक गरेको छ। यस निर्देशिकाले होटल, रेस्टुरेन्ट र अन्य पर्यटन व्यवसायहरूले कर तिर्ने प्रक्रिया स्पष्ट पारेको छ...</p>
                            <div class="press-tags">
                                <span class="press-tag">कर</span>
                                <span class="press-tag">निर्देशिका</span>
                            </div>
                            <a href="#" class="btn btn-outline-primary mt-3">पूरा पढ्नुहोस्</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <nav aria-label="Page navigation" class="mt-4">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">अघिल्लो</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">१</a></li>
                    <li class="page-item"><a class="page-link" href="#">२</a></li>
                    <li class="page-item"><a class="page-link" href="#">३</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">अर्को</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
