@extends('layouts.app')
@section('title','Dashboard')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>


<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 1em;">
            <p class="top-note">Welcome
{{--                <span>  <?php echo getUserAccessRoleByID($_SESSION['user_role_id']); ?> </span>--}}
            </p>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row top_tiles">
        <div class="bannerImage animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="modal-body promo-body">
                <h1 id="promo-title">Curtin Booking Genie</h1>
                <!--     <h2 id="promo-content">10% off on next 10 Deliveries</h2>
                    <h5 id="promo-foot-note"> Offer lasts till 15th September</h5> -->
            </div>

        </div>

    </div>
    <div class="clearfix"></div>

    <div class="row top_tiles top-row">
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12" onmouseover="hovereffect()" onmouseout="noHover()">
            <div class="tile-stats top-tiles first-tile" id="first">
                <div class="icon">
                    <img class="icon-first-tile" id="BigBox" src="images/gym.png" />
                    <img class="small-icons" id="smallBox" src="images/ball.png" />
                    <script>
                        function hovereffect() {
                            var x = document.getElementById("BigBox");
                            var y = document.getElementById("smallBox");
                            x.style.display = "none";
                            y.style.display = "block";
                        }

                        function noHover() {
                            var x = document.getElementById("BigBox");
                            var y = document.getElementById("smallBox");
                            x.style.display = "block";
                            y.style.display = "none";
                        }
                    </script>
                </div>
                <p><a href="booking.php"  style="color:white !important;">Book Equipment</a></p>
                <div class="count"></div>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats top-tiles second-tile">
                <div class="icon">
                    <img class="small-icons" src="images/outfield.png" />
                </div>
                <p><a href="outdoor_booking.php" style="color:white !important;">Book Outdoor Field</a></p>
                <div class="count"></div>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats top-tiles third-tile">
                <div class="icon">
                    <img class="small-icons" src="images/infield.png" />
                </div>
                <p ><a href="indoor_booking.php" style="color:white !important;">Book Indoor Court</a></p>
                <div class="count"></div>


            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats top-tiles fourth-tile">
                <div class="icon">
                    <img class="small-icons" src="images/Return.png" />
                </div>
                <p><a href="view_bookings_accepted.php" style="color:white !important;">Confirmed Bookings</a></p>
                <div class="count"></div>
            </div>
        </div>
    </div>

</div>

@endsection
