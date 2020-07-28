<?php
/**
 * Blocks
 *
 * @package      HCStarter

**/

// Create blocks
function hct_register_custom_blocks() {
	
	if( ! function_exists( 'acf_register_block_type' ) )
		return;

	acf_register_block_type( array(
		'name'			=> 'team-member',
		'title'			=> __( 'Team Member', 'theme-name' ),
		'render_template'	=> 'blocks/block-team-member.php',
		'category'		=> 'formatting',
		'icon'			=> 'businessman',
		'mode'			=> 'edit',
		//'post_types'	=> 'team',
		'keywords'		=> array( 'team', 'member', 'staff', 'client'  )
	));
	
	
	acf_register_block_type( array(
		'name'				=> 'header',
		'title'				=> __( 'Header', 'theme-name' ),
		'render_template'	=> 'blocks/block-header.php',
		'category'			=> 'formatting',
		'icon'				=> 'editor-textcolor',
		'mode'				=> 'auto',
		'keywords'			=> array( 'title', 'header', 'page title', 'client'),
		'supports'			=> array( 'multiple' => false ),
	));
	
	acf_register_block_type( array(
		'name'				=> 'page-title',
		'title'				=> __( 'Page Title', 'theme-name' ),
		'render_template'	=> 'blocks/block-page-title.php',
		'category'			=> 'formatting',
		'icon'				=> 'editor-textcolor',
		'mode'				=> 'auto',
		'keywords'			=> array( 'title', 'header', 'page title', 'client'),
		'supports'			=> array( 'multiple' => false ),
	));	

	acf_register_block_type( array(
		'name'			=> 'testimonial',
		'title'			=> __( 'Testimonial', 'theme-name' ),
		'render_template'	=> 'blocks/block-testimonial.php',
		'category'		=> 'formatting',
		'icon'			=> 'editor-quote',
		'mode'			=> 'preview',
		'keywords'		=> array( 'testimonial', 'quote', 'client'  )
	));	

	acf_register_block_type( array(
		'name'			=> 'contact',
		'title'			=> __( 'Themeprefix Contact', 'vbdesign' ),
		'render_template'	=> 'blocks/block-contact.php',
		'category'		=> 'formatting',
		'icon'			=> 'phone',
		'mode'			=> 'auto',
		'keywords'		=> array( 'contact', 'email', 'phone', 'client'  )
	));		

}
add_action('acf/init', 'hct_register_custom_blocks' );

/*
 * Only load Featherlight scripts if team member block is present
 */

function hct_teamblock_featherlight_script() {
	
	if ( has_block( 'acf/team-member' ) ) {
		wp_enqueue_script(
			'featherlight',
			get_stylesheet_directory_uri() . '/js/featherlight.min.js',
			array( 'jquery' ),
			CHILD_THEME_VERSION,
			true
		);
	}
}
// add_action( 'wp_enqueue_scripts', 'hct_teamblock_featherlight_script' );

/*
 * Hide Genesis page title when Page Title block is used
 */

function hct_hide_h1() {
	
	if ( has_block( 'acf/page-title' ) ) {
		remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
		remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
		remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
	}
}
//add_action( 'genesis_before_entry', 'hct_hide_h1' );

