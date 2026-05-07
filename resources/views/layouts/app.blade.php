<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]>
<!--><html class="no-js" lang="en"><!--<![endif]-->
<head>

    <meta charset="utf-8">
    <title>@yield('title', setting('site_name', 'The Way'))</title>
    <meta name="keywords" content="@yield('meta_keywords', '')">
    <meta name="description" content="@yield('meta_description', '')">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{ asset('css/base.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/skeleton.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/owl.theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/settings.revolution.slider.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/retina.css') }}"/>

    <link rel="alternate stylesheet" type="text/css" href="{{ asset('css/colors/color-orange.css') }}" title="orange">
    <link rel="alternate stylesheet" type="text/css" href="{{ asset('css/colors/color-green.css') }}" title="green">
    <link rel="alternate stylesheet" type="text/css" href="{{ asset('css/colors/color-red.css') }}" title="red">
    <link rel="alternate stylesheet" type="text/css" href="{{ asset('css/colors/color-blue.css') }}" title="blue">
    <link rel="alternate stylesheet" type="text/css" href="{{ asset('css/colors/color-yellow.css') }}" title="yellow">

    <!--[if lte IE 8]>
        <script src="{{ asset('js/html5.js') }}"></script>
    <![endif]-->

    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('apple-touch-icon-114x114.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @stack('styles')
    @if(setting('custom_css'))
    <style>{!! setting('custom_css') !!}</style>
    @endif
</head>
<body>

    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>

    <div id="menu-wrap" class="menu-back cbp-af-header">
        <div class="container">
            <div class="sixteen columns">
                <div class="logo">
                    <a class="scroll" href="{{ route('home') }}">
                        <img src="{{ asset_image(setting('site_logo'), asset('images/logo.png')) }}" alt="{{ setting('site_name', 'The Way') }}"/>
                    </a>
                </div>
                <ul class="slimmenu">
                    <li><a class="scroll" href="{{ route('home') }}#home">home</a></li>
                    <li><a class="scroll" href="{{ route('home') }}#about">about</a></li>
                    <li><a class="scroll" href="{{ route('home') }}#works">Projects</a></li>
                    <li><a class="scroll" href="{{ route('home') }}#services">services</a></li>
                    <li><a class="scroll" href="{{ route('home') }}#contact">contact</a></li>
                </ul>
            </div>
        </div>
    </div>

    @yield('content')

    <div id="footer">
        <div class="container">
            <div class="sixteen columns">
                <a class="scroll" href="{{ route('home') }}">
                    <img src="{{ asset_image(setting('site_logo'), asset('images/logo.png')) }}" alt="{{ setting('site_name', 'The Way') }}"  />
                </a>
                <p>{{ setting('footer_copyright', 'Copyright &copy; ' . date('Y')) }}</p>
                <div class="social-footer">
                    <ul class="footer-social">
                        @if(setting('social_twitter'))
                            <li class="icon-footer"><a href="{{ setting('social_twitter') }}" target="_blank">&#xf099;</a></li>
                        @endif
                        @if(setting('social_facebook'))
                            <li class="icon-footer"><a href="{{ setting('social_facebook') }}" target="_blank">&#xf09a;</a></li>
                        @endif
                        @if(setting('social_github'))
                            <li class="icon-footer"><a href="{{ setting('social_github') }}" target="_blank">&#xf09b;</a></li>
                        @endif
                        @if(setting('social_googleplus'))
                            <li class="icon-footer"><a href="{{ setting('social_googleplus') }}" target="_blank">&#xf0d5;</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Switch Panel -->
    <div id="switch">
        <div class="content-switcher">
            <p>Color Options:</p>
            <ul class="header">
                <li><a href="#" onClick="setActiveStyleSheet('orange'); return false;" class="button color switch" style="background-color:#e40513"></a></li>
                <li><a href="#" onClick="setActiveStyleSheet('green'); return false;" class="button color switch" style="background-color:#2ecc71"></a></li>
                <li><a href="#" onClick="setActiveStyleSheet('red'); return false;" class="button color switch" style="background-color:#e74c3c"></a></li>
                <li><a href="#" onClick="setActiveStyleSheet('blue'); return false;" class="button color switch" style="background-color:#3498db"></a></li>
                <li><a href="#" onClick="setActiveStyleSheet('yellow'); return false;" class="button color switch" style="background-color:#f1c40f"></a></li>
            </ul>
            <div class="clear"></div>
            <div id="hide"><img src="{{ asset('images/close.png') }}" alt="" /></div>
        </div>
    </div>
    <!-- <div id="show" style="display: block;">
        <div id="setting"></div>
    </div> -->
    <!-- Switch Panel -->

    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/modernizr.custom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.nicescroll.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/styleswitcher.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.slimmenu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/classie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.easing.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/cbpAnimatedHeader.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/retina-1.1.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.parallax-1.1.3.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.localscroll-1.2.7-min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.scrollTo-1.4.2-min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/waypoints.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.counterup.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.fitvids.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/masonry.pkgd.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.fancybox.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/scrollReveal.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/contact.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/template.js') }}"></script>

    @stack('scripts')
    @if(setting('custom_js'))
    <script>{!! setting('custom_js') !!}</script>
    @endif
</body>
</html>
