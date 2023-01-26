@extends('public.v2.base')
@section('content')
    <div class="w-10/12 mx-auto">
        <div class="flex">
            <h5 class="mt-5 h2 ml-5">Our Courses</h5>
        </div>
        <div class="grid grid-cols-6 gap-5  ">
            @foreach ($courses as $course)
                <div>
                    <img src="{{ asset('images/course/' . $course->image) }}" alt="" class="w-full h-88 object-cover">
                    <div class="p-4 flex flex-col items-stretch">
                        <h3 class="font-semibold text-red-500">{{ $course->title }}</h3>
                        <div class="d-flex">
                            <div><b>course fee :</b> ₹
                                {{ $course->fee }}</div>
                            <div><b>Durations :</b>
                                {{ $course->duration }} months</div>
                            <div><b>Instructor :</b> Syed
                                Sadique Hussain</div>
                        </div>
                        <br>
                        <a href="{{route('viewCourse', $course)}}" class="bg-teal-500 text-white px-3 py-3 mt-5 items-end">View</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
