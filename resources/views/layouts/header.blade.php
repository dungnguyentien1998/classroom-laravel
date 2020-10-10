<header class="main-header">

    <a href="" class="logo">

        <span class="logo-mini"></span>

        <span class="logo-lg">Classroom</span>
    </a>


    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <img src=""
                             class="user-image" alt="User Image">

                        <span class="hidden-xs">{{ Auth::user()->username }}</span>
                    </a>
                    <ul class="dropdown-menu">

                        <li class="user-header">
                            <img src=""
                                 class="img-circle" alt="User Image">

                            <p>
                                Hello {{ Auth::user()->username }}
                            </p>
                        </li>

                        <li class="user-footer">
                            @if (Auth::guest())
                                <div class="pull-left">
                                    <a href="{{ route('login') }}" class="btn btn-default btn-flat">Login</a>
                                </div>
                            @else
    {{--                                <div class="pull-left">--}}
    {{--                                    <a href="{{ url('profile') }}" class="btn btn-default btn-flat">Profile</a>--}}
    {{--                                </div>--}}
                                <div class="pull-right">
                                    @if(Auth::user()->is_admin == 1)
                                        <a class="btn btn-default btn-flat" href="{{ route('admin.logout') }}"
                                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                    @else
                                        <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                    @endif


                                </div>
                            @endif
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
@if(Auth::user()->is_admin == 1)
    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
        @else
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @endif
                {{ csrf_field() }}
            </form>
