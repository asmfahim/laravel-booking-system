<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Booking System') }}</title>

    {{--    <meta property="og:url" content="" />--}}
    {{--    <meta property="og:type" content="Nilai Booking System" />--}}
    {{--    <meta property="og:title" content="Nilai Booking System" />--}}
    {{--    <meta property="og:description" content="Nilai Booking System" />--}}
    {{--    <meta property="og:image" content="https://www.nilai.edu.my/" />--}}
    <!--favicon-->
    <link rel="icon" type="image/png" href="{{asset('public/nilaibooking/img/nilai.png')}}" sizes="16x16">
    <link rel="icon" type="image/png" href="{{asset('public/nilaibooking/img/nilai.png')}}" sizes="32x32">

    <!-- for IE -->
    <link rel="icon" type="image/x-icon" href="{{asset('/nilaibooking/img/nilailogo.ico')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/nilaibooking/img/nilailogo.ico')}}" />
    <link rel="shortcut icon" href="{{asset('public/nilaibooking/img/nilailogo.ico')}}">

    <meta name="description" content="Nilai Booking System" />
    <meta name="keywords" content="booking system"/>

    <!-- Bootstrap -->
    <link href="{{asset('public')}}/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('public')}}/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('public')}}/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('public')}}/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="{{asset('public')}}/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- Ion.RangeSlider -->
    <link href="{{asset('public')}}/vendors/normalize-css/normalize.css" rel="stylesheet">
    <link href="{{asset('public')}}/vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="{{asset('public')}}/vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('public')}}/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{asset('public')}}/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('public')}}/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('public')}}/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('public')}}/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('public')}}/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- Dropzone.js -->
    <link href="{{asset('public')}}/vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('public')}}/build/css/custom.css " rel="stylesheet">
    <link href="{{asset('public')}}/build/css/timeline-style.css " rel="stylesheet">




    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    {{--    @vite(['resources/sass/app.scss', 'resources/js/app.js'])--}}
</head>
<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>
        <a href="{{url('/')}}">
        <img src="{{asset('public/nilaibooking')}}/img/nilai.png" alt="Logo" width="90" class="center">
        </a>

        @yield('content')

    </div>

</body>
</html>
