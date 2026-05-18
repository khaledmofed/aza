@extends('layouts.app')

@push('styles')
@if(setting('parallax1_image'))
<style>.parallax { background-image: url("{{ asset_image(setting('parallax1_image')) }}") !important; }</style>
@endif
@if(setting('parallax2_image'))
<style>.parallax1 { background-image: url("{{ asset_image(setting('parallax2_image')) }}") !important; }</style>
@endif
@if(setting('parallax4_image'))
<style>.parallax2 { background-image: url("{{ asset_image(setting('parallax4_image')) }}") !important; }</style>
@endif
@if(setting('parallax3_image'))
<style>.parallax3 { background-image: url("{{ asset_image(setting('parallax3_image')) }}") !important; }</style>
@endif
@endpush

@section('content')

    {{-- ======================================================
         HERO — Revolution Slider
    ======================================================= --}}
    <div id="home">
        <div class="tp-banner-container">
            <div class="tp-banner">
                <ul>
                    @foreach($sliders as $slide)
                    <li data-transition="{{ $slide->transition }}" data-slotamount="5" data-masterspeed="700">
                        <img src="{{ Storage::disk('public')->url($slide->image) }}"
                             alt="slide"
                             data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
                        <div class="just_pattern"></div>
                        <div class="slidecontent caption customin customout start"
                             data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                             data-customout="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-speed="1000" data-start="500" data-easing="Back.easeInOut" data-endspeed="300">
                            @if($slide->subtitle)
                                <span class="headersur">{{ $slide->subtitle }}</span>
                            @endif
                            @if($slide->title)
                                <h1><span>
                                    {{ $slide->title }}
                                    @if($slide->title_highlight)
                                        <span>{{ $slide->title_highlight }}</span>
                                    @endif
                                </span></h1>
                            @endif
                        </div>
                    </li>
                    @endforeach
                </ul>
                <div class="tp-bannertimer"></div>
            </div>
        </div>
    </div>


    {{-- ======================================================
         ABOUT
    ======================================================= --}}
    <div id="about">
        <div class="container">
            <div class="sixteen columns">
                <div class="top-text">
                    <h1>{{ $about->heading }}</h1>
                    <div class="subline"></div>
                </div>
            </div>
            <div class="six columns" data-scrollreveal="enter left and move 50px over 1s">
                <ul id="elasticstack" class="elasticstack">
                    @foreach($aboutImages as $img)
                        <li>
                            <img src="{{ Storage::disk('public')->url($img->image) }}" alt="about"/>
                            <h4>Drag Me</h4>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="ten columns" data-scrollreveal="enter right and move 50px over 1s">
                <h5>{{ $about->subheading }}</h5>
                <p class="subtext">{{ $about->subtext }}</p>
                <p>{{ $about->body_text }}</p>
            </div>
            <div class="sixteen columns">
                <div class="line-separator"></div>
            </div>
            <div class="one-third column" data-scrollreveal="enter left and move 50px over 1s">
                <h5>{{ $about->col1_heading }}</h5>
                <p>{{ $about->col1_text }}</p>
            </div>
            <div class="one-third column" data-scrollreveal="enter bottom and move 50px over 1s">
                <h5>{{ $about->col2_heading }}</h5>
                <p>{{ $about->col2_text }}</p>
            </div>
            <div class="one-third column" data-scrollreveal="enter right and move 50px over 1s">
                <h5>{{ $about->col3_heading }}</h5>
                <p>{{ $about->col3_text }}</p>
            </div>
        </div>
    </div>


    {{-- ======================================================
         TEAM — Featured Member
    ======================================================= --}}
    @php $featured = $team->firstWhere('is_featured', true); @endphp
    @if($featured)
    <div id="team">
        <div class="container">
            <div class="sixteen columns">
                <div class="top-text">
                    <h1>{{ $featured->name }}</h1>
                    <div class="subline"></div>
                    <div class="top-subtext">{{ $featured->position }}</div>
                </div>
            </div>
            <div class="clear"></div>
            @if($featured->bio)
            <div class="ten columns" data-scrollreveal="enter right and move 50px over 1s">
                @php $bioLimit = 1200; $bioFull = $featured->bio; $bioShort = mb_substr($bioFull, 0, $bioLimit); @endphp
                @if(mb_strlen($bioFull) > $bioLimit)
                    <p>
                        <span id="bio-short">{{ $bioShort }}&hellip; <a href="#" id="bio-read-more" style="color:inherit;font-weight:bold;">read more</a></span>
                        <span id="bio-full" style="display:none;">{{ $bioFull }} <a href="#" id="bio-read-less" style="color:inherit;font-weight:bold;">read less</a></span>
                    </p>
                    <script>
                        document.getElementById('bio-read-more').addEventListener('click', function(e) {
                            e.preventDefault();
                            document.getElementById('bio-short').style.display = 'none';
                            document.getElementById('bio-full').style.display = 'inline';
                        });
                        document.getElementById('bio-read-less').addEventListener('click', function(e) {
                            e.preventDefault();
                            document.getElementById('bio-full').style.display = 'none';
                            document.getElementById('bio-short').style.display = 'inline';
                        });
                    </script>
                @else
                    <p>{{ $bioFull }}</p>
                @endif
            </div>
            @endif
            <div class="{{ $featured->bio ? 'six' : 'sixteen' }} columns" data-scrollreveal="enter left and move 50px over 1s">
                <div class="team-mem">
                    <img src="{{ Storage::disk('public')->url($featured->photo) }}" alt="{{ $featured->name }}"/>
                    <div class="social-team">
                        <ul class="team-social">
                            @if($featured->twitter)
                                <li class="icon-team"><a href="{{ $featured->twitter }}" target="_blank">&#xf099;</a></li>
                            @endif
                            @if($featured->facebook)
                                <li class="icon-team"><a href="{{ $featured->facebook }}" target="_blank">&#xf09a;</a></li>
                            @endif
                            @if($featured->github)
                                <li class="icon-team"><a href="{{ $featured->github }}" target="_blank">&#xf09b;</a></li>
                            @endif
                            @if($featured->googleplus)
                                <li class="icon-team"><a href="{{ $featured->googleplus }}" target="_blank">&#xf0d5;</a></li>
                            @endif
                            @if($featured->email)
                                <li class="icon-team"><a href="mailto:{{ $featured->email }}">&#xf0e0;</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif


    {{-- ======================================================
         OUR TEAM — Grid
    ======================================================= --}}
    @php $gridTeam = $team->where('is_featured', false)->values(); @endphp
    @if($gridTeam->count() > 0)
    <div id="our-team">
        <div class="container">
            <div class="sixteen columns">
                <div class="top-text">
                    <h1>Our Team</h1>
                    <div class="subline"></div>
                    <div class="top-subtext">The people behind our success</div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="team-grid-wrap">
                @foreach($gridTeam as $member)
                <div class="team-grid-card" data-scrollreveal="enter bottom and move 30px over 0.8s">
                    <div class="team-mem">
                        <a href="{{ Storage::disk('public')->url($member->photo) }}"
                           class="fancybox team-photo-link"
                           rel="team-gallery"
                           title="{{ $member->name }} — {{ $member->position }}">
                            <img src="{{ Storage::disk('public')->url($member->photo) }}" alt="{{ $member->name }}"/>
                        </a>
                        <div class="social-team">
                            <ul class="team-social">
                                @if($member->twitter)
                                    <li class="icon-team"><a href="{{ $member->twitter }}" target="_blank">&#xf099;</a></li>
                                @endif
                                @if($member->facebook)
                                    <li class="icon-team"><a href="{{ $member->facebook }}" target="_blank">&#xf09a;</a></li>
                                @endif
                                @if($member->github)
                                    <li class="icon-team"><a href="{{ $member->github }}" target="_blank">&#xf09b;</a></li>
                                @endif
                                @if($member->email)
                                    <li class="icon-team"><a href="mailto:{{ $member->email }}">&#xf0e0;</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="team-grid-info">
                        <h5>{{ $member->name }}</h5>
                        <span>{{ $member->position }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif


    {{-- ======================================================
         SEP 1 — Quote / Parallax
    ======================================================= --}}
    <div id="sep">
        <div class="parallax"></div>
        <div class="background-grid"></div>
        <div class="container">
            <div class="sixteen columns">
                <h4 data-scrollreveal="enter top and move 50px over 1s">
                    "{{ setting('quote_text', 'Far and away the best prize that life has to offer is the chance to work hard at work worth doing.') }}"
                </h4>
                <h6 data-scrollreveal="enter right and move 50px over 1s">
                    {{ setting('quote_author', 'Theodore Roosevelt') }}
                </h6>
            </div>
        </div>
    </div>


    {{-- ======================================================
         WORKS / PORTFOLIO
    ======================================================= --}}
    <div id="works">
        <div class="container">
            <div class="sixteen columns">
                <div class="top-text">
                    <h1>Our Projects</h1>
                    <div class="subline"></div>
                    <div class="top-subtext">We craft beautiful digital solutions for awesome clients across all the platforms.</div>
                    <div >
                        <a href="{{ route('portfolio.index') }}" class="view-all-btn">View All Projects</a>
                    </div>
                </div>
            </div>
        </div>
        <section id="photostack-3" class="photostack">
            <div>
                @foreach($portfolio as $item)
                <figure @if(!$item->is_featured) data-dummy @endif>
                    <a href="{{ $item->link }}" class="{{ $item->link_class }}">
                        <img src="{{ Storage::disk('public')->url($item->image) }}" alt="{{ $item->title }}"/>
                    </a>
                    <figcaption>
                        <h2 class="photostack-title">{{ $item->title }}</h2>
                        @if($item->is_featured)
                        <div class="photostack-back">
                            <h6>Project Title</h6>
                            <h5>{{ $item->subtitle ?? $item->title }}</h5>
                            <p>{{ $item->short_description }}</p>
                        </div>
                        @endif
                    </figcaption>
                </figure>
                @endforeach
            </div>
        </section>
    </div>


    {{-- ======================================================
         CALL TO ACTION
    ======================================================= --}}
    <a href="#contact" class="scroll">
        <div id="action">
            <div class="container">
                <div class="sixteen columns">
                    <h6>{{ setting('cta_text', 'ARE YOU READY TO START A CONVERSATION?') }}</h6>
                    <p><small><span>Get In Touch!</span></small></p>
                </div>
            </div>
        </div>
    </a>


    {{-- ======================================================
         FUN FACTS
    ======================================================= --}}
    <div id="sep1">
        <div class="parallax1"></div>
        <div class="background-grid"></div>
        <div id="facts">
            <div class="container">
                <div class="sixteen columns">
                    <div class="top-text">
                        <h3>{{ setting('facts_heading', 'SOME FUN FACTS') }}</h3>
                        <div class="subline"></div>
                    </div>
                </div>
                @foreach($facts as $loop_fact)
                <div class="four columns">
                    <div class="facts-wrap">
                        @if(!$loop->last)<div class="facts-line"></div>@endif
                        <div class="facts-wrap-num"><span class="counter">{{ $loop_fact->count }}</span></div>
                        <h6>{{ $loop_fact->label }}</h6>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


    {{-- ======================================================
         SERVICES
    ======================================================= --}}
    <div id="services">
        <div class="container">
            <div class="sixteen columns">
                <div class="top-text">
                    <h1>services</h1>
                    <div class="subline"></div>
                    <div class="top-subtext">Great Electromechanical Solutions
Services</div>
                </div>
                <div class="sixteen columns" data-scrollreveal="enter bottom and move 50px over 1s">
                    <div id="sync1" class="owl-carousel">
                        @foreach($services as $service)
                        <div class="item">
                            @if($service->icon_image)
                                <img src="{{ Storage::disk('public')->url($service->icon_image) }}" alt="{{ $service->title }}"/>
                            @endif
                            <h5>{{ $service->title }}</h5>
                            <p>{{ $service->description }}</p>
                        </div>
                        @endforeach
                    </div>
                    <div id="sync2" class="owl-carousel">
                        @foreach($services as $service)
                        <div class="item">
                            @if($service->icon_image)
                                <img src="{{ Storage::disk('public')->url($service->icon_image) }}" alt="{{ $service->title }}"/>
                            @endif
                            <p style="text-align:center;    font-weight: 600;">{{ $service->title }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- ======================================================
         TESTIMONIALS
    ======================================================= --}}
    <div id="sep2">
        <div class="parallax2"></div>
        <div class="background-grid"></div>
        <div class="container" data-scrollreveal="enter bottom and move 50px over 1s">
            <div class="sixteen columns">
                <div class="top-text">
                    <h3>TESTIMONIALS</h3>
                    <div class="subline"></div>
                </div>
            </div>
            <div class="clear"></div>
            <div id="owl-demo" class="owl-carousel owl-theme">
                @foreach($testimonials as $testimonial)
                <div class="item">
                    <div class="sixteen columns">
                        <h4>{{ $testimonial->content }}</h4>
                        <h6>{{ $testimonial->author }}@if($testimonial->company), <span>{{ $testimonial->company }}</span>@endif</h6>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


    {{-- ======================================================
         CLIENTS / PARTNERS
    ======================================================= --}}
    @if($clients->count())
    <div id="clients" style="padding-top:60px;padding-bottom:60px;background:#fff;">
        <div class="container">
            <div class="sixteen columns">
                <div class="top-text">
                    <h3>OUR CLIENTS</h3>
                    <div class="subline"></div>
                    <div class="top-subtext">Trusted by industry leaders across the UAE and beyond.</div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="sixteen columns" style="margin-top:30px;">
                <div id="owl-clients" class="owl-carousel owl-theme">
                    @foreach($clients as $client)
                    <div class="item">
                        <div style="text-align:center;padding:20px;">
                            <img src="{{ asset($client->logo) }}" alt="{{ $client->name }}"
                                 style="max-height:80px;max-width:160px;object-fit:contain;filter:grayscale(100%);opacity:0.7;transition:all 0.3s;"
                                 onmouseover="this.style.filter='grayscale(0%)';this.style.opacity='1';"
                                 onmouseout="this.style.filter='grayscale(100%)';this.style.opacity='0.7';">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif


    {{-- BLOG section hidden --}}


    {{-- ======================================================
         CONTACT
    ======================================================= --}}
    <div id="contact">
        <div class="parallax3"></div>
        <div class="background-grid" style="
    background-color: #000000b0;
