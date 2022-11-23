<?php
/**
 * THEME NAME 
 */

require_once get_template_directory() . '/lib/init.php';

// Uncomment if using WooCommerce
// require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-setup.php';

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
		'theme-fonts',
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
	
		
	wp_enqueue_script(
		'a11y-menu',
		get_stylesheet_directory_uri() . '/js/a11y-menu.dist.min.js',
		array( 'jquery' ),
		true
	);
	
	wp_enqueue_script(
		'global',
		get_stylesheet_directory_uri() . '/js/global.js',
		array( 'jquery' ),
		CHILD_THEME_VERSION,
		true
	);
	
	wp_enqueue_script( 'scrollreveal', '//unpkg.com/scrollreveal/dist/scrollreveal.min.js', true ); 
	
	wp_deregister_script( 'superfish' );
	wp_deregister_script( 'superfish-args' );

}


// Sets the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 702; // Pixels.
}

// Theme
include_once( get_stylesheet_directory() . '/inc/layouts.php' );
include_once( get_stylesheet_directory() . '/inc/header.php' ); // includes navigation
include_once( get_stylesheet_directory() . '/inc/footer.php' );
include_once( get_stylesheet_directory() . '/blocks/acf-block-setup.php' );
include_once( get_stylesheet_directory() . '/blocks/block-patterns.php' );

// Dashboard
include_once( get_stylesheet_directory() . '/inc/login.php' );
include_once( get_stylesheet_directory() . '/inc/dashboard.php' );

// Other
include_once( get_stylesheet_directory() . '/inc/acf.php' ); // non-blocks
include_once( get_stylesheet_directory() . '/inc/misc.php' );
include_once( get_stylesheet_directory() . '/inc/genesis-changes.php' );


// Image Sizes
// add_image_size( 'file_size', 400, 100, true );

// -- Responsive embeds
add_theme_support( 'responsive-embeds' );

// -- Wide Images
add_theme_support( 'align-wide' );

// Editor Styles
add_theme_support( 'editor-styles' );
add_editor_style( 'editor-style.css' );
add_theme_support( 'custom-line-height' );
add_theme_support( 'custom-spacing' );
add_theme_support( 'appearance-tools' );
remove_theme_support( 'core-block-patterns' );



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



// Head content
// add_action( 'wp_head', 'hct_head_scripts' );
function hct_head_scripts() {
	?>
	
	<meta name="theme-color" content="#000">
	 
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){window.dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'GA_MEASUREMENT_ID');
	</script>
	 
	<?php
}


/* 
 * Google Analytics - replace id
 *
 */
//add_action( 'wp_head', 'hct_google_tag_manager_head', 0 );  
function hct_google_tag_manager_head() {
	?>

<?php
}



// Hides site except homepage if you are not logged in. Useful if you like to show clients homepage before the rest of the site is developed.
// add_action( 'template_redirect', 'hct_in_development_redirect' );
function hct_in_development_redirect() {
    $homepage_id = get_option('page_on_front');
    if ( ( ! is_page( $homepage_id ) ) && ! is_user_logged_in() ) {                                                                                  
         wp_redirect( home_url() ); 
    }    
}
