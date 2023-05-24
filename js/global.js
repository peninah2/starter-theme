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


// Misc
(function($) {

	/*
	 * GSAP
	 * Additional GSAP scripts in /blocks/acf-block-setup.php
	 ----------------------------------------------------------*/
	 
	// gsap.config({
		// nullTargetWarn: false,
	// }); 	
	 
	// ScrollTrigger - register, defaults
	gsap.registerPlugin(ScrollTrigger);
	
	ScrollTrigger.defaults({
		toggleActions: "restart none none none",
	});
	
	
	
})(jQuery);	
