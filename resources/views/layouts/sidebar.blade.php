<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="" class="img-circle"
                     alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name}}</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <br/>


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
