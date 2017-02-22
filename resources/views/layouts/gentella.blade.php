<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title') - Mheshimiwa </title>


  <link href="{{ URL::to('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ URL::to('css/local.css') }}" rel="stylesheet">
  <link href="{{ URL::to('css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ URL::to('css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ URL::to('css/custom.css') }}" rel="stylesheet">
  <script src="{{ URL::to('tinymce/tinymce.min.js') }}"></script>


  <!-- Custom styling plus plugins -->
  <link href="{{ URL::to('magicsuggest/magicsuggest.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ URL::to('css/maps/jquery-jvectormap-2.0.3.css') }}" />
  <link href="{{ URL::to('css/icheck/flat/green.css') }}" rel="stylesheet" />
  <link href="{{ URL::to('css/floatexamples.css') }}" rel="stylesheet" type="text/css" />

  <script src="{{ URL::to('js/jquery.min.js') }}"></script>
  <script src="{{ URL::to('js/nprogress.js') }}"></script>
  <link rel="stylesheet" href="{{ URL::to('css/blueimp-gallery.min.css') }}">
  <link rel="stylesheet" href="{{ URL::to('gallery_lib/css/bootstrap-image-gallery.min.css') }}">

  <script src="{{ URL::to('magicsuggest/magicsuggest.js') }}"></script>
  <script src="{{ URL::to('rating/jquery.MetaData.js') }}"></script>
  <link href="{{ URL::to('rating/jquery.rating.css') }}" rel="stylesheet">
  <script src="{{ URL::to('rating/jquery.rating.js') }}"></script>
  <link rel="stylesheet" href="{{ URL::to('css/star-rating.css') }}" media="all" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="{{ URL::to('css/chat.css') }}" media="all" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="{{ URL::to('css/throbber.css') }}" media="all" rel="stylesheet" type="text/css"/>
  <script src="{{ URL::to('js/local.js') }}"></script>
  <link href="{{ URL::to('css/jquery.datetimepicker.css') }}" rel="stylesheet" type="text/css">

  <link href="{{ URL::to('intl-tel-input-master/build/css/intlTelInput.css') }}" rel="stylesheet" type="text/css" />
  <script src="{{ URL::to('intl-tel-input-master/build/js/intlTelInput.js') }}"></script>

  <script src="{{ URL::to('js/star-rating.js') }}" type="text/javascript"></script>
  <script src="{{ URL::to('js/highcharts/js/highcharts.js') }}" type="text/javascript"></script>
  <script src="{{ URL::to('js/highcharts/js/highcharts-more.js') }}" type="text/javascript"></script>
  <script src="{{ URL::to('js/jquery.toaster.js') }}"></script>
  <script src="{{ URL::to('js/bootstrap.min.js') }}"></script>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</head>


<body class="nav-md">

