<nav class="p-3 ">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
        <a href="#" class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full"
                viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>
            <span class="ml-3 text-xl">Code With SadiQ</span>
        </a>

        <a class="mr-5 md:hidden block text-gray-900 hover:bg-teal-800 bg-teal-500 py-2 cursor-pointer rounded px-3 bx bxs-{{ $theme == 'dark' ? 'sun text-white' : 'moon' }}"
            style="cursor:pointer" id="theme-toggle"></a>
        <button data-collapse-toggle="navbar-solid-bg" type="button"
            class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-solid-bg" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>


        <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
            <div
                class="flex flex-col md:justify-center md:items-center mt-4 rounded-lg bg-gray-50 md:flex-row md:space-x-4  md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
                <a class="mr-5 hover:text-gray-900 text-gray-700 bg-slate-200 p-2 md:bg-transparent" href="{{ route('homepage') }}">Home</a>
                <a class="mr-5 hover:text-gray-900 text-gray-700 bg-slate-200 p-2 md:bg-transparent" href="{{ route('courses') }}">Our Courses</a>
                <a class="mr-5 hover:text-gray-900 text-gray-700 bg-slate-200 p-2 md:bg-transparent" href="{{ route('gallery') }}">Gallery</a>
                <a class="mr-5 hover:text-gray-900 text-gray-700 bg-slate-200 p-2 md:bg-transparent" href="">Student`s Placements</a>
                @guest
                    <a class="mr-5 hover:text-gray-900 text-gray-700 bg-slate-200 p-2 md:bg-transparent" href="{{ route('apply') }}">Register</a>
                    <a class="mr-5 hover:text-gray-900 text-gray-700 bg-slate-200 p-2 md:bg-transparent" href="{{ route('login') }}">Login</a>
                @endguest

                @auth
                    <a class="mr-5 hover:text-gray-900 text-gray-700 font-bold capitalize  bg-slate-200 p-2 md:bg-transparent"
                        href="{{ route('student.profile') }}">{{ auth()->user()->name }}</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <input type="submit"
                            class="mr-5 hover:bg-red-600 text-slate-100 bg-red-500 px-2 rounded py-1 cursor-pointer"
                            value="Logout">
                    </form>
                @endauth

                <a class="hidden md:block  mr-5 text-gray-900 hover:bg-teal-800 bg-teal-500 py-2 cursor-pointer rounded px-3 bx bxs-{{ $theme == 'dark' ? 'sun text-white' : 'moon' }}"
                    style="cursor:pointer" id="theme-toggle"></a>
                @guest
                    <button
                        class="inline-flex items-center  bg-slate-200 p-2 md:bg-transparent bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">Apply
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </button>
                @endguest
            </div>
        </div>
    </div>
</nav>
