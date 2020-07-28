<?php
/**
 * Page title block
 *
 * @package   Client
**/

$title 		= get_field( 'title' ); 
$highlighted 	= get_field( 'script_title' );

$replace = "<span>$highlighted</span>";

$formatted_title = str_replace($highlighted, $replace, $title);

if ( is_admin() ) {
	echo '<h1>' . $title . '</h1>';
}

else {
	echo '<h1>' . $formatted_title . '</h1>';
}