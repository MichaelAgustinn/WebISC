<section id="portfolio" class="portfolio section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Creations</h2>
        <p>Our Latest Works</p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

            <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                <li data-filter="*" class="filter-active">All</li>
                <li data-filter=".filter-Mobile">Mobile</li>
                <li data-filter=".filter-Website">Website</li>
                <li data-filter=".filter-IoT">IoT</li>
                <li data-filter=".filter-UIUX">UI/UX</li>
                <li data-filter=".filter-SistemCerdas">Sistem Cerdas</li>
            </ul><!-- End Portfolio Filters -->

            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                @foreach ($creations as $creation)
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ $creation->divisi }}">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('storage/' . $creation->image_path) }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>{{ $creation->title }}</h4>
                                <p>{{ $creation->description }}</p>
                                <a href="{{ asset('storage/' . $creation->image_path) }}"
                                    title="Judul Karya : {{ $creation->title }}"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                                <a href="{{ route('karya.detail', $creation->id) }}" title="More Details"
                                    class="details-link"><i class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->
                @endforeach


            </div>

            <!-- End Portfolio Container -->

        </div>

    </div>

</section>
