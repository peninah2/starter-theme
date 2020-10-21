<?php
/**
 * THEME NAME 
 */

require_once get_template_directory() . '/lib/init.php';

//require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-setup.php';

// Defines the child theme
define( 'CHILD_THEME_NAME', 'Highlight Creative Starter' );
define( 'CHILD_THEME_URL', 'https://websitename.com/' );
define( 'CHILD_THEME_VERSION', '1.0' );

add_action( 'wp_enqueue_scripts', 'hct_enqueue_scripts_styles' );
function hct_enqueue_scripts_styles() {
	
	wp_enqueue_style(
		'theme-styles',
		get_stylesheet_directory_uri() . '/style.css',
		array(),
		filemtime( get_stylesheet_directory() . '/style.css' )
	);

	wp_enqueue_style(
		'theme-name-fonts',
		'//fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,700',
		array(),
		CHILD_THEME_VERSION
	);
	
	wp_enqueue_style(
		'font-awesome',
		'//use.fontawesome.com/releases/v5.5.0/css/all.css',
		array(),
		CHILD_THEME_VERSION
	);	
	
	// wp_enqueue_style( 'dashicons' );

	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_script(
		'theme-name-responsive-menu',
		get_stylesheet_directory_uri() . "/js/responsive-menus{$suffix}.js",
		array( 'jquery' ),
		CHILD_THEME_VERSION,
		true
	);
	
	wp_localize_script(
		'theme-name-responsive-menu',
		'genesis_responsive_menu',
		hct_responsive_menu_settings()
	);

	wp_enqueue_script(
		'theme-name',
		get_stylesheet_directory_uri() . '/js/theme-name.js',
		array( 'jquery' ),
		CHILD_THEME_VERSION,
		true
	);
	
	wp_enqueue_script(
		'smooth-scroll',
		get_stylesheet_directory_uri() . '/js/smooth-scroll.js',
		array( 'jquery' ),
		CHILD_THEME_VERSION,
		true
	);	
	
	wp_enqueue_script( 'scrollreveal', '//unpkg.com/scrollreveal/dist/scrollreveal.min.js', true ); 

}


// Sets the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 702; // Pixels.
}

// General cleanup
include_once( get_stylesheet_directory() . '/inc/wordpress.php' );
include_once( get_stylesheet_directory() . '/inc/genesis-changes.php' );

// Theme
include_once( get_stylesheet_directory() . '/inc/presets.php' );
include_once( get_stylesheet_directory() . '/inc/layouts.php' );
include_once( get_stylesheet_directory() . '/inc/navigation.php' ); //includes header
include_once( get_stylesheet_directory() . '/inc/footer.php' );
include_once( get_stylesheet_directory() . '/blocks/acf-block-setup.php' );

// Dashboard
include_once( get_stylesheet_directory() . '/inc/disable-editor.php' );
include_once( get_stylesheet_directory() . '/inc/login.php' );
include_once( get_stylesheet_directory() . '/inc/dashboard.php' );

// Other
include_once( get_stylesheet_directory() . '/inc/gravity-forms.php' );
include_once( get_stylesheet_directory() . '/inc/acf.php' ); // non-blocks


// Image Sizes
// add_image_size( 'file_size', 400, 100, true );

// -- Responsive embeds
add_theme_support( 'responsive-embeds' );

// -- Wide Images
add_theme_support( 'align-wide' );

// Editor Styles
add_theme_support( 'editor-styles' );
add_editor_style( 'editor-style.css' );

/** 
 * Gutenberg scripts and styles
 */
function hct_editor_styling_scripts() {

	wp_enqueue_script(
		'block-editor', 
		get_stylesheet_directory_uri() . '/js/editor.js', 
		array( 'wp-blocks', 'wp-dom' ), 
		filemtime( get_stylesheet_directory() . '/js/editor.js' ),
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'hct_editor_styling_scripts' );




// Customize the entry meta in the entry header (requires HTML5 theme support)
add_filter( 'genesis_post_info', 'sp_post_info_filter' );
function sp_post_info_filter($post_info) {
	$post_info = '[post_date] by [post_author_posts_link] [post_comments] [post_edit]';
	return $post_info;
}

// Defines responsive menu settings
function hct_responsive_menu_settings() {

	$settings = array(
		'mainMenu'         => __( 'Menu', 'theme-name' ),
		'menuIconClass'    => 'dashicons-before dashicons-menu',
		'subMenu'          => __( 'Submenu', 'theme-name' ),
		'subMenuIconClass' => 'dashicons-before dashicons-arrow-down-alt2',
		'menuClasses'      => array(
			'combine' => array(
				'.nav-primary',
			),
			'others'  => array(),
		),
	);

	return $settings;

}

// Load-hidden class for Scroll Reveal
function hct_hide_scrollreveal() {
	?>
	<style>
		html.sr .load-hidden,
		html.sr .wp-block-column,
		html.sr h1,
		html.sr .wp-block-image,
		html.sr .wp-block-media-text__media,
		html.sr .wp-block-media-text__content,
		html.sr .wp-block-button {
			visibility: hidden;
		}
	 </style>
	<?php
}
// add_action( 'wp_head', 'hct_hide_scrollreveal' );

/* 
 * Google Analytics
 *
 */
function hct_google_tag_manager_head() {
	?>
	<!-- Google Tag Manager -->
	
<?php
}
add_action( 'wp_head', 'hct_google_tag_manager_head', 0 ); 

function hct_google_tag_manager_body() {
	?>
	<!-- Google Tag Manager (noscript) -->

	<?php
}
add_action( 'genesis_before', 'hct_google_tag_manager_body', 0 ); 
