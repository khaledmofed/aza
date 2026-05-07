@extends('layouts.app')

@section('title', 'Blog — ' . setting('site_name', 'The Way'))

@section('content')

    <div id="sep-blog">
        <div class="container">
            <div class="sixteen columns">
                <div class="top-text">
                    <h1>From The Blog</h1>
                    <div class="subline"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="blog-list">
        <div class="container">
            <div class="clear"></div>
            <div id="blog-mas">
                @forelse($posts as $post)
                <div class="one-third column item-blog">
                    <div class="blog-post" data-scrollreveal="enter bottom and move 50px over 1s">
                        <div class="blog-icon">{!! $post->icon_html !!}</div>
                        <h6>{{ $post->title }}</h6>

                        @if($post->type === 'image' && $post->featured_image)
                            <img src="{{ Storage::disk('public')->url($post->featured_image) }}" alt="{{ $post->title }}"/>
                        @elseif($post->type === 'video' && $post->video_url)
                            <div class="video-wrap">
                                <iframe src="{{ $post->video_url }}?wmode=transparent"></iframe>
                            </div>
                        @elseif($post->type === 'quote')
                            <h4>{{ $post->quote_text }}</h4>
                        @elseif($post->type === 'carousel' && $post->images->count())
                            <div class="owl-carousel owl-theme owl-blog-{{ $post->id }}">
                                @foreach($post->images as $img)
                                    <div class="item">
                                        <img src="{{ Storage::disk('public')->url($img->image) }}" alt=""/>
                                    </div>
                                @endforeach
                            </div>
                        @elseif($post->type === 'audio' && $post->audio_file)
                            <div class="audio-player">
                                <audio controls>
                                    <source src="{{ Storage::disk('public')->url($post->audio_file) }}" type="audio/mpeg">
                                </audio>
                            </div>
                        @endif

                        <p><span>{{ $post->published_at ? $post->published_at->format('F d, Y') : $post->created_at->format('F d, Y') }}</span></p>
                        @if($post->excerpt)<p>{{ $post->excerpt }}</p>@endif
                        @if($post->type !== 'quote')
                            <a href="{{ route('blog.show', $post->slug) }}"><p>read more</p></a>
                        @endif
                    </div>
                </div>
                @empty
                    <div class="sixteen columns"><p>No posts found.</p></div>
                @endforelse
            </div>
            <div class="sixteen columns" style="margin-top:30px;">
                {{ $posts->links() }}
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    var container = document.querySelector('#blog-mas');
    if (container) {
        var msnry = new Masonry(container, {itemSelector: '.item-blog'});
    }
    jQuery('[class*="owl-blog-"]').each(function () {
        jQuery(this).owlCarousel({items: 1, loop: true, autoPlay: 3000});
    });
</script>
@endpush
