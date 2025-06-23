@extends('users.user-dashboard')

@section('content')
    <div class="inner-banner d-flex align-items-center " style="background-image: url('images/inner-banner.jpg');">
        <div class="container  h-100 px-lg-5 px-4">
            <div class="inner-banner__content ">

                <div class="inner-banner__content__title">
                    <h1 class="mb-lg-4 mb-3">Awards</h1>

                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb pb-0 mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">awards</li>
                        </ol>
                    </nav>
                </div>


            </div>
        </div>
    </div>
    <div class="inner-main-content  ">

        <div class="services py-lg-4 px-4">
            <div class="container">
              
               <div class="row">
                @foreach ($data as $data)
                @if($data->pdf_path)
                <div class="col-lg-3">
                <a class="text-decoration-none" href="{{ asset($data->pdf_path) }}" target="_blank">
         
                    <div class="item">
                        <div class="services__content h-100 text-center">
                            @if($data->image_path)
                            <img src="{{ asset($data->image_path) }}" width="100" alt="data Image">
                        @endif
                            <h2>{{ $data->name }}</h2>
                           
                        </div>
                    </div>
                   </a>
                </div>
                    @endif
                @endforeach
               

                
               </div>
                 

  
    
            </div>
        </div>

      
    </div>
@endsection
