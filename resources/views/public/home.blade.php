@extends("public.base")


@section('content')
@if(Route::current()->getName() == 'homepage')
    <div class="d-flex">
       <div class="row row-cols-1 row-cols-lg-2">
        <div class="col">
            <h1 class="fw-bolder display-1 mt-5">
                Skill hai, <br> Toh Future Hai!
            </h1>
            <p class="lead">"CWS is an on-demand marketplace for top Programming engineers, developers, consultants, architects, programmers, and tutors. Get your projects built by vetted web programming freelancers or learn from expert mentors with team training & coaching experiences in Project based training."</p>
            <p class="fw-2 "><sup>*</sup>Project Base training center with on-demand Technologies on IT Industries.</p>
            <a href="{{ route('apply') }}" class="btn btn-success btn-lg"><i class='bx bx-spreadsheet'></i> Join now</a>
        </div>
        <div class="col">
                <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_vybwn7df.json"  background="transparent"  speed="0.3"   autoplay></lottie-player>
        </div>
       </div>
    </div>
@endif
@endsection


@section('js')
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

@endsection