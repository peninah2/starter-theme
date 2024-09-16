<?php 

/**
 * Footer
 *
 * @package      HCStarter

**/

// Remove Genesis footer
remove_action('genesis_footer', 'genesis_do_footer');
remove_action('genesis_footer', 'genesis_footer_markup_open', 5);
remove_action('genesis_footer', 'genesis_footer_markup_close', 15);

// Removes footer entry meta
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

// Activate block-based widgets
add_filter( 'use_widgets_block_editor', '__return_true' );


// Shortcode: current year
add_shortcode( 'current_year', 'hct_current_year' );
function hct_current_year() {
	$year = date('Y');
	return $year;
}

// Change pattern number
add_action( 'genesis_footer', 'hct_block_footer' );
function hct_block_footer() {
		
	$block_content = do_blocks('<!-- wp:block {"ref":9} /-->');
	echo do_shortcode($block_content);

}