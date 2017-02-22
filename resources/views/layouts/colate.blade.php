<?php
$default_meta_image = URL::to("masterclass/logo.png");
$default_meta_description = 'Best kenya political platform providing politician background info, events and agendas. It also formsa good platform for donating to politicians';
?>
<html><head>
<!-- Mobile Specifics -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="HandheldFriendly" content="true">
<meta name="MobileOptimized" content="320">   
    <title>@yield('title') - Mheshimiwa </title>
    <link rel="stylesheet" href="{{ URL::to('chosen/chosen.css') }}">
    <meta property="og:url"                content="{{ Request::url() }}" />
    <meta property="og:type"               content="website" />
    <meta property="og:site_name"          content="Mheshimiwa" />
    <meta property="og:title"              content="@yield('title')" />
    <meta property="og:description"        content="{{ $meta_description or $default_meta_description }}" />
    <meta property="og:image"              content="{{ $meta_image or $default_meta_image }}" />
    <link href="{{ URL::to("css/ianbootstrap.css") }}" rel="stylesheet">
    <link href="{{ URL::to("font-awesome/css/font-awesome.css") }}" rel="stylesheet">
    <link href="{{ URL::to("prettyPhoto.css") }}" rel="stylesheet">
    <link href="{{ URL::to("responsive.css") }}" rel="stylesheet">
    <link href="{{ URL::to("main.css") }}" rel="stylesheet">
    <link href="{{ URL::to("animate.css") }}" rel="stylesheet">
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "ur-788113c2-aa82-1bb9-ae66-21e28b161734", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
    <!--[if lt IE 9]>
    <script src="{{ URL::to("js/html5shiv.js") }}"></script>
    <script src="{{ URL::to("js/respond.min.js") }}"></script>
    <![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<link rel="stylesheet" href="{{ URL::to("masterclass/style-iso.css") }}" type="text/css">
</head>

<body>
<div id="topadvert">
    <img class="centered" style="" src="{{ URL::to("masterclass/top_ad_new.jpeg") }}" alt="logo">
</div>

<style type="text/css">
    .centered {
        margin-left: 20%;
        /* bring your own prefixes */
    }
</style>
<header id="header" class="bootstrap-iso">
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-4">
                </div>
                <div class="col-sm-6 col-xs-8">
                    <div class="social">
                        <ul class="social-share">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-skype"></i></a></li>
                        </ul>
                        <div class="search">
                            <form role="form">
                                <input class="search-form" autocomplete="off" placeholder="Search" type="text">
                                <i class="fa fa-search"></i>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-inverse" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ URL::to('') }}"><img src="{{ URL::to("masterclass/logo.png") }}" alt="logo"></a>
            </div>
            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <?php
                    ?>
                    @foreach($menus as $menu)

                        @if($menu->type=='single')
                            <li class="{{ Request::url()==URL::to($menu->menus->url) ? 'active' : ''}}">
                                <a href="{{ URL::to($menu->menus->url)  }}">{{ $menu->menus->label }}</a>
                            </li>
                        @endif

                        @if($menu->type=='many')
                            <li  class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $menu->label }} <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    @foreach($menu->children as $drop)
                                        @if($drop->label)
                                            <li><a href="{{ URL::to($drop->url) }}">{{ $drop->label }}</a><li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    @endforeach

                </ul>
            </div>
        </div>
    </nav>
</header>
<div id="wrappernew" class="style-iso">
	<div id="wrapperfluid">
    	<!-- <div id="adbanner">
            <img src="{{ URL::to("masterclass/ad4.gif") }}">
        </div>
    	<div id="headernew">
        	<div id="logoheader">
            	<img src="{{ URL::to("masterclass/logo.png") }}">
            </div>
             <div id="sociallinks">
            	<a href="#"><img src="{{ URL::to("masterclass/facebook.png") }}"></a>
                <a href="#"><img src="{{ URL::to("masterclass/twitter.png") }}"></a>
                <a href="#"><img src="{{ URL::to("masterclass/instagram.png") }}"></a>
                <a href="#"><img src="{{ URL::to("masterclass/linkedin.png") }}"></a>
                <a href="#"><img src="{{ URL::to("masterclass/email.png") }}"></a>
                <a href="#"><img src="{{ URL::to("masterclass/google.png") }}"></a>
            </div>
            <div id="navbar">
            	<ul class="nav navbar-nav">
                    @foreach($menus as $menu)

                        @if($menu->type=='single')
                            <li class="{{ Request::url()==URL::to($menu->menus->url) ? 'active' : ''}}">
                                <a href="{{ URL::to($menu->menus->url)  }}">{{ $menu->menus->label }}</a>
                            </li>
                        @endif
                    @endforeach
				</ul>
            </div>
        </div>
-->
        <div id="contentarea">
           @if(Request::url() ==URL::to(''))
               @include('etc.slider')
               @endif
        	<div id="contleft">
            	<img src="{{ URL::to("img/side2.jpeg") }}">
            </div>
            <div id="contmid">
            	<div id="midinside" class="bootstrap-iso">
                    @yield('content')

                </div>
                        <span class='st_facebook_large' displayText='Facebook'></span>
<span class='st_twitter_large' displayText='Tweet'></span>
<span class='st_linkedin_large' displayText='LinkedIn'></span>
<span class='st_pinterest_large' displayText='Pinterest'></span>
<span class='st_email_large' displayText='Email'></span>
            </div>
            <div id="contright">
                <img src="{{ URL::to("img/side1.jpeg") }}">
            </div>
        </div>
    </div>
    <div id="footerad">
        <img src="{{ URL::to("img/bottom.jpeg") }}">
    </div>
     <div id="footernew">
         Copyright &copy; {{ date('Y') }} <a href="{{ URL::to('http://masterclass.co.ke')  }}">Masterclass Solutions</a>. All Rights Reserved.
        <!-- <br/> <a href="#subscription_modal" data-toggle="modal">Subscribe</a> -->
     </div>
	<br clear="all">
</div>
<script src="{{ URL::to("jquery_002.js") }}"></script>
<script src="{{ URL::to("jquery.js") }}"></script>
<script src="{{ URL::to("bootstrap.js") }}"></script>
<script src="{{ URL::to("jquery_003.js") }}"></script>
<script src="{{ URL::to("main.js") }}"></script>
<script src="{{ URL::to("wow.js") }}"></script>
<script src="{{ URL::to('chosen/chosen.jquery.js') }}" type="text/javascript"></script>

</body>
</html>
<div class="bootstrap-iso">
   <!-- @include('etc.subscription_modal') -->
</div>
