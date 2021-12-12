<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CodeWithSadiQ</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">

    <!-- Styles -->
    <style>
        .nav-item{
            margin-left: 15px;
        }
        .background-img{
            /* position: relative; */
            width: 100%;
            display: block;
            background: url('https://appco.themetags.com/img/footer-bg.png')no-repeat center center / cover;
            height: 105vh;
            margin-top: -100px;

        }
        .background-img-2{
            position: relative;
            display: block;
            width: 100%;
        }
        .bottom-img-absolute {
            bottom: -35px;
            width: 100%;
            position: absolute;
        }
        footer{
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
        }
        .footer-nav-wrap ul li a {
            font-size: 14px;
            line-height: 19px;
            color: inherit;
            opacity: 0.8;
        }
        .footer-nav-wrap ul li a:hover, .copyright-text a:hover, .social-list li a:hover {
            opacity: 1;
            text-decoration: none;
        }
        span.badge.custom-nav-badge {
            /* position: absolute; */
            top: 30;
            right: -15px;
        }
    </style>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    @include('sweetalert::alert')

    <div class="navbar navbar-expand-lg navbar-dark py-3 shadow-none bg-transparent"
    @if(Route::current()->getName() != 'homepage')
        style="background-image: linear-gradient(to right, rgba(32, 40, 119, 1), rgba(55, 46, 149, 1), rgba(83, 49, 177, 1), rgba(114, 48, 205, 1), rgba(150, 41, 230, 1)) !important"
    @endif
    >
        <div class="container px-5">
            <a href="{{ route('homepage') }}" class="navbar-brand">Code with SadiQ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="{{ route('homepage') }}" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{ route('home.placements') }}" class="nav-link">Placements</a></li>
                    <li class="nav-item"><a href="{{ route('courses') }}" class="nav-link">Courses</a></li>
                    <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
                    <li class="nav-item"><a href="" class="nav-link">WorkShop <sup> <span class="custom-nav-badge badge bg-danger badge-pill">New</span></sup></a></li>
                    <li class="nav-item"><a href="{{ route('dues') }}" class="nav-link">Pay dues</a></li>
                    <li class="nav-item"><a href="{{ route('apply') }}" class="btn btn-success">Apply for
                            Admission</a></li>
                </ul>
            </div>
        </div>
    </div>

    @yield('content')

    <footer class="footer-section mt-5">

        <!--footer top start-->
        <div class="footer-top pt-150 background-img-2 pt-5 " style="background: url('https://appco.themetags.com/img/footer-bg.png')no-repeat center top / cover; border-radius:20px 20px 0 0">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-12 col-lg-4 mb-4 mb-md-4 mb-sm-4 mb-lg-0">
                        <div class="footer-nav-wrap text-white">
                            {{-- <img src="img/logo-white-1x.png" alt="footer logo" width="120" class="img-fluid mb-3"> --}}
                            <h4 class="h3 text-white">CodeWithSadiQ</h4>
                            <p>Holisticly empower premium architectures without value-added ideas. Seamlessly evolve
                                cross-platform experiences.</p>

                            <div class="social-list-wrap">
                                <ul class="social-list list-inline list-unstyled">
                                    <li class="list-inline-item"><a href="#" target="_blank" title="Facebook"><span class="ti-facebook"></span></a></li>
                                    <li class="list-inline-item"><a href="#" target="_blank" title="Twitter"><span class="ti-twitter"></span></a></li>
                                    <li class="list-inline-item"><a href="#" target="_blank" title="Instagram"><span class="ti-instagram"></span></a></li>
                                    <li class="list-inline-item"><a href="#" target="_blank" title="printerst"><span class="ti-pinterest"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-8">
                        <div class="row">
                            <div class="col-sm-6 col-md-4 col-lg-4 mb-4 mb-sm-4 mb-md-0 mb-lg-0">
                                <div class="footer-nav-wrap text-white">
                                    <h5 class="mb-3 text-white">Resources</h5>
                                    <ul class="list-unstyled">
                                        <li class="mb-2"><a href="#">Help</a></li>
                                        <li class="mb-2"><a href="#">Events</a></li>
                                        <li class="mb-2"><a href="#">Live Support</a></li>
                                        <li class="mb-2"><a href="#">Open Sources</a></li>
                                        <li class="mb-2"><a href="#">Documentation</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-4 mb-4 mb-sm-4 mb-md-0 mb-lg-0">
                                <div class="footer-nav-wrap text-white">
                                    <h5 class="mb-3 text-white">Company</h5>
                                    <ul class="list-unstyled support-list">
                                        <li class="mb-2">
                                            <a href="#">About Us</a>
                                        </li>
                                        <li class="mb-2">
                                            <a href="#">Careers</a>
                                        </li>
                                        <li class="mb-2">
                                            <a href="#">Customers</a>
                                        </li>
                                        <li class="mb-2">
                                            <a href="#">Community</a>
                                        </li>
                                        <li class="mb-2">
                                            <a href="#">Our Team</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-4">
                                <div class="footer-nav-wrap text-white">
                                    <h5 class="mb-3 text-white">Location</h5>
                                    <ul class="list-unstyled support-list">
                                        <li class="mb-2 d-flex align-items-center"><span class="ti-location-pin mr-2"></span>
                                            121 King Melbourne
                                            <br>Australia 3000
                                        </li>
                                        <li class="mb-2 d-flex align-items-center"><span class="ti-mobile mr-2"></span> <a href="tel:+61283766284"> +61 2 8376 6284</a></li>
                                        <li class="mb-2 d-flex align-items-center"><span class="ti-email mr-2"></span><a href="mailto:mail@example.com"> mail@example.com</a></li>
                                        <li class="mb-2 d-flex align-items-center"><span class="ti-world mr-2"></span><a href="#"> www.yourdomain.com</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--footer bottom copyright start-->
            <div class="footer-bottom border-gray-light mt-5 py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-12">
                            <div class="copyright-wrap small-text w-100">
                                <p class="mb-0 text-white text-center">© CodeWithSadiQ, All rights reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--footer bottom copyright end-->
        </div>
        <!--footer top end-->
    </footer>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
