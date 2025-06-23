@extends('users.user-dashboard')
<style>
    i.fas.fa-chevron-down {
        display: none;
    }
    .service-feature {
        background: #dee2e6;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 20px;
        border-left: 4px solid #d21a28;
    }
    .service-feature h5 {
        color: #d21a28;
    }
</style>
@section('content')

<div class="inner-banner d-flex align-items-center" style="background-image: url('{{ asset($category->image) }}');">
    <div class="container h-100 px-lg-5 py-5 ">
        <div class="inner-banner__content">
            <div class="inner-banner__content__title">
                <h1 class="mb-lg-4 mb-3">{{ $category->name }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb pb-0 mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="inner-main-content py-lg-4 py-3">
    <div class="container px-lg-5 p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-main--content__left">
                    <h5>About Our {{ $category->name }} Services</h5>
                    
                    @if($category->products->isNotEmpty())
                        <div class="row">
                            @foreach($category->products as $product)
                                <div class="service-feature">
                                    <h5>{{ $product->name }}</h5>
                                    <p>{!! $product->description !!}</p>
                                    @if($product->image)
                                        <img src="{{ asset($product->image) }}" class="img-fluid my-3" alt="{{ $product->name }}" style="max-height: 300px;width:100%">
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="alert alert-info">No services added yet</div>
                    @endif

                    <div class="accordion custom-accordion mt-3" id="shippingAccordion">
                        <!-- Shipping Process -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    Our Shipping Process
                                    <span class="accordion-icon"><i class="fas fa-chevron-down"></i></span>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse"
                                aria-labelledby="headingOne" data-bs-parent="#shippingAccordion">
                                <div class="accordion-body">
                                    @if($category->products->isNotEmpty() && $category->products[0]->reasons_to_study)
                                        {!! $category->products[0]->reasons_to_study !!}
                                    @else
                                        <p>We provide end-to-end shipping solutions from China to Nepal including:
                                            <ul>
                                                <li>Door-to-door delivery</li>
                                                <li>Customs clearance assistance</li>
                                                <li>Cargo consolidation</li>
                                                <li>Air and sea freight options</li>
                                            </ul>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Cost & Pricing -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Cost & Pricing
                                    <span class="accordion-icon"><i class="fas fa-chevron-down"></i></span>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#shippingAccordion">
                                <div class="accordion-body">
                                    @if($category->products->isNotEmpty() && $category->products[0]->scholarships)
                                        {!! $category->products[0]->scholarships !!}
                                    @else
                                        <p>Our competitive pricing includes:
                                            <ul>
                                                <li>Transparent pricing with no hidden fees</li>
                                                <li>Volume discounts for bulk shipments</li>
                                                <li>Insurance options available</li>
                                                <li>Custom quotes based on your specific needs</li>
                                            </ul>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Documentation -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    Required Documentation
                                    <span class="accordion-icon"><i class="fas fa-chevron-down"></i></span>
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="headingThree" data-bs-parent="#shippingAccordion">
                                <div class="accordion-body">
                                    @if($category->products->isNotEmpty() && $category->products[0]->application_process)
                                        {!! $category->products[0]->application_process !!}
                                    @else
                                        <p>Typical documentation required:
                                            <ul>
                                                <li>Commercial invoice</li>
                                                <li>Packing list</li>
                                                <li>Bill of lading/airway bill</li>
                                                <li>Import license (if applicable)</li>
                                                <li>Tax registration certificate</li>
                                            </ul>
                                        </p>
                                    @endif
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