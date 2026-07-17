<?php
/*
 * SVG image
 * Custom HTML blocks do the same thing, but they always show in HTML mode and we want to show preview mode.
 */

$svg = get_field( 'svg_code' );

/* Set classes & alignment */
$classes = ['svg-img'];

if ( ! empty( $block['className'] ) ) {
	$classes = array_merge( $classes, explode( ' ', $block['className'] ) );
}

if ( ! empty( $block['align'] ) ) {
	$classes[] = 'align' . $block['align'];
}

/* Anchor / id */
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = ' id="' . esc_attr( sanitize_title( $block['anchor'] ) ) . '"';
}

echo '<div class="' . esc_attr( join( ' ', $classes ) ) . '"' . $anchor . '>' . $svg . '</div>';
