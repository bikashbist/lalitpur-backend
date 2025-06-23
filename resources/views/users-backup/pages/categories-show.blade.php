@extends('users.user-dashboard')

@section('content')

<div class="inner-banner d-flex align-items-center " style="background-image: url('{{ asset( $category->image) }}');">
    <div class="container h-100 px-lg-5 p-0">
        <div class="inner-banner__content">
            <div class="inner-banner__content__title">
                <h1 class="mb-lg-4 mb-3">{{ $category->title }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb pb-0 mb-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $category->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="inner-main-content py-lg-4 py-3">
    <div class="container px-lg-5 p-0">
        <div class="row">
            <div class="col-lg-8">
                <div class="inner-main--content__left">
                    <h5>{{ $category->title }}</h5>
                    <p>{!! $category->description !!}</p> {{-- Use {!! !!} if it's HTML --}}

                    {{-- @if ($category->image)
                        <img src="{{ asset( $category->image) }}" alt="{{ $category->title }}" class="img-fluid rounded-3">
                    @endif --}}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="inner-main--content__right">
                    <div class="related-links p-3">
                        <h5 class="mb-3">RELATED LINKS</h5>
                        <ul class="list-unstyled">
                            @forelse ($allCategories as $cat)
                                <li>
                                    <a href="{{ route('services.page', $cat->id) }}" class="related-link">
                                        {{ $cat->title }}
                                    </a>
                                </li>
                            @empty
                                <li>No categories available.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
