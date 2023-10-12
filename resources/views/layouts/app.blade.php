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
    <link rel="icon" type="image/png" href="{{asset('/nilaibookin/img/Curtin-logo.png')}}" sizes="16x16">
    <link rel="icon" type="image/png" href="{{asset('/nilaibooking/img/Curtin-logo.png')}}" sizes="32x32">

    <!-- for IE -->
    <link rel="icon" type="image/x-icon" href="{{asset('/nilaibooking/img/nilailogo.ico')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/nilaibooking/img/nilailogo.ico')}}" />
    <link rel="shortcut icon" href="{{asset('/nilaibooking/img/nilailogo.ico')}}">

    <meta name="description" content="Nilai Booking System" />
    <meta name="keywords" content="booking system"/>

    <!-- Bootstrap -->
    <link href="{{asset('/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{asset('/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.cs')}}s" rel="stylesheet">
    <link href="{{asset('/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.cs')}}s" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('/build/css/custom.css')}} " rel="stylesheet">
    <link href="{{asset('/build/css/modal.css')}} " rel="stylesheet">
    <link href="{{asset('/build/css/timeline-style.css')}} " rel="stylesheet">

    <!-- onload modal CDN -->
    <script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js "></script>



    <link rel="stylesheet" type="text/css" href="{{asset('/vendors/jquerysteps/css/jquery.steps.css')}} ">
    <link rel="stylesheet" type="text/css" href="{{asset('/vendors/jquerysteps/css/main.css')}} ">
    <link rel="stylesheet" type="text/css" href="{{asset('/vendors/jquerysteps/css/normalize.css')}} ">

    <script src="{{asset('/vendors/jquery/dist/jquery.min.js')}} "></script>
    <script src="{{asset('/vendors/jquerysteps/js/jquery.steps.js')}} "></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
{{--    @vite(['resources/sass/app.scss', 'resources/js/app.js'])--}}
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
