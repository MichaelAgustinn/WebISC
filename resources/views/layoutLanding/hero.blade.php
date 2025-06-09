<section id="hero" class="hero section">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">{{ !empty($hero->judul) ? $hero->judul : '' }}</h1>
                <p data-aos="fade-up" data-aos-delay="100">{{ !empty($hero->content) ? $hero->content : '' }}</p>
                <div class="d-flex flex-column flex-md-row" data-aos="fade-up" data-aos-delay="200">
                    <a href="#about" class="btn-get-started">About ISC<i class="bi bi-arrow-right"></i></a>
                    <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8"
                        class="glightbox btn-watch-video d-flex align-items-center justify-content-center ms-0 ms-md-4 mt-4 mt-md-0"><i
                            class="bi bi-play-circle"></i><span>Watch Video</span></a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out"
                style="display: flex; justify-content: center; align-items: center; height: 100%;">
                {{-- <img src="{{ asset('landingpages') }}/assets/img/hero-img.png" class="img-fluid animated" width="530"
                    height="530" alt=""> --}}
                <img src="{{ asset('storage/' . (!empty($hero->foto) ? $hero->foto : '')) }} "
                    class="img-fluid animated" style="object-fit: cover;" height="400" width="400" />
            </div>
        </div>
    </div>
</section>
