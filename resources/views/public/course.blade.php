@extends('public.base')
@section('content') 
    <div class="col-12 mx-auto px-3">
        <div class="flex">
            <h5 class="my-2 text-slate-800  text-3xl theme-font font-black">Our Courses</h5>
        </div>
        <div class="row row-cols-1 row-cols-md-6 g-4">
            @foreach ($courses as $course)
                <div class="col">
                    <div class="card rounded h-100">
                        <img src="{{ asset('images/course/' . $course->image) }}" alt="" class="w-full h-48 object-cover rounded-lg">
                    
                        <div class="card-body pb-0">
                            <div class="d-flex flex-column">
                                <h3 class="theme-font h6 mb-0">{{ $course->title }}</h3>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <span class="text-dark d-flex align-items-center gap-1  mt-2">
                                <span class=" theme-font font-semibold">₹{{ $course->discount_fee }}</span> <del class="text-slate-500 theme-font font-normal ml-2">₹{{ $course->fee }}</del>
                                <span class="badge text-bg-success p-2 rounded small">{{ $course->getPercentage() }}% Off</span> 
                            </span>
                            <a href="{{route('viewCourse', $course)}}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
