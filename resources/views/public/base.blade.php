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
    <nav class="navbar navbar-light bg-light py-3 border-bottom navbar-expand-lg ">
        <div class="container d-flex justify-content-between gap-2">
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand flex-grow-1" href="#">Code with SadiQ</a>
            <button class="btn btn-success d-lg-none" type="button">
                Join Now
            </button>
            <div class="offcanvas offcanvas-start text-bg-light flex-grow-0" tabindex="-1" id="offcanvasDarkNavbar"
                aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Dark offcanvas</h5>
                    <button type="button" class="btn-close btn-close-black" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-lg-start  align-items-lg-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('homepage')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('courses')}}">Courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('gallery')}}">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('placements')}}">Placements</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{route('student.profile')}}" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                My Profile
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="{{route('student.profile')}}">Dashboard</a></li>
                                <li><a class="dropdown-item" href="{{route('student.courses')}}">My Courses</a></li>
                                <li><a class="dropdown-item" href="{{route('student.payments')}}">My Payments</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class=" btn btn-danger btn-sm" href="#">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>


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
