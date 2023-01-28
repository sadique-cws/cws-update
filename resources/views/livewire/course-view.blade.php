<div>
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
                <img alt="ecommerce" class="lg:w-1/4 w-full lg:h-auto h-64  object-contain rounded"
                    src="{{ asset('images/course/' . $course->image) }}">
                <div class="lg:w-3/4 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $course->title }}</h1>
                    <div class="flex mb-4 items-center gap-3">
                        <span class="flex items-center">
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                </path>
                            </svg>
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                </path>
                            </svg>
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                </path>
                            </svg>
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                </path>
                            </svg>
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                <path
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                </path>
                            </svg>

                        </span>
                        <span class="flex ml-3 pl-3 py-2 border-l-2 border-gray-200 space-x-2s">
                            <a class="text-gray-500">
                                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    class="w-5 h-5" viewBox="0 0 24 24">
                                    <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                                </svg>
                            </a>
                            <a class="text-gray-500">
                                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    class="w-5 h-5" viewBox="0 0 24 24">
                                    <path
                                        d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                    </path>
                                </svg>
                            </a>
                            <a class="text-gray-500">
                                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    class="w-5 h-5" viewBox="0 0 24 24">
                                    <path
                                        d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                                    </path>
                                </svg>
                            </a>
                        </span>

                        <span
                            class="text-sm title-font border-l-2  pl-3 py-2 border-gray-200  text-gray-500 tracking-widest">Duration:
                            {{ $course->duration }} Weeks</span>
                    </div>
                    <p class="leading-relaxed">{{ $course->description }}</p>

                    <div class="flex mt-5">
                        <span class="title-font font-medium text-2xl text-gray-900">₹{{ $course->discount_fee }}
                            <del>₹{{ $course->fee }}</del></span>
                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"
                            class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Add
                            Course</button>
                        <div class="flex">

                            <div wire:ignore.self
                                class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
                                id="exampleModal" tabindex="-1" data-bs-backdrop="static"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog relative w-auto pointer-events-none">
                                    <div
                                        class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                                        <div
                                            class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                                            <h5 class="text-xl font-medium leading-normal text-gray-800"
                                                id="exampleModalLabel">Select Payment Type</h5>
                                            <button type="button"
                                                class="px-6 py-2.5 bg-slate-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                        <div class="modal-body relative p-4">
                                            <div class="flex flex-row gap-6">
                                                <label for="monthly" wire:click="SetPayable"
                                                    class="border flex-1 border-slate-400 relative flex flex-col bg-white p-5 rounded-lg shadow-md cursor-pointer">
                                                    <span>
                                                        <span class="text-gray-900 text-4xl font-bold">₹700/- </span>
                                                    </span>
                                                    <span class="font-semibold text-gray-700 mt-2">
                                                        <span class="text-2xl"> Monthly </span>
                                                    </span>

                                                    <input type="radio" wire:model="type" id="monthly"
                                                        value="0" class="absolute h-0 w-0 appearance-none" />
                                                    <span aria-hidden="true"
                                                        class="hidden absolute inset-0 border-2 border-green-500 bg-green-200 bg-opacity-10 rounded-lg">
                                                        <span
                                                            class="absolute top-2 right-4 h-6 w-6 inline-flex items-center justify-center rounded-full bg-green-200">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 20 20" fill="currentColor"
                                                                class="h-5 w-5 text-green-600">
                                                                <path fill-rule="evenodd"
                                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                        </span>
                                                    </span>
                                                </label>
                                                <label for="course"
                                                    wire:click="SetPayable({{ $course->discount_fee }})"
                                                    class="relative border flex-1 border-slate-400  flex flex-col bg-white p-5 rounded-lg shadow-md cursor-pointer">
                                                    <span>
                                                        <span
                                                            class="text-4xl font-bold text-gray-900">₹<?= $course->discount_fee ?>/-</span>
                                                    </span>
                                                    <span class="font-semibold text-gray-700 mt-2">
                                                        <span class="text-2xl"> One Time </span>
                                                    </span>

                                                    <input type="radio" wire:model="type" id="course"
                                                        value="1" class="absolute h-0 w-0 appearance-none" />
                                                    <span aria-hidden="true"
                                                        class="hidden absolute inset-0 border-2 border-green-500 bg-green-200 bg-opacity-10 rounded-lg">
                                                        <span
                                                            class="absolute top-2 right-4 h-6 w-6 inline-flex items-center justify-center rounded-full bg-green-200">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 20 20" fill="currentColor"
                                                                class="h-5 w-5 text-green-600">
                                                                <path fill-rule="evenodd"
                                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                        </span>
                                                    </span>
                                                </label>

                                            </div>


                                        </div>
                                        <div
                                            class="modal-footer flex flex-col flex-wrap items-end justify-end p-4 border-t border-gray-200 rounded-b-md">
                                            <div class="flex-1 w-full">
                                                @if (session()->has('message'))
                                                    <div class="bg-green-100 rounded-lg py-5 px-6 mb-4 text-base text-green-700"
                                                        role="alert">
                                                        {{ session('message') }}
                                                    </div>
                                                @endif
                                                @if (session()->has('error'))
                                                    <div class="bg-red-100 rounded-lg py-5 px-6 mb-4 text-base text-red-700"
                                                        role="alert">
                                                        {{ session('error') }}
                                                    </div>
                                                @endif
                                            </div>
                                            @if ($payable_amount != null)
                                                <div class="flex py-5">
                                                    <h2 class="text-2xl font-sans">Total Payable Amount : <span
                                                            class="font-bold">₹{{ $payable_amount }}/-</span> </h2>
                                                </div>
                                            @endif
                                            <div class="flex justify-end">

                                                <form action="" method="post">
                                                    <button type="button" wire:click="addCourse"
                                                        class="px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">Add In your Cart</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button
                            class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                class="w-5 h-5" viewBox="0 0 24 24">
                                <path
                                    d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
