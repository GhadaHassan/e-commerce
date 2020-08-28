<header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/dashboard/home') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->

        <span class="logo-mini"><b>
            <img src="{{asset('theme/logo.png')}}" class="img-circle" alt="Logo Image">
        <!-- {{ Config::get('constants.SITE_SHORT_FIRST_NAME') }}</b>{{ Config::get('constants.SITE_SHORT_LAST_NAME') }} --></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
            <img src="{{asset('theme/logo.png')}}" class="img-circle" alt="Logo Image">
            <!-- <b>{{ Config::get('constants.SITE_FIRST_NAME') }}</b>{{ Config::get('constants.SITE_LAST_NAME') }} --></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        {{-- <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                       

                        <span class="hidden-xs">{{ auth()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-footer" style="background-color: #12113e !important;">
                            <div class="pull-left">
                                <a href="{{url('/')}}" class="btn btn-default btn-flat">WEBSITE</a>
                            </div>
                            <div class="pull-right">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <a href="{{ url('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();document.getElementById('logout-form').submit();">LOGOUT</a>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div> --}}
    </nav>
</header>