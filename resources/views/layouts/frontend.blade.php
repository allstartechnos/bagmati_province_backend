{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</head>

<body>
    @include('layouts.includes.frontend.navbar')
    <div class="container">
        @yield('content')
    </div>
    

</body>

</html> --}}

<!DOCTYPE html>
<html lang="en">

@include('layouts.includes.frontend.header')


<body>

    @include('layouts.includes.frontend.navbar')

    <main id="index-main__body">

        @include('layouts.includes.frontend.slider')

        <!-- {{-- main content start --}} -->

        @yield('content')

        @include('layouts.includes.frontend.modal')

        <button class="btn btn-sm btn-nav backtotop rounded-circle translate-middle d-none" onclick="scrollToTop()"
            id="back-to-up">
            <span>
                <i class="fa fa-arrow-up" aria-hidden="true"></i>
            </span>
        </button>
    </main>

    @include('layouts.includes.frontend.footer')


    @include('layouts.includes.frontend.script')




    <script>
        /** Animation2*/
        let mCount = function(selector) {
            $(selector).each(function() {
                $(this).animate({
                    Counter: $(this).text(),
                }, {
                    duration: 5000,
                    easing: "swing",
                    step: function(value) {
                        $(this).text(Math.ceil(value));
                    },
                });
            });
        };
        let b = 0;
        $(window).scroll(function() {
            let oTop = $(".counter").offset().top - window.innerHeight;
            if (b == 0 && $(window).scrollTop() >= oTop) {
                b++;
                mCount(".number-holder > h1 > span");
            }
        });
    </script>
    <script>
        (function() {
            $("[data-slider-wrap]").each(function() {
                var _this = $(this),
                    _slick = _this.find("[data-slider]");

                function typeInit(target, str, destroy) {
                    var typedOptions = {
                            strings: [str],
                            typeSpeed: 30,
                            cursorChar: ""
                        },
                        _typedjs = new Typed(target, typedOptions);

                    if (destroy === true) {
                        _typedjs.destroy();
                    }
                } //typeInit END

                _slick
                    .on("init", function(event, slick) {
                        var _current = _slick.find("[data-slick-index='0']"),
                            _input = _current.find("[data-typed]"),
                            _inputNative = _input[0],
                            _data = _input.data("typed");

                        typeInit(_inputNative, _data);
                    })
                    .on("afterChange", function(event, slick, currentSlide) {
                        var _getCurrent = _slick.find(
                                "[data-slick-index='" + currentSlide + "']"
                            ),
                            _getInput = _getCurrent.find("[data-typed]"),
                            _getInputNative = _getInput[0],
                            _getData = _getInput.data("typed"),

                            _getAll = $("[data-slick-index]"),
                            _getAllInput = _getAll.find("[data-typed]"),
                            _getAllInputNative = _getAllInput[0];

                        //destroy
                        typeInit(_getAllInputNative, _getData, true);
                        _getAllInput
                            .html("")
                            .next().remove();

                        //init
                        typeInit(_getInputNative, _getData);
                    });

                _slick.slick({
                    // fade: true,
                    speed: 800,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    autoplay: true,
                    autoplaySpeed: 8000,
                    arrows: false,
                    dots: false,
                    pauseOnHover: false,
                    pauseOnFocus: false,
                });
            });
        })();
    </script>
    <script>
        var swiper = new Swiper(".logos", {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            autoplay: true,
            centeredSlides: true,
            observer: true,
            speed: 2500,
            mousewheelControl: true,
            keyboardControl: true,
            slidesPerView: "auto",
            allowTouchMove: true,
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
            },
        });
    </script>
    <script type="text/javascript">
        $(window).on('load', function() {
            $('#myModal').modal('show');
        });
    </script>

    <!-- {{-- Sweetalert Message --}} -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</body>

</html>
