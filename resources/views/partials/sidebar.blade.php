
@php
$usr = Auth::user();
@endphp
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
                <h2>  @php echo $roleName; @endphp </h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->

        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu" style="">
                    @if ($usr->can('dashboard.view') || $usr->can('dashboard.edit'))
                    <li class="current-page">
                        <a href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                    @endif
                    @if ($usr->can('notice.view') )
                        <li class="current-page">
                            <a href="{{route('notice.index')}}">Notice Board</a>
                        </li>
                    @endif
                    @if ($usr->can('bk-display.view') )
                        <li class="current-page">
                            <a href="{{route('booking.page')}}">Booking</a>
                        </li>
                    @endif
                    @if ($usr->can('bk-confirm.view') || $usr->can('bk-confirm.delete'))
                        <li class="current-page">
                            <a href="{{route('booking.index')}}">Booking Confirmation</a>
                        </li>
                    @endif
                      @if ($usr->can('user.view') || $usr->can('user.edit') || $usr->can('user.create') || $usr->can('user.delete'))
                        <li class="">
                            <a href="#">User<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu" style="display: none;">
                                <li>
                                    <a href="{{route('user.index')}}">User List</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if ($usr->can('role.view') || $usr->can('role.edit') || $usr->can('role.create') || $usr->can('role.delete'))
                            <li class="">
                                <a href="#">Roles & Permissions<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none;">
                                    <li>
                                        <a href="{{route('roles.index')}}">Roles List</a>
                                    </li>
                                    <li>
                                        <a href="{{route('roles.create')}}">Role Create</a>
                                    </li>
                                    <li>
                                        <a href="{{route('permission.index')}}">Permission Create</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        @if ($usr->can('category.view') || $usr->can('category.edit') || $usr->can('category.create') || $usr->can('category.delete'))
                        <li class="">
                            <a href="#">Booking Category<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu" style="display: none;">
                                <li>
                                    <a href="{{route('category.index')}}">Category List</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if ($usr->can('subcategory.view') || $usr->can('subcategory.edit') || $usr->can('subcategory.create') || $usr->can('subcategory.delete'))
                        <li class="">
                            <a href="#">Booking Sub Category<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu" style="display: none;">
                                <li>
                                    <a href="{{route('subcategory.index')}}">Sub Category List</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                     @if ($usr->can('announcement.view') || $usr->can('announcement.edit') || $usr->can('announcement.create') || $usr->can('announcement.delete'))
                        <li class="">
                            <a href="#">Announcement<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu" style="display: none;">
                                <li>
                                    <a href="{{route('announcement.index')}}">Announcement List</a>
                                </li>
                                <li>
                                    <a href="{{route('announcement.create')}}">Announcement Create</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if ($usr->can('booking.view') || $usr->can('booking.edit') || $usr->can('booking.create') || $usr->can('booking.delete'))
                        <li class="">
                            <a href="#">Booking<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu" style="display: none;">
                                <li>
                                    <a href="{{route('booking.index')}}">Booking</a>
                                </li>
{{--                                <li>--}}
{{--                                    <a href="create_menu.php">Booking Create</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="create_menu.php">Booking Edit</a>--}}
{{--                                </li>--}}
                            </ul>
                        </li>
                        @endif


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
