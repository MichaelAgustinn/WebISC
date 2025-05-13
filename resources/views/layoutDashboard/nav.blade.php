<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link">Landing Page</a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img src="{{ Auth::user()->foto ? 'storage/' . Auth::user()->foto : 'storage/photo_profil/default.jpg' }}"
                    class="user-image rounded-circle shadow" alt="User Image" />
                <span class="d-none d-md-inline"> {{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <!--begin::User Image-->
                <li class="user-header text-bg-primary text-center">
                    <img src="{{ Auth::user()->foto ? 'storage/' . Auth::user()->foto : 'storage/photo_profil/default.jpg' }}"
                        class="rounded-circle shadow" alt="User Image" />
                    <p>
                        {{ Auth::user()->name }} - {{ Auth::user()->jabatan }}
                    </p>
                </li>
                <li class="user-footer text-center">
                    <a href="{{ route('profile.edit') }}" class="btn btn-default btn-flat">
                        {{ __('Profile') }}</a>
                    {{-- <a class="btn btn-default btn-flat float-end"> --}}
                    <form method="POST" action="{{ route('logout') }}" class="btn btn-default btn-flat float-end"
                        onclick="event.preventDefault();
                                this.closest('form').submit();">
                        @csrf
                        {{ __('Log Out') }}
                    </form>
                    {{-- </a> --}}
                </li>
                <!--end::Menu Footer-->
            </ul>

        </li>
    </ul>
</nav>
