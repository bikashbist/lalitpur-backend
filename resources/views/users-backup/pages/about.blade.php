@extends('users.user-dashboard')

@section('content')




    @if ($banner)
        <div class="inner-banner d-flex align-items-center py-5" style="background-image: url('{{ asset($banner->image) }}')">
            <div class="container  h-100 px-lg-5 px-4">
                <div class="inner-banner__content ">

                    <div class="inner-banner__content__title">
                        <h1 class="mb-lg-4 mb-3">About Us</h1>

                        <nav aria-label="breadcrumb ">
                            <ol class="breadcrumb pb-0 mb-0">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">About Us</li>
                            </ol>
                        </nav>
                    </div>


                </div>
            </div>
        </div>
    @endif

    <div class="inner-main-content py-lg-4 py-3 ">
        <div class="container px-lg-5 px-4">

            @if ($groups->count() > 0 && $groups[0]->aboutUsEntries->count() > 0)
                <div class="row">

                    <div class="col-lg-7">
                        @php
                            $firstItem = $groups[0]->aboutUsEntries->first();
                        @endphp

                        <h5>{{ $firstItem->title }}</h5>
                        <div>
                            {!! $firstItem->description !!}
                        </div>
                    </div>
                    <div class="col-lg-5">
                        @if ($firstItem->image)
                            <img src="{{ asset($firstItem->image) }}" alt="About Us Image" class="img-fluid mt-3 mb-3"
                                style="max-width: 100%;">
                        @endif
                    </div>
                </div>
            @endif


            <div class="inner-details my-4">
                @foreach ($groups as $group)
                    @foreach ($group->aboutUsEntries->skip(1) as $index => $entry)
                        <div class="row g-0 ">
                            @if ($index % 2 == 0)
                                {{-- Even index: Text left, Image right --}}
                                <div class="col-lg-6 bg-footer-color text-white bg-primary p-4 d-flex align-items-center">
                                    <div class="p-lg-4 p-3">
                                        <h5 class="text-white">{{ $entry->title }}</h5>
                                        <p class="text-white">{!! $entry->description !!}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <img src="{{ asset($entry->image) }}" alt="{{ $entry->title }}" class="img-fluid w-100">
                                </div>
                            @else
                                {{-- Odd index: Image left, Text right --}}
                                <div class="col-lg-6">
                                    <img src="{{ asset($entry->image) }}" alt="{{ $entry->title }}" class="img-fluid w-100">
                                </div>
                                <div class="col-lg-6 bg-footer-color text-white bg-info p-4 d-flex align-items-center">
                                    <div class="p-lg-4 p-3">
                                        <h5 class="text-white">{{ $entry->title }}</h5>
                                        <p class="text-white">{!! $entry->description !!}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                @endforeach
            </div>

        </div>
    </div>

@endsection
