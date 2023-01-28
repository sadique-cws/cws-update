<header class="text-gray-600 body-font">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full"
                viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>
            <span class="ml-3 text-xl">Code With SadiQ</span>
        </a>
        <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center ">
            <a class="mr-5 hover:text-gray-900 text-gray-700" href="{{ route('homepage') }}">Home</a>
            <a class="mr-5 hover:text-gray-900 text-gray-700" href="{{ route('courses') }}">Our Courses</a>
            <a class="mr-5 hover:text-gray-900 text-gray-700" href="{{ route('gallery') }}">Gallery</a>
            <a class="mr-5 hover:text-gray-900 text-gray-700" href="">Student`s Placements</a>
            @guest
                <a class="mr-5 hover:text-gray-900 text-gray-700" href="{{ route('apply') }}">Register</a>
                <a class="mr-5 hover:text-gray-900 text-gray-700" href="{{ route('login') }}">Login</a>
            @endguest

            @auth
                <a class="mr-5 hover:text-gray-900 text-gray-700 font-bold capitalize"
                    href="{{ route('apply') }}">{{ auth()->user()->name }}</a>
                <a class="mr-5 hover:text-gray-900 text-gray-700" href="{{ route('login') }}">Logout</a>
            @endauth
            <a class="mr-5 text-gray-900 hover:bg-teal-800 bg-teal-500 py-2 cursor-pointer rounded px-3 bx bxs-{{ $theme == 'dark' ? 'sun text-white' : 'moon' }}"
                style="cursor:pointer" id="theme-toggle"></a>
        </nav>
        @guest
            <button
                class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">Apply
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
            </button>
        @endguest
    </div>
</header>
