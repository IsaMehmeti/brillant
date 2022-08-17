<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Web Geneve - https://www.webgeneve.ch/">
    <title>@yield('pageTitle')</title>
    <link rel="stylesheet" type="text/css" href="/lib/perfect-scrollbar/css/perfect-scrollbar.css"/>
    <link rel="stylesheet" type="text/css" href="/lib/material-design-icons/css/material-design-iconic-font.min.css"/>
    <link rel="stylesheet" type="text/css" href="/lib/jquery.vectormap/jquery-jvectormap-1.2.2.css"/>
    <link rel="stylesheet" type="text/css" href="/lib/jqvmap/jqvmap.min.css"/>
    <link rel="stylesheet" type="text/css" href="/lib/datetimepicker/css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" href="/css/app.css" type="text/css"/>
    <style>
        .be-top-header .container-fluid{
            padding: 1px !important;
        }
        .be-top-header .be-navbar-header .navbar-brand{
            background-size: 100% 100%;
            width: 84px !important;
        }
    </style>

    @yield('custom_header')
    @yield('custom_style')
  </head>
    <body>
        <div class="be-wrapper be-fixed-sidebar">
             @include('layouts.header')
             <div class="be-content">
                <div class="main-content container-fluid">
                    @include('layouts.notifications')
                    @yield('content')
                </div>
             </div>     
        </div>

        <script src="/lib/jquery/jquery.min.js" type="text/javascript"></script>
        <script src="/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
        <script src="/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <script src="/js/app.js" type="text/javascript"></script>
        <script src="/lib/jquery-flot/jquery.flot.js" type="text/javascript"></script>
        <script src="/lib/jquery-flot/jquery.flot.pie.js" type="text/javascript"></script>
        <script src="/lib/jquery-flot/jquery.flot.time.js" type="text/javascript"></script>
        <script src="/lib/jquery-flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="/lib/jquery-flot/plugins/jquery.flot.orderBars.js" type="text/javascript"></script>
        <script src="/lib/jquery-flot/plugins/curvedLines.js" type="text/javascript"></script>
        <script src="/lib/jquery-flot/plugins/jquery.flot.tooltip.js" type="text/javascript"></script>
        <script src="/lib/jquery.sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="/lib/countup/countUp.min.js" type="text/javascript"></script>
        <script src="/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
        <script src="/lib/jqvmap/jquery.vmap.min.js" type="text/javascript"></script>
        <script src="/lib/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
        <script src="/js/app-dashboard.js" type="text/javascript"></script>
        
        @yield('custom_footer')
        @yield('custom_scripts')
  </body>
</html>
