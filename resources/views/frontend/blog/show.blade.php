@extends('layouts.app')

@section('title', $post->meta_title ?? $post->title . ' — ' . setting('site_name', 'The Way'))

@section('content')

    <div id="sep-blog">
        <div class="container">
            <div class="sixteen columns">
                <div class="top-text">
                    <h1>{{ $post->title }}</h1>
                    <div class="subline"></div>
                    <div class="top-subtext">
                        {{ $post->published_at ? $post->published_at->format('F d, Y') : $post->created_at->format('F d, Y') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="blog-single-wrap">
        <div class="container">
            <div class="twelve columns">
                <div class="blog-post">
                    <div class="blog-icon">{!! $post->icon_html !!}</div>

                    @if($post->type === 'image' && $post->featured_image)
                        <img src="{{ Storage::disk('public')->url($post->featured_image) }}" alt="{{ $post->title }}" style="width:100%;margin-bottom:20px;"/>
                    @elseif($post->type === 'video' && $post->video_url)
                        <div class="video-wrap" style="margin-bottom:20px;">
                            <iframe src="{{ $post->video_url }}?wmode=transparent"></iframe>
                        </div>
                    @elseif($post->type === 'quote')
                        <h4 style="margin-bottom:10px;">"{{ $post->quote_text }}"</h4>
                        @if($post->quote_author)<h6>— {{ $post->quote_author }}</h6>@endif
                    @elseif($post->type === 'carousel' && $post->images->count())
                        <div id="owl-single-post" class="owl-carousel owl-theme" style="margin-bottom:20px;">
                            @foreach($post->images as $img)
                                <div class="item"><img src="{{ Storage::disk('public')->url($img->image) }}" alt=""/></div>
                            @endforeach
                        </div>
                    @elseif($post->type === 'audio' && $post->audio_file)
                        <div class="audio-player" style="margin-bottom:20px;">
                            <audio controls style="width:100%;">
                                <source src="{{ Storage::disk('public')->url($post->audio_file) }}" type="audio/mpeg">
                            </audio>
                        </div>
                    @endif

                    @if($post->content)
                        <div class="blog-content">{!! nl2br(e($post->content)) !!}</div>
                    @endif
                </div>

                <div style="margin-top:40px;">
                    <a href="{{ route('blog') }}">&larr; Back to Blog</a>
                </div>
            </div>

            <div class="four columns">
                <h5>Recent Posts</h5>
                @foreach($related as $rel)
                <div style="margin-bottom:15px;">
                    <a href="{{ route('blog.show', $rel->slug) }}"><strong>{{ $rel->title }}</strong></a>
                    <p><small>{{ $rel->published_at ? $rel->published_at->format('M d, Y') : $rel->created_at->format('M d, Y') }}</small></p>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    jQuery('#owl-single-post').owlCarousel({items: 1, loop: true, autoPlay: 3000});
</script>
@endpush
