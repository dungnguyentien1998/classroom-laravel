<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("/bower_components/AdminLTE/dist/img/user2-160x160.jpg") }}" class="img-circle"
                     alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name}}</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>

        <ul class="sidebar-menu">

            <li class="active"><a href="/"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
            @if(Auth::user()->is_admin == 1)

                <li><a href="/admin/dashboard/users"><i class="fa fa-link"></i> <span>User management</span></a></li>
            @else
                <li><a href="{{ route('users.index') }}"><i class="fa fa-link"></i> <span>User management</span></a>
                </li>
            @endif
            @if(Auth::user()->is_admin == 1)

                <li><a href="/admin/dashboard/messages"><i class="fa fa-link"></i> <span>Message management</span></a></li>
            @else
                <li><a href="{{route('messages.index') }}"><i class="fa fa-link"></i> <span>Message management</span></a>
                </li>
            @endif
            @if(Auth::user()->is_admin == 1)

                <li><a href="/admin/dashboard/uploads"><i class="fa fa-link"></i> <span>Upload management</span></a></li>
            @else
                <li><a href="/uploads"><i class="fa fa-link"></i> <span>Upload management</span></a>
                </li>
            @endif
            @if(Auth::user()->is_admin == 1)

                <li><a href="/admin/dashboard/challenges"><i class="fa fa-link"></i> <span>Challenge management</span></a></li>
            @else
                <li><a href="/challenges"><i class="fa fa-link"></i> <span>Challenge management</span></a>
                </li>
            @endif
        </ul>

    </section>

</aside>
