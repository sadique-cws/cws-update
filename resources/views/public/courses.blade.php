@extends('layouts.publicBase')

@section('content')

<div class="container mt-5">
    <div class="d-inline-flex">
        <h5 class="border-0 border-primary h2 border-3 border-bottom px-2" style="border-radius: 5px">Our Courses</h5>
    </div>
    @foreach ($courses as $course)
    <div class="card shadow-sm p-2" style="border-radius: 2rem">
        <div class="card-body">
            <div class="row">
                <div class="col-9">
                    <h1 class="display-6">{{ $course->title }}</h1>
                    <p class="">{{ $course->description }}.</p>
                    <div class="d-flex mt-4">
                        <p class="h6 ">₹ {{ $course->fee }}</p>
                        <p class="h6 ms-3"><strong>Duration : </strong>{{ $course->duration }} months</p>
                    </div>
                </div>
                <div class="col-3">
                    <img src="{{ asset('images/course/'.$course->image) }}" alt="" class="card-img-top" style="border-radius: 1.5rem">
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
