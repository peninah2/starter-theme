<?php 
/*
 * SVG image
 * Custom html blocks do the same thing, but they always show in html mode and we want to show preview mode. 
 */
 
 $svg = get_field( 'svg_code' );
 

/* Set class & alignment */
$classes = ['svg-img'];
if( !empty( $block['className'] ) )
    $classes = array_merge( $classes, explode( ' ', $block['className'] ) ); 

if( !empty($block['align']) ) {
    $classes[] = 'align' . $block['align'];
}


echo '<div class="' . join( ' ', $classes ) . '">' . $svg . '</div>';

