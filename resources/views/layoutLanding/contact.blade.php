<section id="contact" class="contact section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="">
        <h2>Contact</h2>
        <p>Contact Us</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="" data-aos-delay="100">

        <div class="row gy-4">
            <div class="col-lg-12">

                <div class="container">

                    <div class="row gy-4 justify-content-center text-center">
                        @php
                            $icon = [
                                'Address' => 'bi-geo-alt',
                                'Phone' => 'bi-telephone',
                                'Email' => 'bi-envelope',
                                'Open Hours' => 'bi-clock',
                            ];
                            // $i = 0;
                        @endphp

                        @foreach ($contacts as $contact)
                            <div class="col-md-6">
                                <div class="info-item" data-aos="   " data-aos-delay="200">
                                    <i class="bi {{ $icon[$contact->type] }}"></i>
                                    <h3>{{ $contact->type }}</h3>
                                    <p>{{ $contact->name }}</p>
                                    <p>{{ $contact->value }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>


            </div>

        </div>

    </div>

</section>
