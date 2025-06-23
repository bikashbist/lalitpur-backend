@extends('users.user-dashboard')

@section('content')
    <div class="page-header py-lg-4 py-3">
        <div class="container">
            <h1 class="fw-bold fs-2 text-white">नियमावलीहरू</h1>
        </div>
    </div>
    
    <div class="content-section my-lg-5 my-3">
        <div class="container">
            <section id="rules" class="about-section">
                <h2>नियमावलीहरू</h2>
                <div class="row">
                    <div class="col-md-12">
                        <div class="about-card card">
                            <div class="card-body">
                                <h5 class="card-title">कार्यालय सम्बन्धी नियमावली</h5>
                                <p>हाम्रो कार्यालयले निम्न नियमावलीहरू अनुसरण गर्दछ:</p>
                                @if($rules->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>नियमावली</th>
                                                <th>डाउनलोड</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($rules as $rule)
                                            <tr>
                                                <td>{{ $rule->title }}</td>
                                                <td>
                                                    <a href="{{ $rule->file_url }}" 
                                                       class="btn btn-sm btn-primary" 
                                                       download="{{ basename($rule->file_path) }}">
                                                        डाउनलोड
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @else
                                <div class="alert alert-info">
                                    Currently no rules and regulations available.
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection