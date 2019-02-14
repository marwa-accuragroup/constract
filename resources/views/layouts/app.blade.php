<?php $locale = App::getLocale(); ?>
        <!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
          content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords"
          content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>  {{ __('admin.Cpanel') }} </title>
    <link rel="apple-touch-icon" href="{{ URL ::to ('assets/admin/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon"
          href="{{ URL ::to ('assets/admin/app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
          rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
          rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    @if($locale == 'ar')
        <link rel="stylesheet" type="text/css" href="{{ URL ::to ('assets/admin/app-assets/css-rtl/vendors.css')}}">
    @else
        <link rel="stylesheet" type="text/css" href="{{ URL ::to ('assets/admin/app-assets/css/vendors.css')}}">
    @endif
    <link rel="stylesheet" type="text/css" href="{{ URL ::to ('assets/admin/app-assets/vendors/css/pickers/daterange/daterangepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL ::to ('assets/admin/app-assets/vendors/css/pickers/pickadate/pickadate.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ URL ::to ('assets/admin/app-assets/vendors/css/tables/datatable/datatables.min.css"')}}>
    <link rel="stylesheet" type="text/css" href="{{ URL ::to ('assets/admin/app-assets/vendors/css/tables/datatable/select.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL ::to ('assets/admin/app-assets/vendors/css/tables/extensions/keyTable.dataTables.min.css')}}">




    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    @if($locale == 'ar')
        <link rel="stylesheet" type="text/css" href="{{ URL ::to ('assets/admin/app-assets/css-rtl/app.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ URL ::to ('assets/admin/app-assets/css-rtl/custom-rtl.css')}}">
    @else
        <link rel="stylesheet" type="text/css" href="{{ URL ::to ('assets/admin/app-assets/css/app.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ URL ::to ('assets/admin/app-assets/css/custom.css')}}">
    @endif
<!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ URL ::to ('assets/admin/app-assets/css-rtl/plugins/pickers/daterange/daterange.css')}}">

@if($locale == 'ar')
        <link rel="stylesheet" type="text/css"
              href="{{ URL ::to ('assets/admin/app-assets/css-rtl/core/menu/menu-types/vertical-menu-modern.css')}}">
        <link rel="stylesheet" type="text/css"
              href="{{ URL ::to ('assets/admin/app-assets/css-rtl/core/colors/palette-gradient.css')}}">
    @else
        <link rel="stylesheet" type="text/css"
              href="{{ URL ::to ('assets/admin/app-assets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
        <link rel="stylesheet" type="text/css"
              href="{{ URL ::to ('assets/admin/app-assets/css/core/colors/palette-gradient.css')}}">
    @endif
    <link rel="stylesheet" type="text/css"
          href="{{ URL ::to ('assets/admin/app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL ::to ('assets/admin/app-assets/vendors/css/charts/morris.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL ::to ('assets/admin/app-assets/fonts/simple-line-icons/style.css')}}">

    @if($locale = 'ar')
        <link rel="stylesheet" type="text/css"
              href="{{ URL ::to ('assets/admin/app-assets/css-rtl/core/colors/palette-gradient.css')}}">
        <!-- END Page Level CSS-->
        <!-- BEGIN Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{ URL ::to ('assets/admin/assets/css/style-rtl.css')}}">
        <!-- END Custom CSS-->
    @else
        <link rel="stylesheet" type="text/css"
              href="{{ URL ::to ('assets/admin/app-assets/css/core/colors/palette-gradient.css')}}">
        <!-- END Page Level CSS-->
        <!-- BEGIN Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{ URL ::to ('assets/admin/assets/css/style.css')}}">
    @endif
</head>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<!-- fixed-top-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a
                            class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="#">
                        <img class="brand-logo" alt="modern admin logo"
                             src="{{ URL ::to ('assets/admin/app-assets/images/logo/logo.png')}}">
                        <h3 class="brand-text"> {{ __('admin.Cpanel') }} </h3>
                    </a>
                </li>
                <li class="nav-item d-none d-md-block float-right"><a class="nav-link modern-nav-toggle pr-0"
                                                                      data-toggle="collapse"><i
                                class="toggle-icon ft-toggle-right font-medium-3 white"
                                data-ticon="ft-toggle-right"></i></a></li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i
                                class="la la-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i
                                    class="ficon ft-maximize"></i></a></li>
                    </li>
                </ul>


                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-language nav-item">
                        <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="flag-icon flag-icon-"></i>
                            <span class="selected-language"></span> @lang('admin.Change Language') </a>

                        <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                            <a class="dropdown-item" href="{{ action('Admin\HomeController@changeLang' , 'en') }}"><i
                                        class="flag-icon flag-icon-gb"></i> {{ __('admin.English') }} </a>
                            <a class="dropdown-item" href="{{ action('Admin\HomeController@changeLang' , 'ar') }}"><i
                                        class="flag-icon flag-icon-ar"></i> @lang('admin.Arabic')</a>

                        </div>
                    </li>
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="mr-1">
                  <span class="user-name text-bold-700"> {{ Auth::user()->name }} </span>
                </span>
                            <span class="avatar avatar-online">
                  <img src="{{ URL ::to ('assets/admin/app-assets/images/portrait/small/avatar-s-19.png')}}"
                       alt="avatar"><i></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i
                                        class="ft-user"></i> {{ __('admin.Edit Profile') }} </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                <i class="ft-power"></i> {{ __('admin.Logout') }}</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>


                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">


            <li class=" nav-item {{ Request::is('admin/home*') ? 'active' : '' }}">
                <a href="{{ URL :: to ('/admin/home')}}"><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> @lang('admin.Home')</span></a>

            </li>
            <?php  $categories = \App\Menu::where('parentId', '=', 0)->get();?>
            @foreach($categories as $category)
                <li class=" nav-item {{ Request::is($category->link.'*') ? 'active' : '' }}">

                    <a href="{{ url('/'.$category->link)  }}">
                        <i class="{{ $category->icon }}"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">
                            {{ $category['name_'.App::getLocale()] }} </span>
                    </a>
                    @if(count($category->childs))
                        @include('admin.sidebar.manageChild',['childs' => $category->childs])
                    @endif
                </li>
            @endforeach


            <?php  $projectCat = \App\Cateory::all();?>
            @foreach($projectCat as $cat)
                <li class=" nav-item ">
                    <a href="{{ action('Admin\ProjectController@projectInCat' , $cat->id) }}">
                        <i class="{{ $cat->icon }}"></i>

                        @if($locale == 'ar')
                        <span class="menu-title" data-i18n="nav.dash.main">
                            {{ $cat->name }} </span>
                            @else
                            <span class="menu-title" data-i18n="nav.dash.main">
                            {{ $cat->name_en }} </span>
                        @endif
                    </a>
                </li>
            @endforeach


        </ul>
    </div>
</div>

<!-- ////////////////////////////////////////////////////////////////////////////-->

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            @yield('content')
        </div>
    </div>
</div>

<!-- ////////////////////////////////////////////////////////////////////////////-->
<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
        <span class="float-md-left d-block d-md-inline-block">{{ __('admin.All rights reserved.') }}&copy; 2019 </span>
        <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block"> {{ __('admin.Hand-crafted & Made with') }}  <a
                    href="http://accuragroup-eg.com/" target="_blank"> {{ __('admin.Accura Group') }} </a><i
                    class="ft-heart pink"></i></span>
    </p>
</footer>
<!-- BEGIN VENDOR JS-->
<script src="{{ URL ::to ('assets/admin/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{ URL ::to ('assets/admin/app-assets/vendors/js/pickers/pickadate/picker.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/app-assets/vendors/js/pickers/pickadate/picker.date.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/app-assets/vendors/js/pickers/pickadate/picker.time.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/app-assets/vendors/js/pickers/pickadate/legacy.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js')}}"
        type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/app-assets/vendors/js/pickers/daterange/daterangepicker.js')}}"
        type="text/javascript"></script>


<script src="{{ URL ::to ('assets/admin/app-assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/app-assets/vendors/js/tables/datatable/dataTables.fixedHeader.min.js')}}"
        type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/app-assets/vendors/js/tables/datatable/dataTables.keyTable.min.js')}}"
        type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/app-assets/vendors/js/charts/chart.min.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/app-assets/vendors/js/charts/raphael-min.js')}}"
        type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/app-assets/vendors/js/charts/morris.min.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js')}}"
        type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js')}}"
        type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/app-assets/data/jvector/visitor-data.js')}}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{ URL ::to ('assets/admin/app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/app-assets/js/core/app.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{ URL ::to ('assets/admin/app-assets/js/scripts/pickers/dateTime/pick-a-datetime.js')}}"  type="text/javascript"></script>

<!--script src="{{ URL ::to ('assets/admin/app-assets/js/scripts/pages/dashboard-sales.js')}}"
        type="text/javascript"></script-->
<script src="{{ URL ::to ('assets/admin/app-assets/js/scripts/tables/datatables-extensions/datatable-keytable.js')}}"
        type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->

<script src="{{ URL ::to ('assets/admin/custom.js')}}" type="text/javascript"></script>
</body>
</html>