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
		'title'				=> __( 'SVG image', 'hct' ),
		'render_template'	=> 'blocks/block-svg-img.php',
		'category'			=> 'formatting',
		'icon'				=> 'embed-photo',
		'mode'				=> 'auto',
		'keywords'			=> array( 'svg', 'image', 'hct' ),
	));	

	acf_register_block_type( array(
		'name'			=> 'team-member',
		'title'			=> __( 'Team Member', 'themename' ),
		'render_template'	=> 'blocks/block-team-member.php',
		'category'		=> 'formatting',
		'icon'			=> 'businessman',
		'mode'			=> 'edit',
		//'post_types'	=> 'team',
		'keywords'		=> array( 'team', 'member', 'staff', 'client'  )
	));

	acf_register_block_type( array(
		'name'				=> 'testimonial-slider',
		'title'				=> __( 'Testimonial Slider', 'themename' ),
		'render_template'	=> 'blocks/block-testimonial-slider.php',
		'category'			=> 'formatting',
		'icon'				=> 'editor-quote',
		'mode'				=> 'auto',
		'keywords'			=> array( 'testimonials', 'slider', 'themename' ),
	));	
	
	acf_register_block_type( array(
		'name'				=> 'logo-slider',
		'title'				=> __( 'Logo Slider', 'themename' ),
		'render_template'	=> 'blocks/block-logo-slider.php',
		'category'			=> 'formatting',
		'icon'				=> 'gallery',
		'mode'				=> 'auto',
		'keywords'			=> array( 'logo', 'slider', 'themename' ),
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
add_filter( 'block_categories', 'hct_custom_block_category', 10, 2);

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
 * Hide Genesis page title when Page Title block is used
 */

function hct_hide_h1() {
	
	if ( has_block( 'acf/page-title' ) ) {
		remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
		remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
		remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
	}
}
//add_action( 'genesis_before_entry', 'hct_hide_h1' );


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

