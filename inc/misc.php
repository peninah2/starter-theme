<?php
/**
 * WordPress
 *
 * @package HCStarter
**/


//Disable plugin auto-update email notification
add_filter('auto_plugin_update_send_email', '__return_false');

//Disable theme auto-update email notification
add_filter('auto_theme_update_send_email', '__return_false');

// Disable password update notifications
if ( !function_exists( 'wp_password_change_notification' ) ) {
    function wp_password_change_notification() {}
}

 /**
  * Dont Update the Theme
  *
  * If there is a theme in the repo with the same name, this prevents WP from prompting an update.
  * @link   http://www.billerickson.net/excluding-theme-from-updates
  * @param  array $r Existing request arguments
  * @param  string $url Request URL
  * @return array Amended request arguments
  */
 function ea_dont_update_theme( $r, $url ) {
 	if ( 0 !== strpos( $url, 'https://api.wordpress.org/themes/update-check/1.1/' ) )
  		return $r; // Not a theme update request. Bail immediately.
  	$themes = json_decode( $r['body']['themes'] );
  	$child = get_option( 'stylesheet' );
 	unset( $themes->themes->$child );
  	$r['body']['themes'] = json_encode( $themes );
  	return $r;
  }
 add_filter( 'http_request_args', 'ea_dont_update_theme', 5, 2 );

/*
 * Archive Title, remove prefix
 *
 */
function ea_archive_title_remove_prefix( $title ) {
	$title_pieces = explode( ': ', $title );
	if( count( $title_pieces ) > 1 ) {
		unset( $title_pieces[0] );
		$title = join( ': ', $title_pieces );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'ea_archive_title_remove_prefix' );

// Remove inline CSS for emoji
remove_action( 'wp_print_styles', 'print_emoji_styles' );
