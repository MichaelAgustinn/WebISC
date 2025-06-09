<!DOCTYPE html>
<html lang="en">

@include('layoutLanding.head')

<body class="index-page">

    @include('layoutLanding.header')

    
        @yield('content')
    

    @include('layoutLanding.footer')

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('layoutLanding.script')

</body>

</html>
