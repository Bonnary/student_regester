<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ !empty($header_title) ? $header_title : 'Student Registor' }}</title>

    {{-- Google Font: Source Sans Pro --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href={{ URL::to('assets/plugins/fontawesome-free/css/all.min.css') }}>
    {{-- Ionicons --}}
    <link rel="stylesheet"
        href={{ URL::to('assets/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}>
    {{-- Tempusdominus Bootstrap 4 --}}
    <link rel="stylesheet"
        href={{ URL::to('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}>
    {{-- iCheck --}}
    <link rel="stylesheet" href={{ URL::to('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}>
    {{-- JQVMap --}}
    <link rel="stylesheet" href={{ URL::to('assets/plugins/jqvmap/jqvmap.min.css') }}>
    {{-- Theme style --}}
    <link rel="stylesheet" href={{ URL::to('assets/dist/css/adminlte.min.css') }}>
    {{-- overlayScrollbars --}}
    <link rel="stylesheet" href={{ URL::to('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}>
    {{-- Daterange picker --}}
    <link rel="stylesheet" href={{ URL::to('assets/plugins/daterangepicker/daterangepicker.css') }}>
    {{-- summernote --}}
    <link rel="stylesheet" href={{ URL::to('assets/plugins/summernote/summernote-bs4.min.css') }}>


    @yield('style')

</head>

<body class="hold-transition sidebar-mini layout-fixed">


    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')


    {{-- jQuery --}}
    <script src={{ URL::to('assets/plugins/jquery/jquery.min.js') }}></script>
    {{-- jQuery UI 1.11.4 --}}
    <script src={{ URL::to('assets/plugins/jquery-ui/jquery-ui.min.js') }}></script>
    <script src={{ URL::to('assets/plugins/jquery-ui/jquery-ui.min.css') }}></script>
    {{-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip --}}
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    {{-- Bootstrap 4 --}}
    <script src={{ URL::to('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}></script>
    {{-- ChartJS --}}
    <script src={{ URL::to('assets/plugins/chart.js/Chart.min.js') }}></script>
    {{-- Sparkline --}}
    <script src={{ URL::to('assets/plugins/sparklines/sparkline.js') }}></script>
    {{-- JQVMap --}}
    <script src={{ URL::to('assets/plugins/jqvmap/jquery.vmap.min.js') }}></script>
    <script src={{ URL::to('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}></script>
    {{-- jQuery Knob Chart --}}
    <script src={{ URL::to('assets/plugins/jquery-knob/jquery.knob.min.js') }}></script>
    {{-- daterangepicker --}}
    <script src={{ URL::to('assets/plugins/moment/moment.min.js') }}></script>
    <script src={{ URL::to('assets/plugins/daterangepicker/daterangepicker.js') }}></script>
    {{-- Tempusdominus Bootstrap 4 --}}
    <script src={{ URL::to('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}></script>
    {{-- Summernote --}}
    <script src={{ URL::to('assets/plugins/summernote/summernote-bs4.min.js') }}></script>
    {{-- overlayScrollbars --}}
    <script src={{ URL::to('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}></script>
    {{-- AdminLTE App --}}
    <script src={{ URL::to('assets/dist/js/adminlte.js') }}></script>
    {{-- AdminLTE for demo purposes --}}
    <script src={{ URL::to('assets/dist/js/demo.js') }}></script>
    {{-- AdminLTE dashboard demo (This is only for demo purposes) --}}
    <script src={{ URL::to('assets/dist/js/pages/dashboard.js') }}></script>

    <script>
        var goFS = document.getElementById("goFS");
        goFS.addEventListener("click", function() {
            document.body.requestFullscreen();
        }, false);
    </script>

    @yield('script')


</body>

</html>
