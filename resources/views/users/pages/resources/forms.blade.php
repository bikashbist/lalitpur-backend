@extends('users.user-dashboard')

@section('content')
    <div class="page-header py-lg-4 py-3">
        <div class="container">
            <h1 class="fw-bold fs-2 text-white">पर्यटन सम्बन्धी फारमहरू</h1>

        </div>
    </div>
    <div class="content-section my-lg-5 my-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">पर्यटन सम्बन्धी फारमहरू</h3>

                            <div class="form-search mb-4">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="फारम खोज्नुहोस्...">
                                    <button class="btn btn-primary">खोज्नुहोस्</button>
                                </div>
                            </div>

                            <div class="form-categories">
                                <div class="category-section">
                                    <h4>लाइसेन्स सम्बन्धी फारमहरू</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>फारम नं.</th>
                                                    <th>फारमको नाम</th>
                                                    <th>प्रयोग</th>
                                                    <th>डाउनलोड</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>फारम-१</td>
                                                    <td>पर्यटक गाइड लाइसेन्स आवेदन फारम</td>
                                                    <td>पर्यटक गाइड लाइसेन्सको लागि</td>
                                                    <td><a href="#" class="btn btn-sm btn-primary">डाउनलोड</a></td>
                                                </tr>
                                                <tr>
                                                    <td>फारम-२</td>
                                                    <td>लाइसेन्स नवीकरण फारम</td>
                                                    <td>गाइड लाइसेन्स नवीकरणको लागि</td>
                                                    <td><a href="#" class="btn btn-sm btn-primary">डाउनलोड</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="category-section mt-4">
                                    <h4>दर्ता सम्बन्धी फारमहरू</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>फारम नं.</th>
                                                    <th>फारमको नाम</th>
                                                    <th>प्रयोग</th>
                                                    <th>डाउनलोड</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>फारम-३</td>
                                                    <td>होटल दर्ता आवेदन फारम</td>
                                                    <td>होटल दर्ताको लागि</td>
                                                    <td><a href="#" class="btn btn-sm btn-primary">डाउनलोड</a></td>
                                                </tr>
                                                <tr>
                                                    <td>फारम-४</td>
                                                    <td>रेस्टुरेन्ट दर्ता फारम</td>
                                                    <td>रेस्टुरेन्ट दर्ताको लागि</td>
                                                    <td><a href="#" class="btn btn-sm btn-primary">डाउनलोड</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="category-section mt-4">
                                    <h4>अन्य फारमहरू</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>फारम नं.</th>
                                                    <th>फारमको नाम</th>
                                                    <th>प्रयोग</th>
                                                    <th>डाउनलोड</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>फारम-५</td>
                                                    <td>पर्यटक शिकायत फारम</td>
                                                    <td>पर्यटकहरूको शिकायत दर्ताको लागि</td>
                                                    <td><a href="#" class="btn btn-sm btn-primary">डाउनलोड</a></td>
                                                </tr>
                                                <tr>
                                                    <td>फारम-६</td>
                                                    <td>सुझाव फारम</td>
                                                    <td>पर्यटन विकास सम्बन्धी सुझाव दिने</td>
                                                    <td><a href="#" class="btn btn-sm btn-primary">डाउनलोड</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="online-forms mt-4">
                                <h4>अनलाइन फारमहरू</h4>
                                <p>तलका फारमहरू अनलाइन भरेर पेश गर्न सक्नुहुन्छ:</p>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="card online-form-card">
                                            <div class="card-body">
                                                <h5 class="card-title">गाइड लाइसेन्स आवेदन</h5>
                                                <p class="card-text">पर्यटक गाइड लाइसेन्सको लागि अनलाइन आवेदन
                                                </p>
                                                <a href="#" class="btn btn-primary">अनलाइन भर्नुहोस्</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card online-form-card">
                                            <div class="card-body">
                                                <h5 class="card-title">होटल दर्ता आवेदन</h5>
                                                <p class="card-text">होटल दर्ताको लागि अनलाइन आवेदन</p>
                                                <a href="#" class="btn btn-primary">अनलाइन भर्नुहोस्</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card online-form-card">
                                            <div class="card-body">
                                                <h5 class="card-title">पर्यटक शिकायत</h5>
                                                <p class="card-text">पर्यटक सेवा सम्बन्धी शिकायत दर्ता</p>
                                                <a href="#" class="btn btn-primary">अनलाइन भर्नुहोस्</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