"></div>
        <div class="container">
            <div class="sixteen columns">
                <div class="top-text">
                    <h1>Contact</h1>
                    <div class="subline"></div>
                    <div class="top-subtext">We are looking forward to hear from you.</div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="ten columns" data-scrollreveal="enter bottom and move 50px over 1s">
                <form name="ajax-form" id="ajax-form" action="{{ route('contact.store') }}" method="post">
                    @csrf
                    <label for="name">Your Lovely Name: *
                        <span class="error" id="err-name">please enter name</span>
                    </label>
                    <input name="name" id="name" type="text" />
                    <label for="email">E-Mail: *
                        <span class="error" id="err-email">please enter e-mail</span>
                        <span class="error" id="err-emailvld">e-mail is not a valid format</span>
                    </label>
                    <input name="email" id="email" type="text" />
                    <label for="message">Tell Us Everything:</label>
                    <textarea name="message" id="message"></textarea>
                    <div id="button-con"><button class="send_message" id="send">Submit</button></div>
                    <div class="error text-align-center" id="err-form">There was a problem validating the form please check!</div>
                    <div class="error text-align-center" id="err-timedout">The connection to the server timed out!</div>
                    <div class="error" id="err-state"></div>
                </form>
                <div id="ajaxsuccess">Successfully sent!!</div>
            </div>
            <div class="six columns" data-scrollreveal="enter bottom and move 50px over 1s">
                <h5>Contact Info</h5>
                @if(setting('site_address'))
                <div class="con-info">
                    <div class="con-icon">&#xf041;</div>
                    <a href="https://maps.google.com/?q={{ urlencode(setting('site_address')) }}" target="_blank">
                        <p>{{ setting('site_address') }}</p>
                    </a>
                </div>
                @endif
                @if(setting('site_phone'))
                <div class="con-info padding-top-con">
                    <div class="con-icon">&#xf095;</div>
                    <p>{{ setting('site_phone') }}</p>
                </div>
                @endif
                @if(setting('site_email'))
                <div class="con-info padding-top-con">
                    <div class="con-icon">&#xf0e0;</div>
                    <a href="mailto:{{ setting('site_email') }}"><p>{{ setting('site_email') }}</p></a>
                </div>
                @endif
                @if(setting('site_website'))
                <div class="con-info padding-top-con">
                    <div class="con-icon">&#xf0ac;</div>
                    <a href="{{ setting('site_website') }}" target="_blank"><p>{{ setting('site_website') }}</p></a>
                </div>
                @endif
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script type="text/javascript" src="{{ asset('js/jquery.themepunch.plugins.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.themepunch.revolution.min.js') }}"></script>
<script type="text/javascript">
    var revapi;
    jQuery(document).ready(function () {
        revapi = jQuery('.tp-banner').revolution({
            delay: {{ setting('slider_delay', 9000) }},
            startwidth: 1170,
            startheight: {{ setting('slider_height', 500) }},
            hideThumbs: 10,
            fullWidth: "off",
            fullScreen: "{{ setting('slider_fullscreen', 'on') }}",
            navigationType: "{{ setting('slider_navigation', 'bullet') }}",
            onHoverStop: "off",
            fullScreenOffsetContainer: ""
        });
    });
