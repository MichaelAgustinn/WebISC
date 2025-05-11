<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img src="{{ asset('pp.png') }}" class="user-image rounded-circle shadow" alt="User Image" />
                <span class="d-none d-md-inline"> {{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <!--begin::User Image-->
                <li class="user-header text-bg-primary text-center">
                    <img src="{{ asset('pp.png') }}" class="rounded-circle shadow" alt="User Image" />
                    <p>
                        {{ Auth::user()->name }} - {{ Auth::user()->jabatan }}
                    </p>
                </li>
                <!--end::User Image-->
                <!--begin::Menu Footer-->
                <li class="user-footer text-center">
                    <a href="{{ route('profile.edit') }}" class="btn btn-default btn-flat">
                        {{ __('Profile') }}</a>
                    <form method="POST" action="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                this.closest('form').submit();"
                        class="btn btn-default btn-flat float-end">
                        @csrf
                        {{ __('Log Out') }}
                    </form>
                </li>
                <!--end::Menu Footer-->
            </ul>

        </li>
    </ul>
</nav>
