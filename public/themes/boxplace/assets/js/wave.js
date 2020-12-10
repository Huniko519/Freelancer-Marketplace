
$(document).ready(function() {
	
	"use strict";
	
	/*============================================
	Scroll To Top
	==============================================*/	

	//When distance from top = 250px fade button in/out
	$(window).scroll(function(){
		if ($(this).scrollTop() > 250) {
			$('#scrollup').fadeIn(300);
		} else {
			$('#scrollup').fadeOut(300);
		}
	});

	//On click scroll to top of page t = 1000ms
	$('#scrollup').on('click',function(){
		$("html, body").animate({ scrollTop: 0 }, 1000);
		return false;
	});

	/*============================================
	Navbar Dropdown
	==============================================*/	
    
	$('ul.nav li.dropdown').hover(function() {
	  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
	}, function() {
	  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
	});  
	
	/*============================================
	Alert Fade
	==============================================*/	  
	
    $(".alert-danger").fadeIn(1000).delay(5000).fadeOut(1000);
    $(".alert-success").fadeIn(1000).delay(5000).fadeOut(1000);
	
	
	/*============================================
	Select 2
	==============================================*/	
	$('.select2, .select3').select2();
	
	
	/*============================================
	Summernote
	==============================================*/
	$('#summernote, #summernote-1').summernote({
        height: 200,
		toolbar: [
		  ['style', ['bold', 'italic', 'underline', 'clear']],
		  ['misc', ['print']]
		],
    });
	
	
	//Fact Counter + Text Count
	if($('.count-box').length){
		$('.count-box').appear(function(){
	
			var $t = $(this),
				n = $t.find(".count-text").attr("data-stop"),
				r = parseInt($t.find(".count-text").attr("data-speed"), 10);
				
			if (!$t.hasClass("counted")) {
				$t.addClass("counted");
				$({
					countNum: $t.find(".count-text").text()
				}).animate({
					countNum: n
				}, {
					duration: r,
					easing: "linear",
					step: function() {
						$t.find(".count-text").text(Math.floor(this.countNum));
					},
					complete: function() {
						$t.find(".count-text").text(this.countNum);
					}
				});
			}
			
		},{accY: 0});
	}

    // Elements Animation
	if($('.wow').length){
		var wow = new WOW(
		  {
			boxClass:     'wow',      // animated element css class (default is wow)
			animateClass: 'animated', // animation css class (default is animated)
			offset:       0,          // distance to the element when triggering the animation (default is 0)
			mobile:       true,       // trigger animations on mobile devices (default is true)
			live:         true       // act on asynchronously loaded content (default is true)
		  }
		);
		wow.init();
	}
	
	
	$('.testi5').owlCarousel({
		loop: true,
		margin: 30,
		nav: false,
		navText: ['<i class="icon-arrow-left"></i>', '<i class="icon-arrow-right"></i>'],
		dots: true,
		autoplay: true,
		center: true,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1

			},
			1024: {
				items: 3
			}
		}
	});
	

      $(".slick-slider").slick({
	    arrows: false,
        dots: true,
        centerMode: true,
		pauseOnHover: false,
		autoplay: true,
		autoplaySpeed: 2000,
        slidesToShow: 3,
            lazyLoad: 'ondemand',
            responsive: [{
                breakpoint: 5200,
                settings: {
                    centerPadding: '540px',
                    slidesToShow: 1
                }
            }, {
                breakpoint: 4200,
                settings: {
                    centerPadding: '440px',
                    slidesToShow: 1
                }
            }, {
                breakpoint: 3000,
                settings: {
                    centerPadding: '200px',
                    slidesToShow: 3
                }
            }, {
                breakpoint: 1920,
                settings: {
                    centerPadding: '200px',
                    slidesToShow: 2
                }
            }, {
                breakpoint: 1200,
                settings: {
                    centerPadding: '80px',
                    slidesToShow: 2
                }
            }, {
                breakpoint: 767,
                settings: {
                    centerPadding: '0px',
                    slidesToShow: 2
                }
            },{
                breakpoint: 530,
                settings: {
                    centerPadding: '0px',
                    slidesToShow: 1
                }
            }, {
                breakpoint: 480,
                settings: {
                    centerPadding: '0px',
                    slidesToShow: 1
                }
            }]
      });	

});

