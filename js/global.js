/**
 * Theme js
 */


// Remove focus outlines for mouse users only
// https://github.com/nuclei/unfocus
(function($) {
	(function(document, window){
		if (!document || !window) {
			return;
		}
		
		var styleText = '::-moz-focus-inner{border:0 !important;}:focus{outline: none !important;';
		var unfocus_style = document.createElement('STYLE');

		window.unfocus = function(){
			document.getElementsByTagName('HEAD')[0].appendChild(unfocus_style);

			document.addEventListener('mousedown', function(){
				unfocus_style.innerHTML = styleText+'}';
			});
			document.addEventListener('keydown', function(){
				unfocus_style.innerHTML = '';
			});
		};

		unfocus.style = function(style){
			styleText += style;
		};

		unfocus();
	})(document, window);

})(jQuery);	


/*
 * Responsive menu
 */
 
(function($) {
	
	// Add class to site-header on scroll
	$(function() {
		var header = $(".site-header");
		$(window).scroll(function() {
			var scroll = $(window).scrollTop();

			if (scroll >= 100) {
				header.addClass("scroll");
			} else {
				header.removeClass("scroll");
			}
		});
	});

	// Responsive menu toggle
	$('.menu-toggle').on('click', function(e){
      e.preventDefault();
      $('.site-container').toggleClass('mobile-nav-active');
    });
	
	$(function () {
			$('.menu-item-has-children').click(function () {
				$(this).children('.sub-menu').slideToggle('fast'),
				$(this).toggleClass('submenu-expanded');
				if ( $( this ).hasClass( 'submenu-expanded' )) {
					this.setAttribute('aria-expanded', "true");
				}
				else {
					this.setAttribute('aria-expanded', "false");
				}
				
			
			});
		});

})(jQuery);	 
 




(function($) {
		
		/*
		* Scroll Reveal classes/objects
		*/
		window.sr = ScrollReveal();
	
		sr.reveal('.riseUp, .wp-block-column, .wp-block-media-text__media, .wp-block-media-text__content', {
			delay: 0,
			useDelay: 'onload',
			distance: '30px',
			duration: 800,
			easing : 'ease-in-out',
			opacity: 0,
			origin: 'bottom',
			interval: 100,
			scale: 1,
			reset: false
		});		

		sr.reveal('.slowRiseUp', {
			delay: 600,
			useDelay: 'onload',
			distance: '100px',
			duration: 1800,
			easing : 'ease-in-out',
			opacity: 0,
			origin: 'bottom',
			interval: 100,
			scale: 1,
			reset: false
		});		

		sr.reveal('.fadeIn', {
				duration: 1000,
				easing : 'ease-in-out',
				opacity: 0,
				interval: 300,
				scale: 1,
				reset: false
		});
		
		sr.reveal('.slowFade', {
			delay: 1000,
			useDelay: 'onload',
			duration: 800,
			easing : 'ease-in-out',
			opacity: 0,
			interval: 0,
			scale: 1,
			reset: false
		});	
		
		
		// Scroll to top
		$(document).ready(function(){
	
			//Check to see if the window is top if not then display button
			$(window).scroll(function(){
				if ($(this).scrollTop() > 700) {
					$('#scroll-top').fadeIn();
				} else {
					$('#scroll-top').fadeOut();
				}
			});
			
			//Click event to scroll to top
			$('#scroll-top').click(function(){
				$('html, body').animate({scrollTop : 0},400);
				return false;
			});
			
		});
		
		
})(jQuery);

// Misc
(function($) {

	
})(jQuery);	
