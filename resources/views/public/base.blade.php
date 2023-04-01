
<!doctype html>
<html lang="en" class="semi-dark">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>

	<link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	{{-- <link href="{{ asset('assets/plugins/highcharts/css/highcharts.css') }}" rel="stylesheet" /> --}}
	<link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet') }}" />
	<script src="{{ asset('assets/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">

	<link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('assets/css/header-colors.css') }}" />

    @yield('css')
	<title>CodeWithSadiQ @yield('page_title')</title>
</head>

<body>
    @include('sweetalert::alert')

	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				{{-- <div>
					<img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
				</div> --}}
				<div>
					<h4 class="logo-text">{ CodeWithSadiQ }</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-chevron-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="{{ route('admin.dashboard') }}">
						<div class="parent-icon"><i class='bx bxs-dashboard'></i>
						</div>
						<div class="menu-title">Home</div>
					</a>
				</li>
				<li>
					<a href="javascript:;">
						<div class="parent-icon"><i class='bx bxs-book-alt' ></i>
						</div>
						<div class="menu-title">Our Courses</div>
					</a>
				</li>
                <li class="@yield('new_addmissions')">
					<a href="{{ route('new.addmissions') }}">
						<div class="parent-icon"><i class='bx bx-user-plus'></i>
						</div>
						<div class="menu-title">Apply for Join Us</div>
					</a>
				</li>
                <li class="@yield('students')">
					<a href="{{ route('students') }}">
						<div class="parent-icon"><i class='bx bx-group'></i>
						</div>
						<div class="menu-title">Students Placement</div>
					</a>
				</li>
				<li class="@yield('add_student')">
					<a href="{{ route('add.student.view') }}">
						<div class="parent-icon"><i class='bx bx-landscape'></i>
						</div>
						<div class="menu-title">Gallery</div>
					</a>
				</li>
				<li>
					<a href="javascript:;">
						<div class="parent-icon"><i class='bx bx-rupee'></i>
						</div>
						<div class="menu-title">Online Payment</div>
					</a>
					{{-- <ul>
						<li> <a href="{{ route('dues.payments') }}"><i class="bx bx-right-arrow-alt"></i>Dues</a>
						</li>
						<li> <a href="{{ route('paid.payments') }}"><i class="bx bx-right-arrow-alt"></i>Paid</a>
						</li>
					</ul> --}}
				</li>
				<li>
					<a href="javascript:;">
						<div class="parent-icon"><i class='bx bx-briefcase'></i>
						</div>
						<div class="menu-title">Placement</div>
					</a>
					<ul>
						<li> <a href="{{ route('add.placement') }}"><i class="bx bx-right-arrow-alt"></i>Add Placement</a>
						</li>
						<li> <a href="{{ route('placements') }}"><i class="bx bx-right-arrow-alt"></i>Manage Placements</a>
						</li>
					</ul>
				</li>
                {{-- <li>
					<a href="{{ route('placements') }}">
						<div class="parent-icon"><i class='bx bx-briefcase'></i>
						</div>
						<div class="menu-title">Placements</div>
					</a>
				</li> --}}
                <hr>
                <li>
					<a href="{{ route('logout') }}">
						<div class="parent-icon"><i class='bx bx-power-off'></i>
						</div>
						<div class="menu-title">Logout</div>
					</a>
				</li>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="search-bar flex-grow-1">
						<div class="position-relative search-bar-box">
							<input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
							<span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
						</div>
					</div>


					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="https://via.placeholder.com/110x110" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0">
								    @auth
								    {{ Auth::user()->name }}
								    @endauth
								    
								    @guest()
								        Guest
								    @endguest
								</p>
								<p class="designattion mb-0">tutor</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class="bx bx-cog"></i><span>Settings</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-home-circle'></i><span>Dashboard</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-dollar-circle'></i><span>Earnings</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-download'></i><span>Downloads</span></a>
							</li>
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>

        <div class="page-wrapper">
			<div class="page-content">
                @yield('content')
            </div>
        </div>
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2021. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<!--plugins-->
	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
	{{-- <script src="{{ asset('assets/plugins/highcharts/js/highcharts.js') }}"></script>
	<script src="{{ asset('assets/plugins/highcharts/js/exporting.js') }}"></script>
	<script src="{{ asset('assets/plugins/highcharts/js/variable-pie.js') }}"></script>
	<script src="{{ asset('assets/plugins/highcharts/js/export-data.js') }}"></script>
	<script src="{{ asset('assets/plugins/highcharts/js/accessibility.js') }}"></script>
	<script src="{{ asset('assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
	{{-- <script src="{{ asset('assets/js/index.js') }}"></script> --}} 
	<!--app JS-->
	<script src="{{ asset('assets/js/app.js') }}"></script>

    @yield('js')
	
	{{-- <script>
		new PerfectScrollbar('.customers-list');
		new PerfectScrollbar('.store-metrics');
		new PerfectScrollbar('.product-list');
	</script> --}}
</body>

</html>