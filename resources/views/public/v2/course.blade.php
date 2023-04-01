@extends('public.v2.base')
@section('content')
    <div class="w-10/12 mx-auto">
        <div class="flex">
            <h5 class="my-5 text-slate-800  text-3xl theme-font font-black">Our Courses</h5>
        </div>
        <div class="grid grid-cols-4 gap-5  ">
            @foreach ($courses as $course)
                <div class="bg-slate-900 rounded-xl p-5">
                        <img src="{{ asset('images/course/' . $course->image) }}" alt="" class="w-full h-36 object-cover rounded-lg">
                    
                    <div class="flex flex-col items-stretch mt-3 gap-3">
                        <h3 class="theme-font text-white truncate">{{ $course->title }}</h3>
                        <a href="{{route('viewCourse', $course)}}">
                            <span class="text-white theme-font font-semibold">₹{{ $course->discount_fee }}</span> <del class="text-slate-500 theme-font font-normal ml-2">₹{{ $course->fee }}</del>
                            <span class="ml-2 text-white theme-font  bg-yellow-700 p-1 rounded text-sm">50% Off</span> 
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
