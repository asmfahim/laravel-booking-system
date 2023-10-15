<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Nilai Booking System | @yield('title') </title>

{{--    <meta property="og:url" content="" />--}}
{{--    <meta property="og:type" content="Nilai Booking System" />--}}
{{--    <meta property="og:title" content="Nilai Booking System" />--}}
{{--    <meta property="og:description" content="Nilai Booking System" />--}}
{{--    <meta property="og:image" content="https://www.nilai.edu.my/" />--}}
    <!--favicon-->
    <link rel="icon" type="image/png" href="{{asset('public/nilaibooking/img/Curtin-logo.png')}}" sizes="16x16">
    <link rel="icon" type="image/png" href="{{asset('public/nilaibooking/img/Curtin-logo.png')}}" sizes="32x32">

    <!-- for IE -->
    <link rel="icon" type="image/x-icon" href="{{asset('/nilaibooking/img/nilailogo.ico')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/nilaibooking/img/nilailogo.ico')}}" />
    <link rel="shortcut icon" href="{{asset('/nilaibooking/img/nilailogo.ico')}}">

    <meta name="description" content="Nilai Booking System" />
    <meta name="keywords" content="booking system"/>

    <!-- Bootstrap -->
    <link href="{{asset('public')}}/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{asset('public')}}/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('public')}}/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('public')}}/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{asset('public')}}/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('public')}}/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('public')}}/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('public')}}/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('public')}}/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">


    <!-- Custom Theme Style -->
    <link href="{{asset('public')}}/build/css/custom.css " rel="stylesheet">
    <link href="{{asset('public')}}/build/css/modal.css " rel="stylesheet">
    <link href="{{asset('public')}}/build/css/timeline-style.css " rel="stylesheet">

    <!-- onload modal CDN -->
{{--    <script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js "></script>--}}


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- amchart css -->

    <link rel="stylesheet" type="text/css" href="{{asset('public')}}/vendors/jquerysteps/css/jquery.steps.css ">
    <link rel="stylesheet" type="text/css" href="{{asset('public')}}/vendors/jquerysteps/css/main.css ">
    <link rel="stylesheet" type="text/css" href="{{asset('public')}}/vendors/jquerysteps/css/normalize.css ">


    <script src="{{asset('public')}}/vendors/jquery/dist/jquery.min.js "></script>
    <script src="{{asset('public')}}/vendors/jquerysteps/js/jquery.steps.js "></script>

    @yield('style-css')


    <!-- Scripts -->
{{--    @vite(['resources/sass/app.scss', 'resources/js/app.js'])--}}
</head>

@php
    $usr = Auth::guard('web')->user();
    $roleName = $usr->getRoleNames()[0];
@endphp

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        @include('partials.sidebar')
        @include('partials.top-navbar')
{{--    <div id="app">--}}
{{--        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">--}}
{{--            <div class="container">--}}
{{--                <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--                    {{ config('app.name', 'Laravel') }}--}}
{{--                </a>--}}
{{--                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
{{--                    <span class="navbar-toggler-icon"></span>--}}
{{--                </button>--}}

{{--                <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--                    <!-- Left Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav me-auto">--}}

{{--                    </ul>--}}

{{--                    <!-- Right Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav ms-auto">--}}
{{--                        <!-- Authentication Links -->--}}
{{--                        @guest--}}
{{--                            @if (Route::has('login'))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}

{{--                            @if (Route::has('register'))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
{{--                        @else--}}
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                    {{ Auth::user()->name }}--}}
{{--                                </a>--}}

{{--                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">--}}
{{--                                    <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                       onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                        {{ __('Logout') }}--}}
{{--                                    </a>--}}

{{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                                        @csrf--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        @endguest--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </nav>--}}
{{--        --}}
{{--    </div>--}}
        <div class="right_col" role="main">
            @yield('content')
        </div>

    </div>
</div>
<!-- promo modal Script-->

<!-- <script>
  $(document).ready(function () {
    $('.modal').modal('show');
  });
</script> -->
<!-- / promo modal script-->

<!-- /page content -->

<!-- footer content -->
<!-- <footer>
  <div class="pull-right">
    nilaibooking - Copyright
    <a href="http://www.nilaibooking.com.bd/">nilaibooking Private Limited</a>
  </div>
  <div class="clearfix"></div>
</footer> -->
<!-- /footer content -->






<!-- jQuery -->
<script src="{{asset('public')}}/vendors/jquery/dist/jquery.min.js "></script>



<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
<script src="{{asset('public')}}/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="{{asset('public')}}/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="{{asset('public')}}/vendors/nprogress/nprogress.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{asset('public')}}/vendors/moment/min/moment.min.js"></script>
<script src="{{asset('public')}}/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-datetimepicker -->
<script src="{{asset('public')}}/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<!-- Ion.RangeSlider -->
<script src="{{asset('public')}}/vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
<!-- jquery.inputmask -->
<script src="{{asset('public')}}/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
<!-- jQuery Knob -->
<script src="{{asset('public')}}/vendors/jquery-knob/dist/jquery.knob.min.js"></script>

<!-- Dropzone.js -->
<script src="{{asset('public')}}/vendors/dropzone/dist/min/dropzone.min.js"></script>

<!-- iCheck -->
<script src="{{asset('public')}}/vendors/iCheck/icheck.min.js"></script>
<!-- Datatables -->
<script src="{{asset('public')}}/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('public')}}/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="{{asset('public')}}/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('public')}}/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="{{asset('public')}}/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{asset('public')}}/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('public')}}/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('public')}}/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="{{asset('public')}}/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="{{asset('public')}}/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('public')}}/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="{{asset('public')}}/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="{{asset('public')}}/vendors/jszip/dist/jszip.min.js"></script>
<script src="{{asset('public')}}/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="{{asset('public')}}/vendors/pdfmake/build/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>




<!-- Custom Theme Scripts -->
<script src="{{asset('public')}}/build/js/custom.js"></script>

@yield('script')

{{--Toster message--}}
    <script type="text/javascript">
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        toastr.error("{!! $error !!}");
        @endforeach
        @endif
    </script>

    @if (Session::has('success'))
        <script type="text/javascript">
            toastr.success("{!! Session::get('success') !!}");
        </script>
    @endif

<!-- Initialize datetimepicker -->
<script>
    $('#myDatepicker').datetimepicker();

    $('#myDatepicker2').datetimepicker({
        format: 'YYYY.MM.DD'
    });

    $('#myDatepicker3').datetimepicker({
        format: 'hh:mm'
    });

    $('#myDatepicker22').datetimepicker({
        format: 'YYYY.MM.DD'
    });

    $('#myDatepicker33').datetimepicker({
        format: 'hh:mm'
    });

    $('#myDatepicker4').datetimepicker({
        ignoreReadonly: true,
        allowInputToggle: true
    });

    $('#datetimepicker6').datetimepicker();

    $('#datetimepicker7').datetimepicker({
        useCurrent: false
    });

    $("#datetimepicker6").on("dp.change", function(e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });

    $("#datetimepicker7").on("dp.change", function(e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });
</script>





</body>

</html>
