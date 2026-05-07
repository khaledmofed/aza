@extends('layouts.app')

@section('title', 'Our Projects — ' . setting('site_name', 'The Way'))

@push('styles')
<style>
    #projects-hero {
        position: relative;
        padding-top: 150px;
        padding-bottom: 50px;
        overflow: hidden;
    }
    #projects-hero .parallax-portfolio {
        background-attachment: fixed;
    }
    #projects-hero h1 { color: #fff; }
    #projects-hero .top-subtext { color: rgba(255,255,255,0.8); }

    #projects-grid {
        background: #f7f7f7;
        padding: 70px 0 100px;
    }

    .projects-grid-wrap {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 28px;
        margin-top: 50px;
    }

    @media (max-width: 900px) {
        .projects-grid-wrap { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 580px) {
        .projects-grid-wrap { grid-template-columns: 1fr; }
    }

    .project-card {
        background: #fff;
        border-radius: 2px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.08);
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
    }
    .project-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 30px rgba(0,0,0,0.15);
    }

    .project-card-img {
        position: relative;
        overflow: hidden;
        height: 210px;
    }
    .project-card-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
        display: block;
    }
    .project-card:hover .project-card-img img {
        transform: scale(1.05);
    }
    .project-card-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0,0,0,0);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.3s;
    }
    .project-card:hover .project-card-overlay {
        background: rgba(0,0,0,0.4);
    }
    .project-card-overlay span {
        color: #fff;
        font-family: 'Montserrat', sans-serif;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 3px;
        text-transform: uppercase;
        border: 2px solid #fff;
        padding: 8px 20px;
        opacity: 0;
        transform: translateY(10px);
        transition: opacity 0.3s, transform 0.3s;
    }
    .project-card:hover .project-card-overlay span {
        opacity: 1;
        transform: translateY(0);
    }

    .project-card-body {
        padding: 20px 22px 24px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    .project-card-category {
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #c0392b;
        margin-bottom: 8px;
        font-family: 'Montserrat', sans-serif;
    }
    .project-card-title {
        font-family: 'Montserrat', sans-serif;
        font-size: 13px;
        font-weight: 700;
        color: #222;
        line-height: 1.5;
        margin-bottom: 10px;
        flex: 1;
    }
    .project-card-client {
        font-size: 12px;
        color: #888;
        margin-top: auto;
        padding-top: 12px;
        border-top: 1px solid #f0f0f0;
    }
    .project-card-client i { margin-right: 5px; color: #bbb; }

    .btn-back {
        display: inline-block;
        margin-top: 50px;
        padding: 12px 32px;
        border: 2px solid #333;
        color: #333;
        font-family: 'Montserrat', sans-serif;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 3px;
        text-transform: uppercase;
        text-decoration: none;
        transition: all 0.2s;
    }
    .btn-back:hover {
        background: #333;
        color: #fff;
        text-decoration: none;
    }
    .btn-back i { margin-right: 8px; }
</style>
@endpush

@section('content')

    {{-- Hero --}}
    <div id="projects-hero">
        <div class="parallax-portfolio" style="background: #ccc;" ></div>
        <div class="background-grid"></div>
        <div class="container">
            <div class="sixteen columns">
                <div class="top-text">
                    <h1>Our Projects</h1>
                    <div class="subline"></div>
                    <div class="top-subtext">{{ $items->count() }} projects across UAE and the region</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Grid --}}
    <div id="projects-grid">
        <div class="container">

            <div class="projects-grid-wrap">
                @foreach($items as $item)
                <a href="{{ route('portfolio.show', $item->slug) }}" class="project-card" style="text-decoration:none;color:inherit;">
                    <div class="project-card-img">
                        <img src="{{ Storage::disk('public')->url($item->image) }}" alt="{{ $item->title }}">
                        <div class="project-card-overlay">
                            <span>View Project</span>
                        </div>
                    </div>
                    <div class="project-card-body">
                        @if($item->category)
                            <div class="project-card-category">{{ $item->category }}</div>
                        @endif
                        <div class="project-card-title">{{ $item->title }}</div>
                        @if($item->client)
                            <div class="project-card-client">
                                <i class="bi bi-building"></i>{{ $item->client }}
                            </div>
                        @endif
                    </div>
                </a>
                @endforeach
            </div>

            <div style="text-align:center;">
                <a href="{{ route('home') }}#works" class="btn-back">
                    <i class="bi bi-arrow-left"></i> Back to Home
                </a>
            </div>

        </div>
    </div>

@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('.parallax-portfolio').parallax("50%", 0.5);
    });
</script>
@endpush
