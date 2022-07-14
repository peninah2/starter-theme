<?php
/**
 * Layouts
 *
 * @package      HCStarter

**/


// Removes site layouts.
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

// Remove layout metaboxes
remove_theme_support( 'genesis-inpost-layouts' );
remove_theme_support( 'genesis-archive-layouts' );

/**
 * Editor layout class
 * @link https://www.billerickson.net/change-gutenberg-content-width-to-match-layout/
 *
 * @param string $classes
 * @return string
 */
function ea_editor_layout_class( $classes ) {
    $screen = get_current_screen();
    if( ! $screen->is_block_editor() )
      return $classes;

    $layout = false;
    $post_id = isset( $_GET['post'] ) ? intval( $_GET['post'] ) : false;

    // Get post-specific layout
    if( $post_id )
      $layout = genesis_get_custom_field( '_genesis_layout', $post_id );

    // If no post-specific layout, use site-wide default
    elseif( empty( $layout ) )
      $layout = genesis_get_option( 'site_layout' );

    $classes .= ' ' . $layout . ' ';
    return $classes;
}
add_filter( 'admin_body_class', 'ea_editor_layout_class' );

/* Checks content to see if there is an h1. If yes, remove default titles.
 * This allows blocks to be used for titles for design purposes without removing them entirely.
 * Adapted from: https://www.billerickson.net/building-a-header-block-in-wordpress/
 */ 
function hct_has_h1_block( $blocks = array() ) {
	foreach ( $blocks as $block ) {

		if( ! isset( $block['blockName'] ) )
			continue;

		// Check for h1 block (top level)
		if( 'core/heading' === $block['blockName'] && isset( $block['attrs']['level'] ) && 1 === $block['attrs']['level'] ) {
			return true;

		// Scan inner blocks for headings
		} elseif( isset( $block['innerBlocks'] ) && !empty( $block['innerBlocks'] ) ) {
			$inner_h1 = hct_has_h1_block( $block['innerBlocks'] );
			if( $inner_h1 )
				return true;
		}
	}

	return false;
}

add_action( 'genesis_before_entry', 'hct_remove_entry_title' );
function hct_remove_entry_title() {
	if( ! ( is_singular() && function_exists( 'parse_blocks' ) ) )
		return;

	global $post;
	$blocks = parse_blocks( $post->post_content );
	$has_h1 = hct_has_h1_block( $blocks );
	
	// if there's an h1, remove the Genesis title
	if( $has_h1 ) {
		remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
		remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
		remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
	}
}