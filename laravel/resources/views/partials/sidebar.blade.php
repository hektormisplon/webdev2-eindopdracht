<div class="off-canvas off-canvas-sidebar-show">
    <a class="off-canvas-toggle btn btn-primary btn-action" href="#sidebar">
        <i class="icon icon-arrow-right"></i>
    </a>
    <div class="off-canvas-sidebar bg-primary" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <ul class="nav">
                    <li class="nav-item">
                        <h6 class="text-bold">Projects</h6>
                    </li>
                    <li class="nav-item">
                        <a class="text-light" href="/projects/create">Create project</a>
                    </li>
                    <li class="nav-item">
                        <a class="text-light" href="/projects">My projects</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <ul class="nav">
                    <li class="nav-item">
                        <h6 class="text-bold">Credits</h6>
                    </li>
                    <li class="nav-item">
                        <a class="text-light" href="/credits">My credits</a>
                    </li>
                    <li class="nav-item">
                        <a class="text-light" href="/credits">Buy credits</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <ul class="nav">
                    <li class="nav-item">
                        <h6 class="text-bold">Discover</h6>
                    </li>
                    <li class="nav-item">
                        <a class="text-light" href="/news">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="text-light" href="/about">About</a>
                    </li>
                </ul>
            </li>
            @if(auth()->user()->isAdmin())
            <li class="nav-item">
                <ul class="nav">
                    <li class="nav-item">
                        <i class="icon icon-2x" data-feather="zap"></i>
                        <h6 class="text-bold">
                            Admin
                        </h6>
                    </li>
                    <li class="nav-item">
                        <a class="text-light" href="/account">Manage accounts</a>
                    </li>
                </ul>
            </li>
            @endif
        </ul>
    </div>
    <a class="off-canvas-overlay" href="#close"></a>
</div>