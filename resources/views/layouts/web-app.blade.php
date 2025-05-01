<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('assets/site-asset/images/logo.png') }}">

    <title>Mr.Satyam</title> 
    {{-- <title>@yield('title') | {{ config('app.name') }}</title> --}}

    <!-- Styles -->
    <link href="{{ asset('assets/site-asset/css/style.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('assets/site-asset/css/project.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('assets/site-asset/css/product.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('assets/site-asset/css/responsive.css') }}" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/site-asset/css/swiper-bundle.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css">
    <link rel="stylesheet" type="text/css" href="https://slimhamdi.net/istanbul/demos/css/jquery.animatedheadline.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-10/css/all.min.css">
    
    <!-- Toast message -->
    <link href="{{ asset('assets/admin-assets/libs/toast/toastr.css') }}" rel="stylesheet" type="text/css" />
    <!-- Toast message -->
    <style>
      body {
        height: 100vh;
        overflow: hidden;
    }


    /* @media (max-width: 768px) {
      .pagepiling, .pp-scrollable {
          touch-action: auto !important;
          overflow: auto !important;
          overflow-y: auto !important;
          height: auto !important;
      }
  } */

    </style>
    @yield('css')

</head>
<body class="body-full-page @yield('body-class')">
    
    <div class="loader"><div class="spinner"><div class="double-bounce1"></div><div class="double-bounce2"></div></div></div>

    <!-- Content CLick Capture-->

    <div class="click-capture"></div>

    @include('layouts.web-include.header')
    
    
        @yield('content')

    <!-- Modals success -->
                                         

  <div id="success" class="modal modal-message fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <span class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></span>
            <h2 class="modal-title">Thank you</h2>
            <p class="modal-subtitle">Your message is successfully sent...</p>
          </div>
        </div>
    </div>
  </div>

  <!-- Modals error -->

  <div id="error" class="modal modal-message fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <span class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></span>
             <h2 class="modal-title">Sorry</h2>
            <p class="modal-subtitle"> Something went wrong </p>
          </div>
        </div>
    </div>
  </div>


<!-- jQuery -->

<script src="{{ asset('assets/site-asset/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/site-asset/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/site-asset/js/smoothscroll.js') }}"></script>
<script src="{{ asset('assets/site-asset/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/site-asset/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/site-asset/js/jquery.pagepiling.js') }}"></script>


<!-- toast message -->
<script src="{{ asset('assets/admin-assets/libs/toast/toastr.js') }}"></script>
<script src="{{ asset('assets/admin-assets/js/pages/toastr.init.js') }}"></script>
<!-- toast message -->
@include('layouts._massages')

<!-- Scripts -->
<script src="{{ asset('assets/site-asset/js/scripts.js') }}"></script> 
{{-- <script src="{{ asset('assets/site-asset/js/swiper-bundle.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        var mySwiper = new Swiper('.swiper-container', {
          direction: 'horizontal', // or 'vertical'
          loop: true,
          centeredSlides: true,
          
          // If we need pagination
          pagination: {
            el: '.swiper-pagination',
            clickable: true,
            dynamicBullets: true,
          },

          // Navigation arrows
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
          },

          // Autoplay
          autoplay: {
            delay: 5000,
            disableOnInteraction: false,
          },

          // Use slide or fade transition effect
          speed: 2000,
          effect: 'fade',
          fadeEffect: {
                crossFade: true,
           },
        });
      });

</script>
<script type="text/javascript">
    /**
 * Progress bar animation by Hakan Havutcuoglu
 * https://codepen.io/havutcuoglu/pen/abMdvoq
 * This notice MUST stay intact in JS files and SCRIPT tags for free and legal usege.
 */

$(document).ready(function(){
    progress_bar();
});



  




function progress_bar() {
    var speed = 30;
    var items = $('.progress_bar').find('.progress_bar_item');
  
    items.each(function() {
        var item = $(this).find('.progress');
        var itemValue = item.data('progress');
        var i = 0;
        var value = $(this);
    
        var count = setInterval(function(){
            if(i <= itemValue) {
                var iStr = i.toString();
                item.css({
                    'width': iStr+'%'
                });
                value.find('.item_value').html(iStr +'%');
            }
            else {
                clearInterval(count);
            }
            i++;
        },speed);
    });
}
</script>
<script src="https://slimhamdi.net/istanbul/demos/js/jquery.animatedheadline.js"></script>
<script type="text/javascript">
        if ($("#selector").length) {
            $("#selector").animatedHeadline({
                 animationType: "clip"
            });
        }
</script>
<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {
    const selector = '.nav-link';
    const elems = Array.from( document.querySelectorAll( selector ) );
    const navigation = document.querySelector( '.navbar-nav' );

    function makeActive( evt ) {
      const target = evt.target;
      
      if ( !target || !target.matches( selector ) ) {
        return;
      }
      
      elems.forEach( elem => elem.classList.remove( 'active' ) );
        
        evt.target.classList.add( 'active' );
    };

    navigation.addEventListener( 'mousedown', makeActive );

    } );
</script>

<script type="text/javascript">
  $(document).ready(function(){
      $('.my-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        speed: 300,
        infinite: true,
        autoplaySpeed: 5000,
        autoplay: true,
        responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
        }
      }
    ]
      });
    });
</script>
<script>
  // Adjust the height dynamically for mobile browsers
function adjustHeight() {
    const vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);
}

window.addEventListener('resize', adjustHeight);
adjustHeight();

</script>
@yield('script')
</body>
</html>