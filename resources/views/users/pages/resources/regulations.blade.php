@extends('users.user-dashboard')

@section('content')
    <div class="page-header py-lg-4 py-3">
        <div class="container">
            <h1 class="fw-bold fs-2 text-white">पर्यटन सम्बन्धी नियमावलीहरू</h1>

        </div>
    </div>
    <div class="content-section my-lg-5 my-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">पर्यटन सम्बन्धी नियमावलीहरू</h3>

                            <div class="regulation-tabs">
                                <ul class="nav nav-tabs" id="regulationTabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="national-tab" data-bs-toggle="tab"
                                            data-bs-target="#national" type="button" role="tab">राष्ट्रिय
                                            नियमावली</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="provincial-tab" data-bs-toggle="tab"
                                            data-bs-target="#provincial" type="button" role="tab">प्रदेश
                                            नियमावली</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="local-tab" data-bs-toggle="tab" data-bs-target="#local"
                                            type="button" role="tab">स्थानीय नियमावली</button>
                                    </li>
                                </ul>

                                <div class="tab-content mt-3" id="regulationTabsContent">
                                    <div class="tab-pane fade show active" id="national" role="tabpanel">
                                        <div class="regulation-list">
                                            <div class="regulation-item">
                                                <h5>पर्यटन व्यवसाय नियमावली, २०७६</h5>
                                                <p>पर्यटन व्यवसाय (होटल, रेस्टुरेन्ट, ट्राभल एजेन्सी आदि) सञ्चालन गर्ने
                                                    नियमावली।</p>
                                                <div class="regulation-meta">
                                                    <span class="date">प्रभावी मिति: २०७६ असार १५</span>
                                                    <a href="#" class="btn btn-sm btn-primary float-end">डाउनलोड
                                                        गर्नुहोस्</a>
                                                </div>
                                            </div>

                                            <div class="regulation-item">
                                                <h5>पर्यटक गाइड नियमावली, २०७७</h5>
                                                <p>पर्यटक गाइडहरूको लाइसेन्स, प्रशिक्षण र सेवा मापदण्ड सम्बन्धी नियमावली।
                                                </p>
                                                <div class="regulation-meta">
                                                    <span class="date">प्रभावी मिति: २०७७ मंसिर १</span>
                                                    <a href="#" class="btn btn-sm btn-primary float-end">डाउनलोड
                                                        गर्नुहोस्</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="provincial" role="tabpanel">
                                        <div class="regulation-list">
                                            <div class="regulation-item">
                                                <h5>बागमती प्रदेश पर्यटन प्रवद्र्धन नियमावली, २०७९</h5>
                                                <p>प्रदेशभरि पर्यटन प्रवद्र्धन गर्ने सम्बन्धी नियमावली।</p>
                                                <div class="regulation-meta">
                                                    <span class="date">प्रभावी मिति: २०७९ फागुन १०</span>
                                                    <a href="#" class="btn btn-sm btn-primary float-end">डाउनलोड
                                                        गर्नुहोस्</a>
                                                </div>
                                            </div>

                                            <div class="regulation-item">
                                                <h5>प्रदेश सांस्कृतिक पर्यटन नियमावली, २०८०</h5>
                                                <p>प्रदेशका सांस्कृतिक पर्यटन स्थलहरूको व्यवस्थापन सम्बन्धी नियमावली।</p>
                                                <div class="regulation-meta">
                                                    <span class="date">प्रभावी मिति: २०८० बैशाख १</span>
                                                    <a href="#" class="btn btn-sm btn-primary float-end">डाउनलोड
                                                        गर्नुहोस्</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="local" role="tabpanel">
                                        <div class="regulation-list">
                                            <div class="regulation-item">
                                                <h5>ललितपुर महानगर होटल व्यवस्थापन नियमावली, २०७८</h5>
                                                <p>ललितपुर महानगरभरि होटल व्यवसाय सञ्चालन गर्ने सम्बन्धी नियमावली।</p>
                                                <div class="regulation-meta">
                                                    <span class="date">प्रभावी मिति: २०७८ असोज १५</span>
                                                    <a href="#" class="btn btn-sm btn-primary float-end">डाउनलोड
                                                        गर्नुहोस्</a>
                                                </div>
                                            </div>

                                            <div class="regulation-item">
                                                <h5>ललितपुर ऐतिहासिक स्थल संरक्षण नियमावली, २०८०</h5>
                                                <p>ललितपुरका ऐतिहासिक स्थलहरूको संरक्षण र व्यवस्थापन सम्बन्धी नियमावली।</p>
                                                <div class="regulation-meta">
                                                    <span class="date">प्रभावी मिति: २०८० जेठ १</span>
                                                    <a href="#" class="btn btn-sm btn-primary float-end">डाउनलोड
                                                        गर्नुहोस्</a>
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
    </div>
@endsection
