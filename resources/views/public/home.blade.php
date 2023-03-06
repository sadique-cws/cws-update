@extends("layouts/publicBase")


@section('content')
    <div class="container-fluid background-img p-0 mb-5 pt-lg-0 pt-5 d-none d-lg-block d-md-block d-sm-block">
        <div class="container d-flex align-items-center" style="padding-top: 100px; height:500px">
            <div class="p-5 col-10">
                <h1 class="display-1 text-white">Skill Hai! To Future Hai!</h1>
                <p class="lead text-light mt-3">"CWS is an on-demand marketplace for top Programming engineers, developers, consultants, architects, programmers, and tutors. Get your projects built by vetted web programming freelancers or learn from expert mentors with team training & coaching experiences in <b>Project based training</b>."</p>
            </div>
        </div>
    </div>

    <div class="container">
        <h4  class="h5 border-4 border-start border-secondary ps-2 mb-4">Our Courses</h4>
        <div class="row mt-3 card-group">
            @foreach ($courses as $course)
            <div class="col-lg-2 col-6 mb-3">
                <div class="card h-100 border text-center">
                    <img src="{{ asset('images/course/'.$course->image) }}" alt="" class="card-img-top img-fluid">
                    <div class="card-body p-2 pb-0  mb-0">
                        <h3 class="h6  mb-0">{{ $course->title }}</h3>
                    </div>
                    <div class="card-footer">
                        <h3 class="fs-bold  mb-0 small"><strong>Duration : {{ $course->duration }} months</strong></h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="container mt-4">
        <h4  class="h5 border-start border-secondary ps-2 mb-4 border-0">Students Achievements</h4>
        <div class="row">
            @foreach ($placements as $placement)
            <div class="col-lg-2 col-6 mb-3">
                <div class="card h-100 border shadow-sm text-center">
                    <img src="{{ asset('images/placement/'.$placement->image) }}" alt=" no image" style="object-fit:cover;height:200px">
                    <div class="card-body p-1">
                        <div class="mt-3">
                            <h4 class="h5">{{ $placement->name }}</h4>
                            <p class="p text-muted small">{{ $placement->role }} <br> @ <span style='font-size:10px'>{{ $placement->company_name }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
