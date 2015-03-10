// Setting some variables
var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
var windowHeight = jQuery(window).height();
var windowWidth = jQuery(window).width();
var navHeight = jQuery('header.navbar').height();
var bheight = jQuery('body').height();
/*=================================================================*/
var $ = jQuery.noConflict();
jQuery(document).ready(function() {

	"use strict";

	/*=================================================================
		set home section height to fullscreen
	===================================================================*/
	jQuery('#home').css('height', windowHeight);

	fadeNavitems();

 $(".fancybox").fancybox({
			'content': '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2000.1523789188125!2d10.7367122!3d59.9130184!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46416e7d8781deb5%3A0x3a44a012fc299fb7!2sTordenskiolds+gate+3%2C+0160+Oslo!5e0!3m2!1sno!2sno!4v1415891358921" width="600" height="450" frameborder="0" style="border:0"></iframe>'
		});
	if (isMobile == false) {
  var s = skrollr.init({
    forceHeight: false
  });
	}
	/*=================================================================
	ANIMATE CONTENT
	===================================================================*/
    if (isMobile == false) {
        $('*[data-animated]').addClass('animated');
    }
	function animated_contents() {
		$(".animated:appeared").each(function (i) {
			var $this    = $(this),
				animated = $(this).data('animated');

			setTimeout(function () {
				$this.addClass(animated);
			},180);

		});
	}
	animated_contents();
	$(window).scroll(function () {
		animated_contents();
	});


	/*cubic subscribe */
	//jQuery time

	//add '.ready' to form when user focuses on it
	$("#email").focus(function(){
		$("#cuboid form").addClass("ready");
	})
	//remove '.ready' when user blus away but only if there is no content
	$("#email").blur(function(){
		if($(this).val() == "")
			$("#cuboid form").removeClass("ready");
	})

	//If the user is typing something make the arrow green/.active
	$("#email").keyup(function(){
		//this adds .active class only if the input has some text
		$(".submit-icon").toggleClass("active", $(this).val().length > 0);
	})

	//on form submit remove .ready and add .loading to the form
	/*$("#cuboid form").submit(function(){
		$(this).removeClass("ready").addClass("loading");
		//finish loading in 3s
		setTimeout(complete, 3000);
		//prevent default form submisson
		return false;
	})
	function complete()
	{
		$("#cuboid form").removeClass("loading").addClass("complete");
	}
	//reset/refresh functionality
	$(".reset-icon").click(function(){
		$("#cuboid form").removeClass("complete");
	})*/


	/*=================================================================
	service more detail slide down
	===================================================================*/


	$("#service-slider .item a").click(function(){
		var selector = $(this).attr('data-rel');
		$(selector).slideDown(600);
		$('html, body').delay(600).animate({ scrollTop: $(selector).offset().top-8}, 800,"easeOutElastic");
	});
	$(".close-service").click(function(){
		var selector = $(this).attr('data-rel');
		$(selector).slideUp(800);
		$('html, body').delay(600).animate({ scrollTop: $("#services").offset().top}, 800);
	});



	/*=================================================================
	show-hide navigation
	===================================================================
	var windowOffsetHeight = windowHeight - 1;
	if (!jQuery('header.navbar').hasClass('show')) {
		jQuery(window).scroll(function() {
			if ( jQuery(this).scrollTop() > bheight - 10 ) {
				jQuery('header.navbar').removeClass('show');
			}
			else {
				jQuery('header.navbar').addClass('show');
			}
		});
	};*/

	$(window).scroll(function() {

			var sT = $(this).scrollTop();

			if (sT >= 10) {
				$('#header').addClass('scrolled');
				//$('#header .logo').css({'background-position':'0 -18px'});
				$('#header .navicon').css({'background-position':'0 -28px'});
				//$('#cat-cont').css({'position': 'fixed', 'top': 77});
				//$(".bg-overlay").animate({opacity: "1"}, 1200);


			}else {
				$('#header').removeClass('scrolled');
				//$(".bg-overlay").animate({opacity: "0"}, 200);
				//$('#header .logo, #header .hamburger').css({'background-position':'0 0'});
				//$('#cat-cont').css({'position': 'relative', 'top': 0});
			}

	});

	/*=================================================================
	Bootstrap Plugins : Navigation - Collapse (for mobile)
	===================================================================*/
	jQuery('.navbar .collapse').collapse();
	jQuery(".navbar-nav li a").click(function() {
		jQuery(".collapse").toggleClass("in");
	});


	/*=================================================================
	Contact form
	===================================================================*/

	contentEditable();//contactForm();

	/*=================================================================
	Team section flexslider
	===================================================================*/

	$('#intro-inner').flexslider({
      animation: 'slide',
      controlNav: false,
      directionNav: false,
      keyboard: false,
      slideshow: false,
	  animationSpeed: 1000,
	  easing: "easeInOutElastic",

      start: function (slider) {
        $('#intro-inner .flex-next').click(function() {
          $('.aboutintro-nav li').removeClass('active');
          $('#intro-inner').flexslider('next');
          $('.aboutintro-nav li').eq(slider.animatingTo).addClass('active');
          return false;
        });
        $('#intro-inner .flex-prev').click(function() {
          $('.aboutintro-nav li').removeClass('active');
          $('#intro-inner').flexslider('prev');
          $('.aboutintro-nav li').eq(slider.animatingTo).addClass('active');
          return false;
        });
        $('.aboutintro-nav li').eq(slider.currentSlide).addClass('active');
      },
      touch: false
    });
	$('.intro-node').click(function() {
      var self = $(this);
      var index = self.parent().index();
      $('.intro-node').parent().removeClass('active');
      $('#intro-inner').flexslider(index);
      self.parent().addClass('active');
      return false;
    });

	/*=================================================================
	Header text slider
	===================================================================*/

	$("#heading-slider-style1").owlCarousel({
        navigation: false,
        pagination: true,
        items: 1,
        navigationText: false,
		autoPlay:4000,
		itemsDesktop : [1000,1], //5 items between 1000px and 901px
		itemsDesktopSmall : [900,1], // betweem 900px and 601px
		itemsTablet: [600,1], //2 items between 600 and 0
		transitionStyle : "fade"
	});

	$("#heading-slider-style2").owlCarousel({
        navigation: false,
        pagination: false,
        items: 1,
        navigationText: false,
		autoPlay:4000,
		itemsDesktop : [1000,1], //5 items between 1000px and 901px
		itemsDesktopSmall : [900,1], // betweem 900px and 601px
		itemsTablet: [600,1], //2 items between 600 and 0
		transitionStyle : "fade"
	});

	$("#demo-slider").owlCarousel({
        navigation: false,
        pagination: true,
        items: 1,
        navigationText: false,
		autoPlay:4000,
		itemsDesktop : [1000,1], //5 items between 1000px and 901px
		itemsDesktopSmall : [900,1], // betweem 900px and 601px
		itemsTablet: [600,1], //2 items between 600 and 0
		transitionStyle : "goDown",
		mouseDrag:false,
		touchDrag:false
	});

	$(".view-id-frontpage").owlCarousel({
        navigation: false,
        pagination: false,
        items: 2,
        navigationText: false,
		autoPlay:5000,
		itemsDesktop : [1000,2], //5 items between 1000px and 901px
		itemsDesktopSmall : [900,1], // betweem 900px and 601px
		itemsTablet: [600,1], //2 items between 600 and 0
		transitionStyle : "slide",

	});
	/*=================================================================
	clients slider
	===================================================================*/

	$("#client-slider").owlCarousel({
        navigation: false,
        pagination: false,
		autoPlay:5000,
        items: 5,
        navigationText: false
    });

	/*=================================================================
	testimonial slider
	===================================================================*/

	$("#testi-slider").owlCarousel({
        navigation: true,
        pagination: false,
        items: 1,
        navigationText: false,
		autoPlay:3000,
		itemsDesktop : [1000,1], //5 items between 1000px and 901px
		itemsDesktopSmall : [900,1], // betweem 900px and 601px
		itemsTablet: [600,1], //2 items between 600 and 0
		transitionStyle : "goDown"
    });

	/*=================================================================
	Service slider
	===================================================================*/

	$("#service-slider").owlCarousel({
        navigation: false,
        pagination: false,
		autoPlay:5000,
        items: 3,
		itemsDesktop : [1000,2], //5 items between 1000px and 901px
		itemsDesktopSmall : [900,1], // betweem 900px and 601px
		itemsTablet: [600,1], //2 items between 600 and 0
        navigationText: false
    });

	/*=================================================================
	gallery slider
	===================================================================*/
	$("#gallery-slider").owlCarousel({
        navigation: false,
        pagination: false,
		autoPlay:5000,
        items: 4,
        navigationText: false
    });

	/*=================================================================
	Portfolio slider
	===================================================================*/



});
// END jQuery(document).ready()

