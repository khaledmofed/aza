@extends('layouts.app')

@section('title', $item->title . ' — ' . setting('site_name', 'The Way'))

@push('styles')
<link rel="stylesheet" href="{{ asset('css/jquery.bxslider.css') }}">
@endpush

@section('content')

    {{-- Hero Parallax --}}
    <div id="sep-portfolio">
        <div class="parallax-portfolio" style="background-image: url('{{ Storage::disk('public')->url($item->image) }}') !important; background-size: cover !important; background-position: center center !important;"></div>
        <div class="background-grid"></div>
        <div class="container">
            <div class="sixteen columns">
                <div class="top-text">
                    <h1>{{ $item->title }}</h1>
                    <div class="subline"></div>
                    @if($item->subtitle)
                        <div class="top-subtext">{{ $item->subtitle }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Prev / Next / Back Controls --}}
    <div id="portfolio-controls">
        @if($prev)
            <a href="{{ route('portfolio.show', $prev->slug) }}">
                <div class="left-right-portfolio">
                    <div class="portfolio-icon">&#xf100;</div>
                </div>
            </a>
        @else
            <div class="left-right-portfolio" style="opacity:.3;">
                <div class="portfolio-icon">&#xf100;</div>
            </div>
        @endif

        <a href="{{ route('home') }}#works">
            <div class="center-portfolio">
                <div class="portfolio-icon">&#xf00a;</div>
            </div>
        </a>

        @if($next)
            <a href="{{ route('portfolio.show', $next->slug) }}">
                <div class="left-right-portfolio">
                    <div class="portfolio-icon">&#xf101;</div>
                </div>
            </a>
        @else
            <div class="left-right-portfolio" style="opacity:.3;">
                <div class="portfolio-icon">&#xf101;</div>
            </div>
        @endif
    </div>

    {{-- Portfolio Content --}}
    <div id="portfolio-item">
        <div class="container">

            <div class="one-third column" data-scrollreveal="enter bottom and move 50px over 1s">
                @if($item->description)
                    <h6>Project Description</h6>
                    <p>{{ $item->description }}</p>
                @endif
            </div>

            <div class="one-third column" data-scrollreveal="enter bottom and move 50px over 1s">
                @if($item->details)
                    <h6>Project Details</h6>
                    <p>{{ $item->details }}</p>
                @endif
            </div>

            <div class="one-third column" data-scrollreveal="enter bottom and move 50px over 1s">
                <h6>Project Info</h6>
                @if($item->client)
                    <p><span>Client:</span> <small>{{ $item->client }}</small></p>
                @endif
                @if($item->project_date)
                    <p><span>Date:</span> <small>{{ $item->project_date }}</small></p>
                @endif
                @if($item->category)
                    <p><span>Category:</span> <small>{{ $item->category }}</small></p>
                @endif
                @if($item->website_url)
                    <p><span>Website:</span> <a href="{{ $item->website_url }}" target="_blank"><small>{{ $item->website_url }}</small></a></p>
                @endif
            </div>

            {{-- Gallery Slider --}}
            @if($item->images->isNotEmpty())
            <div class="sixteen columns" data-scrollreveal="enter bottom and move 50px over 1s">
                <ul class="bxslider">
                    @foreach($item->images as $img)
                        <li><img src="{{ Storage::disk('public')->url($img->image) }}" alt="{{ $item->title }}"></li>
                    @endforeach
                </ul>
            </div>
            @elseif($item->image)
            <div class="sixteen columns" data-scrollreveal="enter bottom and move 50px over 1s" style="margin-top:30px;">
                <img src="{{ Storage::disk('public')->url($item->image) }}" alt="{{ $item->title }}" style="width:100%;">
            </div>
            @endif

        </div>
    </div>

@endsection

@push('scripts')
<script type="text/javascript" src="{{ asset('js/jquery.bxslider.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.bxslider').bxSlider({
            adaptiveHeight: true,
            touchEnabled: true,
            pager: false,
            controls: true,
            auto: true,
            slideMargin: 1
        });
        $('.parallax-portfolio').parallax("50%", 0.5);
    });
</script>
@endpush
