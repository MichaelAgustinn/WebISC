<section id="values" class="values section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>About Us</h2>
        <p>Our Vision, Mission, and Goals<br></p>
    </div><!-- End Section Title -->
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card">
                    <img src="{{ asset($visi->foto ?? 'landingpages/assets/img/values-1.png') }}" class="img-fluid"
                        alt="">
                    <h3>{{ $visi->judul ?? '' }}</h3>
                    <p>{{ $visi->content ?? '' }}
                    </p>
                </div>
            </div><!-- End Card Item -->
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card">
                    <img src="{{ $misi->foto ?? asset('landingpages/assets/img/values-2.png') }}" class="img-fluid"
                        alt="">
                    <h3>{{ $misi->judul ?? '' }}</h3>
                    <p>{{ $misi->content ?? '' }}
                    </p>
                </div>
            </div><!-- End Card Item -->
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card">
                    <img src="{{ $tujuan->foto ?? asset('landingpages/assets/img/values-3.png') }}" class="img-fluid"
                        alt="">
                    <h3>{{ $tujuan->judul ?? '' }}</h3>
                    <p>{{ $tujuan->content ?? '' }}
                    </p>
                </div>
            </div><!-- End Card Item -->
        </div>
    </div>
</section>