jQuery(window).load(function() {


  /*=================================================================
	Preloader
	===================================================================*/
	$("#status").fadeOut();
	$("#preloader").delay(350).fadeOut("slow");

	/*=================================================================
	Home parallax heading animation
	===================================================================*/
	//if (isMobile == false) {
		$(window).scroll(function(){
		var scrollAmount = $(window).scrollTop()/2;
			$('#heading-slider-style1').css('padding-bottom', scrollAmount);
		});
		$(window).scroll(function(){
			if($(window).scrollTop()<windowHeight/2){
				$('#heading-slider-style1').fadeIn(1400);
			} else {
				$('#heading-slider-style1').fadeOut(1400);
			}
		});
	//}

	/*=================================================================
	TwitterFeed
	===================================================================*/

	/*$('#twitter-box').tweet({
	    modpath: 'js/twitter/',
	    list_id: 'twitter-box',
	    count: 4,
	    avatar_size: 0,
	    loading_text: 'loading twitter feed',
	    username:'contact20twelve'
	});*/

	/*=================================================================
	twitter slider
	===================================================================*/

	$("#tweet-slider").owlCarousel({
        navigation: true,
        pagination: false,
        items: 1,
        navigationText: false,
		autoPlay:3000,
		itemsDesktop : [1000,1], //5 items between 1000px and 901px
		itemsDesktopSmall : [900,1], // betweem 900px and 601px
		itemsTablet: [600,1], //2 items between 600 and 0
		transitionStyle : "goDown"
    });




	/*=================================================================
	Smooth scroll for menu links
	===================================================================*/

  jQuery('#menu-main-nav a[href^="#"], #home a[href^="#"], .modal a[href^="#"], body.path-frontpage .nav-logo').on('click', function(e) {
    e.preventDefault();
    jQuery('html,body').animate({scrollTop:jQuery(this.hash).offset().top-40}, 1200);
	$('#nav').animate({'top':-380 +'px'}, 500, 'swing');
		$('#nav ul li, #nav .nav-logo, #nav .close').hide();
		$('#nav').css({'height': 'auto'});

	});

	// Smooth scroll for menu links
	jQuery('.go a[href^="#"]').on('click', function(e) {
    e.preventDefault();
    jQuery('html,body').animate({scrollTop:jQuery(this.hash).offset().top-40}, 800);
	});


});
// END Window.load()

/*=================================================================
	Bootstrap Specific
===================================================================*/


/*Contact from*/
function contentEditable(){
	function e(t){
		var n=jQuery.Event("keypress",{which:t});
		t.keyCode!==9?$(this).text("").addClass("js-populated").removeClass("js-error").trigger(n):$(this).one("keypress",e)
	}
	$("[contenteditable=true]").each(function(){
		var t=$(this).data("placeholder");
		$(this).one("keypress",e);
		$(this).keyup(function(){
			if($(this).text().length===0){
				$(this).text(t).removeClass("js-populated");
				$(this).one("keypress",e)
			}
		})
	});
	$("[contenteditable=true]").focus(function(){
		$(this).removeClass("js-error")
	})
}

function contactForm(){

	function e(e){
		var t=/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		return t.test(e)
	}
	$(".js-contact-form").submit(function(){
		var i=$(".js-contact-email"),
			s=$(".js-contact-name"),
			o=$(".js-contact-subject"),
			u=$(".js-contact-brief"),
			a=1;

			i.removeClass("js-error");s.removeClass("js-error");o.removeClass("js-error");u.removeClass("js-error");
			if(i.text()===i.data("placeholder")){i.addClass("js-error");a=0}else if(!e(i.text())){i.addClass("js-error");a=0}if(s.text()===s.data("placeholder")){s.addClass("js-error");a=0}if(o.text()===o.data("placeholder")){o.addClass("js-error");a=0}if(u.text()===u.data("placeholder")){u.addClass("js-error");a=0}if(!a)return!1

			//send the ajax request
			$.post('email.php',{name:$(".js-contact-name").text(),
							  email:$(".js-contact-email").text().replace(/(\r\n|\n|\r)/gm,"").replace(/\s+/g," "),
							  subject:$(".js-contact-subject").text(),
							  message:$(".js-contact-brief").text().replace(/(\r\n|\n|\r)/gm,"").replace(/\s+/g," ")},

			//return the data
			function(data){
			  $(".js-mail-message").addClass("js-hidden");
				$(".js-contact-submit").addClass("js-hidden");
				$(".js-mail-success").removeClass("js-hidden")
			});
			//stay on the page
			return false;
	})
}

function fadeNavitems() {
   var lis = $('#nav ul li').hide();
	$('.navicon').click(function() {
		$('#nav').animate({'top':0 +'px'}, 500, 'swing');
		var winH = $(document).height();

		    var i = 0;
		setTimeout(function() {
		(function displayImages() {
			$('#nav .nav-logo, #nav .close').fadeIn('slow');
		        lis.eq(i++).fadeIn(200, displayImages);
		     })();
		}, 500);
		if ($(window).width() < 1000) {
			$('#nav').css({'height': winH});
		}
	});

	$('#nav .close').click(function() {
		$('#nav').animate({'top':-380 +'px'}, 500, 'swing');
		$('#nav ul li, #nav .nav-logo, #nav .close').hide();
		$('#nav').css({'height': 'auto'});
	});
}
