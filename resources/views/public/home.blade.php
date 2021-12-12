@extends("layouts/publicBase")


@section('content')
    <div class="container-fluid background-img p-0 mb-5 pt-lg-0 pt-5">
        <div class="container d-flex align-items-center" style="padding-top: 100px; height:500px">
            <div class="p-5 col-10">
                <h1 class="display-1 text-white">Skill Hai! To Future Hai!</h1>
                <p class="lead text-light mt-3">"CWS is an on-demand marketplace for top Programming engineers, developers, consultants, architects, programmers, and tutors. Get your projects built by vetted web programming freelancers or learn from expert mentors with team training & coaching experiences in <b>Project based training</b>."</p>
            </div>
        </div>
        <div class="bottom-img-absolute">
            <img src="hero.svg" alt="wave shape" class="img-fluid">
        </div>
    </div>

    <div class="container">
        <h4  class="h3 border-4 border-start border-secondary ps-2 mb-4 border-0">Our Courses</h4>
        <div class="row mt-3 row-cols-sm-1 row-cols-1 row-cols-md-3 row-cols-lg-4">
            @foreach ($courses as $course)
            <div class="col">
                <div class="card -border">
                    <img src="{{ asset('images/course/'.$course->image) }}" alt="" class="card-img-top img-fluid">
                    <div class="card-body">
                        <h3 class="h5">{{ $course->title }}</h3>
                        <h3 class="h6"><strong>Duration : {{ $course->duration }} months</strong></h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="container mt-4">
        <h4  class="h3 border-4 border-start border-secondary ps-2 mb-4 border-0">Placements</h4>
        <div class="row">
            @foreach ($placements as $placement)
            <div class="col-lg-3">
                <div class="card border-0 " style="border-radius:1rem">
                    <div class="card-body">
                        <img src="{{ asset('images/placement/'.$placement->image) }}" style="border-radius:1rem" alt=" no image" class="card-img-top">
                        <div class="mt-3">
                            <h4 class="h3">{{ $placement->name }}</h4>
                            <p class="p text-muted">{{ $placement->role }} <br> @ {{ $placement->company_name }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
