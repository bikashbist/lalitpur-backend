@extends('users.user-dashboard')

@section('content')

     <!-- PRODUCT TAB AREA START (product-item-3) -->
     <div class="ltn__product-tab-area ltn__product-gutter pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h1 class="section-title">Our Products</h1>
                        <p>A highly efficient slip-ring scanner for today's diagnostic requirements.</p>
                    </div>
                    <!-- Dynamic Tab Menu -->
                    <div class="ltn__tab-menu ltn__tab-menu-2 ltn__tab-menu-top-right-- text-uppercase text-center">
                        <div class="nav">
                            @foreach ($categories as $category)
                                <a class="@if ($loop->first) active show @endif" data-bs-toggle="tab"
                                    href="#liton_tab_{{ $category->id }}">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <!-- Dynamic Tab Content -->
                    <div class="tab-content">
                        @foreach ($categories as $category)
                            <div class="tab-pane fade @if ($loop->first) active show @endif"
                                id="liton_tab_{{ $category->id }}">
                                <div class="ltn__product-tab-content-inner">
                                    <div class="row  ">
                                        @foreach ($category->products as $product)
                                            <!-- ltn__product-item -->
                                            <div class="col-lg-3">
                                                <div class="ltn__product-item ltn__product-item-3 text-center">
                                                    <div class="product-img">
                                                        <a href="#"><img
                                                                src="{{ asset( $product->image) }}"
                                                                alt="{{ $product->name }}"></a>
                                                        <div class="product-badge">
                                                            <ul>
                                                                <li class="sale-badge">RS: {{ $product->price }}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <div class="product-ratting">
                                                            <ul>
                                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                <li><a href="#"><i
                                                                            class="fas fa-star-half-alt"></i></a></li>
                                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <h2 class="product-title"><a
                                                                href="#">{{ $product->name }}</a></h2>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ltn__product-item End -->
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT TAB AREA END -->

@endsection