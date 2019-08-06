<header class="header p-fixed navbar bg-light">
    <section class="navbar-section">
        <a href="/" class="navbar-brand">{{ config('app.name') }}</a>
    </section>
    <section class="navbar-center">
        <a class="btn btn-link badge" href="/credits" data-badge="80">
            <i class="icon icon-2x" data-feather="package"></i>
        </a>
    </section>
    <section class="navbar-section">
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
        <div class="popover popover-bottom">
            <a href="/profile">
                <figure class="avatar avatar-lg"> <img src="/storage/avatars/{{ auth()->user()->avatar }}" /></figure>
            </a>
            <div class="popover-container">
                <div class="d-inline-flex">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-action btn-error" type="submit"></button>
                    </form>
                    <a class="btn btn-action" href="{{ route('profile.index') }}">
                    </a>
                    <a class="btn btn-action" href="{{ route('profile.index') }}">
                    </a>
                </div>
            </div>
        </div>
        @endauth
    </section>
</header>