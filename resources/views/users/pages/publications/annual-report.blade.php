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
                            <h3 class="card-title">वार्षिक प्रतिवेदनहरू</h3>
                            <p>पर्यटन कार्यालय ललितपुरले प्रकाशन गरेका वार्षिक प्रतिवेदनहरू:</p>
                            
                            <div class="report-list">
                                <div class="report-item">
                                    <div class="report-year">२०८०</div>
                                    <div class="report-content">
                                        <h5>२०८० को वार्षिक प्रतिवेदन</h5>
                                        <p>पर्यटन कार्यालय ललितपुरको २०८० सालको वार्षिक प्रतिवेदन। यसमा वर्षभरिका गतिविधिहरू, उपलब्धिहरू, चुनौतिहरू र आगामी योजनाहरू समावेश गरिएको छ।</p>
                                        <div class="report-downloads">
                                            <a href="#" class="btn btn-primary btn-sm">पूर्ण प्रतिवेदन हेर्नुहोस्</a>
                                            <a href="#" class="btn btn-outline-primary btn-sm ms-2">डाउनलोड गर्नुहोस् (PDF)</a>
                                            <a href="#" class="btn btn-outline-primary btn-sm ms-2">डाउनलोड गर्नुहोस् (Word)</a>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="report-item">
                                    <div class="report-year">२०७९</div>
                                    <div class="report-content">
                                        <h5>२०७९ को वार्षिक प्रतिवेदन</h5>
                                        <p>पर्यटन कार्यालय ललितपुरको २०७९ सालको वार्षिक प्रतिवेदन। यसमा COVID-19 पश्चातको पर्यटन क्षेत्रको पुनरुत्थान सम्बन्धी विस्तृत जानकारी समावेश गरिएको छ।</p>
                                        <div class="report-downloads">
                                            <a href="#" class="btn btn-primary btn-sm">पूर्ण प्रतिवेदन हेर्नुहोस्</a>
                                            <a href="#" class="btn btn-outline-primary btn-sm ms-2">डाउनलोड गर्नुहोस् (PDF)</a>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="report-item">
                                    <div class="report-year">२०७८</div>
                                    <div class="report-content">
                                        <h5>२०७८ को वार्षिक प्रतिवेदन</h5>
                                        <p>पर्यटन कार्यालय ललितपुरको २०७८ सालको वार्षिक प्रतिवेदन। यसमा COVID-19 को प्रभाव र पर्यटन क्षेत्रमा यसले गरेको असर सम्बन्धी विस्तृत विश्लेषण समावेश गरिएको छ।</p>
                                        <div class="report-downloads">
                                            <a href="#" class="btn btn-primary btn-sm">पूर्ण प्रतिवेदन हेर्नुहोस्</a>
                                            <a href="#" class="btn btn-outline-primary btn-sm ms-2">डाउनलोड गर्नुहोस् (PDF)</a>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="report-item">
                                    <div class="report-year">२०७७</div>
                                    <div class="report-content">
                                        <h5>२०७७ को वार्षिक प्रतिवेदन</h5>
                                        <p>पर्यटन कार्यालय ललितपुरको २०७७ सालको वार्षिक प्रतिवेदन। यसमा ललितपुरका पर्यटकीय स्थलहरूको विकास र संरक्षण सम्बन्धी विस्तृत जानकारी समावेश गरिएको छ।</p>
                                        <div class="report-downloads">
                                            <a href="#" class="btn btn-primary btn-sm">पूर्ण प्रतिवेदन हेर्नुहोस्</a>
                                            <a href="#" class="btn btn-outline-primary btn-sm ms-2">डाउनलोड गर्नुहोस् (PDF)</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="archive-section mt-4">
                                <h4>पुराना प्रतिवेदनहरू</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>वर्ष</th>
                                                <th>शीर्षक</th>
                                                <th>डाउनलोड</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>२०७६</td>
                                                <td>२०७६ को वार्षिक प्रतिवेदन</td>
                                                <td><a href="#" class="btn btn-sm btn-outline-primary">डाउनलोड</a></td>
                                            </tr>
                                            <tr>
                                                <td>२०७५</td>
                                                <td>२०७५ को वार्षिक प्रतिवेदन</td>
                                                <td><a href="#" class="btn btn-sm btn-outline-primary">डाउनलोड</a></td>
                                            </tr>
                                            <tr>
                                                <td>२०७४</td>
                                                <td>२०७४ को वार्षिक प्रतिवेदन</td>
                                                <td><a href="#" class="btn btn-sm btn-outline-primary">डाउनलोड</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
