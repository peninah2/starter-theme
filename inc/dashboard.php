<?php
/**
 * Admin/dashboard area
 *
 * @package      HCStarter

**/


// Custom WordPress Dashboard Footer
function hct_remove_footer_admin () {
	echo '';
}
add_filter('admin_footer_text', 'hct_remove_footer_admin');



function hct_remove_admin_bar_links() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('view-site');        // Remove the view site link
    $wp_admin_bar->remove_menu('comments');         // Remove the comments link
    $wp_admin_bar->remove_menu('new-content');      // Remove the content link
    $wp_admin_bar->remove_menu('w3tc');             // If you use w3 total cache remove the performance link
}
add_action( 'wp_before_admin_bar_render', 'hct_remove_admin_bar_links' );

// Remove admin bar for non-admins
function hc_remove_admin_bar() {
	
	$cu = wp_get_current_user();
    if ( $cu->has_cap('edit_users') && !is_admin() ) {
  		show_admin_bar(true);
	}
}
add_action('after_setup_theme', 'hc_remove_admin_bar');



// Remove default dashboard widgets
function hct_dashboard_widgets() {
	global $wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['normal']['high']['dashboard_browser_nag']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	
	unset($wp_meta_boxes['dashboard']['normal']['core']['yoast_db_widget']); // yoast seo	
	unset($wp_meta_boxes['dashboard']['normal']['core']['rg_forms_dashboard']); // gravity forms
}
add_action('wp_dashboard_setup', 'hct_dashboard_widgets', 11);
remove_action('welcome_panel', 'wp_welcome_panel');



// Remove Yoast SEO Dashboard Widget
function hct_remove_wpseo_dashboard_overview() {
	remove_meta_box( 'wpseo-dashboard-overview', 'dashboard', 'side' );
}
add_action('wp_dashboard_setup', 'hct_remove_wpseo_dashboard_overview' );



//Changes WP default "Howdy" text to "Logged in as"
function hct_logged_in_as_text( $wp_admin_bar ) {
	$user_id = get_current_user_id();
	$current_user = wp_get_current_user();
	$profile_url = get_edit_profile_url( $user_id );

	if ( 0 != $user_id ) {
	/* Add the "My Account" menu */
		$avatar = get_avatar( $user_id, 28 );
		$howdy = sprintf( __('Logged in as %1$s'), $current_user->display_name );
		$class = empty( $avatar ) ? '' : 'with-avatar';
	
	$wp_admin_bar->add_menu( array(
		'id' => 'my-account',
		'parent' => 'top-secondary',
		'title' => $howdy . $avatar,
		'href' => $profile_url,
		'meta' => array(
		'class' => $class,
		),
	) );
	}
}
add_action( 'admin_bar_menu', 'hct_logged_in_as_text', 11 );


/**
 * Remove WPSEO Notifications
 *
 */
function ea_remove_wpseo_notifications() {
	if( ! class_exists( 'Yoast_Notification_Center' ) )
		return;
	remove_action( 'admin_notices', array( Yoast_Notification_Center::get(), 'display_notifications' ) );
	remove_action( 'all_admin_notices', array( Yoast_Notification_Center::get(), 'display_notifications' ) );
}
add_action( 'init', 'ea_remove_wpseo_notifications' );



/**
 * Disable login hints
 */
function hct_disable_login_hints() {
  
	return 'Something you entered is incorrect.';
  
}
add_filter( 'login_errors', 'hct_disable_login_hints' );



/**
 * Remove default Custom Fields Metabox
 * ref: https://core.trac.wordpress.org/ticket/33885
 */
function hct_remove_post_custom_fields_now() {
	foreach ( get_post_types( '', 'names' ) as $post_type ) {
		remove_meta_box( 'postcustom' , $post_type , 'normal' );
	}
}
add_action( 'admin_menu' , 'hct_remove_post_custom_fields_now' );



// Don't let WPSEO metabox be high priority
add_filter( 'wpseo_metabox_prio', function(){ return 'low'; } );


/**
 * Redirect all users to front page after login besides Editor and Admin
 */
function hctt_login_redirect( $redirect_to, $request, $user ) {
	global $user;
	if ( isset( $user->roles ) && is_array( $user->roles ) ) {
		if ( in_array( 'administrator', $user->roles ) ) {
			return $redirect_to;
		} 
	
		elseif ( in_array( 'editor', $user->roles ) ) {
			return $redirect_to;
		}

		else {
			return home_url();
		}
	} else {
		return $redirect_to;
	}
}

add_filter( 'login_redirect', 'hctt_login_redirect', 10, 3 );

/**
 * Auto update plugins 
 */
// add_filter( 'auto_update_plugin', '__return_true' );
// add_filter( 'auto_update_theme', '__return_true' );
