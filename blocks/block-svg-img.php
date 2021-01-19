<?php 
/*
 * SVG image
 * Custom html blocks do the same thing, but they always show in html mode and we want to show preview mode. 
 */
 
 $svg = get_field( 'svg_code' );
 
 echo '<div class="svg-img">' . $svg . '</div>';
