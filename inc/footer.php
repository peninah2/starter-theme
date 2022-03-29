<?php 

/**
 * Footer
 *
 * @package      HCStarter


 Footer options: use 1 footer widget with columns
**/

// Remove Genesis footer
remove_action('genesis_footer', 'genesis_do_footer');
remove_action('genesis_footer', 'genesis_footer_markup_open', 5);
remove_action('genesis_footer', 'genesis_footer_markup_close', 15);

// Removes footer entry meta
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

// Activate block-based widgets
add_filter( 'use_widgets_block_editor', '__return_true' );

// Activate block/widget based area
add_theme_support( 'genesis-footer-widgets', 1 );


// Shortcode: current year
add_shortcode( 'current_year', 'hct_current_year' );
function hct_current_year() {
	$year = date('Y');
	return $year;
}


// Custom footer
//add_action( 'genesis_footer', 'hct_custom_footer', 9 ); 

function hct_custom_footer() {
	?>
	<div class="flexbox stack-1280">
		
		<div class="logo-footer flex-1 flex-item">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo/logo.svg" alt="COMPANY NAME logo" />
		</div>
		
		<div class="flex-1 flex-item">
			<?php wp_nav_menu( array( 'theme_location' => 'footer_menu_1', 'menu_class' => 'footer-menu genesis-nav-menu', ) ); ?>
		</div>
		
		<div class="flex-1 flex-item">
			<?php wp_nav_menu( array( 'theme_location' => 'footer_menu_2', 'menu_class' => 'footer-menu footer-menu-2 genesis-nav-menu', ) ); ?>
		</div>
		
		<div class="flex-2 flex-item">
			<?php gravity_form( 1, false, false, false, '', true ); ?>
		</div>
		
	</div>
	<?php
}

// Social menu shortcode in Github > snippets
