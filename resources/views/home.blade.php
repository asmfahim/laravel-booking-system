@extends('layouts.app')
@section('title','Dashboard')
@section('content')

    @php
        $usr = Auth::guard('web')->user();
        $roleName = $usr->getRoleNames()[0];
    @endphp

<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 1em;">
            <p class="top-note">Welcome
                <span>  @php echo $roleName; @endphp </span>

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

                </div>
                <p><a href="booking.php"  style="color:white !important;">Book Equipment</a></p>
                <div class="count"></div>
            </div>

        </div>

        @foreach($categories as $row)
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12" >
                <div class="tile-stats top-tiles second-tile">
                    <div class="icon">

                        <img class="icon-first-tile" src="{{asset('public/upload/category/'. $row->category_image)}}" id="showImage" height="100" width="100" style="border-radius: 5px;" alt="">
{{--                        <img class="small-icons" src="images/outfield.png" />--}}
                    </div>
                    <p><a href="" style="color:white !important;">{{$row->category_name}}</a></p>
                    <div class="count"></div>
                </div>
            </div>
        @endforeach

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

@section('script')
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
@endsection
