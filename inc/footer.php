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

// Social menu shortcode in Github > snippets
