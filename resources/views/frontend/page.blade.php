@extends('layouts.app')

@section('title', $page->meta_title ?? $page->title . ' — ' . setting('site_name', 'The Way'))
@section('meta_description', $page->meta_description ?? '')

@section('content')

    @if($page->hero_image)
    <div id="sep-blog" style="background-image:url('{{ Storage::disk('public')->url($page->hero_image) }}');background-size:cover;background-position:center;">
    @else
    <div id="sep-blog">
    @endif
        <div class="parallax"></div>
        <div class="background-grid"></div>
        <div class="container">
            <div class="sixteen columns">
                <div class="top-text">
                    <h1>{{ $page->title }}</h1>
                    <div class="subline"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="page-content">
        <div class="container">
            <div class="sixteen columns" style="padding:40px 0;">
                {!! $page->content !!}
            </div>
        </div>
    </div>

@endsection
