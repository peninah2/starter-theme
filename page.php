<?php 
/**
 * Default Template
 * Choose -- can move header, or, can check for h1 block
 */ 

/*
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );

add_action( 'genesis_after_header', 'genesis_entry_header_markup_open', 5 );
add_action( 'genesis_after_header', 'genesis_do_post_title' );
add_action( 'genesis_after_header', 'genesis_entry_header_markup_close', 15 );
*/


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



genesis();