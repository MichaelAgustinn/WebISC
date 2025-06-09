@extends('layoutLanding.master')

@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="heading">
            </div>
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li class="current">Portfolio Details</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Page Title -->

        <!-- Portfolio Details Section -->
        <section id="portfolio-details" class="portfolio-details section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-8">
                        <div class="portfolio-details-slider swiper init-swiper">

                            {{-- <script type="application/json" class="swiper-config">
              {
                "loop": true,
                "speed": 600,
                "autoplay": {
                  "delay": 5000
                },
                "slidesPerView": "auto",
                "pagination": {
                  "el": ".swiper-pagination",
                  "type": "bullets",
                  "clickable": true
                }
              }
            </script> --}}
                            <div class="swiper-wrapper align-items-center">

                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/' . $data->image_path) }}" alt="" class="img-fluid"
                                        style="max-height: 700px; object-fit: contain;">
                                </div>

                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="portfolio-info" data-aos="fade-up" data-aos-delay="200">
                            <h3>Project information</h3>
                            <ul>
                                <li><strong>Judul</strong>: {{ $data->title }}</li>
                                <li><strong>Divisi</strong>: {{ $data->divisi }}</li>
                                <li><strong>Tanggal Upload</strong>: {{ $data->created_at->format('d-m-Y') }}</li>
                                <li><strong>Anggota Tim</strong>:
                                    {{-- @foreach ($data->User as $user) --}}
                                    {{ $data->User->pluck('name')->join(', ') }}
                                    {{-- @endforeach --}}
                                </li>
                            </ul>
                        </div>
                        <div class="portfolio-description" data-aos="fade-up" data-aos-delay="300">
                            <h2>{{ $data->title }}</h2>
                            <p>
                                {{ $data->description }}
                            </p>
                        </div>
                    </div>

                </div>

            </div>

        </section><!-- /Portfolio Details Section -->

    </main>
@endsection
