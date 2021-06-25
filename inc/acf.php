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
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-settings',
		'capability'	=> 'edit_posts',
		'icon_url'	 	=> 'dashicons-admin-site-alt3',
		'position' 		=> 20,
		'redirect'		=> false
	));
	
}


/* Contact anti-spambot
 * To use in template: 
 * $email = antispambot( get_field( 'encoded_email' ) );
 * $phone = antispambot( get_field( 'encoded_phone' ) );
------------------------------------------*/

add_shortcode( 'phone', 'hct_encoded_phone_shortcode' );
function hct_encoded_phone_shortcode() {
	
	$phone	= antispambot( get_field( 'phone', 'option' ) );
	$phoneLink = '<a href="tel:' . $phone . '">' . $phone . '</a>';
	
	return $phoneLink;

}

add_shortcode( 'address', 'hct_address_shortcode' );
function hct_address_shortcode() {
	
	$address = get_field( 'address', 'option' );	
	return $address;

}