<div class="container body">


  <div class="main_container">

    <div class="col-md-3 left_col">
      <div class="left_col scroll-view">

        <div class="navbar nav_title" style="border: 0;">
          <a href="{{ URL::to('') }}" class="site_title"><i class="fa fa-paw"></i> <span>{{ "Dashboard" }}</span></a>
        </div>
        <div class="clearfix"></div>

        <!-- menu prile quick info -->
        <div class="profile">
          <div class="profile_pic">
            <img height="" src="@if(@Auth::user()->image) {{ URL::to(Auth::user()->image) }} @else {{ URL::to('images/img.png') }} @endif" alt="..." class="img-circle profile_img">
          </div>
          <div class="profile_info row">
            <span>Welcome,</span>
            @if(Auth::user())
              <h2>{{ Auth::user()->name }}</h2>
            @else
              <h2>Guest</h2>
            @endif

          </div>
        </div>
        <!-- /menu prile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

          <div class="menu_section">
            <h3>General</h3>
            <ul class="nav side-menu">
              @foreach($menus as $menu)
                @if($menu->type=='single')
                  <li>
                    <a href="{{ URL::to($menu->menus->url)  }}"><i class="fa {{ $menu->menus->icon }}"></i> {{ $menu->menus->label }}&nbsp;&nbsp;&nbsp;<span class="" id="{{ @$menu->slug }}"></span></a>
                  </li>
                @endif

                @if($menu->type=='many')
                  <li><a><i class="fa {{ $menu->icon }}"></i> {{ $menu->label }} <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none">
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
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        {{--<div class="sidebar-footer hidden-small">--}}
        {{--<a data-toggle="tooltip" data-placement="top" title="Settings">--}}
        {{--<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>--}}
        {{--</a>--}}
        {{--<a data-toggle="tooltip" data-placement="top" title="FullScreen">--}}
        {{--<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>--}}
        {{--</a>--}}
        {{--<a data-toggle="tooltip" data-placement="top" title="Lock">--}}
        {{--<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>--}}
        {{--</a>--}}
        {{--<a href="{{ URL::to('logout') }}" data-placement="top" title="Logout">--}}
        {{--<span class="glyphicon glyphicon-off" aria-hidden="true"></span>--}}
        {{--</a>--}}
        {{--</div>--}}
        <!-- /menu footer buttons -->
      </div>
    </div>

    <!-- top navigation -->
    <div class="top_nav">

      <div class="nav_menu">
        <nav class="" role="navigation">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <div class="nav toggle">
            <a href="{{ URL::to('http://'.$_SERVER['HTTP_HOST']) }}" id=""><i class="fa fa-globe"></i>Website</a>
          </div>
          <ul class="nav navbar-nav navbar-right">
            {{--              <li><a href="{{ url('/profiles') }}"><i class="fa fa-btn fa-user"></i>Update Profile</a></li>--}}
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ @Auth::user()->name }} <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ url('/myprofile') }}"><i class="fa fa-btn fa-user"></i> Profile</a></li>
                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-power-off"></i> Logout</a></li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>

    </div>
    <!-- /top navigation -->



    <div id="right_col" class="right_col" role="main">
      <br/>
      <br/>
      <br/>
      <div style="" class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-title">@yield('title')</div>
        </div>
        <div class="panel-body content_area">
          <a class="btn btn-default pull-left" href="{{ URL::previous() }}"><i class="fa fa-arrow-left"></i> Back</a>
          <div class="row"></div>
          <?php
          $unpaid_urls = [
                  'myprofile',
                  'user/complete_profile',
                  'user/aspiring_position',
                  'user/profile',
                  'myprofile'
          ];
          ?>
          @if(Auth::user() && Auth::user()->balance()>0 && in_array($current_url,$unpaid_urls) == false)
            @include('common.payment_notice')
          @elseif(Auth::user() && Auth::user()->approved==0 && Auth::user()->role=='politician' && in_array($current_url,$unpaid_urls) == false)
            @include('common.unapproved')
          @else
            @yield('content')
          @endif
        </div>
      </div>

    </div>
    <!-- /page content -->

  </div>

</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
  <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
  </ul>
  <div class="clearfix"></div>
  <div id="notif-group" class="tabbed_notifications"></div>
</div>
<script src="{{ URL::to('js/progressbar/bootstrap-progressbar.min.js') }}"></script>
<script src="{{ URL::to('js/nicescroll/jquery.nicescroll.min.js') }}"></script>
<!-- icheck -->
<script src="{{ URL::to('js/icheck/icheck.min.js') }}"></script>
<!-- daterangepicker -->
<script type="text/javascript" src="{{ URL::to('js/moment/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('js/datepicker/daterangepicker.js') }}"></script>
<!-- chart js -->
<script src="{{ URL::to('js/chartjs/chart.min.js') }}"></script>

<script src="{{ URL::to('js/custom.js') }}"></script>

<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<script src="{{ URL::to('gallery_lib/js/bootstrap-image-gallery.min.js') }}"></script>


<script src="{{ URL::to('js/pace/pace.min.js') }}"></script>

<!-- skycons -->
<script src="{{ URL::to('js/skycons/skycons.min.js') }}"></script>


<!-- dashbord linegraph -->
<script>



</script>
<script>
  NProgress.done();
</script>
<!-- /datepicker -->
<!-- /footer content -->
</body>
<script src="{{ URL::to('js/jquery.datetimepicker.js') }}"></script>
<script type="text/javascript">
  //http://xdsoft.net/jqplugins/datetimepicker/
  $("input[name='date']").datetimepicker({
    timepicker:false
  });
  $("input[type='date']").datetimepicker({
    timepicker:false
  });
  $('a[href="' + window.location.hash + '"]').trigger('click');
  $('input[name="deadline"]').datetimepicker();
  $('.datepicker').datetimepicker();

  function autofillForm(data){
    for(key in data){
      $('input[name="'+key+'"]').val(data[key]);
      $('textarea[name="'+key+'"]').val(data[key]);
      $('select[name="'+key+'"]').val(data[key]);
    }
  }
</script>
</html>
<style type="text/css">
  .profile_image{
    /*max-height: 120px;*/
  }
</style>
@if(session('notice'))
  <script type="text/javascript">
    $.toaster({ priority : "{{ session('notice')['class'] }}", title : "{{ session('notice')['class'] }}", message : "{{ session('notice')['message'] }}"});
  </script>
  <?php session()->forget('notice'); ?>
@endif
