@extends('public.v2.base')
@section('content')

@endsection
@section('js')
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

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
