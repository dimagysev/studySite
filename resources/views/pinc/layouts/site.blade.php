<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" class="ie" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 7]>
<html id="ie7" class="ie" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html id="ie8" class="ie" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 9]>
<html id="ie9" class="ie" dir="ltr" lang="en-US">
<![endif]-->
<!--[if gt IE 9]>
<html class="ie" dir="ltr" lang="en-US">
<![endif]-->
<!--[if !IE]>
<html dir="ltr" lang="en-US">
<![endif]-->

<!-- START HEAD -->
<head>

    <meta charset="UTF-8" />
    <!-- this line will appear only if the website is visited with an iPad -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="description" content="{{ $meteDescription ?? 'PinkRio'}}"/>
    <meta name="keywords" content="{{ $metaKeywords ?? 'PinkRio' }}"/>
    <title>{{ $title ?? 'PinkRio' }}</title>

    <!-- [favicon] begin -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset(config('settings.THEME'))}}/images/favicon.ico" />
    <link rel="icon" type="image/x-icon" href="{{asset(config('settings.THEME'))}}/images/favicon.ico" />
    <!-- Touch icons more info: http://mathiasbynens.be/notes/touch-icons -->
    <!-- For iPad3 with retina display: -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset(config('settings.THEME'))}}/apple-touch-icon-144x.png" />
    <!-- For first- and second-generation iPad: -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset(config('settings.THEME'))}}/apple-touch-icon-114x.png" />
    <!-- For first- and second-generation iPad: -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset(config('settings.THEME'))}}/apple-touch-icon-72x.png" />
    <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
    <link rel="apple-touch-icon-precomposed" href="{{asset(config('settings.THEME'))}}/apple-touch-icon-57x.png" />
    <!-- [favicon] end -->

    <!-- CSSs -->
    <link rel="stylesheet" type="text/css" media="all" href="{{asset(config('settings.THEME'))}}/css/reset.css" /> <!-- RESET STYLESHEET -->
    <link rel="stylesheet" type="text/css" media="all" href="{{asset(config('settings.THEME'))}}/style.css" /> <!-- MAIN THEME STYLESHEET -->
    <link rel="stylesheet" id="max-width-1024-css" href="{{asset(config('settings.THEME'))}}/css/max-width-1024.css" type="text/css" media="screen and (max-width: 1240px)" />
    <link rel="stylesheet" id="max-width-768-css" href="{{asset(config('settings.THEME'))}}/css/max-width-768.css" type="text/css" media="screen and (max-width: 987px)" />
    <link rel="stylesheet" id="max-width-480-css" href="{{asset(config('settings.THEME'))}}/css/max-width-480.css" type="text/css" media="screen and (max-width: 480px)" />
    <link rel="stylesheet" id="max-width-320-css" href="{{asset(config('settings.THEME'))}}/css/max-width-320.css" type="text/css" media="screen and (max-width: 320px)" />

    <!-- CSSs Plugin -->
    <link rel="stylesheet" id="thickbox-css" href="{{asset(config('settings.THEME'))}}/css/thickbox.css" type="text/css" media="all" />
    <link rel="stylesheet" id="styles-minified-css" href="{{asset(config('settings.THEME'))}}/css/style-minifield.css" type="text/css" media="all" />
    <link rel="stylesheet" id="buttons" href="{{asset(config('settings.THEME'))}}/css/buttons.css" type="text/css" media="all" />
    <link rel="stylesheet" id="cache-custom-css" href="{{asset(config('settings.THEME'))}}/css/cache-custom.css" type="text/css" media="all" />
    <link rel="stylesheet" id="custom-css" href="{{asset(config('settings.THEME'))}}/css/custom.css" type="text/css" media="all" />

    <!-- FONTs -->
    <link rel="stylesheet" id="google-fonts-css" href="http://fonts.googleapis.com/css?family=Oswald%7CDroid+Sans%7CPlayfair+Display%7COpen+Sans+Condensed%3A300%7CRokkitt%7CShadows+Into+Light%7CAbel%7CDamion%7CMontez&amp;ver=3.4.2" type="text/css" media="all" />
    <link rel='stylesheet' href='{{asset(config('settings.THEME'))}}/css/font-awesome.css' type='text/css' media='all' />
</head>
<!-- END HEAD -->
<!-- START BODY -->
<body class="no_js responsive {{Route::currentRouteName() === 'home' ? 'page-template-home-php' : ''}}  stretched">
<!-- START BG SHADOW -->
<div class="message-wrapper">
    <div id="message">
    </div>
</div>
<div class="bg-shadow">
    <!-- START WRAPPER -->
    <div id="wrapper" class="group">
        <!-- START HEADER -->
        @yield('header')
        <!-- END HEADER -->
        <!-- START SLIDER -->
        @yield('slider')
        @yield('page-meta')
        <!-- START PRIMARY -->
        <div id="primary" class="sidebar-{{$sideBar ?? 'no'}}">
            <div class="inner group">
                <!-- START CONTENT -->
                @yield('content')
            <!-- END CONTENT -->
                <!-- START SIDEBAR -->
                @yield('sidebar')
            <!-- END SIDEBAR -->
                <!-- START EXTRA CONTENT -->
                <!-- END EXTRA CONTENT -->
            </div>
        </div>
        <!-- END PRIMARY -->
        <!-- START COPYRIGHT -->
        @yield('footer')
        <!-- END COPYRIGHT -->
    </div>
    <!-- END WRAPPER -->
</div>
<!-- END BG SHADOW -->
<script src="{{asset(config('settings.THEME'))}}/js/bundle.js"></script>
<script>
    jQuery(document).ready(function($){

        var     yit_slider_cycle_fx = 'easing',
            yit_slider_cycle_speed = 800,
            yit_slider_cycle_timeout = 3000,
            yit_slider_cycle_directionNav = true,
            yit_slider_cycle_directionNavHide = true,
            yit_slider_cycle_autoplay = true;

        var yit_widget_area_position = function(){
            $('#yit-widget-area').css({ top: 33 - $('#yit-widget-area').height() });
        };
        $(window).resize(yit_widget_area_position);
        yit_widget_area_position();

        if( $.browser.msie && parseInt($.browser.version.substr(0,1),10) <= '8' ) {
            $('#slider-cycle ul.slider').anythingSlider({
                expand              : true,
                startStopped        : false,
                buildArrows         : yit_slider_cycle_directionNav,
                buildNavigation     : false,
                buildStartStop      : false,
                delay               : yit_slider_cycle_timeout,
                animationTime       : yit_slider_cycle_speed,
                easing              : yit_slider_cycle_fx,
                autoPlay            : yit_slider_cycle_autoplay ? true : false,
                pauseOnHover        : true,
                toggleArrows        : false,
                resizeContents      : true
            });
        } else {
            $('#slider-cycle ul.slider').anythingSlider({
                expand              : true,
                startStopped        : false,
                buildArrows         : yit_slider_cycle_directionNav,
                buildNavigation     : false,
                buildStartStop      : false,
                delay               : yit_slider_cycle_timeout,
                animationTime       : yit_slider_cycle_speed,
                easing              : yit_slider_cycle_fx,
                autoPlay            : yit_slider_cycle_autoplay ? true : false,
                pauseOnHover        : true,
                toggleArrows        : yit_slider_cycle_directionNavHide ? true : false,
                onSlideComplete     : function(slider){},
                resizeContents      : true,
                onSlideBegin        : function(slider) {},
                onSlideComplete     : function(slider) {}
            });

        }
    });





</script>

</body>
<!-- END BODY -->
</html>
