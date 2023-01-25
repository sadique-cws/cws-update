@extends('public.v2.base')
@section('content')
{{-- <div class="head-section pb-2">
    <h4 class="text-theme head-text">Our Courses</h4>
    <p class="dt" style="margin-top: -5px; font-weight:500; font-size:13px">Lorem ipsum dolor sit amet</p>
</div> --}}
{{-- course --}}
{{-- <div class="row mb-5 g-2">
    @foreach ($courses as $course)
    <div class="col-lg-2 col-md-3 col-sm-4 col-6">
        <div class="card pt-2 course-card h-100">
            <div class="card-body p-1 ">
                <img src="{{ asset('images/course/'.$course->image) }}" class="mx-auto mb-3 rounded-circle d-flex" alt="" style="height: 100px; width:100px">
                <div class="border-top card-body border-1 course-card-body">
                    <h5 class="h6 text-center">{{ $course->title }}</h5>
                </div>
                <div class="clearfix"></div>
                
            </div>
            <div class="duration card-footer border-0 mb-1 text-center mx-auto"><h6>Duration : {{ $course->duration }} months</h6></div>
        </div>
    </div>
    @endforeach
</div>

<div class="head-section pb-2">
    <h4 class="text-theme head-text">Our Students In Industry</h4>
    <p class="dt" style="margin-top: -5px; font-weight:500; font-size:13px">Contributing Nation Development</p>
</div>

<div class="owl-carousel mb-4">
    @foreach($placements as $placement)
    <div class="outer-div text-center mx-2">
        <img class="img-fluid oject-fit-cover" src="{{ asset('images/placement/'.$placement->image) }}" style="height:200px" alt="">
        <h5 class='mt-2'>{{ $placement->name }} </h5>
        <!--<div class="connect">-->
        <!--    <a href="#github"><i class='bx bxl-github text-theme' ></i></a>-->
        <!--    <a href="#"><i class='bx bxl-linkedin-square ms-2 text-theme'></i></a>-->
        <!--    <a href="#"><i class='bx bxl-twitter ms-2 text-theme' ></i></a>-->
        <!--</div>-->
        <p>{{ $placement->role }}</p>
        <p class="cname">@ {{ $placement->company_name }}</p>
    </div>
    @endforeach
</div> --}}
@endsection
@section('js')
<script>
    var $owl = $('.owl-carousel');

    $owl.children().each( function( index ) {
        $(this).attr( 'data-position', index ); // NB: .attr() instead of .data()
    });

    $owl.owlCarousel({
        center: true,
        loop: true,
        items: 5,
        autoplay:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });

    $(document).on('click', '.owl-item>div', function() {
        // see https://owlcarousel2.github.io/OwlCarousel2/docs/api-events.html#to-owl-carousel
        var $speed = 300;  // in ms
        $owl.trigger('to.owl.carousel', [$(this).data( 'position' ), $speed] );
    });
</script>
@endsection
