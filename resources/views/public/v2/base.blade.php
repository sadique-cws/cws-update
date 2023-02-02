<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Code With SadiQ</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Required popper.js -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    @yield('css')

    <style>
        input[type="radio"]:checked+span {
            display: block;
        }
    </style>
    @livewireStyles

</head>
<body class="{{ $theme . '-theme' }} ">
    @include('sweetalert::alert')
    <div class="header-div vh-100 shadow-sm">
        @include('public.header')

        @if(Route::current()->getName() == 'homepage')
            <div class="flex justify-center  w-full items-center md:p-10 p-2 mt-2 md:mt-0">
               <div class="flex flex-col md:flex-row md:w-10/12 w-full justify-center items-center mx-auto">
                <div class="md:w-2/3">
                    <h5 class="md:text-6xl text-4xl font-bold">
                        Skill hai, <br> Toh Future Hai!
                    </h5>
                    <p class="text-lg  md:w-5/6 my-5">"CWS is an on-demand marketplace for top Programming engineers, developers, consultants, architects, programmers, and tutors. Get your projects built by vetted web programming freelancers or learn from expert mentors with team training & coaching experiences in Project based training."</p>
                    <a href="{{ route('apply') }}" class="bg-teal-600 mt-3 px-4 text-white py-3 rounded-lg"><i class='bx bx-spreadsheet me-2 fs-3'></i> Join now</a>
                </div>
                <div class="md:w-1/3 hidden md:block">
                    <div class="justify-content-center align-items-center flex">
                        <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_vybwn7df.json"  background="transparent"  speed="0.3"  style="width: 500px; height: 500px;" autoplay></lottie-player>
                    </div>

                </div>
               </div>
            </div>
        {{-- @else
        <div class="container">
            @yield('content')
        </div> --}}
        @endif
    </div>
    <div class="w-full">
        @yield('content')
    </div>
    <footer class="text-red-500 footer pt-5 mt-5 ">
           <div class="flex items-center text-center">
                <div class="flex-1">
                    <div class="d-flex">
                        {{-- <img src="https://avatars.githubusercontent.com/u/32757358?v=4" style="height: 80px; width:80px; border-radius:16px" alt="sadique-hussain"> --}}
                        <h6 class="mt-2 ms-2">Sadique Hussain
                            <br> <p class="small fw-bold mt-2">Tutor</p>
                        </h6>
                    </div>
                    <ul class="footer-ul mt-2">
                        <li class="f-item"><a href="#" class="f-link"><i class='bx bxl-linkedin-square me-2'> </i> linkedIn</a></li>
                        <li class="f-item"><a href="#" class="f-link"><i class='bx bxl-github me-2'> </i>github</a></li>
                        <li class="f-item"><a href="#" class="f-link"><i class='bx bxl-facebook-square me-2'> </i>facebook</a></li>
                        <li class="f-item"><a href="#" class="f-link"><i class='bx bxl-instagram me-2'> </i>instagram</a></li>
                        <li class="f-item"><a href="#" class="f-link"><i class='bx bxl-twitter me-2'> </i>twitter</a></li>
                    </ul>
                </div>
                <div class="flex-1">
                    <h4 class="h6">Quick Links</h4>
                    <ul class="footer-ul">
                        <li class="f-item"><a href="#" class="f-link">Home</a></li>
                        <li class="f-item"><a href="#" class="f-link">About</a></li>
                        <li class="f-item"><a href="#" class="f-link">Gallery</a></li>
                        <li class="f-item"><a href="#" class="f-link">Projects</a></li>
                        <li class="f-item"><a href="#" class="f-link">Workshops</a></li>
                        <li class="f-item"><a href="#" class="f-link">Hire Us</a></li>
                    </ul>
                </div>
                <div class="flex-1">
                    <h4 class="h6">About Class</h4>
                    <ul class="footer-ul">
                        <li class="f-item"><a href="#" class="f-link">About Instructor</a></li>
                        <li class="f-item"><a href="#" class="f-link">MileStones</a></li>
                        <li class="f-item"><a href="#" class="f-link">Vision</a></li>
                        <li class="f-item"><a href="#" class="f-link">Community</a></li>
                        <li class="f-item"><a href="#" class="f-link">Our Team</a></li>
                    </ul>
                </div>
                <div class="flex-1">
                    <h4 class="h6">Location</h4>
                    <p class="small">
                        <i class='bx bxs-map me-2'> </i> Ramavtar Market, Near Dog Hospital,
                        Thana Chowk, Gandhinagar, Madhubani, Purnea - 854301
                    </p>
                    <ul class="footer-ul">
                        <li class="f-item"><a href="#" class="f-link"><i class='bx bxs-phone me-2'></i>+91 95 4680 5580</a></li>
                        <li class="f-item"><a href="#" class="f-link"><i class='bx bx-envelope me-2'></i> cwspurnea@gmail.com</a></li>
                        <li class="f-item"><a href="#" class="f-link"><i class='bx bx-world me-2'></i> www.codewithsadiq.com</a></li>
                    </ul>
                </div>
           </div>
            <div class="container d-flex justify-content-center border-top border-1 border-dark text-center p-2">
                <p class="small text-light mt-3">© Code with SadiQ, All rights reserved</p>
            </div>
    </footer>
    <script>
        var toggle_icon = document.getElementById('theme-toggle');
        var body = document.getElementsByTagName('body')[0];
        var sun_class = 'bxs-sun';
        var moon_class = 'bxs-moon';
        var dark_theme_class = 'dark-theme';
        var dark_text_class = 'dark-theme-text';
        var asdf = document.getElementsByClassName("testing")[0];

        toggle_icon.addEventListener('click', function() {
            // alert('hello')
            if (body.classList.contains(dark_theme_class)) {
                toggle_icon.classList.add(moon_class);
                toggle_icon.classList.remove(sun_class);
                // asdf.classList.remove(dark_text_class)

                body.classList.remove(dark_theme_class);
                setCookie('theme', 'light');
            }
            else {
                toggle_icon.classList.add(sun_class);
                toggle_icon.classList.remove(moon_class);
                // asdf.classList.add(dark_text_class)

                body.classList.add(dark_theme_class);
                setCookie('theme', 'dark');
            }
        });

        function setCookie(name, value) {
            var d = new Date();
            d.setTime(d.getTime() + (365*24*60*60*1000));
            var expires = "expires=" + d.toUTCString();
            document.cookie = name + "=" + value + ";" + expires + ";path=/";
        }

    </script>
    @yield('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>

    @livewireScripts

</body>
</html>

