/**
 * Genesis Sample entry point.
 *
 * @package GenesisSample\JS
 * @author  StudioPress
 * @license GPL-2.0+
 */

var genesisSample = ( function( $ ) {
	'use strict';

	/**
	 * Adjust site inner margin top to compensate for sticky header height.
	 *
	 * @since 2.6.0
	 */
	var moveContentBelowFixedHeader = function() {
		var siteInnerMarginTop = 0;

		if( $('.site-header').css('position') === 'fixed' ) {
			siteInnerMarginTop = $('.site-header').outerHeight();
		}

		$('.site-inner').css('margin-top', siteInnerMarginTop);
	},

	/**
	 * Initialize Genesis Sample.
	 *
	 * Internal functions to execute on document load can be called here.
	 *
	 * @since 2.6.0
	 */
	init = function() {
		// Run on first load.
		moveContentBelowFixedHeader();

		// Run after window resize.
		$( window ).resize(function() {
			moveContentBelowFixedHeader();
		});

		// Run after the Customizer updates.
		// 1.5s delay is to allow logo area reflow.
		if (typeof wp.customize != "undefined") {
			wp.customize.bind( 'change', function ( setting ) {
				setTimeout(function() {
					moveContentBelowFixedHeader();
				  }, 1500);
			});
		}
	};

	// Expose the init function only.
	return {
		init: init
	};

})( jQuery );

jQuery( window ).on( 'load', genesisSample.init );




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

	// Responsive menu toggle
	$('.menu-toggle').on('click', function(e){
      e.preventDefault();
      $(this).parent().toggleClass('mobile-nav-active');
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
	
		sr.reveal('.fadeIn, h1, .wp-block-column, .wp-block-media-text__media, .wp-block-media-text__content, .wp-block-image, .wp-block-cover', {
				duration: 1000,
				easing : 'ease-in-out',
				opacity: 0,
				interval: 300,
				scale: 1,
				reset: false
		});

		sr.reveal('.delay', {
				delay: 1000,
		});		
		
		sr.reveal('.shiftUp', {
				delay: 300,
				distance: '30px',
				duration: 1200,
				easing : 'ease-in-out',
				origin: 'bottom',
				scale: 1,				
				reset: false
		},200);
		
		sr.reveal('.shiftDown', {
				delay: 300,
				distance: '30px',
				duration: 1200,
				easing : 'ease-in-out',
				origin: 'top',
				scale: 1,				
				reset: false
		},200);	

		sr.reveal('.cubeIn', {
				delay: 300,
				distance: '30px',
				duration: 1200,
				easing : 'cubic-bezier(.5,0,.4,1.06)',
				origin: 'left',
				scale: 1,				
				reset: false
		},200);	
		
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
