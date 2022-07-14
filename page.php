<?php 
/**
 * Default Template
 */ 

// Removes entry title if h1 block is present
add_action( 'genesis_before_entry', 'hct_remove_entry_title' );



genesis();