<section id="about" class="about section">
    <div class="container" data-aos="fade-up">
        <div class="row gx-0">
            <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                <div class="content">
                    <h3>About ISC</h3>
                    <h2>{{ $about->judul ?? '' }}</h2>
                    <p>
                        {{ $about->content ?? '' }}
                    </p>
                    <div class="text-center text-lg-start">
                        <a href="#"
                            class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                            <span>Read More</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                <img src="{{ asset('storage/' . (!empty($about->foto) ? $about->foto : '')) }} " class="img-fluid"
                    alt="">
            </div>
        </div>
    </div>
</section>
