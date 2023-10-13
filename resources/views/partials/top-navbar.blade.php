@php
    $usr = Auth::guard('web')->user();
    $roleName = $usr->getRoleNames()[0];
@endphp

<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle">
                    <i class="fa fa-bars"></i>
                </a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="{{asset('public/nilaibooking')}}/img/user.png" alt="">
                        @php echo $roleName; @endphp
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li>
{{--                            This logout Call form sidebar blade file--}}
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out pull-right"></i> Log Out</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->

