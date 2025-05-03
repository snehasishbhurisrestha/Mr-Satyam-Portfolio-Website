( function($) {
  'use strict';


	var navbar=$('.js-navbar:not(.navbar-fixed)');


	$(window).on('load', function(){

		$('.loader').fadeOut(1000);
	});


	/*-------------------------------------------------------------------------------
	  Navbar 
	-------------------------------------------------------------------------------*/



	navbar.affix({
	  offset: {
	    top: 50
	  }
	});


	navbar.on('affix.bs.affix', function() {
		if (!navbar.hasClass('affix')){
			navbar.addClass('animated slideInDown');
		}
	});

	navbar.on('affixed-top.bs.affix', function() {
	  	navbar.removeClass('animated slideInDown');
	  	
	});

	$('.nav-mobile-list li a[href="#"]').on('click',function(){
		$(this).closest('li').toggleClass('current');
		$(this).closest('li').children('ul').slideToggle(200);
		return false;
	});



	/*-------------------------------------------------------------------------------
	  Menu
	-------------------------------------------------------------------------------*/



	$('.navbar-toggle').on('click',function(){
		$('body').removeClass('menu-is-closed').addClass('menu-is-opened');
	});

	$('.close-menu, .click-capture').on('click', function(){
		$('body').removeClass('menu-is-opened').addClass('menu-is-closed');
		$('.menu-list ul').slideUp(300);
	});


	/*-------------------------------------------------------------------------------
	  Owl Carousel
	-------------------------------------------------------------------------------*/


	$(document).ready(function () {
    var owl = $('.review-carousel');
    owl.owlCarousel({
        items: 4,
        loop: true,
        margin: 20,
        autoplay: true,
        slideTransition: 'linear',
        autoplayTimeout: 0,
        autoplaySpeed: 5000,
        autoplayHoverPause: false

    });

});



	/*-------------------------------------------------------------------------------
	  Full screen sections 
	-------------------------------------------------------------------------------*/



    if ($('.pagepiling').length > 0){
		const isMobile = window.innerWidth <= 768; // Detect mobile
		const isHome = $('body').hasClass('home-page');
		if (!isMobile || isHome) {
			const anchors = [];
			$('.menu-list li[data-menuanchor]').each(function () {
				const anchor = $(this).attr('data-menuanchor');
				if (anchor) {
					anchors.push(anchor);
				}
			});
			console.log(anchors);

			$('.pagepiling').pagepiling({
				scrollingSpeed: 280, 
				loopBottom:true,
				// anchors: ['home', 'about', 'projects', 'testimonial', 'clients', 'blogs','contact'],
				anchors: anchors,
				afterLoad: function(anchorLink, index){
					// Dynamically set active class on menu links
					$('.nav-item a').removeClass('active');
					$(`.nav-item a[href$="#${anchorLink}"]`).addClass('active');
					// console.log(anchorLink);
					if(anchorLink == 'about'){
						progress_bar();
					}

					if ( $('.pp-section.active').scrollTop() > 0 ){
						$('.navbar').removeClass('navbar-white');
					}
					else{
						$('.navbar').addClass('navbar-white');
					}
					
				}
			});



			/*-------------------------------------------------------------------------------
			Scroll into sections 
			/-------------------------------------------------------------------------------*/



			$('.pp-scrollable').on('scroll', function () {
				var scrollTop =$(this).scrollTop();
				if (scrollTop > 0 ) {
					$('.navbar-2').removeClass('navbar-white');
				}
				else{
					$('.navbar-2').addClass('navbar-white');
				}
			});



			/*-------------------------------------------------------------------------------
			Scroller navigation
			/-------------------------------------------------------------------------------*/



			$('#pp-nav').remove().appendTo('body').addClass('white right-boxed hidden-xs');

			$('.pp-nav-up').on('click', function(){
				$.fn.pagepiling.moveSectionUp();
			});

			$('.pp-nav-down').on('click', function(){
				$.fn.pagepiling.moveSectionDown();
			});
		} else {
		    // Destroy PagePiling and allow normal scrolling on mobile
			if ($.fn.pagepiling) {
				$.fn.pagepiling.destroy('all'); // Completely remove PagePiling
			}

			// Ensure the page can scroll normally
			$('.pagepiling').css({
				"overflow": "auto",
				"height": "auto",
				"position": "relative"
			});

			$('.pp-scrollable').css({
				"overflow": "auto",
				"height": "auto"
			});

			$('body, html').css({
				"overflow": "auto",
				"height": "auto"
			});
		}
    } 



    /*-------------------------------------------------------------------------------
	  Change bacgkround on project section
	-------------------------------------------------------------------------------*/



    $('.project-box').on('mouseover',function(){
    	var index = $('.project-box').index(this);
    	$('.bg-changer .section-bg').removeClass('active').eq(index).addClass('active');
    });



	/*-------------------------------------------------------------------------------
	  Ajax Forms
	-------------------------------------------------------------------------------*/



	// if ($('.js-form').length) {
	// 	$('.js-form').each(function(){
	// 		$(this).validate({
	// 			errorClass: 'error wobble-error',
	// 		    submitHandler: function(form){
	// 	        	$.ajax({
	// 		            type: "POST",
	// 		            url:"mail.php",
	// 		            data: $(form).serialize(),
	// 		            success: function() {
	// 		            	$('#error').modal('hide');
	// 	                	$('#success').modal('show');
	// 	                },

	// 	                error: function(){
	// 	                	$('#success').modal('hide');
	// 		                $('#error').modal('show');
	// 		            }
	// 		        });
	// 		    }
	// 		});
	// 	});
	// }

})(jQuery);


window.onload = function () {
  $(".slick-slider").slick({
    autoplay: true,
    autoplaySpeed: 0,
    speed: 8000,
    arrows: true,
    centerMode: false,
    slidesToShow: 4,
    slidesToScroll: 1,
    pauseOnHover: true,
    pauseOnFocus: true,
     responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 2,
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
};
// window.onload = function () {
// 	$(".slick-slider").slick({
// 		autoplay: true,
//   		autoplaySpeed: 2000,
// 		speed: 8000,
// 		slidesToShow: 4,
// 		slidesToScroll: 1,
// 		arrows: true,
// 	   	responsive: [
// 			{
// 				breakpoint: 991,
// 				settings: {
// 					slidesToShow: 2,
// 				}
// 			},
// 			{
// 				breakpoint: 767,
// 				settings: {
// 					slidesToShow: 1,
// 				}
// 			}
// 		]
// 	});
// };


//   window.onload = function () {
// 	$(".slick-slider").slick({
// 	  autoplay: true,
// 	  autoplaySpeed: 0,
// 	  speed: 8000, // Adjust speed if needed
// 	  infinite: true,
// 	  cssEase: 'linear',
// 	  arrows: true,
// 	  centerMode: false,
// 	  slidesToShow: 4,
// 	  slidesToScroll: 1,
// 	  pauseOnHover: false,
// 	  pauseOnFocus: false,
// 	  responsive: [
// 		{
// 		  breakpoint: 991,
// 		  settings: {
// 			slidesToShow: 2,
// 		  }
// 		},
// 		{
// 		  breakpoint: 767,
// 		  settings: {
// 			slidesToShow: 1,
// 		  }
// 		}
// 	  ]
// 	});
//   };
  
  
