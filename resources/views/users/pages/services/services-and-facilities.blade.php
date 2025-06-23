@extends('users.user-dashboard')

@section('content')
    <div class="page-header py-lg-4 py-3">
        <div class="container">
            <h1 class="fw-bold fs-2 text-white">कार्यालयको परिचय</h1>

        </div>
    </div>
    <div class="content-section my-lg-5 my-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">हाम्रा सेवा तथा सुविधाहरू</h3>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="service-box">
                                        <h5><i class="fas fa-map-marked-alt"></i> पर्यटक सूचना केन्द्र</h5>
                                        <p>ललितपुरका प्रमुख पर्यटकीय स्थलहरूको जानकारी र नक्सा उपलब्ध गराउने</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="service-box">
                                        <h5><i class="fas fa-id-card"></i> गाइड लाइसेन्स सेवा</h5>
                                        <p>पर्यटक गाइड लाइसेन्सको लागि आवेदन र नवीकरण सेवा</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="service-box">
                                        <h5><i class="fas fa-hotel"></i> होटल दर्ता सेवा</h5>
                                        <p>होटल, लज, रेस्टुरेन्टहरूको दर्ता र नियमन सम्बन्धी सेवा</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="service-box">
                                        <h5><i class="fas fa-book"></i> प्रकाशन सेवा</h5>
                                        <p>पर्यटन सम्बन्धी प्रकाशनहरूको अनुमति र वितरण सेवा</p>
                                    </div>
                                </div>
                            </div>
                            
                            <h4 class="mt-4">अनलाइन सेवाहरू</h4>
                            <div class="online-services">
                                <a href="#" class="btn btn-primary me-2 mb-2">गाइड लाइसेन्स आवेदन</a>
                                <a href="#" class="btn btn-primary me-2 mb-2">होटल दर्ता आवेदन</a>
                                <a href="#" class="btn btn-primary me-2 mb-2">सेवा शुल्क तिर्ने</a>
                                <a href="#" class="btn btn-primary me-2 mb-2">आवेदन स्थिति जाँच्ने</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
