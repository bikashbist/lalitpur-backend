@extends('users.user-dashboard')

@section('content')
    <div class="inner-banner bg-body-tertiary">

        <div class="container">
            <div class="inner-banner__content text-center text-white">
                <h1> All Product </h1>
                <p>We are here to help you see better.</p>
            </div>
        </div>
    </div>
    <div class="shop-glass py-lg-5 py-3">
        <div class="container">
            <div class="row g-4">
                @foreach($products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="{{ route('product.details', $product->id) }}">
                            <div class="product text-center">
                                <div class="product__img">
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->title }}" class="img-fluid">
                                </div>
                                <p>{{ $product->title }}</p>
                                <strong>Rs: {{ $product->price }}</strong>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
