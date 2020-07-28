<?php
/**
 * ACF
 *
 * @package      HCStarter

**/


/* Options page
------------------------------------------*/
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'THEME NAME Global Content',
		'menu_title'	=> 'THEME Settings',
		'menu_slug' 	=> 'theme-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}

/* Contact anti-spambot
 * To use in template: 
 * $email = antispambot( get_field( 'encoded_email' ) );
 * $phone = antispambot( get_field( 'encoded_phone' ) );
------------------------------------------*/

//add_shortcode( 'encoded_email', 'hct_encoded_email_shortcode' );
function hct_encoded_email_shortcode() {
	
	$email = antispambot( get_field( 'encoded_email', 'option' ) );
	$emailLink = '<a href="mailto:' . $email . '">' . $email . '</a>';
	
	return $emailLink;

}

//add_shortcode( 'encoded_phone', 'hct_encoded_phone_shortcode' );
function hct_encoded_phone_shortcode() {
	
	$phone = antispambot( get_field( 'encoded_phone', 'option' ) );
	$phoneLink = '<a href="tel:' . $phone . '">' . $phone . '</a>';
	
	return $phoneLink;

}


