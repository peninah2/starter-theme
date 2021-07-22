<?php
/**
 * Blocks
 *
 * @package      HCStarter

**/

// Create blocks
function hct_register_custom_blocks() {
	
	if( ! function_exists( 'acf_register_block_type' ) )
		return;
	
	acf_register_block_type( array(
		'name'				=> 'svg-img',
		'title'				=> __( 'SVG image', 'theme-blocks' ),
		'render_template'	=> 'blocks/block-svg-img.php',
		'category'			=> 'formatting',
		'icon'				=> 'embed-photo',
		'mode'				=> 'auto',
		'keywords'			=> array( 'svg', 'image', 'theme-blocks' ),
	));	

}
add_action('acf/init', 'hct_register_custom_blocks' );


function hct_custom_block_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug'  => 'theme',
				'title' => __( 'Theme Blocks', 'theme-blocks' ),
			),
		)
	);
}
add_filter( 'block_categories_all', 'hct_custom_block_category', 10, 2);

/*
 * Only load Featherlight scripts if team member block is present
 */

function hct_teamblock_featherlight_script() {
	
	if ( has_block( 'acf/team-member' ) ) {
		wp_enqueue_script(
			'featherlight',
			get_stylesheet_directory_uri() . '/js/featherlight.min.js',
			array( 'jquery' ),
			CHILD_THEME_VERSION,
			true
		);
	}
}
// add_action( 'wp_enqueue_scripts', 'hct_teamblock_featherlight_script' );


/*
 * Only load Swiper scripts if slider block is present
 */

function hct_slider_block_swiper_enqueue_script() {
	
	if ( has_block( 'acf/testimonial-slider' ) || has_block( 'acf/logo-slider' ) ) {
		wp_enqueue_script(
			'swiper-js',
			'//unpkg.com/swiper/swiper-bundle.min.js',
			array( 'jquery' ),
			CHILD_THEME_VERSION,
			true
		);
		
		wp_enqueue_style(
			'swiper-styles',
			'//unpkg.com/swiper/swiper-bundle.min.css',
			array(),
		);
	}
}
//add_action( 'wp_enqueue_scripts', 'hct_slider_block_swiper_enqueue_script' );



// Now add specific for this slider 
function hct_testimonial_slider() {
	
	if ( has_block( 'acf/testimonial-slider' ) || is_post_type_archive( 'featured' ) ) { 
	?>
	
	<script type='text/javascript'>
		jQuery(function ($) {
		$(document).ready(function(){
			
			var swiper = new Swiper('.testimonial-slider', {
				autoplay: {
					delay: 10000,
				  },
				
				speed: 1000,
				loop: true, 
				navigation: {
					nextEl: '.swiper-button-next',
					prevEl: '.swiper-button-prev',
				  },
			});		
			
		});	
	});	
	</script>
	
	<?php
	}
}
add_action( 'wp_footer', 'hct_testimonial_slider', 50 );

// Now add specific for this slider 
function hct_logo_slider() {
	
	if ( has_block( 'acf/logo-slider' ) ) { 
	?>
	
		<script type='text/javascript'>
		jQuery(function ($) {
		$(document).ready(function(){
			
			var swiper = new Swiper('.logo-slider', {
				  
				loop: true,
				
				slidesPerView: 1,
				speed: 5000,
				
				breakpoints: {
					600: {
					  slidesPerView: 2,
					  spaceBetween: 30,
					},
					
					1280: {
					  slidesPerView: 3,
					  spaceBetween: 30,
					  slidesPerGroup: 3,
					}
				},
				  
				  
				navigation: {
					nextEl: '.swiper-button-next',
					prevEl: '.swiper-button-prev',
				  },
			});		
			
		});	
	});	
	</script>
	
	<?php
	}
}
add_action( 'wp_footer', 'hct_logo_slider', 50 );

