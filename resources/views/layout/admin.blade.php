<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Tadweer Alkheer | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/iCheck/flat/blue.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css" />
    @toastr_css

  </head>


    <body class="skin-blue">

      <div class="wrapper">
        @include('admin.inc.header')
        @include('admin.inc.sideMenu')
        @yield('content')
        @include('admin.inc.footer')
    </div>


    @jquery
    @toastr_js
    @toastr_render
        <script src="{{ asset('assets/plugins/jQuery/jQuery-2.1.3.min.js') }}"></script>
        <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
        <script>$.widget.bridge('uibutton', $.ui.button);</script>
        <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="{{ asset('assets/plugins/morris/morris.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/sparkline/jquery.sparkline.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/knob/jquery.knob.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/fastclick/fastclick.min.js') }}"></script>
        <script src="{{ asset('assets/dist/js/app.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/dist/js/pages/dashboard.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/dist/js/demo.js') }}" type="text/javascript"></script>
    </body>
</html>
