@extends('users.user-dashboard')

@section('content')
    <div class="page-header py-lg-4 py-3">
        <div class="container">
            <h1 class="fw-bold fs-2 text-white">पर्यटन सम्बन्धी तथ्याङ्कहरू</h1>
        </div>
    </div>
    <div class="content-section my-lg-5 my-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">पर्यटन सम्बन्धी तथ्याङ्कहरू</h3>

                            <div class="statistics-tabs">
                                <h5>वार्षिक पर्यटक आगमन</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>वर्ष</th>
                                                <th>घरेलु पर्यटक</th>
                                                <th>विदेशी पर्यटक</th>
                                                <th>कुल पर्यटक</th>
                                                <th>वृद्धि दर (%)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($statistics as $stat)
                                            <tr>
                                                <td>{{ $stat->year }}</td>
                                                <td>{{ $stat->formatted_domestic }}</td>
                                                <td>{{ $stat->formatted_foreign }}</td>
                                                <td>{{ $stat->formatted_total }}</td>
                                                <td>{{ $stat->growth_rate }}%</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <a href="#" class="btn btn-primary mt-2">पूर्ण तथ्याङ्क डाउनलोड गर्नुहोस्</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection