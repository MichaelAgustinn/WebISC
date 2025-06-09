@extends('layoutLanding.master')

@section('content')
    <main class="main">
        <!-- Hero Section -->
        @include('layoutLanding.hero')
        <!-- /Hero Section -->

        <!-- About Section -->
        @include('layoutLanding.about')
        <!-- /About Section -->

        <!-- Values Section -->
        @include('layoutLanding.visi')
        <!-- /Values Section -->

        <!-- Stats Section -->
        @include('layoutLanding.section')
        <!-- /Stats Section -->

        <!-- Pricing Section -->
        {{-- @dd($events) --}}
        @if (empty($events))
            @include('layoutLanding.event')
        @endif
        <!-- /Pricing Section -->

        <!-- Faq Section -->
        @include('layoutLanding.faq')
        <!-- /Faq Section -->

        <!-- Portfolio Section -->
        @include('layoutLanding.karya')
        <!-- /Portfolio Section -->

        <!-- Testimonials Section -->
        @include('layoutLanding.testimoni')
        <!-- /Testimonials Section -->

        <!-- Team Section -->
        @include('layoutLanding.pembimbing')
        <!-- /Team Section -->

        <!-- Clients Section -->
        @include('layoutLanding.logo')
        <!-- /Clients Section -->

        <!-- Recent Posts Section -->
        @include('layoutLanding.blog')
        <!-- /Recent Posts Section -->

        <!-- Contact Section -->
        @include('layoutLanding.contact')
        <!-- /Contact Section -->
    </main>
@endsection
