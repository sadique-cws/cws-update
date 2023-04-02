<!doctype html>
<html lang="en" class="semi-dark">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    @yield('css')
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">

    <title>CodeWithSadiQ @yield('page_title')</title>
</head>

<body>
    @include('sweetalert::alert')

    <!--wrapper-->
   
            @section('sidebar')
                 @show() 
       

    <div class="container" style="min-height: 80vh">
        @section('content')
        @show
    </div>
    <footer class="page-footer bg-light py-3 d-flex justify-content-center border-top">
        <p class="mb-0">Copyright © 2021. All right reserved.</p>
    </footer>
    </div>
    @yield('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
</body>

</html>
