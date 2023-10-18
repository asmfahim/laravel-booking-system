@extends('layouts.app')
@section('title','Dashboard')
@section('style-css')
    <style>
        .tile-stats p{
            margin-left: 0px !important;
        }
    </style>
@endsection
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
                <h1 id="promo-title">Nilai Booking Genie</h1>

            </div>

        </div>

    </div>
    <div class="clearfix"></div>

    <div class="row top_tiles top-row">
        <div class="animated flipInY col-lg-3 col-md-6 col-sm-6 col-xs-12" onmouseover="hovereffect()" onmouseout="noHover()">

            <div class="tile-stats top-tiles first-tile" id="first">
                <p><a href="{{route('booking.page')}}"  style="color:white !important;">Book Equipment</a></p>

            </div>

        </div>



        @if($usr->can('bookings.create'))
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats top-tiles first-tile">
                    <p><a href="{{route('booking.index')}}" style="color:white !important;"> Confirmed Bookings </a></p>

                </div>
            </div>
        @endif

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
