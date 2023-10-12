


<div class="col-md-3 left_col">

    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0; margin-top: 0 !important;">
            <a href="{{route('dashboard')}}" class="site_title">
                <i>
                    <img  class="smalllogo"  src="{{asset('public/nilaibooking')}}/img/nilai.png"> </i>
                <img class="full_logo" src="{{asset('public/nilaibooking')}}/img/nilai.png" />
            </a>
        </div>
        <div class="clearfix"></div>
        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <!--<div class="profile_pic">
                 <img src="images/img.png" alt="..." class="img-circle profile_img">
               </div> -->
            <div class="profile_info">
                <span>Welcome,</span>
{{--                <h2>  <?php echo getUserAccessRoleByID($_SESSION['user_role_id']); ?> </h2>--}}
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->

        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
{{--                    <?=show_menu($_SESSION['user_role_id'])?> --}}
                </ul>
            </div>

        </div>

        <!-- /sidebar menu -->

        <!-- sidebar footer menu -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}"
               onclick="event.preventDefault();document.getElementById('logout-form').submit();"
            >
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /sidebar footer menu -->

{{--        logout form code--}}
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>


    </div>

</div>
