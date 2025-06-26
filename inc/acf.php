<?php
/**
 * ACF
 *
 * @package      HCStarter
**/

/* Contact anti-spambot shortcodes - these can run early
------------------------------------------*/
add_shortcode( 'phone', 'hct_encoded_phone_shortcode' );
function hct_encoded_phone_shortcode() {
	
	$phone	= antispambot( get_field( 'phone', 'option' ) );
	$phoneLink = '<a href="tel:' . $phone . '">' . $phone . '</a>';
	
	return $phoneLink;
}

add_shortcode( 'email', 'hct_email_shortcode' );
function hct_email_shortcode() {
	
	$email = get_field( 'email', 'option' );	
	return $email;
}

add_shortcode( 'address', 'hct_address_shortcode' );
function hct_address_shortcode() {
	
	$address = get_field( 'address', 'option' );	
	return $address;
}

/* ACF Options page and field group - run after init
------------------------------------------*/
add_action( 'init', 'hct_setup_acf_contact' );
function hct_setup_acf_contact() {
	
	/* Options page */
	if( function_exists('acf_add_options_page') ) {
		
		acf_add_options_page(array(
			'page_title' 	=> 'Contact',
			'menu_title'	=> 'Contact',
			'menu_slug' 	=> 'contact',
			'capability'	=> 'edit_posts',
			'icon_url'	 	=> 'dashicons-phone',
			'position' 		=> 20,
			'redirect'		=> false
		));
		
	}
	
	/* Field group */
	if( function_exists('acf_add_local_field_group') ):
	acf_add_local_field_group(array(
		'key' => 'group_636d45739c9c5',
		'title' => 'Contact',
		'fields' => array(
			array(
				'key' => 'field_636d45728968a',
				'label' => 'Phone',
				'name' => 'phone',
				'aria-label' => '',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'maxlength' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array(
				'key' => 'field_636d45888968b',
				'label' => 'Email',
				'name' => 'email',
				'aria-label' => '',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'maxlength' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array(
				'key' => 'field_636d458e8968c',
				'label' => 'Address',
				'name' => 'address',
				'aria-label' => '',
				'type' => 'textarea',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'maxlength' => '',
				'rows' => 3,
				'placeholder' => '',
				'new_lines' => 'br',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'contact',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	));
	endif;
	
}