<aside class="col-12 col-md-2 p-0 bg-dark flex-shrink-1">
    <nav class="navbar navbar-expand navbar-dark bg-dark flex-md-column flex-row align-items-start py-2">
        <div class="collapse navbar-collapse ">
            <ul class="flex-md-column flex-row navbar-nav w-100 justify-content-between">
                <li class="nav-item active">
                    <a class="nav-link pl-0 text-nowrap" href="{{ route('home/page') }}"><i class="fa fa-bullseye fa-fw"></i> <span class="font-weight-bold">Dashboard</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-0" href="{{ route('form/personal/new') }}"><i class="fa fa-book fa-fw"></i> <span class="d-none d-md-inline">Form</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-0" href="{{ route('form/report') }}"><i class="fa fa-cog fa-fw"></i> <span class="d-none d-md-inline">Report</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-0" href="#"><i class="fa fa-heart codeply fa-fw"></i> <span class="d-none d-md-inline">Maintenance</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-0" href="#"><i class="fa fa-star codeply fa-fw"></i> <span class="d-none d-md-inline">Promission</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-0" href="{{ route('form/logout') }}"><i class="fa fa-sign-out"></i> <span class="d-none d-md-inline">Logout</span></a>
                </li>
            </ul>
        </div>
    </nav>
</aside>