</script>
<script type="text/javascript" src="{{ asset('js/photostack.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/draggabilly.pkgd.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/elastiStack.js') }}"></script>
<script type="text/javascript">
    new ElastiStack(document.getElementById('elasticstack'));
    var ps = new Photostack( document.getElementById('photostack-3'), {
        callback: function(item) {}
    });
    setInterval(function() {
        var next = (ps.current + 1) % ps.navDots.length;
        ps.navDots[next].click();
    }, 4000);
</script>
<script type="text/javascript">
    var container = document.querySelector('#blog-mas');
    var msnry = new Masonry(container, {itemSelector: '.item-blog'});
    // Initialize any carousel-type blog post carousels
    jQuery('[class^="owl-blog-"]').each(function () {
        jQuery(this).owlCarousel({items: 1, loop: true, autoPlay: 3000, navigation: false});
    });
    // Clients carousel
    jQuery('#owl-clients').owlCarousel({
        items: 5, loop: true, autoPlay: 3000, navigation: false,
        responsive: {0:{items:2}, 480:{items:3}, 768:{items:4}, 960:{items:5}}
    });
    // Team gallery lightbox
    jQuery('.fancybox[rel="team-gallery"]').fancybox({
        openEffect  : 'fade',
        closeEffect : 'fade',
        helpers: { title: { type: 'inside' } }
    });
</script>
@endpush
