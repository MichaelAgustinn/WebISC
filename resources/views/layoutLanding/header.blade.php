<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
        <a href="/landingpage" class="logo d-flex align-items-center me-auto">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="{{ asset('LogoIsc.png') }}" alt="Logo">
            <h1 class="sitename">ISC</h1>
        </a>
        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="/landingpage?#hero" class="active">Home<br></a></li>
                <li><a href="/landingpage?#about">About</a></li>
                <li><a href="/landingpage?#portfolio">Portfolio</a></li>
                <li><a href="/landingpage?#team">Team</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="/landingpage?#contact">Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
        @if (Route::has('login'))
            @auth
                @if (Auth::user()->role === 'Admin')
                    <a class="btn-getstarted flex-md-shrink-0" href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    {{-- <form method="POST" action="{{ route('profile.index') }}" class="btn-getstarted flex-md-shrink-0"
                        onclick="event.preventDefault();
                        this.closest('form').submit();">
                        @csrf --}}
                    <a style="color: white" href="{{ route('profile.index') }}"
                        class="btn-getstarted flex-md-shrink-0">Profile</a>
                    {{-- </form> --}}
                @endif
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
