<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/index.css') }}">
    <link rel="icon" type="image/png"
        href="{{ $setting?->fav_icon ? asset('images/setting/' . $setting?->fav_icon) : '' }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://www.google.com/recaptcha/api.js?render={{ env('GOOGLE_RECAPTCHA_KEY') }}"></script>

    <title>@yield('title')</title>

    <style>
        .nav__image {
            overflow: hidden;
            border-radius: 5px;
            width: 100%;
            object-fit: contain;
            object-position: center;
            vertical-align: middle;
        }


        .image-flex {
            display: flex;
            flex-wrap: wrap;
            gap: 25px;
        }

        .img-box {
            width: 250px;
            height: 300px;
            overflow: hidden;
        }

        .img-box img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .nav-pill .nav-links.active,
        .nav-pill .nav-links {
            color: #161616;
            background-color: #87868600 !important;
            border-radius: 10px;
            border: 1px solid #000ba4;
            margin: 10px 10px;
            padding: 10px 10px;
            width: 200px;
        }

        /* .nav-link {
            border: none;
            box-shadow: 5px 5px 10px #bbbbbb, -5px -5px 10px #ffffff;
            transition: all 0.3s ease;
            border-radius: 10px;
            padding: 10px 10px;
        } */
    </style>

    @stack('css')
</head>
