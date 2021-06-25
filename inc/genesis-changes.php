<?php
/**
 * Genesis Changes
 *
 * @package      HCStarter

**/

// Theme Supports
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
add_theme_support( 'genesis-responsive-viewport' );
add_theme_support( 'genesis-structural-wraps', array( 'header', 'menu-secondary', 'site-inner', 'footer-widgets', 'footer' ) );

// Adds support for accessibility.
add_theme_support(
	'genesis-accessibility', array(
		'404-page',
	//	'drop-down-menu',
		'headings',
		'rems',
		'search-form',
		'skip-links',
		'screen-reader-text',
	)
);

// Remove admin bar styling
add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );


// Remove Edit link
add_filter( 'genesis_edit_post_link', '__return_false' );

// Remove Genesis Favicon (use site icon instead)
remove_action( 'wp_head', 'genesis_load_favicon' );

// Remove Header Description
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );

// Remove post info and meta
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

// Remove unused sidebars
unregister_sidebar( 'header-right' );
unregister_sidebar( 'sidebar-alt' );

// Force full-width-content layout setting
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

// Remove Genesis Templates
function ea_remove_genesis_templates( $page_templates ) {
	unset( $page_templates['page_archive.php'] );
	unset( $page_templates['page_blog.php'] );
	return $page_templates;
}
add_filter( 'theme_page_templates', 'ea_remove_genesis_templates' );

// Removes output of primary navigation right extras.
remove_filter( 'genesis_nav_items', 'genesis_nav_right', 10, 2 );
remove_filter( 'wp_nav_menu_items', 'genesis_nav_right', 10, 2 );


// Remove Genesis SEO settings & Scripts from post/page editor
add_action( 'admin_menu' , 'hct_remove_genesis_page_scripts_box' );
function hct_remove_genesis_page_scripts_box() {
	remove_meta_box( 'genesis_inpost_seo_box', 'page', 'normal' ); 
	remove_meta_box( 'genesis_inpost_scripts_box', 'page', 'normal' );
}

// Removes output of unused admin settings metaboxes -- uncomment to include
// add_action( 'genesis_theme_settings_metaboxes', 'hct_remove_metaboxes' );
function hct_remove_metaboxes( $_genesis_admin_settings ) {

	remove_meta_box( 'genesis-theme-settings-header', $_genesis_admin_settings, 'main' );
	remove_meta_box( 'genesis-theme-settings-nav', $_genesis_admin_settings, 'main' );

} 

// Customize the entry meta in the entry header (requires HTML5 theme support)
add_filter( 'genesis_post_info', 'sp_post_info_filter' );
function sp_post_info_filter($post_info) {
	$post_info = '[post_date] by [post_author_posts_link] [post_comments] [post_edit]';
	return $post_info;
}


/**
 * Disable customizer theme settings
 * Check the commented line to determine which to keep
 */
function ea_disable_customizer_theme_settings( $config ) {
//	$remove = [ 'genesis_header', 'genesis_single', 'genesis_archives', 'genesis_footer' ];
	$remove = [ 'genesis_footer' ];
	foreach( $remove as $item ) {
		unset( $config['genesis']['sections'][ $item ] );
	}
	return $config;
}
add_filter( 'genesis_customizer_theme_settings_config', 'ea_disable_customizer_theme_settings' );
