<header class="header">
    <nav id="navbar" class="navbar fixed-top navbar-expand-lg">
        <div class="navbar-brand abs">
            <a href="{{ '/' }}" data-target="0">
                <img class="brand-logo" src="{{ asset('img/logo.png') }}" alt="Logo" />
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
            <i class="fas fa-bars"></i>
        </button>
        <div class="navbar-collapse collapse" id="collapsingNavbar">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('activities') ? 'active' : '' }}"
                        href="{{ route('activities') }}">ACTIVITATS</a>
                </li>
                <li class="nav-item menu">
                    <a class="nav-link {{ Request::routeIs('socis') ? 'active' : '' }}"
                        href="{{ route('socis') }}">SOCIS</a>
                </li>
                <li class="nav-item menu">
                    <a class="nav-link {{ Request::routeIs('contact') ? 'active' : '' }}"
                        href="{{ route('contact') }}">CONTACTE</a>
                </li>
            </ul>
            <div class="my-2 my-lg-0 nav-item">
                <a class="nav-link" href="https://socis.lalianca.cat/" target="_blank" rel="nofollow"><i
                        class="fa-solid fa-user"></i></a>
            </div>
        </div>
    </nav>
</header>
