<nav class="navbar navbar-light bg-light py-3 border-bottom navbar-expand-lg">
    <div class="container d-flex justify-content-between gap-2">
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand flex-grow-1" href="#">Code with SadiQ </a>
        <button class="btn btn-danger d-lg-none" type="button">
            Logout
        </button>
        <div class="offcanvas offcanvas-start   text-bg-light flex-grow-0" data-bs-scroll="true" tabindex="-1" id="offcanvasDarkNavbar"
            aria-labelledby="offcanvasDarkNavbarLabel">

            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">My Profile</h5>
                <button type="button" class="btn-close btn-close-black" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>

            <div class="offcanvas-body">
                <div class="w-full h-64  ">
                    <div class="d-lg-none d-block">
                    </div>
                    <div class="d-lg-none d-block">
                        <div class="w-36">
                            <img src="https://cdn3.iconfinder.com/data/icons/characters-2/100/character-03-512.png"
                                class="w-100 h-36 bg-gray-100 border-2 rounded-lg border-white -mt-16" alt="">
                        </div>
                    </div>

                    <div class="">

                        <div class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <a href="{{ route('student.profile') }}" class="nav-item nav-link d-flex align-items-center gap-1">
                                <i class='bx bxs-user' ></i><span>Dashboard</span>
                            </a>
                            <a href="{{ route('student.payments') }}" class="nav-item nav-link d-flex align-items-center gap-1">
                                <i class='bx bx-credit-card' ></i> <span>Your Payments</span>
                            </a>
                            <a href="{{ route('student.courses') }}" class="nav-item nav-link d-flex align-items-center gap-1">
                                <i class='bx bxs-graduation' ></i><span>My Courses</span>
                            </a>
                            <a href="" class="nav-item nav-link d-flex align-items-center gap-1">
                                 <span class="fw-bolder text-capitalize">{{auth()->user()->name}}</span>
                            </a>
                            <a href="" class="nav-item nav-link d-flex align-items-center gap-1">
                                <i class='bx bx-log-out-circle' ></i><span>Logout</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
