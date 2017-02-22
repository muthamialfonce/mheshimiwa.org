<!DOCTYPE html>
<html class="csstransforms no-csstransforms3d csstransitions" lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
    <title>@yield('title') - Mheshimiwa </title>
 
<link href="{{ URL::to("bootstrap.css") }}" rel="stylesheet">
<link href="{{ URL::to("font-awesome/css/font-awesome.css") }}" rel="stylesheet">
<link href="{{ URL::to("prettyPhoto.css") }}" rel="stylesheet">
<link href="{{ URL::to("animate.css") }}" rel="stylesheet">
<link href="{{ URL::to("main.css") }}" rel="stylesheet">
<link href="{{ URL::to("responsive.css") }}" rel="stylesheet">
<!--[if lt IE 9]>
    <script src="{{ URL::to("js/html5shiv.js") }}"></script>
    <script src="{{ URL::to("js/respond.min.js") }}"></script>
    <![endif]-->
<link rel="shortcut icon" href="http://shapebootstrap.net/demo/html/corlate/images/ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://shapebootstrap.net/demo/html/corlate/images/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://shapebootstrap.net/demo/html/corlate/images/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://shapebootstrap.net/demo/html/corlate/images/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="http://shapebootstrap.net/demo/html/corlate/images/ico/apple-touch-icon-57-precomposed.png">
</head> 
<body>
<header id="header">
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
<a class="navbar-brand" href="http://shapebootstrap.net/demo/html/corlate/index.html"><img src="{{ URL::to("logo.png") }}" alt="logo"></a>
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
<section id="feature" class="transparent-bg">
<div class="container">
    <div class="col-md-2 panel panel-default" style="margin-top:20px;height: 100%">
        <div class="panel-body">
            Left Sidebar
            @yield('left-sidebar')
        </div>
    </div>
    <div class="col-md-8">
        @yield('content')
    </div>
    <div class="col-md-2 panel panel-default" style="margin-top:20px;height: 100%">
        <div class="panel-body">
            Right Sidebar
            @yield('right-sidebar')
        </div>
    </div>

</div>
</section>
<footer id="footer" class="midnight-blue">
<div class="container">
<div class="row">
<div class="col-sm-6">
© {{ date('Y') }} <a target="_blank" href="{{ URL::to("http://masterclass.co.ke") }}" title="Masterclass Solutions Kenya">masterclass.co.ke</a>. All Rights Reserved.
</div>
<div class="col-sm-6">
<ul class="pull-right">
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
</div>
</footer> 
<script src="{{ URL::to("jquery_002.js") }}"></script>
<script src="{{ URL::to("bootstrap.js") }}"></script>
<script src="{{ URL::to("jquery.js") }}"></script>
<script src="{{ URL::to("jquery_003.js") }}"></script>
<script src="{{ URL::to("main.js") }}"></script>
<script src="{{ URL::to("wow.js") }}"></script>

</body></html>