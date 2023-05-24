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
	 ----------------------------------------------------------*/
	 
	// gsap.config({
		// nullTargetWarn: false,
	// }); 	
	 	
	// ScrollTrigger - register, defaults
	gsap.registerPlugin(ScrollTrigger);
	
	ScrollTrigger.defaults({
		toggleActions: "play complete none reset",
		start: "top 90%",
	});
	

	
	/* Element fades in
	--------------------------------------------------------------------------*/
	const fadeIn = gsap.utils.toArray('.fadeIn')
		
	fadeIn.forEach((text, i) => {

		gsap.set( text, { opacity: 1 } );
		gsap.from(text, {
			opacity: 0, 
			ease: "expo", 
			duration: 1, 
			stagger: {
				each: 0.25
			},
			overwrite: true, 
			scrollTrigger:{
				trigger: text,
			},
		})

	});
	
	/* Element fades in & rises up
	--------------------------------------------------------------------------*/
	const riseUp = gsap.utils.toArray('.riseUp')
		
	riseUp.forEach((text, i) => {

		gsap.set( text, { opacity: 1, y: 0 } );
		gsap.from(text, {
			opacity: 0, 
			y: 45, 
			ease: "expo", 
			duration: 1, 
			overwrite: true, 
			scrollTrigger:{
				trigger: text,
			},
		})

	});
	
	/* Add class of "animate", child elements fade in & rise up with a stagger (.25 stagger)
	 * Set for .wp-block-columns
	 * If adding to custom area, add class of "animateCols" to container and "col" to animated items
	--------------------------------------------------------------------------*/
	if(document.querySelector(".animate.wp-block-columns, .animateCols")) {
		
		let colStagger = document.querySelectorAll(".animate.wp-block-columns, .animateCols")

		colStagger.forEach( (element) => {

			let cols = element.querySelectorAll(".wp-block-column, .col");

			gsap.set( cols, { opacity: 0, y: 45 });

			let tl = gsap.timeline()
			.to(cols, {
				opacity: 1, 
				y: 0, 
				ease: "expo", 
				duration: 2, 
				stagger: {
					each: 0.25
				},
				overwrite: true
			}, 0)

			ScrollTrigger.create({
				trigger: element,
				animation:tl
			});

		});
	}	
	
	
	/* Add class of "animate", child elements fade in & rise up with a stagger (.25 stagger)
	 * Set for .wp-block-group
	--------------------------------------------------------------------------*/

	if(document.querySelector(".animate.wp-block-group")) {
		
		let groupStagger = document.querySelectorAll(".animate.wp-block-group")

		groupStagger.forEach( (element) => {

			let groupItems = element.querySelectorAll("p, h1, h2, h3, h4, .wp-block-button");

			gsap.set( groupItems, { opacity: 1, y: 0, autoAlpha: 1 });

			let gStl = gsap.timeline()
			.from(groupItems, {
				opacity: 0, 
				y: 45, 
				ease: "expo", 
				duration: 2, 
				stagger: {
					each: 0.25
				},
				overwrite: true
			}, 0)

			ScrollTrigger.create({
				trigger: element,
				animation:gStl
			});

		});
	}
	
	/* Add class of "hero", child elements fade in & rise up with a stagger (.25 stagger), NO SCROLLTRIGGER. 
	 * This is used for heros/first group/cover on the page, otherwise, the scrolltrigger creates an issue
	--------------------------------------------------------------------------*/
	if(document.querySelector(".wp-block-cover.hero .wp-block-cover__inner-container, .wp-block-group.hero")) {
		let heroStagger = document.querySelectorAll(".wp-block-cover.hero .wp-block-cover__inner-container, .wp-block-group.hero")

		heroStagger.forEach( (element) => {

			let heroItems = element.querySelectorAll("p, h1, h2, h3, h4, h5, h6, .wp-block-button");

			gsap.set( heroItems, { opacity: 1, y: 0, autoAlpha: 1 });

			let tl = gsap.timeline()
			.from(heroItems, {
				opacity: 0, 
				y: 45, 
				ease: "expo", 
				duration: 2, 
				stagger: {
					each: 0.25
				},
				overwrite: true
			}, 0)

		});
	}	
	
	/* Lists fade in & rise up with a stagger (.1 stagger)
	 * Add class of "animate"
	--------------------------------------------------------------------------*/
	if(document.querySelector("ol.animate, ul.animate")) {
		let listStagger = document.querySelectorAll("ol.animate, ul.animate")

		listStagger.forEach( (element) => {

			let listItems = element.querySelectorAll("li");

			gsap.set( listItems, { opacity: 1, y: 0 });

			let tl = gsap.timeline()
			.from(listItems, {
				opacity: 0, 
				y: 45, 
				ease: "expo", 
				duration: 2, 
				stagger: {
					each: 0.1
				},
				overwrite: true
			}, 0)

			ScrollTrigger.create({
				trigger: element,
				animation:tl
			});

		});
	}
		

	
	
	
	
})(jQuery);	
