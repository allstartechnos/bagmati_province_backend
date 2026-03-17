<footer>
    <section id="footer">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <a href="index.html">
                        <h3 class="text-white fw-bold d-block">Jassim<span class="text-primary">Trading</span>
                        </h3>
                    </a>
                    <p class="mt-4 text-light" style="font-size: 14px; text-align: justify;">
                        {{ $setting->slogan ?? '' }}
                    </p>
                    <div class="footer-icons team">
                        <div class="team-icon">
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                    class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-0" href=""><i
                                    class="fab fa-instagram"></i></a>
                        </div>
                    </div>

                </div>
                <div class="col-lg-2 col-md-6">
                    <h4 class="text-white fw-bold d-block">Short<span class="text-primary"> Link</span></h4>
                    <div class="mt-4 d-flex flex-column short-link">
                        <a href="{{ route('frontend.about') }}" class="mb-2 text-white"><i
                                class="fas fa-angle-right text-secondary me-2"></i>About us</a>
                        <a href="" class="mb-2 text-white"><i
                                class="fas fa-angle-right text-secondary me-2"></i>Contact us</a>
                        <a href="" class="mb-2 text-white"><i
                                class="fas fa-angle-right text-secondary me-2"></i>Our Services</a>
                        <a href="" class="mb-2 text-white"><i
                                class="fas fa-angle-right text-secondary me-2"></i>Our Projects</a>
                        <a href="" class="mb-2 text-white"><i
                                class="fas fa-angle-right text-secondary me-2"></i>Latest Blog</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#">
                        <h4 class="text-white fw-bold d-block">Our<span class="text-primary">
                                Destination</span></h4>
                    </a>
                    <div class="service-item rounded p-2">
                        <div class="row g-2">
                            @forelse (destinations() as $country)
                                <div class="col-4">
                                    <div class="ratio ratio-16x9">
                                        <img src="{{ asset('images/destination/' . $country->image) }}"
                                            class="img-fluid rounded" alt="{{ $country->title }}">
                                    </div>
                                </div>
                            @empty
                                <div class="col-4">
                                    <div class="ratio ratio-16x9">
                                        <img src="{{ asset('frontend/assets/images/kuwat.jpg') }}"
                                            class="img-fluid rounded" alt="">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="ratio ratio-16x9">
                                        <img src="{{ asset('frontend/assets/images/dubai.jpg') }}"
                                            class="img-fluid rounded" alt="">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="ratio ratio-16x9">
                                        <img src="{{ asset('frontend/assets/images/saudi.jpg') }}"
                                            class="img-fluid rounded" alt="">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="ratio ratio-16x9">
                                        <img src="{{ asset('frontend/assets/images/bahrain.jpg') }}"
                                            class="img-fluid rounded" alt="">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="ratio ratio-16x9">
                                        <img src="{{ asset('frontend/assets/images/malaysia.jpg') }}"
                                            class="img-fluid rounded" alt="">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="ratio ratio-16x9">
                                        <img src="{{ asset('frontend/assets/images/qatar.jpg') }}"
                                            class="img-fluid rounded" alt="">
                                    </div>
                                </div>
                            @endforelse


                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-6">
                    <!-- <a href="#" class="h3 text-secondary">Contact Us</a> -->
                    <a href="#">
                        <h4 class="text-white fw-bold d-block">Contact<span class="text-primary"> Us</span></h4>
                    </a>
                    <div class="text-white mt-4 d-flex flex-column contact-link">
                        <a href="#" class="pb-3 text-light border-bottom border-light"><i
                                class="fas fa-map-marker-alt text-secondary me-2"></i>{{ $setting->address ?? '' }}</a>
                        <a href="#" class="py-3 text-light border-bottom border-light"><i
                                class="fas fa-phone-alt text-secondary me-2"></i>{{ $setting->phone ?? '' }}</a>
                        <a href="#" class="py-3 text-light border-bottom border-light"><i
                                class="fas fa-envelope text-secondary me-2"></i>{{ $setting->email ?? '' }}</a>
                    </div>
                </div>
            </div>
    </section>
    <div class="copy-right py-3">
        <div class="container">
            <div class="copy__right-text ">
                <span class="text-center mx-auto">Copyright {{ date('Y') }} &copy; copyright
                    <a target="_blank" href="https://allstar.com.np/">
                        <span class="text-light">AllStar Technology</span>
                    </a>
                </span>

            </div>
        </div>
    </div>
</footer>
