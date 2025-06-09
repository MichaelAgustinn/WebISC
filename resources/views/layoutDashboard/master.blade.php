<!DOCTYPE html>
<html lang="en">

@include('layoutDashboard.head')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('LogoIsc.png') }}" alt="AdminLTELogo" height="80" width="80">
        </div>

        @include('layoutDashboard.nav')

        @include('layoutDashboard.aside')

        @yield('content')

        @include('layoutDashboard.footer')

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    @include('layoutDashboard.script')
</body>

</html>
