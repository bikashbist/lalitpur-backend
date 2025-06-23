@extends('users.user-dashboard')

@section('content')
<div class="inner-banner d-flex align-items-center" style="background-image: url('{{ asset($category->image) }}');">
    <div class="container h-100 px-lg-5 p-0">
        <div class="inner-banner__content">
            <div class="inner-banner__content__title">
                <h1 class="mb-lg-4 mb-3">{{ $category->name }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb pb-0 mb-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
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
                    <!-- Category Description Section -->
                    {{-- <h5> {{ $category->name }} </h5>
                    
                    @if($category->image)
                    <div class="text-center mb-4">
                        <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" class="img-fluid rounded" style="max-height: 400px;">
                    </div>
                    @endif --}}
                    
                    {{-- <div class="category-description">
                        @if($testPreparations->isNotEmpty())
                            <p>{{ $testPreparations->first()->description }}</p>
                        @else
                            <p>No description available for this category.</p>
                        @endif
                    </div> --}}

                    <!-- Test Preparation Content -->
                    <p>{{ $category->description }}</p>
                    @foreach($testPreparations as $index => $preparation)
                    <div class="preparation-content mb-5">
                        <!-- Title and Description Outside Accordion -->
                        <h5 class="mt-4">{{ $preparation->title }}</h5>
                        
                       
                        
                        <div class="preparation-description mb-4">
                           <p> {!! $preparation->description !!}</p>
                        </div>
                        @if($preparation->image)
                        <div class=" mb-3">
                            <img src="{{ asset($preparation->image) }}" alt="{{ $preparation->title }}" class="img-fluid rounded" >
                        </div>
                        @endif
                        
                        <!-- Accordion for Items -->
                        @if($preparation->items->isNotEmpty())
                        <div class="accordion custom-accordion" id="preparationAccordion{{ $index }}">
                            <h4 class="mb-3">Program Details:</h4>
                            
                            @foreach($preparation->items as $itemIndex => $item)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $index }}_{{ $itemIndex }}">
                                    <button class="accordion-button {{ $itemIndex == 0 ? '' : 'collapsed' }}" 
                                            type="button" 
                                            data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $index }}_{{ $itemIndex }}" 
                                            aria-expanded="{{ $itemIndex == 0 ? 'true' : 'false' }}" 
                                            aria-controls="collapse{{ $index }}_{{ $itemIndex }}">
                                        {{ $item->title }}
                                        <span class="accordion-icon"><i class="fas fa-chevron-down"></i></span>
                                    </button>
                                </h2>
                                <div id="collapse{{ $index }}_{{ $itemIndex }}" 
                                     class="accordion-collapse collapse {{ $itemIndex == 0 ? 'show' : '' }}" 
                                     aria-labelledby="heading{{ $index }}_{{ $itemIndex }}" 
                                     data-bs-parent="#preparationAccordion{{ $index }}">
                                    <div class="accordion-body">
                                        @if($item->image)
                                        <div class="text-center mb-3">
                                            <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="img-fluid rounded" style="max-height: 250px;">
                                        </div>
                                        @endif
                                        {!! $item->description !!}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    @endforeach
                    
                    @if($testPreparations->isEmpty())
                    <div class="alert alert-success mt-4">
                        No preparation programs available for this category yet.
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
{{-- 
<style>
    .category-description img, 
    .preparation-description img {
        max-width: 100%;
        height: auto;
    }
    .accordion-button:not(.collapsed) {
        background-color: #f8f9fa;
        color: #0d6efd;
    }
    .accordion-button:focus {
        box-shadow: none;
        border-color: rgba(0,0,0,.125);
    }
    .accordion-body {
        padding: 1.5rem;
    }
    .accordion-icon {
        transition: transform 0.3s ease;
    }
    .accordion-button:not(.collapsed) .accordion-icon {
        transform: rotate(180deg);
    }
    .preparation-content {
        border-bottom: 1px solid #eee;
        padding-bottom: 2rem;
    }
    .preparation-content:last-child {
        border-bottom: none;
    }
</style> --}}
@endsection