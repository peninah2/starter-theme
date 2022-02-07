<?php
/*
 * Replaces regular spacer block, to include custom heights more neatly.
 * HTML taken from spacer block.
 * Hopefully one day this can be removed. 
 */
 
 $height = get_field( 'height' );
 $custom_style = '';
 $hideonmobile = get_field( 'hide_mobile' );
 
 if ( $hideonmobile == 'yes') {
	 $hideonmobile = ' desktop';
 }
 
 if ( $hideonmobile == 'no' ) {
	 $hideonmobile = '';
 }
 
 if ( $height == 'custom') {
	$height = get_field( 'custom_height' );
	$custom_style = ' style=" height:' . $height . 'px"';
 }
 
 
 
 echo '<div' . $custom_style . ' aria-hidden="true" class="wp-block-spacer spacer-' . $height . '-height' . $hideonmobile . '"></div>';