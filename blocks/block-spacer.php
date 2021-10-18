<?php
/*
 * Replaces regular spacer block, to include custom heights more neatly.
 * HTML taken from spacer block.
 * Hopefully one day this can be removed. 
 */
 
 $height = get_field( 'height' );
 $custom_style = '';
 
 if ( $height == 'custom') {
	$height = get_field( 'custom_height' );
	$custom_style = 'style="height:' . $height . 'px"';
 }
 
 
 
 echo '<div ' . $custom_style . ' aria-hidden="true" class="wp-block-spacer spacer-' . $height . '-height"></div>';