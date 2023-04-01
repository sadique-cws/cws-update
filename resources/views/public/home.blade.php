@extends("public.base")


@section('content')
@if(Route::current()->getName() == 'homepage')
    <div class="flex justify-center  w-full items-center md:p-10 p-2 mt-2 md:mt-0">
       <div class="flex flex-col md:flex-row md:w-10/12 w-full justify-center items-center mx-auto">
        <div class="md:w-2/3">
            <h5 class="md:text-6xl text-4xl font-bold">
                Skill hai, <br> Toh Future Hai!
            </h5>
            <p class="text-lg  md:w-5/6 my-5">"CWS is an on-demand marketplace for top Programming engineers, developers, consultants, architects, programmers, and tutors. Get your projects built by vetted web programming freelancers or learn from expert mentors with team training & coaching experiences in Project based training."</p>
            <a href="{{ route('apply') }}" class="bg-teal-600 mt-3 px-4 text-white py-3 rounded-lg"><i class='bx bx-spreadsheet me-2 fs-3'></i> Join now</a>
        </div>
        <div class="md:w-1/3 hidden md:block">
            <div class="justify-content-center align-items-center flex">
                <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_vybwn7df.json"  background="transparent"  speed="0.3"  style="width: 500px; height: 500px;" autoplay></lottie-player>
            </div>

        </div>
       </div>
    </div>
{{-- @else
<div class="container">
    @yield('content')
</div> --}}
@endif
@endsection
