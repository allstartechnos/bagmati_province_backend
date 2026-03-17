@if (Request::is('/')) 
        <div class="main__slider">
            <div class="swiper swiper-container" data-slider-wrap="data-slider-wrap">
                <div class="wrap" data-slider-wrap="data-slider-wrap">
                    <div class="slider" data-slider="data-slider">

                        @forelse ($sliders as $slider)
                            <div class="slide">
                                <div class="slide__inner"
                                    style="background-image: url('{{ asset('images/slider/' . $slider->image) }}'); background-position: center; background-size: cover; background-repeat: no-repeat;">
                                    <div class="slide__text-wrap">
                                        <div class="slide__text" data-typed="Titlt one"></div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="slide">
                                <div class="slide__inner"
                                    style="background-image: url('https://plus.unsplash.com/premium_photo-1764695809500-369078213e26?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); background-position: center; background-size: cover; background-repeat: no-repeat;">
                                    <div class="slide__text-wrap">
                                        <div class="slide__text" data-typed="Titlt one"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="slide">
                                <div class="slide__inner"
                                    style="background-image: url('https://images.unsplash.com/photo-1531973576160-7125cd663d86?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); background-position: center; background-size: cover; background-repeat: no-repeat;">
                                    <div class="slide__text-wrap">
                                        <div class="slide__text" data-typed="Titlt 2"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="slide">
                                <div class="slide__inner"
                                    style="background-image: url('https://plus.unsplash.com/premium_photo-1661963953739-93cc36583355?q=80&w=1626&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); background-position: center; background-size: cover; background-repeat: no-repeat;">
                                    <div class="slide__text-wrap">
                                        <div class="slide__text" data-typed="Titlt 3"></div>
                                    </div>
                                </div>
                            </div>
                        @endforelse




                    </div>
                </div>
            </div>
        </div> 
@endif
