<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('frontend/assets/css/index.css') }}"> --}}
    <!-- Main Theme Js -->
    <script src="{{ asset('backend/assets/js/authentication-main.js') }}"></script>


    <!-- Bootstrap Css -->
    <link id="style" href="{{ asset('backend/assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Style Css -->
    <link href="{{ asset('backend/assets/css/styles.css') }}" rel="stylesheet">

    <!-- Icons Css -->
    <link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet">
    <title>Bagmati School</title>
</head>

<body>

    <div class="container">

        {{ $slot }}
    </div>



    <!-- Bootstrap JS -->
    <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


    <!-- Show Password JS -->
    <script src="{{ asset('backend/assets/js/show-password.js') }}"></script>
</body>

</html>
