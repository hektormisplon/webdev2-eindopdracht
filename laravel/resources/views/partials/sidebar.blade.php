<div class="off-canvas off-canvas-sidebar-show">
    <a class="off-canvas-toggle btn btn-primary btn-action" href="#sidebar">
        <i class="icon icon-arrow-right"></i>
    </a>
    <div class="off-canvas-sidebar bg-primary" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <ul class="nav">
                    <li class="nav-header">
                        <i class="icon icon-2x" data-feather="briefcase"></i>
                        <h6 class="text-bold">My projects</h6>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-light" href="/projects/create">Create project</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-light" href="/projects">Manage projects</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <ul class="nav">
                    <li class="nav-header">
                        <i class="icon icon-2x" data-feather="package"></i>
                        <h6 class="text-bold">Creunits</h6>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-light" href="/credits">My creunits</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-light" href="/credits">Buy creunits</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <ul class="nav">
                    <li class="nav-header">
                        <i class="icon icon-2x" data-feather="wind"></i>
                        <h6 class="text-bold">Discover</h6>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-light" href="/discover">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-light" href="/news">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-light" href="/about">About us</a>
                    </li>
                </ul>
            </li>
            @if(auth()->user()->isAdmin())
            <li class="nav-item">
                <ul class="nav">
                    <li class="nav-header">
                        <i class="icon icon-2x" data-feather="zap"></i>
                        <h6 class="text-bold">
                            Admin
                        </h6>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-light" href="/account">Manage accounts</a>
                    </li>
                </ul>
            </li>
            @endif
        </ul>
    </div>
    <a class="off-canvas-overlay" href="#close"></a>
</div>