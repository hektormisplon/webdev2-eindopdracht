<header class="header navbar bg-light">
    <section class="navbar-section">
        <a href="@auth /home @endauth @guest / @endguest" class="navbar-brand">{{ config('app.name') }}</a>
    </section>
    <section class="navbar-center">
        @auth
        <div class="popover popover-bottom">
            <a class="btn btn-link badge" href="/credits" data-badge="{{ auth()->user()->credit_amount }}">
                <i class="icon icon-2x" data-feather="package"></i>
            </a>
            <div class="popover-container">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">{{ auth()->user()->credit_amount }}</h3>
                        <div class="divider text-center" data-content="Credits"></div>
                    </div>
                    <div class="card-footer">
                        <div class="btn-group btn-group-block">
                            @if ( auth()->user()->credit_amount > 0 )
                            <a href="" class="btn">View</a>
                            @endif
                            <a href="" class="btn btn-primary">Buy</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endauth
    </section>
    <section class="navbar-section hide-sm">
        <a href="/about" class="btn btn-link">About</a>
        <a href="/contact" class="btn btn-link">Contact</a>
        <a href="/news" class="btn btn-link">News</a>
        @guest
        <div class="btn-group">
            <a href="/login" class="btn btn-secondary">Sign in</a>
            <a href="/register" class="btn btn-primary">Sign up</a>
        </div>
        @endguest
        @auth
        <div class="ml-2 popover popover-bottom">
            <a href="/profile">
                <figure class="avatar avatar-lg"> <img src="/storage/avatars/{{ auth()->user()->avatar }}" /></figure>
            </a>
            <div class="popover-container">
                <ul class="menu">
                    <li class="divider" data-content="Profile">
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('profile.index') }}">
                            <i class="icon" data-feather="settings"></i>
                            Settings
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="text-error" href="{{ route('logout') }}">
                            <i class="icon" data-feather="log-out"></i>
                            Sign out
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        @endauth
    </section>
</header>