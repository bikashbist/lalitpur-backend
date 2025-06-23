@extends('users.user-dashboard')

@section('content')




    @if ($banner)
        <div class="inner-banner d-flex align-items-center py-5" style="background-image: url('{{ asset($banner->image) }}')">
            <div class="container  h-100 px-lg-5 px-4">
                <div class="inner-banner__content ">

                    <div class="inner-banner__content__title">
                        <h1 class="mb-lg-4 mb-3">Our Products</h1>

                        <nav aria-label="breadcrumb ">
                            <ol class="breadcrumb pb-0 mb-0">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Our Products</li>
                            </ol>
                        </nav>
                    </div>


                </div>
            </div>
        </div>
    @endif

    <div class="inner-main-content py-lg-4 py-3 ">
        <section class="product-categories">
            <div class="container">
               
                <div class="row">
                    @foreach (\App\Models\MenuCategory::get() as $category)  
                        <div class="col-md-3 col-6">
                            <div class="category-card">
                                <div class="category-image">
                                    <img src="{{ asset($category->image) }}" alt="Electronics">
                                </div>
                                <h3>{{ $category->name }}</h3>
                                <a href="{{ route('Product-Categories', ['id' => $category->id]) }}" class="category-link">View Details</a>
                            </div>
                        </div>
                    @endforeach
                   
                </div>
           
            </div>
        </section>
    </div>

@endsection
