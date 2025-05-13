<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
        <a href="index.html" class="logo d-flex align-items-center me-auto">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="{{ asset('LogoIsc.png') }}" alt="Logo">
            <h1 class="sitename">ISC</h1>
        </a>
        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#hero" class="active">Home<br></a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#team">Team</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
        @if (Route::has('login'))
            @auth
                <a class="btn-getstarted flex-md-shrink-0" href="{{ url('/dashboard') }}">Dashboard</a>
            @else
                {{-- <a class="btn-getstarted flex-md-shrink-0" href="{{ route('login') }}">Login</a> --}}
                @if (Route::has('login'))
                    <a class="btn-getstarted flex-md-shrink-0" href="{{ route('login') }}">Login</a>
                @endif
            @endauth
        @endif
        {{-- <a class="btn-getstarted flex-md-shrink-0" href="{{ route('login') }}">Get Startesd</a> --}}

    </div>
</header>
