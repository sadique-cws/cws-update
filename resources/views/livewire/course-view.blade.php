<div>
    <section class="container mt-5 " >
        <div class="row">
            <div class="col-lg-4">
                <img alt="ecommerce" class="w-full h-auto" src="{{ asset('images/course/' . $course->image) }}">
            </div>
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold">{{ $course->title }}</h1>
                <div class="d-flex mb-4 gap-3">
                    <span class="text-muted">Duration:
                        {{ $course->duration }} Months</span>
                </div>
                <p class="small ju">{{ $course->description }}</p>

                <div class="d-flex mt-5 align-items-center gap-3">
                    <span class="h1">₹{{ $course->discount_fee }}/-
                        <del class="h5 text-muted">₹{{ $course->fee }}/-</del>
                    </span>
                    <button data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" class="btn btn-success">Add
                        Course</button>
                    <div class="offcanvas offcanvas-end " wire:ignore.self data-bs-backdrop="static" tabindex="-1" id="staticBackdrop"
                        aria-labelledby="staticBackdropLabel">


                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="staticBackdropLabel" id="exampleModalLabel">
                                Select Payment Type</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>

                        </div>
                        <div class="offcanvas-body">
                            <div class="d-flex flex-column gap-4">


                                <div class="flex-grow-1 w-100">
                                    <input type="radio" value="0" wire:model="type" name="type"
                                        class="btn-check w-100" id="monthly" autocomplete="off">
                                    <label wire:click="SetPayable" class="btn btn-outline-danger py-5 w-100"
                                        for="monthly">
                                        <span class="display-4">₹{{ $course->getPaidAmount() }}/- </span>
                                        <br> Monthly</label>
                                </div>

                                <div class="flex-grow-1 w-100">
                                    <input type="radio" value="1" wire:model="type" name="type"
                                        class="btn-check w-100" id="course" autocomplete="off">
                                    <label class="btn btn-outline-success py-5 w-100"
                                        wire:click="SetPayable({{ $course->discount_fee }})" for="course">
                                        <span class="display-4">₹<?= $course->getFullPaidAmount() ?>/- </span>
                                        <br> One Time</label>
                                </div>


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
                                    <h2 class="">Total Payable Amount : <span
                                            class="font-bold">₹{{ $payable_amount }}/-</span> </h2>
                                </div>
                            @endif
                            <div class="flex justify-end">
                                <form action="" method="post">
                                    <button type="button" wire:click="addCourse"
                                        class="btn-warning btn btn-lg">Add
                                        In your Cart</button>
                                </form>
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
    </section>
</div>
