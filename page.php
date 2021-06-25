<?php 
/**
 * Default Template
 * Moves header from inside content markup to outside it. 
 * Delete if not using.
 */ 
 
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );

add_action( 'genesis_after_header', 'genesis_entry_header_markup_open', 5 );
add_action( 'genesis_after_header', 'genesis_do_post_title' );
add_action( 'genesis_after_header', 'genesis_entry_header_markup_close', 15 );

genesis();