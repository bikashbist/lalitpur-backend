@extends('users.user-dashboard')
<style>
    .contact-section {
        padding: 50px 0;
    }

    .contact-card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        padding: 30px;
        margin-bottom: 30px;
        height: 100%;
    }

    .contact-icon {
        width: 60px;
        height: 60px;
        background: #0d6efd;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .contact-title {
        font-weight: 600;
        margin-bottom: 15px;
    }

    .contact-info {
        color: #555;
    }

    .contact-form {
        background: #f8f9fa;
        padding: 30px;
        border-radius: 10px;
    }

    .form-title {
        font-weight: 600;
        margin-bottom: 20px;
        color: #333;
    }

    .map-container {
        height: 400px;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .social-links {
        margin-top: 20px;
    }

    .social-links a {
        display: inline-block;
        width: 40px;
        height: 40px;
        background: #f0f0f0;
        color: #555;
        border-radius: 50%;
        text-align: center;
        line-height: 40px;
        margin-right: 10px;
        transition: all 0.3s;
    }

    .social-links a:hover {
        background: #0d6efd;
        color: white;
    }
</style>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
@section('content')
    <div class="page-header py-lg-4 py-3">
        <div class="container">
            <h1 class="fw-bold fs-2 text-white">सम्पर्क</h1>

        </div>
    </div>
    </div>

    <div class="contact-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-4">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h3 class="contact-title">हाम्रो ठेगाना</h3>
                        <div class="contact-info">
                            पर्यटन कार्यालय ललितपुर<br>
                            पुल्चोक, ललितपुर<br>
                            बागमती प्रदेश, नेपाल
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <h3 class="contact-title">हामीलाई कल गर्नुहोस्</h3>
                        <div class="contact-info">
                            <strong>फोन:</strong> +९७७-१-५५२३४२१, ५५२३४२२<br>
                            <strong>फ्याक्स:</strong> +९७७-१-५५२३४२३<br>
                            <strong>मोबाइल:</strong> +९७७-९८५१०२०३०४
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h3 class="contact-title">इमेल गर्नुहोस्</h3>
                        <div class="contact-info">
                            <strong>इमेल:</strong> info@tourismlalitpur.gov.np<br>
                            <strong>वेबसाइट:</strong> www.tourismlalitpur.gov.np
                        </div>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">


                <div class="col-md-12">
                    <div class="map-container" id="officeMap"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
