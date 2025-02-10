<?php
/**
 * Login
 *
 * @package      HCStarter

**/

/**
 * Replace login logo's url with our url instead of WP
 *
 */
function hct_login_header_url( $url ) {
    return esc_url( home_url() );
}
add_filter( 'login_headerurl', 'hct_login_header_url' );
add_filter( 'login_headertext', '__return_empty_string' );

/**
 * A few custom styles
 *
 */
function hct_login_logo() {

	$logo_path = '/images/logo/logo.svg';
	if( ! file_exists( get_stylesheet_directory() . $logo_path ) )
		return;

	$logo = get_stylesheet_directory_uri() . $logo_path;
    ?>
    <style type="text/css">
		body {
			background: #FFFCF5;
			--button-color: #2196f3;
			--button-hover: #3f51b5;
		}
		
		.login h1.wp-login-logo a {
			background-image: url(<?php echo $logo;?>);
			background-size: contain;
			background-repeat: no-repeat;
			background-position: center center;
			display: block;
			overflow: hidden;
			text-indent: -9999em;
			width: 312px;
			height: 100px;
		}
		
				
		.wp-core-ui .button-primary {
			background: var(--button-color);
			border-color: var(--button-color);
			color: #fff;
			text-decoration: none;
			text-shadow: none;
		}
		
		.wp-core-ui .button-secondary:focus, .wp-core-ui .button.focus, .wp-core-ui .button:focus,
		.wp-core-ui .button-primary.focus, .wp-core-ui .button-primary.hover, .wp-core-ui .button-primary:focus, .wp-core-ui .button-primary:hover {
			box-shadow: none;
			outline: 2px solid transparent;
			outline-offset: 0;
			background: var(--button-hover);
			border-color: var(--button-hover);
			color: #fff;
		}
		
		.wp-core-ui .button-primary.focus, .wp-core-ui .button-primary:focus {
			box-shadow: none;
		}
    </style>
    <?php
}
add_action( 'login_head', 'hct_login_logo' );
